<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

include "note.class.php";
include "dbConnect.class.php";

$data = json_decode(file_get_contents("php://input"), true);

echo json_encode(["test" => "Test if i can get the data from the backend/php"]);
