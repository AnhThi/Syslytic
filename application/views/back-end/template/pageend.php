		</div>
		<!-- END CONTAINER -->
		<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
		<!-- CORE JS FRAMEWORK - START --> 
		<script src="<?php echo base_url(); ?>assets/back-end/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
		<script src="<?php echo base_url(); ?>assets/back-end/js/jquery.easing.min.js" type="text/javascript"></script> 
		<script src="<?php echo base_url(); ?>assets/back-end/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
		<script src="<?php echo base_url(); ?>assets/back-end/plugins/pace/pace.min.js" type="text/javascript"></script>  
		<script src="<?php echo base_url(); ?>assets/back-end/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
		<script src="<?php echo base_url(); ?>assets/back-end/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
		<!-- CORE JS FRAMEWORK - END --> 

		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
		<?php 
			if (isset($footer)) 
			{
				echo $footer;
			}
		?>
		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

		<!-- CORE TEMPLATE JS - START --> 
		<script src="<?php echo base_url(); ?>assets/back-end/js/scripts.js" type="text/javascript"></script> 
		<!-- END CORE TEMPLATE JS - END --> 
		<!-- Sidebar Graph - START --> 
		<script src="<?php echo base_url(); ?>assets/back-end/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/back-end/js/chart-sparkline.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/back-end/js/c4plus.js" type="text/javascript"></script>
		<script src="http://maps.googleapis.com/maps/api/js"> </script>
		<!-- Sidebar Graph - END --> 
		
	</body>
</html>