<?php
if (!isset($conn)) {
    require_once('../conf/connexion.php');
    require_once('../include/header.php');
    //$saludo = $_SESSION["nombrecompleto"];
}

    $nombre = mysqli_real_escape_string($conn, $_POST['firstname']);
    $apellido = mysqli_real_escape_string($conn, $_POST['lastname']);
    $usuario = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $rol = mysqli_real_escape_string($conn, $_POST['id_tipo']);
    $dateadd = mysqli_real_escape_string($conn, $_POST['date_added']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $pass = mysqli_real_escape_string($conn, $_POST['user_password_hash']);
    $pass_cifrado = password_hash($pass, PASSWORD_DEFAULT);

    $sqlexist = "select * from users where user_name='$usuario'";
    $result1 = mysqli_query($conn, $sqlexist);

    if ($result1 && mysqli_num_rows($result1) == 0) {
        $sql = "insert into users (firstname,lastname,user_name,user_password_hash,user_email,id_tipo,date_added,estado,intentos) values ('$nombre','$apellido','$usuario','$pass_cifrado','$email','$rol','$dateadd','$estado',0)";
        try {
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $respuesta = "1";
            } else {
                $respuesta = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
            }
        } catch (Exception $e) {
            $respuesta = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.". $e->getMessage(); 
        }
    } else {
        $respuesta = "Usuario ya existe!";
    }


//<!---------------VALIDO PROCESAEDITAR --------->

if (isset($_POST['procesaeditar'])) {

    $nombre = $_POST['firstname'];
    $apellido = $_POST['lastname'];
    $usuario = $_POST['user_name'];
    $email = $_POST['user_email'];
    $rol = $_POST['id_tipo'];
    $dateadd = $_POST['date_added'];
    $estado = $_POST['estado'];


    $sql = "update users set firstname = '$nombre', lastname = '$apellido', user_name='$usuario',user_email = '$email',id_tipo = '$rol',estado='$estado' where user_id = " . $_POST['id'];
    $result = mysqli_query($conn, $sql);

    if (isset($result)) {
        $sucessmsj = " Se ha registrado con éxito, ahora puede ingresar con sus credenciales.";
    } else if (!isset($result)) {
        $alerterror = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
    } else {
        $alerterror = "Error Desconocido!";
    }

    if (isset($alerterror)) {

    ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong>
            <?php
            echo $alerterror;
            ?>
        </div>
    <?php
    }
    if (isset($sucessmsj)) {

    ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Bien hecho!</strong>
            <?php
            echo $sucessmsj;
            ?>
        </div>
<?php
    }
}


?>