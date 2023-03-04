
<?php $this->load->view('common/head'); ?>
<?php $this->load->view('common/grocerycss'); ?>
<body>
    <div class="wrapper">
        <?php $this->load->view('common/sidebar'); ?>

        <div id="body" class="active">
            <?php $this->load->view('common/header'); ?>

            <div class="container-fluid">
               <div class="row">

                <div class="col-12" style="padding:8px;">
                     <?php echo $output; ?>
                </div>
                   
               </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('common/script'); ?>
    <?php $this->load->view('common/groceryjs'); ?>
</body>