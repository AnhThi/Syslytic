
<form id="frm_requestademo" method="post" >
	<div id="div_requestademo" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  	<div class="modal-dialog modal-md">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title" style="text-align: center;">REQUEST DEMO</h4>
		      	</div>
		      	
		      	<div class="modal-body">
	                <input id="fname" name="fname" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="First Name" />
	                <div id="error_fname"></div>
	                <input id="lname" name="lname" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="Last Name" />
	                <div id="error_lname"></div>
		        	<input id="email" name="email" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="Email" />
		        	<div id="error_email"></div>
	                <input id="phone" name="phone" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="Phone" />
	                <div id="error_phone"></div>
	                <input id="address" name="address" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="Address" />
	                <div id="error_address"></div>
	                <p class="for_GrayText" style="font-size: 1.2em; font-weight: bold;">Submit the word you see below:<p/>
	           		<div id="capt"><?php echo $capt; ?></div>
	           		<input id="captcha" name="captcha" type="text" style="width: 100%;" class="for_TextBox input-sm" placeholder="" />
	            	<div id="error_captcha"></div>
		      	</div>
		      	<div class="modal-footer">
		        	<input id="btn_sub_Requestademo" type="submit" class="btn btn-primary btn-sm center-block" value="Submit" />
		      	</div>
		      	
		    </div>
	  	</div>
	</div>
</form>
<script>
	$(document).ready(function() {
		$('#frm_requestademo').submit(function(event){
			event.preventDefault();
			var id = "<?php echo $this->uri->segment(2); ?>";
			var url = "<?php echo base_url(); ?>"+"apps/request/"+id;
			$.ajax({
				url : url,
				type: "POST",
				dataType:'json',
				data:  $('#frm_requestademo').serialize(),
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
						if (data.error_address !=null) {
							$('#error_address').html(data.error_address);
						};
						if (data.error_captcha !=null) {
							$('#error_captcha').html(data.error_captcha);
						};
						$('#capt').html(data.capt);
					}
					else
					{	
						$('.modal-footer').html('');
						if (data.kt==0) {
							$('.modal-body').html(data.result);
						}
						else
						{
							$('.modal-body').html(data.result);
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