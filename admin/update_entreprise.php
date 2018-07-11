<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$utilisateur_id = $_POST["entreprise_id"];
$actif = ($_POST["actif"] == "true") ? 1 : 0;

$validation = updateEntrepriseActif($utilisateur_id, $actif);




echo json_encode([]);