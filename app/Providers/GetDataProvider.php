<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use View;


class GetDataProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->Header();
        $this->Footer();
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

        View::composer('layouts.app_home', function($view) use($Region) {
            $view->with('ShowRegion',$Region);
            });

    }

    public function ProgramMenu()
    {
        // $ProgramMenu = DB::table('menu_programs')->get();

        // View::composer('layouts.app_home', function($view) use($ProgramMenu) {
        //     $view->with('ShowProgramMenu',$ProgramMenu);
        //     });
    }

    public function Footer()
    {
        $Contact = DB::table('contact')->first();

        View::composer('layouts.app_home', function($view) use($Contact) {
            $view->with('ShowContact',$Contact);
            });
    }
    
    public function Header()
    {
        $Header = DB::table('region')->get();

        View::composer('layouts.app_home', function($view) use($Header) {
            $view->with('ShowRegion',$Header);
            });
    }
}
