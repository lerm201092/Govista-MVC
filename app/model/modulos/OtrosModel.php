<?php

    Class OtrosModel{
        private $db;
        private $resp;
        private $empresa;
        public function __construct(){
            if(!isset($_SESSION)){ session_start(); } 
            $this->db = ConectarDB::conexion();
            $this->resp = array();
        }

        public function Guardar_Registros( $tabla, $parametros){
            $this->resp = array();
            $aux = Self::config_Crear($parametros);
            $consulta = "INSERT INTO ".$tabla." (".$aux["campos"] .") VALUES (".$aux["valor"].")";
            $stmt = $this->db->prepare($consulta);
            try{
                $stmt->execute();
                $this->resp = "OK";
            }catch(PDOException $e){
                return $e;
            }
            return $this->resp;        
        }

        public function Editar_Registros( $tabla, $parametros){
            $this->resp = array();
            $aux = Self::config_editar($parametros);
            $consulta = "UPDATE ".$tabla." SET".$aux["set"]." WHERE id = ".$aux["id"];
            $stmt = $this->db->prepare($consulta);
            try{
                $stmt->execute();
                $this->resp = "OK";
            }catch(PDOException $e){
                return $e;
            }
            return $this->resp;        
        }

        public function Eliminar_Registros( $tabla, $id ){
            $this->resp = array();
            $consulta = "DELETE FROM ".$tabla." WHERE id = ".$id;
            $stmt = $this->db->prepare($consulta);
            try{
                $stmt->execute();
                $this->resp = "OK";
            }catch(PDOException $e){
                return $e;
            }
            return $this->resp;        
        }

        public function Listar_Registros(  $campos = null,  $tabla = null, $condicion = null, $offset = null ){
            $this->resp = array();
            $consulta = "SELECT ".($campos ?? '*')." FROM ".$tabla." ".Self::Condicionales($condicion)." ORDER BY id DESC ".( $offset >= 0 ? "LIMIT 15 OFFSET ".$offset : "");
            $stmt = $this->db ->prepare($consulta);
            try { 
                $total = 0;
                $stmt->execute();
                while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $this->resp[] = $arr;
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return  $this->resp;
        }

        public function Valor_Campo(  $campo = null,  $tabla = null, $condicion = null ){
            $this->resp = array();
            $consulta = "SELECT ".($campo ?? 'id')." as campo FROM ".$tabla." ".Self::Condicionales($condicion);
            $stmt = $this->db ->prepare($consulta);
            try { 
                $total = 0;
                $stmt->execute();
                if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $this->resp = $arr['campo'];
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return  $this->resp;
        }

        public function Cantidad_Registros($campos = null, $tabla = null, $condicion = null){    
            $this->resp = array();        
            $consulta = "SELECT ".($campos ?? 'id')." FROM ".$tabla." ".Self::Condicionales($condicion);
            $stmt = $this->db ->prepare($consulta);
            try { 
                $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $stmt->rowCount();
        }

        public function Cargar_Eps(){
            $this->resp = array();
            $consulta = "SELECT c.id, c.codigo, c.nombre FROM entidades c WHERE c.state = 'AC' ORDER BY c.nombre "; 
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp[] = array(
                        "name" => $arr["id"],
                        "value" => $arr["nombre"]." (".$arr["codigo"].")"
                    );
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->resp;
        }

        public function Cargar_Dpto(){
            $this->resp = array();
            $consulta = "SELECT id, CONCAT(UPPER(LEFT(nomarea, 1)), LOWER(SUBSTRING(nomarea, 2))) AS nomarea FROM areas WHERE id_tipo = 2 ORDER BY nomarea ASC"; 
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp[] = array(
                        "name" => $arr["id"],
                        "value" => $arr["nomarea"]
                    );
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->resp;
        }

        public function Cargar_Muni($dpto){
            $this->resp = array();
            $consulta = "SELECT id, CONCAT(UPPER(LEFT(nomarea, 1)), LOWER(SUBSTRING(nomarea, 2))) AS nomarea 
                        FROM areas 
                        WHERE id_tipo = 3 AND padre = ".$dpto." ORDER BY nomarea ASC"; 
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp[] = array(
                        "name" => $arr["id"],
                        "value" => $arr["nomarea"]
                    );
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->resp;
        }

        public function Sumar_Campo($tabla = null, $campo = null, $condicion = null){
            $consulta = "SELECT SUM(".$campo.") AS suma FROM ".$tabla." ".Self::Condicionales($condicion);
            $stmt = $this->db ->prepare($consulta);
            try { 
                $total = 0;
                $stmt->execute();
                if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $this->resp = $arr['suma'];
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return  $this->resp;
        }


        function Condicionales($entrada){
            $salida = "";
            if($entrada){
                foreach ($entrada as $clave => $valor) {
                   $salida .= $clave ." = ".$valor." AND ";
                }
                $salida = " WHERE ".$salida;
                $salida = substr($salida, 0, -4);
            }            
            return $salida;
        }

        // Funciones de configuración
        function Config_Crear($entrada){
            $salida = array();
            $campos = "";
            $valor  = "";
            foreach ($entrada as $item) {
                $long = strlen($item["value"]) ? strlen($item["value"]) : 0  ;
                if( $long > 0 ){
                    if($item["name"]){
                        $campos.= " ".$item["name"].",";
                        if($item["name"] == "password"){
                            $valor .= " '".password_hash( $item["value"] , PASSWORD_DEFAULT)."',";
                        }else{
                            $valor .= " '".$item["value"]."',";
                        }                       
                    }                    
                }
            }
            $campos = substr($campos, 0, -1);
            $valor = substr($valor, 0, -1);
            $salida["campos"] = $campos;
            $salida["valor"]  = $valor;
            return $salida;
        }

        function Config_Editar($entrada){
            $salida = array();
            $set = "";
            $id = "";
            foreach ($entrada as $item) {
                if($item["name"] != "id" ){
                    if($item["name"] != "id_dpto" ){
                        if($item["name"] == "password"){
                            $set .= " ".$item["name"]." = '".password_hash($item["value"], PASSWORD_DEFAULT)."',";
                        }else{
                            $set .= " ".$item["name"]." = '".$item["value"]."',";
                        }  
                    }
                }else{
                    $id = $item["value"];
                }
            }
            $set = substr($set, 0, -1);
            $salida["set"] = $set;
            $salida["id"]  = $id;
            return $salida;
        }


    }
?>