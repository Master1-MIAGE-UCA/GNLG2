<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">

<div id="file-upload" class="section">
    <div class="row">
        <div class="col s12 m4 l3">
        </div>
        <div class="col s12 m8 l8">
            <label><i class="material-icons left">warning</i>Attention: Veuillez suivre la structure du fichier CSV à
                importer (Télécharger le fichier example pour le suivre)</label>
        </div>
        <div class="col s12 m8 l1">
            <a class="btn-floating mb-1 btn-flat waves-effect waves-light orange accent-2 white-text" onclick="_downloadExempleUsersCSV()" title="Télécharger exemple fichier CSV">
                <i class="material-icons">wb_incandescent</i>
            </a>
        </div>
    </div>
    <div class="row section">
        <div class="col s12 m4 l3">
            <p>Importation des utilisateurs</p>
        </div>
        <div class="col s12 m8 l9">
            <input type="file" id="input-import-users-files" name="import-users-files" class="dropify" data-height="500"
                   data-default-file=""/>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4 l3">
        </div>
        <div class="col s12 m8 l9">
            <label>
                <input type="checkbox" id="auto_mail_send" name="auto_mail_send"/>
                <span>Envoi automatique d'un mail aux personnes conserner</span>
            </label>
        </div>
    </div>
</div>


<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-file-uploads.js')}}"></script>




