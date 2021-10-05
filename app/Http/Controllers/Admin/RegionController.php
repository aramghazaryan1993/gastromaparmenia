<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IframeModel;
use App\RegionModell;
use App\RegionInfoModel;
use App\RegionImgModel;
use DB;
use File;


class RegionController extends Controller
{

    public function RegionName($id)
    {
          return RegionModell::where('id','=',$id)->first();
    }

	public function Iframe($id)
    { 
         return IframeModel::where('id','=',$id)->first();
    }

    public function EditIframe(request $request,$id)
    { 
         $Edit =  IframeModel::where('id','=',$id)->first();

         $Edit->map = $request->map;
         $Edit->save();

        if($Edit)
        {
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
        } 
    }

    
    //Description
    public function RegionInfoDescription($id)
    {
        return RegionInfoModel::where('region_id','=',$id)->where('region_info_type','=',1)->first();
    }

    public function EditRegionInfoDescription(request $request,$id)
    {
        $Edit = RegionInfoModel::where('id','=',$id)
                                ->where('region_info_type','=',1)
                                ->first();
                              

        $Edit->region_info_name_am   = $request->region_info_name_am;
        $Edit->region_info_name_en   = $request->region_info_name_en;
        $Edit->region_info_text_am   = $request->region_info_text_am;
        $Edit->region_info_text_en   = $request->region_info_text_en;
        $Edit->region_info_search_am = $request->region_info_search_am;
        $Edit->region_info_search_en = $request->region_info_search_en;
        $Edit->save();

        if($Edit)
        {
            return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
        } 
    }

    public function ImageDescription($id)
    {
        return RegionImgModel::where('region_id','=',$id)
                               ->where('region_info_type','=',1)
                               ->get();
    }


    public function DeleteImgDescription(request $request,$id)
    {
        $DeleteImg    = RegionImgModel::where('id',$request->delete_id)->first();
        $DeleteImg->delete();

          if(File::exists(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img))){
            File::delete(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img));
         }
    
         if($DeleteImg)
         {
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր նկարը հաջողությամբ հեռացվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր նկարը չի հեռացվել։');
         } 
    }



    public function AddImageDescription(request $request,$id)
    {
      
        // Upload File Multiple
        if($img=$request->file('img'))
        {
           foreach ($img as  $value)
           {
             $img_name     = rand() . '.' . $value->getClientOriginalExtension();
             $value->move(public_path('web_sayt/upload_img/region/'), $img_name);
             $data[]=$img_name;     
           }
        }

        // insert data Multiple
        foreach ($data as  $ImgName)
        {
           $AddImage = new RegionImgModel;
           $AddImage->region_info_img     = $ImgName; 
           $AddImage->region_id = $id; 
           $AddImage->region_info_id = 1; 
           $AddImage->region_info_type = 1; 
           $AddImage->save();
         } 
        
        if($AddImage)
         {
         return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր տվյալները հաջողությամբ մուտքագրվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր տվյալները չեն մուտքագրվել։');
         } 

    }


    // Product
    public function RegionInfoProduct($id)
    {
        return RegionInfoModel::where('region_id','=',$id)->where('region_info_type','=',2)->first();
    }

    public function EditRegionInfoProduct(request $request,$id)
    {
        //$url_segment = \Request::segment(3);
        $Edit = RegionInfoModel::where('id','=',$id)
                                ->where('region_info_type','=',2)
                                ->first();

        $Edit->region_info_name_am   = $request->region_info_name_am;
        $Edit->region_info_name_en   = $request->region_info_name_en;
        $Edit->region_info_text_am   = $request->region_info_text_am;
        $Edit->region_info_text_en   = $request->region_info_text_en;
        $Edit->region_info_search_am = $request->region_info_search_am;
        $Edit->region_info_search_en = $request->region_info_search_en;
        $Edit->save();


           return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
    }

     public function ImageProduct($id)
    {
        return RegionImgModel::where('region_id','=',$id)
                               ->where('region_info_type','=',2)
                               ->get();
    }


    public function DeleteImgProduct(request $request,$id)
    {
        $DeleteImg    = RegionImgModel::where('id',$request->delete_id)->first();
        $DeleteImg->delete();

          if(File::exists(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img))){
            File::delete(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img));
         }
    
         if($DeleteImg)
         {
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր նկարը հաջողությամբ հեռացվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր նկարը չի հեռացվել։');
         } 
    }



    public function AddImageProduct(request $request,$id)
    {
      
        // Upload File Multiple
        if($img=$request->file('img'))
        {
           foreach ($img as  $value)
           {
             $img_name     = rand() . '.' . $value->getClientOriginalExtension();
             $value->move(public_path('web_sayt/upload_img/region/'), $img_name);
             $data[]=$img_name;     
           }
        }

        // insert data Multiple
        foreach ($data as  $ImgName)
        {
           $AddImage = new RegionImgModel;
           $AddImage->region_info_img     = $ImgName; 
           $AddImage->region_id = $id; 
           $AddImage->region_info_id = 2; 
           $AddImage->region_info_type = 2; 
           $AddImage->save();
         } 
        
        if($AddImage)
         {
         return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր տվյալները հաջողությամբ մուտքագրվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր տվյալները չեն մուտքագրվել։');
         } 

    }


    // RESTAURANTS
    public function RegionInfoRestoran($id)
    {
        return RegionInfoModel::where('region_id','=',$id)->where('region_info_type','=',3)->first();
    }

    public function EditRegionInfoRestoran(request $request,$id)
    {
        $Edit = RegionInfoModel::where('id','=',$id)
                                ->where('region_info_type','=',3)
                                ->first();
                              

        $Edit->region_info_name_am   = $request->region_info_name_am;
        $Edit->region_info_name_en   = $request->region_info_name_en;
        $Edit->region_info_text_am   = $request->region_info_text_am;
        $Edit->region_info_text_en   = $request->region_info_text_en;
        $Edit->region_info_search_am = $request->region_info_search_am;
        $Edit->region_info_search_en = $request->region_info_search_en;
        $Edit->save();


        if($Edit)
        {
            return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
        } 
    }

     public function ImageRestoran($id)
    {
        return RegionImgModel::where('region_id','=',$id)
                               ->where('region_info_type','=',3)
                               ->get();
    }


    public function DeleteImgRestoran(request $request,$id)
    {
        $DeleteImg    = RegionImgModel::where('id',$request->delete_id)->first();
        $DeleteImg->delete();

          if(File::exists(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img))){
            File::delete(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img));
         }
    
         if($DeleteImg)
         {
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր նկարը հաջողությամբ հեռացվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր նկարը չի հեռացվել։');
         } 
    }



    public function AddImageRestoran(request $request,$id)
    {
      
        // Upload File Multiple
        if($img=$request->file('img'))
        {
           foreach ($img as  $value)
           {
             $img_name     = rand() . '.' . $value->getClientOriginalExtension();
             $value->move(public_path('web_sayt/upload_img/region/'), $img_name);
             $data[]=$img_name;     
           }
        }

        // insert data Multiple
        foreach ($data as  $ImgName)
        {
           $AddImage = new RegionImgModel;
           $AddImage->region_info_img     = $ImgName; 
           $AddImage->region_id = $id; 
           $AddImage->region_info_id = 3; 
           $AddImage->region_info_type = 3; 
           $AddImage->save();
         } 
        
        if($AddImage)
         {
         return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր տվյալները հաջողությամբ մուտքագրվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր տվյալները չեն մուտքագրվել։');
         } 

    }


    // TOUR
    public function RegionInfoTour($id)
    {
        return RegionInfoModel::where('region_id','=',$id)->where('region_info_type','=',4)->first();
    }

    public function EditRegionInfoTour(request $request,$id)
    {
        $Edit = RegionInfoModel::where('id','=',$id)
                                ->where('region_info_type','=',4)
                                ->first();
                              

        $Edit->region_info_name_am   = $request->region_info_name_am;
        $Edit->region_info_name_en   = $request->region_info_name_en;
        $Edit->region_info_text_am   = $request->region_info_text_am;
        $Edit->region_info_text_en   = $request->region_info_text_en;
        $Edit->region_info_search_am = $request->region_info_search_am;
        $Edit->region_info_search_en = $request->region_info_search_en;
        $Edit->save();


        if($Edit)
        {
            return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
        } 
    }

     public function ImageTour($id)
    {
        return RegionImgModel::where('region_id','=',$id)
                               ->where('region_info_type','=',4)
                               ->get();
    }


    public function DeleteImgTour(request $request,$id)
    {
        $DeleteImg    = RegionImgModel::where('id',$request->delete_id)->first();
        $DeleteImg->delete();

          if(File::exists(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img))){
            File::delete(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img));
         }
    
         if($DeleteImg)
         {
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր նկարը հաջողությամբ հեռացվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր նկարը չի հեռացվել։');
         } 
    }



    public function AddImageTour(request $request,$id)
    {
      
        // Upload File Multiple
        if($img=$request->file('img'))
        {
           foreach ($img as  $value)
           {
             $img_name     = rand() . '.' . $value->getClientOriginalExtension();
             $value->move(public_path('web_sayt/upload_img/region/'), $img_name);
             $data[]=$img_name;     
           }
        }

        // insert data Multiple
        foreach ($data as  $ImgName)
        {
           $AddImage = new RegionImgModel;
           $AddImage->region_info_img     = $ImgName; 
           $AddImage->region_id = $id; 
           $AddImage->region_info_id = 4; 
           $AddImage->region_info_type = 4; 
           $AddImage->save();
         } 
        
        if($AddImage)
         {
         return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր տվյալները հաջողությամբ մուտքագրվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր տվյալները չեն մուտքագրվել։');
         } 

    }


    // Event
    public function RegionInfoEvent($id)
    {
        return RegionInfoModel::where('region_id','=',$id)->where('region_info_type','=',5)->first();
    }

    public function EditRegionInfoEvent(request $request,$id)
    {
        $Edit = RegionInfoModel::where('id','=',$id)
                                ->where('region_info_type','=',5)
                                ->first();
                              

        $Edit->region_info_name_am   = $request->region_info_name_am;
        $Edit->region_info_name_en   = $request->region_info_name_en;
        $Edit->region_info_text_am   = $request->region_info_text_am;
        $Edit->region_info_text_en   = $request->region_info_text_en;
        $Edit->region_info_search_am = $request->region_info_search_am;
        $Edit->region_info_search_en = $request->region_info_search_en;
        $Edit->save();


        if($Edit)
        {
            return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin/Region/'.$request->region_id)->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
        } 
    }

    public function ImageEvent($id)
    {
        return RegionImgModel::where('region_id','=',$id)
                               ->where('region_info_type','=',5)
                               ->get();
    }


    public function DeleteImgEvent(request $request,$id)
    {
        $DeleteImg    = RegionImgModel::where('id',$request->delete_id)->first();
        $DeleteImg->delete();

          if(File::exists(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img))){
            File::delete(public_path('web_sayt/upload_img/region/'.$DeleteImg->region_info_img));
         }
    
         if($DeleteImg)
         {
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր նկարը հաջողությամբ հեռացվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր նկարը չի հեռացվել։');
         } 
    }



    public function AddImageEvent(request $request,$id)
    {
      
        // Upload File Multiple
        if($img=$request->file('img'))
        {
           foreach ($img as  $value)
           {
             $img_name     = rand() . '.' . $value->getClientOriginalExtension();
             $value->move(public_path('web_sayt/upload_img/region/'), $img_name);
             $data[]=$img_name;     
           }
        }

        // insert data Multiple
        foreach ($data as  $ImgName)
        {
           $AddImage = new RegionImgModel;
           $AddImage->region_info_img     = $ImgName; 
           $AddImage->region_id = $id; 
           $AddImage->region_info_id = 5;
           $AddImage->region_info_type = 5; 
           $AddImage->save();
         } 
        
        if($AddImage)
         {
         return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր տվյալները հաջողությամբ մուտքագրվել է։');
         }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր տվյալները չեն մուտքագրվել։');
         } 

    }


    public function Index($id)
    {
        $ShowIframe = $this->Iframe($id);
        $ShowRegionName = $this->RegionName($id);

        //Description
        $ShowRegionInfoDescription = $this->RegionInfoDescription($id);
        $ShowImageDescription = $this->ImageDescription($id);

        // Product 
        $ShowRegionInfoProduct = $this->RegionInfoProduct($id);
        $ShowImageProduct = $this->ImageProduct($id);

        // Restoran 
        $ShowRegionInfoRestoran = $this->RegionInfoRestoran($id);
        $ShowImageRestoran = $this->ImageRestoran($id);

        //Tour
        $ShowRegionInfoTour = $this->RegionInfoTour($id);
        $ShowImageTour = $this->ImageTour($id);

        //Event
        $ShowRegionInfoEvent = $this->RegionInfoEvent($id);
        $ShowImageEvent = $this->ImageEvent($id);


        return view('adminka.region',compact('ShowRegionName','ShowIframe','ShowRegionInfoDescription','ShowImageDescription','ShowRegionInfoProduct','ShowImageProduct','ShowRegionInfoRestoran','ShowImageRestoran','ShowRegionInfoTour','ShowImageTour','ShowRegionInfoEvent','ShowImageEvent'));
    }
}
