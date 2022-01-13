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
            <a class="btn-floating mb-1 btn-flat waves-effect waves-light orange accent-2 white-text" onclick="_downloadExempleMariageActsCSV()" title="Télécharger exemple fichier CSV">
                <i class="material-icons">wb_incandescent</i>
            </a>
        </div>
    </div>
    <div class="row section">
        <div class="col s12 m4 l3">
            <p>Importation des actes de mariage</p>
        </div>
        <div class="col s12 m8 l9">
            <input type="file" id="input-import-mariageActs-files" name="import-mariageActs-files" class="dropify" data-height="500"
                   data-default-file=""/>
        </div>
    </div>
 
</div>


<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-file-uploads.js')}}"></script>




