@extends('layouts.main_layout')

@section('title','Paramètre du compte')


@section('vendor-style')

    <link rel="apple-touch-icon" href="{{asset('app-assets/images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2.min.css" type="text/css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2-materialize.css" type="text/css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/themes/vertical-dark-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/themes/vertical-dark-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-account-settings.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
@endsection





@section('content')
    <!-- BEGIN: Page Main-->
    <section class="section">
        <div id="main">
            <div class="row">

                <div class="col s12">
                    <div class="container">
                        <!-- Account settings -->
                        <section class="tabs-vertical mt-1 section">
                            <div class="row">
                                <div class="col l4 s12">
                                    <!-- tabs  -->
                                    <div class="card-panel">
                                        <ul class="tabs">
                                            {{--<li class="tab">
                                                <a href="#general">
                                                    <i class="material-icons">brightness_low</i>
                                                    <span>General</span>
                                                </a>
                                            </li>--}}
                                            <li class="tab">
                                                <a href="#change-password">
                                                    <i class="material-icons">lock_open</i>
                                                    <span>Change Password</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col l8 s12">
                                    <!-- tabs content -->
                                    {{-- <div id="general">
                                         <div class="card-panel">
                                             <div class="display-flex">
                                                 <div class="media">
                                                     <img src="../../../app-assets/images/avatar/avatar-12.png"
                                                          class="border-radius-4" alt="profile image" height="64"
                                                          width="64">
                                                 </div>
                                                 <div class="media-body">
                                                     <div class="general-action-btn">
                                                         <button id="select-files" class="btn indigo mr-2">
                                                             <span>Upload new photo</span>
                                                         </button>
                                                         <button class="btn btn-light-pink">Reset</button>
                                                     </div>
                                                     <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                                     <div class="upfilewrapper">
                                                         <input id="upfile" type="file"/>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="divider mb-1 mt-1"></div>
                                             <form class="formValidate" method="get">
                                                 <div class="row">
                                                     <div class="col s12">
                                                         <div class="input-field">
                                                             <label for="uname">Username</label>
                                                             <input type="text" id="uname" name="uname"
                                                                    value="hermione007" data-error=".errorTxt1">
                                                             <small class="errorTxt1"></small>
                                                         </div>
                                                     </div>
                                                     <div class="col s12">
                                                         <div class="input-field">
                                                             <label for="name">Name</label>
                                                             <input id="name" name="name" type="text"
                                                                    value="Hermione Granger" data-error=".errorTxt2">
                                                             <small class="errorTxt2"></small>
                                                         </div>
                                                     </div>
                                                     <div class="col s12">
                                                         <div class="input-field">
                                                             <label for="email">E-mail</label>
                                                             <input id="email" type="email" name="email"
                                                                    value="granger007@hogward.com"
                                                                    data-error=".errorTxt3">
                                                             <small class="errorTxt3"></small>
                                                         </div>
                                                     </div>
                                                     <div class="col s12">
                                                         <div class="card-alert card orange lighten-5">
                                                             <div class="card-content orange-text">
                                                                 <p>Your email is not confirmed. Please check your
                                                                     inbox.</p>
                                                                 <a href="javascript: void(0);">Resend confirmation</a>
                                                             </div>
                                                             <button type="button" class="close orange-text"
                                                                     data-dismiss="alert" aria-label="Close">
                                                                 <span aria-hidden="true">×</span>
                                                             </button>
                                                         </div>
                                                     </div>
                                                     <div class="col s12">
                                                         <div class="input-field">
                                                             <input id="company" type="text">
                                                             <label for="company">Company Name</label>
                                                         </div>
                                                     </div>
                                                     <div class="col s12 display-flex justify-content-end form-action">
                                                         <button type="submit"
                                                                 class="btn indigo waves-effect waves-light mr-2">
                                                             Save changes
                                                         </button>
                                                         <button type="button"
                                                                 class="btn btn-light-pink waves-effect waves-light mb-1">
                                                             Cancel
                                                         </button>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>--}}
                                    <div id="change-password">
                                        <div class="card-panel">
                                            <form class="paaswordvalidate" id="form_change_password">
                                                <div class="row">
                                                    <div class="col s12">
                                                        <div class="input-field">
                                                            <input id="old_hashpass" name="old_hashpass" type="password"
                                                                   data-error=".errorTxt4">
                                                            <label for="old_hashpass">Ancien mot de passe</label>
                                                            <small class="errorTxt4"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col s12">
                                                        <div class="input-field">
                                                            <input id="new_hashpass" name="new_hashpass" type="password"
                                                                   data-error=".errorTxt5">
                                                            <label for="new_hashpass">Nouveau mot de passe</label>
                                                            <small class="errorTxt5"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col s12">
                                                        <div class="input-field">
                                                            <input id="conf_hashpass" type="password"
                                                                   name="conf_hashpass"
                                                                   data-error=".errorTxt6">
                                                            <label for="conf_hashpass">Confirmation de nouveau mot de
                                                                passe</label>
                                                            <small class="errorTxt6"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col s12 display-flex justify-content-end form-action">
                                                        <button type="submit"
                                                                class="btn indigo waves-effect waves-light mr-1"
                                                        id="btn_save_pass">Save
                                                            changes
                                                        </button>
                                                        <button type="reset"
                                                                class="btn btn-light-pink waves-effect waves-light">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="content-overlay"></div>
                </div>
            </div>
        </div>
        <!-- END: Page Main-->
    </section>
@endsection
<!-- BEGIN: Footer-->


@section('vendor-script')
    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('app-assets/js/plugins.js')}}"></script>
    <script src="{{asset('app-assets/js/search.js')}}"></script>
    <script src="{{asset('app-assets/js/custom/custom-script.js')}}"></script>
    <!-- END THEME  JS-->
    <script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('app-assets/js/scripts/page-account-settings.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
@endsection

@section('page-script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $("#form_change_password").validate({
            rules : {
                new_hashpass : {
                    minlength : 8
                },
                conf_hashpass : {
                    minlength : 8,
                    equalTo : "#new_hashpass"
                }
            },
            messages: {},
            submitHandler: function (form) {
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: "POST",
                    url: "/form/account_settings/change/password",
                    data: formData,
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result.success) {
                            swal("Succes", result.msg, "success");
                        } else {
                            swal("Erreur", result.msg, "error");
                        }
                    },
                    error: function (error) {
                        swal("Erreur", "Veuillez vérifier les champs saisie", "error");
                    },
                    complete: function (resultat, statut) {
                        $('#old_hashpass').val('');
                        $('#new_hashpass').val('');
                        $('#conf_hashpass').val('');
                    },
                });
                return false;
            },
        });
    </script>
@endsection
