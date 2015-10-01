
<nav class="navbar navbar-fixed-top">
	<div style="background-color: #FFFFFF; box-shadow: 0px 1px 5px #232323; padding-bottom: 7px;">
		<div class="container" id="nav_mainMenu">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav_menu" style="background-color: #c91f37;">
		        <span class="icon-bar" style="background-color: #ffffff;"></span>
		        <span class="icon-bar" style="background-color: #ffffff;"></span>
		        <span class="icon-bar" style="background-color: #ffffff;"></span>                        
		    </button>
			<div class="navbar-header">
				<a href="<?php echo base_url(); ?>" class="navbar-brand">
					<img src="<?php echo base_url(); ?>upload/images/frontend/logo.png" style="width: 128px; height: 43px; margin-top: -6px;" />
				</a>
			</div>

			<div id="nav_menu" class="collapse navbar-collapse" >
				<ul class="nav navbar-nav navbar-right" style="margin-top: 10px;">
					<li id="mnu_products"><a href="javascript:;" style="font-family: 'OpenSans Regular'; background-color: #ffffff; color: #333333;">Products</a></li>
					<li id="mnu_company"><a href="javascript:;" style="font-family: 'OpenSans Regular'; background-color: #ffffff; color: #333333;">Company</a></li>
					<li id="mnu_support"><a href="<?php echo base_url(); ?>support" style="font-family: 'OpenSans Regular'; background-color: #ffffff; color: #333333;">Support</a></li>
				</ul>
			</div>

		</div>
	</div>
	<div style="background-color: rgba(23, 23, 23, 0.35);">
		<div class="container">
			<div style="width: 242px;" class="pull-right">
				<div id="nav_subProducts" class="pull-left">
					<ul class="nav navbar-nav navbar-right" style="margin-top: 0px;">
						<?php
							if (isset($products)) {
								foreach ($products as $pro) {
						?>
							<li><a href="<?php echo base_url(); ?>apps/<?php echo $pro['pro_id'] ?>" style="font-family: 'OpenSans Regular'; color: #f9f9f9;"><?php echo $pro['pro_name'] ?></a></li>
						<?php 
								}
							}
						?>
					</ul>
				</div>

				<div id="nav_subCompany" class="pull-left">
					<ul class="nav navbar-nav navbar-right" style="margin-top: 0px;">
						<li><a href="<?php echo base_url(); ?>company/about-us" style="font-family: 'OpenSans Regular'; color: #f9f9f9;">About us</a></li>
					<li><a href="<?php echo base_url(); ?>company/jobs" style="font-family: 'OpenSans Regular'; color: #f9f9f9;">Jobs</a></li>
					<li><a href="<?php echo base_url(); ?>company/legal" style="font-family: 'OpenSans Regular'; color: #f9f9f9;">Legal</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
