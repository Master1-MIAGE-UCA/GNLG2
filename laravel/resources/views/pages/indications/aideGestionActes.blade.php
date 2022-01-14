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
                                <h4 class="card-title">Gestion des actes</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 l12">
                                <ul class="tabs">
                                    <li class="tab col s4 p-0"><a class="active p-0" href="#view-FormatNem">Format
                                            NIMEGUE</a></li>
                                    <li class="tab col s4 p-0"><a class="p-0" href="#view-FormatCSV">Format CSV</a></li>
                                    <li class="tab col s4 p-0"><a class=" p-0" href="#view-Actes">Gérer Actes</a></li>

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div id="view-FormatNem">
                        <p>Charger des actes au format NIMEGUE</p>

                        <div class="card hoverable small">
                            <div>
                                <img style="position: -webkit-sticky;
position: sticky;
top: 20px; height:300px; width:100%;"
                                     src="https://www.neuillysurseine.fr/images/neuilly/vie_quotidienne/citoyennete/justificatifs-demandes.jpg"
                                     alt="">
                            </div>
                        </div>
                        <div class="card-content s60 m6 l12">
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;Cette fonction permet de charger des actes encodés à l'aide du programme NIMEGUE (version
                                2 ou version 3) développé par Gilles DAVID : voir le site du logiciel et le groupe de
                                discussion consacré au programme.</br></br> Le programme ExpoActes reconnait
                                automatiquement la version du fichier d'export qui lui est présentée. Il faut savoir que
                                les modifications apportée par la version 3 concernent essentiellment l'allongement de
                                plusieurs zones, et l'ajout de champs permettant de préciser des données plus rares mais
                                parfois rencontrées : professions des mères, nom et prénom des ex-conjoints de plusieurs
                                intervenants, ... ainsi que, à partir de la version 3.06, liste des photographies de
                                l'acte.</br></br>

                                Pour préparer les actes à transférer sur votre site ExpoActes, il faut exporter les
                                données à partir de NIMEGUE en suivant les instructions suivantes :
                                Dans le panneau "Outils", presser le bouton "Export Nimègue V3" (ou V2 le cas échénat);
                                Sélectionner la commune concernée;
                                Taper un nom pour le fichier. Le plus simple pour s'y retrouver consiste à donner le nom
                                de la commune suivi d'une lettre identifiant le type des actes qui vont être exportés
                                (par exemple DINANT_N pour les naissances de DINANT);
                                Presser le bouton "Export" en rapport avec le type d'acte voulu.</br></br>
                                Le fichier va etre exporté automatiquement avec l'extension .TXT .

                            </p>

                        </div>

                    </div>


                    <div id="view-FormatCSV">
                        <p> &nbsp;&nbsp;Charger des actes au format Excel(CSV)</p>

                        <div class="card hoverable small">
                            <div>
                                <img src="http://franckgaspoz.fr/wp-content/uploads/2018/02/CSV-file-image.png" style="position: -webkit-sticky;
                                                position: sticky;
top: 20px; height:300px; width:100%;" alt="">

                            </div>
                        </div>
                        <div class="card-content s60 m6 l12">
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;Cette option permet de charger des actes encodés dans MS-Excel ou dans OpenOffice
                                (Classeur)
                                en s'adaptant de façon très souple à la structure de votre fichier.</br></br>
                                En général, les tableaux de dépouillements comportent en première ligne les noms des
                                colonnes précisant le type d' information qui peut y être rangée. Par exemple, Nom,
                                Prénom,
                                Sexe, Nom du père, Nom de la mère, .... Ensuite dans les lignes suivantes se trouvent
                                les
                                informations dépouillées, un acte par ligne.</br></br>

                                Il convient de commencer par enregistrer la feuille au format CSV en prenant soin de
                                choisir
                                le point-virgule ou la tabulation pour séparer les champs. Autant que possible, il vaut
                                mieux faire encadrer les champs par des guillemets. Ce n'est pas obligatoire sauf si les
                                textes encodés comportent eux-mêmes des points-virgules.</br></br>

                                Il n'y a par contre pas de contrainte sur le nombre ou l'ordre des colonnes.
                            </p>

                        </div>
                    </div>

                    <div id="view-Actes">
                        <p> &nbsp;&nbsp;Lister et gérer les actes présents dans la base de données</p>

                        <div class="card hoverable small">
                            <div>
                                <img
                                    src="https://i.pinimg.com/736x/64/c8/3d/64c83d42d4a6be4d63f70f7434853a3f--grand-format-family-trees.jpg"
                                    style="position: -webkit-sticky;
                                                position: sticky;top: 20px; height:300px; width:100%;" alt="">

                            </div>
                        </div>
                        <div class="card-content s60 m6 l12">
                            <p>
                                &emsp;&emsp;&emsp;&emsp;&emsp;Chaque acte est associé avec le code de la personne qui a chargé cet acte dans la base
                                de
                                données (le déposant). La navigation dans les actes en mode administration permet
                                d'afficher
                                le nom du déposant de l'acte. De plus, lorsque ce sont des actes que vous avez déposé,
                                le
                                système ajoute des icônes permettant de ajouter,modifier ou de supprimer
                                l'acte.</br></br>

                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    </div>


@endsection
