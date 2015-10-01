	<!--============================== BODY =======================================-->
		
		
		<div style="background-image: url(<?php echo base_url(); ?>upload/images/frontend/jobs_bg.jpg);  background-size: cover; background-position: center; width: 100vw; height: 1000px; margin-top: 0px;"></div>
		
		<div style="width: 0px; height: 0px; border-top: 40px solid transparent; border-left: 100vw solid #ffffff; margin-top: -40px; z-index: 100; position: relative;"></div>
		
		<div style="width: 40vw; margin-top: 30px; margin: auto; min-height: 800px;">
			
			<p style="font-size: 1.7em; text-align: center; margin-top: 25px; padding-bottom: 40px;">APPLY <?php echo $job[0]['po_name'] ?></p>
			<p style="font-size: 1.3em !important; margin-left: 50px; margin-right: 80px;" class="for_GrayText">
				<?php echo $job[0]['j_des'] ?>
			</p>
			<?php 
				$attribute = array('id'=>'frm_applyjob');
				echo form_open_multipart('company/jobs/apply-job/'.$job[0]['j_id'].'/add',$attribute);
			?>
			
				<input type="hidden" name="typecv" id="typecv">
				<input id="fname" name="fname" value="<?php echo $this->input->post('fname'); ?>" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="First Name" />
				<?php echo form_error('fname'); ?>
				<input id="lname" name="lname" value="<?php echo $this->input->post('lname'); ?>" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="Last Name" />
				<?php echo form_error('lname'); ?>
				<input id="email" name="email" value="<?php echo $this->input->post('email'); ?>" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="Email" />
            	<?php echo form_error('email'); ?>
            	<input id="phone" name="phone" value="<?php echo $this->input->post('phone'); ?>" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="Phone" />
				<?php echo form_error('phone'); ?>
				<p class="for_GrayText" style="font-size: 1.2em; font-weight: bold;">Attach your CV<p/>
            	<input id="idcv_upload" name="cv_upload" type="file" style="width: 100%;"/>
            	<br/>
           		<div id="error_upload"></div>
            	<?php echo form_error('cv_upload'); ?>
		<?php
			echo $this->recaptcha->getWidget();
			echo $this->recaptcha->getScriptTag();
		?>
           
            <?php
            	$mess = $this->session->flashdata('cvup');
            	if (!empty($mess)) {
            		echo '<div class="alert alert-warning">';
                    echo '<a class="close" data-dismiss="alert">×</a>';
                    echo '<strong>Warning!</strong> '.$mess.'';
                	echo '</div>'; 
            	}
            	
            ?>
            <input type="submit" id="btn_applyjob" class="btn btn-primary center-block" style="background-color: #338fc2 !important; border: 1px solid #338fc2; margin-top: 0px;" value="Send"/>
			<?php echo form_close(); ?>
		</div>

		<!--============================== ==== =======================================-->
		
<script>
$("#idcv_upload").change(function() {

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'doc': case 'docx': case 'pdf':
            //alert("an image");
            	$("#typecv").val(val.substring(val.lastIndexOf('.') + 1));
               $("#error_upload").html('');
            break;
        
        default:
            $(this).val('');
            $("#error_upload").html('<div class="center-block alert alert-danger" role="alert"><a class="close" data-dismiss="alert">×</a>The filetype you are attempting to upload is not allowed.</div>')
            // error message here
           // alert("not an image");
            break;
             
    }
});
</script>
