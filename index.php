<?php
    require_once 'inc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'inc/header.php'; ?>
<body>
    <div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                <h1>Bienvenido a mi App</h1>
                    <p>
                        <a href="login.php" class="link-item">Iniciar sesion</a>
                        <a href="registro.php" class="link-item">Registro</a>
                    </p>
                </article>
            </div>
        </div>
    </div>
    <?php require 'inc/footer.php'; ?>
    </body>
</html>