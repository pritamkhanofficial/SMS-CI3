<!doctype html>
<html lang="en">
<head>
<?php $this->load->view('common/head'); ?>
</head>
<body>
<?php $this->load->view('common/header'); ?>
   
  <section id="">
    <img src="<?=base_url()?>assets/front/img/1.jpg" class="w-100">
  </section><!-- End Hero -->

  <main class="container">
 
    <div class="row">
      
         <div class="section-title">
            <h2>Committee Details</h2>
            <h4><?=$college_committee->committee_name?></h4>
        </div>

        <table class="table w-100">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Designation</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  if (@count($committee_details) > 0) {
                  foreach ($committee_details as $key => $committee_detailsrow) { ?>
                <tr>
                    <th scope="row"><?=$key+1?></th>
                    <td><?=$committee_detailsrow->name?></td>
                    <td><?=$committee_detailsrow->description?></td>
                </tr>
                <?php }}else{ ?>
                  <tr>
                    <td colspan="3" align="center">Data Not Found</td>
                </tr>
                <?php } ?>               
            </tbody>
        </table>
    </div>
  </main>

<?php $this->load->view('common/footer'); ?>            
<?php $this->load->view('common/script'); ?>


<script type="text/javascript">

</script>


<!-- Modal -->
    <div class="modal fade" id="msvp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">FROM THE PRINCIPAL’S DESK</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="pmsg">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="history" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">About the Hospital</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?=$about_hospital->description?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</body>
</html>