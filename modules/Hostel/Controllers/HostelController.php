<?php
namespace Modules\Hostel\Controllers;

use App\Http\Controllers\Controller;
use Modules\Hostel\Models\Hotel;
use Illuminate\Http\Request;
use Modules\Location\Models\Location;
use Modules\Review\Models\Review;
use Modules\Core\Models\Attributes;
use DB;

class HostelController extends Controller
{
    protected $hotelClass;
    protected $locationClass;
    public function __construct()
    {
        $this->hotelClass = Hotel::class;
        $this->locationClass = Location::class;
    }
    public function callAction($method, $parameters)
    {
        if(!Hotel::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }

    public function index(Request $request)
    {
        $is_ajax = $request->query('_ajax');
       $list = call_user_func([$this->hotelClass,'search'],$request);

        $markers = [];
        if (!empty($list)) {
            foreach ($list as $row) {
                $markers[] = [
                    "id"      => $row->id,
                    "title"   => $row->title,
                    "lat"     => (float)$row->map_lat,
                    "lng"     => (float)$row->map_lng,
                    "gallery" => $row->getGallery(true),
                    "infobox" => view('Hostel::frontend.layouts.search.loop-grid', ['row' => $row,'disable_lazyload'=>1,'wrap_class'=>'infobox-item'])->render(),
                    'marker'  => url('images/icons/png/pin.png'),
                ];
            }
        }
        $limit_location = 15;
        if( empty(setting_item("hotel_location_search_style")) or setting_item("hotel_location_search_style") == "normal" ){
            $limit_location = 1000;
        }
        $data = [
            'rows'               => $list,
            'list_location'      => $this->locationClass::where('status', 'publish')->limit($limit_location)->with(['translations'])->get()->toTree(),
            'hotel_min_max_price' => $this->hotelClass::getMinMaxPrice(),
            'markers'            => $markers,
            "blank"              => 1,
            "seo_meta"           => $this->hotelClass::getSeoMetaForPageList()
        ];
        $layout = setting_item("hotel_layout_search", 'normal');
        if ($request->query('_layout')) {
            $layout = $request->query('_layout');
        }
        if ($is_ajax) {
            return $this->sendSuccess([
                'html'    => view('Hostel::frontend.layouts.search-map.list-item', $data)->render(),
                "markers" => $data['markers']
            ]);
        }
        $data['attributes'] = Attributes::where('service', 'hostel')->with(['terms','translations'])->get();

        if ($layout == "map") {
            $data['body_class'] = 'has-search-map';
            $data['html_class'] = 'full-page';
            return view('Hostel::frontend.search-map', $data);
        }
        return view('Hostel::frontend.search', $data);
    }

    public function detail(Request $request, $slug)
    {
        $row = $this->hotelClass::where('slug', $slug)->with(['location','translations','hasWishList'])->first();;
        if ( empty($row) or !$row->hasPermissionDetailView()) {
            return redirect('/');
        }
        $translation = $row->translateOrOrigin(app()->getLocale());
        $hotel_related = [];
        $location_id = $row->location_id;
        if (!empty($location_id)) {
            $hotel_related = $this->hotelClass::where('location_id', $location_id)->where("status", "publish")->take(4)->whereNotIn('id', [$row->id])->with(['location','translations','hasWishList'])->get();
        }
        $review_list = $row->getReviewList();
        $data = [
            'row'          => $row,
            'translation'       => $translation,
            'hotel_related' => $hotel_related,
            'booking_data' => $row->getBookingData(),
            'review_list'  => $review_list,
            'seo_meta'  => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'body_class'=>'is_single'
        ];
        $this->setActiveMenu($row);
        return view('Hostel::frontend.detail', $data);
    }

    public function checkAvailability(){
       // echo 'I am here';die;
        $hotel_id = \request('hotel_id');
// print_r(\request()->all());die;
        if(\request()->input('firstLoad') == "false") {
            $rules = [
                'hotel_id'   => 'required',
                'start_date' => 'required:date_format:Y-m-d',
                'end_date'   => 'required:date_format:Y-m-d',
                'adults'     => 'required',
            ];
            session(['start_date'=>\request()->input('start_date'),'end_date'=>\request()->input('end_date')]);
            $validator = \Validator::make(request()->all(), $rules);
            if ($validator->fails()) {
                return $this->sendError($validator->errors()->all());
            }

            if(strtotime(\request('end_date')) - strtotime(\request('start_date')) < DAY_IN_SECONDS){
                return $this->sendError(__("Dates are not valid"));
            }
            // if(strtotime(\request('end_date')) - strtotime(\request('start_date')) > 30*DAY_IN_SECONDS){
            //     return $this->sendError(__("Maximum day for booking is 30"));
            // }
        }

        $hotel = $this->hotelClass::find($hotel_id);

        if(empty($hotel_id) or empty($hotel)){
            return $this->sendError(__("Hotel not found"));
        }

        if(\request()->input('firstLoad') == "false") {
            $numberDays = abs(strtotime(\request('end_date')) - strtotime(\request('start_date'))) / 86400;
            if(!empty($hotel->min_day_stays) and  $numberDays < $hotel->min_day_stays){
                return $this->sendError(__("You must to book a minimum of :number days",['number'=>$hotel->min_day_stays]));
            }

            if(!empty($hotel->min_day_before_booking)){
                $minday_before = strtotime("today +".$hotel->min_day_before_booking." days");
                if(  strtotime(\request('start_date')) < $minday_before){
                    return $this->sendError(__("You must book the service for :number days in advance",["number"=>$hotel->min_day_before_booking]));
                }
            }
        }

        $rooms = $hotel->getRoomsAvailability(request()->input());

        return $this->sendSuccess([
            'rooms'=>$rooms
        ]);
    }
}
