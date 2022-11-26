<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//usuario fixphoneni4489_Luis
//Database fixphoneni4489_turnapp

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$consulta = "SELECT ID_TipoUsuario,ID_Doctor,INSS FROM usuario WHERE INSS='$usuario' AND pass='$pass' OR ID_Doctor='$usuario' AND pass='$pass'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

$resultado->execute();
$tipo_usuario=$resultado->fetchColumn(0);

$resultado->execute();
$paciente=$resultado->fetchColumn(2);

$resultado->execute();
$doctor=$resultado->fetchColumn(1);


if($tipo_usuario==2){
    $consulta2 = "SELECT Nombre1,Apellido1 FROM paciente WHERE INSS='$paciente'";
    $resultado2 = $conexion->prepare($consulta2);

    $resultado2->execute();
    $nombrepaciente=$resultado2->fetchAll(PDO::FETCH_COLUMN, 0);

    $resultado2->execute();
    $apellidopaciente=$resultado2->fetchAll(PDO::FETCH_COLUMN, 1);

    $fullpaciente=implode(", ",$nombrepaciente)." ".implode(", ",$apellidopaciente);

}elseif (($tipo_usuario==1)||($tipo_usuario==3)){
    $consulta2 = "SELECT Nombre1,Apellido1 FROM doctor WHERE ID_Doctor='$doctor'";
    $resultado2 = $conexion->prepare($consulta2);

    $resultado2->execute();
    $nombredoctor=$resultado2->fetchAll(PDO::FETCH_COLUMN, 0);

    $resultado2->execute();
    $apellidodoctor=$resultado2->fetchAll(PDO::FETCH_COLUMN, 1);

    $fulldoctor=implode(", ",$nombredoctor)." ".implode(", ",$apellidodoctor);
}

if($resultado->rowCount() >= 1){
    $data = $tipo_usuario;   
    
    if($tipo_usuario==2){
        $_SESSION["s_usuario"] = $fullpaciente;
        $_SESSION["INSS"]=$paciente;
    }elseif ($tipo_usuario==3){
        $_SESSION["s_usuario"] = $fulldoctor;
        $_SESSION["IDDOCTOR"]=$doctor;
    }elseif($tipo_usuario==1){
        $_SESSION["s_usuario"] = $fulldoctor;
        $_SESSION["IDDOCTOR"]=$doctor;
    }
    
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data);
$conexion=null;

