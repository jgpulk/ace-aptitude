<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Ace Aptitude</title>
    <link rel="icon" type="image/x-icon" href="https://seeklogo.com/images/E/education-circle-logo-7FB9212F5A-seeklogo.com.png" />
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

                <!-- Main page content-->
                <div class="container-xl px-4 mt-4">
                    <!-- Account page navigation-->
                    <nav class="nav nav-borders">
                        <a class="nav-link active ms-0" href="<?php echo base_url('user/account') ?>">Profile</a>
                        <a class="nav-link" href="#security">Security</a>
                        <a class="nav-link" href="#notification">Notifications</a>
                    </nav>
                    <hr class="mt-0 mb-4" />
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <img class="img-account-profile rounded-circle mb-2" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/profiles/profile-1.png" alt="" />
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                    <button class="btn btn-primary" type="button">Upload new image</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="name">Name</label><span class="required"> *</span>
                                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" value="Valerie" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="mobile">Mobile</label><span class="required"> *</span>
                                                <input class="form-control" id="mobile" name="mobile" type="tel" placeholder="Enter your mobile" value="+919*4*8*3**9" disabled/>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="email">Email address</label><span class="required"> *</span>
                                            <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email address" value="jg****@gmail.com" disabled/>
                                        </div>

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="dob">Birthday</label>
                                                <input class="form-control" id="dob" name="dob" type="date" placeholder="Enter your birthday" value="1999-01-28" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="gender">Gender</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="">Select gender</option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                    <option value="other">Other</option>
                                                    <option value="-1">Rather not to say</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Are you enrolled on college/School -> Yes or No picker -> if yes get collge details other wise job details -->
                                        <!-- Save changes button-->
                                        <button class="btn btn-primary" type="button">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php require('partials/footer.php'); ?>
        </div>
    </div>

    <script data-cfasync="false" src="<?php echo base_url('js/sb-admin-pro/email-decode.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/sb-admin-pro/scripts.js') ?>"></script>
    
    <!-- SB Customizer -->
    <!-- <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
    <sb-customizer project="sb-admin-pro"></sb-customizer> -->
</body>
</html>
