<?php
require_once __DIR__ . '/../lib/functions.php';

$utilisateur = currentUser();
?>
<nav class="main-nav">
    <ul>
        <li><a href="#">Universités</a></li>
        <li class="social-media">
            <a href="#"><img src="<?php echo SITE_URL ; ?>/images/facebook.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>/images/instagram.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>/images/linkedin.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>/images/twitter.svg"></a>
            /li>
        <li><a href="#">Espace étudiant</a></li>
        <!-- <?php if (!isset($utilisateur["id"])) : ?>
            <li><a href="#">Login</a></li>
        <?php else: ?>
            <li><a href="#">Mon Compte</a></li>
        <?php endif; ?> -->
    </ul>
</nav>


