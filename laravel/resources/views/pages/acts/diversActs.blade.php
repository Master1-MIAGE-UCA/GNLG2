@extends('layouts.main_layout')

@section('title','Actes divers')

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
            <button class="btn waves-effect waves-light btn-small" type="button" onclick="_formDiversAct(0)"><i
                    class="material-icons left">add</i> Ajouter des actes (WIP) </button>
            <button class="btn waves-effect waves-light blue btn-small" type="button" onclick="_reload_DiversActs_datatable()"><i
                    class="material-icons left">refresh</i>
                Actualiser</button>
            <button class="btn waves-effect waves-light red btn-small" type="button" onclick="_deleteDiversActs(0)"><i
                    class="material-icons left">delete_forever</i> Supprimer des actes </button>
                    <button
                class="btn btn-floating ml-1 waves-effect waves-light green darken-4 border-round z-depth-3 floting_btn pull-right"
                type="button"
                onclick="exportDiversActsToExcel()" title="Exporter en Excel"><i
                    class="material-icons left">file_upload</i> Exporter vers Excel<i class="material-icons right"
                                                                                      id="exportDiversActsToExcelButton"></i>
            </button>
            <button
                class="btn btn-floating ml-1 waves-effect waves-light black-text lime lighten-1 border-round z-depth-3 floting_btn pull-right"
                type="button"
                onclick="exportDiversActsToCSV()" title="Exporter en CSV"><i
                    class="material-icons left">file_upload</i>Exporter vers CSV<i class="material-icons right"
                                                                                      id="exportDiversActsToCSVButton"></i>
            </button>
            <button
                class="btn btn-floating ml-1 waves-effect waves-light black-text border-round z-depth-3 floting_btn pull-right"
                placeholder="importer" type="button"
                onclick="importDiversActs()" title="Importer CSV ou Excel"><i
                    class="material-icons left">file_download</i>importer vers CSV ou Excel<i class="material-icons right"
                                                                                      id="importDiversActsToCSVButton"></i>
            </button>
        </div>
        <!-- end::buttons -->

        <div class="userss-list-table">
            <div class="card">
                <div class="card-content">
                    <!-- datatable start -->
                    <div class="responsive-table">
                        <table id="diversActs_datatable" class="table striped">
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

    <!-- MariageActs list ends -->
    <x-modal-form id="diversAct_show" formName="show" formContent="showDiversActContent"/>
    <x-modal-form id="diversAct" formName="formDiversAct" formContent="formDiversActContent"/>
    <x-modal-form id="diversActs_import" formName="formImportDiversActs" formContent="importDiversActsContent"/>

@endsection


{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
  <!--  <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>-->
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
        $("#formDiversAct").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                $("#span_btn_submit_formDiversAct").html('<i class="fa fa-spinner fa-spin"></i>');
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: "POST",
                    url: "/form/diversAct",
                    data: formData,
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result.success) {
                            swal("Succes", result.msg, "success");
                            $("#modal_diversAct").modal("close");
                        } else {
                            swal("Erreur", result.msg, "error");
                        }
                    },
                    error: function (error) {
                        swal("Erreur", "Veuillez vérifier les champs saisie", "error");
                    },
                    complete: function (resultat, statut) {
                        $("#span_btn_submit_formMariageAct").html("");
                        _reload_DiversActs_datatable();
                    },
                });
                return false;
            },
        });
          //import form
          $("#formImportDiversActs").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                $("#span_btn_submit_formImportDiversActs").html('<i class="fa fa-spinner fa-spin"></i>');
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
                $.ajax({
                    type: "POST",
                    url: "/import/diversActs",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        swal("Succes", result, "success");
                        $("#modal_diversActs_import").modal("close");

                    },
                    error: function (error) {
                        swal("Erreur", "Erreur lors de l\'importation", "error");
                    },
                    complete: function (resultat, statut) {
                        $("#span_btn_submit_formImportDiversActs").html("");
                        _reload_DiversActs_datatable();
                    },
                });
                return false;
            },
        });
        // variable declaration
        var diversActs_datatable;
        // datatable initialization
        dtUrlDiversAct = '/api/sdt/divers-acts';
        diversActs_datatable = $("#diversActs_datatable").DataTable({
            responsive: true,
            processing: true,
            paging: true,
            ordering: false,
           ajax: {
                url: dtUrlDiversAct,
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
        diversActs_datatable.on('change', '.group-checkable', function() {
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

        diversActs_datatable.on('change', 'tbody tr .checkbox', function() {
            $(this).parents('tr').toggleClass('active');
        });

        function _reload_DiversActs_datatable() {
            $('#diversActs_datatable').DataTable().ajax.reload();
        }

        function _deleteDiversActs(id) {


var arrayIds = new Array();
var j = 0;

//id = 0 ==> Suppression multiple
if (id > 0) {
    arrayIds[0] = id;
} else {
    $('#diversActs_datatable input[class="checkable"]').each(function() {
        var checked = jQuery(this).is(":checked");
        if (checked) {
            arrayIds[j] = jQuery(this).val();
            j++;
        }
    });
}


if (arrayIds.length < 1) {
    swal("Erreur", "Veuillez sélectionner des actes ", "error");
} else {
    var successMsg = "L'acte  a été supprimé";
    var errorMsg = "L'acte  n'a pas été supprimé";
    var swalConfirmTitle = "Êtes vous sur de vouloir supprimer cet acte ?";
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
                url: "/api/delete/divers-acts",
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
                    _reload_DiversActs_datatable();
                },
            });

        }
    });
}

}
function _showDiversAct(id) {
            var preloader = `<x-preloader />`;
            $("#modal_diversAct_show").modal("open");
            $("#showDiversActContent").html(preloader);
            $.ajax({
                url: "/show/diversAct/" + id,
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#showDiversActContent").html(html);
                },
            });
        }
        function _formDiversAct(id) {

           var preloader = `<x-preloader />`;
           $("#modal_diversAct").modal("open");
           $("#formDiversActContent").html(preloader);
           $.ajax({
               url: "/form/diversAct/" + id,
               type: "GET",
               dataType: "html",
               success: function (html, status) {
                   $("#formDiversActContent").html(html);
               },
           });
       }
       function exportDiversActsToExcel() {
            var preloader = `<x-preloader />`;
            var url = '/export/diversActs/excel';
            $("#exportDiversActsToExcelButton").html(preloader);
            window.location.href = url;
            $("#exportDiversActsToExcelButton").html("");
            swal("Succès", "Le fichier EXCEL a bien été télécharger, vérifier vos téléchargements", "success");

        }

        function exportDiversActsToCSV() {
            var preloader = `<x-preloader />`;
            var url = '/export/diversActs/csv';
            $("#exportDiversActsToCSVButton").html(preloader);
            window.location.href = url;
            $("#exportDiversActsToCSVButton").html("");
            swal("Succès", "Le fichier CSV a bien été télécharger, vérifier vos téléchargements", "success");

        }
        function importDiversActs() {
            var preloader = `<x-preloader />`;
            $("#modal_diversActs_import").modal("open");
            $("#importDiversActsContent").html(preloader);
            $.ajax({
                url: "/import/diversActs",
                type: "GET",
                dataType: "html",
                success: function (html, status) {
                    $("#importDiversActsContent").html(html);
                },
            });
        }
    </script>
@endsection

