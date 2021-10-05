@extends('adminka.layouts.apptest')

@section('title', 'Контакты')




@yield('header')

  @section('content')

    <div id="wrapper">

      @include('adminka.layouts.leftmenu')

      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Ադմինիստրատորի վահանակ</a>
          </li>
          <li class="breadcrumb-item active">Մարզեր/ <strong style="text-align: center !important; color: red;">{{ $ShowRegionName->region_am }}</strong></li>
     </ol>



          @include('adminka.include.region.iframe')
      
          @include('adminka.include.region.description')
    
          @include('adminka.include.region.product')

          @include('adminka.include.region.restoran')

          @include('adminka.include.region.tour')

          @include('adminka.include.region.event')
      
@endsection  





@yield('footer')
