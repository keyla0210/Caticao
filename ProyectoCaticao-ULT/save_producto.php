
<?php

include('db.php');

if (isset($_POST['save_producto'])) {

    $nombre= $_POST['nombre'];
    $descripcion= $_POST['descripcion'];
    $idCategoria= $_POST['idCategoria'];
    $cantidad= $_POST['cantidad'];
    $precio= $_POST['precio'];

    $query = "INSERT INTO producto(nombre,descripcion,
    idCategoria,cantidad,precio)
    VALUES ('$nombre','$descripcion','$idCategoria',
    '$cantidad','$precio')";

    $result = mysqli_query($conn, $query);


  if(!$result) {
    die("Falta rellenar datos");
  }

  $_SESSION['message'] = 'Producto registrado';
  $_SESSION['message_type'] = 'success';
  header('Location: stock_producto.php');

}

?>


