@php
    $title="Ajout utilisateur";
    if($user && $user->id>0){
    $title="Modification information d'utilisateur";
    }
@endphp
<h4>{{$title}}</h4>
@csrf
<input type="hidden" name="id" value="{{ ($user)?$user->id:0 }}"/>
<div class="row">
    <div class="col s12">

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="lastname" name="lastname" type="text" class="validate"
                       value="{{ ($user)?$user->lastname:'' }}">
                <label for="lastname" class="active">Nom</label>
            </div>
            <div class="input-field col s6">
                <input id="firstname" name="firstname" type="text" class="validate"
                       value="{{ ($user)?$user->firstname:'' }}">
                <label for="firstname" class="active">Prénom</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input id="email" name="email" type="email" class="validate" value="{{ ($user)?$user->email:'' }}"
                       required>
                <label for="email" class="active">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">note_add</i>
                <textarea id="zone_libre" name="zone_libre" class="materialize-textarea"></textarea>
                <label for="zone_libre">Zone libre</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <i class="material-icons prefix">person</i>
                <input id="username" name="username" type="text" class="validate"
                       value="{{ ($user)?$user->username:'' }}">
                <label for="username" class="active">Login</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password" name="password" type="password" class="validate" value="">
                <label for="password" class="active">Mot de passe</label>
                @if($user)<span
                    class="helper-text">Si vous ne voulez pas changer le mdp veuillez laisser cette zone vide</span>@endif
            </div>
            <div class="input-field col s4">
                <input id="conf_password" name="conf_password" type="password" class="validate" value="">
                <label for="conf_password" class="active">Confimation du mot de passe</label>
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
                <select class="select2 browser-default" name="statut">
                    <option value="0">Choisissez le statut de l'utilisateur...</option>
                    @foreach($statuts as $statut)
                        <option
                            value="{{$statut}}" {{ (  $user && ($statut == $user->statut) ) ? 'selected' : '' }}>{{completeStatut($statut)}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">today</i>
                <input id="date_entree" name="date_entree" type="date" class="validate" disabled>
                <label for="date_entree" class="active">Date d'entrée</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">date_range</i>
                <input id="date_expiration" name="date_expiration" type="date" class="validate" value="">
                <label for="date_expiration" class="active">Date d'éxpiration</label>
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
                    <option value="0">Choisissez le droit d'accès...</option>
                    @foreach($levels as $level)
                        <option
                            value="{{$level}}" {{ (  $user && ($level == $user->level) ) ? 'selected' : '' }}>{{completeLevel($level)}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s8">
                <i class="material-icons prefix">comment</i>
                <textarea id="comment" name="comment" class="materialize-textarea"></textarea>
                <label for="comment">Commentaire</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label>
                    <input type="checkbox" />
                    <span>Envoi automatique du mail ci-dessous </span>
                </label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">message</i>
                <textarea id="message" name="message" class="materialize-textarea active">
Bonjour #PRENOM#,&#13;&#10;&#13;&#10;Un compte vient d'être créé pour vous permettre de vous connecter au site #NOMSITE# :&#13;&#10;&#13;&#10;#URLSITE#&#13;&#10;&#13;&#10;Votre login : #LOGIN#&#13;&#10;&#13;&#10;Votre mot de passe : #PASSW#&#13;&#10;&#13;&#10;Cordialement,&#13;&#10;&#13;&#10;Votre webmestre.
                </textarea>
                <label for="comment" class="active">Message</label>
            </div>
        </div>
    </div>
</div>

<script>


</script>
