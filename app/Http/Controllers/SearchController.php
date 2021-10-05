<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IframeModel;
use App\RegionModell;
use App\RegionInfoModel;
use App\RegionImgModel;
use DB;
use Validator,Redirect,Response,File;

class SearchController extends Controller
{
   public function index(request $request)
	{
		$this->validate($request, [
            'search'      => 'required',
         ]);

		$SearchAm = $request->search;

		$RegionInfo = RegionInfoModel::where('region_info_search_am','LIKE', '%'.$SearchAm.'%')
					  ->orWhere('region_info_search_en','LIKE', '%'.$SearchAm.'%')
					  ->get();

   

		$RegionName = [];
		foreach ($RegionInfo as $key => $value) 
		{
			$RegionName = RegionModell::where('id','=',$value->region_id)->first();
		}




	    $RegionImgList = [];		
		foreach ($RegionInfo as $key => $value)
		{
		     $RegionImgList =  DB::table('region_info')
							->join('region_info_img', 'region_info_img.region_info_id', 'region_info.id')
				 			->where('region_info_img.region_id',$value->region_id)->get();
		}

			return view('search',compact('RegionName','RegionInfo','RegionImgList'));
	}



}
