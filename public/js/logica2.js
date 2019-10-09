$(document).ready(function(){
  var idevaluacionglobal;
  var contenidofila;
  var coincidencia;
  var exp;
  $("#filtrar").keyup(function() {
    $("#periodos tbody tr").each(function() {
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

  function actualizar_modal(idperiodo) {
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
    })
  }
  $('body').on('click', '.update-evalu', function(){
      var idevaluacion=$(this).val();
      idevaluacionglobal=idevaluacion;
      $.get('buscar/'+idevaluacion,function(data){
        $.each(data,function(i,item) {
          $("#numero_update").val(item.numero);
          cargar_update(item.id_poa);
        });
      })
      $('#updateval').modal('show');
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

        $("#fecha_i_update").val(fechainicio);
        $("#fecha_f_update").val(fechafinal);

        $("#fecha_i_update").attr("min",fechainicio);
        $("#fecha_i_update").attr("max",fechafinal);
        $("#fecha_f_update").attr("min",fechainicio);
        $("#fecha_f_update").attr("max",fechafinal);


      });
    })
  }

  $("#update_evaluacion").on('click',function(e) {
      var formData={
        idevaluacion:idevaluacionglobal,
        numero:$("#numero_update").val(),
        fechainicio:$("#fecha_i_update").val(),
        fechafinal:$("#fecha_f_update").val(),

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
          $('#updateval').modal('hide');
          actualizar_modal(data.id_poa);

        },
        error:function(data) {
          console.log('error',data);
        }
      });
  })

  $("#fipe").on("change",function(){
    if ($("#ffpe").val()=="") {
      var inicio=$("#fipe").val();
      $("#fecha_i").attr("min",inicio);
      $("#fecha_f").attr("min",inicio);
      $("#fecha_i").attr("value",inicio);
    } else {
      let fecha_ini=new Date($('#fipe').val());
      let fecha_fini=new Date($('#ffpe').val());
      if (fecha_ini.getFullYear()<fecha_fini.getFullYear()) {
        var inicio=$("#fipe").val();
        $("#fecha_i").attr("min",inicio);
        $("#fecha_f").attr("min",inicio);
        $("#fecha_i").attr("value",inicio);
      } else {
        alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
        $("#fipe").val("AAA-MM-DD");
        $("#fecha_i").val("AAA-MM-DD");
      }
    }
  });

  $("#ffpe").on("change",function(){
    if ($("#fipe").val()=="") {
      var fin=$("#ffpe").val();
      $("#fecha_i").attr("max",fin);
      $("#fecha_f").attr("max",fin);
      $("#fecha_f").attr("value",fin);
    } else {
      let fecha_ini=new Date($('#fipe').val());
      let fecha_fini=new Date($('#ffpe').val());
      if (fecha_fini.getFullYear()>fecha_ini.getFullYear()) {
        var fin=$("#ffpe").val();
        $("#fecha_i").attr("max",fin);
        $("#fecha_f").attr("max",fin);
        $("#fecha_f").attr("value",fin);
      }else {
        alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
        $("#ffpe").val("DD-MM-AAAA");
        $("#fecha_f").val("DD-MM-AAAA");
      }
    }
  });
})
