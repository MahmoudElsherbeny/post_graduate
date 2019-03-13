<?php
    class basicData {
        private $conn;
        
        public function __construct($db) {
            $this->conn = $db;
        }
        
        public function last_id($table,$idName) {
            $sql = "SELECT $idName FROM $table ORDER BY $idName DESC LIMIT 1";
            $result = $this->conn->query($sql);
            $row = $result->fetch();
            return $row[$idName];
        }
        
        public function select_admin($username) {
            $sql = "SELECT u.user_id,username,isadmin
                           FROM users u,user_admin a 
                           WHERE u.user_id = a.user_id and username=?";
            $result = $this->conn->prepare($sql);
            $result->execute(array($username));
            while($row = $result->fetch()) {
                return $row;
            }
        }
        
        public function select_governorat() {
            $sql = "SELECT * FROM governorates";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['gov_name']}' >{$row['gov_name']}</option>";
            }
        }
        
        public function select_degree() {
            $sql = "SELECT * FROM degree";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['degree_name']}' >{$row['degree_name']}</option>";
            }
        }
        
        public function select_specialize() {
            $sql = "SELECT * FROM specialization ORDER BY dep_name";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['spec_name']}' >{$row['spec_name']}</option>";
            }
        }
        
        public function select_studyear() {
            $sql = "SELECT * FROM study_year";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['study_year']}' >{$row['study_year']}</option>";
            }
        }
        
        public function select_grade() {
            $sql = "SELECT * FROM grades";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['grade']}' >{$row['grade']}</option>";
            }
        }
        
        public function select_faculty() {
            $sql = "SELECT * FROM faculties";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['fac_name']}' >{$row['fac_name']}</option>";
            }
        }
        
        public function select_university() {
            $sql = "SELECT * FROM universities";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['univ_name']}' >{$row['univ_name']}</option>";
            }
        }
        
        public function select_nationality() {
            $sql = "SELECT * FROM nationalities";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['nationality']}' >{$row['nationality']}</option>";
            }
        }
        
        public function select_department() {
            $sql = "SELECT * FROM departments ORDER BY dep_id";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['dep_name']}' >{$row['dep_name']}</option>";
            }
        }
        
        public function select_ranks() {
            $sql = "SELECT * FROM supervisors_rank";
            $result = $this->conn->query($sql);
            while($row = $result->fetch()) {
                echo "<option value='{$row['rank']}' >{$row['rank']}</option>";
            }
        }
    }
?>