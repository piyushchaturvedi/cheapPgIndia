<?php
namespace Modules\Coupon\Admin;

use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Coupon\Models\Coupon;
use Modules\Coupon\Models\Page;
use Modules\Coupon\Models\CouponTranslation;
use Modules\Template\Models\Template;

class CouponController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/coupon');
        parent::__construct();
    }

    public function index(Request $request)
    {

        //$this->checkPermission('page_view');
        $page_name = $request->query('page_name');
         $page_name;
        $datapage = new Coupon();
        if ($page_name) {
            $datapage = Coupon::where('code', 'LIKE', '%' . $page_name . '%');
        }
        $datapage = $datapage->orderBy('id', 'asc');
        $data = [
            'rows'        => $datapage->paginate(20),
            'page_title'=>__("Coupon Management"),
            'breadcrumbs' => [
                [
                    'name' => __('coupon'),
                    'url'  => 'admin/module/coupon'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Coupon::admin.index', $data);
    }

    public function create(Request $request)
    {
     //   $this->checkPermission('page_create');
        $row = new Coupon();
        $row->fill([
            'status' => 'publish',
        ]);

        $data = [
            'row'         => $row,
            'translation'=>new CouponTranslation(),
            'templates'   => Template::orderBy('id', 'desc')->limit(100)->get(),
            'breadcrumbs' => [
                [
                    'name' => __('Coupon'),
                    'url'  => 'admin/module/coupon'
                ],
                [
                    'name'  => __('Add Coupon'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Coupon::admin.detail', $data);
    }

    public function edit(Request $request, $id)
    {
       // $this->checkPermission('page_update');
        $row = Coupon::find($id);

        if (empty($row)) {
            return redirect('admin/module/coupon');
        }
      //  $translation = $row->translateOrOrigin($request->query('lang'));

        $data = [
            'translation'  => $row,
            'row'            =>$row,
            'templates'   => Template::orderBy('id', 'desc')->limit(100)->get(),
            'breadcrumbs' => [
                [
                    'name' => __('Coupon'),
                    'url'  => 'admin/module/coupon'
                ],
                [
                    'name'  => __('Edit Coupon'),
                    'class' => 'active'
                ],
            ],
            'enable_multi_lang'=>true
        ];
        return view('Coupon::admin.detail', $data);
    }

    public function store(Request $request, $id){


        if($id>0){
           // $this->checkPermission('page_update');
            $row = Coupon::find($id);
            $row->fill($request->input());
            $row->save();
            if (empty($row)) {
                return redirect(route('coupon.admin.index'));
            }
        }else{
          //  $this->checkPermission('page_create');

            $row=Coupon::create($request->input());
        }


       // $row->fill($request->input());


        if($id > 0 ){
            return back()->with('success',  __('Coupon updated') );
        }else{

            return redirect()->route('coupon.admin.edit',['id'=>$row->id])->with('success', $id > 0 ?  __('Coupon updated') : __('Coupon created'));
        }
    }

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = Coupon::select('id', 'title as text');
        if ($q) {
            $query->where('title', 'like', '%' . $q . '%');
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return response()->json([
            'results' => $res
        ]);
    }

    public function bulkEdit(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids)) {
            return redirect()->back()->with('error', __('Please select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('No Action is selected!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = Coupon::where("id", $id);
                if (!$this->hasPermission('coupon_manage_others')) {
                 //   $query->where("create_user", Auth::id());
                    // $this->checkPermission('page_delete');
                }
                $query->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = Coupon::where("id", $id);
                if (!$this->hasPermission('coupon_manage_others')) {
                   // $query->where("create_user", Auth::id());
                    // $this->checkPermission('page_update');
                }
                $query->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Update success!'));
    }
}
