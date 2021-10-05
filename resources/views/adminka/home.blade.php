@extends('adminka.layouts.apptest')

@section('title', 'Գլխավոր')




@yield('header')

  @section('content')

    <div id="wrapper">


      @include('adminka.layouts.leftmenu')

      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Ադմինիստրատորի վահանակ</a>
          </li>
          <li class="breadcrumb-item active">Գլխավոր</li>
          <li class="breadcrumb-item active">Մեր մասին և կոնտակտներ</li>
      </ol>

      @include('adminka.include.home.about')

      @include('adminka.include.home.contact') 


   

    @endsection  





@yield('footer')
