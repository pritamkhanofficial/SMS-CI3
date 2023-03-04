
        

        <script src="<?=base_url()?>assets/back/js/jquery.min.js?q=<?=time()?>"></script>
        <script src="<?=base_url()?>assets/back/js/bootstrap.bundle.min.js?q=<?=time()?>"></script>
        <script src="<?=base_url()?>assets/back/js/metisMenu.min.js?q=<?=time()?>"></script>
        <script src="<?=base_url()?>assets/back/js/app.js?q=<?=time()?>"></script>

        

        <script src="<?=base_url()?>assets/back/js/simplebar.min.js?q=<?=time()?>"></script>
        <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
        <script src="<?=base_url()?>assets/back/js/lobibox.min.js?q=<?=time()?>"></script>
        <script src="<?=base_url()?>assets/back/js/select2.min.js?q=<?=time()?>"></script>

        <?php 
            $icontype = 'fa fa-info-circle';
            if ($this->session->flashdata('type') == 'warning') {
                $icontype = 'fa fa-exclamation-circle';
            }elseif ($this->session->flashdata('type') == 'error') {
                $icontype = 'fa fa-times-circle';
            }elseif($this->session->flashdata('type') == 'success'){
                $icontype = 'fa fa-check-circle';
            }
            $title = '';
            if ($this->session->flashdata('title') == '') {
                $title = $this->session->flashdata('type');
            }else{
                $title = $this->session->flashdata('title');
            }
            $title = ucwords($title);

        ?>

        <?php if ($this->session->flashdata('type')) {?>

        <script type="text/javascript">


            $(document).ready(function(){

                

                Lobibox.notify("<?=$this->session->flashdata('type')?>", {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                title: "<?=$title?>",
                position: 'top center',
                icon: '<?=$icontype?>',
                msg: "<?=$this->session->flashdata('msg')?>"
                });
            });
        </script>
    <?php } ?>


    <script type="text/javascript">
        $('.select2').select2();
        function notification(obj){
            var icontype = 'fa fa-info-circle';
            if(obj.type == 'success'){
                icontype = 'fa fa-check-circle';
            }else if(obj.type == 'error'){
                icontype = 'fa fa-times-circle';
            }else if(obj.type == 'warning'){
                icontype = 'fa fa-exclamation-circle';
            }
            
            Lobibox.notify(obj.type, {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            title: obj.title,
            position: 'top center',
            icon: icontype,
            msg: obj.msg
            });
        }
    </script>
        

   