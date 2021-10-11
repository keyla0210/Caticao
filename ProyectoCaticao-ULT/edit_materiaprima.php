
<?php


include("db.php");
                        $nombre = '';
                        $tipodeunidad='';
                        $marca= '';
                        $cantidad= '';
                       
                        

                        if  (isset($_GET['idMateriaprima'])) {
                        $id = $_GET['idMateriaprima'];
                        $query = "SELECT * FROM materiaprima WHERE idMateriaprima=$id";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_array($result);
                            $nombre = $row['nombre'];
                            $marca = $row['marca'];
                            $tipodeunidad = $row['tipodeunidad'];
                            $cantidad = $row['cantidad'];

                            
                           
                        }
                        }

                        if (isset($_POST['update_materiaprima'])) {

                            $id = $_GET['idMateriaprima'];
                            $nombre = $_POST['nombre'];
                            $marca = $_POST['marca'];
                            $tipodeunidad = $_POST['tipodeunidad'];
                            $cantidad = $_POST['cantidad'];
                        

                        $query = "UPDATE materiaprima set nombre = '$nombre', marca = '$marca', tipodeunidad = '$tipodeunidad'
                        
                        , cantidad = '$cantidad' WHERE idMateriaprima=$id";

                        mysqli_query($conn, $query);
                        $_SESSION['message'] = 'Actualización exitosa';
                        $_SESSION['message_type'] = 'warning';
                        header('Location: stock_materiaprima.php');
                        }


                        include 'includes/templates/head.php'

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

            <?php
            include 'includes/templates/sidebar.php'
            ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <?php
                include 'includes/templates/nav.php'
                ?>
            

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Stock de Materia prima</h1>



                    <?php
                    include 'includes/templates/nav_stock.php'
                    ?>


                        <?php
                        

                        ?>

                        
                        <form action="edit_materiaprima.php?idMateriaprima=<?php echo $_GET['idMateriaprima']; ?>" method="POST">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="<?php echo $nombre;?>" name="nombre" placeholder="Actualizar Nombre">
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label for="tipodeunidad">Tipo de Unidad</label>
                            <select name="tipodeunidad" class='form-control'>
                                    <option value="Seleccione">Seleccione</option>
                                    <option value="Kg"> Kg </option>
                                    <option value="Lt"> Lt </option>
                            </select>
                            </div>

                        </div>

                        
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="descripcion">Marca</label>
                                <input type="text" class="form-control" id="marca" value="<?php echo $marca;?>" name="marca" placeholder="Actualizar Marca">
                            </div>

                            <div class="form-group col-md-6">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" min="0" class="form-control" id="cantidad" value="<?php echo $cantidad;?>" name="cantidad" placeholder="Actualizar Cantidad">
                            </div>
                       
                            
                        </div>

                        <button type="submit" class="btn btn-primary" name="update_materiaprima">Actualizar</button>
                        </form>

                  

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <?php
    include 'includes/templates/logout_modal.php'
    ?>

    <?php
    include 'includes/templates/scripts.php'
    ?>

</body>

</html>