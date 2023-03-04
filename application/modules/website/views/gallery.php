<?php  ?>

<!doctype html>
<html lang="en">
<head>
<?php $this->load->view('common/head'); ?>
</head>
<body>
<?php $this->load->view('common/header'); ?>
   
    
   <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <img class="w-100" src="<?=base_url()?>assets/front/img/1.jpg" alt="" class="w-100 p-0">
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

  <main id="">

<section class="section bg-light m-0 pt-5" id="about">
        <div class="container">
            <div class="row d-block mx-auto">
                <div class="section-heading">
                    <h4 class="mb-3 text-center">Our Gallery</h4>
                    <hr class="border-secondary">
                </div>            
            </div>
            
             <div class="row main-gallery">
             	<?php if (@count($gallery) > 0) {?>
              <?php foreach ($gallery as $key => $galleryrow) {?>
               <div class="col-lg-3">
                  <a href="<?=base_url('assets/uploads/gallery_image/'.$galleryrow->gallery_image)?>" class="glightbox gallery-lightbox w-100">
                    <img class="shadow w-100 m-3" src="<?=base_url('assets/uploads/gallery_image/'.$galleryrow->gallery_image)?>">
                 </a>
                </div>
              <?php }}else{ ?>
              	<h1 class="text-center">Data Not Found</h1>
              <?php } ?>

              
            </div>

        </div>
    </section>

     <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

      </div>

      <div>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <!-- <i class="bx bx-map"></i> -->
                  <h3>Our Communication</h3>
                  <p class="p-4">
                    <?=$contact->communication?>
                  </p>
                </div>
              </div>
            </div>

          </div>

            <div class="col-lg-4">
                <div class="row">
                    <div class="info-box">
                      <!-- <i class="bx bx-phone-call"></i> -->
                      <h3>Contact Us</h3>
                      <p><?=$contact->contact_no?></p>
                    </div>
              </div>
              <div class="row mt-3">
                <div class="info-box">
                  <!-- <i class="bx bx-envelope"></i> -->
                  <h3>Email Us</h3>
                  <p><?=$contact->email?></p>
                </div>
              </div>
              <div class="row mt-3">
                <div class="info-box">
                  <!-- <i class="bx bx-phone-call"></i> -->
                  <h3>Address</h3>
                  <?=$contact->address?>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
                
                <iframe src="<?=$contact->map?>" style="border:0; width: 100%; min-height: 350px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

<?php $this->load->view('common/footer'); ?>            
<?php $this->load->view('common/script'); ?>



<script type="text/javascript">

</script>

</body>
</html>