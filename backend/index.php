<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

echo json_encode(["test" => "Test if i can get the data from the backend/php"]);
