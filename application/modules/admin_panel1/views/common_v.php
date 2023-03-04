
<!doctype html>
<html lang="en">
<head>

<?php $this->load->view('common/head'); ?>
<?php $this->load->view('common/grocerycss'); ?>
<style>
    .required{
        color: red;
    }
    .flexigrid div.form-div input[type="text"], .flexigrid div.form-div input[type="password"]{
        height: 34px !important;
        /*width: 500px !important;*/
    }
    div.flexigrid a {
    color: blue;
    text-decoration: none !important;
    cursor: pointer !important;
    }

    .crud-action{
        font-size: 27px;
    }
    
    /*.pd > a{
        padding-left: 30px;
    }

    .fa-chevron-left{
        position: relative;
        right: 0px;
        left: 106px;
    }

    .left{
        transform: rotate(-90deg);
        transition-duration: .3s;
    }*/

</style>
</head>
<body data-sidebar="dark" data-sidebar-size="lg">
    <div id="layout-wrapper">
        <?php $this->load->view('common/header'); ?>
        <?php $this->load->view('common/sidebar'); ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php
                    if (isset($add_btn)) {
                         echo $add_btn;

                         echo "</br></br>";
                     } 
                    ?>
                	<?php echo $output; ?>
                </div>
            </div>
            <?php $this->load->view('common/footer'); ?>
        </div>
    </div>
    <?php $this->load->view('common/script'); ?>
    <?php $this->load->view('common/groceryjs'); ?>


   
</body>
</html>