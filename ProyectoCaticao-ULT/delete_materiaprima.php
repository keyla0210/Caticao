<?php

include("db.php");

if(isset($_GET['idMateriaprima'])) {
  $id = $_GET['idMateriaprima'];
  $query = "DELETE FROM materiaprima WHERE idMateriaprima = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Materia prima eliminada';
  $_SESSION['message_type'] = 'danger';
  header('Location: stock_materiaprima.php');
}

?>
