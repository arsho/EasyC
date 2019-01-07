<?php

class DB_Connection {
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public function set_var() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "arsho";
        $this->dbname = "lnc_db";
    }

}
