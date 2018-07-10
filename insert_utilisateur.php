<?php
require_once 'model/database.php';


session_start();

$email = $_POST['email'];
$mot_de_passe = $_POST['password'];
$type = $_POST['type'];
        
insertUtilisateur($email, $mot_de_passe, $type);

header("Location: attente.php");





