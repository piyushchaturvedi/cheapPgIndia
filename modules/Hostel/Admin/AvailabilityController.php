<?php
namespace Modules\Hostel\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;

class AvailabilityController extends \Modules\Hostel\Controllers\AvailabilityController
{
    protected $indexView = 'Hostel::admin.room.availability';

    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/hostel');
        $this->middleware('dashboard');
    }

    protected function hasHotelPermission($hotel_id = false){
        if(empty($hotel_id)) return false;

        $hotel = $this->hotelClass::find($hotel_id);
        if(empty($hotel)) return false;

        if(!$this->hasPermission('hotel_manage_others') and $hotel->create_user != Auth::id()){
            return false;
        }

        $this->currentHotel = $hotel;
        return true;
    }
}
