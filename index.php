<?php include('fijos/header.php');?>
<?php include('db.php');?>
    <div class="container">
        <div class="row">
            <h1 class="text-center text-primary pt-3">Todo List</h1>
            <?php if(isset($_SESSION['message'])){ ?>

            <div class="alert alert-<?php echo $_SESSION['type_message'];?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset();} ?>

        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Crear una Tarea [C].</h3>
                    </div>
                    <div class="card-body">
                        <form action="save.php" method="POST">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo de la Tarea</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Cualquier Cosa">
                            </div>
                            <div class="mb-3">
                                <label for="descrition" class="form-label">Describir tarea</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Detalle de la Tarea"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-5 mx-auto text-center">
                                    <button type="submit" class="btn btn-primary mx-auto w-100">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Tareas por hacer. [RUD]</h3>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tarea</th>
                            <th scope="col">Description</th>
                            <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM `tareas`";
                            $result_tarea = mysqli_query($conn,$query);
                            
                            while( $row = mysqli_fetch_assoc($result_tarea)){
                            ?>
                            <tr>
                            <th scope="row"><?php echo $row['id'];?></th>
                            <td><?php echo $row['titulo'];?></td>
                            <td><?php echo $row['description'];?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

                            </td>
                            </tr>
                            
                            <?php }?>
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>



    </div>

  <?php include('fijos/footer.php');