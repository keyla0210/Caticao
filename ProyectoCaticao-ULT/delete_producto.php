<?php

include("db.php");

if(isset($_GET['idProducto'])) {
  $id = $_GET['idProducto'];
  $query = "DELETE FROM producto WHERE idProducto = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: stock_producto.php');
}

?>
