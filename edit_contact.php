<?php include('db.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $querySelect = "SELECT * FROM contact WHERE id=$id";
    $result = mysqli_query($conn, $querySelect);

    //mysqli_num_rows esto sirve para comprobar cuantas filas tiene el resultado
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $adress = $row['adress'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];


    $query = "UPDATE contact set  name= '$name', phone = '$phone', email = '$email', adress='$adress' WHERE id=$id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Contact Updated Succesfully';
    $_SESSION['message-type'] = 'warning';
    header('Location: index.php');
}



?>

<?php include("./includes/Header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_contact.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="name" value="<?php echo $name ?>" class="form-control" placeholder="Update Name" />
                    </div>

                    <div class="form-group mb-3">
                        <input type="number" name="phone" value="<?php echo $phone ?>" class="form-control" placeholder="Update phone" />
                    </div>

                    <div class="form-group mb-3">
                        <input type="email" name="email" value="<?php echo $email ?>" class="form-control" placeholder="Update email" />
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="adress" value="<?php echo $adress ?>" class="form-control" placeholder="Update adress" />
                    </div>

                    <button name="update" class="btn btn-success btn-block" value="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("./includes/Footer.php"); ?>