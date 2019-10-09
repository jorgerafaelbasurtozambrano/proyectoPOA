$(document).ready(function() {

    function actualizar_notificaciones() {
      var contado=0;
        $.get('notificaciones/'+$('#id_usuario_').val(),function(data){
          $.each(data,function(i,item) {
            if (item.visto==0) {
              contado=contado+1;
            }
          });
          if ($('#num_notifi').text()==contado) {
          } else {
            toastr.success('TIENE NOTIFICACION NUEVA','POA',{
              "progressBar": true,
              "positionClass": "toast-bottom-right",
              "closeButton": true
            })
            $('#menu11 >li').remove();
            cargar_notificaciones();
            $('#num_notifi').text(contado);
          }
        })
    }
    setInterval(actualizar_notificaciones, 2000);

    function cargar_notificaciones() {
        $.get('notificaciones/'+$('#id_usuario_').val(),function(data){
          $.each(data,function(i,item) {
            if (item.visto==0) {
              var id=item.id+'li';
              var nuevaFila1='';
              nuevaFila1+="<li id="+id+"><a><span class='image'> <image src='img/intro01.png' alt='Profile Image' /></span><span>ADMINISTRADOR</span><span class='time'>"+item.tiempo+"</span></span> <span><span class='message'>"+item.descripcion+" <button value="+item.id+" type='button' class='btn btn-link notifi'>MARCAR COMO LEIDO</button></span></span></a></li>";
              $("#menu11").append(nuevaFila1);
            }
          });
        })
    }

    $('#notifaciones_add').on('click',function() {
    })

});
