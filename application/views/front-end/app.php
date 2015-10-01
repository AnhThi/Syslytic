<!--======================= CONTENT =============================-->

		<div style="background-image: url(<?php echo base_url('upload/images/apps/') ?>/<?php echo $app[0]['pro_id'] ?>/<?php echo $app[0]['pro_img_bg'] ?>); width: 100vw; height: 93.5vh; background-size: cover; background-repeat: no-repeat; background-position: center; margin-top: 60px;"></div>

		<div style="width: 0px; height: 0px; border-top: 90px solid transparent; border-right: 100vw solid #ffffff; margin-top: -89px; z-index: 100; position: relative;"></div>

		<div class="container" style="margin-top: 90px; margin-bottom: 120px;">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<img src="<?php echo base_url('upload/images/apps/'); ?>/<?php echo $app[0]['pro_id']; ?>/<?php echo $app[0]['pro_img_des']; ?>" class="img-responsive" />
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<img src="<?php echo base_url('upload/images/apps/'); ?>/<?php echo $app[0]['pro_id']; ?>/<?php echo $app[0]['pro_icon']; ?>" />

				<div style="font-size: 1.2em; margin-top: 45px; text-align: justify;" class="for_GrayText">
					<?php echo $app[0]['pro_des'] ?>
				</div>

				<button class="btn btn-primary" style="margin-top: 40px; padding: 15px 20px; margin-top: 20px;" id="btn_requestademo" data-toggle="modal" data-target="#div_requestademo">Request a demo</button>
				<p style="margin-top: 34px; font-size: 1.3em;">Available for</p><?php 
					foreach ($os as $o) {
				?>
				<a href="<?php echo $o['os_link']; ?>"><img style="margin-right: 7px;" src="<?php echo base_url('upload/images/apps/') ?>/<?php echo $app[0]['pro_id']; ?>/<?php echo $o['os_icon']; ?>" style="width: 150px; height: 50px; margin-bottom: 5px;" /></a>
				<?php } ?>
			</div>
		</div>
		<div style="width: 0px; height: 0px; border-top: 25px solid transparent; border-left: 100vw solid #3397ca; margin-top: -25px; z-index: 100; position: relative;">
			
		</div>
		
		<div style="width: 100vw; height: auto; background-color: #3397ca; padding-bottom: 80px;" class="row">
			<div class="container" style="margin: auto;">
				<p style="color: #ffffff; font-size: 1.9em; padding-left: 0px; padding-top: 50px;">Main Features</p>
				<div style="margin-top: 105px;">
					<?php
						if (count($mf)<3) {
							for ($i=0; $i < count($mf); $i++) { 
								echo "
									<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6' style='min-height: 300px;'>
										<img src='".base_url()."upload/images/apps/".$app[0]['pro_id']."/".$mf[$i]['mf_icon']."' style='width: 50px; height: 50px; margin-right: 15px;' />
										<span style='font-size: 1.7em; color: #ffffff;'>".$mf[$i]['mf_title']."</span>
								";
								if ($i==(count($mf)-1)) {
									echo "<div style='height: 100px; margin-top: 15px;'>";
								}
								else
								{
									echo "<div style='height: 100px;border-right: 2px solid #ffffff; margin-top: 15px;'>";
								}
								echo "
											<p style='color: #ffffff; font-size: 1.2em; margin-top: 25px; margin-right: 20px;'>".$mf[$i]['mf_des']."</p>
										</div>
									</div>
								";
							}
						}
						else if (count($mf)<4) {
							for ($i=0; $i < count($mf); $i++) { 
								echo "
									<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4' style='min-height: 300px; padding-left: 5px;'>
										<img src='".base_url()."upload/images/apps/".$app[0]['pro_id']."/".$mf[$i]['mf_icon']."' style='width: 50px; height: 50px; margin-right: 15px;' />
										<span style='font-size: 1.7em; color: #ffffff;'>".$mf[$i]['mf_title']."</span>
								";
								if ($i==(count($mf)-1)) {
									echo "<div style='height: 100px; margin-top: 15px;'>";
								}
								else
								{
									echo "<div style='height: 100px;border-right: 2px solid #ffffff; margin-top: 15px;'>";
								}
								echo "
											<p style='color: #ffffff; font-size: 1.2em; margin-top: 25px; margin-right: 20px;'>".$mf[$i]['mf_des']."</p>
										</div>
									</div>
								";
							}
						}
						else
						{
							for ($i=0; $i < count($mf); $i++) { 
								echo "
									<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3' style='min-height: 300px;'>
										<img src='".base_url()."upload/images/apps/".$app[0]['pro_id']."/".$mf[$i]['mf_icon']."' style='width: 50px; height: 50px; margin-right: 15px;' />
										<span style='font-size: 1.7em; color: #ffffff;'>".$mf[$i]['mf_title']."</span>
								";
								if ($i==(count($mf)-1)) {
									echo "<div style='height: 100px; margin-top: 15px;'>";
								}
								else
								{
									echo "<div style='height: 100px;border-right: 2px solid #ffffff; margin-top: 15px;'>";
								}
								echo "
											<p style='color: #ffffff; font-size: 1.2em; margin-top: 25px; margin-right: 20px;'>".$mf[$i]['mf_des']."</p>
										</div>
									</div>
								";
							}
						}
					?>
				</div>
			</div>
		</div>

		<!--======================= ======= =============================-->
