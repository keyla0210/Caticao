
<?php

include 'db.php';


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
                    include 'includes/templates/nav_stock.php';
                   
                    ?>

                        
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message']?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php session_unset(); } ?>


                        
                        <form  method="POST" action="save_producto.php" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="" name="nombre" placeholder="Nombre">
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
                            <input type="text" class="form-control" id="descripcion" value="" name="descripcion" placeholder="Descripción">
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" min="0" class="form-control" id="cantidad" value="" name="cantidad" placeholder="Cantidad">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio" value="" name="precio" placeholder="Precio">
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary" name="save_producto">Crear</button>
                        </form>

                        <br>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Productos
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-hover  table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Categoria</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Categoria</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         <?php

                                         $query = "SELECT * FROM producto";
                                         $resultado_producto = mysqli_query($conn,$query);


                                        while($row = mysqli_fetch_array($resultado_producto)){ ?>
                                         
                                         <tr>
   
                                             <td>
                                                <?php echo $row['nombre'] ?>
                                             </td>

                                             <td>
                                                <?php echo $row['descripcion'] ?>
                                             </td>

                                             <td>
                                             <?php echo $row['idCategoria'] ?>
                                             </td>
                                             
                                             <td>
                                                <?php echo $row['cantidad'] ?>
                                             </td>
                                             <td>
                                                <?php echo $row['precio'] ?>
                                             </td>
                                             <td>
                                                
                                             <a class="btn btn-warning" href="edit_producto.php?idProducto=<?php echo $row['idProducto'] ?>" >
                                             <i class="bi bi-pencil-square"></i>
                                             </a>
                                                
                                             </td>

                                             <td>
                                             <a class="btn btn-danger" href="delete_producto.php?idProducto=<?php echo $row['idProducto']?>" >
                                             <i class="bi bi-x-square"></i>
                                             </a>
                                             </td>
                                             
                                         </tr>
                                         
                                        <?php } ?>


                    
                                    </tbody>
                                </table>
                            </div>
                        </div>


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