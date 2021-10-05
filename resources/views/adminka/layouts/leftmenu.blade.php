
    <!-- Leftmenu -->
    <ul class="sidebar navbar-nav toggled">
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Գլխավոր</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Միջոցառումներ</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           <a class="dropdown-item" href="{{route('event')}}">Միջոցառումներ</a>
          
    
          {{--  @if (Route::has('register'))
          <a class="dropdown-item" href="{{ route('register') }}" target="_blank">{{ __('Регистрация') }}</a>
           @endif --}}
          <a class="dropdown-item" href="{{ route('show user') }}">Փոփոխել գաղտնաբառը</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>

                                        <!--Մարզեր -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Մարզեր</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          @foreach($ShowRegion as $key => $value)
            <a class="dropdown-item" href="{{ route('region',['id' => $value->id]) }}">{{ $value->region_am }}</a>
           @endforeach 
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
    <div id="content-wrapper">
      <div class="container-fluid">

      
      