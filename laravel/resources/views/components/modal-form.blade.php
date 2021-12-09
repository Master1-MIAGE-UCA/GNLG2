<div id="modal_{{ $id }}" class="modal modal-fixed-footer">
    <div class="modal-content" id="modal_content_{{ $id }}">
        <form id="{{ $formName }}">
            <div id="{{ $formContent }}"></div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light red accent-2 left modal-action modal-close btn-small mr-1" type="button">Annuler
            <i class="material-icons left">close</i>
        </button>
        <button class="btn waves-effect waves-light green right btn-small" onclick="$('#{{ $formName }}').submit();" type="button" name="action">Enregistrer
            <i class="material-icons left">save</i> <span id="span_btn_submit_{{ $formName }}"></span>
        </button>
    </div>
</div>
