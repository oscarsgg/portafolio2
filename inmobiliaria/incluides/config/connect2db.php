<?php
    function connect2db(): mysqli{
        $db = mysqli_connect("localhost", "root", "", "BienesRaices");

        if ($db) {
            echo  "Conectado a la base de datos";
        } else {
            echo "Error al conectar a la base de datos";
        }
        return $db;
    }
?>