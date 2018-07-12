<?php

require_once '../lib/functions.php';
require_once '../model/database.php';

$user = currentUser();
$etudiant = getEtudiant($user["id"]);

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$date_naissance = $_POST['datenaissance'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$niveau_etude = $_POST['niveau_etude'];
$debut_contrat = $_POST['debut_contrat'];
$fin_contrat = $_POST['fin_contrat'];

$cv = $etudiant["cv"];
$lm = $etudiant["lm"];

if ($_FILES["cv"]["error"] == 0) {
    $filename = basename($_FILES["cv"]["name"]);
    $target_file = "../uploads/" . $filename;
    move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file);
    $cv = $filename;
}

if ($_FILES["lm"]["error"] == 0) {
    $filename = basename($_FILES["lm"]["name"]);
    $target_file = "../uploads/" . $filename;
    move_uploaded_file($_FILES["lm"]["tmp_name"], $target_file);
    $lm = $filename;
}

updateEtudiant($nom, $prenom, $date_naissance, $email, $telephone, $user["id"], $niveau_etude, $cv, $lm, $debut_contrat, $fin_contrat);

header("Location: index.php");





