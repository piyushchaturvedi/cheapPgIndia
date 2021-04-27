<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 7/3/2019
 * Time: 9:27 PM
 */
namespace Modules\Coupon;

use Illuminate\Support\ServiceProvider;
use Modules\ModuleServiceProvider;
use Modules\Coupon\Providers\RouterServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('coupon.php'),
        ]);

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/config.php', 'coupon'
        );

        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'coupon'=>[
                "position"=>20,
                'url'   => 'admin/module/coupon',
                'title' => __("Coupon"),
                'icon'  => 'icon ion-ios-bookmarks',
                'permission'=>'page_view'
            ],
        ];
    }
}
