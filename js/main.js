buscar_datos();

function buscar_datos(){
  $.ajax({
      url:'App/buscar.php',
      type:'POST',
      dataType: 'html',
      data:{}

  })
  .done(function(respuesta){
    $('#datos').html(respuesta);
    console.log("success");
  })
  .fail(function(){
    console.log("error");
  })
}


//evento keyup de caja de busqueda

$(document).on('keyup','#caja_busqueda',function(){
//this es nuestra caja de busqueda
    var valor = $(this).val()
//valoramos si el valor esta vacio
    if(valor != ""){
//si hay datos nos llamoamos a los valores buscados
      buscar_datos(valor);
    }else{
      //sino pasamos todos los valores
      buscar_datos();
    }

})
