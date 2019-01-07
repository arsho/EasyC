<?php

require_once 'DB_Connection.php';

class Lesson_table_class extends DB_Connection {

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
        $query = $this->conn->prepare("SELECT * FROM `lesson_table`");
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id_or_name($pk_id_name) {
        $pk_id_name = "%" . $pk_id_name . "%";
        $query = $this->conn->prepare("SELECT * FROM `lesson_table` WHERE `lesson_id` LIKE ? or `lesson_title` LIKE ?");
        $query->bindValue(1, $pk_id_name);
        $query->bindValue(2, $pk_id_name);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id($pk_id) {
        $query = $this->conn->prepare("SELECT * FROM `lesson_table` WHERE `lesson_id`=?");
        $query->bindValue(1, $pk_id);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_single_attribute($single_attribute) {
        $query = $this->conn->prepare("SELECT * FROM `lesson_table` WHERE `lesson_category`=?");
        $query->bindValue(1, $single_attribute);
        $query->execute();
        return $query->fetchAll();
    }

    function add_row($data) {
        try {
            $query = $this->conn->prepare("INSERT INTO `lesson_table`(`lesson_title`, `lesson_details`, `lesson_media`, `lesson_tags`, `lesson_category`, `lesson_uploader`) VALUES (?,?,?,?,?,?)");
            $query->bindValue(1, $data["lesson_title"]);
            $query->bindValue(2, $data["lesson_details"]);
            $query->bindValue(3, $data["lesson_media"]);
            $query->bindValue(4, $data["lesson_tags"]);
            $query->bindValue(5, $data["lesson_category"]);
            $query->bindValue(6, $data["lesson_uploader"]);
            $query->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_row($data) {
        try {
            $query = $this->conn->prepare("UPDATE `lesson_table` SET `lesson_title`=?,`lesson_details`=?,`lesson_media`=?,`lesson_tags`=?,`lesson_category`=?, `lesson_uploader`=? WHERE `lesson_id`=?");
            $query->bindValue(1, $data["lesson_title"]);
            $query->bindValue(2, $data["lesson_details"]);
            $query->bindValue(3, $data["lesson_media"]);
            $query->bindValue(4, $data["lesson_tags"]);
            $query->bindValue(5, $data["lesson_category"]);
            $query->bindValue(6, $data["lesson_uploader"]);
            $query->bindValue(7, $data["lesson_id"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function delete_row($pk_id) {
        try {
            $query = $this->conn->prepare("DELETE FROM `lesson_table` WHERE `lesson_id`=?");
            $query->bindValue(1, $pk_id);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>
