<div class="modal fade" id="update-project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">PROYECTO</h4>
      </div>
      <div class="modal-body">
        <br>
        <div class="x_panel">
          <div class="x_title">
            <h2>PROYECTO</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
                <form data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">
                    <input type="hidden" id="id_pro" name="name">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PROYECTO *</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea style="resize:none;"  id="name_project" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="descripcion" required autofocus></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <button id="actualizar_proyecto" type="button" class="tipoll btn btn-primary">
                                    {{ __('GUARDAR') }}
                    </button>
                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
