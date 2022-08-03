  <nav id="footer" class="bg-dark px-6">
	<div class="row no-gutters align-items-left flex-nowrap">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				simeTHRIS V.2 Made with <i class="icon icon-heart text-danger-700"></i> by Creative Tim
			</div>
		</div>
		<div class="col-auto">
			<div class="row no-gutters align-items-center justify-content-end">
				<?php echo strtoupper($this->session->nama_perusahaan)?>
			</div>
		</div>
	</div>
   </nav>
   <script type="text/javascript">
  $(document).ready(function(){
    
    setInterval(function(){
      //beep();
          $.ajax({
                url:"<?=base_url()?>verifikator/get_total_unverifikasi",
                type:"POST",
                dataType:"json",//datatype lainnya: html, text
                data:{},
                success:function(data){
                    $("#total_unverifikasi").html(data.total);
                    $("#total_unverifikasi_nav").html(data.total);
                }
            });
          },2000);
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    function beep() {
      var snd = new Audio("<?php echo base_url() ?>assets/beep.mp3");  
      snd.play();
    }
    setInterval(function(){
          $.ajax({
                url:"<?=base_url()?>chat/get_total_unread",
                type:"POST",
                dataType:"json",//datatype lainnya: html, text
                data:{},
                success:function(data){
                    var nowtot = $("#total_unread").html();
                    if (parseInt(nowtot) < data.total_unread) {
                        beep();
                    }
                    $("#total_unread").html(data.total_unread);
					          $("#total_unread_nav").html(data.total_unread);
                }
            });
          },2000);
  })
</script>
