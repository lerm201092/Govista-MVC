<?php

    Class PacienteModel{
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
            if($estado != "ALL"){ $aux = " WHERE state = '".$estado."'"; }else{ $aux = "";}                
            $consulta = "SELECT id FROM patients".$aux;
            $stmt = $this->db ->prepare($consulta);
            try { $stmt->execute(); }catch(PDOException $e){ echo $e->getMessage(); }
            return $stmt->rowCount();
        }



        // **************************************   PACIENTE     ****************************
        public function medico_cant($estado){
            if($estado == "ALL"){
                $consulta = "SELECT id FROM patients WHERE id_empresa = ".$this->empresa;
            }else{
                $consulta = "SELECT id FROM patients WHERE state = '".$estado."' AND id_empresa = ".$this->empresa;
            }            
            $stmt = $this->db ->prepare($consulta);
            try { 
                $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $stmt->rowCount();
        }

        public function medico_cant_busqueda($texto){            
            $consulta = "SELECT p.id
                FROM patients AS p
                    LEFT JOIN areas AS a ON a.id = p.id_area
                    LEFT JOIN areas AS d ON a.padre = d.id
                WHERE p.id_empresa = ".$this->empresa."
                    AND p.name1 LIKE '%".$texto."%'
                    OR p.name2 LIKE '%".$texto."%'
                    OR p.surname1 LIKE '%".$texto."%'
                    OR p.surname2 LIKE '%".$texto."%'
                    OR p.tipodoc LIKE '%".$texto."%'
                    OR p.numdoc LIKE '%".$texto."%'
                    OR p.name1 LIKE '%".$texto."%'
                    OR p.name1 LIKE '%".$texto."%'
                ORDER BY p.name1 ASC, p.name2 ASC, p.surname1 ASC, p.surname2 ASC";                      
            $stmt = $this->db ->prepare($consulta);
            try { 
                $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $stmt->rowCount();
        }

        public function medico_listar($offset, $estado){
            $var_estado = "";
            if($estado != "ALL"){
                $var_estado =" AND p.state = '".$estado."'";
            }

            $consulta = "SELECT p.id, p.tipodoc, p.numdoc, 
                            CONCAT(UPPER(SUBSTRING(p.name1,1,1)),LOWER(SUBSTRING(p.name1,2))) AS name1,
                            CONCAT(UPPER(SUBSTRING(p.name2,1,1)),LOWER(SUBSTRING(p.name2,2))) AS name2,
                            CONCAT(UPPER(SUBSTRING(p.surname1,1,1)),LOWER(SUBSTRING(p.surname1,2))) AS surname1,
                            CONCAT(UPPER(SUBSTRING(p.surname2,1,1)),LOWER(SUBSTRING(p.surname2,2))) AS surname2,
                            p.state, 
                            CONCAT(UPPER(SUBSTRING(a.nomarea,1,1)),LOWER(SUBSTRING(a.nomarea,2))) AS munic,
                            CONCAT(UPPER(SUBSTRING(d.nomarea,1,1)),LOWER(SUBSTRING(d.nomarea,2))) AS dpto
                        FROM patients as p
                            LEFT JOIN areas AS a ON p.id_Area = a.id
                            LEFT JOIN areas AS d ON a.padre = d.id
                        WHERE p.id_empresa = ".$this->empresa." 
                        ".$var_estado."
                        ORDER BY name1 ASC LIMIT 15 OFFSET ".$offset; 
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp[] = $arr;   
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->resp;
        }

        public function medico_buscar($offset, $texto){

            $consulta = "SELECT p.id, p.tipodoc, p.numdoc, 
                CONCAT(UPPER(SUBSTRING(p.name1,1,1)),LOWER(SUBSTRING(p.name1,2))) AS name1,
                CONCAT(UPPER(SUBSTRING(p.name2,1,1)),LOWER(SUBSTRING(p.name2,2))) AS name2,
                CONCAT(UPPER(SUBSTRING(p.surname1,1,1)),LOWER(SUBSTRING(p.surname1,2))) AS surname1,
                CONCAT(UPPER(SUBSTRING(p.surname2,1,1)),LOWER(SUBSTRING(p.surname2,2))) AS surname2,
                p.state, 
                CONCAT(UPPER(SUBSTRING(a.nomarea,1,1)),LOWER(SUBSTRING(a.nomarea,2))) AS munic,
                CONCAT(UPPER(SUBSTRING(d.nomarea,1,1)),LOWER(SUBSTRING(d.nomarea,2))) AS dpto
            FROM patients AS p
                LEFT JOIN areas AS a ON a.id = p.id_area
                LEFT JOIN areas AS d ON a.padre = d.id
            WHERE p.id_empresa = '".$this->empresa."'
                AND (p.name1 LIKE '%".$texto."%'
                OR p.name2 LIKE '%".$texto."%'
                OR p.surname1 LIKE '%".$texto."%'
                OR p.surname2 LIKE '%".$texto."%'
                OR p.tipodoc LIKE '%".$texto."%'
                OR p.numdoc LIKE '%".$texto."%'
                OR p.name1 LIKE '%".$texto."%'
                OR p.name1 LIKE '%".$texto."%') 
            ORDER BY p.name1 ASC, p.name2 ASC, p.surname1 ASC, p.surname2 ASC
            LIMIT 15 OFFSET ".$offset;       
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp[] = $arr;   
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->resp;
        }


        public function ver($id){
            $consulta = 'SELECT p.*, a1.nomarea AS muni, a2.nomarea AS dpto, a3.nomarea AS muni_contact, a4.nomarea AS dpto_contact, e.name as eps
                        FROM patients AS p
                            LEFT JOIN areas AS a1 ON p.id_area = a1.id
                            LEFT JOIN areas AS a2 ON a1.padre = a2.id
                            LEFT JOIN areas AS a3 ON p.contact_city = a3.id
                            LEFT JOIN areas AS a4 ON a3.padre = a4.id
                            LEFT JOIN entidades AS e ON p.id_eps = e.id
                         WHERE p.id = '.$id; 
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                $this->resp = $stmt->fetch(PDO::FETCH_ASSOC);                  
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
            $consulta = "INSERT INTO patients (".$campos.") VALUES (".$valor.")";
            // echo $consulta;
            $stmt = $this->db->prepare($consulta);
            if($stmt->execute()){
                $this->resp[] = "ok";
            };
            return $this->resp;         
        }

        public function cargar_eps(){
            $this->resp = array();
            $consulta = "SELECT c.id, c.code, c.name FROM entidades c WHERE c.estado = 'AC' ORDER BY c.name "; 
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp[] = array(
                        "name" => $arr["id"],
                        "value" => $arr["name"]." (".$arr["code"].")"
                    );
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
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

        public function cargar_munic($dpto){
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

        public function pre_editar($id){
            $this->resp = array();
            $consulta = "SELECT p.*,  a.padre AS dpto, b.padre AS contact_dpto
                        FROM patients p 
                            LEFT JOIN areas a ON a.id = p.id_area
                            LEFT JOIN areas b ON b.id = p.contact_city
                        WHERE p.id = ".$id; 
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                if($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp = $arr;
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
            }
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
            $consulta = "UPDATE patients SET ".$set." WHERE id = ".$id;
            // echo $consulta;
            $stmt = $this->db->prepare($consulta);
            if($stmt->execute()){
                $this->resp[] = "ok";
            };
            return $this->resp;         
        }

        function recibe_array($array){
            $params = array();
            parse_str($array, $params);
            return $params;            
        }
    }

?>