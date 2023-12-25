<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | Ace Aptitude</title>
    <link rel="stylesheet" href="<?php echo base_url('css/sb-admin-pro/styles.css'); ?>">
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
</head>
<body class="nav-fixed">
    <?php require('partials/navbar.php'); ?>
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-xl px-4">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="user"></i></div>
                                        My Account
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="container-xl px-4 mt-4">
                    <nav class="nav nav-tabs card-header-tabs">
                        <a class="nav-link active" id="profile-tab" href="#profile" data-bs-toggle="tab" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        <a class="nav-link" id="security-tab" href="#security" data-bs-toggle="tab" role="tab" aria-controls="security" aria-selected="false">Security</a>
                        <a class="nav-link" id="notification-tab" href="#notification" data-bs-toggle="tab" role="tab" aria-controls="notification" aria-selected="false">Notifications</a>
                    </nav>

                    <hr class="mt-0 mb-4" />
                    
                    <div class="tab-content" id="cardTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card mb-4 mb-xl-0">
                                        <div class="card-header">Profile Picture</div>
                                        <div class="card-body text-center">
                                            <img class="img-account-profile rounded-circle mb-2" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/profiles/profile-1.png" alt="" />
                                            <i class="fa-solid fa-trash-can"></i>
                                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                            <button class="btn btn-primary" type="button">Upload new image</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="card mb-4">
                                        <div class="card-header">Account Details</div>
                                        <div class="card-body">
                                            <form action="<?php echo base_url('user/update-profile') ?>" method="post">
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="name">Name</label><span class="required"> *</span>
                                                        <input class="form-control <?php echo (isset($validation) && $validation->hasError('name'))?'is-invalid':'' ?>" id="name" name="name" type="text" placeholder="Enter your name" value="<?php echo (isset($validation)?$prev_data['name']:$profile['name']) ?>" />
                                                        <div id="nameFeedback" class="invalid-feedback">
                                                            <?= isset($validation) ? $validation->getError('name') : '' ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="mobile">Mobile</label><span class="required"> *</span>
                                                        <input class="form-control" id="mobile" name="mobile" type="tel" placeholder="Enter your mobile" value="<?php echo (isset($validation)?$prev_data['mobile']:$profile['phone']) ?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="email">Email address</label><span class="required"> *</span>
                                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email address" value="<?php echo (isset($validation)?$prev_data['email']:$profile['email']) ?>" readonly/>
                                                </div>

                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="dob">Birthday</label>
                                                        <input class="form-control <?php echo (isset($validation) && $validation->hasError('dob'))?'is-invalid':'' ?>" id="dob" name="dob" type="date" placeholder="Enter your birthday" value="<?php echo (isset($validation)?$prev_data['dob']:$profile['dob']) ?>" />
                                                        <div id="dobFeedback" class="invalid-feedback">
                                                            <?= isset($validation) ? $validation->getError('dob') : '' ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="gender">Gender</label>
                                                        <select class="form-control <?php echo (isset($validation) && $validation->hasError('gender'))?'is-invalid':'' ?>" id="gender" name="gender">
                                                            <option value="">Select gender</option>
                                                            <option value="female" <?php echo isset($validation)?(($prev_data['gender']=='female')?'selected':''):(($profile['gender']=='female')?'selected':''); ?>>Female</option>
                                                            <option value="male" <?php echo isset($validation)?(($prev_data['gender']=='male')?'selected':''):(($profile['gender']=='male')?'selected':''); ?>>Male</option>
                                                            <option value="other" <?php echo isset($validation)?(($prev_data['gender']=='other')?'selected':''):(($profile['gender']=='other')?'selected':''); ?>>Other</option>
                                                        </select>
                                                        <div id="genderFeedback" class="invalid-feedback">
                                                            <?= isset($validation) ? $validation->getError('gender') : '' ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-header">Change Password</div>
                                        <div class="card-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="currentPassword">Current Password</label>
                                                    <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="newPassword">New Password</label>
                                                    <input class="form-control" id="newPassword" type="password" placeholder="Enter new password" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                                    <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password" />
                                                </div>
                                                <button class="btn btn-primary" type="button">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-header">Delete Account</div>
                                        <div class="card-body">
                                            <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                                            <button class="btn btn-danger-soft text-danger disabled" type="button">I understand, delete my account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-header-actions mb-4">
                                        <div class="card-header">
                                            Notification Preferences
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" id="notificationStatus" type="checkbox" checked="" />
                                                <label class="form-check-label" for="notificationStatus"></label>
                                            </div>
                                            <div class="modal fade" id="notificationStatsConfirmation" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="notificationStatsConfirmationLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="notificationStatsConfirmationLabel">Notification Preferences</h5>
                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">Are you sure. By turning off this will not send any notifications including security and new feature updates</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" id="cancel">Close</button>
                                                            <button class="btn btn-primary" id="understood" type="button">Understood</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputNotificationEmail">Your email</label>
                                                    <input class="form-control" id="inputNotificationEmail" type="email" value="name@example.com" disabled="" />
                                                </div>
                                                <div class="mb-0" id="notificationChecklist">
                                                    <label class="small mb-2">Choose which types of email updates you receive</label>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" id="checkPromotional" type="checkbox" />
                                                        <label class="form-check-label" for="checkPromotional">Marketing and promotional offers</label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" id="checkProductUpdates" type="checkbox" checked="" />
                                                        <label class="form-check-label" for="checkProductUpdates">Updates for the services you've purchased</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="checkSecurity" type="checkbox" checked="" disabled="" />
                                                        <label class="form-check-label" for="checkSecurity">Security alerts</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php require('partials/footer.php'); ?>
        </div>
    </div>

    <div class="toast-container p-3 top-0 end-0" id="toastPlacement">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-white">
                <i data-feather="alert-circle"></i>
                <strong class="mr-auto toast-heading"><!-- Toast heading here --></strong>
                <button class="ml-2 mb-1 btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close">                                                            </button>
            </div>
            <div class="toast-body"><!-- Toast message here --></div>
        </div>
    </div>

    <script data-cfasync="false" src="<?php echo base_url('js/sb-admin-pro/email-decode.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/sb-admin-pro/scripts.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let success_message = "<?php echo session()->getFlashdata('success_message')?>"
            let error_message = "<?php echo session()->getFlashdata('error_message')?>"
            if (success_message || error_message) {
                if(success_message){
                    $('.toast-header').removeClass('bg-danger')
                    $('.toast-header').addClass('bg-success')
                    $('.toast-heading').text('Success')
                    $('.toast-body').text(success_message)
                } else{
                    $('.toast-header').removeClass('bg-success')
                    $('.toast-header').addClass('bg-danger')
                    $('.toast-heading').text('Oops')
                    $('.toast-body').text(error_message)
                }
                $('.toast').toast('show')
            }

            $('#notificationStatus').click(function() {
                if ($(this).prop('checked')) {
                    $('#checkSecurity').prop('disabled', true)
                    $('#checkSecurity').prop('checked', true)
                } else {
                    $('#notificationStatsConfirmation').modal('show')
                }
            })

            $('#understood').click(function() {
                $('#notificationChecklist input[type="checkbox"]').prop('checked', false)
                $('#notificationChecklist input[type="checkbox"]').prop('disabled', false)
                $('#notificationStatsConfirmation').modal('hide')
            })

            $('#cancel').click(function() {
                $('#notificationStatus').prop('checked', true)
            })

            $('#notificationChecklist input[type="checkbox"]').change(function() {
                var securityAlertsSelected = $('#checkSecurity').prop('checked')
                if (securityAlertsSelected) {
                    $('#checkSecurity').prop('disabled', true)
                } else {
                    $('#checkSecurity').prop('disabled', false)
                }
                var anyCheckboxSelected = $('#notificationChecklist input[type="checkbox"]:checked').length > 0
                $('#notificationStatus').prop('checked', anyCheckboxSelected)
            })

            $('.form-control').on('input', function() {
                $(this).removeClass('is-invalid')
            })
        })
    </script>
    
    <!-- SB Customizer -->
    <!-- <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
    <sb-customizer project="sb-admin-pro"></sb-customizer> -->
</body>
</html>
