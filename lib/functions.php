<?php
if (!isset($_SESSION)) {
    session_start();
}

/**
 * Debugger une variable
 * @param mixed $var La variable à afficher
 * @param bool $die Arrêter l'execution
 */
function debug($var, bool $die = true) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if ($die) {
        die;
    }
}

function currentUser() {
    if (isset($_SESSION["id"])) {
        return getOneUser($_SESSION["id"]);
    }
    return null;
}

/**
 * Récupérer le chemin actuel (sans le nom du fichier)
 * @return string Path
 */
function currentPath() {
    return "http://" . $_SERVER["HTTP_HOST"] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
}

function getHeader(string $title) {
    require_once 'layout/header.php';
}

function getFooter() {
    require_once 'layout/footer.php';
}

function getMenu() {
    require_once 'layout/menu.php';
}