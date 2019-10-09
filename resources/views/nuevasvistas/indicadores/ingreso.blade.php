<div class="modal fade" id="insert_indicador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg-2">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">INDICADOR</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_proyecto" name="name" value="">
        <div class="x_content">
        <br />
        <form data-parsley-validate class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">DESCRIPCION *</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea style="width:100%;height:100px;resize:none;" id="name_indicador" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="trimestres" required autofocus></textarea>
            </div>
          </div>
        </form>
      </div>
      </div>
      <div class="modal-footer">
        <button value="new" id="add_indicador" class="btn btn-primary tipoll" type="button">GUARDAR</button>
      </div>
    </div>
  </div>
</div>
