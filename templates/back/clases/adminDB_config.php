<?php
    class db_config {
        private $host = "localhost";
        private $dbname = "post_graduate";
        private $user = "root";
        private $password = "";
        public $conn;
        
        public function DBconnect() {
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->password,
                                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
            }
            catch(PDOException $e) {
                echo "error: " . $e->getMessage();
            }
            return $this->conn;
        }
    }
?>