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

        
updateEtudiant($nom, $prenom, $date_naissance, $email, $telephone, $user["id"], $niveau_etude);

header("Location: update-profil.php");





