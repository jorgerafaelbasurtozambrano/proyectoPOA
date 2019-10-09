$(document).ready(function() {
  var id_indicador=0;
  var id_metas=0;
  $('body').on('click', '.modal_meta', function(event) {
      id_indicador=$(this).val();
      $('#guardar_meta').val("meta_add");
      $('#ingreso_meta').modal('show');
  })

  $('body').on('click', '.eval_meta', function(event) {
      id_metas=$(this).val();
      limpiar();
      $.get('obtenerr',function(data) {
        $.each(data,function(i,item) {
          $('#eva_metas tr').each(function () {
              var pk = $(this).find("th").eq(0).html();
              if(pk==item.id_evaluacion && id_metas==item.id_meta)
              {
                document.getElementById(item.id_evaluacion).innerHTML =item.porcentaje;
              }
          });
        })
      })
      $('#ingreso_eval').modal('show');
  })
  function validar_porcentajes() {
    if ($('#porcentaje').val()<=100 && $('#porcentaje').val()>=1 ) {
      return true;
    } else {
      return false;
    }
  }
  function imprimir($nuevo_numero) {
    var $suma=0;
    $("#eva_metas").children("tbody").children("tr").each(function (i) {
      var $this = $(this);
      var my_td = $this.children("th");
      var second_col = my_td.eq(4);
      if (second_col.html()!="") {
        $suma=$suma+parseInt(second_col.html());
      }
    });
    $suma=$suma+$nuevo_numero;
    return $suma;
  }

  function limpiar() {
    $("#eva_metas").children("tbody").children("tr").each(function (i) {
      console.log($(this).find("th:eq(4)").text());
      $(this).find("th:eq(4)").text("");
    });
  }

  function asignar_vacio() {
    $("#eva_metas").children("tbody").children("tr").each(function (i) {
      if ($(this).find("th:eq(4)").text()=="") {
        $(this).find("th:eq(4)").text('0');
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var formData={
          id_meta:id_metas,
          id_evaluacion:$(this).find("th:eq(0)").text(),
          observacion:"",
          porcentaje:0,
        };
        console.log(formData);
        $.ajax({
          type:'POST',
          url:'meta_evaluar',
          data: formData,
          dataType:'json',
          success: function(data) {
          },
          error:function(data) {
            console.log('error',data);
          }
        });
      }
    });
  }

  $('#_add_evaluar_meta').on('click',function (){
    if (document.getElementById($('#cb_eval_meta').val()).innerHTML!="") {
      if ((imprimir(parseInt($('#porcentaje').val()))-parseInt(document.getElementById($('#cb_eval_meta').val()).innerHTML))<=100) {
        $.get('obtenerres/'+id_metas+'/'+$('#cb_eval_meta').val(),function(data) {
          console.log(data);
          if (data!=null) {
            if($('#porcentaje').val()!="")
            {
              var formData={
                idmeta_evaluacion:data[0].idmeta_evaluacion,
                observacion:"",
                porcentaje:$('#porcentaje').val(),
              };
              $.ajaxSetup({
                headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              console.log(formData);
              $.ajax({
                type:'PUT',
                url:'meta_evaluar/'+data[0].idmeta_evaluacion,
                data: formData,
                dataType:'json',
                success: function(data) {

                },
                error:function(data) {
                  console.log('error',data);
                }
              })
            }
          }
          console.log(data[0].idmeta_evaluacion);
        })
        document.getElementById($('#cb_eval_meta').val()).innerHTML =$('#porcentaje').val();
        asignar_vacio();
      } else {
        alertify.alert("ESTA EXEDIENDO EL 100%");
      }
    }else {
      if (validar_porcentajes()==true) {
        if (imprimir(parseInt($('#porcentaje').val()))<=100) {
          document.getElementById($('#cb_eval_meta').val()).innerHTML =$('#porcentaje').val();

          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var formData={
            id_meta:id_metas,
            id_evaluacion:$('#cb_eval_meta').val(),
            observacion:"",
            porcentaje:$('#porcentaje').val(),
          };
          console.log(formData);
          $.ajax({
            type:'POST',
            url:'meta_evaluar',
            data: formData,
            dataType:'json',
            success: function(data) {
            },
            error:function(data) {
              console.log('error',data);
            }
          });
          asignar_vacio();
        } else {
          alertify.alert("ESTA EXEDIENDO EL 100%");
        }
      } else {
        alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
      }
    }
  })

  $('body').on('click', '.update_modal', function(event) {
      id_metas=$(this).val();
      console.log(id_metas);
      $('#guardar_meta').val("meta_update");
      $.get('consulta_meta/'+$(this).val(),function(data) {
        $.each(data,function(i,item) {
          $('#meta').val(item.descripcion);
          let fecha_ini=new Date(item.fecha_inicio);
          let fecha_fini=new Date(item.fecha_fin);

          var mes,dia,año;
          var mes1,dia1,año1;
          mes=''+(fecha_ini.getMonth()+1);
          dia=''+fecha_ini.getDate();
          año=fecha_ini.getFullYear();

          mes1=''+(fecha_fini.getMonth()+1);
          dia1=''+fecha_fini.getDate();
          año1=fecha_fini.getFullYear();

          if (mes.length < 2)
          {
            mes = '0' + mes;
          }
          if (dia.length < 2)
          {
            dia = '0' + dia;
          }

          if (mes1.length < 2)
          {
            mes1 = '0' + mes1;
          }
          if (dia1.length < 2)
          {
            dia1 = '0' + dia1;
          }

          fechainicio=año+"-"+mes+"-"+dia;
          fechafinal=año1+"-"+mes1+"-"+dia1;

          $('#fipe_meta').val(fechainicio);
          $('#ffpe_meta').val(fechafinal);

          $('#recurso').val(item.recurso);
          $('#obersvacion').val(item.observacion);
          $('#recurso_up_me').val(item.recurso_modificado);
        })
      })
      $('#ingreso_meta').modal('show');
  })

  $("#guardar_meta").on('click',function(event){
     var id_meta=$('#modificar_meta').val();
         if ($('#guardar_meta').val()=="meta_add") {
               $.ajaxSetup({
                 headers:{
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
               });
              var formData={
                meta:$('#meta').val(),
                fecha_inicial:$('#fipe_meta').val(),
                fecha_final:$('#ffpe_meta').val(),
                recurso:$('#recurso').val(),
                observacion:$('#obersvacion').val(),
                responsable:$('#reponsable').val(),
                indicador:id_indicador,
              };
              $.ajax({
                type:'POST',
                url:'metass',
                data: formData,
                dataType:'json',
                success: function(data) {
                },
                error:function(data) {
                  console.log('error',data);
                }
              });
         }else if ($('#guardar_meta').val()=="meta_update") {
           if ($('#recurso_up_me').val()=="") {
               $.ajaxSetup({
                 headers:{
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
               });
              var formData={
                meta:$('#meta').val(),
                fecha_inicial:$('#fipe_meta').val(),
                fecha_final:$('#ffpe_meta').val(),
                recurso:$('#recurso').val(),
                observacion:$('#obersvacion').val(),
                responsable:$('#reponsable').val(),
                idmeta:id_metas,
              };
              $.ajax({
                type:'PUT',
                url:'metass/'+formData.id_meta,
                data: formData,
                dataType:'json',
                success: function(data) {
                },
                error:function(data) {
                  console.log('error',data);
                }
              });
           } else {
             if ($('#recurso').val()>0 && $('#recurso').val() <= $('#recurso_up_me').val()) {
                 $.ajaxSetup({
                   headers:{
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
                 });
                var formData={
                  meta:$('#meta').val(),
                  fecha_inicial:$('#fipe_meta').val(),
                  fecha_final:$('#ffpe_meta').val(),
                  recurso:$('#recurso').val(),
                  observacion:$('#obersvacion').val(),
                  responsable:$('#reponsable').val(),
                  idmeta:id_metas,
                };
                $.ajax({
                  type:'PUT',
                  url:'metass/'+formData.id_meta,
                  data: formData,
                  dataType:'json',
                  success: function(data) {
                  },
                  error:function(data) {
                    console.log('error',data);
                  }
                });
             }else {
               alertify.alert("ESTA EXEDIENDO CON RESPECTO AL VALOR ASIGNADO");
             }
           }
         }
  })

  $('body').on('click', '.delete_meta', function(event) {
    console.log($(this).val());
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: 'metass/'+$(this).val(),
      type: 'DELETE',
      data:$(this).val(),
      success:function(data) {
      },
      error:function(data) {
        console.log('error',data);
      }
    });
  })
});
