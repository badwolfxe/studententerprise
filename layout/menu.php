<?php
require_once __DIR__ . '/../lib/functions.php';

$utilisateur = currentUser();
?>
<nav class="main-nav dekstop">
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

<nav role="navigation" class="navigation mobile">
  <div id="menuToggle" class="menuToggle">
    <input type="checkbox" />
   
    <span></span>
    <span></span>
    <span></span>
    <div id="menu">
    <ul>
        <li><a href="<?php echo SITE_URL ; ?>etudiant/index.php">Étudiants</a></li>
        <li class="social-media">
            <a href="#"><img src="<?php echo SITE_URL ; ?>images/facebook.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>images/instagram.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>images/linkedin.svg"></a>
            <a href="#"><img src="<?php echo SITE_URL ; ?>images/twitter.svg"></a>
            </li>
        <li><a href="<?php echo SITE_URL ; ?>entreprise/index.php">Entreprises</a></li>
    </ul>
</div>

  </div>
</nav>

