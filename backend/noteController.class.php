<?php

class NoteController{

    public $dbconnect;

    function __construct($dbconnect)
    {
        $this->dbconnect = $dbconnect;
    }

    public function addNote(object $note) // adds a note to the db
    {
        if ($this->dbconnect->dbconn != null){
            $input = "'" .$note->auther ."','" .$note->uid ."','" .$note->note ."'," . $this->dbconnect->fixBool($note->compleated) ."";
            $$this->dbconnect->runSQL('INSERT INTO notes (auther,uid,note,compleated) VALUES (' .$input .');');
        }else{
            echo "ERROR: Connactione = null";
        }
    }

    public function delNote(string $uid) //deleats a not from the db
    {
        $temp = "'$uid'";
        $this->dbconnect->runSQL('DELETE FROM notes WHERE uid=' .$temp .';');
    }

    public function updateNote(string $uid) //updates the compleated bool in the db
    {
        $tempUid = "'$uid'";
        $result = $this->dbconnect->dbconn->query('SELECT compleated FROM notes WHERE uid=' .$tempUid .';');
        $result->execute();
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result[0]["compleated"] == false){
            $tempBool ="TRUE";
        }else{
            $tempBool ="FALSE";
        }
        $this->dbconnect->runSQL('UPDATE notes SET compleated=' .$tempBool .' WHERE uid=' .$tempUid .';');
    }

    public function raedNotes() //return a string with all the noets
    {
        $result = $this->dbconnect->dbconn->query('SELECT * FROM notes ;');
        $result->execute();
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function __destruct() //terminate the connactione to the db if not used anymore
    {
        $dbconn = null;
    }

}
