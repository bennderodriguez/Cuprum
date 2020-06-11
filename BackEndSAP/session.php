<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $globalIdiUsurio = $_SESSION['idiuser'];
    $globalIdirole = $_SESSION['idirole'];
    $globaEmail = $_SESSION['email'];
    $globalIdiUsurio = $_SESSION['idiuser'];
    $globalNombre = $_SESSION['nombre'];
    $edit = $_SESSION['edit'];
    $role = $_SESSION['role'];
} else {
    ?> 
    <script>
        alert('La sesion ha expirado');
        location.href = "index.php";
    </script>
    <?php

}

$now = time();
//si el tiempo de la session se ha excedido termina
if ($now > $_SESSION['expire']) {
    session_destroy();
//    echo " You are not logged in ";
//    // header("Location: index.php");
//    echo '<a href="index.php">Back to Login</a>';
//    exit;
    ?> 
    <script>
        alert('La sesion ha expirado');
        location.href = "index.php";
    </script>
    <?php

}
?>
