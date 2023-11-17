<?php
include_once('Conexion.php');
class crud
{

    public function obtenerEstudiantes()
    {
        $objeto = new conexion();
        $conexion = $objeto->Conectar();

        $seleccion1 = "SELECT * FROM estudiantes";
        $resultado1 = $conexion->prepare($seleccion1);
        $resultado1->execute();
        $data1 = $resultado1->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data1);
    }
    public function guardarEstudiante()
    {
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $objeto = new Conexion();
        $conectar = $objeto->Conectar();
        $insertarSQL = "INSERT INTO estudiantes(cedula, nombre, apellido, direccion, telefono) VALUES('$cedula','$nombre','$apellido','$direccion','$telefono')";
        $resultado = $conectar->prepare($insertarSQL);
        $resultado->execute();
        echo json_encode($_POST);
        echo $insertarSQL;
        echo json_encode("se guardo");
        $conectar->commit();
    }
    public function eliminarEstudiante($cedula)
    {
        $objeto2 = new Conexion();
        $conectar = $objeto2->Conectar();
        $borrarSql = "DELETE FROM estudiantes WHERE cedula='$cedula'";
        $resultado = $conectar->prepare($borrarSql);
        $resultado->execute();
        echo json_encode($resultado);
        $conectar->commit();
    }

    public function actualizarEstudiante($cedula, $nombre, $apellido, $direccion, $telefono)
    {
        $conexion = new conexion();
        $conectar = $conexion->Conectar();
        $consulta = "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono' WHERE cedula='$cedula'";
        $respuesta = $conectar->query($consulta);
        $resultado = $conectar->prepare($consulta);
        $resultado->execute();
        echo json_encode($resultado);
        $conectar->commit();
    }
}


