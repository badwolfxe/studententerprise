<?php
require_once 'model/database.php';


session_start();

$email = $_POST['email'];
$mot_de_passe = $_POST['password'];     
        
insertUtilisateur($email, $mot_de_passe);

header("Location: attente.php");





