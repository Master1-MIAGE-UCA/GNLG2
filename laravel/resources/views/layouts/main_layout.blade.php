<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
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
    <!-- END: Custom CSS-->

    <meta name="csrf-token" content="{{ csrf_token() }}" />


    @yield('vendor-style')

    @yield('page-style')
</head>
<!-- END: Head-->

<body
    class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns   "
    data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
            <div class="nav-wrapper">

                <ul class="navbar-list right">
                    {{--                        <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="#" data-target="translation-dropdown"><span class="flag-icon flag-icon-gb"></span></a></li>--}}
                    <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen"
                                                        href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a>
                    </li>
                    <li class="hide-on-large-only search-input-wrapper"><a
                            class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i
                                class="material-icons">search</i></a></li>
                    {{--                        <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">5</small></i></a></li>--}}
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
                           data-target="profile-dropdown"><span class="avatar-status avatar-online"><img
                                    src="{{asset('app-assets/images/avatar/avatar-7.png')}}" alt="avatar"><i></i></span></a>
                    </li>
                </ul>
                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                    <li>
                        <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
                    </li>
                    <li class="divider"></li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>
                            A new order has been placed!</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle deep-orange small">today</span>
                            Director meeting started</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle amber small">trending_up</span>
                            Generate monthly report</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week ago
                        </time>
                    </li>
                </ul>
                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                    <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i>
                            Profile</a></li>
                    <li><a class="grey-text text-darken-1" href="app-chat.html"><i class="material-icons">chat_bubble_outline</i>
                            Chat</a></li>
                    <li><a class="grey-text text-darken-1" href="page-faq.html"><i
                                class="material-icons">help_outline</i> Help</a></li>
                    <li class="divider"></li>
                    <li><a class="grey-text text-darken-1" href="user-lock-screen.html"><i class="material-icons">lock_outline</i>
                            Lock</a></li>
                    <li><a class="grey-text text-darken-1" href="user-login.html"><i
                                class="material-icons">keyboard_tab</i> Logout</a></li>
                </ul>
            </div>
            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form id="navbarForm">
                        <div class="input-field search-input-sm">
                            <input class="search-box-sm mb-0" type="search" required="" id="search"
                                   placeholder="Explore Materialize" data-search="template-list">
                            <label class="label-icon" for="search"><i
                                    class="material-icons search-sm-icon">search</i></label><i
                                class="material-icons search-sm-close">close</i>
                            <ul class="search-list collection search-list-sm display-none"></ul>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
    </div>
</header>
<!-- END: Header-->
<ul class="display-none" id="default-search-main">
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">FILES</h6>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="{{asset('app-assets/images/icon/pdf-image.png')}}" width="24"
                                             height="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">Two new item submitted</span><small class="grey-text">Marketing
                            Manager</small></div>
                </div>
                <div class="status"><small class="grey-text">17kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="{{asset('app-assets/images/icon/doc-image.png')}}" width="24"
                                             height="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">52 Doc file Generator</span><small class="grey-text">FontEnd
                            Developer</small></div>
                </div>
                <div class="status"><small class="grey-text">550kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="{{asset('app-assets/images/icon/xls-image.png')}}" width="24"
                                             height="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">25 Xls File Uploaded</span><small class="grey-text">Digital Marketing
                            Manager</small></div>
                </div>
                <div class="status"><small class="grey-text">20kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="{{asset('app-assets/images/icon/jpg-image.png')}}" width="24"
                                             height="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small
                            class="grey-text">Web Designer</small></div>
                </div>
                <div class="status"><small class="grey-text">37kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">MEMBERS</h6>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="{{asset('app-assets/images/avatar/avatar-7.png')}}"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">John Doe</span><small
                            class="grey-text">UI designer</small></div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="{{asset('app-assets/images/avatar/avatar-8.png')}}"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Michal Clark</span><small
                            class="grey-text">FontEnd Developer</small></div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="{{asset('app-assets/images/avatar/avatar-10.png')}}"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">Milena Gibson</span><small class="grey-text">Digital Marketing</small>
                    </div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="{{asset('app-assets/images/avatar/avatar-12.png')}}"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small
                            class="grey-text">Web Designer</small></div>
                </div>
            </div>
        </a></li>
</ul>
<ul class="display-none" id="page-search-title">
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">PAGES</h6>
        </a></li>
</ul>
<ul class="display-none" id="search-not-found">
    <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span
                class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
</ul>


<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down "
                                                                                       src="{{asset('app-assets/images/logo/materialize-logo.png')}}"
                                                                                       alt="materialize logo"/><img
                    class="show-on-medium-and-down hide-on-med-and-up"
                    src="{{asset('app-assets/images/logo/materialize-logo-color.png')}}" alt="materialize logo"/><span
                    class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i
                    class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="accordion">
        <li class="active bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i
                    class="material-icons">settings</i><span class="menu-title" data-i18n="Dashboard">Gestion APP</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="/users"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Utilisateurs</span></a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
       href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->


<!-- BEGIN: Page Main-->
<div id="main">
    @yield('content')
</div>
<!-- END: Page Main-->

<!-- BEGIN: Footer-->

<footer class="page-footer footer footer-static footer-light navbar-border navbar-shadow">
    <div class="footer-copyright">
        <div class="container"><span>&copy; 2021 <a href="http://univ-cotedazur.fr/" target="_blank">Université Côte d'Azur</a> Tous droits réservés.</span><span
                class="right hide-on-small-only">
                    Design and Developed by
                    <a href="https://www.linkedin.com/in/oussamasamia/" target="_blank">SAMIA Oussama</a> -
                    <a href="https://www.linkedin.com/in/chaymae-mahdi/" target="_blank">MAHDI Chaymae</a> -
                    <a href="https://www.linkedin.com/in/lahcenebousadia/" target="_blank">BOUSADIA Lahcene</a> -
                    <a href="#">COSTA CUNHA Ivo</a> -
                    <a href="#">MACKPAYEN Prince</a>
                </span></div>
    </div>
</footer>

<!-- END: Footer-->
<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/js/vendors.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{asset('app-assets/js/plugins.js')}}"></script>
<script src="{{asset('app-assets/js/search.js')}}"></script>
<script src="{{asset('app-assets/js/custom/custom-script.js')}}"></script>
<!-- END THEME  JS-->

@yield('vendor-script')

@yield('page-script')


</body>

</html>
