<?php
    class Conexion{

        //usuario fixphoneni4489_Luis
        //Database fixphoneni4489_turnapp
        public static function Conectar(){
            define('servidor','localhost');
            define('nombre_bd','turnapp');
            define('usuario','root');
            define('password','');
            $opciones=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

            try{
                $conexion=new PDO("mysql:host=".servidor."; dbname=".nombre_bd,usuario,password,$opciones);
                return $conexion;
            }catch(exception $e){
                die("Error de conexion".$e->getMessage());
            }
        }
    }
?>