<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="<?php echo base_url('css/sb-admin-pro/styles.css'); ?>">
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <style>
        .nav-fixed #layoutSidenav #layoutSidenav_content {
            padding-left: 15rem;
            top: 3.625rem;
        }
    </style>
</head>
<body class="nav-fixed">
    <?php require('partials/navbar.php'); ?>
    
    <div id="layoutSidenav">
        <?php require('partials/sidenavbar.php'); ?>
        <div id="layoutSidenav_content">
            <main class="container mt-4">
                <div>
                    Import Questions Section
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/sb-admin-pro/scripts.js') ?>"></script>
</body>
</html>