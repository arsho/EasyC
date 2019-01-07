<?php

require_once 'DB_Connection.php';

class Generic_table_class extends DB_Connection {

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
        $query = $this->conn->prepare("SELECT * FROM `company_info`");
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id_or_name($pk_id_name) {
        $pk_id_name = "%" . $pk_id_name . "%";
        $query = $this->conn->prepare("SELECT * FROM `company_info` WHERE `company_id` LIKE ? or `company_name` LIKE ?");
        $query->bindValue(1, $pk_id_name);
        $query->bindValue(2, $pk_id_name);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id($pk_id) {
        $query = $this->conn->prepare("SELECT * FROM `company_info` WHERE `company_id`=?");
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
            $query = $this->conn->prepare("INSERT INTO `company_info`(`company_name`, `company_country`, `company_address`, `company_email`, `company_phone`, `company_contractor`, `company_website`) VALUES (?,?,?,?,?,?,?)");
            $query->bindValue(1, $data["company_name"]);
            $query->bindValue(2, $data["company_country"]);
            $query->bindValue(3, $data["company_address"]);
            $query->bindValue(4, $data["company_email"]);
            $query->bindValue(5, $data["company_phone"]);
            $query->bindValue(6, $data["company_contractor"]);
            $query->bindValue(7, $data["company_website"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_row($data) {
        try {
            $query = $this->conn->prepare("UPDATE `company_info` SET `company_name`=?,`company_country`=?,`company_address`=?,`company_email`=?,`company_phone`=?,`company_contractor`=?,`company_website`=? WHERE `company_id`=?");
            $query->bindValue(1, $data["company_name"]);
            $query->bindValue(2, $data["company_country"]);
            $query->bindValue(3, $data["company_address"]);
            $query->bindValue(4, $data["company_email"]);
            $query->bindValue(5, $data["company_phone"]);
            $query->bindValue(6, $data["company_contractor"]);
            $query->bindValue(7, $data["company_website"]);
            $query->bindValue(8, $data["company_id"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function delete_row($pk_id) {
        try {
            $query = $this->conn->prepare("DELETE FROM `company_info` WHERE `company_id`=?");
            $query->bindValue(1, $pk_id);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>