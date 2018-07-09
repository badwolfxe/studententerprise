<?php require_once __DIR__ . '/../security.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>node_modules/bootstrap/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>node_modules/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>node_modules/datatables/media/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"/>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>node_modules/select2/dist/css/select2.min.css"/>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>node_modules/summernote/dist/summernote.css"/>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>node_modules/summernote/dist/summernote-bs4.css"/>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>css/dashboard.css"/>
        <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>css/admin.css"/>
    </head>
    <body>

        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo ADMIN_URL; ?>">Admin</a>
            <ul class="navbar-nav px-3 flex-row">
                <li class="nav-item text-nowrap">
                    <a class="nav-link p-2" href="<?php echo ADMIN_URL; ?>logout.php"><i class="fa fa-sign-out"></i> Sign out</a>
                </li>
                <li class="nav-item text-no-wrap">
                    <a class="nav-link p-2" href="<?php echo SITE_URL; ?>"><i class="fa fa-external-link"></i> Front</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <?php require_once __DIR__ . '/menu.php'; ?>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
