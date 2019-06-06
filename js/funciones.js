var aumentar = document.getElementById('aumentar').addEventListener('click', aumentar);
function aumentar(){
  var num = $("#cantidad").val();
  var limit = $("#stock").val();

   if(num == limit){
     $("#cantidad").val(1);
     $("#canticadCarrito").val(1);
   }else{
     $("#cantidad").val(parseInt(num)+1);
     $("#cantidadCarrito").val(parseInt(num)+1);
   }
}

var disminuir = document.getElementById('disminuir').addEventListener('click', disminuir);
function disminuir(){
  var num = $("#cantidad").val();

  if(num == 1){
    $("#cantidad").val(1);
    $("#cantidadCarrito").val(1);
  }else{
    $("#cantidad").val(parseInt(num)-1);
    $("#cantidadCarrito").val(parseInt(num)-1);
  }
}
