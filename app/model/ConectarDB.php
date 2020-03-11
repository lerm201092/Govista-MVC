<?php
    Class ConectarDB{
        public static function conexion(){
            try {
                $conexion = new PDO('mysql:host=localhost;dbname=govista', 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec('SET NAMES utf8');
            }catch (mysqli_sql_exception $e) {
                throw $e;
            }
            return $conexion;
        }
    }    
?>