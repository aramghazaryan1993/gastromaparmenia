@extends('layouts.app_home')

  @section('content') 


    <section>
        <div class="hedtitle">
            <h1>
                @if(app()->getLocale() == 'am')
                    {{ $RegionName->region_am }}</a>
                @endif

                @if(app()->getLocale() == 'en')
                    {{ $RegionName->region_en }}
                @endif
            </h1>
        </div>
    </section>

    <section>
        <div class="containerBig localmap">
            <div class="aside">
                <ul>
                    <li><a href="#DESCRIPTION">{{__('site.DESCRIPTION')}}</a></li>
                    <li><a href="#PRODUCTS">{{__('site.LOCAL PRODUCTS')}}</a></li>
                    <li><a href="#RESTAURANTS">{{__('site.RESTAURANTS & HOTELS')}}</a></li>
                    <li><a href="#TOUR">{{__('site.TOUR ROUTS')}}</a></li>
                    <li><a href="#EVENT">{{__('site.EVENTS')}}</a></li>
                </ul>
            </div>
            <div class="maparea">
              <iframe src="{{ $Iframe->map }}" width="640" height="480"></iframe>
            </div>
        </div>
    </section>


  @foreach($RegionList as $regionInfo)
    <div  class="hedtitle secondtitle" id="{{ $regionInfo->click_id }}">
           <h2>
             @if(app()->getLocale() == 'am')
                     {{ $regionInfo->region_info_name_am }}
             @elseif(app()->getLocale() == 'en')
                     {{ $regionInfo->region_info_name_en }}
             @endif
           </h2>
        </div>

<section>
  <div class="containerBig">
        <div class="line"></div>
    </div> 

<div class="containerBig">
           
    <div id="mycarousel{{ $regionInfo->region_info_type }}" class="carousel slide " data-ride="carousel">
          <ol class="carousel-indicators">
            
        <?php 

           $i = $RegionImgList->where('region_info_type', '=', $regionInfo->region_info_type); 
           
              for ($a=0; $a <count($i); $a++)
              { 
                   echo  "<li data-target='#mycarousel$regionInfo->region_info_type'   data-slide-to='".$a."'></li>";
              }
        ?>
              
          </ol>

          <div class="carousel-inner">
                   
                   @foreach($RegionImgList->where('region_info_type', '=', $regionInfo->region_info_type) as $key => $value)

                    <div class="carousel-item">
                        <img src="{{ asset('web_sayt/upload_img/region/'.$value->region_info_img) }}" class="d-block w-100" alt="img">
                    </div>
                    
                   @endforeach
                  
          </div>
                <a class="carousel-control-prev" href="#mycarousel{{ $regionInfo->region_info_type }}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#mycarousel{{ $regionInfo->region_info_type }}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div> 
</div>



    </section>

<section>
  <div  class="containerBig">
     <div class="texthide" >
                <p class= "mb-1">
                   @if(app()->getLocale() == 'am')
                     @php echo $regionInfo->region_info_text_am; 
                     @endphp
                   @elseif(app()->getLocale() == 'en')
                     @php echo $regionInfo->region_info_text_en; 
                     @endphp
                   @endif
                </p>
    </div>
              <div class="arrow">
                    <p  class="svgarrow"> {{__('site.Read more') }}
                       <svg width="18" height="26"  fill="none" xmlns="http://www.w3.org/2000/svg" class="svgbutton">
                        <path d="M9.00049 23.0002L9.00049 9.25024" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.00049 4.25024L9.00049 1.75024" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.5002 16.75L9.00024 24.25L1.50024 16.75"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                       </svg>
                    </p>
               </div>
                </div>
            </section> 
            @endforeach
            <div class="containerBig">
        <div class="line"></div>
    </div>



  @endsection



