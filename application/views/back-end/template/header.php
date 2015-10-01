<!-- BEGIN BODY -->
<body >
	<!-- START TOPBAR -->
	<div class='page-topbar '>
		<div class='logo-area'>
		</div>
		<div class='quick-area'>
			<div class='pull-left'>
				<ul class="info-menu left-links list-inline list-unstyled">
                    <li class="sidebar-toggle-wrap">
                        <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
				</ul>
			</div>      
			<div class='pull-right'>
				<ul class="info-menu right-links list-inline list-unstyled">            
				    <li class="profile showopacity">
                        <a aria-expanded="false" href="#" data-toggle="dropdown" class="toggle">
                            <!--<img src="data/profile/profile.png" alt="user-image" class="img-circle img-inline">-->
                            <span>
                                <?php 
                                    echo $this->session->fullname;
                                ?>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu profile animated fadeIn">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/user/edit/<?php echo $this->session->id; ?>">
                                    <i class="fa fa-user"></i>Profile
                                </a>
                            </li>
                            <li class="last">
                                <a href="<?php echo base_url(); ?>admin/logout">
                                    <i class="fa fa-lock"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
				</ul>           
			</div>      
		</div>
	</div>
	<!-- END TOPBAR -->