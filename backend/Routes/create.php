<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include "../Dbconnect.class.php";
include "../Note.class.php";
include "../NoteController.class.php";

$db = new DbConnect;
$noteController = new NoteController($db);
$db->connect();
$data = json_decode(file_get_contents("php://input"), true);
var_dump($data);
//$noteController->addNote();



