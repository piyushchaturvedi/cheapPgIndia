<?php
namespace Modules\Hostel;
use Modules\ModuleServiceProvider;
use Modules\Hostel\Models\Hotel;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        if(!Hotel::isEnable()) return [];
        return [
            'hostel'=>[
                "position"=>32,
                'url'        => 'admin/module/hostel',
                'title'      => __('Hostel'),
                'icon'       => 'fa fa-building-o',
                'permission' => 'hotel_view',
                'children'   => [
                    'add'=>[
                        'url'        => 'admin/module/hostel',
                        'title'      => __('All Hostels'),
                        'permission' => 'hotel_view',
                    ],
                    'create'=>[
                        'url'        => 'admin/module/hostel/create',
                        'title'      => __('Add new Hostel'),
                        'permission' => 'hotel_create',
                    ],
                    'attribute'=>[
                        'url'        => 'admin/module/hostel/attribute',
                        'title'      => __('Attributes'),
                        'permission' => 'hotel_manage_attributes',
                    ],
                    'room_attribute'=>[
                        'url'        => 'admin/module/hostel/room/attribute',
                        'title'      => __('Room Attributes'),
                        'permission' => 'hotel_manage_attributes',
                    ],
                    'recovery'=>[
                        'url'        => 'admin/module/hostel/recovery',
                        'title'      => __('Recovery'),
                        'permission' => 'hotel_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Hotel::isEnable()) return [];
        return [
            'hostel'=>Hotel::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Hotel::isEnable()) return [];
        return [
            'hotel'=>[
                'class' => Hotel::class,
                'name'  => __("Hotel"),
                'items' => Hotel::searchForMenu(),
                'position'=>41
            ]
        ];
    }


    public static function getUserMenu()
    {
        $res = [];
        if(Hotel::isEnable()){
            $res['hotel'] = [
                'url'   => route('hostel.vendor.index'),
                'title'      => __("Manage Hostel"),
                'icon'       => Hotel::getServiceIconFeatured(),
                'position'   => 30,
                'permission' => 'hotel_view',
                'children' => [
                    [
                        'url'   => route('hostel.vendor.index'),
                        'title'  => __("All Hotels"),
                    ],
                    [
                        'url'   => route('hostel.vendor.create'),
                        'title'      => __("Add Hotel"),
                        'permission' => 'hotel_create',
                    ],
                    [
                        'url'   => route('hostel.vendor.booking_report'),
                        'title'      => __("Booking Report"),
                        'permission' => 'hotel_view',
                    ],
                    [
                        'url'   => route('hostel.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'hotel_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Hotel::isEnable()) return [];
        return [
            'form_search_hotel'=>"\\Modules\\Hosel\\Blocks\\FormSearchHotel",
            'list_hotel'=>"\\Modules\\Hostel\\Blocks\\ListHotel",
        ];
    }
}
