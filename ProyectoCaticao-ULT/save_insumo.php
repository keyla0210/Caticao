
<?php

include('db.php');

if (isset($_POST['save_insumo'])) {

    $nombre= $_POST['nombre'];
    $tipodeunidad= $_POST['tipodeunidad'];
    $marca= $_POST['marca'];
    $cantidad= $_POST['cantidad'];
 

    $query = "INSERT INTO insumo(nombre,tipodeunidad,
    marca,cantidad)
    VALUES ('$nombre','$tipodeunidad','$marca',
    '$cantidad')";

    $result = mysqli_query($conn, $query);


  if(!$result) {
    die("Falta rellenar datos");
  }

  $_SESSION['message'] = 'Insumo resgistrado';
  $_SESSION['message_type'] = 'success';
  header('Location: stock_insumo.php');

}

?>


