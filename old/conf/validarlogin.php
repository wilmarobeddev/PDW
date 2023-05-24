<?php
require("connexion.php");
$message = "";
if (count($_POST) > 0) {
    $isSuccess = 0;
    $userName = $_POST['userName'];
    $email = $_POST['userName'];
    $sql = "SELECT * FROM users WHERE user_name = ? OR user_email = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ss', $userName, $email);
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
                $nombrecompleto = $nombre." ".$apellido;
            }
        }
    }
    if ($isSuccess == 0) {
        $message = "Usuario o Contraseña Invalido!";
    } else {
        session_start();
        $_SESSION["loginuser"] = $userName;
        $_SESSION["rol"] = $user_role;
        $_SESSION["nombrecompleto"] = $nombrecompleto;
        $_SESSION["id"] = $userid;
        header("Location:  ./home.php");
    }
}

?>
