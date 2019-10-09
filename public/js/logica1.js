$(document).ready(function() {
    $('body').on('click', '.modal_area', function(event) {
      var id_are=$(this).val();
      $("#id_principal").val(id_are);
      $.get('/home/obtener',function(data) {
        $("#area_selec_update").empty();
          $.each(data['areas'],function(i,item) {
              var area='';
              area+='<option value='+item.iddatoarea+'>'+item.descripcion+'</option>';
              $("#area_selec_update").append(area);
          })
          $.each(data['consulta'],function(i,item) {
              $("#periodo_area_update").empty();
              var periodo='';
              periodo+='<option value='+item.idperiodo+'>'+item.periodo+'</option>';
              $("#periodo_area_update").append(periodo);
              if (item.idarea==id_are) {
                $("#area_selec_update").val(item.iddatoarea);
                $("#recurso_conf_update").val(item.valor_asignado);
              }
          })
      })
        $('#area_update').modal('show');
    })

    $('body').on('click', '.modales_meta', function(event) {
        var idindicador=$(this).val();
        $("input[name=id_indicador]").val(idindicador);
        $('#m_meta').modal('show');
      })

    

    function verificar_departamento() {
      var encontrado=false;
      $("#area_tabla tr").find('th:eq(0)').each(function () {
          if ($(this).html()==$("#area_selec").val()) {
            encontrado=true;
          }
      })
      return encontrado;
    }
    $('#guardar_rec_conf').on('click',function(){
      if (verificar_departamento()==false) {
        var datos={
          id_Area:$('#area_selec').val(),
          valor_asignado:$('#recurso_conf').val(),
          id_periodo:$('#periodo_conf').val(),
        };
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: 'areadatos',
          type: 'POST',
          data: datos,
          dataType:'json',
          success:function(data) {
          },
          error:function(data) {
            console.log('error',data);
          }
        });
      } else {
        alertify.alert("LO SENTIMOS, YA ESTA INGRESADA ESTE DATO");
      }
    })

    $('.table').on('click','.delete-area', function(event) {
        var idarea=$(this).val();
        $(this).closest('tr').remove();
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: 'areadatos/'+idarea,
          type: 'DELETE',
          data: idarea,
          success:function(data) {
          },
          error:function(data) {
            console.log('error',data);
          }
        });
    })

    $('#guardar_rec_conf_update').on('click',function() {
          var formData={
            idareaconf:$('#id_principal').val(),
            idperiodo:$('#periodo_area_update').val(),
            idarea:$('#area_selec_update').val(),
            recurso:$('#recurso_conf_update').val(),
          };
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type:'PUT',
            url:'areadatos/'+formData.idareaconf,
            data: formData,
            dataType:'json',
            success: function(data) {

            },
            error:function(data) {
              console.log('error',data);
            }
          })
    })
  });
