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

        .loader {
            width: 48px;
            height: 48px;
            border: 5px solid #0061f2;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 2s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
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
                                        <div class="page-header-icon"><i data-feather="upload"></i></div>
                                        Import Questions
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
                    <div class="card">
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
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require(__DIR__ . '/../common/toast.php'); ?>

    <!-- <div class="toast position-absolute bottom-0 end-0 m-4" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i data-feather="check-circle"></i>
            <strong class="mr-auto toast-heading">Toast heading</strong>
            <button class="ml-2 mb-1 btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close">                                                            </button>
        </div>
        <div class="toast-body">Toast message here</div>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/sb-admin-pro/scripts.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/toast.js') ?>"></script>
    <script>
        let current_tab = '<?php echo $active_tab; ?>'
        $(document).ready(function() {
            if(current_tab=='import_qstn'){
                $('#questionPool').removeClass('collapsed')
                $('#collapseQuestionPool').addClass('show')
            }

            $('#formUpload').on('submit',(function(e) {
                e.preventDefault(e);
                $('#loader').show()
                var formData = new FormData(document.getElementById('formUpload'));
                $.ajax({
                    url: '<?= site_url('admin/import_questions'); ?>',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response, textStatus, xhr) {
                        $('#loader').hide()
                        if(response.status){
                            show_toast('success',response.message)
                        } else{
                            if(response.errors){
                                $.each(response.errors, function(field, message) {
                                    $('[name="' + field + '"]').addClass('is-invalid');
                                    $('[name="' + field + '"]').next('div').text(message)
                                });
                            }
                            show_toast('error',response.message)
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#loader').hide()
                        let errorResponse = JSON.parse(xhr.responseText)
                        show_toast('500 - Internal Server Error',errorResponse.message)
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
            }))

            $('#uploadFile').change(function(e){
                e.preventDefault(e);
                $('#importBtn').attr('disabled', false)
                $('#excelErrors').empty().hide()
                $('#loader').show()
                var formData = new FormData(document.getElementById('formUpload'));
                $.ajax({
                    url: '<?= site_url('admin/validate_import_questions'); ?>',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response, textStatus, xhr) {
                        $('#loader').hide()
                        if(response.status){
                            show_toast('success',response.message)
                            $('#importBtn').attr('disabled', false)
                        } else{
                            show_toast('error',response.message)
                            $('#importBtn').attr('disabled', true)
                            if(response.errors){
                                $.each(response.errors, function(field, message) {
                                    $('[name="' + field + '"]').addClass('is-invalid')
                                    $('[name="' + field + '"]').next('div').text(message)
                                });
                            }
                            if(response.excel_errors){
                                $('#excelErrors').empty()
                                let ulElement = $('<ul>')
                                $.each(response.excel_errors, function(index, error) {
                                    ulElement.append('<li>' + error + '</li>')
                                });
                                $('#excelErrors').append(ulElement)
                                $('#excelErrors').show()
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#loader').hide()
                        let errorResponse = JSON.parse(xhr.responseText)
                        show_toast('500 - Internal Server Error',errorResponse.message)
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
            })

            $('.form-control').on('input', function() {
                $(this).removeClass('is-invalid')
                $('#importBtn').attr('disabled', false)
            })
        })
    </script>
</body>
</html>