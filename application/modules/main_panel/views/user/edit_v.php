<?php echo "string"; ?>
<!-- < ?php echo "string"; ?> -->

<!doctype html>
<html lang="en">
<head>
    <link href="<?=base_url()?>assets/back/css/select2.min.css" rel="stylesheet">
<?php $this->load->view('common/head'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<style type="text/css">
    .error{
        color: red;
    }
</style>
</head>
<body data-sidebar="dark" data-sidebar-size="lg">
    <div id="layout-wrapper">
        <?php $this->load->view('common/header'); ?>
        <?php $this->load->view('common/sidebar'); ?>

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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center mb-3">User Form</h4>

                                        <div style="text-align: center;">
                                        	<img src="<?=base_url('upload/profile_img/'.$user_data->profile_img)?>" style="width:100px; height: 100px; border: 1px solid;" class="mb-2" alt="Photo">
                                        </div>
                                        <?php echo form_open_multipart(base_url('admin/form_edit_user'), array('id' => 'user_form')); ?>

                                        <input type="hidden" name="u_id" value="<?=$user_data->user_id?>">
                                        <input type="hidden" name="old_img" value="<?=$user_data->profile_img?>">
                                        <div class="row mb-3">
                                            <label for="fname" class="col-md-2 col-form-label text-danger">Full name*</label>
                                            <div class="col-md-10 ">
                                                <input type="text" class="form-control" name="fname" value="<?=$user_data->user_full_name?>" required placeholder="Please enter full name" id="fname">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="phone" class="col-md-2 col-form-label text-danger">Phone*</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" value="<?=$user_data->user_phone?>" name="phone" required placeholder="Please enter mobile number" id="phone">
                                            </div>

                                            <label for="email" class="col-md-2 col-form-label text-danger">Email*</label>
                                            <div class="col-md-4">
                                                <input type="email" class="form-control" value="<?=$user_data->user_email?>" name="email" required placeholder="Please enter email" id="email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="roleid" class="col-md-2 col-form-label text-danger">Role*</label>
                                            <div class="col-md-4">
                                                 <select class="form-select " required name="roleid" id="roleid">
                                                    <option value="">-- Select role --</option>
                                                    <?php  foreach ($role as $key => $rolerow) { ?>

                                                    <option value="<?=$rolerow->role_id?>" <?=($rolerow->role_id == $user_data->role_id)?'selected':''?>><?=$rolerow->role_name?></option>
                                                <?php } ?>
                                                </select>
                                            </div>

                                            <label for="date_of_joining" class="col-md-2 col-form-label text-danger">Joining date*</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" value="<?=date("d-m-Y", strtotime($user_data->date_of_joining))?>" readonly name="date_of_joining" placeholder="Please enter date of joining" id="date_of_joining">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="designation" class="col-md-2 col-form-label">Designation</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" value="<?=$user_data->designation?>" name="designation" placeholder="Please enter designation" id="designation">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="profile_img" class="col-md-2 col-form-label">Profile img <br> <small>(allowed file types are jpg, jpeg and png)</small> </label>
                                            <div class="col-md-10">
                                                <img src="" style="width:100px; height: 100px; border: 1px solid; display: none;" class="mb-1" id="u_img" alt="Photo">
                                                <input type="file" onchange="document.getElementById('u_img').src = window.URL.createObjectURL(this.files[0]); document.getElementById('u_img').style.display = 'block';"  class="form-control"  name="profile_img" placeholder="Please enter designation" id="profile_img">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="address" class="col-md-2 col-form-label">Address</label>
                                            <div class="col-md-10">
                                                <textarea name="address" id="address" cols="30" placeholder="Please enter address" class="form-control" rows="10"><?=$user_data->user_address?></textarea>
                                            </div>
                                        </div>
                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-md-2 pt-0">Status</legend>
                                            <div class="col-md-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="1" type="radio" name="status" id="gridRadios1" <?=($user_data->status == 1)?'checked':''?>>
                                                    <label class="form-check-label" for="gridRadios1">
                                                       Active
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2"
                                                        value="0" <?=($user_data->status == 0)?'checked':''?>>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Deactive
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="row mb-3">
                                            <label for="password" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success" name="submit" value="edit_form">Submit</button>

                                                <a href="<?=base_url('admin/users')?>" class="btn btn-danger">Back</a>                                                
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php $this->load->view('common/script'); ?>


     <script src="<?=base_url()?>assets/back/js/select2.min.js"></script>

     <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>     

     <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
     <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){


            $(".select2").select2();

            $('#user_form').validate({
              rules: {
                fname: {
                  required: true
                },
                phone: {
                  required: true
                },
                email: {
                  required: true,
                  email: true
                },
                roleid: {
                  required: true
                },
                date_of_joining: {
                  required: true
                },

                profile_img: {
                  extension: "jpg|jpeg|png"
                }
              },

              messages: {
                           
               }
            });
        });

        $('#user_form').ajaxForm({
        beforeSubmit: function () {
            return $("#user_form").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            console.log(returnData);
            obj = JSON.parse(returnData);


            console.log(obj);

            notification(obj);

            if(obj.type == 'success'){

                window.location.href = "<?=base_url('admin/users')?>";

            }

        }
    });
    </script>

</body>
</html>