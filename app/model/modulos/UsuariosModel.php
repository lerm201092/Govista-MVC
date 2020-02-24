<?php

    Class UsuariosModel{
        private $db;
        private $resp;
        public function __construct(){
            $this->db = ConectarDB::conexion();
            $this->resp = array();
        }

        
        public function Usuario_Empresa($condicion = null, $offset = null){
            $consulta = "SELECT u.*, e.id as id_empresa, e.nombre as empresa 
                        FROM usuario_empresa ue
                            LEFT JOIN usuarios AS u ON u.id = ue.id_usuario
                            LEFT JOIN empresas AS e ON e.id = ue.id_empresa "
                        .($condicion ? Self::Condicionales($condicion)              : '' )
                        .( $offset   ? " ORDER BY id DESC LIMIT 15 OFFSET ".$offset : '' ); 
                        // return $consulta;
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->resp[] = $arr;
            }
            return $this->resp;
        }

        public function Usuario_Empresa_old($user){
            $consulta = 'SELECT uc.id_empresa, c.nombre as nombre
                         FROM user_empresas as uc
                            LEFT JOIN usuarios AS u ON u.id = uc.id_user
                            LEFT JOIN empresas AS c ON c.id = uc.id_empresa
                         WHERE u.usuario = "'.$user.'"
                            AND uc.state = "AC"';            
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->resp[] = $arr;
            }
            return $this->resp;
        }

        public function Autenticar($para){                
            $consulta = "SELECT id, nombre1, apellido1, roluser, fechapago, password FROM usuarios WHERE usuario = '".$para["usuario"]."'";
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            while ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contrasena = $arr["password"]; 
                if(password_verify( $para["password"], $contrasena)){                    
                    // Variables de retorno
                    $this->resp["OK"]  = "OK";
                    $this->resp["homepage"]  = Self::Home_Page( $arr["roluser"] );      
                     
                    //Asignacion de variables de sesion
                    session_start();
                    $_SESSION["gv_iduser"]        = $arr["id"];
                    $_SESSION["gv_usuario"]       = $para["usuario"];
                    $_SESSION["gv_idempresa"]     = $para["id_empresa"];
                    $_SESSION["gv_empresa"]       = $para["empresa"];
                    $_SESSION["gv_nombre"]        = $arr["nombre1"]." ".$arr["apellido1"];
                    $_SESSION["gv_rol"]           = $arr["roluser"];
                    $_SESSION["gv_pago"]          = Self::Validar_Pago( $arr["fechapago"] );

                }
            }
            return $this->resp;
        }

        public function Ver($id){
            $consulta = "SELECT  u.*, r.descripcion as descrol, e.nombre as eps,
                            a2.id as id_dpto,
                            CONCAT(UPPER(SUBSTRING(a1.nomarea,1,1)),LOWER(SUBSTRING(a1.nomarea,2))) AS muni,
                            CONCAT(UPPER(SUBSTRING(a2.nomarea,1,1)),LOWER(SUBSTRING(a2.nomarea,2))) AS dpto,
                            CASE 
                                WHEN u.state = 'AC' THEN 'Activo'
                                ELSE 'Inactivo'
                            END AS  estado_f
                        FROM usuarios u
                            LEFT JOIN roles r ON r.id = u.roluser
                            LEFT JOIN areas AS a1 ON u.id_area = a1.id
                            LEFT JOIN areas AS a2 ON a1.padre = a2.id
                            LEFT JOIN entidades AS e ON u.pac_id_eps = e.id
                        WHERE u.id = ".$id;
            $stmt = $this->db->prepare($consulta);
            $stmt->execute();
            if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->resp = $arr;                 
            }
            return $this->resp;             
        }

        function Validar_Pago($entrada){
            $fecha_pago = $entrada;
            $date1 = new DateTime(date('Y-m-d', strtotime($fecha_pago)));
            $date2 = new DateTime("now");
            $diff = $date1->diff($date2);        
            $dif = 30 - $diff->days;
            $pago = null;
            if( $dif > 0 ){ $pago = "SI"; }else{ $pago = "NO"; } 
            $salida = $pago;
            return $salida;
        }

        function Home_Page($entrada){
            $salida = "/apps/error";
            if($entrada == 3){
                $salida = "/apps/rol-medico/estadisticas/resumen";
            }else if($entrada == 4){
                $salida = "/apps/rol-paciente/estadisticas/resumen";
            }else if($entrada == 1){
                $salida = "/apps/rol-administrador/estadisticas/resumen";
            }
            return $salida;
        }

        function Condicionales($entrada){
            $salida = "";
            if($entrada){
                foreach ($entrada as $clave => $valor) {
                   $salida .= $clave ." = '".$valor."' AND ";
                }
                $salida = " WHERE ".$salida;
                $salida = substr($salida, 0, -4);
            }            
            return $salida;
        }






    }

?>