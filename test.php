
<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

getHeader("Espace étudiant");
?>

<h1>Etudiant</h1>



<div class="informations">
            <img src="avatar.png">
            <h2 id="nom">Erwan Huguet 31 ans</h2>
            <p>blablabla@gmail.com</p>
            <p>numero de telephone</p>
            <p>Niveau d'études actuel : </p>
            <p>Spécialités : </p>
            <form method="POST" action="upload-cv.php" enctype="multipart/form-data">
     CV : <input type="file" name="cv">
     <input type="submit" name="envoyer" value="Envoyer le fichier">
     
</form>

        </div>
       



<?php require_once 'layout/footer.php'; ?>
