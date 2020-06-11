<?php


/**
 * Created: 20/08/2018
 * Abstract: mapea las peticiones recibidas en la aplicacion y las guarda 
 * en un archivo resources/trace.json el cual sirve como historial en la aplicación
 * America/Mexico_City
 */
$trace = new trace();

class trace {

    public function __construct() {
        //$_POST
        $Data = null;
        $headers = apache_request_headers();
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta
                //echo 'GET';
                $Data = $_GET;
                break;
            case 'POST'://inserta
                //echo 'success';
                $Data = $_POST;
                break;
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }

        $DataRequest = [
                [
                "DATE" => date("Y-m-d h:i:sa"),
                "REMOTE_ADDR" => $_SERVER['REMOTE_ADDR'],
                "REQUEST_URI" => $_SERVER['REQUEST_URI'],
                "REQUEST_METHOD" => $_SERVER['REQUEST_METHOD'],
                "REQUEST_TIME" => $_SERVER['REQUEST_TIME'],
                "DATA" => $Data,
                "HEADER" => $headers
            ]
        ];
        // Convert Array to JSON String
        $someJSON = json_encode($DataRequest, JSON_UNESCAPED_UNICODE);
        //echo $someJSON;
        $nombre_archivo = 'trace.json';
        $contenido = $someJSON;
        try {
            // Primero vamos a asegurarnos de que el archivo existe y es escribible.
            if (is_writable($nombre_archivo)) {
                // En nuestro ejemplo estamos abriendo $nombre_archivo en modo de adición.
                // El puntero al archivo está al final del archivo
                // donde irá $contenido cuando usemos fwrite() sobre él.
                if (!$gestor = fopen($nombre_archivo, 'a')) {
                    //echo "No se puede abrir el archivo ($nombre_archivo)";
                    exit;
                }
                // Escribir $contenido a nuestro archivo abierto.
                //Sin truncar contenido previo
                if (fwrite($gestor, $contenido) === FALSE) {
                    //echo "No se puede escribir en el archivo ($nombre_archivo)";
                    //No existe el archivo
                    exit;
                }
                //echo "Éxito, se escribió ($contenido) en el archivo ($nombre_archivo)";
                fclose($gestor);
            } else {
                //Si no existe Crea un archivo nuevo
                $NewJsonHistory = fopen("trace.json", "w") or die("Unable to open file!");
                //Escribimos el contenido
                fwrite($NewJsonHistory, $someJSON);
                fclose($NewJsonHistory);
                //echo 'se creo archivo';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        try {
            /*
             * Reemplaza ][ por , para que el json resultante no tenga errores
             * abrimos resources/trace.json original
             */
            $text_replace = fopen("trace.json", "r") or die("Unable to open file!");
            $jsonoriginal = fread($text_replace, filesize("trace.json"));
            fclose($text_replace);
            //Lee el texto y reemplaza ][ por ,
            $resultado = str_replace("}][{", "},{", $jsonoriginal, $contador);
            $replaceJsonParse = fopen("trace.json", "w") or die("Unable to open file!");
            fwrite($replaceJsonParse, $resultado);
            fclose($replaceJsonParse);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
