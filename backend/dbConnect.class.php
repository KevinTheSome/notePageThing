<?php

class DbConnect{

    private $username = "macono";
    private $password = "";
    private $dbName = "noteborde";
    private $port = "5432";
    private $dbPDO;

    public function connect(){

        $this->dbPDO = new PDO('pgsql:host=localhost;dbname=noteborde', $this->username, $this->password);
        $this->dbPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //to see errors

    }

    public function runSQL(string $sql){
        $this->dbPDO->exec($sql);
    }

    function __destruct()
    {
        $this->dbPDO = null;
    }

}
