<?php
namespace Modules\Dashboard\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Location\Models\Location;

class DashboardController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return View('Dashboard::index');
    }
    public function agreement()
    {
        $user = Auth::user();
        $locations=Location::where('deleted_at',null)->orderBy('name')->get();
        $data = [
            'locations'=>$locations ,
            'dataUser'         => $user,
            'page_title'       => __("Owner Agreement"),
            'breadcrumbs'      => [
                [
                    'name'  => __('Owner Agreement'),
                    'class' => 'active'
                ]
            ],
            'is_vendor_access' => $this->hasPermission('dashboard_vendor_access')
        ];
        return view('Dashboard::agreement', $data);
    }
    public function pg_agreement()
    {
        $user = Auth::user();
        $locations=Location::where('deleted_at',null)->orderBy('name')->get();
        $data = [
            'locations'=>$locations ,
            'dataUser'         => $user,
            'page_title'       => __("PG Agreement"),
            'breadcrumbs'      => [
                [
                    'name'  => __('PG Agreement'),
                    'class' => 'active'
                ]
            ],
            'is_vendor_access' => $this->hasPermission('dashboard_vendor_access')
        ];
        return view('Dashboard::pg-agreement', $data);
    }
}
