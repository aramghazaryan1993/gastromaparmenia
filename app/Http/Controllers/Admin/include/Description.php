<?php
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
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin/Region/'.$id)->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
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

          if(File::exists(public_path('web_sayt/imag/'.$DeleteImg->region_info_img))){
            File::delete(public_path('web_sayt/imag/'.$DeleteImg->region_info_img));
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
             $value->move(public_path('web_sayt/imag/'), $img_name);
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