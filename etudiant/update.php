<?php

require_once '../lib/functions.php';
require_once '../model/database.php';

$user = currentUser();

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$date_naissance = $_POST['datenaissance'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$niveau_etude = $_POST['niveau_etude'];
$debut_contrat = $_POST['debut_contrat'];
$fin_contrat = $_POST['fin_contrat'];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name_file_cv = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        updateEtudiant($nom, $prenom, $date_naissance, $email, $telephone, $user["id"], $niveau_etude, $name_file_cv, $debut_contrat, $fin_contrat);
    } else {
        echo "Sorry, there was an error uploading your file. ";
    }
}


header("Location: index.php");





