<?php

require_once 'DB_Connection.php';

class User_table_class extends DB_Connection {

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
        $query = $this->conn->prepare("SELECT * FROM `user_table`");
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id_or_name($pk_id_name) {
        $pk_id_name = "%" . $pk_id_name . "%";
        $query = $this->conn->prepare("SELECT * FROM `user_table` WHERE `user_username` LIKE ? or `user_fullname` LIKE ?");
        $query->bindValue(1, $pk_id_name);
        $query->bindValue(2, $pk_id_name);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_id($pk_id) {
        $query = $this->conn->prepare("SELECT * FROM `user_table` WHERE `user_username`=?");
        $query->bindValue(1, $pk_id);
        $query->execute();
        return $query->fetchAll();
    }

    function get_row_using_single_attribute($single_attribute) {
        $query = $this->conn->prepare("SELECT * FROM `user_table` WHERE `user_username`=?");
        $query->bindValue(1, $single_attribute);
        $query->execute();
        return $query->fetchAll();
    }

    function update_password($user_username, $user_password) {
        try {
            $query = $this->conn->prepare("UPDATE `user_table` SET `user_password`=? WHERE `user_username`=?");
            $query->bindValue(1, $user_password);
            $query->bindValue(2, $user_username);

            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function get_row_using_double_attribute($attribute1, $attribute2) {
        $query = $this->conn->prepare("SELECT * FROM `user_table` WHERE binary `user_username`=? and `user_password`=?");
        $query->bindValue(1, $attribute1);
        $query->bindValue(2, $attribute2);
        $query->execute();
        return $query->fetchAll();
    }

    function add_row($data) {
        try {
            $query = $this->conn->prepare("INSERT INTO `user_table`(`user_username`, `user_password`, `user_email`, `user_fullname`, `user_city`, `user_country`, `user_occupation`, `user_institute`, `user_phone`, `user_website`, `user_github`, `user_bio`, `user_photo`, `user_role`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $query->bindValue(1, $data["user_username"]);
            $query->bindValue(2, $data["user_password"]);
            $query->bindValue(3, $data["user_email"]);
            $query->bindValue(4, $data["user_fullname"]);
            $query->bindValue(5, $data["user_city"]);
            $query->bindValue(6, $data["user_country"]);
            $query->bindValue(7, $data["user_occupation"]);
            $query->bindValue(8, $data["user_institute"]);
            $query->bindValue(9, $data["user_phone"]);
            $query->bindValue(10, $data["user_website"]);
            $query->bindValue(11, $data["user_github"]);
            $query->bindValue(12, $data["user_bio"]);
            $query->bindValue(13, $data["user_photo"]);
            $query->bindValue(14, $data["user_role"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_row($data) {
        try {
            $query = $this->conn->prepare("UPDATE `user_table` SET `user_fullname`=?,`user_city`=?,`user_country`=?,`user_occupation`=?,`user_institute`=?,`user_phone`=?,`user_website`=?,`user_github`=?,`user_bio`=?,`user_photo`=? WHERE `user_username`=?");
            $query->bindValue(1, $data["user_fullname"]);
            $query->bindValue(2, $data["user_city"]);
            $query->bindValue(3, $data["user_country"]);
            $query->bindValue(4, $data["user_occupation"]);
            $query->bindValue(5, $data["user_institute"]);
            $query->bindValue(6, $data["user_phone"]);
            $query->bindValue(7, $data["user_website"]);
            $query->bindValue(8, $data["user_github"]);
            $query->bindValue(9, $data["user_bio"]);
            $query->bindValue(10, $data["user_photo"]);
            $query->bindValue(11, $data["user_username"]);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function update_user_role($user_username, $user_role) {
        try {
            $query = $this->conn->prepare("UPDATE `user_table` SET `user_role`=? WHERE `user_username`=?");
            $query->bindValue(1, $user_role);
            $query->bindValue(2, $user_username);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function delete_row($pk_id) {
        try {
            $query = $this->conn->prepare("DELETE FROM `user_table` WHERE `user_username`=?");
            $query->bindValue(1, $pk_id);
            $query->execute();
            return 1;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>