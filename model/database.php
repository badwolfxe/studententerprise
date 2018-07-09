<?php

require_once __DIR__ . '/../config/parameters.php';

try {
    $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8', lc_time_names = 'fr_FR'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $ex) {
    echo "Erreur de la connexion à la BDD";
}

// Inclure automatiquement les fichiers PHP positionnés dans le dossier "entity"
$entity_dir = __DIR__ . "/entity/";
$files = scandir($entity_dir);
foreach ($files as $file) {
    if (is_file($entity_dir . $file) && pathinfo($entity_dir . $file, PATHINFO_EXTENSION) == "php") {
        require_once $entity_dir . $file;
    }
}

function getAllEntity(string $table) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT * FROM $table;";

    $stmt = $connection->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getOneEntity(string $table, int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT * FROM $table WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    return $stmt->fetch();
}

function deleteEntity(string $table, int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "DELETE FROM $table WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}