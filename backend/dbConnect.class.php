<?php

class DbConnect{

    private $username = "macono";
    private $password = "";
    private $dbName = "noteborde";
    private $port = "5432";
    private $dbPDO;

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
        $this->dbPDO = new PDO('pgsql:host=localhost;dbname=noteborde', $this->username, $this->password);
        $this->dbPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //to see errors
    }

    public function runSQL(string $sql)
    {
        $this->dbPDO->exec($sql);
    }

    public function saveNote(object $note)
    {
        //$this->dbPDO->exec('INSERT INTO notes (auther, uid, note, compleated) VALUES (\'' .$note->auther .'\',\'' .$note->uid .'\',\'' .$note->note.'\','.$this->fixBool($note->compleated) .');');
        echo('INSERT INTO notes (auther, uid, note, compleated) VALUES (\'' .$note->auther .'\',\'' .$note->uid .'\',\'' .$note->note.'\','.$this->fixBool($note->compleated) .');');
    }

    public function seeStuff()
    {
        $stmt = $this->dbPDO->query('SELECT * FROM notes');
        return $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }

    function __destruct()
    {
        $this->dbPDO = null;
    }

}
