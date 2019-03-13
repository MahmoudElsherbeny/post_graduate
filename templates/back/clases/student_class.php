<?php
    class student {
        private $conn;
        
        public function __construct($db) {
            $this->conn = $db;
        }
        
        public function show_student_data($id) {
            $sql = "SELECT * FROM students s,student_degrees sd, student_degree_study sds
		                     WHERE s.national_id = sd.std_id AND s.national_id = sds.std_id 
                             AND national_id=$id";
            $result = $this->conn->query($sql);
            
            while($row = $result->fetch()){
                return $row;
            }
        }
    }
?>