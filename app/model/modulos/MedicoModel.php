<?php

    Class MedicoModel{
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
            $consulta = "SELECT id FROM medicos".$aux;
            $stmt = $this->db ->prepare($consulta);
            try { $stmt->execute(); }catch(PDOException $e){ echo $e->getMessage(); }
            return $stmt->rowCount();
        }
            

    
    
    
    
    
    }


?>