<?php
    include("db.php");



    // isset = si existe
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM contact WHERE id = $id";
        $result = mysqli_query($conn,$query);

        if (!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = "Contact remove successfully";
        $_SESSION['message-type'] = "danger";
        header("Location: index.php");


    }


?>

<!-- 
NOTA: LA LIBRERÍA QUE PERMITE EJECUTAR LA CONSULTA ES SIMILAR QUE AL DE JAVA Y RECIBE DOS PARÁMETRO, EL PRIMERO ES EL OBJETO DE CONEXIÓN Y EL SEGUNDO ES EL QUERY O SENTENCIA SQL -->