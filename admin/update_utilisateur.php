<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$utilisateur_id = $_POST["utilisateur_id"];
$actif = ($_POST["actif"] == "true") ? 1 : 0;

$validation = updateUtilisateurActif($utilisateur_id, $actif);




echo json_encode([]);