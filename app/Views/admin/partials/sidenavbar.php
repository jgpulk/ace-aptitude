<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Home</div>
                <a class="nav-link <?php echo ($active_tab=='dashboard')?'active':''?>" href="<?php echo site_url('admin/dashboard') ?>">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                    Dashboard
                </a>
                <a class="nav-link" href="javascript:void(0);">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                    User Management
                </a>
                <a class="nav-link collapsed <?php echo ($active_tab=='import_qstn')?'active':''?>" id="questionPool" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseQuestionPool" aria-expanded="false" aria-controls="collapseQuestionPool">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                    Question Pool
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseQuestionPool" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link <?php echo ($active_tab=='import_qstn')?'active':''?>" href="<?php echo site_url('admin/import_questions') ?>">Import</a>
                        <a class="nav-link" href="javascript:void(0);">List</a>
                    </nav>
                </div>
                <a class="nav-link collapsed <?php echo ($active_tab=='assessment')?'active':''?>" id="assessment" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseAssessment" aria-expanded="false" aria-controls="collapseAssessment">
                    <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                    Assessment
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAssessment" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link <?php echo ($active_tab=='assessment')?'active':''?>" href="<?php echo site_url('admin/define_test') ?>">Define Test</a>
                        <a class="nav-link" href="javascript:void(0);">Generate Test</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>