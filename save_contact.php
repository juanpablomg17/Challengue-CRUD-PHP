<?php 
// me traigo la variable de conexión
include("db.php");

if (isset($_POST['save_contact'])) {
    
    $name = $_POST['name-contact'];
    $phone = $_POST['phone-contact'];
    $email = $_POST['email-contact'];
    $adress = $_POST['adress-contact'];

    // defino la consulta, en este caso un insert
    $query = "INSERT INTO contact(name,phone,email,adress) VALUES ('$name','$phone','$email','$adress')";

    // esta es la libreria
    $result = mysqli_query($conn, $query);
    if (!$result){
      die("Query Failed");
    }

    $_SESSION['message'] = 'Contact Saved Succesfully';
    $_SESSION['message-type'] = 'success';
    // con esto se redirecciona
    header("Location: index.php");

  }

  ?>
