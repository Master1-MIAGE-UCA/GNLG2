@php
$lang='en';
if(session()->has('locale')){
  if(session()->has('locale')){
    $lang=session()->get('locale');
  }
}
$direction=($lang=='ar')?'rtl':'ltr';
$cssFolder=($lang=='ar')?'css-rtl':'css';
@endphp
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">
<!-- BEGIN: VENDOR CSS-->
@yield('vendor-style')
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
@if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))
<link rel="stylesheet" type="text/css"
  href="{{asset('app-assets/'.$cssFolder.'/themes/'.$configData['mainLayoutType'].'-template/materialize.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('app-assets/'.$cssFolder.'/themes/'.$configData['mainLayoutType'].'-template/style.css')}}">

@if($configData['mainLayoutType'] === 'horizontal-menu')
{{-- horizontal style file only for horizontal layout --}}
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/'.$cssFolder.'/layouts/style-horizontal.css')}}">
@endif
@else
<h1>mainLayoutType option is either empty or not set in config custom.php file.</h1>
@endif

@yield('page-style')

@if($direction === 'rtl')
{{-- rtl style file for rtl version --}}
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/style-rtl.css')}}">
@endif
<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<!-- <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/laravel-custom.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/'.$cssFolder.'/custom/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/amch-style.css')}}">
<!-- END: Custom CSS-->