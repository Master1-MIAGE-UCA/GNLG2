@extends('layouts.main_layout')

@section('title','Actes de mariage')

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
            <button class="btn waves-effect waves-light btn-small" type="button" onclick="_formMariageAct(0)"><i
                    class="material-icons left">add</i> Ajouter des actes de mariage (WIP) </button>
            <button class="btn waves-effect waves-light blue btn-small" type="button" onclick="_reload_MariageActs_datatable()"><i
                    class="material-icons left">refresh</i>
                Actualiser</button>
            <button class="btn waves-effect waves-light red btn-small" type="button" onclick="_deleteMariageActs(0)"><i
                    class="material-icons left">delete_forever</i> Supprimer actes de mariage </button>
                    <button
                class="btn btn-floating ml-1 waves-effect waves-light green darken-4 border-round z-depth-3 floting_btn pull-right"
                type="button"
                onclick="exportMariageActsToExcel()" title="Exporter en Excel"><i
                    class="material-icons left">file_upload</i> Exporter vers Excel<i class="material-icons right"
                                                                                      id="exportMariageActsToExcelButton"></i>
            </button>
            <button
                class="btn btn-floating ml-1 waves-effect waves-light black-text lime lighten-1 border-round z-depth-3 floting_btn pull-right"
                type="button"
                onclick="exportMariageActsToCSV()" title="Exporter en CSV"><i
                    class="material-icons left">file_upload</i>Exporter vers CSV<i class="material-icons right"
                                                                                      id="exportMariageActsToCSVButton"></i>
            </button>
            <button
                class="btn btn-floating ml-1 waves-effect waves-light black-text border-round z-depth-3 floting_btn pull-right"
                placeholder="importer" type="button"
                onclick="importMariageActs()" title="Importer CSV ou Excel"><i
                    class="material-icons left">file_download</i>importer vers CSV ou Excel<i class="material-icons right"
                                                                                      id="importMariageActsToCSVButton"></i>
            </button>
        </div>
        <!-- end::buttons -->

        <div class="userss-list-table">
            <div class="card">
                <div class="card-content">
                    <!-- datatable start -->
                    <div class="responsive-table">
                        <table id="mariageActs_datatable" class="table striped">
                            <thead>
                            <tr>
                                <th>
                                    <label class="checkbox checkbox-single">

                                        <input type="checkbox" value="" class="group-checkable" />
                                        <span></span>
                                    </label>
                                </th>
                                <th>Localit??s</th>
                                <th>P??riode</th>
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

    <!-- MariageActs list ends -->
    <x-modal-form id="mariageAct_show" formName="show" formContent="showMariageActContent"/>
    <x-modal-form id="mariageAct" formName="formMariageAct" formContent="formMariageActContent"/>
    <x-modal-form id="mariageActs_import" formName="formImportMariageActs" formContent="importMariageActsContent"/>

@endsection


{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
   <!--  <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script> -->
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
          //Validate form
          $("#formMariageAct").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                $("#span_btn_submit_formMariageAct").html('<i class="fa fa-spinner fa-spin"></i>');
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: "POST",
                    url: "/form/mariageAct",
                    data: formData,
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result.success) {
                            swal("Succes", result.msg, "success");
                            $("#modal_mariageAct").modal("close");
                        } else {
                            swal("Erreur", result.msg, "error");
                        }
                    },
                    error: function (error) {
                        swal("Erreur", "Veuillez v??rifier les champs saisie", "error");
                    },
                    complete: function (resultat, statut) {
                        $("#span_btn_submit_formMariageAct").html("");
                        _reload_MariageActs_datatable();
                    },
                });
                return false;
            },
        });
         //import form
         $("#formImportMariageActs").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                $("#span_btn_submit_formImportMariageActs").html('<i class="fa fa-spinner fa-spin"></i>');
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: "POST",
                    url: "/import/mariageActs",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        swal("Succes", result, "success");
                        $("#modal_mariageActs_import").modal("close");

                    },
                    error: function (error) {
                        swal("Erreur", "Erreur lors de l\'importation", "error");
                    },
                    complete: function (resultat, statut) {
                        $("#span_btn_submit_formImportMariageActs").html("");
                        _reload_MariageActs_datatable();
                    },
                });
                return false;
            },
        });
        // variable declaration
        var mariageActs_datatable;
        // datatable initialization
        dtUrlMariageAct = '/api/sdt/mariage-acts';
        mariageActs_datatable = $("#mariageActs_datatable").DataTable({
            responsive: true,
            processing: true,
            paging: true,
            ordering: false,
           ajax: {
                url: dtUrlMariageAct,
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
        mariageActs_datatable.on('change', '.group-checkable', function() {
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

        mariageActs_datatable.on('change', 'tbody tr .checkbox', function() {
            $(this).parents('tr').toggleClass('active');
        });

        function _reload_MariageActs_datatable() {
            $('#mariageActs_datatable').DataTable().ajax.reload();
        }

        function _deleteMariageActs(id) {


var arrayIds = new Array();
var j = 0;

//id = 0 ==> Suppression multiple
if (id > 0) {
    arrayIds[0] = id;
} else {
    $('#mariageActs_datatable input[class="checkable"]').each(function() {
        var checked = jQuery(this).is(":checked");
        if (checked) {
            arrayIds[j] = jQuery(this).val();
            j++;
        }
    });
}


if (arrayIds.length < 1) {
    swal("Erreur", "Veuillez s??lectionner des actes de mariage", "error");
} else {
    var successMsg = "L'acte de mariage a ??t?? supprim??";
    var errorMsg = "L'acte de mariage n'a pas ??t?? supprim??";
    var swalConfirmTitle = "??tes vous sur de vouloir supprimer cet acte de mariage?";
    var swalConfirmText = "Vous ne pouvez pas revenir en arri??re";
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
                url: "/api/delete/mariage-acts",
                type: "DELETE",
                cache: false,
                data: {
                    ids: arrayIds
                },
                dataType: "JSON",
                success: function(result, status) {
                    if (result.success) {
                        swal("Succ??s", successMsg, "success");
                    } else {
                        swal("Erreur", errorMsg, "error");
                    }
                },
                error: function(result, status, error) {
                    swal("Error", errorMsg, "error");
                },
                complete: function(result, status) {
                    _reload_MariageActs_datatable();
                },
            });

        }
    });
}

}
function _formMariageAct(id) {

           var preloader = `<x-preloader />`;
           $("#modal_mariageAct").modal("open");
           $("#formMariageActContent").html(preloader);
           $.ajax({
               url: "/form/mariageAct/" + id,
               type: "GET",
               dataType: "html",
               success: function (html, status) {
                   $("#formMariageActContent").html(html);
               },
           });
       }
function _showMariageAct(id) {
            var preloader = `<x-preloader />`;
            $("#modal_mariageAct_show").modal("open");
            $("#showMariageActContent").html(preloader);
            $.ajax({
                url: "/show/mariageAct/" + id,
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#showMariageActContent").html(html);
                },
            });
        }
        function exportMariageActsToExcel() {
            var preloader = `<x-preloader />`;
            var url = '/export/mariageActs/excel';
            $("#exportMariageActsToExcelButton").html(preloader);
            window.location.href = url;
            $("#exportMariageActsToExcelButton").html("");
            swal("Succ??s", "Le fichier EXCEL a bien ??t?? t??l??charger, v??rifier vos t??l??chargements", "success");

        }

        function exportMariageActsToCSV() {
            var preloader = `<x-preloader />`;
            var url = '/export/mariageActs/csv';
            $("#exportMariageActsToCSVButton").html(preloader);
            window.location.href = url;
            $("#exportMariageActsToCSVButton").html("");
            swal("Succ??s", "Le fichier CSV a bien ??t?? t??l??charger, v??rifier vos t??l??chargements", "success");

        }
        function importMariageActs() {
            var preloader = `<x-preloader />`;
            $("#modal_mariageActs_import").modal("open");
            $("#importMariageActsContent").html(preloader);
            $.ajax({
                url: "/import/mariageActs",
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#importMariageActsContent").html(html);
                },
            });
        }

    </script>

@endsection

