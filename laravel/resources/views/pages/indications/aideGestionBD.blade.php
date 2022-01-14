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
                                <h4 class="card-title">Administration de la base des données</h4>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col s12 m6 l12">
                                <ul class="tabs">
                                    <li class="tab col s6 p-0"><a class="active p-0"
                                                                  href="#view-FormatNem">Utilisateurs</a></li>
                                    <li class="tab col s6 p-0"><a class="p-0" href="#view-FormatCSV">Logiciel</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div id="view-FormatNem">
                        <p>Administrer les comptes utilisateurs</p>

                        <div class="card hoverable small">
                            <div>
                                <img style="position: -webkit-sticky;
position: sticky;
top: 20px; height:300px; width:100%;"
                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQB9HZzNjwK62BVEEvSWHDzZdIQHcsu8qoaxj1ochXZuZkqgfdz6txVvaNmkz_OAY6kOE&usqp=CAU"
                                     alt="">

                            </div>
                        </div>
                        <div class="card-content s60 m6 l12">
                            <p>
                                La gestion des utilisateurs est très importante pour définir qui peut faire quoi sur la
                                base de données publiée grâce à ExpoActes. Le module de gestion des utilisateurs n'est
                                accessible qu'à l'administrateur qui peut y effectuer les opérations suivantes :</br>

                                - Créer, modifier ou supprimer individuellement des comptes d'utilisateur;</br>
                                - Créer un liste d'utilisateurs par importation d'un fichier CSV;</br>
                                - Exporter une liste d'utilisateur et supprimer éventuellement ceux-ci;</br>
                                - Envoyer un e-mail d'information à un ensemble d'utilisateurs;</br>
                                - Modifier globalement les dates d'échéance des compte et les soldes de points affectés
                                à un ensemble d'utilisateurs.

                            </p>

                        </div>

                    </div>

                </div>
                <div id="view-FormatCSV">
                    <p> &nbsp;&nbsp;Paramétrage et configuration du logiciel</p>

                    <div class="card hoverable small">
                        <div>
                            <img
                                src="https://png.pngtree.com/element_our/20190601/ourlarge/pngtree-settings-icon-image_1347565.jpg"
                                style="position: -webkit-sticky;
                                                position: sticky;
top: 20px; height:300px; width:100%;" alt="">

                        </div>
                    </div>
                    <div class="card-content s60 m6 l12">
                        <p>Presque tous les éléments de personnalisation du logiciel (on dit plutôt paramétrage) sont
                            stockés dans la base de donnée et peuvent facilement être modifiés grâce aux formulaires
                            interactifs accessibles en mode administrateur sous l'item "Paramétrage du
                            logiciel".</br></br>

                            Pour faciliter la configuration, les paramètres ont été regroupés en plusieurs thèmes :
                            Affichage, Système, Utilisateurs ... Une nouvelle section "Etiquettes" (à partir de la
                            version 3.0) permet de modifier les intitulés des zones affichées dans les actes.
                        </p>

                    </div>
                </div>


            </div>
        </div>


    </div>
    </div>


@endsection
