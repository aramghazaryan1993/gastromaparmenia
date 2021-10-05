<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutModel;
use App\EventsModel;
use App\KnightsSuportModel;
use App\ArganizationsModel;
use DB;

class IndexController extends Controller
{

	public function About()
	{
		return AboutModel::all()->first();
	}

	public function Events()
	{
		return EventsModel::all();
	}

	public function SuccessStories()
	{
		return DB::table('success_stories')
			   ->join('success_stories_img', 'success_stories_img.success_stories_id', 'success_stories.id')
			   ->where('home_image',1)
			   ->limit(3)
			   ->get();
	}

	public function Organizations()
	{
		return ArganizationsModel::all();
	}

    public function index()
    {   
    	$About  = $this->About();
    	$Events = $this->Events();
    	
     	  return view('index',compact('About','Events'));
    }

    public function test()
    {
        return view('search');
    }
}
