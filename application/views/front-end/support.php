<!--============================== BODY =======================================-->
		<div style="background-image: url(<?php echo base_url(); ?>upload/images/frontend/support_bg.jpg); background-size: cover; background-position: center; width: 100vw; height: 800px; margin-top: 0px;"></div>

		<div style="width: 0px; height: 0px; border-top: 40px solid transparent; border-left: 100vw solid #ffffff; margin-top: -39px; z-index: 100; position: relative;"></div>
		
			<div id="contain_sp" class="container" style="margin-bottom: 90px; min-height: 800px;">
                <form id="frm_support" method="post" onsubmit="return check_recaptcha();">
			
				<p style="font-size: 1.5em; margin-top: 40px; margin-left: 18px;">Support</p>
				<div class="for_Line"></div>
				<p class="for_GrayText" style="margin-top: 20px; font-size: 1.3em; margin-bottom: 40px; margin-left: 18px;">Email us at <a href="mailto:kiris.nat@gmail.com">support@syslytic.vn</a> with any question, comments or futher request</p>

				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<input id="fname" name="fname" type="text" style="width: 100%;" class="for_TextBox" placeholder="First Name" />
					<div id="error_fname"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<input id="lname" name="lname" type="text" style="width: 100%;" class="for_TextBox" placeholder="Last Name" />
					<div id="error_lname"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<input id="email" name="email" type="text" style="width: 100%;" class="for_TextBox" placeholder="Email" />
					<div id="error_email"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<input id="phone" name="phone" type="text" style="width: 100%;" class="for_TextBox" placeholder="Phone Number" />
					<div id="error_phone"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<input id="address" name="address" type="text" style="width: 100%;" class="for_TextBox" placeholder="Address" />
					<div id="error_address"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<input id="city" name="city" type="text" style="width: 100%;" class="for_TextBox" placeholder="City" />
					<div id="error_city"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<input id="s_p" name="s_p" type="text" style="width: 100%;" class="for_TextBox" placeholder="State/Province" />
					<div id="error_s_p"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<input id="zip" name="zip" type="text" style="width: 100%;" class="for_TextBox" placeholder="Zip/Postal Code" />
					<div id="error_zip"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<input id="indus" name="indus" type="text" style="width: 100%;" class="for_TextBox" placeholder="Industry" />
					<div id="error_indus"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<textarea id="cmt" name="cmt" placeholder="Comment" class="for_TextBox" style="width: 100%; height: 180px; text-indent: 12px; padding-left: 0px;"></textarea>
					<div id="error_cmt"></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php 
					 echo $this->recaptcha->getWidget();
  					echo $this->recaptcha->getScriptTag();

				?>
					<div id="error_recaptcha"></div>
				</div>
				
<br>
<br>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<input id="btn_support_submit" type="submit" value="Submit" class="form-control" style="width: 150px; height: 40px; margin-top: 20px;" />
				</div>		
			</form>	
		</div>

		<!--============================== ==== =======================================-->
<script>
	$(document).ready(function() {
		$('#frm_support').submit(function(event){
			event.preventDefault();
			var url = "<?php echo base_url(); ?>"+"support/add";
			$.ajax({
				url : url,
				type: "POST",
				dataType:'json',
				data:  $('#frm_support').serialize(),
				success : function(data){
					if (data.ajax ==1) {
						if (data.error_fname !=null) {
							$('#error_fname').html(data.error_fname);
						};
						if (data.error_lname !=null) {
							$('#error_lname').html(data.error_lname);
						};
						if (data.error_email !=null) {
							$('#error_email').html(data.error_email);
						};
						if (data.error_phone !=null) {
							$('#error_phone').html(data.error_phone);
						};
						if (data.error_cmt !=null) {
							$('#error_cmt').html(data.error_cmt);
						};
						if (data.error_zip !=null) {
							$('#error_zip').html(data.error_zip);
						};
						if (data.error_recaptcha !=null) {
							$('#error_recaptcha').html(data.error_recaptcha);
						};
					}
					else
					{	
						if (data.kt==0) {
							$('#contain_sp').html(data.result);
						}
						else
						{
							$('#contain_sp').html(data.result);
						}
					}
				},
				error: function(data) {
					console.log('errors');
				}
			});
			return false;
		});
	});
</script>
