<!doctype html>
<html lang="en">
<head>
<?php $this->load->view('common/head'); ?>

<style type="text/css">
  .swiper-slide-active{
    margin-left: 23px !important;
  }
</style>
</head>
<body>
<?php $this->load->view('common/header'); ?>
        
        <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <?php foreach ($slider as $key => $sliderrow) {
          $active = (($key+1) == 1) ? 'active' : '';
         ?>
        <div class="carousel-item <?=$active?>" style="background-image: url(<?=base_url('assets/uploads/slider_img/'.$sliderrow->slider_img)?>)">
          <div class="container">
            <h4 class="p-1 m-0"><?=$sliderrow->slider_title?></h4>
          </div>
        </div>
      <?php } ?>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id=""> 
    <section id="featured-services" class="featured-services" style="position: relative;z-index: 2;">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="section-title">
            <h2>Quick brief about our college</h2>
          </div>

          <div class="col-lg-5 mb-5 mb-lg-0">
            <div class="row mt-4">
              <div class="col-6 border bg-light" data-aos="fade-up" data-aos-delay="100">
                <h6 class="bg-base p-2 mt-n1 text-white text-center"><?=$about_college->label1?></h6>
                <p class="description"><?=$about_college->description1?></p>                
              </div>
              <div class="col-6 border bg-light" data-aos="fade-up" data-aos-delay="200">
                <h6 class="bg-base p-2 mt-n1 text-white text-center"><?=$about_college->label2?></h6>
                <p class="description"><?=$about_college->description2?></p>
              </div>
            </div>

            <div class="row mt-5">
              
              <div class="col-6 border bg-light" data-aos="fade-up" data-aos-delay="300">
                <h6 class="bg-base p-2 mt-n1 text-white text-center"><?=$about_college->label3?></h6>
                <p class="description"><?=$about_college->description3?></p>
              </div>
              <div class="col-6 border bg-light" data-aos="fade-up" data-aos-delay="400"> 
                <h6 class="bg-base p-2 mt-n1 text-white text-center"><?=$about_college->label4?></h6>
                <p class="description"><?=$about_college->description4?></p>
              </div>              
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left">
            <!-- <img src="assets/img/proposed.jpg" class="img-fluid my-1 me-3 shadow img-thumbnail float-start height-100" alt=""> -->
            <ul class="">
                <?=$about_college->long_description?>
            </ul>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->


    <section id="counts" class="counts pb-0">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row row-cols-lg-5 bg-base-2 p-5">

          <div class="col-lg-12">
            <h3 class="text-center text-light text-shadow-dark">Administrative Heads</h3>
            <br>
          </div>
          <?php foreach ($administrative_heads as $key => $administrative_head) {
            ?>
          <div class="mt-3 mt-lg-0 d-md-flex align-items-md-stretch">
            <!-- <img src="https://govtmedicalcollegechhindwara.com/upload/cdean.jpg" class="height-100 width-100 ">   -->
            <div class="count-box p-3">        
              <label class="fw-bold text-center fs-6"> <?=$administrative_head->heading?> </label> 
              <hr class="mb-1">      
              <p class="text-dark m-0 p-0"><?=$administrative_head->title?></p>
            </div>
          </div>
         <?php } ?>

       </div>

     </div>
    </section> 

    <section id="desk" class="desk bg-light pt-0">
      
      <div class="container">
        <div class="row">
          
          <h3 class="text-center my-5">From Dignitaries's Desk </h3>

          <div class="col-lg-6">
            <?php $mt = ''; foreach ($principal_msg as $key => $principal_msgrow) {
              if ($key > 0) {
                $mt = 'mt-3';
              }
            ?>
            <div class="mt-1 mt-lg-0 row">
              <div class="bg-white p-3 shadow <?=$mt?>">
                <p class="text-dark m-0"><span class="fw-bold"> <?=$principal_msgrow->heading?> </p>
                <hr class="border border-secondary">
                <img src="<?=base_url('assets/uploads/member_message_img/'.$principal_msgrow->image)?>" alt="" class="height-200 float-start me-3 img-thumbnail">
                <p>
                 <?=$mdl->textShorten($principal_msgrow->description, 300)?>
                </p>
                <hr class="border border-secondary">
                <button type="button" class="btn btn-warning float-end shadow-md" data-bs-toggle="modal" data-bs-target="#msvp" onclick='getFulltxt(<?=$principal_msgrow->member_message_id?>)'>Read More...</button>
              </div>
            </div>

            <div id="filltxt_<?=$principal_msgrow->member_message_id?>" style="display:none;">
              <?=$principal_msgrow->description?>
            </div>

          <?php } ?>

           
          </div>

          <div class="col-lg-6">

            <div class="icon-box mt-1 mt-lg-0">
              <h6 class="bg-base text-white p-2 text-center">About the Hospital</h6>
              <br/>
                <img src="<?=base_url('assets/uploads/about_hospital/'.$about_hospital->image)?>" class="img-thumbnail height-200 float-start me-3 mb-2">
                <?=$mdl->textShorten($about_hospital->description, 1100)?>
                <hr />
                <button type="button" class="btn btn-warning float-end shadow-md" data-bs-toggle="modal" data-bs-target="#history">Read More...</button>

            </div>
          </div>


        </div>
      </div>
    </section>

     <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up" style="color: white;">
        <div class="row">
          <div class="col-lg-8 border">

            <div class="icon-box mt-1 mt-lg-0">
                <h6 class="bg-base text-white p-2 text-center">History &amp; Heritage</h6>
                <br>
                <?=$history_heritage->description?>
            </div>
          </div>
          <div class="col-lg-4">
            
            <div class="bg-white p-3 shadow">
                <p class="text-dark m-0"><span class="fw-bold"> Academic Activities</span></p>
                <hr class="border border-secondary">
                <?php foreach ($academic_activitie as $key => $academic_activitierow) { ?>
                  <p class="text-dark">
                    <label class="fw-bold"><?=$academic_activitierow->label?>: </label> <?=$academic_activitierow->description?>
                  </p>  
                <?php } ?>             
            </div>
            
            <div class="bg-white p-3 shadow mt-2">

                <p class="text-dark m-0"><span class="fw-bold"> Faculty Details</span></p>
                <hr class="border border-secondary">
                <p class="text-dark">
                  <?=$faculty_details->label?> <label class="fw-bold"><a target="_blank" class="" href="<?=base_url('assets/uploads/faculty_details/'.$faculty_details->document)?>">Download Here</a> </label>
                </p>
            </div>

            <div class="bg-white p-3 shadow mt-2">
                <p class="text-dark m-0"><span class="fw-bold"> College Committees</span></p>

                <?php foreach ($college_committee as $key => $college_committeerow) {?>
                  <hr class="border border-secondary">
                  <p class="text-dark">
                    <label class="fw-bold"><?=$key+1?>: </label>
                    <a class="" href="<?=base_url('committee_details/'.$college_committeerow->college_committee_id)?>"><?=$college_committeerow->committee_name?></a>
                  </p>
                <?php } ?>
                
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Features Section -->

    <!-- ======= Department Section ======= -->
    <section id="doctors" class="gallery bg-light">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Departments</h2>
        </div>

        <div class="gallery-slider swiper">

          <div class="swiper-wrapper align-items-center">
            
              <?php foreach ($department as $key => $departmentrow) {?>
            
            <div class="swiper-slide"><a target="_blank"  href="<?=base_url('department_details/'.$departmentrow->department_id)?>"><h6 class="text-center m-0"><?=$departmentrow->department_name?></h6></a></div>

           <?php } ?>
            
            

            <!-- <div class="swiper-pagination"></div>  -->
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
          </div>

      </div>
    </section><!-- End Department Section -->
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

  </main>

  <?php $this->load->view('common/footer'); ?>
            
  <?php $this->load->view('common/script'); ?>


<script type="text/javascript">
  
  function getFulltxt(id){

    console.log(document.getElementById('filltxt_'+id).innerHTML);

    document.getElementById('pmsg').innerHTML = document.getElementById('filltxt_'+id).innerHTML;

  }
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