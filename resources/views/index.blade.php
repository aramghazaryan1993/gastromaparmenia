@extends('layouts.app_home')

@section('title', __('site.Home') )



  @section('content') 

  @include('include.map')

    <div class="containerBig">
        <div class="line"></div>
    </div>
    <section>
        <div class="containerBig" id="about">
            <div class="title">
                <h1>
                  @if(app()->getLocale() == 'am')
                     {{ $About->about_am }}
                  @elseif(app()->getLocale() == 'en')
                     {{ $About->about_en }}
                  @endif
                </h1>
            </div>
            <div class="texthide">
                <p>
                  @if(app()->getLocale() == 'am')
                     {{ $About->about_text_am }}
                  @elseif(app()->getLocale() == 'en')
                     {{ $About->about_text_en }}
                  @endif
                </p>
            </div>
            <div class="arrow">
                <p class="svgarrow"> {{__('site.Read more')}}
                    <svg width="18" height="26" fill="none" xmlns="http://www.w3.org/2000/svg" class="svgbutton">
                        <path d="M9.00049 23.0002L9.00049 9.25024" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.00049 4.25024L9.00049 1.75024" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.5002 16.75L9.00024 24.25L1.50024 16.75" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </p>
            </div>
        </div>
    </section>
    <div class="containerBig">
        <div class="line"></div>
    </div>
    <section>
        <div class="containerBig" id="event">
          @foreach($Events as $Event)

            <div class="title">
                <h2>
                  @if(app()->getLocale() == 'am')
                     {{ $Event->event_am }}
                  @elseif(app()->getLocale() == 'en')
                     {{ $Event->event_en }}
                  @endif
                </h2>
            </div>
            <div class="eventImg">
                <img src="{{ asset('web_sayt/upload_img/events/'.$Event->img) }}" alt="img">
            </div>
           <div class="texthide">
                <p>
                  @if(app()->getLocale() == 'am')
                     {{ $Event->event_text_am }}
                  @elseif(app()->getLocale() == 'en')
                     {{ $Event->event_text_en }}
                  @endif
                </p>
            </div>
            <div class="arrow">
                <p class="svgarrow"> {{__('site.Read more')}}
                    <svg width="18" height="26" fill="none" xmlns="http://www.w3.org/2000/svg" class="svgbutton">
                        <path d="M9.00049 23.0002L9.00049 9.25024" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.00049 4.25024L9.00049 1.75024" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.5002 16.75L9.00024 24.25L1.50024 16.75" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </p>
            </div>
        @endforeach
        </div>
    </section>
    <div class="containerBig">
        <div class="line"></div>
    </div>

  @endsection



