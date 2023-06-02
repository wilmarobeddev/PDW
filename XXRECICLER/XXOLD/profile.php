<html lang="en">

<head>
    <?php
    include('include/header.php');
    include("conf/sessionstart.php");
    include("conf/connexion.php");
    $con = $conn;
    ?>


    <title>Profile</title>
</head>

<body>
    <!----INICIO DE CONTAINER FLUID ppal --->
    <div class="container-fluid" style="margin: auto; max-width: 100%; max-height:100%; padding: 0 10px;">
        <!-- contenido del contenedor aquí -->
        <!----INICIO DE DIV BANNER --->
        <?php include('include/banner.php'); ?>
        <!----FIN DE DIV BANNER --->
        <!----INICIO DE ROW ppal --->
        <!--<div class="container-fluid row" style="background-color: transparent; margin: 0; max-width: 100%; height: 79%; padding:0;"> -->
        <!--DIV 11 COLUMNAS PANEL CENTRO --->
        <div class="container-fluid col-11" style="background-color:white; margin: 0; max-width: 100%; max-height: 100%; padding:0; margin-top: 8px;">
            <!--DIV TITULOS PANEL CENTRO --->
            <div class="row container-fluid" style="background-color: rgb(32, 29, 29); padding:12px; margin:auto;">
                <div class="col-6 btn-group">
                    <a type="button" class="btn btn-warning" href="?" data-toggle="modal" data-target="#">PANEL CONFIGURACION PERFIL</a>
                </div>
            </div>
            <!--FIN DIV TITULOS--->

            <!-- Modales CRUD-->
            <div class="boxscrollhome">
                <?php
                if (isset($_SESSION['id'])) {
                    $userid = $_SESSION['id'];
                } else {
                    die("No se pudo obtener el ID de usuario.");
                }

                if (isset($_POST['postpw'])) {
                    $newpass = $_POST['newpass'];
                    $repeatpass2 = $_POST['repeatpass2'];


                    if (empty($newpass) || empty($repeatpass2)) {
                        $error = "La contraseña no puede estar vacía.";
                    } elseif ($newpass !== $repeatpass2) {
                        $error = "La contraseña y la repetición de la contraseña no coinciden.";
                    } else {
                        // Obtener la contraseña actual del usuario
                        $sql = "SELECT user_password_hash FROM users WHERE user_id=$userid";
                        $query = mysqli_query($con, $sql);
                        $result = mysqli_fetch_assoc($query);
                        $current_password_hash = $result['user_password_hash'];

                        // Verificar si la nueva contraseña es igual a la actual
                        if (password_verify($newpass, $current_password_hash)) {
                            $error = "La nueva contraseña no puede ser igual a la actual.";
                        } else {
                            // Hashear la nueva contraseña y actualizarla en la BD
                            $user_password_hash = password_hash($newpass, PASSWORD_DEFAULT);
                            $sql = "UPDATE users SET user_password_hash='$user_password_hash' WHERE user_id=$userid";
                            $querypass = mysqli_query($con, $sql);

                            if ($querypass) {
                                session_destroy(); // Cierra la sesión 
                                //sleep (1); 
                                $message = "La contraseña ha sido modificada con éxito.";
                            } else {
                                $error = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
                            }
                        }
                    }

                    if (isset($error)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!</strong> <?php echo $error; ?>
                        </div>
                    <?php
                    }

                    if (isset($message)) { ?>
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡Bien hecho!</strong> <?php echo $message;
                                                            ?>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="container">
                    <div class="row">
                    <div class="container col-12" style="margin-top:5%;"> </div>
                        <div class="col-4"> </div>
                        <div class="col-4">
                            <form class="form alert alert-warning" action="" method="POST" role="form">
                                <div class="alert alert-warning" style="background-color:orange; color:white; ">
                                    <center><span class="glyphicon glyphicon-user"></span> </button>
                                        <?php
                                        echo "Hola " . $saludo ?>
                                        <br>
                                        Aqui puedes cambiar tu contraseña!
                                    </center>
                                </div>
                                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                                <div class="form-group content-justify">
                                    <label for="">New Password</label>
                                    <input class="form-control col" required type="password" name="newpass" pattern=".{6,}" title="New Password ( min . 6 caracteres)">
                                    <br>
                                    <label for="">Repetir Password</label>
                                    <input class="form-control col" required type="password" name="repeatpass2" pattern=".{6,}" title="Repite Password ( min . 6 caracteres)">
                                </div>
                                <center><input Class="btn btn-warning" name="postpw" type="submit" value="Cambiar contraseña"></center>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 8px;"></div>
    <!----FIN DE ROW ppal --->
    <!----DIV DE FOOTER ppal --->
    <?php include("include/footer.php"); ?>
    <!----FIN DIV DE FOOTER--->

    </div>
    <!----FIN DE CONTAINER FLUID MAYOR--->
</body>

</html>