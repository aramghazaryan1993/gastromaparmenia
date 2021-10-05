    <header>
        <div class="header">
            <div class="containerBig">
                <div class="head">
                    <div class="menu">
                        <a href="#" id="menuToggle"> <span class="navClosed"></span> </a>
                        <nav>
              <li class="dropdown">

                  @if(app()->getLocale() == 'am')
                      <a  class=" dropdown-toggle dro" href="#" role="button" id="dropLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('web_sayt/imag/am.jpg') }}" alt="img">
                      </a>
                  @endif

                  @if(app()->getLocale() == 'en')
                      <a  class=" dropdown-toggle dro" href="#" role="button" id="dropLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('web_sayt/imag/en.svg') }}" alt="img">
                      </a>
                  @endif


                  @if(app()->getLocale() != 'am')
                  <ul class="dropdown-menu droplang "  aria-labelledby="dropLink">
                          <li><a class="dropdown-item" href="javascript:;" onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                    '/'+'am');" >
                              <img src="{{ asset('web_sayt/imag/am.jpg') }}" alt="img"></a>
                          </li>       
                      </ul>
                  @endif
                     
                  @if(app()->getLocale() != 'en')
                      <ul class="dropdown-menu droplang "  aria-labelledby="dropLink">
                          <li><a class="dropdown-item" href="javascript:;" onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                        '/'+'en');" >
                              <img src="{{ asset('web_sayt/imag/en.svg') }}" alt="img"></a>
                          </li>       
                      </ul>
                  @endif

                    </li>

                          <a @if(empty(Request::segment(2))) href="#about" @else href="{{ route('index',app()->getLocale())}}/#about"@endif class="scroll">{{__('site.About')}} </a>


                            <div class="dropdown">
                                <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__('site.Regions')}}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  @foreach($ShowRegion as $Region)
                                   
                                    <a class="dropdown-item" href="{{ route('region list',['id' => $Region->id,app()->getLocale()]) }}">

                                         @if(app()->getLocale() == 'am')
                                           {{ $Region->region_am }}</a>
                                         @endif

                                         @if(app()->getLocale() == 'en')
                                           {{ $Region->region_en }}
                                         @endif

                                    </a>

                                  @endforeach
                                </div>
                            </div>
                            <a @if(empty(Request::segment(2))) href="#event" @else href="{{ route('index',app()->getLocale())}}/#event"@endif  class="scroll">{{__('site.Events')}} </a>
                            
                            <a @if(empty(Request::segment(2))) href="#contact" @else href="{{ route('index',app()->getLocale())}}/#contact"@endif  class="scroll">{{__('site.Contact')}}</a>
                        </nav>
                    </div>
                    <div class="logo">
                        <a href="{{ route('index',app()->getLocale()) }}">
                            <img src="{{ asset('web_sayt/imag/logo.png') }}" alt="logo"></a>
                    </div>
                    <!--  <h1>gastro camp Armenia</h1> -->
                    <div class="menuForm">
                        <form method="post" action="{{ route('search',app()->getLocale()) }}" >
                          {{csrf_field()}}
                            <input name="search" type="text" placeholder=" " class="searchinp" required>
                            <a class="reset" style="text-decoration: none; cursor: pointer;" >X</a>
                            <button type="submit"  ></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>