@extends('layouts.main_layout')

@section('title','Utilisateurs')

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
    <section class="users-list-wrapper section">
        <!--begin::filter-->

        <!--end::filter-->
        <!-- begin::buttons -->
        <div class="card-panel">
            <button class="btn waves-effect waves-light btn-small" type="button" onclick="_formUser(0)"><i
                    class="material-icons left">add</i> Ajouter utilisateur
            </button>
            <button class="btn waves-effect waves-light blue btn-small" type="button"
                    onclick="_reload_users_datatable()"><i
                    class="material-icons left">refresh</i>
                Actualiser
            </button>
            <button class="btn waves-effect waves-light red btn-small" type="button" onclick="_deleteUsers(0)"><i
                    class="material-icons left">delete_forever</i> Supprimer utilisateurs
            </button>
            <button
                class="btn btn-floating ml-1 waves-effect waves-light green darken-4 border-round z-depth-3 floting_btn pull-right"
                type="button"
                onclick="exportUsersToExcel()" title="Exporter en Excel"><i
                    class="material-icons left">file_upload</i> Exporter vers Excel<i class="material-icons right"
                                                                                      id="exportUsersToExcelButton"></i>
            </button>
            <button
                class="btn btn-floating ml-1 waves-effect waves-light black-text lime lighten-1 border-round z-depth-3 floting_btn pull-right"
                type="button"
                onclick="exportUsersToCSV()" title="Exporter en CSV"><i
                    class="material-icons left">file_upload</i>
            </button>
            <button
                class="btn btn-floating ml-1 waves-effect waves-light black-text border-round z-depth-3 floting_btn pull-right"
                placeholder="importer" type="button"
                onclick="importUsers()" title="Importer CSV ou Excel"><i
                    class="material-icons left">file_download</i>
            </button>
        </div>
        <!-- end::buttons -->

        <div class="userss-list-table">
            <div class="card">
                <div class="card-content">
                    <!-- datatable start -->
                    <div class="responsive-table">
                        <table id="users_datatable" class="display nowrap">
                            <thead>
                            <tr>
                                <th>
                                    <label class="checkbox checkbox-single">
                                        <input type="checkbox" value="" class="group-checkable"/>
                                        <span></span>
                                    </label>
                                </th>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Niveau d'accès</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Niveau d'accès</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </div>
        </div>
    </section>

    <!-- users list ends -->

    <x-modal-form id="user" formName="formUser" formContent="formUserContent"/>
    <!--If formName="show" => donc c'est pas un formulaire   -->
    <x-modal-form id="user_show" formName="show" formContent="showUserContent"/>
    <x-modal-form id="users_import" formName="formImportUsers" formContent="importUsersContent"/>



@endsection


{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{asset('app-assets/js/vendors.min.js')}}"></script>

    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    {{--    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>--}}

    <script src="{{asset('app-assets/js/plugins.js')}}"></script>
    <script src="{{asset('app-assets/js/search.js')}}"></script>
    <script src="{{asset('app-assets/js/custom/custom-script.js')}}"></script>

    <script src="{{asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>

@endsection

{{-- page script --}}
@section('page-script')
    <script>

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(function () {
            $(".modal").modal();
        });


        // variable declaration
        var users_datatable;
        // datatable initialization
        dtUrlUser = '/api/sdt/users';
        users_datatable = $("#users_datatable").DataTable({
            responsive: true,
            processing: true,
            paging: true,
            ordering: false,
            // Horizontal And Vertical Scroll Table
            /* "scrollY": 400,
             "scrollX": 400,*/
            ajax: {
                url: dtUrlUser,
                type: 'POST',
                data: {
                    pagination: {
                        perpage: 50,
                    },
                },
            },
            lengthMenu: [5, 10, 25, 50],
            pageLength: 10,
        });
        users_datatable.on('change', '.group-checkable', function () {
            var set = $(this).closest('table').find('td:first-child .checkable');
            var checked = $(this).is(':checked');

            $(set).each(function () {
                if (checked) {
                    $(this).prop('checked', true);
                    $(this).closest('tr').addClass('active');
                } else {
                    $(this).prop('checked', false);
                    $(this).closest('tr').removeClass('active');
                }
            });
        });

        users_datatable.on('change', 'tbody tr .checkbox', function () {
            $(this).parents('tr').toggleClass('active');
        });

        function _reload_users_datatable() {
            $('#users_datatable').DataTable().ajax.reload();
        }

        function _formUser(id) {
            var preloader = `<x-preloader />`;
            $("#modal_user").modal("open");
            $("#formUserContent").html(preloader);
            $.ajax({
                url: "/form/user/" + id,
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#formUserContent").html(html);
                },
            });
        };

        function _showUser(id) {
            var preloader = `<x-preloader />`;
            $("#modal_user_show").modal("open");
            $("#showUserContent").html(preloader);
            $.ajax({
                url: "/show/user/" + id,
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#showUserContent").html(html);
                },
            });
        };

        function importUsers() {
            var preloader = `<x-preloader />`;
            $("#modal_users_import").modal("open");
            $("#importUsersContent").html(preloader);
            $.ajax({
                url: "/import/users",
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#importUsersContent").html(html);
                },
            });
        }


        //Validate form
        $("#formUser").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                $("#span_btn_submit_formUser").html('<i class="fa fa-spinner fa-spin"></i>');
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: "POST",
                    url: "/form/user",
                    data: formData,
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result.success) {
                            swal("Succes", result.msg, "success");
                            $("#modal_user").modal("close");
                        } else {
                            swal("Erreur", result.msg, "error");
                        }
                    },
                    error: function (error) {
                        swal("Erreur", "Veuillez vérifier les champs saisie", "error");
                    },
                    complete: function (resultat, statut) {
                        $("#span_btn_submit_formUser").html("");
                        _reload_users_datatable();
                    },
                });
                return false;
            },
        });

        $("#formImportUsers").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                $("#span_btn_submit_formImportUsers").html('<i class="fa fa-spinner fa-spin"></i>');
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: "POST",
                    url: "/import/users",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        swal("Succes", result, "success");
                        $("#modal_users_import").modal("close");

                    },
                    error: function (error) {
                        swal("Erreur", "Erreur lors de l\'importation", "error");
                    },
                    complete: function (resultat, statut) {
                        $("#span_btn_submit_formImportUsers").html("");
                        _reload_users_datatable();
                    },
                });
                return false;
            },
        });

        function exportUsersToExcel() {
            var preloader = `<x-preloader />`;
            var url = '/export/users/excel';
            $("#exportUsersToExcelButton").html(preloader);
            window.location.href = url;
            $("#exportUsersToExcelButton").html("");
            swal("Succès", "Le fichier EXCEL a bien été télécharger, vérifier vos téléchargements", "success");

        }

        function exportUsersToCSV() {
            var preloader = `<x-preloader />`;
            var url = '/export/users/csv';
            $("#exportUsersToCsvButton").html(preloader);
            window.location.href = url;
            $("#exportUsersToCsvButton").html("");
            swal("Succès", "Le fichier CSV a bien été télécharger, vérifier vos téléchargements", "success");

        }

        function _deleteUsers(id) {


            var arrayIds = new Array();
            var j = 0;

            //id = 0 ==> Suppression multiple
            if (id > 0) {
                arrayIds[0] = id;
            } else {
                $('#users_datatable input[class="checkable"]').each(function () {
                    var checked = jQuery(this).is(":checked");
                    if (checked) {
                        arrayIds[j] = jQuery(this).val();
                        j++;
                    }
                });
            }


            if (arrayIds.length < 1) {
                swal("Erreur", "Veuillez sélectionner des utilisateurs", "error");
            } else {
                var successMsg = "L'utilisateur a été supprimer";
                var errorMsg = "L'utilisateur n'a pas été supprimer";
                var swalConfirmTitle = "Êtes vous sur de vouloir supprimer cet utilisateur ?";
                var swalConfirmText = "Vous ne pouvez pas revenir en arrière";
                swal({
                    title: swalConfirmTitle,
                    text: swalConfirmText,
                    icon: 'warning',
                    dangerMode: true,
                    buttons: {
                        cancel: "Non",
                        delete: "Oui"
                    }
                }).then(function (willDelete) {
                    if (willDelete) {

                        $.ajax({
                            url: "/api/delete/users",
                            type: "DELETE",
                            cache: false,
                            data: {
                                ids: arrayIds
                            },
                            dataType: "JSON",
                            success: function (result, status) {
                                if (result.success) {
                                    swal("Succès", successMsg, "success");
                                } else {
                                    swal("Erreur", errorMsg, "error");
                                }
                            },
                            error: function (result, status, error) {
                                swal("Error", errorMsg, "error");
                            },
                            complete: function (result, status) {
                                _reload_users_datatable();
                            },
                        });

                    }
                });
            }
        }

        $(".floting_btn").hover(function () {
            $(this).addClass("pulse");
        });
        $(".floting_btn").mouseleave(function () {
            $(this).removeClass("pulse");
        });

    </script>

@endsection

