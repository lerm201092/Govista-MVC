<?php

    Class HistoriaClinicaModel{
        private $db;
        private $resp;
        public function __construct(){
            session_start();
            $this->db = ConectarDB::conexion();
            $this->resp = array();
        }

        public function cantHistorias(){   
            
            $empresa = $_SESSION['gv_empresa'];  

            $consulta = "SELECT h.id
                        FROM histories as h
                        WHERE h.id_empresa = ".$empresa;                      
            $stmt = $this->db ->prepare($consulta);
            try { 
                $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $stmt->rowCount();
        }


        public function ver_histories($id){
            $this->resp = array();         
            $consulta=" SELECT CONCAT( p.name1, ' ', p.surname1) AS paciente, 
                                CONCAT( '( ', p.tipodoc, ' ) ', p.numdoc) AS id_paciente, 
                                TIMESTAMPDIFF(YEAR, p.birthdate, CURDATE()) AS edad, h.*
                        FROM histories h
                            LEFT JOIN appointments a ON a.id = h.id_appointment
                            LEFT JOIN patients p ON p.id = h.id_patient
                        WHERE h.id = ".$id;
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp = $arr; 
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->resp; 
        }

        public function ver_histories_aa($id){
            $this->resp = array();         
            $consulta=" SELECT a.*
                        FROM histories_aa a
                        WHERE a.id_histories = ".$id;
            $stmt = $this->db->prepare($consulta);
            try { 
                $stmt->execute();
                if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {                    
                    $this->resp = $arr; 
                }                     
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->resp; 
        }

        public function ver_history_exercises($id){
            $this->resp = array();         
            $consulta=" SELECT h.*
                        FROM  history_exercises h
                        WHERE h.id_history = ".$id;
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

        public function listar($offset){
            $empresa = $_SESSION['gv_empresa']; 
            $this->resp = array();     
        
            $consulta = "SELECT p.id as pid, h.id, h.historydate, 
                            CONCAT(UPPER(SUBSTRING(p.name1,1,1)),LOWER(SUBSTRING(p.name1,2))) AS `name1`,
                            CONCAT(UPPER(SUBSTRING(p.name2,1,1)),LOWER(SUBSTRING(p.name2,2))) AS `name2`,
                            CONCAT(UPPER(SUBSTRING(p.surname1,1,1)),LOWER(SUBSTRING(p.surname1,2))) AS `surname1`,
                            CONCAT(UPPER(SUBSTRING(p.surname2,1,1)),LOWER(SUBSTRING(p.surname2,2))) AS `surname2`,
                        m.name, h.state, p.tipodoc, p.numdoc, a.id_patient, m.name
                        FROM histories as h
                            LEFT JOIN medicos as m ON m.id = h.id_medico
                            LEFT JOIN appointments AS a ON a.id = h.id_appointment
                            LEFT JOIN patients AS p ON p.id = h.id_patient
                        WHERE h.id_empresa = ".$empresa." LIMIT 15 OFFSET ".$offset;
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

        public function crear($parametros, $ejercicios){
            $campos = "historydate,";
            $valor  = "now(),";
            $campos2 = "id_histories,";
            $valor2 = "";
            $campos3 = "";
            $valor3 = "";
            foreach ($parametros as $item) {
                if( $item["value"] != "" ){
                    if($item["name"]){
                        if (strpos($item["name"], 'mo_est_') !== false) {
                            $campos2.= " ".$item["name"].",";
                            $valor2 .= " '".$item["value"]."',";
                        }else{
                            $campos.= " ".$item["name"].",";
                            $valor .= " '".$item["value"]."',";
                        }
                    }                    
                }
            }
            $campos = substr($campos, 0, -1);
            $valor = substr($valor, 0, -1);
            $consulta = "INSERT INTO histories (".$campos.") VALUES (".$valor.")";

            $stmt = $this->db->prepare($consulta);
            if($stmt->execute()){
                $this->resp = ["OK"];

                $id = $this->db->lastInsertId();
                $campos2 = substr($campos2, 0, -1);
                $valor2 = substr($id.",".$valor2, 0, -1);
                $consulta2 = "INSERT INTO histories_aa (".$campos2.") VALUES (".$valor2.")";

                if($ejercicios){
                    $consulta2 .= "; INSERT INTO history_exercises (id_history, id_exercise, observation, duration, session, size, status) VALUES ";
                    foreach($ejercicios as $item){
                        $consulta2 .= "('".$id."','".$item['id_exercise']."','".$item['observation']."','".$item['duration']."','".$item['session']."','".$item['size']."', 'AC'),";
                    }
                    $consulta2 = substr($consulta2, 0, -1);  
                }

                $stmt = $this->db->prepare($consulta2);
                if($stmt->execute()){
                    $this->resp = ["OK"];
                }

            }
            return $this->resp;         
        }


    }
?>