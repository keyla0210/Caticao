
<?php


include("db.php");
                        $nombre = '';
                        $idCategoria='';
                        $descripcion= '';
                        $cantidad= '';
                        $precio= '';
                        

                        if  (isset($_GET['idProducto'])) {
                        $id = $_GET['idProducto'];
                        $query = "SELECT * FROM producto WHERE idProducto=$id";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_array($result);
                            $nombre = $row['nombre'];
                            $descripcion = $row['descripcion'];
                            $idCategoria = $row['idCategoria'];
                            $cantidad = $row['cantidad'];
                            $precio = $row['precio'];
                        }
                        }

                        if (isset($_POST['update_producto'])) {

                            $id = $_GET['idProducto'];
                            $nombre = $_POST['nombre'];
                            $descripcion = $_POST['descripcion'];
                            $idCategoria = $_POST['idCategoria'];
                            $cantidad = $_POST['cantidad'];
                            $precio = $_POST['precio'];

                        $query = "UPDATE producto set nombre = '$nombre', descripcion = '$descripcion', idCategoria = '$idCategoria',  cantidad = '$cantidad', precio = '$precio' WHERE idProducto=$id";
                        mysqli_query($conn, $query);
                        $_SESSION['message'] = 'Actualización exitosa';
                        $_SESSION['message_type'] = 'warning';
                        header('Location: stock_producto.php');
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
                    <h1 class="h3 mb-4 text-gray-800 text-center">Stock de Productos</h1>



                    <?php
                    include 'includes/templates/nav_stock.php'
                    ?>


                        <?php
                        

                        ?>

                        
                        <form action="edit_producto.php?idProducto=<?php echo $_GET['idProducto']; ?>" method="POST">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="<?php echo $nombre;?>" name="nombre" placeholder="Actualizar Nombre">
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label for="categoria">Categoría</label>
                            <select name="idCategoria" class='form-control'>
                                    <option value="Seleccione">Seleccione</option>
                                    <option value="Dulce"> Dulce </option>
                                    <option value="Semidulce">  Semidulce </option>
                            </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" value="<?php echo $descripcion;?>" name="descripcion" placeholder="Actualizar Descripción">
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" min="0" class="form-control" id="cantidad" value="<?php echo $cantidad;?>" name="cantidad" placeholder="Actualizar Cantidad">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio" value="<?php echo $precio;?>" name="precio" placeholder="Actualizar Precio">
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary" name="update_producto">Actualizar</button>
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