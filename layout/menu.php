<?php
require_once __DIR__ . '/../lib/functions.php';

$utilisateur = currentUser();
?>
<nav class="main-nav">
    <ul>
        <li><a href="<?php echo SITE_URL ; ?>etudiant/index.php">Étudiants</a></li>
        <li class="social-media">
            <a href="#"><img src="<?php echo SITE_URL ; ?>images/facebook.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>images/instagram.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>images/linkedin.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>images/twitter.svg"></a>
            /li>
        <li><a href="<?php echo SITE_URL ; ?>entreprise/index.php">Entreprises</a></li>
       
    </ul>
</nav>


