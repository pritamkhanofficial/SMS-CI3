<?php  ?>
<!doctype html>
<html lang="en">
    <head>
        
    <?php $this->load->view('components/head'); ?>
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/back/css/responsive.bootstrap4.min.css?q=<?=time()?>" rel="stylesheet">
    <link href="<?=base_url()?>assets/back/css/responsive.bootstrap4.min.css?q=<?=time()?>" rel="stylesheet">
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
                        <div class="row">
                            <?php if($section == 'class_section'){ ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="<?=base_url("add_classes") ?>" class="btn btn-success btn-sm"> Add Class</a> | <a href="<?=base_url("section") ?>" class="btn btn-success btn-sm"> Add Section</a></h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Class</th>
                                                    <th>Section</th>
                                                    <th>School</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php if(@count($class_data)){ foreach ($class_data as $key => $class_data_val) { ?>
                                                <tr align="center">
                                                    <td><b><?=$key?></b></td>
                                                    <td><b>
                                                        <?php

                                                        foreach ($class_data[$key]['section'] as $skey => $value) {
                                                             echo '- '.$value.'<br>';
                                                         } 

                                                        ?>
                                                        </b>
                                                    </td>
                                                    <td><b><?=$class_data[$key]['school']?></b></td>
                                                    <td><a href="<?= base_url('update_class/').$class_data[$key]['class_id']?>" class="btn btn-success btn-circle btn-sm icon">
                                                        <i class="fas fa-pen-nib"></i>
                                                    </a></td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                            </div>
                            <?php } ?>

                            <?php if($section == 'class_subject'){ ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                         <h4 class="card-title"><a href="<?=base_url("add_subjects") ?>" class="btn btn-success btn-sm"> Add </a> | <a href="<?=base_url("subject_type") ?>" class="btn btn-success btn-sm"> Add Subjects Type</a> | <a href="<?=base_url("subjects") ?>" class="btn btn-success btn-sm"> Add Subjects</a></h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Class</th>
                                                    <th>Subjects</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php foreach ($class_subject_data as $key => $class_subject_val) { ?>
                                                <tr>
                                                    <td><?=$class_subject_val['class']?></td>
                                                    <td style="font-weight: bold;font-size: 12px;"><?=$class_subject_val['sub_name']?></td>
                                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="edit_subject(<?=$class_subject_val['school_class_id']?>)" class="btn btn-success btn-circle btn-sm icon">
                                                        <i class="fas fa-pen-nib"></i>
                                                    </a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <!-- end card-body -->
                                </div>
                            </div>
                            <?php } ?>

                            <?php if($section == 'fees_assign'){ ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                         <h4 class="card-title"><a href="<?=base_url("fees_assign_add") ?>" class="btn btn-success btn-sm"> Add Class Fees</a></h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Class</th>
                                                    <th>Fees Detail</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php foreach ($fees_assign_data as $key => $fees_assign_data_val) { ?>
                                                <tr>
                                                    <!-- style="font-weight: bold;font-size: 12px;" -->
                                                    <td><?=$fees_assign_data_val['class']?></td>
                                                    <td style="color:black;"><?=$fees_assign_data_val['fees_detail']?></td>
                                                    <td><a href="<?=base_url('fees_assign_edit/'.$fees_assign_data_val['school_class_id'])?>" class="btn btn-success btn-circle btn-sm icon">
                                                        <i class="fas fa-pen-nib"></i>
                                                    </a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <!-- end card-body -->
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('components/footer'); ?>
            </div>
        </div>
        
        <!-- staticBackdrop Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-zoom  modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> <i class=" far fa-edit"></i> Edit Subjects</h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <?php echo form_open('', array('id' => 'form_add_classes')); ?>
                        <div class="modal-body">
                                <input type="hidden" name="class_id" id="class_id" value="" />
                                <label for="school_type_id" class="col-sm-2 col-form-label require">Subjects</label>
                                <select class="form-select select2" data-width="100%" multiple required data-placeholder="-- Select Multiple Subjects --"  name="subject_id[]" id="subject_id">
                                   
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-bor"> <i class="fas fa-plus-circle "></i> Update</button>
                            
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <?php $this->load->view('components/script'); ?>

        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        <!-- <script src="<?=base_url()?>assets/back/js/jquery.dataTables.min.js?q=<?=time()?>"></script>
        <script src="<?=base_url()?>assets/back/js/dataTables.bootstrap4.min.js?q=<?=time()?>"></script>

        <script src="<?=base_url()?>assets/back/js/dataTables.buttons.min.js?q=<?=time()?>"></script>
        <script src="<?=base_url()?>assets/back/js/buttons.colVis.min.js?q=<?=time()?>"></script>
        <script src="< ?=base_url()?>assets/back/js/buttons.bootstrap4.min.js?q=<?=time()?>"></script> -->
        
        <script src="<?=base_url()?>assets/back/js/dataTables.responsive.min.js?q=<?=time()?>"></script>
        <script src="<?=base_url()?>assets/back/js/responsive.bootstrap4.min.js?q=<?=time()?>"></script> 
        <script>
            $(document).ready(function(){
                $("#datatable").DataTable()
            });

            function edit_subject(class_id) {
                // alert(section_id);

                data = {
                        '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
                        'class_id': class_id,
                };
                $.ajax({
                    url: "<?=base_url();?>edit_subject",
                    type: "post",
                    data: data,
                    success: function(data) {
                        data = $.parseJSON(data);
                        $('#subject_id').html(data.subject);
                        $('#class_id').val(data.class_id);
                        $("#subject_id").trigger("change");

                    }
                });
            }
        </script>
    </body>
</html>

