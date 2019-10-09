$(document).ready(function() {
  var idperiodoglobal;
  $('body').on('click', '.open-modal', function(){
    $('#add').hide();
    $('#añadir').val("new");
    var idperiodo=$(this).val();
    idperiodoglobal=idperiodo;
    $('#tabla').empty();
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
        eva += '<td><button class="btn btn-danger delete-evalu" value="'+item.id+'">ELIMINAR</button></td>';
        eva += '<td><button class="btn btn-primary update-evalu" value="'+item.id+'">MODIFICAR</button></td>';
        eva += '</tr>';
        $("#tabla").append(eva);
      });
      $('#evaluaciones').modal('show');
    })
  })

  $('body').on('click', '.modales', function(event) {
    var idproyecto=$(this).val();
    $("input[name=id_proyectos]").val(idproyecto);
    $('#m_indicador').modal('show');
  })
  function cargar() {
    $.get('obtener',function(data){
      $.each(data,function(i,item) {
        var per='';
        per += '<tr>';
        per += '<td>'+item.id+'</td>';
        per += '<td>'+item.descripcion+'</td>';
        per += '<td>'+item.fecha_inicio+'</td>';
        per += '<td>'+item.fecha_fin+'</td>';
        if (item.estado==1) {
          per += '<td>ACTIVADO</td>';
          per += '<td><button class="btn btn btn-warning" value="'+item.id+'">X</button></td>';
        } else {
          per += '<td>DESACTIVADO</td>';
          per += '<td><button class="btn btn btn-primary" value="'+item.id+'">✔</button></td>';
        }
        per += '<td><button class="btn btn-danger delete-evalu" value="'+item.id+'">ELIMINAR</button></td>';
        per += '</tr>';
        $("#periodos").append(per);
      });
    })
  }
  $('.table').on('click','.delete-evalu', function(event) {
    var idevaluacion=$(this).val();
    $(this).closest('tr').remove();
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
      },
      error:function(data) {
        console.log('error',data);
      }
    });
  })

  $('.table').on('click','.delete-periodo', function(event) {
    var periodo=$(this).val();
    $.get('evaluaciones/'+periodo,function(data){
      if (data.length!=0) {
        alertify.alert("LO SENTIMOS, EXISTE EVALUACIONES LIGADA AL PERIDO");
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

          },
          error:function(data) {
            alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
          }
        });
      }
    })
  })
  var hay;
  function validar_periodo_(idperiodo) {
    hay=0;
    $.get('evaluaciones/'+idperiodo,function(data){
      $.each(data,function(i,item) {
        hay=hay+1;
      });
    })
    if (hay==0) {
      return true;
    }else {
      alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
      return false;
    }
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


  $('.table').on('click','.desactivar-periodo', function(event) {
    var idperiodo=$(this).val();
    id = $(this).parents("tr").find("th").eq(0).html();
    numero = $(this).parents("tr").find("td").eq(0).html();
    periodo = $(this).parents("tr").find("td").eq(1).html();
    inicio = $(this).parents("tr").find("td").eq(2).html();
    fin = $(this).parents("tr").find("td").eq(3).html();
    if (validar_()==false) {
      updateperiodo(1,idperiodo);
      var per='';
      per += '<tr id="'+id+'">';
      per += '<th hidden scope="row">'+id+'</th>';
      per += '<td>'+numero+'</td>';
      per += '<td>'+periodo+'</td>';
      per += '<td>'+inicio+'</td>';
      per += '<td>'+fin+'</td>';
      per += '<td>ACTIVADO</td>';
      per += '<td><button class="btn btn-warning activar-periodo" value="'+id+'">X</button></td>';
      per += '<td><button id="mostrar_evaluaciones" class="btn btn-info open-modal" value="'+id+'">EVALUACIONES</button></td>';
      per += '<td><button class="btn btn-danger delete-periodo" value="'+id+'">ELIMINAR</button></td>';
      per += '</tr>';
      $("tr#"+id).replaceWith(per);

    }else {
      alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
    }
  })

  $('.table').on('click','.activar-periodo', function(event) {
    var idperiodo=$(this).val();
    updateperiodo(0,idperiodo);
    id = $(this).parents("tr").find("th").eq(0).html();
    numero = $(this).parents("tr").find("td").eq(0).html();
    periodo = $(this).parents("tr").find("td").eq(1).html();
    inicio = $(this).parents("tr").find("td").eq(2).html();
    fin = $(this).parents("tr").find("td").eq(3).html();

    var per='';
    per += '<tr id="'+id+'">';
    per += '<th hidden scope="row">'+id+'</th>';
    per += '<td>'+numero+'</td>';
    per += '<td>'+periodo+'</td>';
    per += '<td>'+inicio+'</td>';
    per += '<td>'+fin+'</td>';
    per += '<td>DESACTIVADO</td>';
    per += '<td><button class="btn btn-primary desactivar-periodo" value="'+id+'">✔</button></td>';
    per += '<td><button id="mostrar_evaluaciones" class="btn btn-info open-modal" value="'+id+'">EVALUACIONES</button></td>';
    per += '<td><button class="btn btn-danger delete-periodo" value="'+id+'">ELIMINAR</button></td>';
    per += '</tr>';

    $("tr#"+id).replaceWith(per);

  })
  function validar_() {
    var estado=false;
    $('#periodos tr').each(function(index) {
      if ($(this).find("td").eq(4).html()=="ACTIVADO") {
        estado=true;
      }
    });
    return estado;
  }
  $('#guardar').on('click', function(e) {
    let fecha_ini=new Date($('#fipe').val());
    let fecha_fini=new Date($('#ffpe').val());
    if (fecha_ini!="Invalid Date" && fecha_fini!="Invalid Date" && $('#periodos').val()!="") {
      if (fecha_ini.getFullYear()<fecha_fini.getFullYear()) {
        if ($('#estados').val()==0) {
          e.preventDefault();
          guardardatos();
        }else {
          $.get('prueba',function(data){
            $.each(data,function(i,item) {
              if (item.id!=null) {
                alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
              }else {
                e.preventDefault();
                guardardatos();
              }
            });
          })
        }
      }else {
        alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
      }
    } else {
      alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN FALTA ALGUN CAMPO");
    }
  })
  function guardardatos() {
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData={
      periodo:$('#periodos').val(),
      fecha_inicial:$('#fipe').val(),
      fecha_final:$('#ffpe').val(),
      estado:$('#estados').val(),
    };
    $.ajax({
      type:'POST',
      url:'periodo',
      data: formData,
      dataType:'json',
      success: function(data) {
        if ($('#datos >tbody >tr').length != 0){
          guardar_evaluacion(data.id);
        }else
        {
          $(location).attr('href',"mostrar");
        }
      },
      error:function(data) {
        console.log('error',data);
      }
    });
  }
  function guardar_evaluacion(id) {
        $('#datos tr').each(function() {
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
          $(location).attr('href',"mostrar");
  }
  $('#numero').on('keyup', function(){
    $("#sele").empty();
        for (var i = 1; i <= $(this).val() ; i++) {
          var selec='';
          selec+='<option>'+i+'</option>';
          $("#sele").append(selec);
        }
    }).keyup();

    $('#ocultar').on('click', function(event) {
      $('#añadir').val("add");
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

          $('#numero').attr("value",(item.evaluaciones.length+1));
          $("#sele").empty();
          var selec='';
          selec+='<option>'+(item.evaluaciones.length+1)+'</option>';
          $("#sele").append(selec);

          $('#fecha_i').attr("max",fechafinal);
          $('#fecha_i').attr("min",fechainicio);
          $('#fecha_i').attr("value",fechainicio);

          $('#fecha_f').attr("max",fechafinal);
          $('#fecha_f').attr("min",fechainicio);
          $('#fecha_f').attr("value",fechafinal);
          $('#add').show();
        });
      })
    })


    function addevaluation(id) {
        var datos={
          numero:$("#sele").val(),
          fecha_incial:$("#fecha_i").val(),
          fecha_final:$("#fecha_f").val(),
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
                pr += '<td><button class="btn btn-danger delete-evalu" value="'+data.id+'">ELIMINAR</button></td>';
                pr += '<td><button class="btn btn-primary update-evalu" value="'+data.id+'">MODIFICAR</button></td>';
                pr += '</tr>';
                $("#tabla").append(pr);
              },
              error:function(data) {
                console.log('error',data);
              }
            });
    }

    $('#añadir').on('click', function(){
      let fecha_ini=new Date($('#fecha_i').val());
      let fecha_fini=new Date($('#fecha_f').val());
        if ($('#añadir').val()=="new") {
          if (fecha_ini!="Invalid Date" && fecha_fini!="Invalid Date" && $("#sele").val()!=null) {
              if (validar()==false) {
                var pr='';
                pr += '<tr>';
                pr += '<td>'+$("#sele").val()+'</td>';
                pr += '<td>'+$("#fecha_i").val()+'</td>';
                pr += '<td>'+$("#fecha_f").val()+'</td>';
                pr +='<td><button class="btn btn-info delete-pr">ELIMINAR</button><td>';
                pr += '</tr>';
                $("#datos").append(pr);
              }else {
                alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
              }
          }else
          {
            alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN SIN CAMPOS");
          }
        }else if ($('#añadir').val()=="add") {
          if (validar1()==false) {
            addevaluation(idperiodoglobal);
            $('#add').hide();
          }else {
            alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
          }
        }
    });
    $('#datos').on('click', '.delete-pr', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    })

    function validar_nuevo() {
      var estado=false;
      var i=0;
      $.get('evaluaciones/'+idperiodoglobal,function(data){
        $.each(data,function(i,item) {
          console.log('bd='+item.numero+'---='+$("#sele").val());
          if (item.numero==$("#sele").val()) {
            estado=true;
          }
        });
      })
      return estado;
    }

    function validar1() {
      console.log("hola validar1");
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
      $('#datos tbody tr').each(function(index) {
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
});
