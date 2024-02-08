<?php

class DbConnect{

    private $username = "macono";
    private $password = "";
    private $dbName = "noteborde";
    private $port = "5432";
    private $host = "localhost";
    private $dbconn;

    private function fixBool(bool $bool)
    {
        if ($bool == true){
            return "TRUE";
        }else{
            return "FALSE";
        }
    }

    public function connect()
    {
        $this->dbconn = pg_connect("host= $this->host port= $this->port dbname= $this->dbName user= $this->username password= $this->password ");
    }

    public function addNote(object $note)
    {
        $row = ['auther' => $note->auther, 'uid' => $note->uid,'note' => $note->note,'compleated' => $this->fixbool($note->compleated)];
        $res = pg_insert($this->dbconn, 'notes', $row, PGSQL_DML_ESCAPE);
        if(!$res) {
            echo "ERROR: data not set!\n";
        }
    }

    public function seeStuff(string $sqlQuery)
    {
        return pg_query($this->dbconn, $sqlQuery);
    }

    function __destruct()
    {
        pg_close($this->dbconn);
    }

}
