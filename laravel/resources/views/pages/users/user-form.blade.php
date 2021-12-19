@php
    $title="Ajout utilisateur";
    if($user && $user->ID>0){
    $title="Modification information d'utilisateur";
    }
@endphp
<h4>{{$title}}</h4>
@csrf
<input type="hidden" name="ID" value="{{ ($user)?$user->ID:0 }}"/>
<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="nom" name="nom" type="text" class="validate"
                       value="{{ ($user)?$user->nom:'' }}" required>
                <label for="nom" class="active">Nom*</label>
            </div>
            <div class="input-field col s6">
                <input id="prenom" name="prenom" type="text" class="validate"
                       value="{{ ($user)?$user->prenom:'' }}" required>
                <label for="prenom" class="active">Prénom*</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input id="email" name="email" type="email" class="validate" value="{{ ($user)?$user->email:'' }}"
                       required>
                <label for="email" class="active">Email*</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">note_add</i>
                <textarea id="libre" name="libre" class="materialize-textarea">{{($user)?$user->libre:''}}</textarea>
                <label for="libre" class="active">Zone libre</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <i class="material-icons prefix">person</i>
                <input id="login" name="login" type="text" class="validate"
                       value="{{ ($user)?$user->login:'' }}" required>
                <label for="login" class="active">Login*</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">vpn_key</i>
                <input id="hashpass" name="hashpass" type="password" class="validate">
                <label for="hashpass" class="active">Mot de passe*</label>
                @if($user)<span
                    class="helper-text">Si vous ne voulez pas changer le mdp veuillez laisser cette zone vide</span>@endif
            </div>
            <div class="input-field col s4">
                <input id="conf_hashpass" name="conf_hashpass" type="password" class="validate" value="">
                <label for="conf_hashpass" class="active">Confimation du mot de passe*</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                @php
                    function completeStatut($statut) {
                        switch ($statut){
                            case 'W' : $statut .= " : Attente d'activation";break;
                            case 'A' : $statut .= " : Attente d'approbation";break;
                            case 'N' : $statut .= " : Accès autorisé";break;
                            case 'B' : $statut .= " : Accès bloqué";break;
                            default : $statut = '';
                        }
                        return $statut;
                    }
                @endphp
                <select class="select2 browser-default" name="statut" required>
                    <option>Choisissez le statut de l'utilisateur...</option>
                    @foreach($statuts as $statut)
                        <option
                            value="{{$statut}}" {{ (  $user && ($statut == $user->statut) ) ? 'selected' : '' }}>{{completeStatut($statut)}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">today</i>
                <input id="dtcreation" name="dtcreation" type="date" class="validate" disabled>
                <label for="dtcreation" class="active">Date d'entrée</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">date_range</i>
                <input id="dtexpiration" name="dtexpiration" type="date" class="validate" value="">
                <label for="dtexpiration" class="active">Date d'éxpiration</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s4">
                @php
                    function completeLevel($level) {
                        switch ($level){
                            case '0' : $level .= " : Aucun accès";break;
                            case '1' : $level .= " : Liste des communes";break;
                            case '2' : $level .= " : Liste des patronymes";break;
                            case '3' : $level .= " : Table des actes";break;
                            case '4' : $level .= " : Détails des actes (avec limites)";break;
                            case '5' : $level .= " : Détails sans limitations";break;
                            case '6' : $level .= " : Chargement NIMEGUE et CSV";break;
                            case '7' : $level .= " : Ajout d'actes";break;
                            case '8' : $level .= " : Administration tous actes";break;
                            case '9' : $level .= " : Gestion des utilisateurs";break;
                            default : $level = '';
                        }
                        return $level;
                    }
                @endphp
                <select class="select2 browser-default" name="level">
                    <option>Choisissez le droit d'accès...</option>
                    @foreach($levels as $level)
                        <option
                            value="{{$level}}" {{ (  $user && ($level == $user->level) ) ? 'selected' : '' }}>{{completeLevel($level)}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s8">
                <i class="material-icons prefix">comment</i>
                <textarea id="REM" name="REM" class="materialize-textarea"></textarea>
                <label for="REM" class="active">Commentaire</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label>
                    <input type="checkbox" id="auto_mail_send" name="auto_mail_send"/>
                    <span>Envoi automatique du mail ci-dessous </span>
                </label>
            </div>
        </div>

    </div>
</div>

<script>



</script>
