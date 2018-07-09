<?php

require_once '../../../model/database.php';

$id = $_GET["id"];

$member = getOneEntity("member", $id);

deleteEntity("member", $id);

// Redirection vers la liste
header("Location: index.php");
