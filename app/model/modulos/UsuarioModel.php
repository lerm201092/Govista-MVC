<?php

    Class UsuarioModel{
        private $db;
        private $resp;
        public function __construct(){
            $this->db = ConectarDB::conexion();
            $this->resp = array();
        }

        public function autenticar($para){      
            $pass = $para["password"];
            $user = $para["username"];
            $comp = $para["companies"];
            $ncom = $para["name_companies"];
            
            $consulta = 'SELECT id, nombres, apellidos, roluser, fecha_pago, password FROM users WHERE username = "'.$user.'"';
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contrasena = $arr["password"]; 
                if(password_verify( $pass , $contrasena)){
                    $this->resp["OK"]  = "OK";                    
                    $fecha_pago           = $arr["fecha_pago"];
                    $date1 = new DateTime(date('Y-m-d', strtotime($fecha_pago)));
                    $date2 = new DateTime("now");
                    $diff = $date1->diff($date2);        
                    $dif = 30 - $diff->days;
                    $pago = null;
                    if( $dif > 0 ){ $pago = "SI"; }else{ $pago = "NO"; } 
                    
                    session_start();

                    if($arr["roluser"] == 3){
                        $_SESSION["gv_id_medico"] = self::id_medico($arr["id"]);
                        $this->resp["homepage"] = "/apps/rol-medico/estadisticas/resumen";
                    }else if($arr["roluser"] == 4){
                        $_SESSION["gv_id_paciente"] = self::id_paciente($arr["id"]);
                        $this->resp["homepage"] = "/apps/rol-paciente/estadisticas/resumen";
                    }else if($arr["roluser"] == 1){
                        $this->resp["homepage"] = "/apps/rol-administrador/estadisticas/resumen";
                    }

                    $_SESSION["gv_id_user"]        = $arr["id"];
                    $_SESSION["gv_username"]       = $user;
                    $_SESSION["gv_empresa"]     =   $comp;
                    $_SESSION["gv_name_empresa"]   = $ncom;
                    $_SESSION["gv_nombre_user"]    = $arr["nombres"]." ".$arr["apellidos"];
                    $_SESSION["gv_rol_user"]       = $arr["roluser"];
                    $_SESSION["gv_pago_user"]      = $pago;
                }
            }
            return $this->resp;
        }

        public function userEmpresa($para){
            $get = self::recibe_array($para); 
            $user = $get["username"];
            $consulta = 'SELECT uc.id_empresa, c.nombre as nombre
                         FROM user_empresas as uc
                            LEFT JOIN users AS u ON u.id = uc.id_user
                            LEFT JOIN empresas AS c ON c.id = uc.id_empresa
                         WHERE u.username = "'.$user.'"
                            AND uc.state = "AC"';            
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->resp[] = $arr;
            }
            return $this->resp;

        }

        function id_medico($id){
            $resp = null;
            $consulta = 'SELECT id FROM medicos WHERE id_user = "'.$id.'"';
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            if($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resp = $arr["id"];
            }
            return $resp;
        }

        function id_paciente($id){
            $resp = null;
            $consulta = 'SELECT id FROM patients WHERE id_user = "'.$id.'"';
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            if($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resp = $arr["id"];
            }
            return $resp;
        }


        function recibe_array($array){
            $params = array();
            parse_str($array, $params);
            return $params;            
        }
    }

?>