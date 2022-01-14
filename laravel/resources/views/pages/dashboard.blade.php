@extends('layouts.main_layout')
@section('title','Dashboard')

@section('vendor-style')

    <link rel="apple-touch-icon" href="{{asset('app-assets/images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/themes/vertical-dark-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/themes/vertical-dark-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/custom.css')}}">
@endsection

@section('content')
    <!-- BEGIN: Page Main-->

    <div class="container">
        <div class="section">
            <!-- card stats start -->
            <div id="card-stats" class="pt-0">
                <div class="row">
                    <div class="col s12 m6 l12">
                        <div class="card animate fadeLeft">
                            <div class="card-content cyan white-text">
                                <p class="card-stats-title"><i class="material-icons">person_outline</i>Total
                                    Utilisateurs</p>
                                <h4 class="card-stats-number white-text">{{$total_users}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l3">
                        <div class="card animate fadeLeft">
                            <div class="card-content red accent-2 white-text">
                                <p class="card-stats-title"><i class="material-icons">book</i>Total
                                    Actes Naissances</p>
                                <h4 class="card-stats-number white-text">{{$total_act_nai}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card animate fadeRight">
                            <div class="card-content orange lighten-1 white-text">
                                <p class="card-stats-title"><i class="material-icons">bookmark</i> Total Actes Mariages
                                </p>
                                <h4 class="card-stats-number white-text">{{$total_act_mar}}</h4>
                            </div>

                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card animate fadeRight">
                            <div class="card-content green lighten-1 white-text">
                                <p class="card-stats-title"><i class="material-icons">bookmark_border</i> Total Actes
                                    Divers</p>
                                <h4 class="card-stats-number white-text">{{$total_act_div}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card animate fadeRight">
                            <div class="card-content lime lighten-1 white-text">
                                <p class="card-stats-title"><i class="material-icons">content_copy</i> Total Actes Décès
                                </p>
                                <h4 class="card-stats-number white-text">{{$total_act_dec}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- START RIGHT SIDEBAR NAV -->

        <!-- END RIGHT SIDEBAR NAV -->
    </div>
    <div class="content-overlay"></div>

    <!-- END: Page Main-->
@endsection

@section('vendor-script')

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('app-assets/js/plugins.js')}}"></script>
    <script src="{{asset('app-assets/js/search.js')}}"></script>
    <script src="{{asset('app-assets/js/custom/custom-script.js')}}"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('app-assets/js/scripts/dashboard-analytics.js')}}"></script>
    <!-- END PAGE LEVEL JS-->


@endsection
