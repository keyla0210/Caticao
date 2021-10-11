<?php

include("db.php");

if(isset($_GET['idInsumo'])) {
  $id = $_GET['idInsumo'];
  $query = "DELETE FROM insumo WHERE idInsumo = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Materia prima eliminada';
  $_SESSION['message_type'] = 'danger';
  header('Location: stock_insumo.php');
}

?>
