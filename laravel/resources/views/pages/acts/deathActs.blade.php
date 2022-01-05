@extends('layouts.main_layout')

@section('title','Actes de décès')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.min.css"
          integrity="sha512-H/zVLBHVS8ZRNSR8wrNZrGFpuHDyN6+p6uaADRefLS4yZYRxfF4049g1GhT+gDExFRB5Kf9jeGr8vueDsyBhhA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <button class="btn waves-effect waves-light btn-small" type="button" onclick="_formDeathAct(0)"><i
                    class="material-icons left">add</i> Ajouter des actes de décés (WIP) </button>
            <button class="btn waves-effect waves-light blue btn-small" type="button" onclick="_reload_DeathActs_datatable()"><i
                    class="material-icons left">refresh</i>
                Actualiser</button>
            <button class="btn waves-effect waves-light red btn-small" type="button" onclick="_deleteDeathActs(0)"><i
                    class="material-icons left">delete_forever</i> Supprimer actes de décés </button>
        </div>
        <!-- end::buttons -->

        <div class="userss-list-table">
            <div class="card">
                <div class="card-content">
                    <!-- datatable start -->
                    <div class="responsive-table">
                        <table id="deathActs_datatable" class="table striped">
                            <thead>
                            <tr>
                                <th>
                                    <label class="checkbox checkbox-single">
                                        <input type="checkbox" value="" class="group-checkable" />
                                        <span></span>
                                    </label>
                                </th>
                                <th>Localités</th>
                                <th>Période</th>
                                <th>Actes</th>
                                <th>Filiatifs</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </div>
        </div>
    </section>

    <!-- DeathActs list ends -->
    <x-modal-form id="deathAct_show" formName="show" formContent="showDeathActContent"/>
    <x-modal-form id="deathAct" formName="formDeathAct" formContent="formDeathActContent"/>
@endsection


{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <!-- <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>-->
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
        $("#formDeathAct").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                $("#span_btn_submit_formDeathAct").html('<i class="fa fa-spinner fa-spin"></i>');
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: "POST",
                    url: "/form/deathAct",
                    data: formData,
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result.success) {
                            swal("Succes", result.msg, "success");
                            $("#modal_deathAct").modal("close");
                        } else {
                            swal("Erreur", result.msg, "error");
                        }
                    },
                    error: function (error) {
                        swal("Erreur", "Veuillez vérifier les champs saisie", "error");
                    },
                    complete: function (resultat, statut) {
                        $("#span_btn_submit_formDeathAct").html("");
                        _reload_DeathActs_datatable();
                    },
                });
                return false;
            },
        });
        // variable declaration
        var deathActs_datatable;
        // datatable initialization
        dtUrlDeathAct = '/api/sdt/death-acts';
        deathActs_datatable = $("#deathActs_datatable").DataTable({
            responsive: true,
            processing: true,
            paging: true,
            ordering: false,
           ajax: {
                url: dtUrlDeathAct,
                type: 'POST',
               // dataSrc: "",

                data: {
                    pagination: {
                        perpage: 50,
                    },

                },
            },



            lengthMenu: [5, 10, 25, 50],
            pageLength: 10,

        });
        deathActs_datatable.on('change', '.group-checkable', function() {
            var set = $(this).closest('table').find('td:first-child .checkable');
            var checked = $(this).is(':checked');

            $(set).each(function() {
                if (checked) {
                    $(this).prop('checked', true);
                    $(this).closest('tr').addClass('active');
                } else {
                    $(this).prop('checked', false);
                    $(this).closest('tr').removeClass('active');
                }
            });
        });

        deathActs_datatable.on('change', 'tbody tr .checkbox', function() {
            $(this).parents('tr').toggleClass('active');
        });

        function _reload_DeathActs_datatable() {
            $('#deathActs_datatable').DataTable().ajax.reload();
        }

        function _deleteDeathActs(id) {


var arrayIds = new Array();
var j = 0;

//id = 0 ==> Suppression multiple
if (id > 0) {
    arrayIds[0] = id;
} else {
    $('#deathActs_datatable input[class="checkable"]').each(function() {
        var checked = jQuery(this).is(":checked");
        if (checked) {
            arrayIds[j] = jQuery(this).val();
            j++;
        }
    });
}


if (arrayIds.length < 1) {
    swal("Erreur", "Veuillez sélectionner des actes de décès", "error");
} else {
    var successMsg = "L'acte de décès a été supprimé";
    var errorMsg = "L'acte de décès n'a pas été supprimé";
    var swalConfirmTitle = "Êtes vous sur de vouloir supprimer cet acte de décès?";
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
    }).then(function(willDelete) {
        if (willDelete) {

            $.ajax({
                url: "/api/delete/death-acts",
                type: "DELETE",
                cache: false,
                data: {
                    ids: arrayIds
                },
                dataType: "JSON",
                success: function(result, status) {
                    if (result.success) {
                        swal("Succès", successMsg, "success");
                    } else {
                        swal("Erreur", errorMsg, "error");
                    }
                },
                error: function(result, status, error) {
                    swal("Error", errorMsg, "error");
                },
                complete: function(result, status) {
                    _reload_DeathActs_datatable();
                },
            });

        }
    });
}

}
function _showDeathAct(id) {
            var preloader = `<x-preloader />`;
            $("#modal_deathAct_show").modal("open");
            $("#showDeathActContent").html(preloader);
            $.ajax({
                url: "/show/deathAct/" + id,
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#showDeathActContent").html(html);
                },
            });
        }
        function _formDeathAct(id) {
            var preloader = `<x-preloader />`;
            $("#modal_deathAct").modal("open");
            $("#formDeathActContent").html(preloader);
            $.ajax({
                url: "/form/deathAct/" + id,
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#formDeathActContent").html(html);
                },
            });
        }

    </script>
@endsection

