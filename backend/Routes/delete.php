<?php

include "Dbconnect.class.php";
include "Note.class.php";
include "NoteController.class.php";

$db = new DbConnect;
$noteController = new NoteController($db);
$db->connect();



