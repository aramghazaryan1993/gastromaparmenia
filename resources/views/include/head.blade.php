<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
  @if(isset($RegionName->region_am) && !empty($RegionName->region_am))
		     @if(app()->getLocale() == 'am')
		             {{ $RegionName->region_am }}
		     @endif
		     @if(app()->getLocale() == 'en')
		              {{ $RegionName->region_en }}
		     @endif
  @else
             @yield('title')
  @endif
 

</title>

  <link rel="shortcut icon" href="{{ asset('web_sayt/imag/logo.png') }}">
  <link rel="stylesheet" href="{{ asset('web_sayt/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('web_sayt/css/style.css') }}">
</head>

<style type="text/css">
  .jfk-bubble,.gtx-bubblemce-widget, .mce-notification, .mce-notification-error,.mce-has-close,.mce-in{
            display: none;
          }
</style>