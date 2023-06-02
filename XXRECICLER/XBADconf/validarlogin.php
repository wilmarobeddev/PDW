<?php
require("connexion.php");
$message = "";
if (count($_POST) > 0) {
    $isSuccess = 0;
    $userName = $_POST['userName'];
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $userName);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (!empty($row)) {
            $hashedPassword = $row["user_password_hash"];
            if (password_verify($_POST["password"], $hashedPassword)) {
                $isSuccess = 1;
                $user_role = $row["id_tipo"];
                $nombre = $row["firstname"];
                $apellido = $row["lastname"];
                $userid = $row["user_id"];
                $nombrecompleto = $nombre . " " . $apellido;
                
                // Verificar el estado del usuario
                $estado = $row["estado"];
                if ($estado == "Activo") {
                    // Usuario activo, continuar con el inicio de sesión
                    session_start();
                    $_SESSION["loginuser"] = $userName;
                    $_SESSION["rol"] = $user_role;
                    $_SESSION["nombrecompleto"] = $nombrecompleto;
                    $_SESSION["id"] = $userid;
                    header("Location: ./home.php");
                } else {
                    // Usuario inactivo, mostrar mensaje de error
                    $message = "El usuario está inactivo. Contacta al administrador para obtener acceso.";
                }
            }
        }
    }
    if ($isSuccess == 0) {
        $message = "Usuario o Contraseña Invalido!";
    }
}

?>
