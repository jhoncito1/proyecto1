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
                <h4 class="card-title mb-4 mt-1 text-center">Registro</h4>
                    <form action="POST" class="form_registro">
                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="correo" class="form-control" placeholder="Correo" require>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" placeholder="******">
                        </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </div>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none">Error</div>
                </article>
            </div>
        </div>
    </div>
    <?php require 'inc/footer.php'; ?>
    </body>
</html>