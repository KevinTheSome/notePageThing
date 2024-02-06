<?php

class DbConnect{

    private $username = "";
    private $password = "";
    private $dbName = "";
    private $port = "";

    function connect(){

        $conn = new PDO("mysql:host=localhost;dbname=$this->dbName;port=$this->port", $this->username, $this->password);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
    }

}
