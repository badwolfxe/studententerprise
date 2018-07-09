<?php
require_once __DIR__ . "/../../lib/functions.php";

$menus = [
    [
        "label" => "Dashboard",
        "url" => ADMIN_URL,
        "icon" => "home"
    ],
    [
        "label" => "Membres",
        "url" => ADMIN_URL . "crud/members/",
        "icon" => "users"
    ],
    [
        "label" => "Projets",
        "url" => ADMIN_URL . "crud/projects/",
        "icon" => "briefcase"
    ]
];
?>
<ul class="nav flex-column">
    <?php foreach ($menus as $menu) : ?>
        <li class="nav-item">
            <a class="nav-link <?php echo (currentPath() == $menu["url"]) ? "active" : ""; ?>" href="<?php echo $menu["url"]; ?>">
                <i class="fa fa-<?php echo $menu["icon"]; ?>"></i>
                <?php echo $menu["label"]; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>