<?php

require_once 'DB_Connection.php';

class User_ranklist_table_class extends DB_Connection {

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
        $query = $this->conn->prepare("SELECT * FROM `user_ranklist` order by `number_of_ac` desc");
        $query->execute();
        return $query->fetchAll();
    }


    function get_all_row_user($ranklist_username) {
        $query = $this->conn->prepare("SELECT * FROM `user_ranklist` where `ranklist_username`=?");
        $query->bindValue(1, $ranklist_username);
        $query->execute();
        return $query->fetchAll();
    }


    
    function add_row($data) {
        try {
            $query = $this->conn->prepare("INSERT INTO `user_ranklist`(`ranklist_username`, `number_of_ac`, `number_of_submissions`, `date_of_last_submission`) VALUES (?,?,?,?)");
            $query->bindValue(1, $data["ranklist_username"]);
            $query->bindValue(2, $data["number_of_ac"]);
            $query->bindValue(3, $data["number_of_submissions"]);
            $query->bindValue(4, $data["date_of_last_submission"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_row($data) {
        try {
            $query = $this->conn->prepare("UPDATE `user_ranklist` SET `number_of_ac`=?,`number_of_submissions`=?,`date_of_last_submission`=? WHERE `ranklist_username`=?");
            $query->bindValue(1, $data["number_of_ac"]);
            $query->bindValue(2, $data["number_of_submissions"]);
            $query->bindValue(3, $data["date_of_last_submission"]);
            $query->bindValue(4, $data["ranklist_username"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function delete_row($pk_id) {
        try {
            $query = $this->conn->prepare("DELETE FROM `user_ranklist` WHERE `ranklist_username`=?");
            $query->bindValue(1, $pk_id);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>