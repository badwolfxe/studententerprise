<?php
require_once 'model/database.php';


session_start();

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$date_naissance = $_POST['date_naissance'];
$telephone = $_POST['telephone'];
$niveau_etude = $_POST['niveau_etude'];
$specialite = $_POST['specialite'];
$email = $_POST['email'];  
        
updateEtudiant($prenom, $email, $date_naissance, $telephone, $niveau_etude, $specialite);

header("Location: attente.php");





