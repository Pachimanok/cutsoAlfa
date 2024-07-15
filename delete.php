<?php 
    include('db.php');

        $id = $_GET['id'];

    $query = "DELETE FROM `tareas` WHERE `id` = $id";
    $result = mysqli_query($conn,$query);

    if(!$result){

        $_SESSION['message'] = 'Algo anduvo Mal!';
        $_SESSION['type_message'] = 'danger';


    }else{
        $_SESSION['message'] = 'Tarea Eliminada Correctamente.';
        $_SESSION['type_message'] = 'success';

    }
    header('Location:index.php');

