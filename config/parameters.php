<?php

define("DB_HOST", "localhost");
define("DB_NAME", "atelier-dc3");
define("DB_USER", "root");
define("DB_PASS", "root");

define("SITE_URL", "http://localhost/studententerprise/");
define("ADMIN_URL", SITE_URL . "admin/");

// Checkbox
$admin = isset($_POST["admin"]) ? 1 : 0;
