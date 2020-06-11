<?php

//error_reporting(0);
$errorMSG = "";
//Nombre
if (empty($_POST["usuario"])) {
    $errorMSG .= "usuario is required ";
} else {
    $usuario = $_POST["usuario"];
}
//Nombre
if (empty($_POST["Password"])) {
    $errorMSG .= "Password is required ";
} else {
    $Password = $_POST["Password"];
}

if ($errorMSG == "") {
    include '../dataConect/conexion.php';
    //$sql = "SELECT * FROM user where user = '" . $usuario . "' and password = '" . $Password . "'";
    //$sql = "SELECT Nombre, apellido_paterno, apellido_materno, idiuser, idirole , email , nombre FROM user where estatus='Activo' and user = '" . xss($usuario) . "' and password = '" . xss($Password) . "'";
    $sql = "SELECT
            user.idiuser,
            user.Nombre,
            user.apellido_paterno,
            user.apellido_materno,
            user.user,
            user.password,
            user.email,
            user.fecha,
            user.estatus,
            user.categoria,
            role.idirole,
            role.role,
            role.edit 
            FROM
            user
            INNER JOIN role ON user.idirole = role.idirole 
            WHERE
            user.user = '$usuario' 
            AND user.password = '$Password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // output data of each row
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (1000000 * 1000000);
        while ($row = $result->fetch_assoc()) {
            $_SESSION['idiuser'] = $row["idiuser"];
            $_SESSION['idirole'] = $row["idirole"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['edit'] = $row["edit"];
            $_SESSION['role'] = $row["role"];
            $_SESSION['nombre'] = $row["Nombre"] . ' ' . $row["apellido_paterno"] . ' ' . $row["apellido_materno"];
        }

        $userid = $_SESSION['idiuser'];
        bitacoraAcceso($userid);
        print_r("success");
    } else {
        print_r("Datos Incorrectos");
    }
    $conn->close();
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

function bitacoraAcceso($userid) {
    include '../dataConect/conexion.php';
    $adress = getUserIP();
    $sql = "INSERT INTO tbBitacoraAcceso (idiusuario, adress) VALUES ('$userid', '$adress')";
    if ($conn->query($sql) === TRUE) {
        //echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function xss($data) {
    $data = htmlspecialchars(addslashes(stripslashes(strip_tags(trim($data)))));
    return $data;
}

// Function to get the user IP address
function getUserIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
