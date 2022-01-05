@extends('layouts.main_layout')

@section('title','paramétres de logiciel')

@section('vendor-style')
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.min.css"
          integrity="sha512-H/zVLBHVS8ZRNSR8wrNZrGFpuHDyN6+p6uaADRefLS4yZYRxfF4049g1GhT+gDExFRB5Kf9jeGr8vueDsyBhhA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

@endsection

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')
  <!--  Hover-->
  <div class="row">
                            <div class="col s12">
                                <div id="hover" class="card card-tabs">
                                    <div class="card-content">
                                        <div class="card-title">
                                            <div class="row">
                                                <div class="col s24 m6 l10">
                                                    <h4 class="card-title">Support en ligne</h4>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div>
                                          
                                            
                                            
                                            <div class="card-action">
                                                    <a href="http://expocartes.monrezo.be/support.php">Accés au groupe de support</a>
                                                </div>
                                                <div class="card-action">
                                                    <a href="http://expocartes.monrezo.be/faq_ea.htm">FAQ sur le site
        ExpoActes</a>
</div>
                                               
                                               
                                            </div>

                                        </div>
                                    

                                               
                                                                













                                    </div>
                                </div>








                            </div>
                        </div>


@endsection