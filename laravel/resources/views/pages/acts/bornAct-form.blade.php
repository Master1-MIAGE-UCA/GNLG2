@php
    $title="Ajout Acte de naissance";
    if($bornAct && $bornAct->ID>0){
    $title="Modification information d'acte de naissance";
    }
@endphp
<h4>{{$title}}</h4>
@csrf
<input type="hidden" name="addOrUpdate" value="{{ ($bornAct)?1:0 }}"/>
<h6 class="mb-2 mt-2"><i class="material-icons">add_circle_outline</i> Acte de naissance</h6>
<div class="row">
    <div class="col s12">
        <div class="row">
            @if($bornAct)
            <input type="hidden" name="ID" value="{{ ($bornAct)?$bornAct->ID:0 }}"/>
            @else
            <div class="input-field col s4">
                <i class="material-icons prefix">vpn_lock</i>
                <input id="ID" name="ID" type="number" class="validate"
                       value="{{ ($bornAct)?$bornAct->ID:'' }}" required>
                <label for="ID" class="active">ID*</label>
            </div>
            @endif
            <div class="input-field col s{{($bornAct)?'6':'4'}}">
                <i class="material-icons prefix">vpn_lock</i>
                <input id="CODCOM" name="CODCOM" type="text" class="validate"
                       value="{{ ($bornAct)?$bornAct->CODCOM:'' }}" >
                <label for="CODCOM" class="active">Code INSEE*</label>
            </div>

            <div class="input-field col s{{($bornAct)?'6':'4'}}">
                <input id="COMMUNE" name="COMMUNE" type="text" class="validate"
                       value="{{ ($bornAct)?$bornAct->COMMUNE:'' }}" >
                <label for="COMMUNE" class="active">Commune*</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">room</i>
                <input id="CODDEP" name="CODDEP" type="text" class="validate" value="{{ ($bornAct)?$bornAct->CODDEP:'' }}"
                       >
                <label for="CODDEP" class="active">Code département*</label>
            </div>
            <div class="input-field col s6">
                <input id="DEPART" name="DEPART" type="text" class="validate"
                       value="{{ ($bornAct)?$bornAct->DEPART:'' }}" >
                <label for="DEPART" class="active">Département*</label>
            </div>
        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp;Nouveau Né</h6>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="NOM" name="NOM" type="text" class="validate" value="{{ ($bornAct)?$bornAct->NOM:'' }}"
                       >
                <label for="NOM" class="active">Nom du nouveau né*</label>
            </div>
            <div class="input-field col s6">
                <input id="PRE" name="PRE" type="text" class="validate"
                       value="{{ ($bornAct)?$bornAct->PRE:'' }}"  >
                <label for="PRE" class="active">Prénom du nouveau né*</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">today</i>
                <input id="LADATE" name="LADATE" type="date" class="validate" value="{{ ($bornAct)?$bornAct->LADATE:'' }}" >
                <label for="LADATE" class="active">Date de l'acte</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="SEXE" name="SEXE" type="text" class="validate" value="{{ ($bornAct)?$bornAct->SEXE:'' }}">
                <label for="SEXE" class="active">Sexe</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="COM" name="COM" type="text" class="validate" value="{{ ($bornAct)?$bornAct->COM:'' }}" >
                <label for="COM" class="active">Commentaire</label>
            </div>

        </div>
<h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp; Son père</h6>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="P_NOM" name="P_NOM" type="text" class="validate"
                value="{{ ($bornAct)?$bornAct->P_NOM:'' }}" >
                <label for="P_NOM" class="active">Nom du père*</label>
            </div>
            <div class="input-field col s6">
                <input id="P_PRE" name="P_PRE" type="text" class="validate"
                value="{{ ($bornAct)?$bornAct->P_PRE:'' }}" >
                <label for="P_PRE" class="active">Prénom du père*</label>
            </div>

        </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">contacts</i>
                <input id="P_PRO" name="P_PRO" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->P_PRO:'' }}"/>
                <label for="P_PRO" class="active">Profession</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">comment</i>
                <input id="P_COM" name="P_COM" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->P_COM:'' }}"/>
                <label for="P_COM" class="active">Commentaire</label>
            </div>

        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp; Sa mère</h6>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="M_NOM" name="M_NOM" type="text" class="validate"
                value="{{ ($bornAct)?$bornAct->M_NOM:'' }}" >
                <label for="M_NOM" class="active">Nom du mère*</label>
            </div>
            <div class="input-field col s6">
                <input id="M_PRE" name="M_PRE" type="text" class="validate"
                value="{{ ($bornAct)?$bornAct->M_PRE:'' }}" >
                <label for="M_PRE" class="active">Prénom du mère*</label>
            </div>

        </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">contacts</i>
                <input id="M_PRO" name="M_PRO" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->M_PRO:'' }}"/>
                <label for="M_PRO" class="active">Profession</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">comment</i>
                <input id="M_COM" name="M_COM" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->M_COM:'' }}"/>
                <label for="M_COM" class="active">Commentaire</label>
            </div>

        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp; Témoins</h6>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="T1_NOM" name="T1_NOM" type="text" class="validate"
                value="{{ ($bornAct)?$bornAct->T1_NOM:'' }}" >
                <label for="T1_NOM" class="active">Nom du témoin 1*</label>
            </div>
            <div class="input-field col s6">
                <input id="T1_PRE" name="T1_PRE" type="text" class="validate"
                value="{{ ($bornAct)?$bornAct->T1_PRE:'' }}" >
                <label for="T1_PRE" class="active">Prénom du témoin 1*</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="T1_COM" name="T1_COM" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->T1_COM:'' }}"/>
                <label for="T1_COM" class="active">Commentaire</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="T2_NOM" name="T2_NOM" type="text" class="validate"
                value="{{ ($bornAct)?$bornAct->T2_NOM:'' }}" >
                <label for="T2_NOM" class="active">Nom du témoin 2*</label>
            </div>
            <div class="input-field col s6">
            <i class="material-icons prefix">person</i>
                <input id="T2_PRE" name="T2_PRE" type="text" class="validate"
                value="{{ ($bornAct)?$bornAct->T2_PRE:'' }}" >
                <label for="T2_PRE" class="active">Prénom du témoin 2*</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="T2_COM" name="T2_COM" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->T2_COM:'' }}"/>
                <label for="T2_COM" class="active">Commentaire</label>
            </div>

        </div>



        <h6 class="mb-2 mt-2"><i class="material-icons">import_contacts</i>&nbsp; Références</h6>

        <div class="row">
            <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
                <input id="COTE" name="COTE" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->COTE:'' }}"/>
                <label for="COTE" class="active">Cote</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">comment</i>
                <input id="LIBRE" name="LIBRE" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->LIBRE:'' }}"/>
                <label for="LIBRE" class="active">Libre</label>
            </div>
        </div>
        <div class="row">

            <div class="input-field col s6">
                <i class="material-icons prefix">insert_comment</i>
                <input id="COMGEN" name="COMGEN" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->COMGEN:'' }}"/>
                <label for="COMGEN" class="active">Commentaire général</label>
            </div>
            <div class="input-field col s">6
                <i class="material-icons prefix">image</i>
                <input id="PHOTOS" name="PHOTOS" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->PHOTOS:'' }}"/>
                <label for="PHOTOS" class="active">Photos</label>
            </div>
        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons">library_books</i>&nbsp; Crédits</h6>
        <div class="row">
            <div class="input-field col s6">
            <i class="material-icons prefix">portrait</i>
                <input id="DEPOSANT" name="DEPOSANT" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->DEPOSANT:'' }}"/>
                <label for="DEPOSANT" class="active">Déposant</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">linked_camera</i>
                <input id="PHOTOGRA" name="PHOTOGRA" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->PHOTOGRA:'' }}"/>
                <label for="PHOTOGRA" class="active">Photographe</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
                <input id="RELEVEUR" name="RELEVEUR" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->RELEVEUR:'' }}"/>
                <label for="RELEVEUR" class="active">Releveur</label>
            </div>
            <div class="input-field col s6">
                <input id="VERIFIEU" name="VERIFIEU" class="materialize-textarea" value="{{ ($bornAct)?$bornAct->VERIFIEU:'' }}"/>
                <label for="VERIFIEU" class="active">Vérificateur </label>
            </div>
        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons">library_books</i>&nbsp; Gestion</h6>
        <div class="row">
        <div class="input-field col s6">
                <i class="material-icons prefix">today</i>
                <input id="DTDEPOT" name="DTDEPOT" type="date" class="validate" value="{{ ($bornAct)?$bornAct->DTDEPOT:'' }}" >
                <label for="DTDEPOT" class="active">Date de dépot</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">today</i>
                <input id="DTMODIF" name="DTMODIF" type="date" class="validate" value="{{ ($bornAct)?$bornAct->DTMODIF:'' }}" >
                <label for="DTMODIF" class="active">Date de modification</label>
            </div>
        </div>









    </div>
</div>

<script>



</script>
