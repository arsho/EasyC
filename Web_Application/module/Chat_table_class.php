<?php

require_once 'DB_Connection.php';

class Chat_table_class extends DB_Connection {

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
        $query = $this->conn->prepare("SELECT * FROM `chat_table` order by `chat_date` desc");
        $query->execute();
        return $query->fetchAll();
    }
    function get_all_row_limit_50() {
        $query = $this->conn->prepare("SELECT * FROM `chat_table` order by `chat_date` desc LIMIT 50");
        $query->execute();
        return $query->fetchAll();
    }
//    function get_row_using_id_or_name($pk_id_name) {
//        $pk_id_name = "%" . $pk_id_name . "%";
//        $query = $this->conn->prepare("SELECT * FROM `chat_table` WHERE `chat_id` LIKE ? or `chat_name` LIKE ?");
//        $query->bindValue(1, $pk_id_name);
//        $query->bindValue(2, $pk_id_name);
//        $query->execute();
//        return $query->fetchAll();
//    }

    function get_row_using_id($pk_id) {
        $query = $this->conn->prepare("SELECT * FROM `chat_table` WHERE `chat_id`=?");
        $query->bindValue(1, $pk_id);
        $query->execute();
        return $query->fetchAll();
    }

//    function get_row_using_single_attribute($single_attribute) {
//        $query = $this->conn->prepare("SELECT * FROM `lesson_table` WHERE `lesson_category`=?");
//        $query->bindValue(1, $single_attribute);
//        $query->execute();
//        return $query->fetchAll();
//    }

    function add_row($data) {
        try {
            $query = $this->conn->prepare("INSERT INTO `chat_table`( `chat_username`, `chat_user_photo`, `chat_message`, `chat_date`) VALUES (?,?,?,?)");
            $query->bindValue(1, $data["chat_username"]);
            $query->bindValue(2, $data["chat_user_photo"]);
            $query->bindValue(3, $data["chat_message"]);
            $query->bindValue(4, $data["chat_date"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_row($data) {
        try {
            $query = $this->conn->prepare("UPDATE `chat_table` SET `chat_username`=?,`chat_user_photo`=?,`chat_message`=?,`chat_date`=? WHERE `chat_id`=?");
            $query->bindValue(1, $data["chat_username"]);
            $query->bindValue(2, $data["chat_user_photo"]);
            $query->bindValue(3, $data["chat_message"]);
            $query->bindValue(4, $data["chat_date"]);
            $query->bindValue(5, $data["chat_id"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function delete_row($pk_id) {
        try {
            $query = $this->conn->prepare("DELETE FROM `chat_table` WHERE `chat_id`=?");
            $query->bindValue(1, $pk_id);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>