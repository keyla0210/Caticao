
<?php

include('db.php');

if (isset($_POST['save_materiaprima'])) {

    $nombre= $_POST['nombre'];
    $tipodeunidad= $_POST['tipodeunidad'];
    $marca= $_POST['marca'];
    $cantidad= $_POST['cantidad'];
 

    $query = "INSERT INTO materiaprima(nombre,tipodeunidad,
    marca,cantidad)
    VALUES ('$nombre','$tipodeunidad','$marca',
    '$cantidad')";

    $result = mysqli_query($conn, $query);


  if(!$result) {
    die("Falta rellenar datos");
  }

  $_SESSION['message'] = 'Materia prima resgistrada';
  $_SESSION['message_type'] = 'success';
  header('Location: stock_materiaprima.php');

}

?>


