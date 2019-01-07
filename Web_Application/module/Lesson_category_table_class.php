<?php

require_once 'DB_Connection.php';

class Lesson_category_table_class extends DB_Connection {

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
        $query = $this->conn->prepare("SELECT * FROM `lesson_category_table`");
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id($pk_id) {
        $query = $this->conn->prepare("SELECT * FROM `lesson_category_table` WHERE `lesson_category_id`=?");
        $query->bindValue(1, $pk_id);
        $query->execute();
        return $query->fetchAll();
    }


    function add_row($data) {
        try {
            $query = $this->conn->prepare("INSERT INTO `lesson_category_table`(`lesson_category_title`) VALUES (?)");
            $query->bindValue(1, $data["lesson_category_title"]);
            $query->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_row($data) {
        try {
            $query = $this->conn->prepare("UPDATE `lesson_category_table` SET `lesson_category_title`=? WHERE `lesson_category_id`=?");
            $query->bindValue(1, $data["lesson_category_title"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function delete_row($pk_id) {
        try {
            $query = $this->conn->prepare("DELETE FROM `lesson_category_table` WHERE `lesson_category_id`=?");
            $query->bindValue(1, $pk_id);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>
