<?php  ?>

<?php  //echo "string";

//require_once BASEPATH . '/helpers/url_helper.php';

$base_url = load_class('Config')->config['base_url']; 

?>

<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Error 404 | Samply - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Pichforest" name="author" />
        <!-- App favicon -->

         <link href="<?=$base_url?>assets/back/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=$base_url?>assets/back/css/icons.min.css" rel="stylesheet">
        <link href="<?=$base_url?>assets/back/css/app.min.css" rel="stylesheet">
        <link href="<?=$base_url?>assets/back/css/dark-layout.min.css" rel="stylesheet">

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <div class="my-5 pt-sm-5">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5">
                                        <div>
                                            <img src="<?=$base_url?>assets/back/images/404-error.png" alt="404 Error Image" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-uppercase mt-4"><?php 

								echo "Be gone fool!";
        
                        ?></h4>
                            <p class="text-muted">
                            	<?php
                            echo  "The action you have requested is not allowed. You either do not have access, or your login session has expired and you need to sign in again"; 
                            	?>
                            </p>

                             <!-- < ?=csrf_show_error()?> -->
                            <div class="mt-5">
                                 <a class="btn btn-primary waves-effect waves-light" href="<?=$this->agent->referrer()?>" >Back</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?=$base_url?>assets/back/js/jquery.min.js"></script>

        <script src="<?=$base_url?>assets/back/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
