		<div style="background-image: url(<?php echo base_url(); ?>upload/images/frontend/legal_bg.jpg); background-size: cover; width: 100vw; height: 93.5vh; margin-top: 60px; background-position: center;"></div>

		<div style="width: 0px; height: 0px; border-top: 90px solid transparent; border-right: 100vw solid #ffffff; margin-top: -88px; z-index: 100; position: relative;"></div>		

		<div class="container" style="margin-bottom: 150px; min-height: 800px;">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style="margin-top: 50px;">
				<h1><?php echo $le_cont[0]['lec_title']; ?></h1>
				<p>
					<?php echo $le_cont[0]['lec_content']; ?>
				</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin-top: 50px;">
				<p style="font-size: 1.5em;">Legal</p>
				<?php 
					foreach ($le as $l) {
				?>
						<a href="<?php echo base_url('company/legal/'.$l['lec_id']) ?>">
							<p style="font-size: 1.2em; margin-top: 10px;" class="for_GrayText"><?php echo $l['lec_title'] ?></p>
						</a>
						<div class="for_Line"></div>
				<?php } ?>
			</div>
		</div>