<?php //echo "string"; ?>


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
                                <div class="card">
                                    <div class="card-body">
                                    	<?php //echo "<pre>"; print_r($user);  ?>
                                        <h4 class="card-title text-uppercase"> <i class=" fas fa-user-circle "></i> Basic INFO</h4>
                                        <hr>
                                        <?php echo form_open_multipart(base_url('form_basic_info'), array('id' => 'user_profile')); ?>
                                        <div class="row mb-3">
                                            <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$user->full_name?>" id="fullname" name="fullname" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="profilepic" class="col-sm-2 col-form-label">Profile Image</label>
                                            <div class="col-sm-10">
                                            	<img src="" style="width:100px; height: 100px; border: 1px solid; display: none;" class="mb-1" id="u_img" alt="Photo">
                                                <input type="file" class="form-control" onchange="document.getElementById('u_img').src = window.URL.createObjectURL(this.files[0]); document.getElementById('u_img').style.display = 'block';" id="profilepic" name="profilepic">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" value="<?=$user->email?>" id="email" name="email" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label">Contact Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$user->phone?>" id="phone" name="phone" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary" name="submit" value="submit_basic_info"><i class="fas fa-sync"></i> Update</button>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                    	<?php //echo CI_VERSION; //echo "<pre>"; print_r($user);   ?>
                                        <h4 class="card-title text-uppercase"> <i class="fas fa-user-lock"></i> Change Password </h4>
                                        <hr>
                                        <?php echo form_open(base_url('form_change_pass'), array('id' => 'change_pass')); ?>
                                        <div class="row mb-3">
                                            <label for="current_pass" class="col-sm-2 col-form-label">Current Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" placeholder="Please enter current password" id="current_pass" name="current_pass" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="new_pass" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" placeholder="Please enter new password" id="new_pass" name="new_pass">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="confirm_pass" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" placeholder="Please enter confirm password" id="confirm_pass" name="confirm_pass" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary" name="submit" value="submit_change_pass"><i class="fas fa-sync"></i> Change</button>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php //echo CI_VERSION; //echo "<pre>"; print_r($user);   ?>
                                        <h4 class="card-title text-uppercase"> <i class=" fas fa-user-edit "></i>  Change Username  </h4>
                                        <hr>
                                        <?php echo form_open(base_url('form_change_username'), array('id' => 'change_username')); ?>
                                        <div class="row mb-3">
                                            <label for="new_username" class="col-sm-2 col-form-label">User Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$user->username?>" id="new_username" name="new_username" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label for="phone" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary" name="submit" value="submit_change_username"><i class="fas fa-sync"></i> Update</button>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?> 
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

    <script type="text/javascript">

        $('#user_profile').validate({
              rules: {
                fullname: {
                  required: true
                },
                email: {
                  required: true,
                  email:true
                },
                phone: {
                  required: true,
                },

                profilepic: {
                  extension: "jpg|jpeg|png",
                },
              },

              messages: {
                fullname: {
                    required: "Please enter full name",
                },
                email: {
                    required: "Please enter a email",
                    email: "Please enter valid email address",
                },
                phone: {
                    required: "Please enter phone number",
                }
                           
               }
            });

        $('#change_pass').validate({
              rules: {
                current_pass: {
                  required: true
                },
                new_pass: {
                  required: true
                },
                confirm_pass: {
                  required: true,
                  equalTo: "#new_pass"
                },
              },

              messages: {
                current_pass: {
                    required: "Please enter current password!",
                },
                new_pass: {
                    required: "Please enter new password!",
                },
                confirm_pass: {
                    required: "Please enter confirm password!",
                    equalTo: "New password & Confirm password not matched.",
                }
                           
               }
            });


            /*user name validation */
            $("#change_username").validate({
            rules: {
                new_username: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                    username: true,
                    remote: "<?=base_url('ajax_username_check')?>"
                },
            },
            messages: {
                new_username: {
                    required: "Please enter your desired username",
                    minlength: "Username must be at least 5 characters long",
                    maxlength: "Username should not be longer than 20 characters",
                },
            }
        });

            jQuery.validator.addMethod("username", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9_-]*$/.test(value);
            }, "Only characters [a-z, A-Z], numbers [0-9], dash [-] & underscore [_] are allowed");
            /*end*/
    	 $('#user_profile').ajaxForm({
        beforeSubmit: function () {

            if($('input[name = csrf_test_name]').val() != "<?=$this->security->get_csrf_hash()?>"){
                window.location.href = "<?=base_url('error/csrf_auth')?>";
            }else{
                return $("#user_profile").valid(); // TRUE when form is valid, FALSE will cancel submit
            }
        },
        success: function (returnData) {
            console.log(returnData);
            obj = JSON.parse(returnData);


            console.log(obj);

            notification(obj);

        }
    });


         $('#change_pass').ajaxForm({
        beforeSubmit: function () {

            if($('input[name = csrf_test_name]').val() != "<?=$this->security->get_csrf_hash()?>"){
                window.location.href = "<?=base_url('error/csrf_auth')?>";
            }else{
                return $("#change_pass").valid(); // TRUE when form is valid, FALSE will cancel submit
            }



        },
        success: function (returnData) {
            console.log(returnData);
            obj = JSON.parse(returnData);


            console.log(obj);

            notification(obj);

        }
    });


          $('#change_username').ajaxForm({
            beforeSubmit: function () {
                if($('input[name = csrf_test_name]').val() != "<?=$this->security->get_csrf_hash()?>"){
                window.location.href = "<?=base_url('error/csrf_auth')?>";
                }else{
                    return $("#change_username").valid(); // TRUE when form is valid, FALSE will cancel submit
                }
            },
            success: function (returnData) {
                console.log(returnData);
                obj = JSON.parse(returnData);
                console.log(obj);
                notification(obj);
            }
        });



         
    </script>
</body>
</html>