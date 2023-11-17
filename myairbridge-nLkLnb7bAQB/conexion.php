<?php
class Conexion{
    public function Conectar(){
        define("host","localhost:3333");
        define("usuario","root");
        define("psw","");
        define("db","quinto");
        //esta linea es para q reconozca caracteres como la "ñ" xd
        $opc=array(PDO::MYSQL_ATTR_INIT_COMMAND>'SET NAMES utf8');
        try{
            $conexion = new PDO("mysql:host=".host.";dbname=".db,usuario,psw,$opc);
            return $conexion;
        }catch(PDOException $e){
            die("Error en la conexion. . .".$e->getMessage().". . .");
        }
    }
}
?>