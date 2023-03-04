<?php  ?>
<!doctype html>
<html lang="en">
    <head>
        <?php $this->load->view('components/head'); ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    </head>
    <body data-sidebar="dark" data-sidebar-size="lg">
        <div id="layout-wrapper">
            <?php $this->load->view('components/header'); ?>
            <?php $this->load->view('components/sidebar'); ?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"><?=$menu?></h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <?=$page_title_right?>
                                        </ol>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <?php if($section == 'student_add'){ ?>
                                        <h4 class="card-title text-capitalize"> <i class="fas fa-user-graduate"></i><?=$menu?></h4>
                                        <hr>
                                        <?php echo form_open('', array('id' => 'subject_assign_form')); ?>
                                        <h5 class="card-title text-capitalize"> <i class="fas fa-school"></i>Academic Details</h5>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php //echo "<pre>"; print_r(get_session_list()); die(); ?>
                                                    <label for="sission_id" class="col-form-label require">Academic Year</label>
                                                    <select class="form-select" name="sission_id" id="sission_id">
                                                        <?php foreach (get_session_list() as $session_id => $session_year) { ?>
                                                        <option value="<?=$session_id?>" <?=($session_id == get_session_id()?'selected':'')?>><?=$session_year?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="reg_no" class="col-form-label require">Registration No</label>
                                                    <input type="text" class="form-control" name="reg_no" id="reg_no">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="roll_no" class="col-form-label require">Roll No</label>
                                                    <input type="text" style="font-weight: bold; text-align:center;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="0" class="form-control" name="roll_no" id="roll_no">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="doa" class="col-form-label require">Admission Date</label>
                                                    <div class="input-group">
                                                       <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        <input type="text" class="form-control" id="doa" name="doa">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php //echo "<pre>"; print_r(get_session_list()); die(); ?>
                                                    <label for="sission_id" class="col-form-label require">Class</label>
                                                    <select class="form-select" name="sission_id" id="sission_id">
                                                        <?php foreach (get_session_list() as $session_id => $session_year) { ?>
                                                        <option value="<?=$session_id?>" <?=($session_id == get_session_id()?'selected':'')?>><?=$session_year?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sission_id" class="col-form-label require">Section</label>
                                                    <select class="form-select" name="sission_id" id="sission_id">
                                                        <option value="">Select First Class</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sission_id" class="col-form-label require">Category</label>
                                                    <select class="form-select" name="sission_id" id="sission_id">
                                                        <?php foreach (get_session_list() as $session_id => $session_year) { ?>
                                                        <option value="<?=$session_id?>" <?=($session_id == get_session_id()?'selected':'')?>><?=$session_year?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-capitalize pt-3"> <i class="fas fa-school"></i>Academic Details</h5>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?php //echo "<pre>"; print_r(get_session_list()); die(); ?>
                                                    <label for="sission_id" class="col-form-label require">Academic Year</label>
                                                    <select class="form-select" name="sission_id" id="sission_id">
                                                        <?php foreach (get_session_list() as $session_id => $session_year) { ?>
                                                        <option value="<?=$session_id?>" <?=($session_id == get_session_id()?'selected':'')?>><?=$session_year?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="reg_no" class="col-form-label require">Registration No</label>
                                                    <input type="text" class="form-control" name="reg_no" id="reg_no">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="roll_no" class="col-form-label require">Roll No</label>
                                                    <input type="text" style="font-weight: bold; text-align:center;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="0" class="form-control" name="roll_no" id="roll_no">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="doa" class="col-form-label require">Admission Date</label>
                                                    <div class="input-group">
                                                       <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        <input type="text" class="form-control" id="doa" name="doa">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php //echo "<pre>"; print_r(get_session_list()); die(); ?>
                                                    <label for="sission_id" class="col-form-label require">Class</label>
                                                    <select class="form-select" name="sission_id" id="sission_id">
                                                        <?php foreach (get_session_list() as $session_id => $session_year) { ?>
                                                        <option value="<?=$session_id?>" <?=($session_id == get_session_id()?'selected':'')?>><?=$session_year?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sission_id" class="col-form-label require">Section</label>
                                                    <select class="form-select" name="sission_id" id="sission_id">
                                                        <option value="">Select First Class</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sission_id" class="col-form-label require">Category</label>
                                                    <select class="form-select" name="sission_id" id="sission_id">
                                                        <?php foreach (get_session_list() as $session_id => $session_year) { ?>
                                                        <option value="<?=$session_id?>" <?=($session_id == get_session_id()?'selected':'')?>><?=$session_year?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                        
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('components/footer'); ?>
            </div>
        </div>
        <?php $this->load->view('components/script'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
       
        <script type="text/javascript">
        /*$(document).ready(function (){
        // form validation
        $("#Questionset-form").validate();
        });*/
        $(function() {
            $("#doa").datepicker({
                showAnim: "fold",
                dateFormat: "dd/mm/yy",
                changeMonth: true,
                changeYear: true
            });
          });
        </script>
        


    </body>
</html>