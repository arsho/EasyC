<?php

require_once 'DB_Connection.php';

class User_task_table_class extends DB_Connection {

    var $conn = "";

    function __construct() {
        parent::set_var();
        $servername = $this->servername;
        $dbname = $this->dbname;
        $username = $this->username;
        $password = $this->password;

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function get_all_row() {
        $query = $this->conn->prepare("SELECT * FROM `user_task_table`");
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id_or_name($pk_id_name) {
        $pk_id_name = "%" . $pk_id_name . "%";
        $query = $this->conn->prepare("SELECT * FROM `user_task_table` WHERE `company_id` LIKE ? or `company_name` LIKE ?");
        $query->bindValue(1, $pk_id_name);
        $query->bindValue(2, $pk_id_name);
        $query->execute();
        return $query->fetchAll();
    }

    function get_all_row_user($submission_username) {
        $query = $this->conn->prepare("SELECT * FROM `user_task_table` where `submission_username`=?  order by `submission_date` desc");
        $query->bindValue(1, $submission_username);

        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id_or_name_user($pk_id_name,$submission_username) {
        $pk_id_name = "%" . $pk_id_name . "%";
        $query = $this->conn->prepare("SELECT * FROM `user_task_table` WHERE `submission_username`=? and (`submission_task_id` LIKE ? or `submission_task_title` LIKE ?)  order by `submission_date` desc");
        $query->bindValue(1, $submission_username);
        $query->bindValue(2, $pk_id_name);
        $query->bindValue(3, $pk_id_name);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id($pk_id) {
        $query = $this->conn->prepare("SELECT * FROM `user_task_table` WHERE `submission_id`=?");
        $query->bindValue(1, $pk_id);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_single_attribute($single_attribute) {
        $query = $this->conn->prepare("SELECT * FROM `user_task_table` WHERE `submission_username`=?");
        $query->bindValue(1, $single_attribute);
        $query->execute();
        return $query->fetchAll();
    }

    function get_number_of_accepted_solution_in_a_category_of_user($submission_username, $submission_category) {
        $query = $this->conn->prepare("SELECT distinct(`submission_task_id`) FROM `user_task_table` WHERE `submission_username`=? and `submission_task_category`=? and `submission_verdict`='Accepted'");
        $query->bindValue(1, $submission_username);
        $query->bindValue(2, $submission_category);        
        $query->execute();
        return $query->fetchAll();
    }    
    
    function get_number_of_accepted_solution_of_a_task_of_user($submission_username, $submission_task_id) {
        $query = $this->conn->prepare("SELECT * FROM `user_task_table` WHERE `submission_username`=? and `submission_task_id`=? and `submission_verdict`='Accepted'");
        $query->bindValue(1, $submission_username);
        $query->bindValue(2, $submission_task_id);        
        $query->execute();
        return $query->fetchAll();
    }    
    
    function add_row($data) {
        try {
            $query = $this->conn->prepare("INSERT INTO `user_task_table`(`submission_username`, `submission_task_id`,`submission_task_title`, `submission_task_category`, `submission_verdict`, `submission_code`, `submission_date`) VALUES (?,?,?,?,?,?,?)");
            $query->bindValue(1, $data["submission_username"]);
            $query->bindValue(2, $data["submission_task_id"]);
            $query->bindValue(3, $data["submission_task_title"]);
            $query->bindValue(4, $data["submission_task_category"]);
            $query->bindValue(5, $data["submission_verdict"]);
            $query->bindValue(6, $data["submission_code"]);
            $query->bindValue(7, $data["submission_date"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_row($data) {
        try {
            $query = $this->conn->prepare("UPDATE `user_task_table` SET `submission_username`=?,`submission_task_id`=?,`submission_task_title`=?,`submission_task_category`=?,`submission_verdict`=?,`submission_code`=?,`submission_date`=? WHERE `submission_id`=?");
            $query->bindValue(1, $data["submission_username"]);
            $query->bindValue(2, $data["submission_task_id"]);
            $query->bindValue(3, $data["submission_task_title"]);
            $query->bindValue(4, $data["submission_task_category"]);
            $query->bindValue(5, $data["submission_verdict"]);
            $query->bindValue(6, $data["submission_code"]);
            $query->bindValue(7, $data["submission_date"]);
            $query->bindValue(8, $data["submission_id"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function delete_row($pk_id) {
        try {
            $query = $this->conn->prepare("DELETE FROM `user_task_table` WHERE `submission_id`=?");
            $query->bindValue(1, $pk_id);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>