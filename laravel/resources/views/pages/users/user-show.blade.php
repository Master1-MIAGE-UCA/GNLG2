<div class="col s12">
    <div class="container">
        <!-- users view start -->
        <div class="section users-view">
            <!-- users view media object start -->
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m7">
                        <div class="display-flex media">
                            <a href="#" class="avatar">
                                <img src="../../../app-assets/images/avatar/default_avatar.jpg" alt="users view avatar"
                                     class="z-depth-4 circle" height="64" width="64">
                            </a>
                            <div class="media-body">
                                <h6 class="media-heading">
                                    <span class="users-view-name">{{$user->nom}} {{$user->prenom}}</span>
                                    <span class="grey-text">@</span>
                                    <span class="users-view-username grey-text">{{$user->login}}</span>
                                </h6>
                                <span>ID:</span>
                                <span class="users-view-id">{{$user->ID}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                        <a href="mailto:{{$user->email}}" class="btn-small btn-light-indigo"><i class="material-icons">mail_outline</i></a>
                        <a href="page-users-edit.html" </a>
                        <a href="javascript:void(0)" onclick="_formUser({{$user->ID}})"
                           class="btn-small indigo">Edit</a>
                    </div>
                </div>
            </div>
            <!-- users view media object ends -->


            <!-- users view card details start -->
            <div class="card">
                <div class="card-content">
                    <div class="row indigo lighten-5 border-radius-4 mb-2">
                        <div class="col s12 m4 users-view-timeline">
                            <h6 class="indigo-text m-0">Régime: <span>{{$user->regime}}</span></h6>
                        </div>
                        <div class="col s12 m4 users-view-timeline">
                            <h6 class="indigo-text m-0">Solde: <span>{{$user->solde}}</span></h6>
                        </div>
                        <div class="col s12 m4 users-view-timeline">
                            <h6 class="indigo-text m-0">Point de consommation: <span>{{$user->pt_conso}}</span></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Nom:</td>
                                    <td class="users-view-username">{{$user->nom}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom:</td>
                                    <td class="users-view-name">{{$user->prenom}}</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td class="users-view-email">{{$user->email}}</td>
                                </tr>
                                @php
                                    $class = '';
                                    $statut = $user->statut;
                                    if ($statut == 'W') {
                                        $class = 'blue';
                                        $statut .= " : Attente d'activation";
                                    } elseif ($statut == 'A') {
                                        $class = 'orange';
                                        $statut .= " : Attente d'approbation";
                                    } elseif ($statut == 'N') {
                                        $class = 'green';
                                        $statut .= " : Accès autorisé";
                                    } elseif ($statut == 'B') {
                                        $class = 'red';
                                        $statut .= " : Accès bloqué";
                                    }
                                @endphp
                                <tr>
                                    <td>Statut:</td>
                                    <td><span class=" chip {{$class}} lighten-6"><b>{{$statut}}</b></span>
                                    </td>
                                </tr>
                                @php
                  $class = '';
                  $textcolor = 'black-text';
                  $level = $user->level;

                   if ($level == '0') {
                       $level .= " : Aucun accès";
                       $class = 'lime lighten-5';
                   } elseif ($level == '1') {
                       $level .= " : Liste des communes";
                       $class = 'lime lighten-4';
                   } elseif ($level == '2') {
                       $level .= " : Liste des patronymes";
                       $class = 'lime lighten-3';
                   } elseif ($level == '3') {
                       $level .= " : Table des actes";
                       $class = 'lime lighten-2';
                   } elseif ($level == '4') {
                       $level .= " : Détails des actes (avec limites)";
                       $class = 'lime lighten-1';
                   } elseif ($level == '5') {
                       $level .= " : Détails sans limitations";
                       $class = 'lime';
                   } elseif ($level == '6') {
                       $level .= " : Chargement NIMEGUE et CSV";
                       $class = 'lime darken-1';
                       $textcolor = 'white-text';
                   } elseif ($level == '7') {
                       $level .= " : Ajout d'actes";
                       $class = 'lime darken-2';
                       $textcolor = 'white-text';
                   } elseif ($level == '8') {
                       $level .= " : Administration tous actes";
                       $class = 'lime darken-3';
                       $textcolor = 'white-text';
                   } elseif ($level == '9') {
                       $level .= " : Gestion des utilisateurs";
                       $class = 'lime darken-4';
                       $textcolor = 'white-text';
                   }


                                @endphp
                                <tr>
                                    <td>Niveau d'accès:</td>
                                    <td><span class=" chip {{$class}} lighten-5"><b
                                                class="{{$textcolor}}">{{$level}}</b></span></td>
                                </tr>

                                </tbody>
                            </table>
                            <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Autres infos</h6>
                            <table class="striped">
                                <tbody>
                                <tr>
                                    <td>Date de création:</td>
                                    <td>{{date("d/m/Y", strtotime($user->dtcreation))}}</td>
                                </tr>
                                <tr>
                                    <td>Date d'éxpiration:</td>
                                    <td>{{date("d/m/Y", strtotime($user->dtexpiration))}}</td>
                                </tr>
                                <tr>
                                    <td>Date màj solde:</td>
                                    <td>{{date("d/m/Y", strtotime($user->maj_solde))}}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire:</td>
                                    <td>{{ ($user->REM)?"'".$user->REM."'":'-' }}</td>
                                </tr>
                                <tr>
                                    <td>Zone libre:</td>
                                    <td>{{ ($user->libre)?"'".$user->libre."'":'-' }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <!-- users view card details ends -->

        </div>
        <!-- users view ends -->

    </div>
    <div class="content-overlay"></div>
</div>
