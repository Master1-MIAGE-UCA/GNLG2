@php
    $title="Ajout Acte divers";
    if($diversAct && $diversAct->ID>0){
    $title="Modification information d'acte divers";
    }
@endphp
<h4>{{$title}}</h4>
@csrf
<input type="hidden" name="ID" value="{{ ($diversAct)?$diversAct->ID:0 }}"/>
<h6 class="mb-2 mt-2"><i class="material-icons">add_circle_outline</i> Acte divers/h6>
<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">vpn_lock</i>
                <input id="CODCOM" name="CODCOM" type="text" class="validate"
                       value="{{ ($diversAct)?$diversAct->CODCOM:'' }}" >
                <label for="CODCOM" class="active">Code INSEE*</label>
            </div>

            <div class="input-field col s6">
                <input id="COMMUNE" name="COMMUNE" type="text" class="validate"
                       value="{{ ($diversAct)?$diversAct->COMMUNE:'' }}" >
                <label for="COMMUNE" class="active">Commune*</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">room</i>
                <input id="CODDEP" name="CODDEP" type="text" class="validate" value="{{ ($diversAct)?$diversAct->CODDEP:'' }}"
                       >
                <label for="CODDEP" class="active">Code département*</label>
            </div>
            <div class="input-field col s6">
                <input id="DEPART" name="DEPART" type="text" class="validate"
                       value="{{ ($diversAct)?$diversAct->DEPART:'' }}" >
                <label for="DEPART" class="active">Département*</label>
            </div>
        </div>


        <h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp;Epoux</h6>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="NOM" name="NOM" type="text" class="validate" value="{{ ($diversAct)?$diversAct->NOM:'' }}"
                       >
                <label for="NOM" class="active">Nom de l'époux*</label>
            </div>
            <div class="input-field col s6">
                <input id="PRE" name="PRE" type="text" class="validate"
                       value="{{ ($diversAct)?$diversAct->PRE:'' }}"  >
                <label for="PRE" class="active">Prénom de l'époux*</label>
            </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="EXCON" name="EXCON" type="text" class="validate" value="{{ ($diversAct)?$diversAct->EXCON:'' }}">
                <label for="EXCON" class="active">Veuf de</label>
            </div>

            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="COM" name="COM" type="text" class="validate" value="{{ ($diversAct)?$diversAct->COM:'' }}">
                <label for="COM" class="active">Commentaire</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">room</i>
                <input id="ORI" name="ORI" type="text" class="validate" value="{{ ($diversAct)?$diversAct->ORI:'' }}" >
                <label for="ORI" class="active">Origine</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">today</i>
                <input id="DNAIS" name="DNAIS" type="date" class="validate" value="{{ ($diversAct)?$diversAct->DNAIS:'' }}">
                <label for="DNAIS" class="active">Date de naissance</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="AGE" name="AGE" type="text" class="validate" value="{{ ($diversAct)?$diversAct->AGE:'' }}" >
                <label for="AGE" class="active">Age</label>
            </div>
            <div class="input-field col s6">
                <input id="PRO" name="PRO" type="text" class="validate" value="{{ ($diversAct)?$diversAct->PRO:'' }}">
                <label for="PRO" class="active">Profession</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="COM" name="COM" type="text" class="validate" value="{{ ($diversAct)?$diversAct->COM:'' }}" >
                <label for="COM" class="active">Commentaire</label>
            </div>

        </div>
<h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp; Son père</h6>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="P_NOM" name="P_NOM" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->P_NOM:'' }}" >
                <label for="P_NOM" class="active">Nom du père*</label>
            </div>
            <div class="input-field col s6">
                <input id="P_PRE" name="P_PRE" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->P_PRE:'' }}" >
                <label for="P_PRE" class="active">Prénom du père*</label>
            </div>

        </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">contacts</i>
                <input id="P_PRO" name="P_PRO" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->P_PRO:'' }}"/>
                <label for="P_PRO" class="active">Profession</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">comment</i>
                <input id="P_COM" name="P_COM" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->P_COM:'' }}"/>
                <label for="P_COM" class="active">Commentaire</label>
            </div>

        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp; Sa mère</h6>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="M_NOM" name="M_NOM" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->M_NOM:'' }}" >
                <label for="M_NOM" class="active">Nom du mère*</label>
            </div>
            <div class="input-field col s6">
                <input id="M_PRE" name="M_PRE" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->M_PRE:'' }}" >
                <label for="M_PRE" class="active">Prénom du mère*</label>
            </div>

        </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">contacts</i>
                <input id="M_PRO" name="M_PRO" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->M_PRO:'' }}"/>
                <label for="M_PRO" class="active">Profession</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">comment</i>
                <input id="M_COM" name="M_COM" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->M_COM:'' }}"/>
                <label for="M_COM" class="active">Commentaire</label>
            </div>

        </div>












        <h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp;Epouse</h6>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="C_NOM" name="C_NOM" type="text" class="validate" value="{{ ($diversAct)?$diversAct->C_NOM:'' }}"
                       >
                <label for="C_NOM" class="active">Nom de l'épouse*</label>
            </div>
            <div class="input-field col s6">
                <input id="C_PRE" name="C_PRE" type="text" class="validate"
                       value="{{ ($diversAct)?$diversAct->C_PRE:'' }}"  >
                <label for="C_PRE" class="active">Prénom de l'épouse*</label>
            </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="C_EXCON" name="C_EXCON" type="text" class="validate" value="{{ ($diversAct)?$diversAct->C_EXCON:'' }}">
                <label for="C_EXCON" class="active">Veuve de</label>
            </div>

            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="C_X_COM" name="C_X_COM" type="text" class="validate" value="{{ ($diversAct)?$diversAct->C_X_COM:'' }}">
                <label for="C_X_COM" class="active">Commentaire</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">room</i>
                <input id="C_ORI" name="C_ORI" type="text" class="validate" value="{{ ($diversAct)?$diversAct->C_ORI:'' }}" >
                <label for="C_ORI" class="active">Origine</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">today</i>
                <input id="C_DNAIS" name="C_DNAIS" type="date" class="validate" value="{{ ($diversAct)?$diversAct->C_DNAIS:'' }}">
                <label for="C_DNAIS" class="active">Date de naissance</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="C_AGE" name="C_AGE" type="text" class="validate" value="{{ ($diversAct)?$diversAct->C_AGE:'' }}" >
                <label for="C_AGE" class="active">Age</label>
            </div>
            <div class="input-field col s6">
                <input id="C_PRO" name="C_PRO" type="text" class="validate" value="{{ ($diversAct)?$diversAct->C_PRO:'' }}">
                <label for="C_PRO" class="active">Profession</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="C_COM" name="C_COM" type="text" class="validate" value="{{ ($diversAct)?$diversAct->C_COM:'' }}" >
                <label for="C_COM" class="active">Commentaire</label>
            </div>

        </div>
<h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp; Son père</h6>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="CP_NOM" name="CP_NOM" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->CP_NOM:'' }}" >
                <label for="CP_NOM" class="active">Nom du père*</label>
            </div>
            <div class="input-field col s6">
                <input id="CP_PRE" name="CP_PRE" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->CP_PRE:'' }}" >
                <label for="CP_PRE" class="active">Prénom du père*</label>
            </div>

        </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">contacts</i>
                <input id="CP_PRO" name="CP_PRO" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->CP_PRO:'' }}"/>
                <label for="CP_PRO" class="active">Profession</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">comment</i>
                <input id="CP_COM" name="CP_COM" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->CP_COM:'' }}"/>
                <label for="CP_COM" class="active">Commentaire</label>
            </div>

        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp; Sa mère</h6>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="CM_NOM" name="CM_NOM" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->CM_NOM:'' }}" >
                <label for="CM_NOM" class="active">Nom du mère*</label>
            </div>
            <div class="input-field col s6">
                <input id="CM_PRE" name="CM_PRE" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->CM_PRE:'' }}" >
                <label for="CM_PRE" class="active">Prénom du mère*</label>
            </div>

        </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">contacts</i>
                <input id="CM_PRO" name="CM_PRO" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->CM_PRO:'' }}"/>
                <label for="CM_PRO" class="active">Profession</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">comment</i>
                <input id="CM_COM" name="CM_COM" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->CM_COM:'' }}"/>
                <label for="CM_COM" class="active">Commentaire</label>
            </div>

        </div>


        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons"> person_add </i>&nbsp; Témoins</h6>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="T1_NOM" name="T1_NOM" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->T1_NOM:'' }}" >
                <label for="T1_NOM" class="active">Nom du témoin 1*</label>
            </div>
            <div class="input-field col s6">
                <input id="T1_PRE" name="T1_PRE" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->T1_PRE:'' }}" >
                <label for="T1_PRE" class="active">Prénom du témoin 1*</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="T1_COM" name="T1_COM" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->T1_COM:'' }}"/>
                <label for="T1_COM" class="active">Commentaire</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="T2_NOM" name="T2_NOM" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->T2_NOM:'' }}" >
                <label for="T2_NOM" class="active">Nom du témoin 2*</label>
            </div>
            <div class="input-field col s6">
            <i class="material-icons prefix">person</i>
                <input id="T2_PRE" name="T2_PRE" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->T2_PRE:'' }}" >
                <label for="T2_PRE" class="active">Prénom du témoin 2*</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="T2_COM" name="T2_COM" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->T2_COM:'' }}"/>
                <label for="T2_COM" class="active">Commentaire</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="T3_NOM" name="T3_NOM" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->T3_NOM:'' }}" >
                <label for="T3_NOM" class="active">Nom du témoin 3*</label>
            </div>
            <div class="input-field col s6">
            <i class="material-icons prefix">person</i>
                <input id="T3_PRE" name="T3_PRE" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->T3_PRE:'' }}" >
                <label for="T3_PRE" class="active">Prénom du témoin 3*</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="T3_COM" name="T3_COM" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->T3_COM:'' }}"/>
                <label for="T3_COM" class="active">Commentaire</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input id="T4_NOM" name="T4_NOM" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->T4_NOM:'' }}" >
                <label for="T4_NOM" class="active">Nom du témoin 4*</label>
            </div>
            <div class="input-field col s6">
            <i class="material-icons prefix">person</i>
                <input id="T4_PRE" name="T4_PRE" type="text" class="validate"
                value="{{ ($diversAct)?$diversAct->T4_PRE:'' }}" >
                <label for="T4_PRE" class="active">Prénom du témoin 4*</label>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">comment</i>
                <input id="T4_COM" name="T4_COM" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->T4_COM:'' }}"/>
                <label for="T4_COM" class="active">Commentaire</label>
            </div>

        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons">import_contacts</i>&nbsp; Références</h6>

        <div class="row">
            <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
                <input id="COTE" name="COTE" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->COTE:'' }}"/>
                <label for="COTE" class="active">Cote</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">comment</i>
                <input id="LIBRE" name="LIBRE" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->LIBRE:'' }}"/>
                <label for="LIBRE" class="active">Libre</label>
            </div>
        </div>
        <div class="row">

            <div class="input-field col s6">
                <i class="material-icons prefix">insert_comment</i>
                <input id="COMGEN" name="COMGEN" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->COMGEN:'' }}"/>
                <label for="COMGEN" class="active">Commentaire général</label>
            </div>
            <div class="input-field col s">6
                <i class="material-icons prefix">image</i>
                <input id="PHOTOS" name="PHOTOS" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->PHOTOS:'' }}"/>
                <label for="PHOTOS" class="active">Photos</label>
            </div>
        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons">library_books</i>&nbsp; Crédits</h6>
        <div class="row">
            <div class="input-field col s6">
            <i class="material-icons prefix">portrait</i>
                <input id="DEPOSANT" name="DEPOSANT" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->DEPOSANT:'' }}"/>
                <label for="DEPOSANT" class="active">Déposant</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">linked_camera</i>
                <input id="PHOTOGRA" name="PHOTOGRA" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->PHOTOGRA:'' }}"/>
                <label for="PHOTOGRA" class="active">Photographe</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
                <input id="RELEVEUR" name="RELEVEUR" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->RELEVEUR:'' }}"/>
                <label for="RELEVEUR" class="active">Releveur</label>
            </div>
            <div class="input-field col s6">
                <input id="VERIFIEU" name="VERIFIEU" class="materialize-textarea" value="{{ ($diversAct)?$diversAct->VERIFIEU:'' }}"/>
                <label for="VERIFIEU" class="active">Vérificateur </label>
            </div>
        </div>
        <h6 class="mb-2 mt-2"><i class="material-icons">library_books</i>&nbsp; Gestion</h6>
        <div class="row">
        <div class="input-field col s4">
                <i class="material-icons prefix">today</i>
                <input id="DTDEPOT" name="DTDEPOT" type="date" class="validate" value="{{ ($diversAct)?$diversAct->DTDEPOT:'' }}" >
                <label for="DTDEPOT" class="active">Date de dépot</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">today</i>
                <input id="DTMODIF" name="DTMODIF" type="date" class="validate" value="{{ ($diversAct)?$diversAct->DTMODIF:'' }}" >
                <label for="DTMODIF" class="active">Date de modification</label>

            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">today</i>
                <input id="LADATE" name="LADATE" type="date" class="validate" value="{{ ($diversAct)?$diversAct->LADATE:'' }}" >
                <label for="LADATE" class="active">Date de modification</label>
            </div>
        </div>









    </div>
</div>

<script>



</script>
