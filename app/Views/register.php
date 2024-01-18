<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Ace Aptitude</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/register.css')?>">
</head>
<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('https://images.pexels.com/photos/5905492/pexels-photo-5905492.jpeg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5">
                        <h3>Register</h3>
                        <p class="mb-4">"Believe you can and you're halfway there" -Theodore Roosevelt</p>

                        <!-- Alerts -->
                        <?php if (session()->getFlashdata('error_message') !== NULL){?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('error_message'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                        <!-- End of alerts -->
                        
                        <form action="<?php echo base_url('user/register') ?>" method="post">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <input type="text" class="form-control <?php echo (isset($validation) && $validation->hasError('name'))?'is-invalid':'' ?>" placeholder="Name" name="name" id="name" value="<?php echo (isset($validation)?$prev_data['name']:'') ?>">
                                        <div id="nameFeedback" class="invalid-feedback">
                                            <?= isset($validation) ? $validation->getError('name') : '' ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <input type="text" class="form-control <?php echo (isset($validation) && $validation->hasError('email'))?'is-invalid':'' ?>" placeholder="Email" name="email" id="email" value="<?php echo (isset($validation)?$prev_data['email']:'') ?>">
                                        <div id="nameFeedback" class="invalid-feedback">
                                            <?= isset($validation) ? $validation->getError('email') : '' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <input type="text" class="form-control <?php echo (isset($validation) && $validation->hasError('phone'))?'is-invalid':'' ?>" placeholder="Phone number" name="phone" id="phone" value="<?php echo (isset($validation)?$prev_data['phone']:'') ?>">
                                        <div id="nameFeedback" class="invalid-feedback">
                                            <?= isset($validation) ? $validation->getError('phone') : '' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group last mb-3">
                                        <input type="password" class="form-control <?php echo (isset($validation) && $validation->hasError('password'))?'is-invalid':'' ?>" placeholder="Password" name="password" id="password">
                                        <div id="nameFeedback" class="invalid-feedback">
                                            <?= isset($validation) ? $validation->getError('password') : '' ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group last mb-3">
                                        <input type="password" class="form-control <?php echo (isset($validation) && $validation->hasError('re_password'))?'is-invalid':'' ?>" placeholder="Retype Password" name="re_password" id="re-password">
                                        <div id="nameFeedback" class="invalid-feedback">
                                            <?= isset($validation) ? $validation->getError('re_password') : '' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Register" class="btn px-5 btn-primary">
                        </form>
                        <p class="mt-3">Already have account? <a href="<?php echo base_url('user/login') ?>">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>