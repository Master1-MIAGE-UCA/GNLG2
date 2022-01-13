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
    <section class="users-list-wrapper section">
        <!--begin::filter-->

        <!--end::filter-->
        <!-- begin::buttons -->

        <!-- end::buttons -->
        <div class="row">
            <div class="col s12">
                <div id="html-validations" class="card card-tabs">
                    <div class="card-content">
                        <div class="card-title">
                            <div class="row">
                                <div class="col s12 m6 l10">
                                    <h4 class="card-title">Paramétres affichage</h4>
                                </div>
                                <div class="col s12 m6 l2">
                                </div>
                            </div>
                        </div>
                        <div id="html-view-validations">
                            <form  id="formParams" >
                            
                            
                                <div class="row">
                                    <div class="input-field col s12">

                                        <input class="validate" id="siteName" name="siteName" type="text" value="{{$siteName->valeur}}">
                                        <label for="siteName" class="active">Nom du site principal</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <label for="urlSite" class="active">URL du site principal</label>
                                        <input class="validate"  id="urlSite" type="text" name="urlSite" value="{{$urlSite->valeur}}" >
                                    </div>
                                    <div class="input-field col s12">
                                        <label for="maxPage" class="active">Eléments affichés par page</label>
                                        <input class="validate"  id="maxPage" type="text" name="maxPage" value="{{$maxPage->valeur}}" >
                                    </div>
                                    <div class="input-field col s12">
                                        <label for="maxPageAdm" class="active">Eléments par page (mode administration)</label>
                                        <input class="validate"  id="maxPageAdm" type="text" name="maxPageAdm" value="{{$maxPageAdm->valeur}}">
                                    </div>
                                    <div class="input-field col s12">
                                        <label for="maxPatr" class="active">Basculement en mode alphabétique</label>
                                        <input class="validate" id="maxPatr" type="text" name="maxPatr" value="{{$maxPatr->valeur}}">
                                    </div>

                                    <div class="input-field col s12">
                                        <label for="maxPatrAdm" class="active">Mode alphabétique (mode administration)</label>
                                        <input class="validate" id="maxPatrAdm" type="text" name="maxPatrAdm" value="{{$maxPatrAdm->valeur}}">
                                    </div>
                                    <div class="col s12">

                                        <p>
                                            <label>
                                                <input class="validate"  id="tnc_select1" type="checkbox" value="{{$showDate->valeur}}" {{ ($showDate->valeur=='1')?'checked':''}}/>
                                                <span>Accueil : affichage des dates min. et max.</span>

                                            </label>
                                        </p>
                                        <div class="input-field">
                                        </div>
                                    </div>
                                    <div class="col s12">

                                        <p>
                                            <label>
                                                <input class="validate"  id="tnc_select1" type="checkbox" value="{{$distAnn->valeur}}"{{ ($distAnn->valeur=='1')?'checked':''}}/>
                                                <span>Accueil : lien vers la distribution des années</span>

                                            </label>
                                        </p>
                                        <div class="input-field">
                                        </div>
                                    </div>
                                    <div class="col s12">

                                        <p>
                                            <label>
                                                <input class="validate"  id="tnc_select1" type="checkbox"  value="{{$showType->valeur}}"{{ ($showType->valeur=='1')?'checked':''}}/>
                                                <span>Accueil : afficher tous les types d'actes</span>

                                            </label>
                                        </p>
                                        <div class="input-field">
                                        </div>
                                    </div>


                                    <div class="col m6 s12">
                                        <h6 class="card-title">Tables : affichages des années seulement</h6>

                                        <div class="input-field">
                                            <select class="select2 browser-default" id="show_Annee" name="show_Annee">
                                                <optgroup>
                                                    <option value="0" {{($ann->valeur == 0)?'selected':''}} >0- Toujours date détaillé</option>
                                                    <option value="1" {{($ann->valeur == 1)?'selected':''}} >1- Années si non connecté</option>
                                                    <option value="2" {{($ann->valeur == 2)?'selected':''}}>2- Années si non déposant</option>
                                                    <option value="3" {{($ann->valeur == 3)?'selected':''}} >3- Années dans tous les cas</option>
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col s12">

                                        <p>
                                            <label>
                                                <input class="validate"  id="image" type="checkbox" value="{{$image->valeur}}" {{ ($image->valeur=='1')?'checked':''}}/>
                                                <span>Actes : images seulement si login</span>

                                            </label>
                                        </p>
                                        <div class="input-field">
                                        </div>
                                    </div>


                                    <div class="input-field col s12">
                                  
                                    <label for="aver" class="active">Taxe d'invertissement</label>
                                        <input class="validate" id="aver" type="text" name="aver" value="{{$aver->valeur}}">
                                       
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="piedPage" name="piedPage" class="materialize-textarea validate"
                                        value="{{$piedPage->valeur}}" />
                                        <label for="piedPage" class="active">Pied de page</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="pubZone" name="pubZone" class="materialize-textarea validate"
                                        value="{{$pubZone->valeur}}" />
                                        <label for="pubZone" class="active">Zone de pub sous le menu</label>
                                    </div>
                                    <div class="input-field col s12">
                                    <label for="cookie" class="active">Message acceptation des cookies</label>
                                        <input id="cookie" name="cookie" class="materialize-textarea validate"
                                        value="{{$cookie->valeur}}" >
                                        
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="cookieUrl" name="cookieUrl" class="materialize-textarea validate"
                                        value="{{$cookieUrl->valeur}}"/>
                                        <label for="cookieUrl" class="active">URL d'une page sur les cookies</label>
                                    </div>
                                    <div class="col m6 s12">
                                        <h6 class="card-title" >Style du message cookies</h6>

                                        <div class="input-field">
                                            <select class="select2 browser-default">
                                                <optgroup>
                                                    <option value="romboid">1- En haut, foncé</option>
                                                    <option value="trapeze">2- En haut, clair</option>
                                                    <option value="triangle">3- En bas, foncé</option>
                                                    <option value="polygon">4- En bas, clair</option>
                                                    <option value="polygon">5- flottant, foncé</option>
                                                    <option value="polygon">6- flottant, clair</option>
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right" type="submit" name="action"
                                               id="span_btn_submit_formParams">Enregistrer
                                            <i class="material-icons right">send</i>
                                        </button>
                                        <div class="col m4 s12 mb-3">
                                            <button class="red btn btn-reset" type="reset">
                                                <i class="material-icons left">clear</i>Annuler
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
{{-- page script --}}
@section('page-script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        //Validate form
        $("#formParams").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                $("#span_btn_submit_formParams").html('<i class="fa fa-spinner fa-spin"></i>');
                //var formData = $(form).serializeArray(); // convert form to array
                var formData = new FormData($(form)[0]);
             
                $.ajax({
                    type: "POST",
                    url: "/form/param",
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
                        $("#span_btn_submit_formParams").html("");

                    },
                });
                return false;
            },
        });

    </script>
@endsection
@section('vendor-script')
<script src="{{asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
@endsection