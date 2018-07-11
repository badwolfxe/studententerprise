<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

getHeader("Espace Admin");
?>

<h1>Admin</h1>

<p>Controle de la plateforme</p>

<div>
    
</div>


<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>