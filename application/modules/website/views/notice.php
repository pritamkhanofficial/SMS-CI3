<?php echo "string"; ?>

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
            <h2>Tender / Notice</h2>
        </div>

        <table class="table w-100">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  if (@count($notice) > 0) {
                  foreach ($notice as $key => $noticerow) { ?>
                <tr>
                    <th scope="row">
                    	<?php
                    		echo $key+1;
                    		if ($noticerow->is_new == 'Yes') {?>
                    			<img src="https://c.tenor.com/x8buEnCiZ4MAAAAC/new-blinking.gif" style="height:30px" />
                    		<?php }
                    	?>
                    	
                    </th>
                    <td>
                    	<?php
	                    	if ($noticerow->category == 'Tender') {
	                    		echo "Tender";
	                    	}else if($noticerow->category == 'Notice'){
	                    		echo "Notice";
	                    	}
                    	?>
                    	</td>
                    <td><?=$noticerow->title?></td>

                    <td><?=date("d-m-Y", strtotime($noticerow->uploaded_date))?></td>
                    <td><a class="text-primary" target="_blank" href="<?=base_url('assets/uploads/tender_notice_doc/'.$noticerow->document)?>">Download</a></td>
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
</body>
</html>