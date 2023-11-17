<?php
include_once('crud.php');

$crud = new crud();
$opc = $_SERVER["REQUEST_METHOD"];
switch ($opc) {
    case "GET":
        $crud->obtenerEstudiantes();
        break;
    case "POST":
        $crud->guardarEstudiante();
        break;
    case "PUT":
        parse_str(file_get_contents('php://input'), $putData);
        $cedula = $putData['cedula'];
        $nombre = $putData['nombre'];
        $apellido = $putData['apellido'];
        $direccion = $putData['direccion'];
        $telefono = $putData['telefono'];
        $crud->actualizarEstudiante($cedula, $nombre, $apellido, $direccion, $telefono);
        break;

    case "DELETE":
        $var = $_GET["cedula"];
        $crud->eliminarEstudiante($var);
        break;
}
