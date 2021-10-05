<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use View;

class AdminProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->Region();
      
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function  Region()
    {
        $Region = DB::table('region')->get();

        View::composer('adminka.layouts.leftmenu', function($view) use($Region) {
            $view->with('ShowRegion',$Region);
            });

    }


}
