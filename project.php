<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

// Vérifier si le paramètre id est bien présent dans l'URL
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: 404.php");
}

$id = $_GET["id"];

$project = getOneProject($id);
$list_members = getAllMembersByProject($id);
$list_pictures = getAllPicturesByProject($id);

getHeader($project["title"]);
?>

<section class="container">
    <h1><?php echo $project["title"]; ?></h1>
    <p>Date de début du projet : <?php echo $project["date_start_format"]; ?></p>
    <p>
        <?php if (is_numeric($project["days"])) : ?>
            Ce projet a duré <?php echo $project["days"]; ?> jours.
        <?php else: ?>
            Ce projet est en cours de réalisation.
        <?php endif; ?>
    </p>
    <img src="uploads/<?php echo $project["picture"]; ?>" alt="">
    <p><?php echo $project["description"]; ?></p>

    <h2>Membres ayant participés au projet</h2>
    <?php foreach ($list_members as $member) : ?>
        <article>
            <h3><?php echo $member["fullname"]; ?></h3>
            <img src="uploads/<?php echo $member["picture"]; ?>" alt="">
        </article>
    <?php endforeach; ?>

    <h2>Photos</h2>
    <?php foreach ($list_pictures as $picture) : ?>
        <img src="uploads/<?php echo $picture["filename"]; ?>" alt="<?php echo $picture["alt"]; ?>">
    <?php endforeach; ?>
    
</section>

<?php getFooter(); ?>