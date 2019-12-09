<?php 
    class DB{
        protected static $conexion;
        private function _construct(){
            try{
                self::$conexion = new PDO(
                    'mysql:charset=utf8mb4; host=localhost; dbname=diverpark','root',''
                );
                self:: $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self:: $conexion ->setAttribute(PDO::ATTR_PERSISTENT, false);
            }
            catch (PDOException $e){
                echo "Error de conexion";
                exit;
            }
        }    
        public static function getConn(){
            if (!self::$conexion) {
                new DB();
            }
            return self::$conexion;
        }
    
        
    }
?>