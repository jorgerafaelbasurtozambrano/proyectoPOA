$(document).ready(function() {
  $('body').on('click', '.open-all', function(){
    console.log("hola");
    $('#all').modal('show');
  })

  $('#anid_area').on('change',function() {
    $('#anid_sub').empty();
    $('#anid_sub').append("<option selected='true' disabled='disabled'>Seleccione Subarea</option>");
    $.get('obtener_subareas/'+$(this).val(),function(data) {
      $.each(data,function(i,item) {
        var opcion="<option value="+item.id+" >"+item.descripcion+"</option>";
        $('#anid_sub').append(opcion);
      })
    })
  })
  $('#anid_sub').on('change',function() {
    $("#busq_sub > tbody").html("");
    $.get('pro_in/'+$('#peri').val()+'/'+$('#anid_sub').val(),function(data) {
        $.each(data['proyec_indica'],function(i1,item1) {
          var nuevaFila='<tr>';
          nuevaFila+="<td rowspan="+(item1['indicadoress'].length+1)+">"+item1.descripcion+"</td>";
          if (item1['indicadoress'].length==0) {
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
          $('#busq_sub').append(nuevaFila);
          if (item1['indicadoress'].length!=0) {
              $.each(item1['indicadoress'],function(i2,item2) {
                var nuevaFila1='<tr>';
                nuevaFila1+="<td>"+item2.descripcion+"</td>";
                var encontrado=false;
                $.each(data['metas'],function(i3,item3) {
                  if (item2.id==item3.id_indicador)
                  {
                    encontrado=true;
                    nuevaFila1+="<td>"+item3.descripcion+"</td>";
                    nuevaFila1+="<td>$<label class='lb_recurso' id="+item3.idmetas+">"+item3.recurso+" </label></td>";
                    nuevaFila1+="<td><input style='width:60px;height:18px' class='recurso_actualizar' type='text' id="+item3.idmetas+" name="+item3.idmetas+" value=''></td>";
                    nuevaFila1+="<td><button id="+item3.idmetas+" class='verfic' type='button' name='button'>✔</button></td>";
                    nuevaFila1+="<td>$"+item3.recurso_modificado+"</td>";
                    if (item3.estado==0) {
                      nuevaFila1+="<td bgcolor='#eb3636'>No aprobado</td>";
                    } else if(item3.estado==1){
                      nuevaFila1+="<td bgcolor='#57ed7c'>Aprobado</td>";
                    }else if (item3.estado==2) {
                      nuevaFila1+="<td>Sin revisar</td>";
                    }

                    if (item3.recurso_aprobado==0) {
                      nuevaFila1+="<td bgcolor='#eb3636'>No aprobado</td>";
                    } else if(item3.recurso_aprobado==1){
                      nuevaFila1+="<td bgcolor='#57ed7c'>Aprobado</td>";
                    }else if (item3.recurso_aprobado==2) {
                      nuevaFila1+="<td>Sin revisar</td>";
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
                  nuevaFila1+="<td></td>";
                  nuevaFila1+="<td></td>";
                }
                nuevaFila1+='</tr>';
                $('#busq_sub').append(nuevaFila1);
              })
          }
        })
    })
  })

  $('#poa_mostrar').on('change',function() {
    $("#table_principal > tbody").html("");
    $.get('/pro_ind/'+$(this).val()+'/'+$('#periodo_re').val(),function(data) {
        $.each(data['proyec_indica'],function(i1,item1) {
          var nuevaFila='<tr>';
          nuevaFila+="<td rowspan="+(item1['indicadoress'].length+1)+">"+item1.descripcion+"</td>";
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
          }
          nuevaFila+='</tr>';
          $('#table_principal').append(nuevaFila);
          if (item1['indicadoress'].length!=0) {
              $.each(item1['indicadoress'],function(i2,item2) {
                var nuevaFila1='<tr>';
                nuevaFila1+="<td>"+item2.descripcion+"</td>";
                var encontrado=false;
                $.each(data['metas'],function(i3,item3) {
                  if (item2.id==item3.id_indicador)
                  {
                    encontrado=true;
                    nuevaFila1+="<td>"+item3.descripcion+"</td>";
                    nuevaFila1+="<td>$<label class='lb_recurso' id="+item3.idmetas+">"+item3.recurso+" </label></td>";
                    if (item3.recurso_aprobado==1) {
                      nuevaFila1+="<td><input checked class='aceptar_recurso' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>aceptar<br></td>";
                    }else if (item3.recurso_aprobado==2) {
                      nuevaFila1+="<td><input class='aceptar_recurso' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>aceptar<br></td>";
                    }else if (item3.recurso_aprobado==0) {
                      nuevaFila1+="<td><input class='aceptar_recurso' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>aceptar<br></td>";
                    }
                    if (item3.recurso_aprobado==0) {
                      nuevaFila1+="<td><input checked class='denegar_recurso' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>denegar<br></td>";
                    }else if (item3.recurso_aprobado==2) {
                      nuevaFila1+="<td><input class='denegar_recurso' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>denegar<br></td>";
                    }else if (item3.recurso_aprobado==1) {
                      nuevaFila1+="<td><input class='denegar_recurso' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>denegar<br></td>";
                    }

                    if (item3.recurso_modificado==null) {
                      nuevaFila1+="<td><input style='width:60px;height:18px' class='recurso_update' type='text' id="+item3.idmetas+" name="+item3.idmetas+" value=''></td>";
                      nuevaFila1+="<td><button id="+item3.idmetas+" class='verfic' type='button' name='button'>✔</button></td>";
                    }else
                    {
                      nuevaFila1+="<td><input style='width:60px;height:18px' class='recurso_update' type='text' id="+item3.idmetas+" name="+item3.idmetas+" value="+item3.recurso_modificado +"></td>";
                      nuevaFila1+="<td><button id="+item3.idmetas+" class='verfic' type='button' name='button'>✔</button></td>";
                    }

                    if (item3.estado==1) {
                      nuevaFila1+="<td><input checked class='aceptar' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>aceptar<br></td>";
                    }else if (item3.estado==2) {
                      nuevaFila1+="<td><input class='aceptar' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>aceptar<br></td>";
                    }else if (item3.estado==0) {
                      nuevaFila1+="<td><input class='aceptar' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>aceptar<br></td>";
                    }

                    if (item3.estado==0) {
                      nuevaFila1+="<td><input checked class='denegar' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>denegar<br></td>";
                    }else if (item3.estado==1) {
                      nuevaFila1+="<td><input class='denegar' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>denegar<br></td>";
                    }else if (item3.estado==2) {
                      nuevaFila1+="<td><input class='denegar' type='checkbox' id="+item3.idmetas+" name="+item3.idmetas+" value=''>denegar<br></td>";
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
                  nuevaFila1+="<td></td>";
                  nuevaFila1+="<td></td>";
                  nuevaFila1+="<td></td>";
                }
                nuevaFila1+='</tr>';
                $('#table_principal').append(nuevaFila1);
              })
          }
        })
    })
  })
  $('body').on('click','.verfic',function() {
    var valor_label=$("label#"+$(this).attr('id')+".lb_recurso").text();
    var valor_nuevo=$("input#"+$(this).attr('id')+".recurso_update").val();
    console.log(valor_label);
    console.log(valor_nuevo);
    if (isNaN(parseFloat(valor_nuevo))) {
      alertify.alert(" no se puede verificar sin valor nuevo");
    }else {
        if (parseFloat(valor_nuevo)>0&&parseFloat(valor_nuevo)<=parseFloat(valor_label) ) {
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var formData={
             id_meta:$(this).attr('id'),
             recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update").val(),
             estado:1,
             modificar_recurso:1,
          };
          $.ajax({
           type:'PUT',
           url:'evaluaciones_/'+formData.id_meta,
           data: formData,
           dataType:'json',
           success: function(data) {
           },
           error:function(data) {
             console.log('error',data);
           }
         });
        } else {
          alertify.alert("LO SENTIMOS, NO PODEMOS REALIZAR SU PETICIÓN");
        }
    }
  })

  $('body').on('click','.aceptar_recurso',function () {
    $("input#"+$(this).attr('id')+".aceptar_recurso").prop('checked', true);
    $("input#"+$(this).attr('id')+".denegar_recurso").prop('checked', false);

    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData={
       id_meta:$(this).attr('id'),
       recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update").val(),
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
     },
     error:function(data) {
       console.log('error',data);
     }
   });
  })

  $('body').on('click','.denegar_recurso',function () {
    $("input#"+$(this).attr('id')+".aceptar_recurso").prop('checked', false);
    $("input#"+$(this).attr('id')+".denegar_recurso").prop('checked', true);
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData={
       id_meta:$(this).attr('id'),
       recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update").val(),
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
     },
     error:function(data) {
       console.log('error',data);
     }
   });
  })


  $('body').on('click','.aceptar',function () {
    $("input#"+$(this).attr('id')+".aceptar").prop('checked', true);
    $("input#"+$(this).attr('id')+".denegar").prop('checked', false);

    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData={
       id_meta:$(this).attr('id'),
       recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update").val(),
       estado:1,
       modificar_recurso:0,
    };
    $.ajax({
     type:'PUT',
     url:'evaluaciones_/'+formData.id_meta,
     data: formData,
     dataType:'json',
     success: function(data) {
     },
     error:function(data) {
       console.log('error',data);
     }
   });
  })

  $('body').on('click','.denegar',function () {
    $("input#"+$(this).attr('id')+".aceptar").prop('checked', false);
    $("input#"+$(this).attr('id')+".denegar").prop('checked', true);
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var formData={
       id_meta:$(this).attr('id'),
       recurso_modificado:$("input#"+$(this).attr('id')+".recurso_update").val(),
       estado:0,
       modificar_recurso:0,
    };
    $.ajax({
     type:'PUT',
     url:'evaluaciones_/'+formData.id_meta,
     data: formData,
     dataType:'json',
     success: function(data) {
     },
     error:function(data) {
       console.log('error',data);
     }
   });
  })
});
