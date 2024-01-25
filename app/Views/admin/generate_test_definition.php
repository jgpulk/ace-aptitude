<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Define Test</title>
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
            <main class="">
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-fluid px-4">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="layers"></i></div>
                                        Define Test
                                    </h1>
                                </div>
                                <div class="col-12 col-xl-auto mb-3">
                                    <a class="btn btn-sm btn-light text-primary" href="javascript:void(0);">
                                        <i class="me-1" data-feather="list"></i>
                                        List
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container">
                    <h1>Create Test Definition</h1>
                    <!-- <div class="card">
                        <div class="card-body">
                            <div align="right">
                                <a href="<?php echo base_url('assets/templates/Question Pool - Format.xlsx'); ?>">
                                    <button class="btn btn-outline-primary btn-sm text-end" type="button">
                                        <i data-feather="download"></i>
                                        <span>Sample template</span>
                                    </button>
                                </a>
                            </div>
                            <form action="" method="post" id="formUpload" class="mt-2">
                                <div class="mb-3">
                                    <label for="uploadFile" class="mb-1">Select file</label><span class="required"> *</span>
                                    <input class="form-control" id="uploadFile" name="upload_file" type="file">
                                    <div id="uploadFileFeedback" class="invalid-feedback">
                                    </div>
                                    <span class="loader mt-3" id="loader" style="display: none;"></span>
                                </div>
                                <div class="alert alert-danger" role="alert" id="excelErrors" style="display: none;">
                                </div>
                                <button class="btn btn-primary" id="importBtn" type="submit" disabled>Upload</button>
                            </form>
                        </div>
                    </div> -->
                </div>
            </main>
        </div>
    </div>

    <?php require(__DIR__ . '/../common/toast.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/sb-admin-pro/scripts.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/toast.js') ?>"></script>
    <script>
        let current_tab = '<?php echo $active_tab; ?>'
        $(document).ready(function() {
            if(current_tab=='assessment'){
                $('#assessment').removeClass('collapsed')
                $('#collapseAssessment').addClass('show')
            }
        })
    </script>
</body>
</html>