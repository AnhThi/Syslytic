<!--============================== BODY =======================================-->

		<div style="background-image: url(<?php echo base_url(); ?>upload/images/frontend/jobs_bg.jpg);  background-size: cover; background-position: center; width: 100vw; height: 93.5vh; margin-top: 60px;"></div>
		
		<div style="width: 0px; height: 0px; border-top: 90px solid transparent; border-right: 100vw solid #ffffff; margin-top: -88px; z-index: 100; position: relative;"></div>

		<div class="container" style="margin-top: 30px; margin-bottom: 180px; min-height: 800px;">
			<p style="font-size: 1.7em; text-align: center; margin-top: 25px; padding-bottom: 40px;">AVAILABLE POSITIONS</p>
			<p style="font-size: 1.3em !important; margin-left: 50px; margin-right: 80px;" class="for_GrayText">
				When you come to the right stage, you will have the best performance. Whatever talent you have, we want to be your stage.
			</p>
			<?php 
				if (isset($jobs)) {
					foreach ($jobs as $j) {
			?>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 50px; min-height: 180px;">
				<label style="color: #22a7f0; font-size: 1.3em;"><?php echo $j['po_name']; ?></label>
				<p class="for_GrayText"><?php echo $j['j_des']; ?></p>
				<?php 
					if ($j['j_stt']==1){
	                    echo "<a href='".base_url('company/jobs/apply-job/'.$j['j_id'])."' id='btn_applyjob' type='button' class='form-control' style='width: 100px; height: 35px;'>Apply</a>";
	                }
	                else
	                {
	                	echo "<a type='button' href='".base_url('company/jobs/apply-job/'.$j['j_id'])."' class='form-control'   style='width: 100px; height: 35px;display:none;'>Apply</a>";
	                }
				?>
			
			</div>
			
			<?php
					}
				}
			?>
		</div>
		<div>
			
		</div>

		<!--============================== ==== =======================================-->
