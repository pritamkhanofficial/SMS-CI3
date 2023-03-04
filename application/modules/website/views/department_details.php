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
            <h2>Department details of <?=$department->department_name?></h2>
            <h4>Faculty Details</h4>
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
                  if (@count($faculty_details) > 0) {
                  foreach ($faculty_details as $key => $faculty_detailsrow) { ?>
                <tr>
                    <th scope="row"><?=$key+1?></th>
                    <td><?=$faculty_detailsrow->faculty_name?></td>
                    <td><?=$faculty_detailsrow->faculty_designation?></td>
                </tr>
                <?php }}else{ ?>
                  <tr>
                    <td colspan="3" align="center">Data Not Found</td>
                </tr>
                <?php } ?>               
            </tbody>
        </table>
    </div>
    

    <div class="row my-3">
        <div class="section-title">
            <hr>
            <h4>Departmental Gallery</h4>
        </div>
        <div class="row gallery">
            <?php 
              if (@count($departmental_gallery) > 0) {
              foreach ($departmental_gallery as $key => $departmental_galleryrow) { 
            ?>
            <a href="<?=base_url('assets/uploads/departmental_gallery/'.$departmental_galleryrow->image)?>" class="gallery-lightbox col-md-3 col-sm-4 col-lg-2 mb-3" data-glightbox="title: Department of Anatomy; description: Demonestration Room">
              <img class="w-100 shadow-sm border" src="<?=base_url('assets/uploads/departmental_gallery/'.$departmental_galleryrow->image)?>" alt="image" />
            </a>
           <?php }}else{ ?>
            <div class="col-lg-12 text-center">Data Not Found</div>
           <?php } ?>
        </div>
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