$(document).ready(function() {

  $('#btn_proyect').on('click',function() {
    $.get('periodos_dato/'+$('#periodo_1').val(),function(data){
      $.each(data,function(i,item) {
        if (item.estado==1) {
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var formData={
            descripcion:$('#descripcion1').val(),
            id_area_:$('#id_area_1').val(),
            periodo:$('#periodo_1').val(),
          };
          $.ajax({
            type:'POST',
            url:'proyecto',
            data: formData,
            dataType:'json',
            success: function(data) {
              toastr.success('INGRESADO CORRECTAMENTE','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
              $('#descripcion1').val("");
            },
            error:function(data) {
              if (data.status==200) {
                toastr.success('ASIGNACION CORRECTA','POA',{
                  "positionClass": "toast-bottom-right",
                  "closeButton": true,
                  "extendedTimeOut": 1
                })
                $('#descripcion1').val("");
              }else
              {
                toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
                  "positionClass": "toast-bottom-right",
                  "closeButton": true,
                  "extendedTimeOut": 1
                })
              }
            }
          });
        }else {
          toastr.error('ESTE PERIODO NO SE ENCUENTRA ACTIVADO','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        }
      });
    })
  })



  $('.table').on('click','.delete-proyectos', function(event) {
    var proyecto=$(this).val();
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });
    $.ajax({
      url: 'proyecto/'+proyecto,
      type: 'DELETE',
      data: proyecto,
      success:function() {
        toastr.success('ELIMINADO CORRECTAMENTE','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
        $('table#lista_proyectos1 tr#'+proyecto).remove();
      },
      error:function(data) {
        toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
      }
    });
  })

  $('body').on('click', '.update-proyectos', function(){
    $.get('consulta/'+$(this).val(),function(data){
      $.each(data,function(i,item) {
        $('#name_project').val(item.descripcion);
        $('#id_pro').val(item.id);
      });
    })
    $('#update-project').modal('show');
  })

  $('#actualizar_proyecto').on('click',function() {
    id=$("#id_pro").val()+'proyecto';
    var formData={
      id:$("#id_pro").val(),
      descripcion:$("#name_project").val(),
    };
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });
    $.ajax({
      type:'PUT',
      url:'proyecto/'+$("#id_pro").val(),
      data: formData,
      dataType:'json',
      success: function(data) {
        $("#lista_proyectos1"+" #"+id).text($("#name_project").val());
        toastr.success('MODIFICADO CORRECTAMENTE','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
        $('#update-project').modal('hide');
      },
      error:function(data) {
        if (data.status==200) {
          toastr.success('ASIGNACION CORRECTA','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
          $("#lista_proyectos1"+" #"+id).text($("#name_project").val());
          $('#descripcion1').val("");
          $('#update-project').modal('hide');
        }else
        {
          toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
            "positionClass": "toast-bottom-right"
          })
        }
      }
    });
  })

  $('body').on('click', '.add-indicador', function(){
    $('#id_proyecto').val($(this).val());
    $('#insert_indicador').modal('show');
  })
  var id_indicador;
  $('body').on('click', '.update-indicador', function(){
    id_indicador=$(this).val();
    $.get('actualizar/'+id_indicador,function(data){
      $.each(data,function(i,item) {
        $('#name_indicador').val(item.descripcion);
      });
    })

    $('#add_indicador').val("update");
    $('#insert_indicador').modal('show');
  })


  $('#add_indicador').on('click',function functionName() {
    if ($('#add_indicador').val()=="new") {
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var formData={
        descripcion:$('#name_indicador').val(),
        id_proyectos:$('#id_proyecto').val(),
      };
      $.ajax({
        type:'POST',
        url:'indicador',
        data: formData,
        dataType:'json',
        success: function(data) {
            toastr.success('GUARDADO CORRECTAMENTE','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
            $(location).attr('href',"lista");
        },
        error:function(data) {
          if (data.status==200) {
            toastr.success('ASIGNACION CORRECTA','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
            $("#lista_proyectos1"+" #"+id).text($("#name_project").val());
            $('#descripcion1').val("");
            $('#update-project').modal('hide');
            $(location).attr('href',"lista");
          }else
          {
            toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
          }
        }
      });
      $(location).attr('href',"lista");
    } else if ($('#add_indicador').val()=="update")
    {
      id=id_indicador+'indicador';
      var formData={
        descripcion:$('#name_indicador').val(),
        id:id_indicador,
      };
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
      });
      $.ajax({
        type:'PUT',
        url:'indicador/'+id_indicador,
        data: formData,
        dataType:'json',
        success: function(data) {
          $("#lista_indicadores"+" #"+id).text($("#name_indicador").val());
          toastr.success('MODIFICADO CORRECTAMENTE','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
          $('#insert_indicador').modal('hide');
        },
        error:function(data) {
          if (data.status==200) {
            toastr.success('ASIGNACION CORRECTA','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
            $("#lista_indicadores"+" #"+id).text($("#name_indicador").val());
            $('#name_indicador').val("");
            $('#insert_indicador').modal('hide');
          }else
          {
            toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
          }
        }
      });
      $('#add_indicador').val("new");


    }
  })

  function actualizar_tabla() {
    $("#lista_indicadores > tbody").html("");
  }

  $('.table').on('click','.delete-indicador', function(event) {
    var indicador=$(this).val();
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });
    $.ajax({
      url: 'indicador/'+indicador,
      type: 'DELETE',
      data: indicador,
      success:function() {
        toastr.success('ELIMINADO CORRECTAMENTE','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
        $(location).attr('href',"lista");
      },
      error:function(data) {
        toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
      }
    });
  })

  $('.table').on('click','.delete-meta', function(event) {
    var meta=$(this).val();
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });
    $.ajax({
      url: 'meta/'+meta,
      type: 'DELETE',
      data: meta,
      success:function() {
        toastr.success('ELIMINADO CORRECTAMENTE','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
        $(location).attr('href',"showmetas");
      },
      error:function(data) {
        toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
      }
    });
  })
  var id_indi;
  $('body').on('click', '.add-meta', function(){
    $('#add_meta').val("new");
    id_indi=$(this).val();
    $('#name_meta').val("");
    $('#name_valor').val("");
    $('#name_observacion').val("");
    $.get('periodos_dato/'+$('#name_dato').val(),function(data){
      $.each(data,function(i,item) {
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

        $('#fecha_i_meta').attr("max",fechafinal);
        $('#fecha_i_meta').attr("min",fechainicio);
        $('#fecha_i_meta').attr("value",fechainicio);

        $('#fecha_f_meta').attr("max",fechafinal);
        $('#fecha_f_meta').attr("min",fechainicio);
        $('#fecha_f_meta').attr("value",fechafinal);
      });
    })
    $('#insert_meta').modal('show');
  })

  var id_meta;

  $('#add_meta').on('click',function(){
    if ($('#add_meta').val()=="new")
    {
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var formData={
          meta:$('#name_meta').val(),
          fecha_inicial:$('#fecha_i_meta').val(),
          fecha_final:$('#fecha_f_meta').val(),
          recurso:$('#name_valor').val(),
          observacion:$('#name_observacion').val(),
          responsable:$('#name_reponsable').val(),
          indicador:id_indi,
        };
        $.ajax({
          type:'POST',
          url:'meta',
          data: formData,
          dataType:'json',
          success: function(data) {
              toastr.success('GUARDADO CORRECTAMENTE','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
              $('#insert_meta').modal('hide');
              $(location).attr('href',"showmetas");
          },
          error:function(data) {
            if (data.status==200) {
              toastr.success('ASIGNACION CORRECTA','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
              $('#insert_meta').modal('hide');
              $(location).attr('href',"showmetas");
            }else
            {
              toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
            }
          }
        });
      }else if ($('#add_meta').val()=="update")
      {
        id=id_meta+'metas';
        var formData={
          idmeta:id_meta,
          meta:$('#name_meta').val(),
          fecha_inicial:$('#fecha_i_meta').val(),
          fecha_final:$('#fecha_f_meta').val(),
          recurso:$('#name_valor').val(),
          observacion:$('#name_observacion').val(),
        };
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
        });
        $.ajax({
          type:'PUT',
          url:'meta/'+id_meta,
          data: formData,
          dataType:'json',
          success: function(data) {
            $("#lista_metas"+" #"+id).text($("#name_meta").val());
            toastr.success('MODIFICADO CORRECTAMENTE','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
            $('#insert_meta').modal('hide');
          },
          error:function(data) {
            if (data.status==200) {
              $("#lista_metas"+" #"+id).text($("#name_meta").val());
              toastr.success('ASIGNACION CORRECTA','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
              $('#insert_meta').modal('hide');
            }else
            {
              toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
            }
          }
        });
      }
  })
  $('body').on('click', '.update_meta', function(){
    id_meta=$(this).val();
    $('#add_meta').val("update");
    $('#periodo').val($('#name_dato').val());
    $.get('periodos_dato/'+$('#periodo').val(),function(data){
      $.each(data,function(i,item) {
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

        $('#fecha_i_meta').attr("max",fechafinal);
        $('#fecha_i_meta').attr("min",fechainicio);

        $('#fecha_f_meta').attr("max",fechafinal);
        $('#fecha_f_meta').attr("min",fechainicio);
      });
    })

    $.get('busca_meta/'+$(this).val(),function(data){
      $.each(data,function(i,item) {
        let fecha_ini1=new Date(item.fecha_inicio);
        let fecha_fini1=new Date(item.fecha_fin);

        var mes1,dia1,año1;
        var mes11,dia11,año11;
        mes1=''+(fecha_ini1.getMonth()+1);
        dia1=''+fecha_ini1.getDate();
        año1=fecha_ini1.getFullYear();

        mes11=''+(fecha_fini1.getMonth()+1);
        dia11=''+fecha_fini1.getDate();
        año11=fecha_fini1.getFullYear();

        if (mes1.length < 2)
        {
          mes1 = '0' + mes1;
        }
        if (dia1.length < 2)
        {
          dia1 = '0' + dia1;
        }

        if (mes11.length < 2)
        {
          mes11 = '0' + mes11;
        }
        if (dia11.length < 2)
        {
          dia11 = '0' + dia11;
        }

        fechainicio1=año1+"-"+mes1+"-"+dia1;
        fechafinal1=año11+"-"+mes11+"-"+dia11;

        $('#fecha_i_meta').attr("value",fechainicio1);
        $('#fecha_f_meta').attr("value",fechafinal1);
        $('#name_meta').val(item.descripcion);
        $('#name_valor').val(item.recurso);
        $('#name_observacion').val(item.observacion);


      });
    })
    $('#insert_meta').modal('show');
  })


  function limpiar() {
    $("#eva_metas").children("tbody").children("tr").each(function (i) {
      $(this).find("th:eq(4)").text("");
    });
  }
  var id_metas=0;

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
      $('#insert_evaluacion').modal('show');
  })
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
        $.ajax({
          type:'POST',
          url:'meta_evaluar',
          data: formData,
          dataType:'json',
          success: function(data) {
            toastr.success('EVALUACION CORRECTA','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
          },
          error:function(data) {
            if (data.status==200) {
              toastr.success('EVALUACION CORRECTA','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
            }else
            {
              toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
            }
          }
        });
      }
    });
  }
  function validar_porcentajes() {
    if ($('#porcentaje').val()<=100 && $('#porcentaje').val()>=1 ) {
      return true;
    } else {
      return false;
    }
  }

  $('#_add_evaluar_meta').on('click',function (){
    if (document.getElementById($('#cb_eval_meta').val()).innerHTML!="") {
      if ((imprimir(parseInt($('#porcentaje').val()))-parseInt(document.getElementById($('#cb_eval_meta').val()).innerHTML))<=100) {
        $.get('obtenerres/'+id_metas+'/'+$('#cb_eval_meta').val(),function(data) {
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
              $.ajax({
                type:'PUT',
                url:'meta_evaluar/'+data[0].idmeta_evaluacion,
                data: formData,
                dataType:'json',
                success: function(data) {
                  toastr.success('EVALUACION CORRECTA','POA',{
                    "positionClass": "toast-bottom-right",
                    "closeButton": true,
                    "extendedTimeOut": 1
                  })
                  $('#porcentaje').val("");
                },
                error:function(data) {
                  if (data.status==200) {
                    toastr.success('EVALUACION CORRECTA','POA',{
                      "positionClass": "toast-bottom-right",
                      "closeButton": true,
                      "extendedTimeOut": 1
                    })
                    $('#porcentaje').val("");
                  }else
                  {
                    toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
                      "positionClass": "toast-bottom-right",
                      "closeButton": true,
                      "extendedTimeOut": 1
                    })
                  }
                }
              })
            }
          }
        })
        document.getElementById($('#cb_eval_meta').val()).innerHTML =$('#porcentaje').val();
        asignar_vacio();
      } else {
        toastr.error('EXEDE AL 100%','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })

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
          $.ajax({
            type:'POST',
            url:'meta_evaluar',
            data: formData,
            dataType:'json',
            success: function(data) {
              toastr.success('EVALUACION CORRECTA','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
              $('#porcentaje').val("");
            },
            error:function(data) {
              if (data.status==200) {
                toastr.success('EVALUACION CORRECTA','POA',{
                  "positionClass": "toast-bottom-right",
                  "closeButton": true,
                  "extendedTimeOut": 1
                })
                $('#porcentaje').val("");
              }else
              {
                toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
                  "positionClass": "toast-bottom-right",
                  "closeButton": true,
                  "extendedTimeOut": 1
                })
              }
            }
          });
          asignar_vacio();
        } else {
          toastr.error('EXEDE AL 100%','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        }
      } else {
        toastr.error('DATO INCORRECTO','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
      }
    }
  })


})
