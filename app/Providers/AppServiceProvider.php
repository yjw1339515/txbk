<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use View;

use App\Http\Controllers\home\IndexController;
use App\Http\Controllers\home\CartController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // 数据共享
       View::share('common_cates_data', IndexController::getPidCates());
       View::share('common_goods_data', CartController::getCarGoods());
       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
