<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include "note.class.php";
include "dbConnect.class.php";
$testNote = new Note("AutherOfTheNote","the note whats need to be saved",false);
$db = new DbConnect;
$db->connect();
$db->raedNotes();
//$db->runSQL("CREATE TABLE notes (auther TEXT NOT NULL, UID TEXT NOT NULL, note TEXT NOT NULL, compleated BOOLEAN NOT NULL)");
//do not use unless you dont have a tabel in the data base

$data = json_decode(file_get_contents("php://input"), true);

//echo json_encode(["test" => "Test if i can get the data from the backend/php"]);
