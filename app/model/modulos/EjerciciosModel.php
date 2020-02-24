<?php

    Class EjerciciosModel{
        private $db;
        private $resp;
        private $empresa;
        public function __construct(){
            if(!isset($_SESSION)){ session_start(); } 
            $this->empresa = $_SESSION['gv_empresa'];
            $this->db = ConectarDB::conexion();
            $this->resp = array();
        }

        public function Cantidad_Registros($estado){
            $rol    = $_SESSION["gv_rol"];
            $campo  = "";
            switch ($rol) { case '3': $campo = "h.id_medico"; break; case '4': $campo = "h.id_patient"; break; }
            $consulta = "SELECT e.status AS estado, COUNT(e.id_exercise) AS cant  
                        FROM histories h
                            LEFT JOIN history_exercises AS e ON h.id = e.id_history
                        WHERE h.id_empresa = 3
                            AND ".$campo." = ".$_SESSION["gv_iduser"]." "
                            .( $estado ? " e.status = '".$estado."'" : '' ). 
                            " AND h.state = 'AC'
                        GROUP BY e.status";
            $stmt = $this->db ->prepare($consulta);
            try { 
                $total = 0;
                $stmt->execute();
                while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $this->resp[$arr['estado']] = $arr['cant'];
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return  $this->resp;
        }



        // public function admin_cant(){
        //     $consulta = "SELECT SUM(h.session) AS suma FROM history_exercises h";
        //     $stmt = $this->db ->prepare($consulta);
        //     try { 
        //         $total = 0;
        //         $stmt->execute();
        //         while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //             $this->resp = $arr['suma'];
        //         }
        //     }catch(PDOException $e){
        //         echo $e->getMessage();
        //     }
        //     return  $this->resp;
        // }



    //     public function paciente_listar($offset){
    //         $this->resp = array();
    //         $id_patient = $_SESSION["gv_id_paciente"];
    //         $consulta = "SELECT he.id, he.id_exercise, h.id as id_historia,  h.id_appointment, h.historydate, m.name, he.observation, he.size, he.duration, he.session,  he.session_ok
    //                      FROM histories as h
    //                         LEFT JOIN history_exercises as he ON h.id = he.id_history
    //                         LEFT JOIN medicos as m ON h.id_medico = m.id
    //                     WHERE h.id_patient = ".$id_patient;

    //         $stmt = $this->db ->prepare($consulta);
    //         try { 
    //             $total = 0;
    //             $stmt->execute();
    //             while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //                 $this->resp[] = $arr;
    //             }
    //         }catch(PDOException $e){
    //             echo $e->getMessage();
    //         }
    //         return  $this->resp;    
    //     }

    //     public function paciente_play($id){
    //         $consulta = "SELECT CONCAT( p.name1, ' ', p.surname1 ) AS usuario, he.*
    //                     FROM patients p
    //                         LEFT JOIN histories h ON h.id_patient = p.id
    //                         LEFT JOIN history_exercises he ON he.id_history = h.id
    //                     WHERE he.id = ".$id;
    //         $stmt = $this->db ->prepare($consulta);
    //         try { 
    //             $stmt->execute();
    //             if($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //                 $this->resp = $arr;
    //             }
    //         }catch(PDOException $e){
    //             echo $e->getMessage();
    //         }
    //         return  $this->resp;   
    //     }


    //     public function paciente_guardar_info($parametros)
    //     {    
    //         $hed = array(); //Historia ejercicios detalles
    //         // return $parametros;
    //         if(($parametros["id"]) && ($parametros["duration"]) && ($parametros["status"]) ){
    //             $hed["id"]         = $parametros["id"];
    //             $hed["duration"]   = $parametros["duration"];  
    //             $hed["status"]     = $parametros["status"];
    //             $hed["coins"]       = $parametros["coins"];
    //             $hed["stars"]      = $parametros["stars"];
    //             $hed["progress"]   = $parametros["progress"];
    //             $hed["failure"]    = $parametros["failure"];
    //             self::insert_history_exercise_details($hed);
    //             if(strcmp($hed["status"], "OK")==0){
    //                 $username = $_SESSION["gv_username"];
    //                 $consulta ="UPDATE history_exercises
    //                             SET session_ok = (session_ok + 1), updated_user = '".$username."' 
    //                             WHERE id = ".$hed["id"];
    //                 $stmt = $this->db->prepare($consulta);
    //                 if($stmt->execute()){
    //                     $this->resp = "OK";
    //                 }               
    //             }

    //         }
    //         return $this->resp;
    //     }





    //     // *********************************        MEDICA       *************************************
    //     public function medico_cant(){
    //         $id_medico = $_SESSION["gv_id_medico"];
    //         $consulta = "   SELECT e.status AS estado, COUNT(e.id_exercise) AS cant  
    //                         FROM histories h
    //                             LEFT JOIN history_exercises AS e ON h.id = e.id_history
    //                         WHERE h.id_empresa = ".$this->empresa."
    //                             AND h.id_medico = ".$id_medico."
    //                             AND h.state = 'AC'
    //                         GROUP BY e.status";
    //         $stmt = $this->db ->prepare($consulta);
    //         try { 
    //             $total = 0;
    //             $stmt->execute();
    //             while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //                 $this->resp[$arr['estado']] = $arr['cant'];
    //             }
    //         }catch(PDOException $e){
    //             echo $e->getMessage();
    //         }
    //         return  $this->resp;
    //     }



    //     function insert_history_exercise_details($hed){
    //         $this->resp = array();
    //         $consulta = "INSERT INTO history_exercises_details (id, duracion, status, coin, star, failure, progress) 
    //         VALUES ("."'".$hed['id']."', '".$hed['duration']."', '".$hed['status']."', '".$hed['coins']."', '".$hed['stars']."', '".$hed['failure']."', '".$hed['progress']."')";
    //         $stmt = $this->db->prepare($consulta);
    //         if($stmt->execute()){
    //             $this->resp = "OK";
    //         }
    //         return $this->resp;    
    //     }


    // }

?>