<?php 
	$tabopen = $this->uri->segment(2);
	$tabactive = $this->uri->segment(3);
	$result = array();
	if (!empty($tabopen)) {
		if (!empty($tabactive)) {
			array_push($result,$tabopen,$tabactive);
		}
		else
		{
			array_push($result, $tabopen);
		}
	}
?>
<script>
var result = <?php echo json_encode($result); ?>;
    	
</script>
<?php 
	$count_app = count($apps);
?>
<!-- START CONTAINER -->
<div class="page-container row-fluid">
	<!-- SIDEBAR - START -->
	<div class="page-sidebar ">
		<!-- MAIN MENU - START -->
		<div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
		<!-- USER INFO - START -->
			<div class="profile-info row">
			<br>
			</div>
		<!-- USER INFO - END -->
			<ul style="height: auto;" class="wraplist">	
                <li class="" id="cl_dashboard"> 
                    <a href="<?php echo base_url(); ?>admin/dashboard">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="" id="cl_apps"> 
		            <a href="javascript:;">
		                <i class="fa fa-suitcase"></i>
		                <span class="title">Apps</span>
		                <span class="arrow "></span><span class="label label-orange"><?php echo $count_app; ?></span>
		            </a>
		            <ul class="sub-menu" >
		                <li>
		                    <a class="" id="at_add-new-app" href="<?php echo base_url(); ?>admin/apps/add-new-app">Add new App</a>
		                </li>
		                <li>
		                    <a class="" id="at_list-of-apps" href="<?php echo base_url(); ?>admin/apps/list-of-apps">List of Apps</a>
		                </li>
		                <li>
		                    <a class="" id="at_os" href="<?php echo base_url(); ?>admin/apps/os">OS Of App</a>
		                </li>
		                <li>
		                    <a class="" id="at_main-features" href="<?php echo base_url(); ?>admin/apps/main-features">Main Features Of App</a>
		                </li>
		                <li>
		                    <a class="" id="at_add-new-feature-of-app" href="<?php echo base_url(); ?>admin/apps/add-new-feature-of-app">Add Main Feature</a>
		                </li>
		            </ul>
		        </li>
		        <li class="" id="cl_company"> 
		            <a href="javascript:;">
		                <i class="fa fa-sliders"></i>
		                <span class="title">Company</span>
		                <span class="arrow "></span>
		            </a>
		            <ul class="sub-menu" >
		                <li>
		                    <a class="" id="at_infomation" href="<?php echo base_url(); ?>admin/company/infomation">Company Infomation</a>
		                </li>
		                <li>
		                    <a class="" id="at_add-new-contact" href="<?php echo base_url(); ?>admin/company/add-new-contact">Add new Contact</a>
		                </li>
		                <li>
		                    <a class="" id="at_list-of-contacts" href="<?php echo base_url(); ?>admin/company/list-of-contacts">List of Contacts</a>
		                </li>
		            </ul>
		        </li>
		        <li class="" id="cl_legal"> 
		            <a href="javascript:;">
		                <i class="fa fa-sliders"></i>
		                <span class="title">Legal</span>
		                <span class="arrow "></span>
		            </a>
		            <ul class="sub-menu" >
		                <li>
		                    <a class="" id="at_list-of-legal" href="<?php echo base_url(); ?>admin/legal/list-of-legal">List Of Legal</a>
		                </li>
		                <li>
		                    <a class="" id="at_add-new-legal" href="<?php echo base_url(); ?>admin/legal/add-new-legal">Add new Legal</a>
		                </li>
		            </ul>
		        </li>
		        <li class="" id="cl_jobs"> 
		            <a href="javascript:;">
		                <i class="fa fa-gift"></i>
		                <span class="title">Jobs</span>
		                <span class="arrow "></span><span class="label label-orange"></span>
		            </a>
		            <ul class="sub-menu" >
		                <li>
		                    <a class="" id="at_add-new-job" href="<?php echo base_url(); ?>admin/jobs/add-new-job">Add new Job</a>
		                </li>
		                <li>
		                    <a class="" id="at_list-of-jobs" href="<?php echo base_url(); ?>admin/jobs/list-of-jobs">List Of Jobs</a>
		                </li>
		                <li>
		                    <a class="" id="at_employment" href="<?php echo base_url(); ?>admin/jobs/employment">Employment</a>
		                </li>

		            </ul>
		        </li>
		        <!-- 
		        <li class="" id="cl_staffs"> 
		            <a href="javascript:;">
		                <i class="fa fa-envelope"></i>
		                <span class="title">Staffs</span>
		                <span class="arrow "></span><span class="label label-orange"></span>
		            </a>
		            <ul class="sub-menu" >
		                <li>
		                    <a class="" id="at_add-new-staff" href="<?php echo base_url(); ?>admin/staffs/add-new-staff">Add new Staff</a>
		                </li>
		                <li>
		                    <a class="" id="at_list-of-staffs" href="<?php echo base_url(); ?>admin/staffs/list-of-staffs">List of Staffs</a>
		                </li>
		            </ul>
		        </li>
		        -->
		        <li class="" id="cl_customers"> 
		            <a href="javascript:;">
		                <i class="fa fa-bar-chart"></i>
		                <span class="title">Customer</span>
		            </a>
		            <ul class="sub-menu" >
		                <li>
		                    <a class="" id="at_list-of-requests" href="<?php echo base_url(); ?>admin/customers/list-of-requests">List of Request</a>
		                </li>
		            </ul>
		        </li>
		        <li class="" id="cl_settings"> 
		            <a href="javascript:;">
		                <i class="fa fa-table"></i>
		                <span class="title">Settings</span>
		                <span class="arrow "></span>
		            </a>
		            <ul class="sub-menu" >
		                <li>
		                    <a class="" id="at_sliders" href="<?php echo base_url(); ?>admin/settings/sliders">Sliders</a>
		                </li>
		                <li>
		                    <a class="" id="at_legal-page" href="<?php echo base_url(); ?>admin/settings/legal-page">Legal Page</a>
		                </li>
		            </ul>
		        </li>                          
            </ul>
		</div>
		<!-- MAIN MENU - END -->
		<div class="project-info">
			<div class="block1">        
			
			</div>
			<div class="block2">        
			
			</div>
		</div>
	</div>
<!--  SIDEBAR - END -->

