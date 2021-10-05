<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IframeModel;
use App\RegionModell;
use App\RegionInfoModel;
use App\RegionImgModel;
use DB;

class RegionListController extends Controller
{
    public function RegionName($lang,$id)
    {
    	return RegionModell::where('id', '=', $id)->first();
    }

	public function Iframe($lang,$id)
	{
		return IframeModel::where('region_id', '=', $id)->first();
	}

	public function RegionList($lang,$id)
	{
		$RegionInfo = RegionInfoModel::where('region_id', '=', $id)->get();

						return $RegionInfo;	
	}

	
	public function RegionImgList($lang,$id)
	{
		$RegionImgList =  DB::table('region_info')
					   ->join('region_info_img', 'region_info_img.region_info_id', 'region_info.id')
		 			   ->where('region_info_img.region_id',$id)->get();

		 			  return $RegionImgList;
	}

	
	public function Index($lang,$id)
	{
		 $RegionName    = $this->RegionName($lang,$id);
		 $Iframe 		= $this->Iframe($lang,$id);
		 $RegionList 	= $this->RegionList($lang,$id);
		 $RegionImgList = $this->RegionImgList($lang,$id);

		return view('marzer',compact('Iframe','RegionList','RegionImgList','RegionName'));
	}
}
