<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('client.header',function($view){
        $dang_xe = DB::table('tbl_style_cars')->get();
        $view->with('dang_xe',$dang_xe);

        $hang_xe = DB::table('tbl_category_cars')->get();
        $view->with('hang_xe',$hang_xe);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__.'/../Helpers/simple_html_dom.php';
    }
}
