<?php
require_once 'DB_Connection.php';
class Student_info_table_class extends DB_Connection{

    var $conn = "";

    function __construct() {
        parent::set_var();
        $servername=$this->servername;
        $dbname=$this->dbname;
        $username=$this->username;
        $password=$this->password;

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //Check student in student_info using student_reg_no
    function check_student_using_student_reg_no($student_reg_no) {
        $query = $this->conn->prepare("SELECT * FROM `student_info` WHERE `student_reg_no`=?");
        $query->bindValue(1, $student_reg_no);
        $query->execute();
        $num = $query->rowCount();
        if ($num == 0) {
            return 0;
        }
        return 1;
    }    

    //Check student in student_info using student_email
    function check_student_using_student_email($student_email) {
        $query = $this->conn->prepare("SELECT * FROM `student_info` WHERE `student_email`=?");
        $query->bindValue(1, $student_email);
        $query->execute();
        $num = $query->rowCount();
        if ($num == 0) {
            return 0;
        }
        return 1;
    }    
    
    
    //Returns all students from student_info
    function get_all_student() {
        $query = $this->conn->prepare("SELECT * FROM `student_info`");
        $query->execute();
        return $query->fetchAll();
    }

    //Returns a specific student from student_info using student_reg_no
    function get_student_details_using_id($student_reg_no) {
        $query = $this->conn->prepare("SELECT * FROM `student_info` WHERE `student_reg_no`=?");
        $query->bindValue(1, $student_reg_no);
        $query->execute();
        return $query->fetchAll();
    }

    //Returns a specific student from student_info using student_email
    function get_student_details_using_email($student_email) {
        $query = $this->conn->prepare("SELECT * FROM `student_info` WHERE `student_email`=?");
        $query->bindValue(1, $student_email);
        $query->execute();
        return $query->fetchAll();
    }
    
    
    //Add student in student_info table
    function add_student($data) {
        try {
            $query = $this->conn->prepare("INSERT INTO `student_info`(`student_name`, `student_email`, `student_phone`, `student_gender`, `student_address`, `student_university`, `student_department`, `student_id`) VALUES (?,?,?,?,?,?,?,?)");
            $query->bindValue(1, $data["student_name"]);
            $query->bindValue(2, $data["student_email"]);
            $query->bindValue(3, $data["student_phone"]);
            $query->bindValue(4, $data["student_gender"]);
            $query->bindValue(5, $data["student_address"]);
            $query->bindValue(6, $data["student_university"]);
            $query->bindValue(7, $data["student_department"]);
            $query->bindValue(8, $data["student_id"]);
            $query->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            return "error";
        }
    }

    //Update student in student_info table using student_reg_no
    function update_student($data) {
        try {
            $query = $this->conn->prepare("UPDATE `student_info` SET `student_name`=?,`student_email`=?,`student_phone`=?,`student_gender`=?,`student_address`=?,`student_university`=?,`student_department`=?,`student_id`=? WHERE `student_reg_no`=?");
            $query->bindValue(1, $data["student_name"]);
            $query->bindValue(2, $data["student_email"]);
            $query->bindValue(3, $data["student_phone"]);
            $query->bindValue(4, $data["student_gender"]);
            $query->bindValue(5, $data["student_address"]);
            $query->bindValue(6, $data["student_university"]);
            $query->bindValue(7, $data["student_department"]);
            $query->bindValue(8, $data["student_id"]);
            $query->bindValue(9, $data["student_reg_no"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }    
    

    //Delete a student from student_info table using student_reg_no
    function delete_student($student_reg_no) {
        try {
            $query = $this->conn->prepare("DELETE FROM `student_info` WHERE `student_reg_no`=?");
            $query->bindValue(1, $student_reg_no);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


}

?>