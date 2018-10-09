<?php
//variables
$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "ejemplo";
//conectarnos ala DB
    $mysqli = new mysqli($servername, $username , $password, $dbname);
//si falla la conexion
if($mysqli->connect_error){
        die("Conexión fallida: ".$conn->connect_error);

      }
//salida final de los datos
    $salida = "";
//consulta
    $query = "SELECT * FROM productos ORDER By Cod_producto";

//escapamos valores falsos(seguridad)
    if(isset($_POST['consulta'])){
      $q = $mysqli->real_escape_string($_POST['consulta']);
      $query = "SELECT * FROM productos
      WHERE Nombre LIKE '%$q%' OR Marca LIKE '%$q%' OR Modelo LIKE '%$q%'";

}

  $resultado = $mysqli->query($query);
//valoramos si se encuentra resultados
  if($resultado->num_rows > 0){
//pintamos los datos en la variable vacia $salida
    $salida.="<table class='tabla_datos'>
                <thead>
                  <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                  </tr>
              </thead>
          <tbody>";
//con los productos de nuestra DB
      while($fila = $resultado->fetch_assoc()){
        $salida.="<tr>
                <td>".$fila["Cod_producto"]."</td>
                <td>".$fila["Nombre"]."</td>
                <td>".$fila["Marca"]."</td>
                <td>".$fila["Modelo"]."</td>
              </tr>";

      }
//cerramos la tabla
      $salida.="</tbody></table>";

  }else{
      $salida.="no hay datos";
  }
//terminamos la salida de datos
    echo $salida;
//cerramos nuestra conexion SQL
    $mysqli->close();

 ?>
