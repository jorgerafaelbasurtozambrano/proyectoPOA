$(document).ready(function() {
  var idperiodoglobal;

  var contenidofila;
  var coincidencia;
  var exp;
  $("#filtrar").keyup(function() {
    $("#lista_periodos tbody tr").each(function() {
      $(this).show();
      contenidofila=$(this).find('td:eq(1)').html();
      exp=new RegExp($("#filtrar").val(),'gi');
      coincidencia=contenidofila.match(exp);
      if (coincidencia!=null)
      {
      }else
      {
        $(this).hide();
      }
      if ($("#filtrar").val()=="")
      {
        $(this).show();
      }
    })
  })
  $('#sele1').on('change',function() {
    $("#datos1 > tbody").html("");
    if ((12%$(this).val())==0) {
      var meses_final=0;
      var meses_inicial=0;
      var intervalo=12/$(this).val();
      for (var i = 0; i < $(this).val() ; i++) {
        meses_final=meses_final+intervalo;
        meses_inicial=meses_final-intervalo+1;
        let fecha_ini=new Date($('#fipe1').val());
        let dias_un_mes_inicial=new Date($('#periodos1').val(),meses_inicial,0).getDate();
        let dias_un_mes_final=new Date($('#periodos1').val(),meses_final,0).getDate();
        var mes=meses_inicial;
        var dia=dias_un_mes_inicial;
        var año=$('#periodos1').val();
        var mes1=meses_final;
        var dia1=dias_un_mes_final;
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
        fechainicio=año+"-"+mes+"-01";
        fechafin=año+"-"+mes1+"-"+dia1;
        var pr='';
        pr += '<tr>';
        pr += '<td>'+(i+1)+'</td>';
        pr += '<td>'+fechainicio+'</td>';
        pr += '<td>'+fechafin+'</td>';
        //pr +='<td><button class="btn btn-info delete-pr glyphicon glyphicon-trash"></button><td>';
        pr += '</tr>';
        $("#datos1").append(pr);
      }
    }else{
      if ($(this).val()==5) {
        var pr='';
        pr += '<tr>';
        pr += '<td>1</td>';
        let dias_un_mes_inicial1=new Date($('#periodos1').val(),01,0).getDate();
        let dias_un_mes_final1=new Date($('#periodos1').val(),meses_final,0).getDate();
        pr += '<td>2</td>';
        pr += '<td>3</td>';
        pr += '<td>4</td>';
        pr += '<td>5</td>';
        pr += '<td>'+fechainicio+'</td>';
        pr += '<td>'+fechafin+'</td>';
        //pr +='<td><button class="btn btn-info delete-pr glyphicon glyphicon-trash"></button><td>';
        pr += '</tr>';
        $("#datos1").append(pr);
      } else {

      }
    }


  })
  // $('#numero1').on('keyup', function(){
  //   $("#sele1").empty();
  //       if ($(this).val()>=0 && $(this).val()<=12) {
  //         for (var i = 1; i <= $(this).val() ; i++) {
  //           var selec='';
  //           selec+='<option>'+i+'</option>';
  //           $("#sele1").append(selec);
  //         }
  //       } else {
  //         $(this).val("");
  //         toastr.error('LIMITE 12','POA',{
  //           "positionClass": "toast-bottom-right",
  //           "closeButton": true,
  //           "extendedTimeOut": 1,
  //           "extendedTimeOut": 1
  //         })
  //       }
  //   }).keyup();
    // $("#fipe1").on("change",function(){
    //   if ($("#ffpe1").val()=="") {
    //     var inicio=$("#fipe1").val();
    //     $("#fecha_i1").attr("min",inicio);
    //     $("#fecha_f1").attr("min",inicio);
    //     $("#fecha_i1").attr("value",inicio);
    //   } else {
    //     let fecha_ini=new Date($('#fipe1').val());
    //     let fecha_fini=new Date($('#ffpe1').val());
    //     if (fecha_ini.getFullYear()<fecha_fini.getFullYear()) {
    //       var inicio=$("#fipe1").val();
    //       $("#fecha_i1").attr("min",inicio);
    //       $("#fecha_f1").attr("min",inicio);
    //       $("#fecha_i1").attr("value",inicio);
    //     } else {
    //       toastr.error('ERROR EN LAS FECHAS','POA',{
    //         "positionClass": "toast-bottom-right",
    //         "closeButton": true,
    //         "extendedTimeOut": 1,
    //         "extendedTimeOut": 1
    //       })
    //
    //       $("#fipe1").val("AAA-MM-DD");
    //       $("#fecha_i1").val("AAA-MM-DD");
    //     }
    //   }
    // });
    //
    // $("#ffpe1").on("change",function(){
    //   if ($("#fipe1").val()=="") {
    //     var fin=$("#ffpe1").val();
    //     $("#fecha_i1").attr("max",fin);
    //     $("#fecha_f1").attr("max",fin);
    //     $("#fecha_f1").attr("value",fin);
    //   } else {
    //     let fecha_ini=new Date($('#fipe1').val());
    //     let fecha_fini=new Date($('#ffpe1').val());
    //     if (fecha_fini.getFullYear()>fecha_ini.getFullYear()) {
    //       var fin=$("#ffpe1").val();
    //       $("#fecha_i1").attr("max",fin);
    //       $("#fecha_f1").attr("max",fin);
    //       $("#fecha_f1").attr("value",fin);
    //     }else {
    //       toastr.error('ERROR EN LAS FECHAS','POA',{
    //         "positionClass": "toast-bottom-right",
    //         "closeButton": true,
    //         "extendedTimeOut": 1
    //
    //       })
    //       $("#ffpe1").val("DD-MM-AAAA");
    //       $("#fecha_f1").val("DD-MM-AAAA");
    //     }
    //   }
    // });
    function validar1() {
      var estado=false;
      $('#tabla1 tbody tr').each(function(index) {
        $(this).children('td').each(function(index2) {
          if (index2==0) {
            if ($(this).text()==$("#sele").val()) {
              estado=true;
            }
          }
        });
      });
      return estado;
    }

    function validar() {
      var estado=false;
      $('#datos1 tbody tr').each(function(index) {
        $(this).children('td').each(function(index2) {
          if (index2==0) {
            if ($(this).text()==$("#sele1").val()) {
              estado=true;
            }
          }
        });
      });
      return estado;
    }

    $('#añadir1').on('click', function(){
      let fecha_ini=new Date($('#fecha_i1').val());
      let fecha_fini=new Date($('#fecha_f1').val());
        if ($('#añadir1').val()=="new") {
          if (fecha_ini!="Invalid Date" && fecha_fini!="Invalid Date" && $("#sele1").val()!=null) {
              if (validar()==false) {
                var pr='';
                pr += '<tr>';
                pr += '<td>'+$("#sele1").val()+'</td>';
                pr += '<td>'+$("#fecha_i1").val()+'</td>';
                pr += '<td>'+$("#fecha_f1").val()+'</td>';
                pr +='<td><button class="btn btn-info delete-pr glyphicon glyphicon-trash"></button><td>';
                pr += '</tr>';
                $("#datos1").append(pr);
              }else {
                toastr.error('YA ESTA GUARDADO ESTE ELEMENTO','POA',{
                  "positionClass": "toast-bottom-right",
                  "closeButton": true,
                  "extendedTimeOut": 1
                })
              }
          }else
          {
            toastr.error('FALTA ALGUN DATO','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
          }
        }else if ($('#añadir1').val()=="add") {
          if (validar1()==false) {
            addevaluation(idperiodoglobal);
            $('#add1').hide();
          }else {
            toastr.error('YA ESTA GUARDADO ESTE ELEMENTO','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
          }
        }
    });
    $('#datos1').on('click', '.delete-pr', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    })

    $('#guardar1').on('click', function(e) {
      let fecha_ini=new Date($('#fipe1').val());
      let fecha_fini=new Date($('#ffpe1').val());
      if (fecha_ini!="Invalid Date" && fecha_fini!="Invalid Date" && $('#periodos1').val()!="") {
        if (fecha_ini.getFullYear()<fecha_fini.getFullYear()) {
          var periodo_encontrado=false;
          $.get('prueba1',function(data){
            $.each(data,function(i,item) {
              if (item.descripcion==$('#periodos1').val()) {
                periodo_encontrado=true;
              }
            });
            if (periodo_encontrado==false) {
              if ($('#estados1').val()==0) {
                e.preventDefault();
                guardardatos();
              }else {
                $.get('prueba',function(data){
                  $.each(data,function(i,item) {
                    if (item.id!=null) {
                      toastr.error('YA EXITE UNA PERIODO HABILITADO','POA',{
                        "positionClass": "toast-bottom-right",
                        "closeButton": true,
                        "extendedTimeOut": 1
                      })
                    }else {
                      e.preventDefault();
                      guardardatos();
                    }
                  });
                })
              }
            } else {
              toastr.error('YA EXITE UNA PERIODO IGUAL','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
            }
          })
        }else {
          toastr.error('ERROR EN LAS FECHAS','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        }
      } else {
        toastr.error('FALTA ALGUN CAMPO','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
      }
    })

    function guardardatos() {
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var formData={
        periodo:$('#periodos1').val(),
        fecha_inicial:$('#fipe1').val(),
        fecha_final:$('#ffpe1').val(),
        estado:$('#estados1').val(),
      };
      $.ajax({
        type:'POST',
        url:'periodo',
        data: formData,
        dataType:'json',
        success: function(data) {
          if ($('#datos1 >tbody >tr').length != 0){
            guardar_evaluacion(data.id);
          }else
          {
            $('#periodos1').val("");
            $("#fipe1").val("AAA-MM-DD");
            $("#ffpe1").val("DD-MM-AAAA");
            toastr.success('GUARDADO CORRECTAMENTE','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
          }
        },
        error:function(data) {
          toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        }
      });
    }

    function limpiar() {
      $('#periodos1').val("");
      $('#numero1').val("");
      $("#fipe1").val("AAA-MM-DD");
      $("#ffpe1").val("DD-MM-AAAA");
      $("#fecha_i1").val("DD-MM-AAAA");
      $("#fecha_f1").val("DD-MM-AAAA");
      $('#sele1').empty();
      $("#datos1 > tbody").html("");
    }

    function guardar_evaluacion(id) {
          $('#datos1 tr').each(function() {
            var datos={
              numero:$(this).find("td").eq(0).html(),
              fecha_incial:$(this).find("td").eq(1).html(),
              fecha_final:$(this).find("td").eq(2).html(),
              id_poa:id,
            }
            $.ajaxSetup({
                  headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                  type:'POST',
                  url:'evaluapoa',
                  data: datos,
                  dataType:'json',
                  success: function(data) {
                  },
                  error:function(data) {
                    console.log('error',data);
                  }
                });
            });
            limpiar();
            toastr.success('GUARDADO CORRECTAMENTE','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
    }
    function updateperiodo(variable,idperiodos) {
      var formData={
        idperiodo:idperiodos,
        estado:variable,
      };
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type:'PUT',
        url:'periodo/'+formData.idperiodo,
        data: formData,
        dataType:'json',
        success: function(data) {

        },
        error:function(data) {
          console.log('error',data);
        }
      })
    }

    function validar_() {
      var estado=false;
      $('#lista_periodos tr').each(function(index) {
        if ($(this).find("td").eq(4).html()=="ACTIVADO") {
          estado=true;
        }
      });
      return estado;
    }
    function crear_notifiacion(mensaje) {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();
      if (dd < 10) {
        dd = '0' + dd;
      }
      if (mm < 10) {
        mm = '0' + mm;
      }
      var today = yyyy+'-'+mm+'-'+dd;
      console.log(today);
      $.get('alluser',function(data){
        $.each(data,function(i,item) {
          var datos={
            id:item.id,
            descripcion:mensaje,
            fecha:today,
            visto:0,
          }
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type:'POST',
            url:'notificacion',
            data: datos,
            dataType:'json',
            success: function(data) {
            },
            error:function(data) {
              console.log('error',data);
            }
          });
        });
      })
    }

    $('body').on('change','.desactivar-periodo1', function(event) {
      id_periodo=$(this).val();
      id=$(this).val()+'periodo';
      if($(this).prop('checked') ) {
        $(this).prop('checked', false);
        if (validar_()==false) {
          updateperiodo(1,id_periodo);
          crear_notifiacion("SE A ACTIVADO UN PERIODO");
          $("#lista_periodos"+" #"+id).text("ACTIVADO");
          $(this).removeClass("desactivar-periodo1").addClass("activar-periodo1");
          toastr.success('ACTIVADO CORRECTAMENTE','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        } else {

          toastr.error('YA HAY UN PERIODO ACTIVADO','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        }
      }else {
        updateperiodo(0,id_periodo);
        crear_notifiacion("SE A DESACTIVADO UN PERIODO");
        $("#lista_periodos"+" #"+id).text("DESACTIVADO");
        toastr.success('DESACTIVADO CORRECTAMENTE','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
      }
    })
    $('body').on('change','.activar-periodo1', function(event) {
      id_periodo=$(this).val();
      id=$(this).val()+'periodo';
      if($(this).prop('checked') ) {
        if (validar_()==false) {
          updateperiodo(1,id_periodo);
          crear_notifiacion("SE A ACTIVADO UN PERIODO");
          $("#lista_periodos"+" #"+id).text("ACTIVADO");
          toastr.success('ACTIVADO CORRECTAMENTE','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        } else {
          toastr.error('YA HAY UN PERIODO ACTIVADO','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        }
      }else {
        updateperiodo(0,id_periodo);
        crear_notifiacion("SE A DESACTIVADO UN PERIODO");
        $("#lista_periodos"+" #"+id).text("DESACTIVADO");
        $(this).removeClass("activar-periodo1").addClass("desactivar-periodo1");
        toastr.success('DESACTIVADO CORRECTAMENTE','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
      }
    })

    $('body').on('click', '.open-modal1', function(){
      $('#add1').hide();
      var idperiodo=$(this).val();
      idperiodoglobal=idperiodo;
      $('#evaluaciones_show').empty();
      $.get('evaluaciones/'+idperiodo,function(data){
        $.each(data,function(i,item) {
          var eva='';
          eva += '<tr id="'+item.id+'">';
          eva += '<td>'+item.numero+'</td>';
          let fecha_ini=new Date(item.fecha_inicio);
          let fecha_fini=new Date(item.fecha_fin);
          fechainicio=fecha_ini.getFullYear()+"-"+(fecha_ini.getMonth()+1)+"-"+fecha_ini.getDate();
          fechafinal=fecha_fini.getFullYear()+"-"+(fecha_fini.getMonth()+1)+"-"+fecha_fini.getDate();
          eva += '<td>'+fechainicio+'</td>';
          eva += '<td>'+fechafinal+'</td>';
          eva += '<td><button class="btn btn-danger delete-evalu1 glyphicon glyphicon-trash" value="'+item.id+'"></button></td>';
          eva += '<td><button class="btn btn-primary update-evalu1 glyphicon glyphicon-pencil" value="'+item.id+'"></button></td>';
          eva += '</tr>';
          $("#evaluaciones_show").append(eva);
        });
        $('#evaluaciones1').modal('show');
      })
    })

    $('.table').on('click','.delete-periodo1', function(event) {
      var periodo=$(this).val();
      $.get('evaluaciones/'+periodo,function(data){
        if (data.length!=0) {
          toastr.error('EXISTE EVALUACIONES LIGADA AL PERIDO','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
        }else {
          $('#' +periodo ).remove();
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
          });
          $.ajax({
            url: 'periodo/'+periodo,
            type: 'DELETE',
            data: periodo,
            success:function() {
              toastr.success('ELIMINADO CORRECTAMENTE','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
            },
            error:function(data) {
              toastr.error('ERROR AL REALIZAR LA PETICION','POA',{
                "positionClass": "toast-bottom-right",
                "closeButton": true,
                "extendedTimeOut": 1
              })
            }
          });
        }
      })
    })

    $('body').on('click', '.update-evalu1', function(){
        var idevaluacion=$(this).val();
        idevaluacionglobal=idevaluacion;
        $.get('buscar/'+idevaluacion,function(data){
          $.each(data,function(i,item) {
            $("#numero_update1").val(item.numero);
            $("#numero_update1").prop('disabled', true);
            cargar_update(item.id_poa);
          });
        })
        $('#evaluaciones2').modal('show');
    })
    function cargar_update(idpoa)
    {
      $.get('pruebass/'+idpoa,function(data){
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

          $("#fecha_i_update1").val(fechainicio);
          $("#fecha_f_update1").val(fechafinal);

          $("#fecha_i_update1").attr("min",fechainicio);
          $("#fecha_i_update1").attr("max",fechafinal);
          $("#fecha_f_update1").attr("min",fechainicio);
          $("#fecha_f_update1").attr("max",fechafinal);


        });
      })
    }

    $('.table').on('click','.delete-evalu1', function(event) {
      var idevaluacion=$(this).val();
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: 'evaluapoa/'+idevaluacion,
        type: 'DELETE',
        data: idevaluacion,
        success:function() {
          $('table#table_add tr#'+idevaluacion).remove();
          toastr.success('ELIMINADO CORRECTAMENTE','POA',{
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "extendedTimeOut": 1
          })
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

    $("#update_evaluacion1").on('click',function(e) {
        var formData={
          idevaluacion:idevaluacionglobal,
          numero:$("#numero_update1").val(),
          fechainicio:$("#fecha_i_update1").val(),
          fechafinal:$("#fecha_f_update1").val(),
        };
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
        });
        $.ajax({
          type:'PUT',
          url:'evaluapoa/'+idevaluacionglobal,
          data: formData,
          dataType:'json',
          success: function(data) {
            $('#evaluaciones2').modal('hide');
            actualizar_modal(data.id_poa);
            toastr.success('MODIFICADO CORRECTAMENTE','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
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

    function actualizar_modal(idperiodo) {
      $('#evaluaciones_show').empty();
      $.get('evaluaciones/'+idperiodo,function(data){
        $.each(data,function(i,item) {
          var eva='';
          eva += '<tr id="'+item.id+'">';
          eva += '<td>'+item.numero+'</td>';
          let fecha_ini=new Date(item.fecha_inicio);
          let fecha_fini=new Date(item.fecha_fin);
          fechainicio=fecha_ini.getFullYear()+"-"+(fecha_ini.getMonth()+1)+"-"+fecha_ini.getDate();
          fechafinal=fecha_fini.getFullYear()+"-"+(fecha_fini.getMonth()+1)+"-"+fecha_fini.getDate();
          eva += '<td>'+fechainicio+'</td>';
          eva += '<td>'+fechafinal+'</td>';
          eva += '<td><button class="btn btn-danger delete-evalu1 glyphicon glyphicon-trash" value="'+item.id+'"></button></td>';
          eva += '<td><button class="btn btn-primary update-evalu1 glyphicon glyphicon-pencil" value="'+item.id+'"></button></td>';
          eva += '</tr>';
          $("#evaluaciones_show").append(eva);
        });
      })
    }

    $('#buscar_evaluacion').on('click',function() {
      $("#table_principal1 > tbody").html("");
      $.get('/pro_ind/'+$('#poa_mostrar1').val()+'/'+$('#periodo_re1').val(),function(data) {
          $.each(data['proyec_indica'],function(i1,item1) {
            var nuevaFila='<tr class="even pointer">';
            nuevaFila+="<td style='vertical-align : middle;text-align:center;' rowspan="+(item1['indicadoress'].length+1)+">"+item1.descripcion+"</td>";
            if (item1['indicadoress'].length==0) {
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
            }
            nuevaFila+='</tr>';
            $('#table_principal1').append(nuevaFila);
            if (item1['indicadoress'].length!=0) {
                $.each(item1['indicadoress'],function(i2,item2) {
                  var nuevaFila1='<tr class="even pointer">';
                  nuevaFila1+="<td align='justify'>"+item2.descripcion+"</td>";
                  var encontrado=false;
                  $.each(data['metas'],function(i3,item3) {
                    if (item2.id==item3.id_indicador)
                    {
                      encontrado=true;
                      nuevaFila1+="<td align='justify'>"+item3.descripcion+"</td>";
                      nuevaFila1+="<td style='vertical-align : middle;text-align:center;'>$<label class='lb_recurso1' id="+item3.idmetas+">"+item3.recurso+" </label></td>";
                      if (item3.recurso_aprobado==1) {
                        nuevaFila1+="<td><input checked class='aceptar_recurso1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }else if (item3.recurso_aprobado==2) {
                        nuevaFila1+="<td><input class='aceptar_recurso1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }else if (item3.recurso_aprobado==0) {
                        nuevaFila1+="<td><input class='aceptar_recurso1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }
                      if (item3.recurso_aprobado==0) {
                        nuevaFila1+="<td><input checked class='denegar_recurso1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }else if (item3.recurso_aprobado==2) {
                        nuevaFila1+="<td><input class='denegar_recurso1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }else if (item3.recurso_aprobado==1) {
                        nuevaFila1+="<td><input class='denegar_recurso1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }

                      if (item3.recurso_modificado==null) {
                        nuevaFila1+="<td><input style='width:60px;height:18px' class='recurso_update1 validar' type='text' id="+item3.idmetas+" name="+item3.idmetas+" value=''></td>";
                        nuevaFila1+="<td><button id="+item3.idmetas+" class='btn-round btn-primary verfic1' type='button' name='button'>✔</button></td>";
                      }else
                      {
                        nuevaFila1+="<td><input style='width:60px;height:18px' class='recurso_update1 validar' type='text' id="+item3.idmetas+" name="+item3.idmetas+" value="+item3.recurso_modificado +"></td>";
                        nuevaFila1+="<td><button id="+item3.idmetas+" class='btn-round btn-primary verfic1' type='button' name='button'>✔</button></td>";
                      }

                      if (item3.estado==1) {
                        nuevaFila1+="<td><input checked class='aceptar1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }else if (item3.estado==2) {
                        nuevaFila1+="<td><input class='aceptar1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }else if (item3.estado==0) {
                        nuevaFila1+="<td><input class='aceptar1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }

                      if (item3.estado==0) {
                        nuevaFila1+="<td><input checked class='denegar1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }else if (item3.estado==1) {
                        nuevaFila1+="<td><input class='denegar1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }else if (item3.estado==2) {
                        nuevaFila1+="<td><input class='denegar1' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''><br></td>";
                      }

                      if (item3.observacion==null) {
                        nuevaFila1+="<td></td>";
                      }else
                      {
                        nuevaFila1+="<td align='justify'>"+item3.observacion+"</td>";
                      }

                      nuevaFila1+="<td><button id="+item3.idmetas+" value="+item3.idmetas+" class='btn-round btn-success glyphicon glyphicon-eye-open obser' type='button' name='button'></button></td>";
                    }
                  })
                  if (encontrado==false)
                  {
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                  }
                  nuevaFila1+='</tr>';
                  $('#table_principal1').append(nuevaFila1);
                })
            }
          })
      })
    })
    var id_meta_observacion;
    function comentario_notifiacion_estado(mensaje) {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();
      if (dd < 10) {
        dd = '0' + dd;
      }
      if (mm < 10) {
        mm = '0' + mm;
      }
      var today = yyyy+'-'+mm+'-'+dd;
      $.get('alluser',function(data){
        $.each(data,function(i,item) {
          console.log(item);
          console.log($('#poa_mostrar1').val());
          if (item.idarea==$('#poa_mostrar1').val()) {
            var datos={
              id:item.id,
              descripcion:mensaje,
              fecha:today,
              visto:0,
            }
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              type:'POST',
              url:'notificacion',
              data: datos,
              dataType:'json',
              success: function(data) {
              },
              error:function(data) {
                console.log('error',data);
              }
            });
          }
        });
      })
    }
    $('#add_observacion').on('click',function() {
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var formData={
         id_meta:id_meta_observacion,
         observacion:$('#add_observacion_admin').val(),
      };
      $.ajax({
       type:'post',
       url:'add_comentario',
       data: formData,
       dataType:'json',
       success: function(data) {
         comentario_notifiacion_estado("COMENTARIO A UNA META");
         toastr.success('COMENTARIO CORRECTA','POA',{
           "positionClass": "toast-bottom-right",
           "closeButton": true,
           "extendedTimeOut": 1
         })
       },
       error:function(data) {
         comentario_notifiacion_estado("COMENTARIO A UNA META");
         toastr.success('COMENTARIO CORRECTA','POA',{
           "positionClass": "toast-bottom-right",
           "closeButton": true,
           "extendedTimeOut": 1
         })
       }
     })
    })
    $('body').on('click','.obser',function() {
      id_meta_observacion=$(this).val();
      $('#add_observacion_admin').val("");
      $.get('busca_meta/'+id_meta_observacion,function(data){
        $.each(data,function(i,item) {
          $('#add_observacion_admin').val(item.observacionadminsitrador);
        });
      })
      $('#observacion_admi').modal('show');

    })

    $('body').on('click','.verfic1',function() {
      var valor_label=$("label#"+$(this).attr('id')+".lb_recurso1").text();
      var valor_nuevo=$("input#"+$(this).attr('id')+".recurso_update1").val();
      if (isNaN(parseFloat(valor_nuevo))) {
        toastr.error('SIN VALOR PARA VERIFICAR','POA',{
          "positionClass": "toast-bottom-right",
          "closeButton": true,
          "extendedTimeOut": 1
        })
      }else {
          if (parseFloat(valor_nuevo)>0&&parseFloat(valor_nuevo)<=parseFloat(valor_label) ) {
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            var formData={
               id_meta:$(this).attr('id'),
               recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update1").val(),
               estado:1,
               modificar_recurso:1,
            };
            $.ajax({
             type:'PUT',
             url:'evaluaciones_/'+formData.id_meta,
             data: formData,
             dataType:'json',
             success: function(data) {
               crear_notifiacion_estado('Valor Solicitado');
               toastr.success('ASIGNACION CORRECTA','POA',{
                 "positionClass": "toast-bottom-right",
                 "closeButton": true,
                 "extendedTimeOut": 1
               })
             },
             error:function(data) {
               if (data.status==200) {
                 crear_notifiacion_estado('Valor Solicitado');
                 toastr.success('ASIGNACION CORRECTA','POA',{
                   "positionClass": "toast-bottom-right",
                   "closeButton": true,
                   "extendedTimeOut": 1
                 })
               }
             }
           });
          } else {
            toastr.error('ASIGNACION FALLIDA','POA',{
              "positionClass": "toast-bottom-right",
              "closeButton": true,
              "extendedTimeOut": 1
            })
          }
      }
    })

    function crear_notifiacion_estado(mensaje) {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();
      if (dd < 10) {
        dd = '0' + dd;
      }
      if (mm < 10) {
        mm = '0' + mm;
      }
      var today = yyyy+'-'+mm+'-'+dd;
      $.get('alluser',function(data){
        $.each(data,function(i,item) {
          console.log(item);
          console.log($('#poa_mostrar1').val());
          if (item.idarea==$('#poa_mostrar1').val()) {
            var datos={
              id:item.id,
              descripcion:mensaje,
              fecha:today,
              visto:0,
            }
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              type:'POST',
              url:'notificacion',
              data: datos,
              dataType:'json',
              success: function(data) {
              },
              error:function(data) {
                console.log('error',data);
              }
            });
          }
        });
      })
    }

    $('body').on('click','.aceptar_recurso1',function () {
      $("input#"+$(this).attr('id')+".aceptar_recurso1").prop('checked', true);
      $("input#"+$(this).attr('id')+".denegar_recurso1").prop('checked', false);

      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var formData={
         id_meta:$(this).attr('id'),
         recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update1").val(),
         estado:1,
         modificar_recurso:2,
         estado_recurso:1,
      };
      $.ajax({
       type:'PUT',
       url:'evaluaciones_/'+formData.id_meta,
       data: formData,
       dataType:'json',
       success: function(data) {
         crear_notifiacion_estado('Recurso Aprobado');
       },
       error:function(data) {
         if (data.status==200) {
           crear_notifiacion_estado('Recurso Aprobado');
           toastr.success('ASIGNACION CORRECTA','POA',{
             "positionClass": "toast-bottom-right",
             "closeButton": true,
             "extendedTimeOut": 1
           })
         }
       }
     });
    })

    $('body').on('click','.denegar_recurso1',function () {
      $("input#"+$(this).attr('id')+".aceptar_recurso1").prop('checked', false);
      $("input#"+$(this).attr('id')+".denegar_recurso1").prop('checked', true);
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var formData={
         id_meta:$(this).attr('id'),
         recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update1").val(),
         estado:1,
         modificar_recurso:2,
         estado_recurso:0,
      };
      $.ajax({
       type:'PUT',
       url:'evaluaciones_/'+formData.id_meta,
       data: formData,
       dataType:'json',
       success: function(data) {
         crear_notifiacion_estado('Recurso Denegado');
       },
       error:function(data) {
         if (data.status==200) {
           crear_notifiacion_estado('Recurso Denegado');
           toastr.success('ASIGNACION CORRECTA','POA',{
             "positionClass": "toast-bottom-right",
             "closeButton": true,
             "extendedTimeOut": 1
           })
         }
       }
     });
    })

    $('body').on('click','.aceptar1',function () {
      $("input#"+$(this).attr('id')+".aceptar1").prop('checked', true);
      $("input#"+$(this).attr('id')+".denegar1").prop('checked', false);

      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var formData={
         id_meta:$(this).attr('id'),
         recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update1").val(),
         estado:1,
         modificar_recurso:0,
      };
      $.ajax({
       type:'PUT',
       url:'evaluaciones_/'+formData.id_meta,
       data: formData,
       dataType:'json',
       success: function(data) {
         crear_notifiacion_estado('Meta Aceptada');
       },
       error:function(data) {
         if (data.status==200) {
           crear_notifiacion_estado('Meta Aceptada');
           toastr.success('ASIGNACION CORRECTA','POA',{
             "positionClass": "toast-bottom-right",
             "closeButton": true,
             "extendedTimeOut": 1
           })
         }
       }
     });
    })

    $('body').on('click','.denegar1',function () {
      $("input#"+$(this).attr('id')+".aceptar1").prop('checked', false);
      $("input#"+$(this).attr('id')+".denegar1").prop('checked', true);
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var formData={
         id_meta:$(this).attr('id'),
         recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update1").val(),
         estado:0,
         modificar_recurso:0,
      };
      $.ajax({
       type:'PUT',
       url:'evaluaciones_/'+formData.id_meta,
       data: formData,
       dataType:'json',
       success: function(data) {
         crear_notifiacion_estado('Meta Denegada');
       },
       error:function(data) {
         if (data.status==200) {
           crear_notifiacion_estado('Meta Denegada');
           toastr.success('ASIGNACION CORRECTA','POA',{
             "positionClass": "toast-bottom-right",
             "closeButton": true,
             "extendedTimeOut": 1
           })
         }
       }
     });
    })

    $('#ocultar1').on('click', function(event) {
      $('#añadir1').val("add");
      $.get('pruebass/'+idperiodoglobal,function(data){
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

          $('#numero1').attr("value",(item.evaluaciones.length+1));
          $("#numero1").prop('disabled', true);
          $("#sele1").empty();
          var selec='';
          selec+='<option>'+(item.evaluaciones.length+1)+'</option>';
          $("#sele1").append(selec);

          $('#fecha_i1').attr("max",fechafinal);
          $('#fecha_i1').attr("min",fechainicio);
          $('#fecha_i1').attr("value",fechainicio);

          $('#fecha_f1').attr("max",fechafinal);
          $('#fecha_f1').attr("min",fechainicio);
          $('#fecha_f1').attr("value",fechafinal);
          $('#add1').show();
        });
      })
    })

    function addevaluation(id) {
        var datos={
          numero:$("#sele1").val(),
          fecha_incial:$("#fecha_i1").val(),
          fecha_final:$("#fecha_f1").val(),
          id_poa:id,
        }
        $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              type:'POST',
              url:'evaluapoa',
              data: datos,
              dataType:'json',
              success: function(data) {
                var pr='';
                pr += '<tr>';
                pr += '<td>'+data.numero+'</td>';
                pr += '<td>'+data.fecha_inicio+'</td>';
                pr += '<td>'+data.fecha_fin+'</td>';
                pr += '<td><button class="btn btn-danger delete-evalu1 glyphicon glyphicon-trash" value="'+data.id+'"></button></td>';
                pr += '<td><button class="btn btn-primary update-evalu1 glyphicon glyphicon-pencil" value="'+data.id+'"></button></td>';
                pr += '</tr>';
                $("#table_add").append(pr);
              },
              error:function(data) {
                console.log('error',data);
              }
            });
    }

    $('#close').on('click',function() {
      $('#add1').hide();
    })

    $('#buscar_poa').on('click',function() {
      $("#table_busqueda > tbody").html("");
      $.get('pro_ind/'+$('#id_area').val()+'/'+$('#busqueda_periodo').val(),function(data) {
          $.each(data['proyec_indica'],function(i1,item1) {
            var nuevaFila='<tr class="even pointer">';
            nuevaFila+="<td style='vertical-align : middle;text-align:center;' rowspan="+(item1['indicadoress'].length+1)+">"+item1.descripcion+"</td>";
            if (item1['indicadoress'].length==0) {
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
              nuevaFila+="<td></td>";
            }
            nuevaFila+='</tr>';
            $('#table_busqueda').append(nuevaFila);
            if (item1['indicadoress'].length!=0) {
                $.each(item1['indicadoress'],function(i2,item2) {
                  var nuevaFila1='<tr class="even pointer">';
                  nuevaFila1+="<td align='justify'>"+item2.descripcion+"</td>";
                  var encontrado=false;
                  $.each(data['metas'],function(i3,item3) {
                    if (item2.id==item3.id_indicador)
                    {
                      encontrado=true;
                      nuevaFila1+="<td align='justify'>"+item3.descripcion+"</td>";
                      nuevaFila1+="<td style='vertical-align : middle;text-align:center;'>$<label class='lb_recurso1' id="+item3.idmetas+">"+item3.recurso+" </label></td>";
                      if (item3.recurso_modificado==null) {
                        nuevaFila1+="<td></td>";
                      }else
                      {
                        nuevaFila1+="<td style='vertical-align : middle;text-align:center;'>$ "+item3.recurso_modificado+"</td>";
                      }

                      if(item3.recurso_aprobado==0)
                      {
                        nuevaFila1+="<td style='vertical-align : middle;text-align:center;' bgcolor='#f2a8a8'>NO APROBADO</td>";
                      }
                      else if(item3.recurso_aprobado==1)
                      {
                        nuevaFila1+="<td style='vertical-align : middle;text-align:center;' bgcolor='#9fe4b0'>APROBADO</td>";
                      }else if(item3.recurso_aprobado==2)
                      {
                        nuevaFila1+="<td style='vertical-align : middle;text-align:center;'>SIN REVISAR</td>";
                      }

                      if(item3.estado==0)
                      {
                        nuevaFila1+="<td style='vertical-align : middle;text-align:center;' bgcolor='#f2a8a8'>NO APROBADO</td>";
                      }
                      else if(item3.estado==1)
                      {
                        nuevaFila1+="<td style='vertical-align : middle;text-align:center;' bgcolor='#9fe4b0'>APROBADO</td>";
                      }else if(item3.estado==2)
                      {
                        nuevaFila1+="<td style='vertical-align : middle;text-align:center;'>SIN REVISAR</td>";
                      }


                    }
                  })
                  if (encontrado==false)
                  {
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                    nuevaFila1+="<td></td>";
                  }
                  nuevaFila1+='</tr>';
                  $('#table_busqueda').append(nuevaFila1);
                })
            }
          })
      })
    })

    $('body').on('click','.notifi',function() {
      $('#num_notifi').text($('#num_notifi').text()-1);
      $("#" +$(this).val()+"li").remove();
      var formData={
        id:$(this).val(),
        visto:1,
      };
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
      });
      $.ajax({
        type:'PUT',
        url:'notificacion/'+$(this).val(),
        data: formData,
        dataType:'json',
        success: function(data) {
        },
        error:function(data) {
        }
      });
    })

});
