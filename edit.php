<?php 
    include('db.php');


    if(isset($_POST['edit'])){


        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $description = $_POST['description'];

        $queryEdit = "UPDATE `tareas` SET `titulo`='$titulo',`description`='$description' WHERE `id` = $id";
        $result = mysqli_query($conn,$queryEdit);

    if(!$result){

        $_SESSION['message'] = 'Algo anduvo Mal!';
        $_SESSION['type_message'] = 'danger';


    }else{
        $_SESSION['message'] = 'Tarea Editada Correctamente.';
        $_SESSION['type_message'] = 'success';

    }
    header('Location:index.php');


    }else{

        $id = $_GET['id'];
        $query = "SELECT * FROM `tareas` WHERE `id` = $id"; 
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) == 1){

            $dato = mysqli_fetch_array($result);

        }
}



    
    

?>

<?php include('fijos/header.php')?>


<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Editar una Tarea.</h3>
                    </div>
                    <div class="card-body">
                        <form action="edit.php?id=<?php echo $dato['id']; ?>" method="POST">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo de la Tarea</label>
                                <input type="text" class="form-control" value="<?php echo $dato['titulo']?> " id="titulo" name="titulo" placeholder="Cualquier Cosa">
                            </div>
                            <div class="mb-3">
                                <label for="descrition" class="form-label">Describir tarea</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Detalle de la Tarea"><?php echo $dato['description']?> </textarea>
                            </div>
                            <div class="row">
                                <div class="col-5 mx-auto text-center">
                                    <button type="submit" name="edit" class="btn btn-primary mx-auto w-100">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>

<?php include('fijos/footer.php')?>
