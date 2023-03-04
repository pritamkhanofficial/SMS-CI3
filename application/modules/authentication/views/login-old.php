<?php  ?>
<?php
echo CI_VERSION;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>:: System Login ::</title>
        <link href="<?=base_url()?>assets/back/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/back/css/icons.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/back/css/app-style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Start wrapper-->
        <div id="wrapper">
            <div class="card card-primary card-authentication1 mx-auto my-5">
                <div class="card-body">
                    <div class="card-content p-2">
                        <div class="card-title text-uppercase text-center pb-2">Log In</div>
                        <form action="<?=base_url('login'); ?>" method="post">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
                            <div class="form-group">
                                <div class="position-relative has-icon-right">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" required id="username" name="username" class="form-control form-control-rounded" placeholder="Enter Username">
                                    <div class="form-control-position">
                                        <i class="icon-user"></i>
                                    </div>
                                    <span style="color:red;"><?=form_error('username'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="position-relative has-icon-right">
                                    <label for="pass" class="sr-only">Password</label>
                                    <input type="password" required id="pass" name="pass" class="form-control form-control-rounded" placeholder="Enter Password">
                                    <div class="form-control-position">
                                        <i class="icon-lock"></i>
                                    </div>
                                    <span style="color:red;"><?=form_error('pass'); ?></span>
                                </div>
                            </div>
                            <!-- <div class="form-row mr-0 ml-0">
                                <div class="form-group col-6">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="user-checkbox" class="filled-in chk-col-primary" checked="" />
                                        <label for="user-checkbox">Remember me</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 text-right">
                                    <a href="authentication-reset-password.html">Reset Password</a>
                                </div>
                            </div> -->
                            <button type="submit" name="submit" value="login" class="btn btn-primary btn-round btn-block waves-effect waves-light">Log In</button>
                            <!-- <div class="text-center pt-3">
                                <p class="text-muted">Do not have an account? <a href="authentication-signup.html"> Sign Up here</a></p>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
            
            <!--Start Back To Top Button-->
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
            <!--End Back To Top Button-->
            </div><!--wrapper-->
            
            
            <script src="<?=base_url()?>assets/back/js/jquery.min.js"></script>
            <script src="<?=base_url()?>assets/back/js/popper.min.js"></script>
            <script src="<?=base_url()?>assets/back/js/bootstrap.min.js"></script>
            <script>
            $(document).ready(function(){
            <?php if($this->session->flashdata('type')){ ?>
            toastr['<?=$this->session->flashdata('type')?>']("<?=$this->session->flashdata('title')?>", "<?=$this->session->flashdata('msg')?>");
            <?php } ?>
            })
            </script>
        </body>
    </html>