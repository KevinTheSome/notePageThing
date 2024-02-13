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
        $this->dbconn = new PDO ('pgsql:host='.$this->host .';port='.$this->port .';dbname='.$this->dbName .';user=' .$this->username .';password=' .$this->password .'');
        $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function runSQL($sql){
        $this->dbconn->exec($sql);
    }

    public function addNote(object $note)
    {
        if ($this->dbconn != null){
            $input = "'" .$note->auther ."','" .$note->uid ."','" .$note->note ."'," .$this->fixBool($note->compleated) ."";
            $this->runSQL('INSERT INTO notes (auther,uid,note,compleated) VALUES (' .$input .');');
        }else{
            echo "ERROR: Connactione = null";
        }
    }

    public function delNote(string $uid)
    {
        $temp = "'$uid'";
        $this->runSQL('DELETE FROM notes WHERE uid=' .$temp .';');
    }

    public function updateNote(string $uid)
    {
        $tempUid = "'$uid'";
        $this->runSQL('UPDATE notes SET compleated ='   .'  uid=' .$tempUid .';');
    }

    function __destruct()
    {
        $dbconn = null;
    }

}
