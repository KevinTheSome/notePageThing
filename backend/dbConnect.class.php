<?php

class DbConnect{

    /*
        Can set needed parameters to connect to database
    */
    private $username = "macono";
    private $password = "";
    private $dbName = "noteborde";
    private $port = "5432";
    private $host = "localhost";
    public $dbconn;

    public function fixBool(bool $bool)  //php bools are stupid and now its a string
    {
        if ($bool == true){
            return "TRUE";
        }else{
            return "FALSE";
        }
    }

    public function connect() //connects to the db defualt postgresSQL
    {
        $this->dbconn = new PDO ('pgsql:host='.$this->host .';port='.$this->port .';dbname='.$this->dbName .';user=' .$this->username .';password=' .$this->password .'');
        $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        
    public function runSQL($sql) //runs sql this is only supposed to be used in the class
    {
        $this->dbconn->exec($sql);
    }

    function __destruct() //terminate the connactione to the db if not used anymore
    {
        $dbconn = null;
    }

}
