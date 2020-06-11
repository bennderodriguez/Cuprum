<?php

/**
 * Description of ucp
 *
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
class ucp {

    public function __construct() {
        date_default_timezone_set('America/Mexico_City');
        error_reporting(0);
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta             
                $action = $_GET['action'];
                if ($action == 'getOferta') {
                    $this->getOferta();
                }
                if ($action == 'cMedioContacto') {
                    $this->cMedioContacto();
                }
                break;
            case 'POST'://inserta
                $action = $_POST['action'];
                if ($action == 'addDatosGenerales') {
                    $this->addDatosGenerales();
                }
                break;
            case 'PUT':
                echo 'METODO NO SOPORTADO';
                break;
            case 'DELETE'://elimina
                echo 'METODO NO SOPORTADO';
                break;
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

    /**
     * getOferta()
     * consulta la table de ccarrera
     */
    function getOferta() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM carrera ORDER BY carrera.nivel ASC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function cMedioContacto() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cMedioContacto";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
// output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    /**
     * addDatosGenerales()
     * Agrega un registro a la tabla de datos Generales
     * @param type $estatus
     * @param type $nombre required
     * @param type $apellidos required
     * @param type $genero
     * @param type $edad
     * @param type $curp required unique
     * @param type $rfc unique
     * @param type $email
     * @param type $telefono
     * @param type $movil
     * @param type $email2
     * @param type $pais
     * @param type $ciudad
     * @param type $direccion
     * @param type $municipio
     * @param type $cp
     * @param type $escegreso
     * @param type $nivelegreso
     * @param type $fechaegreso
     * @param type $infoadicional
     * @param type $tiposangre
     * @param type $alergias
     * @param type $fecha_nacimiento
     */
    function addDatosGenerales() {
        $errorMSG = "";
        //estatus
        $estatus = "pre-inscrito";
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellidos
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = "";
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
        //genero
        if (empty($_POST["genero"])) {
            $genero = "";
        } else {
            $genero = $_POST["genero"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $edad = "18";
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = "";
        } else {
            $curp = $_POST["curp"];
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = "";
        } else {
            $rfc = $_POST["rfc"];
        }
        //nss
        if (empty($_POST["nss"])) {
            $nss = "";
        } else {
            $nss = $_POST["nss"];
        }
        //email
        if (empty($_POST["email"])) {
            $email = "";
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = "";
        } else {
            $movil = $_POST["movil"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = "";
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = "";
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //num
        if (empty($_POST["num"])) {
            $num = "";
        } else {
            $num = "#" . $_POST["num"] . " ";
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = "";
        } else {
            $municipio = $_POST["municipio"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //escegreso
        if (empty($_POST["escegreso"])) {
            $escegreso = "";
        } else {
            $escegreso = $_POST["escegreso"];
        }
        //nivelegreso
        if (empty($_POST["nivelegreso"])) {
            $nivelegreso = "";
        } else {
            $nivelegreso = $_POST["nivelegreso"];
        }
        //fechaegreso
        if (empty($_POST["fechaegreso"])) {
            $fechaegreso = "1999";
        } else {
             $fechaegreso = "1999";
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = "";
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = "";
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = "";
        } else {
            $alergias = $_POST["alergias"];
        }
        //fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = date("Y/m/d");
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //interes
        if (empty($_POST["interes"])) {
            $interes = "";
        } else {
            $interes = $_POST["interes"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $turno = "";
        } else {
            $turno = $_POST["turno"];
        }
        //emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = "";
        } else {
            $emergencias = $_POST["emergencias"];
        }
        


        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO datos_generales (estatus, nombre, apellido_paterno, apellido_materno, genero, edad, curp, rfc, nss, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, escegreso, nivelegreso, fechaegreso, infoadicional, tiposangre, alergias, fecha_nacimiento, interes, turno, emergencias) VALUES "
                    . "                         ('" . $estatus . "', '" . strtoupper($nombre) . "', '" . strtoupper($apellido_paterno) . "', '" . strtoupper($apellido_materno) . "','" . $genero . "', '" . $edad . "', '" . $curp . "', '" . $rfc . "', '" . $nss . "','" . $email . "', '" . $telefono . "', '" . $movil . "', '" . $email2 . "', '" . $pais . "', '" . $ciudad . "', '" . $num . $direccion . "', '" . $municipio . "', '" . $cp . "', '" . $escegreso . "', '" . $nivelegreso . "', '" . $fechaegreso . "', '" . $infoadicional . "', '" . $tiposangre . "', '" . $alergias . "', '" . $fecha_nacimiento . "','" . $interes . "','" . $turno . "', '" . $emergencias . "');";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

}

$api = new ucp();

