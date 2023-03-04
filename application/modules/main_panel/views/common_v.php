<!doctype html>
<!-- https://github.com/pritamkhanofficial/School-Management-System.git -->
<html lang="en">
    <head>
        <?php $this->load->view('components/head'); ?>
        <?php $this->load->view('components/grocerycss'); ?>
        <style>
        .required{
        color: red;
        }
        .flexigrid div.form-div input[type="text"], .flexigrid div.form-div input[type="password"]{
        height: 34px !important;
        /*width: 500px !important;*/
        }
        .flexigrid  div.chosen-search input[type="text"]{
        height: 24px !important;
        /*    background: blue;*/
        }
        div.chosen-search{
        width: 100% !important;
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
            <?php $this->load->view('components/header'); ?>
            <?php $this->load->view('components/sidebar'); ?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?=$menu?></h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <?=$page_title_right?>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php
                        if (isset($add_btn)) {
                        echo $add_btn;
                        // echo "</br></br>";
                        }
                        ?>
                        <?php echo $output; ?>
                    </div>
                </div>
                <?php $this->load->view('components/footer'); ?>
            </div>
        </div>
        <?php $this->load->view('components/script'); ?>
        <?php $this->load->view('components/groceryjs'); ?>
        <?php if(@$type == 'class_section'){ ?>
        <div class="modal fade" id="subject_assign_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>I will not close if you click outside me. Don't even try to press escape key.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </body>
</html>