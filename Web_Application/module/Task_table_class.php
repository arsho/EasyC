<?php

require_once 'DB_Connection.php';

class Task_table_class extends DB_Connection {

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
        $query = $this->conn->prepare("SELECT * FROM `task_table`");
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id_or_name($pk_id_name) {
        $pk_id_name = "%" . $pk_id_name . "%";
        $query = $this->conn->prepare("SELECT * FROM `task_table` WHERE `task_id` LIKE ? or `task_title` LIKE ?");
        $query->bindValue(1, $pk_id_name);
        $query->bindValue(2, $pk_id_name);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id($pk_id) {
        $query = $this->conn->prepare("SELECT * FROM `task_table` WHERE `task_id`=?");
        $query->bindValue(1, $pk_id);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_single_attribute($single_attribute) {
        $query = $this->conn->prepare("SELECT * FROM `task_table` WHERE `task_category`=?");
        $query->bindValue(1, $single_attribute);
        $query->execute();
        return $query->fetchAll();
    }

    function add_row($data) {
        try {
            $query = $this->conn->prepare("INSERT INTO `task_table`(`task_title`, `task_details`, `task_input_file`, `task_output_file`, `task_hints`, `task_media`, `task_point`, `task_uploader`,`task_category`) VALUES (?,?,?,?,?,?,?,?,?)");
            $query->bindValue(1, $data["task_title"]);
            $query->bindValue(2, $data["task_details"]);
            $query->bindValue(3, $data["task_input_file"]);
            $query->bindValue(4, $data["task_output_file"]);
            $query->bindValue(5, $data["task_hints"]);
            $query->bindValue(6, $data["task_media"]);
            $query->bindValue(7, $data["task_point"]);
            $query->bindValue(8, $data["task_uploader"]);
            $query->bindValue(9, $data["task_category"]);
            $query->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_row($data) {
        try {
            $query = $this->conn->prepare("UPDATE `task_table` SET `task_title`=?,`task_details`=?,`task_input_file`=?,`task_output_file`=?,`task_hints`=?,`task_media`=?,`task_point`=?,`task_uploader`=?,`task_category`=? WHERE `task_id`=?");
            $query->bindValue(1, $data["task_title"]);
            $query->bindValue(2, $data["task_details"]);
            $query->bindValue(3, $data["task_input_file"]);
            $query->bindValue(4, $data["task_output_file"]);
            $query->bindValue(5, $data["task_hints"]);
            $query->bindValue(6, $data["task_media"]);
            $query->bindValue(7, $data["task_point"]);
            $query->bindValue(8, $data["task_uploader"]);
            $query->bindValue(9, $data["task_category"]);
            $query->bindValue(10, $data["task_id"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function delete_row($pk_id) {
        try {
            $query = $this->conn->prepare("DELETE FROM `task_table` WHERE `task_id`=?");
            $query->bindValue(1, $pk_id);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>