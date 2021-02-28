<?php include("db.php") ?>

<!-- ESTA ES LA CABEZA DE MI CÓDIGO, NO ES EL HEADER DE LA PÁGINA -->
<?php include("./includes/Header.php") ?>

<link rel="stylesheet" href="assets/styles/index.css">
<script src="./js/validar.js"></script>
<!-- DATA: name, phone, email and adress -->
<div class="container p-4">
    <div class=row>

        <div class="col-md-4 col-sm-12 mr-5">

            <!-- este es el mensaje efectivo que se muestra con bootstrap -->

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message-type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>

            <!-- El session_unset puede limpiar los datos que tenemos en sesión -->

            <div class=card>
                <div class="card-header bg-secondary">
                    <h2 class=" text-light text-center">Contact Form</h2>
                </div>
                <div class="card-body">
                    <form action='save_contact.php' method="POST" onsubmit="return validar();">

                        <div class="form-group mb-3">
                            <input type="text" id="name-contact" name="name-contact" class="form-control" placeholder="Type your name" autofocus />
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" id="phone-contact" name="phone-contact" class="form-control" placeholder="Type your cellphone number" />
                        </div>

                        <div class="form-group mb-3">
                            <input id="email-contact" name="email-contact" class="form-control" placeholder="Type your email" />
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" id="adress-contact" name="adress-contact" class="form-control" placeholder="Type your adress" />
                        </div>

                        <input type="submit" id="btn-save" name="save_contact" class="btn btn-success btn-block" value="Save Contact">

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-12 ml-5">
            <h2 class="card-header mb-3 bg-secondary text-light text-center">Contact List</h2>
            <div class="container_table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Adress</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM contact";
                        $result_contacts = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result_contacts)) { ?>
                            <tr>
                                <td> <?php echo $row['name'] ?> </td>
                                <td> <?php echo $row['phone'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['adress'] ?></td>
                                <td>
                                    <a href="edit_contact.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="delete_contact.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                        <?php }  ?>






                    </tbody>
                </table>


            </div>


        </div>
    </div>
</div>



<!-- ESTE ES EL FOOTER DE MI CÓDIGO, NO ES EL FOOTER DE LA PÁGINA -->
<?php include("./includes/Footer.php") ?>