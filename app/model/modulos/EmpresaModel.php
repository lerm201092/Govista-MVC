<?php

    Class EmpresaModel{
        private $db;
        private $resp;
        private $empresa;
        public function __construct(){
            if(!isset($_SESSION)){ session_start(); } 
            $this->empresa = $_SESSION['gv_empresa'];
            $this->db = ConectarDB::conexion();
            $this->resp = array();
        }

    
        // *************************************    ADMINISTRADOR   ***********************************
        public function admin_cant($estado){
            $this->resp = array();
            if($estado != "ALL"){ $aux = " WHERE estado = '".$estado."'"; }else{ $aux = "";}                
            $consulta = "SELECT id FROM empresas".$aux;
            $stmt = $this->db ->prepare($consulta);
            try { $stmt->execute(); }catch(PDOException $e){ echo $e->getMessage(); }
            return $stmt->rowCount();
        }

        public function admin_ver($id){
                $consulta = "SELECT e.*, CONCAT( 
                    CONCAT(UPPER(SUBSTRING(a.nomarea,1,1)),LOWER(SUBSTRING(a.nomarea,2))),  ' (',
                    CONCAT(UPPER(SUBSTRING(d.nomarea,1,1)),LOWER(SUBSTRING(d.nomarea,2))) , ' )' ) AS ciudad,
                    CASE 
                        WHEN e.estado = 'AC' THEN 'Activa'
                        WHEN e.estado = 'IN' THEN 'Inactiva'
                        ELSE ''
                    END AS  estado_f
                FROM empresas e
                    LEFT JOIN areas AS a ON e.id_area = a.id
                    LEFT JOIN areas AS d ON a.padre = d.id
                WHERE e.id = ".$id;
                $stmt = $this->db->prepare($consulta);
                $stmt->execute();
                if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $this->resp = $arr;                 
                }
                return $this->resp;             
        }
    
        public function admin_listar( $offset, $estado ){
            if($estado != "ALL"){ $estado =" WHERE estado = '".$estado."'"; }else{ $estado = ""; }
            $consulta = "SELECT * FROM empresas ".$estado." ORDER BY id DESC LIMIT 15 OFFSET ".$offset;
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

        public function pre_editar($id){
            $consulta = 'SELECT e.*,  a.padre AS dpto
                        FROM empresas e 
                            LEFT JOIN areas a ON a.id = e.id_area
                        WHERE e.id = '.$id;

            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->resp = $arr;
            }
            return $this->resp;            
        }


        public function cargar_dpto(){
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

        public function crear($parametros){
            $campos = "";
            $valor  = "";
            foreach ($parametros as $item) {
                if($item["value"]){
                    if($item["name"]){
                        $campos.= " ".$item["name"].",";
                        $valor .= " '".$item["value"]."',";
                    }                    
                }
            }
            $campos = substr($campos, 0, -1);
            $valor = substr($valor, 0, -1);
            $consulta = "INSERT INTO empresas (".$campos.") VALUES (".$valor.")";
            $stmt = $this->db->prepare($consulta);
            if($stmt->execute()){
                $this->resp[] = "ok";
            };
            return $this->resp;         
        }

        public function editar($parametros){
            $set  = "";
            $id = null;
            foreach ($parametros as $item) {
                if($item["name"] != "id" ){
                    $set .= " ".$item["name"]." = '".$item["value"]."',";
                }else{
                    $id = $item["value"];
                }
            }
            $set = substr($set, 0, -1);
            $consulta = "UPDATE empresas SET ".$set." WHERE id = ".$id;
            // echo $consulta;
            $stmt = $this->db->prepare($consulta);
            if($stmt->execute()){
                $this->resp = "OK";
            };
            return $this->resp;         
        }

        public function cambiar_estado($id, $estado){
            $this->resp = array();
            $consulta = "UPDATE empresas SET estado = '".$estado."' WHERE id = ".$id;
            $stmt = $this->db->prepare($consulta);
            if($stmt->execute()){
                $this->resp = "OK";
            };
            return $this->resp;         
        }
    
    
    }


?>