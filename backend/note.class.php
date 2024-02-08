<?php

class Note{

    public string $auther;
    public string $note;
    public bool $compleated;
    public $uid;

    function __construct($auther,$note,$compleated){
        $this->auther = $auther;
        $this->note = $note;
        $this->compleated = $compleated;
        $this->uid = uniqid();
    }

    function changeCompleated(bool $newState){
        $this->compleated = $newState;
    }

    function changeNote(string $newNote){
        $this->compleated = $newNote;
    }
}