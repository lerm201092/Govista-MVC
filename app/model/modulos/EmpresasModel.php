<?php

    Class EmpresasModel{
        private $db;
        private $resp;
        private $empresa;
        public function __construct(){
            if(!isset($_SESSION)){ session_start(); } 
            $this->empresa = $_SESSION['gv_empresa'];
            $this->db = ConectarDB::conexion();
            $this->resp = array();
        }

        public function Cambiar_Estado($id, $estado){
            $this->resp = array();
            $consulta = "UPDATE empresas SET state = '".$estado."' WHERE id = ".$id;
            $stmt = $this->db->prepare($consulta);
            if($stmt->execute()){
                $this->resp = "OK";
            }
            return $this->resp;         
        }


        public function Ver($id){
            $consulta = "SELECT e.*, Concat(m.nomarea, ' - ', d.nomarea) as ciudad, d.id as dpto,
                        CASE e.state 
                            WHEN 'AC' THEN 'Activa' 
                            ELSE 'Inactiva' 
                        END AS estado_f
                        FROM empresas e
                            LEFT JOIN areas AS m ON e.id_area = m.id
                            LEFT JOIN areas AS d ON m.padre = d.id
                        WHERE e.id = ".$id;
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->resp = $arr;                 
            }
            return $this->resp;             
        }

    
    }


?>