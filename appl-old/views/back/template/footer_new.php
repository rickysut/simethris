<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer">
	<div class="row d-flex justify-content-between">
		<div class="col">
			&copy;
			<small><script>document.write(new Date().getFullYear())</script>
			</small><small>Tim Pengembang simeTHRis Direktorat Jenderal Hortikultura.</small>
			<a style="color:#dc3545;">&#x26A0;</a>
			<small  style="color:#dc3545;">Protoype Versi 022.1</small>
		</div>
		<div class="col-auto font-bold">
			<h6><?php echo strtoupper($this->session->nama_perusahaan)?></h6>
		</div>
	</div>
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== --><script type="text/javascript">
  $(document).ready(function(){
    setInterval(function(){
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
    setInterval(function(){
          $.ajax({
                url:"<?=base_url()?>chat/get_total_unread",
                type:"POST",
                dataType:"json",//datatype lainnya: html, text
                data:{},
                success:function(data){
                    $("#total_unread").html(data.total_unread);
					$("#total_unread_nav").html(data.total_unread);
                }
            });
          },2000);
  })
</script>
