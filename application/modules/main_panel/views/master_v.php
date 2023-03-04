<?php  ?>

<?php  ?>
<!doctype html>
<html lang="en">
    <head>
        <?php $this->load->view('components/head'); ?>
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
                                        <?php if($section == 'add_classes'){ ?>
                                        <h4 class="card-title"><?=$menu?></h4>
                                        <hr>
                                        <?php echo form_open('', array('id' => 'form_add_classes')); ?>
                                        <div class="row mb-3 form-group">
                                            <label for="class" class="col-sm-2 col-form-label require">Class</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" required  id="class" name="class">
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label for="section_id" class="col-sm-2 col-form-label require">Section</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2" required multiple data-placeholder="-- Select Section --"  name="section_id[]" id="section_id">
                                                	<?php //echo "<pre>"; print_r($section); die(); ?>
                                                    <?php foreach ($sec as $key => $section_value) { ?>
                                                    	<option value="<?=$section_value->section_id?>"><?=$section_value->section_name?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label for="school_type_id" class="col-sm-2 col-form-label require">School</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" required name="school_type_id" id="school_type_id">
                                                    <?php //echo "<pre>"; print_r($section); die(); ?>
                                                    <?php foreach ($class_type as $key => $class_type_value) { ?>
                                                        <option value="<?=$class_type_value->class_type_id?>"><?=$class_type_value->class_type?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10 text-center">
                                                <button type="submit" value="form_add_classes" name="form_add_classes" class="btn btn-primary btn-md waves-effect waves-light">Submit</button> <a href="<?=base_url('classes')?>" class="btn btn-danger btn-md waves-effect waves-light">Back</a>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                        <?php } ?>
                                        <?php if($section == 'update_classes'){ ?>
                                        <h4 class="card-title"><?=$menu?></h4>
                                        <hr>
                                        <?php echo form_open('', array('id' => 'form_add_classes')); ?>
                                        <div class="row mb-3 form-group">
                                            <label for="class" class="col-sm-2 col-form-label require">Class</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="hidden" required  id="class_id" value="<?=$class->school_class_id?>"  name="class_id">
                                                <input class="form-control" type="text" required  id="class" value="<?=$class->class?>"  name="class">
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label for="section_id" class="col-sm-2 col-form-label require">Section</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2" required multiple data-placeholder="-- Select Section --"  name="section_id[]" id="section_id">
                                                    <?php $sel = array_column($section_data,'section_id'); //echo "<pre>"; print_r($section); die(); ?>
                                                    <?php foreach ($section_tbl as $key => $section_value) { ?>
                                                        <?php if (in_array($section_value->section_id, $sel)) { ?>
                                                            <option value="<?=$section_value->section_id?>" selected><?=$section_value->section_name?></option>
                                                        <?php }else{ ?>
                                                            <option value="<?=$section_value->section_id?>"><?=$section_value->section_name?></option>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label for="school_type_id" class="col-sm-2 col-form-label require">School</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" required name="school_type_id" id="school_type_id">
                                                    <?php //echo "<pre>"; print_r($section); die(); ?>
                                                    <?php foreach ($school as $key => $school_type_value) { ?>
                                                    <option value="<?=$school_type_value->class_type_id?>" <?=($class->class_type == $school_type_value->class_type_id)?'selected':''?> ><?=$school_type_value->class_type?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10 text-center">
                                                <button type="submit" value="form_add_classes" name="form_add_classes" class="btn btn-primary btn-md waves-effect waves-light">Submit</button> <a href="<?=base_url('classes')?>" class="btn btn-danger btn-md waves-effect waves-light">Back</a>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                        <?php } ?>

                                        <?php if($section == 'add_subjects'){ ?>
                                        <h4 class="card-title"><?=$menu?></h4>
                                        <hr>
                                        <?php echo form_open('', array('id' => 'form_add_subjects')); ?>
                                        <div class="row mb-3 form-group">
                                            <label for="class" class="col-sm-2 col-form-label require">Class</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2" required name="class_id" id="class_id">
                                                    <option value="">-- Select Class --</option>
                                                    <?php foreach ($class as $key => $class_value) { ?>
                                                            <option value="<?=$class_value->school_class_id?>"><?=$class_value->class?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label for="school_type_id" class="col-sm-2 col-form-label require">Subjects</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2" multiple required data-placeholder="-- Select Multiple Subjects --"  name="subject_id[]" id="subject_id">
                                                    <?php foreach ($subjects as $key => $subjects_value) { ?>
                                                    <option value="<?=$subjects_value->subject_id?>"><?=$subjects_value->subject_name?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10 text-center">
                                                <button type="submit" value="form_add_subjects" name="form_add_subjects" class="btn btn-primary btn-md waves-effect waves-light">Submit</button> <a href="<?=base_url('class_subject')?>" class="btn btn-danger btn-md waves-effect waves-light">Back</a>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                        <?php } ?>

                                        <?php if($section == 'fees_assign_add'){ ?>
                                        <h4 class="card-title text-capitalize"> Fees Assign  </h4>
                                        <hr>
                                        <?php echo form_open('', array('id' => 'fees_assign_form')); ?>
                                        <div class="row mb-3 form-group">
                                            <label for="subnm" class="col-sm-2 col-form-label">Class / Section</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2" required name="class_id" id="class_id">
                                                    <option value="">-- Select Class --</option>
                                                    <?php foreach ($class as $key => $class_val) { ?>
                                                    <option value="<?=$class_val->school_class_id?>"><?=$class_val->class?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label for="subnm" class="col-sm-2 col-form-label">Fees</label>
                                            <div class="col-sm-10">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Fees Name</th>
                                                            <th>Amount</th>
                                                            <th>Fees Type</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="add-div">
                                                        <tr id="formGroup_0">
                                                            <td width="400">
                                                                <select class="form-select" required name="acc_dtl_id[]" id="acc_dtl_id">
                                                                    <?php foreach ($account_dtl as $ind => $account_dtl_val) {?>
                                                                    <option value="<?=$account_dtl_val->account_dtl_id?>"><?=$account_dtl_val->account_dtl_name?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td width="150">
                                                                <input type="number" step="any" class="form-control fw-bolder fees_amount"  id="fees_amount" name="fees_amount[]" required>
                                                            </td>
                                                            <td width="170">
                                                                <select class="form-select" required name="fees_type_id[]" id="fees_type_id">
                                                                    <?php foreach ($fees_type as $ind => $fees_type_val) {?>
                                                                    <option value="<?=$fees_type_val->fees_type_id?>"><?=$fees_type_val->name?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td width="100">
                                                                <button type="button" class="btn btn-success btn-md waves-effect waves-light" onclick="add()">+</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10 text-center">
                                                <button type="submit" value="fees_assign" name="fees_assign" class="btn btn-primary btn-md waves-effect waves-light">Submit</button> <a href="<?=base_url('fees_assign')?>" class="btn btn-danger btn-md waves-effect waves-light">Back</a>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                        <?php } ?>
                                        <?php if($section == 'fees_assign_update'){ ?>
                                        <h4 class="card-title text-capitalize"> Fees Assign Edit </h4>
                                        <hr>
                                        <?php echo form_open('', array('id' => 'fees_assign_form')); ?>
                                        <div class="row mb-3 form-group">
                                            <label for="subnm" class="col-sm-2 col-form-label">Class / Section</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2" required name="class_id" id="class_id">
                                                    <option value="">-- Select Class --</option>
                                                    <?php foreach ($class as $key => $class_val) { ?>
                                                    <option value="<?=$class_val->school_class_id?>" <?=($class_val->school_class_id == $class_id)?'selected':''?>><?=$class_val->class?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label for="subnm" class="col-sm-2 col-form-label">Fees</label>
                                            <div class="col-sm-10">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Fees Name</th>
                                                            <th>Amount</th>
                                                            <th>Fees Type</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="add-div">
                                                        <?php foreach ($fees_assign_data as $key => $fees_assign_data_val) {?>
                                                        <tr id="formGroup_<?=$key?>">
                                                            <td width="400">
                                                                <select class="form-select" required name="acc_dtl_id[]" id="acc_dtl_id">
                                                                    <?php foreach ($account_dtl as $ind => $account_dtl_val) {?>
                                                                    <option value="<?=$account_dtl_val->account_dtl_id?>" <?=($account_dtl_val->account_dtl_id == $fees_assign_data_val->account_dtl_id)?'selected':'disabled'?>><?=$account_dtl_val->account_dtl_name?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td width="150">
                                                                <input type="number" step="any" class="form-control fw-bolder fees_amount"  id="fees_amount" name="fees_amount[]" value="<?=$fees_assign_data_val->amount?>" required>
                                                            </td>
                                                            <td width="170">
                                                                <select class="form-select" required name="fees_type_id[]" id="fees_type_id">
                                                                    <?php foreach ($fees_type as $ind => $fees_type_val) {?>
                                                                    <option value="<?=$fees_type_val->fees_type_id?>" <?=($fees_type_val->fees_type_id == $fees_assign_data_val->fees_type_id)?'selected':''?>><?=$fees_type_val->name?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td width="100">
                                                                <?php if ((count($fees_assign_data) - 1) == $key) { ?>
                                                                <button type="button" class="btn btn-success btn-md waves-effect waves-light" onclick="add()">+</button>
                                                            <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-group">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10 text-center">
                                                <button type="submit" value="fees_assign" name="fees_assign" class="btn btn-primary btn-md waves-effect waves-light">Submit</button> <a href="<?=base_url('fees_assign')?>" class="btn btn-danger btn-md waves-effect waves-light">Back</a>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                        <?php } ?>

                                        <?php if($section == 'add_employee'){ ?>
                                        <h4 class="card-title"><?=$menu?></h4>
                                        <hr>
                                        <?php echo form_open('', array('id' => 'form_add_subjects')); ?>
                                        <h4 class="card-title"><i class="fas fa-school"></i> Academic Details </h4>
                                        <div class="row mb-3 form-group">
                                            <div class="col-sm-6">
                                                <label for="class" class="col-form-label require">Role</label>
                                                <select class="form-select select2" required name="class_id" id="class_id">
                                                    <option value="">-- Select Class --</option>
                                                    <?php foreach ($class as $key => $class_value) { ?>
                                                            <option value="<?=$class_value->school_class_id?>"><?=$class_value->class?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="class" class="col-form-label require">Joining Date</label>
                                                <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="fees_amount" name="fees_amount" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="class" class="col-form-label require">Designation</label>
                                                <select class="form-select select2" required name="class_id" id="class_id">
                                                    <option value="">-- Select Class --</option>
                                                    <?php foreach ($class as $key => $class_value) { ?>
                                                            <option value="<?=$class_value->school_class_id?>"><?=$class_value->class?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="class" class="col-form-label require">Department</label>
                                                <select class="form-select select2" required name="class_id" id="class_id">
                                                    <option value="">-- Select Class --</option>
                                                    <?php foreach ($class as $key => $class_value) { ?>
                                                            <option value="<?=$class_value->school_class_id?>"><?=$class_value->class?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="qualification" class="col-form-label require">Qualification</label>
                                                <input type="text" class="form-control" id="qualification" name="qualification" required>
                                            </div>
                                        </div>
                                        <h4 class="card-title"><i class="fas fa-user-check"></i> Employee Details </h4>
                                        <div class="row mb-3 form-group">
                                            <div class="col-sm-6">
                                                <label for="emp_name" class="col-form-label require">Name</label>
                                                <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="gender" class="col-form-label require">Gender</label>
                                                <select class="form-select" required name="gender" id="gender">
                                                    <option value="" selected="selected">-- Select --</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="religion_id" class="col-form-label require">Religion</label>
                                                <select class="form-select select2" required name="religion_id" id="religion_id">
                                                    <option value="">-- Select Class --</option>
                                                    <?php foreach ($class as $key => $class_value) { ?>
                                                            <option value="<?=$class_value->school_class_id?>"><?=$class_value->class?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="blood_group" class="col-form-label require">Blood Group</label>
                                                <select class="form-select select2" required name="blood_group" id="blood_group">
                                                     <option value="unknown" selected>Unknown</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="dob" class="col-form-label require">Date Of Birth</label>
                                                <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="dob" name="dob" required>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="mobile_no" class="col-form-label require">Mobile No</label>
                                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="present_address" class="col-form-label require">Present Address</label>
                                                <textarea id="present_address" name="present_address" class="form-control" rows="2" spellcheck="false"></textarea>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="permanent_address" class="col-form-label">Permanent Address</label>
                                                    <textarea id="permanent_address" name="permanent_address" class="form-control" rows="2" spellcheck="false"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="prifile_pic" class="col-form-label">Profile Picture</label>
                                                <input type="file" class="form-control dropify" accept=".png,.jpg,.jpeg" id="prifile_pic" name="prifile_pic" required>
                                            </div>
                                        </div>
                                        <h4 class="card-title"><i class="fas fa-user-lock"></i> Login Details </h4>
                                        <div class="row mb-3 form-group">
                                            <div class="col-sm-4">
                                                <label for="email_id" class="col-form-label require">Email</label>
                                                <input type="email" class="form-control" id="email_id" name="email_id" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="password" class="col-form-label require">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="confirm_password" class="col-form-label require">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                            </div>
                                        </div>

                                        <h4 class="card-title fw-bolder"><i class="fas fa-university"></i> Bank Details </h4>
                                        <div class="form-check form-check-success mb-3">
                                            <input class="form-check-input" type="checkbox" id="skip_bank_details">
                                            <label class="form-check-label" for="skip_bank_details">
                                                Skipped Bank Details
                                            </label>
                                                </div>
                                        <div class="row mb-3 form-group">
                                            
                                            <!-- <label for="bank_name" class="col-form-label">Skipped Bank Details</label> -->
                                            <div class="col-sm-4">
                                                <label for="bank_name" class="col-form-label require"> Bank Name</label>
                                                <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="account_holder" class="col-form-label require">Account Holder</label>
                                                <input type="text" class="form-control" id="account_holder" name="account_holder" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="bank_branch" class="col-form-label require">Bank Branch</label>
                                                <input type="text" class="form-control" id="bank_branch" name="bank_branch" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="bank_address" class="col-form-label">Bank Address</label>
                                                <input type="text" class="form-control" id="bank_address" name="bank_address">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="ifsc_code" class="col-form-label">IFSC Code</label>
                                                <input type="text" class="form-control" id="ifsc_code" name="ifsc_code">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="account_no" class="col-form-label require">Account No</label>
                                                <input type="text" class="form-control" id="account_no" name="account_no" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3 form-group">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" value="form_add_subjects" name="form_add_subjects" class="btn btn-success btn-md waves-effect waves-light w-25">Submit</button> <!-- <a href="< ?=base_url('class_subject')?>" class="btn btn-danger btn-md waves-effect waves-light">Back</a> -->
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
        <?php if($section == 'subject_assign'){
        function desanitizeData($value)
        {
        $value = htmlentities($value, ENT_QUOTES);
        return $value;
        }
        ?>
        <script type="text/javascript">
        /*$(document).ready(function (){
        // form validation
        $("#Questionset-form").validate();
        });*/
        </script>
        <?php } ?>

        <script>
            /*function getSectionByClass(class_id) {
                if (class_id != '') {
                    data = {
                        '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
                        'class_id': class_id
                    };
                    $.ajax({
                        url: "<?=base_url();?>getSectionByClass",
                        type: "post",
                        data: data,
                        success: function(data) {
                            data = $.parseJSON(data);

                            // console.log(data);
                            $('#section_id').html(data.html_section);
                        }
                    });
                }
            }*/
        </script>

        <?php if($section == 'fees_assign_add' or $section == 'fees_assign_update'){
        function desanitizeData($value)
        {
        $value = htmlentities($value, ENT_QUOTES);
        return $value;
        }
        ?>
        <script type="text/javascript">

            $(document).on("input", ".fees_amount", function () {
                // $(".fees_amount").val(45);
                if($.isNumeric($(".fees_amount").val())){
                     // $(this).val(value);
                    //alert($(this.element).val());
                    //console.log($("#fees_amount").val())
                }else{
                     $(this).val('');
                }
            });
            function check_number(value){
                    //var val_value = value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
                if($.isNumeric(value)){
                     // $(this).val(value);
                    //alert($(this.element).val());
                    console.log($("#fees_amount").val())
                }else{
                     $(this).val('');
                }
                // return $(this).val(value);
            }
        function add(){
        var formGroup = [];
        var fees_name = '';
        var fees_type = '';
        $('tr[id*="formGroup_"]').each(function (index){
        formGroup.push($(this).attr("id"));
        });
        
        var maxfdiv = maxDivId(formGroup);
        var newfMaxid = maxfdiv + 1;
        console.log(newfMaxid);
        
        <?php foreach ($account_dtl as $ind => $account_dtl_val){?>
        fees_name = fees_name + '<option value="<?=$account_dtl_val->account_dtl_id?>"><?=desanitizeData($account_dtl_val->account_dtl_name) ;?></option>';
        <?php }?>

        <?php foreach ($fees_type as $ind => $fees_type_val){?>
        fees_type = fees_type + '<option value="<?=$fees_type_val->fees_type_id?>"><?=desanitizeData($fees_type_val->name) ;?></option>';
        <?php }?>

        var dhtml = '<tr id="formGroup_'+newfMaxid+'"><td>'+
    '<select class="form-select select2" required name="acc_dtl_id[]" id="subject_id">'+fees_name+'</select></td>'+
    '<td><input type="number" step="any" class="form-control fw-bolder fees_amount" id="fees_amount"  name="fees_amount[]" required>'+
    '</td><td width="170">'+
    '<select class="form-select" required name="fees_type_id[]" id="fees_type_id">'+fees_type+'</select></td>'+
    '</td><td>'+
        '<button type="button" class="btn btn-success btn-md waves-effect waves-light" onclick="add()">+</button> <button type="button" class="btn btn-danger waves-effect waves-light btn-md" onclick="remove('+newfMaxid+')">-</button>'+
    '</td> <tr>';
    // $('.select2').select2();
    // $('.select2').select2('destroy').select2();
    // $('.select2-container').remove();
    // $('#subject_id_'+newfMaxid).select2({
    //   placeholder: "Placeholder text",
    //   allowClear: true
    // });
    $(dhtml).clone().appendTo("#add-div");
    }
    function maxDivId(divArray){
    var lastidArray = [];
    var maxid = 0;
    for(var i=0; i < divArray.length; i++){
    var str = divArray[i];
    
    var splitRes = str.split("_");
    var lastid =  splitRes[1];
    
    lastidArray.push(lastid);
    }
    maxid = Math.max.apply(null, lastidArray);
    return maxid;
    }
    function remove(id){
    $("#formGroup_"+id).remove();
    // $("#formhr_"+id).remove();
    
    }
    </script>
    <?php } ?>

    <script>
        $('.dropify').dropify();
    </script>
    </body>
</html>