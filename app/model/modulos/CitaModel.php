<?php

    Class CitaModel{
        private $db;
        private $resp;
        private $empresa;
        public function __construct(){
            if(!isset($_SESSION)){ session_start(); } 
            $this->empresa = $_SESSION['gv_empresa'];
            $this->db = ConectarDB::conexion();
            $this->resp = array();
        }

        
        public function ver($id){
                $consulta = 'SELECT c.*, p.*
                            FROM citas as c
                                LEFT JOIN usuarios AS p ON p.id = c.id_paciente
                                LEFT JOIN medicos AS m ON m.id = c.id_medico
                            WHERE c.id = '.$id;

                $stmt = $this->db->prepare($consulta);
                $stmt->execute();
                if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $this->resp = $arr;      
                    $this->resp["edad"] = self::edad($arr["fechanac"]);              
                }
                return $this->resp;            
        }

        function edad($fecha_nacimiento) { 
            $tiempo = strtotime($fecha_nacimiento); 
            $ahora = time(); 
            $edad = ($ahora-$tiempo)/(60*60*24*365.25); 
            $edad = floor($edad); 
            return $edad; 
        }

        //****************************************     ADMINISTRADOR     *************************************** */

        // public function admin_cant($estado){
        //     if($estado != "ALL"){ $aux = " WHERE state = '".$estado."'"; }else{ $aux = "";}                
        //     $consulta = "SELECT id FROM appointments".$aux;
        //     $stmt = $this->db ->prepare($consulta);
        //     try { $stmt->execute(); }catch(PDOException $e){ echo $e->getMessage(); }
        //     return $stmt->rowCount();
        // }

        //****************************************     PACIENTES     *************************************** */

        // public function paciente_cant($estado){
        //     $aux = "";
        //     $id_patient = $_SESSION["gv_id_paciente"];
        //     if($estado != "ALL"){ $aux = "AND state = '".$estado."'"; }                
        //     $consulta = "SELECT id FROM appointments WHERE id_patient = ".$id_patient." AND id_empresa = ".$this->empresa." ".$aux;
        //     $stmt = $this->db ->prepare($consulta);
        //     try { $stmt->execute(); }catch(PDOException $e){ echo $e->getMessage(); }
        //     return $stmt->rowCount();
        // }

        // public function paciente_listar($offset){
        //     $id_patient = $_SESSION["gv_id_paciente"];
        //     $consulta = "SELECT  a.id AS cita_id, a.title as desc_corta, p.tipodoc, p.numdoc, m.name, p.name1, p.surname1, a.start, CONCAT(p.name1, ' ', p.surname1) AS title
        //                 FROM appointments AS a
        //                     LEFT JOIN patients AS p ON p.id = a.id_patient
        //                     LEFT JOIN medicos AS m ON m.id = a.id_medico
        //                 WHERE a.id_empresa = ".$this->empresa." AND
        //                     a.id_patient = ".$id_patient." AND
        //                     a.state = 'AC'
        //                 ORDER BY a.start DESC LIMIT 15 OFFSET ".$offset;
        //     $stmt = $this->db->prepare($consulta);
        //     $stmt->execute();
        //     while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //         $this->resp[] = $arr;
        //     }
        //     return $this->resp;
        // }
        
        //*************************************    MEDICOS    *************************************** */
        // public function medico_cant($estado){
        //     $aux = "";
        //     $id_medico = $_SESSION["gv_id_medico"];
        //     if($estado != "ALL"){ $aux = "AND state = '".$estado."'"; }                
        //     $consulta = "SELECT id FROM appointments WHERE id_medico = ".$id_medico." AND id_empresa = ".$this->empresa." ".$aux;
        //     $stmt = $this->db ->prepare($consulta);
        //     try { $stmt->execute(); }catch(PDOException $e){ echo $e->getMessage(); }
        //     return $stmt->rowCount();
        // }

        // public function medico_listar($offset){
        //     $rol = $_SESSION["gv_rol_user"];
        //     if( $rol == 3 ){
        //         $id_medico = $_SESSION["gv_id_medico"];
        //         $consulta = "SELECT  a.id AS cita_id, p.tipodoc, p.numdoc, p.name1, p.surname1, a.start, CONCAT(p.name1, ' ', p.surname1) AS title
        //                     FROM appointments AS a
        //                         LEFT JOIN patients AS p ON p.id = a.id_patient
        //                         LEFT JOIN medicos AS m ON m.id = a.id_medico
        //                     WHERE a.id_empresa = ".$this->empresa." AND
        //                         a.id_medico = ".$id_medico." AND
        //                         a.state = 'AC'
        //                     ORDER BY a.start DESC LIMIT 15 OFFSET ".$offset;
        //     }
        //     $stmt = $this->db->prepare($consulta);
        //     $stmt->execute();
        //     while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //         $this->resp[] = $arr;
        //     }
        //     return $this->resp;
        // }

        // public function ver($id){
        //         $consulta = 'SELECT a.id, p.tipodoc, p.numdoc, p.id as id_patient,
        //                     CONCAT(UPPER(SUBSTRING(p.name1,1,1)),LOWER(SUBSTRING(p.name1,2))) AS name1,
        //                     CONCAT(UPPER(SUBSTRING(p.name2,1,1)),LOWER(SUBSTRING(p.name2,2))) AS name2,
        //                     CONCAT(UPPER(SUBSTRING(p.surname1,1,1)),LOWER(SUBSTRING(p.surname1,2))) AS surname1,
        //                     CONCAT(UPPER(SUBSTRING(p.surname2,1,1)),LOWER(SUBSTRING(p.surname2,2))) AS surname2,
        //                     a.title, a.body, m.name, a.start, p.phone, p.birthdate
        //                     FROM appointments as a
        //                         LEFT JOIN patients AS p ON p.id = a.id_patient
        //                         LEFT JOIN medicos AS m ON m.id = a.id_medico
        //                     WHERE a.id = '.$id;

        //         $stmt = $this->db->prepare($consulta);
        //         $stmt->execute();
        //         if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //             $this->resp = $arr;      
        //             $this->resp["edad"] = self::edad($arr["birthdate"]);              
        //         }
        //         return $this->resp;            
        // }

        // public function pre_editar($id){
        //     $consulta = 'SELECT a.id, p.tipodoc, p.numdoc,
        //                     CONCAT(UPPER(SUBSTRING(p.name1,1,1)),LOWER(SUBSTRING(p.name1,2))) AS name1,
        //         CONCAT(UPPER(SUBSTRING(p.name2,1,1)),LOWER(SUBSTRING(p.name2,2))) AS name2,
        //         CONCAT(UPPER(SUBSTRING(p.surname1,1,1)),LOWER(SUBSTRING(p.surname1,2))) AS surname1,
        //         CONCAT(UPPER(SUBSTRING(p.surname2,1,1)),LOWER(SUBSTRING(p.surname2,2))) AS surname2,
        //         a.title, a.body, m.name, a.start, p.phone
        //     FROM appointments as a
        //         LEFT JOIN patients AS p ON p.id = a.id_patient
        //         LEFT JOIN medicos AS m ON m.id = a.id_medico
        //     WHERE a.id = '.$id;

        //     $stmt = $this->db->prepare($consulta);
        //     $stmt->execute();
        //     if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //         $this->resp = $arr;
        //     }
        //     return $this->resp;            
        // }

        // public function crear($parametros){
        //     $campos = "";
        //     $valor  = "";
        //     foreach ($parametros as $item) {
        //         if($item["value"]){
        //             if($item["name"]){
        //                 $campos.= " ".$item["name"].",";
        //                 $valor .= " '".$item["value"]."',";
        //             }                    
        //         }
        //     }
        //     $campos = substr($campos, 0, -1);
        //     $valor = substr($valor, 0, -1);
        //     $consulta = "INSERT INTO appointments (".$campos.") VALUES (".$valor.")";
        //     $stmt = $this->db->prepare($consulta);
        //     if($stmt->execute()){
        //         $this->resp[] = "ok";
        //     };
        //     return $this->resp;         
        // }

        // public function editar($parametros){
        //     $set  = "";
        //     $id = null;
        //     foreach ($parametros as $item) {
        //         if($item["name"] != "id" ){
        //             $set .= " ".$item["name"]." = '".$item["value"]."',";
        //         }else{
        //             $id = $item["value"];
        //         }
        //     }
        //     $set = substr($set, 0, -1);
        //     $consulta = "UPDATE appointments SET ".$set." WHERE id = ".$id;
        //     // echo $consulta;
        //     $stmt = $this->db->prepare($consulta);
        //     if($stmt->execute()){
        //         $this->resp[] = "ok";
        //     };
        //     return $this->resp;         
        // }

        // function edad($fecha_nacimiento) { 
        //     $tiempo = strtotime($fecha_nacimiento); 
        //     $ahora = time(); 
        //     $edad = ($ahora-$tiempo)/(60*60*24*365.25); 
        //     $edad = floor($edad); 
        //     return $edad; 
        // }

        // function recibe_array($array){
        //     $params = array();
        //     parse_str($array, $params);
        //     return $params;            
        // }
    }

?>