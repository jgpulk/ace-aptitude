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
                    <div id="editor_holder"></div>
                    <button class="btn btn-primary" id="getJSON" type="submit">Generate</button>
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
    <script src="<?php echo base_url('js/jsoneditor.js') ?>"></script>
    <script>
        let schema =  {
            "title": "Define a new test",
            "type": "object",
            "properties": {
                "name": {
                    "type": "string",
                    "title": "Name of test",
                    "minLength": 4,
                    "default": 'Test Definfition - ' + Math.ceil(Math.random()*1000)
                },
                "sections": {
                    "type": "array",
                    "format": "table",
                    "title": "Sections",
                    "uniqueItems": true,
                    "items": {
                        "type": "object",
                        "title": "Section",
                        "properties": {
                            "name": {
                                "type": "string",
                                "title": "Name",
                                "enum": [
                                    "Aptitude",
                                    "Reasoning",
                                    "Logical",
                                    "Quantative"
                                ]
                            },
                            "easy": {
                                "type": "number",
                                "title": "Easy"
                            },
                            "medium": {
                                "type": "number",
                                "title": "Medium"
                            },
                            "hard": {
                                "type": "number",
                                "title": "Hard"
                            },
                            "total": {
                                "type": "number",
                                "title": "Total"
                            }
                        }
                    },
                    "default": [
                        {
                            "name": "Aptitude",
                            "easy": 1,
                            "medium": 1,
                            "hard": 1,
                            "total": 3
                        }
                    ]
                }
            }
        }

        // Initialize the editor
        var editor = new JSONEditor(document.getElementById('editor_holder'),{
            schema: schema,
            theme: 'bootstrap5',
            iconlib: 'fontawesome5',
            format: 'grid'
        });

        $(document).ready(function() {
            $('#getJSON').on('click',function(e) {
                let generate = true
                let jsonData = editor.getValue()
                console.log(jsonData);
                if(!(jsonData.name && jsonData != '')){
                    generate = false
                    alert('Invalid test name')
                    return
                }
                if(!(jsonData.sections)){
                    generate = false
                    alert('sections data not found')
                    return
                }
                if(jsonData.sections.length == 0){
                    generate = false
                    alert('At least one section need to be selected')
                    return
                }
                jsonData.sections.forEach(section => {
                    if(section.easy==0 && section.medium==0 && section.hard==0 && section.total==0){
                        generate = false
                        alert('Atleast 1 question need to be added')
                        return
                    }

                    if(section.easy + section.medium + section.hard!=section.total){
                        generate = false
                        alert('Invalid total count')
                        return
                    }
                });
                if(generate){
                    $.ajax({
                        url: '<?= site_url('admin/add-test-definition'); ?>',
                        type: 'POST',
                        data: JSON.stringify({
                            definition: jsonData
                        }),
                        processData: false,
                        contentType: 'application/json',
                        dataType: 'json',
                        success: function (response, textStatus, xhr) {
                            console.log(response);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        }
                    });
                } else{
                    alert("Test defintion validation failed on user end");
                }
            })
        })
    </script>
</body>
</html>