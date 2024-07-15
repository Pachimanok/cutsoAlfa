<?php
    include('db.php');

    $titulo = $_POST['titulo'];
    $description = $_POST['description'];

    /* consulta  */
    $query = "INSERT INTO `tareas`( `titulo`, `description`) VALUES ('$titulo','$description')";
    $result = mysqli_query($conn,$query);

    if(!$result){

        $_SESSION['message'] = 'Algo anduvo Mal!';
        $_SESSION['type_message'] = 'danger';


    }else{
        $_SESSION['message'] = 'Tarea Guardada Correctamente.';
        $_SESSION['type_message'] = 'success';

    }
    header('Location:index.php');
    


?>