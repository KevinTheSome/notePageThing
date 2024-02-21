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
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = json_decode(file_get_contents("php://input"), true);
    $tmp = new Note($data["auther"],$data["note"],$data["boolComp"]);
    $noteController->addNote($tmp);
}



