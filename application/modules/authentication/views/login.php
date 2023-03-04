<?php  ?>
<?php
//echo CI_VERSION;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>:: System Login ::</title>
        <link href="<?=base_url()?>assets/back/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/back/css/icons.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/back/css/app.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/back/css/lobibox.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- <body data-layout="horizontal" data-topbar="dark"> -->
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5>Welcome Back !</h5>
                                            <p class="text-muted">Login to continue your area.</p>
                                        </div>
                                    
                                        <div class="mt-4 pt-3">
                                            <!-- <form action="< ?=base_url('login'); ?>" method="post"> -->
                                                <?php echo form_open(base_url('auth')); ?>
            
                                                <div class="mb-3">
                                                    <label for="username" class="fw-semibold">Username</label>
                                                    <input type="text" class="form-control" required id="username" name="username" placeholder="Enter username">
                                                    <span style="color:red;"><?=form_error('username'); ?></span>
                                                </div>
                        
                                                <div class="mb-3 mb-4">
                                                    <label for="pass" class="fw-semibold">Password</label>
                                                    <input type="password" class="form-control" required id="pass" name="pass" placeholder="Enter password">
                                                    <span style="color:red;"><?=form_error('pass'); ?></span>
                                                </div>
    
                                                <div class="row align-items-center">
                                                    <!-- <div class="col-6">
                                                        <div class="form-check">    
                                                            <input type="checkbox" class="form-check-input font-size-16" id="remember-check">
                                                            <label class="form-check-label" for="remember-check">Remember me</label>
                                                        </div>
                                                    </div>   -->
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <button class="btn btn-primary w-md waves-effect waves-light" value="login" type="submit" name="submit">Log In</button>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                               <!--  <div class="mt-4">
                                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                                </div> -->
                                            <?php echo form_close(); ?> 
                                        </div>
                                    </div>                            
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> <b>Demo</b>. Crafted with <i class="mdi mdi-heart text-danger"></i> by Demo</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end account page -->    
            
    <script src="<?=base_url()?>assets/back/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/back/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/back/js/lobibox.min.js"></script>

    
    <script>
    $(document).ready(function(){
    notification();
    })

    <?php 
    $icontype = 'fa fa-info-circle';
    if ($this->session->flashdata('type') == 'warning') {
        $icontype = 'fa fa-exclamation-circle';
    }elseif ($this->session->flashdata('type') == 'error') {
        $icontype = 'fa fa-times-circle';
    }elseif($this->session->flashdata('type') == 'success'){
        $icontype = 'fa fa-check-circle';
    }

     ?>


    function notification(){
         <?php if($this->session->flashdata('type')){ ?>
                Lobibox.notify("<?=$this->session->flashdata('type')?>", {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                title: "<?=$this->session->flashdata('title')?>",
                position: 'top right',
                icon: '<?=$icontype?>',
                msg: "<?=$this->session->flashdata('msg')?>"
                });
        <?php } ?>
    }
           
    </script>
        </body>
    </html>