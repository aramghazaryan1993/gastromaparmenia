@extends('layouts.app_home')

@section('title', 'Главная страница')



  @section('content') 

  
     <section>
        <div class="hedtitle">
            <h2>
                @if(!empty($RegionName->region_am) || !empty($RegionName->region_en))

                    @if(app()->getLocale() == 'am')
                        {{ $RegionName->region_am }}</a>
                    @endif

                    @if(app()->getLocale() == 'en')
                        {{ $RegionName->region_en }}
                    @endif

                @else
                        {{__('site.Search message') }}
                @endif

            </h2>
        </div>
    </section>
    

  @foreach($RegionInfo as $regionInfo)
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
              @foreach($RegionImgList->where('region_info_type', '=', $regionInfo->region_info_type) as $key => $value)  
                                     
                  <li data-target="#mycarousel{{ $regionInfo->region_info_type }}" data-slide-to="{{ $key }}"></li>

              @endforeach
          </ol>

          <div class="carousel-inner">
                   
                   @foreach($RegionImgList->where('region_info_type', '=', $value->region_info_type) as $key => $value)

                    <div class="carousel-item">
                        <img src="{{ asset('web_sayt/imag/'.$value->region_info_img) }}" class="d-block w-100" alt="img">
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
                <p>
                   @if(app()->getLocale() == 'am')
                     {{ $regionInfo->region_info_text_am }}
                   @elseif(app()->getLocale() == 'en')
                     {{ $regionInfo->region_info_text_en }}
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



