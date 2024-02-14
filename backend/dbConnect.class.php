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
    private $dbconn;

    private function fixBool(bool $bool)  //php bools are stupid
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

    private function runSQL($sql) //runs sql this is only supposed to be used in the class
    {
        $this->dbconn->exec($sql);
    }

    public function addNote(object $note) // adds a note to the db
    {
        if ($this->dbconn != null){
            $input = "'" .$note->auther ."','" .$note->uid ."','" .$note->note ."'," .$this->fixBool($note->compleated) ."";
            $this->runSQL('INSERT INTO notes (auther,uid,note,compleated) VALUES (' .$input .');');
        }else{
            echo "ERROR: Connactione = null";
        }
    }

    public function delNote(string $uid) //deleats a not from the db
    {
        $temp = "'$uid'";
        $this->runSQL('DELETE FROM notes WHERE uid=' .$temp .';');
    }

    public function updateNote(string $uid) //updates the compleated bool in the db
    {
        $tempUid = "'$uid'";
        $result = $this->dbconn->query('SELECT compleated FROM notes WHERE uid=' .$tempUid .';');
        $result->execute();
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result[0]["compleated"] == false){
            $tempBool ="TRUE";
        }else{
            $tempBool ="FALSE";
        }
        $this->runSQL('UPDATE notes SET compleated=' .$tempBool .' WHERE uid=' .$tempUid .';');
    }

    public function raedNotes() //return a json with all the noets
    {
        $result = $this->dbconn->query('SELECT * FROM notes ;');
        $result->execute();
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    function __destruct() //terminate the connactione to the db if not used anymore
    {
        $dbconn = null;
    }

}
