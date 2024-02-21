<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include "Note.class.php";
include "DbConnect.class.php";
include "NoteController.class.php";

$testNote = new Note("AutherStuffTbh", "the not to test ti see if it works", false);

$db = new DbConnect();
$notecont = new NoteController($db);
$db->connect();
$notecont->addNote($testNote);

//$db->runSQL("CREATE TABLE notes (auther TEXT NOT NULL, UID TEXT NOT NULL, note TEXT NOT NULL, compleated BOOLEAN NOT NULL)");
//do not use unless you dont have a tabel in the data base



