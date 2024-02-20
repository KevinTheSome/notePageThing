<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include "Note.class.php";
include "DbConnect.class.php";
include "NoteController.class.php";


//$db->runSQL("CREATE TABLE notes (auther TEXT NOT NULL, UID TEXT NOT NULL, note TEXT NOT NULL, compleated BOOLEAN NOT NULL)");
//do not use unless you dont have a tabel in the data base

$data = json_decode(file_get_contents("php://input"), true);

