<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutModel;
use App\EventsModel;
use App\ContactModel;
use DB,File;


class HomeController extends Controller
{


    public function About()
    {
      return  AboutModel::all()->first();
    }

    public function EditAbout(request $request)
    {
       $Edit = AboutModel::all()->first();

        $Edit->about_am        = $request->name_am;
        $Edit->about_en        = $request->name_en;
        $Edit->about_text_am   = $request->text_am;
        $Edit->about_text_en   = $request->text_en;

        $Edit->save();

         if($Edit)
        {
            return redirect()->to('myadmin')->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin')->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
        } 
    }


    public function Event()
    {
         $ShowEvent =  EventsModel::orderBy('id' , 'desc')->paginate(2);
         return view('adminka.event',compact('ShowEvent'));
    }


     public function AddEvent(request $request)
    {
       

        $Add = new EventsModel;

        $Add->event_am        = $request->event_am;
        $Add->event_en        = $request->event_en;
        $Add->event_text_am   = $request->event_text_am;
        $Add->event_text_en   = $request->event_text_en;

        $image        = $request->file('img');
        $img_name     = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('web_sayt/upload_img/events/'), $img_name);
        $Add->img    = $img_name; 


        $Add->save();

        if($Add)
        {
            return redirect()->to('myadmin/Event')->with('status', 'ձեր տվյալները հաջողությամբ մուտքագրվել է։');
        }else{
            return redirect()->to('myadmin/Event')->with('status', 'Ներեցեք ձեր տվյալները չեն մուտքագրվել։');
        } 
    }


     public function EditEvent(request $request,$id)
    {

        $Edit = EventsModel::where('id','=',$id)->first();

        $Edit->event_am        = $request->event_am;
        $Edit->event_en        = $request->event_en;
        $Edit->event_text_am   = $request->event_text_am;
        $Edit->event_text_en   = $request->event_text_en;

        if(!empty($request->file('img')))
         {
             $image        = $request->file('img');
             $img_name     = rand() . '.' . $image->getClientOriginalExtension();
             $image->move(public_path('web_sayt/upload_img/events/'), $img_name);
             $Edit->img    = $img_name; 
         }

        $Edit->save();

        if($Edit)
        {
            return redirect()->to('myadmin/Event')->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin/Event')->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
        } 
    }

    public function DeleteEvent($id)
    {
        $Delete = EventsModel::where('id',$id)->first();

          if(File::exists(public_path('web_sayt/upload_img/events/'.$Delete->img))){
            File::delete(public_path('web_sayt/upload_img/events/'.$Delete->img));
         }

         $Delete->delete();
    
         if($Delete)
         {
            return redirect()->to('myadmin/Event')->with('status', 'ձեր տվյալները հաջողությամբ հեռացված են։');
         }else{
            return redirect()->to('myadmin/Event')->with('status', 'Ներեցեք ձեր տվյալները չեն հեռացվել։');
         } 
    }

    public function Contact()
    {
        return  ContactModel::all()->first();
    }


    public function EditContact(Request $request)
    {
       $Edit = ContactModel::all()->first();

       $Edit->adress_am = $request->adress_am;
       $Edit->adress_en = $request->adress_en;
       $Edit->phone     = $request->phone;
       $Edit->email     = $request->email;
       $Edit->facebook  = $request->facebook;
       $Edit->instagram = $request->instagram;
       $Edit->save();

        if($Edit)
        {
            return redirect()->to('myadmin')->with('status', 'ձեր տվյալները հաջողությամբ խմբագրված է։');
        }else{
            return redirect()->to('myadmin')->with('status', 'Ներեցեք ձեր տվյալները չեն խմբագրվել։');
        } 
    }


    public  function index()
    {
        $ShowAbout = $this->About();
        $ShowContact = $this->Contact();
        
    	   return view('adminka.home',compact('ShowAbout','ShowContact'));
    }




    


}
