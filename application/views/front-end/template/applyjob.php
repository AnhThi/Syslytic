<div id="div_applyCV" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-md">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Apply Job</h4>
	      	</div>
	      	<div class="modal-body" >
	      	<?php 
				$attribute = array('id'=>'frm_applyCV');
				echo form_open_multipart('company/jobs/apply/',$attribute);
			?>
					<div id="errors"></div>
	                <input type="hidden" name="jid" id="jid">
	                <div class="form-group">

			            <label for="recipient-name" class="control-label">FirstName:</label>
			            <input type="text" id="firstname" name="firstname" style="width: 100%;" class="for_TextBox input-sm" placeholder="Firstname" />
			        
			            <label for="recipient-name" class="control-label">LastName:</label>
			            <input type="text" id="lastname" name="lastname" style="width: 100%;" class="for_TextBox input-sm" placeholder="Lastname" />
			       
			            <label for="recipient-name" class="control-label">Email:</label>
			            <input type="text" id="email" name="email" style="width: 100%;" class="for_TextBox input-sm" placeholder="Email" />
			        
			            <label for="recipient-name" class="control-label">Phone Num:</label>
			            <input type="text" id="phone" name="phone" style="width: 100%;" class="for_TextBox input-sm" placeholder="Phone" />
			        
			        	<label for="recipient-name" class="control-label">CV:</label>
			            <input type="file" name="j_upcv" id="upcv">
			        </div>
		      	</div>
		      	<div class="modal-footer">
		        	<input type="submit" class="btn btn-primary btn-md center-block" value="Send" />
		      	</div>
			<?php echo form_close(); ?>
			</div>
			
	    </div>
  	</div>
</div>

<script>
	$(document).ready(function() {
		$('#frm_applyCV').submit(function(event){
			event.preventDefault();
			var form_data = new FormData($('#frm_applyCV')[0]);
			var id = document.getElementById('jid');
			var url = "<?php echo base_url(); ?>"+"company/jobs/apply";
			$.ajax({
				url : url,
				type: "POST",
				data:  new FormData(this),
				mimeType:"multipart/form-data",
				contentType: false,
				cache: false,
				processData:false,

				success : function(data){
					$('#errors').html(data);
				},
				error: function(data) {
					console.log(data);
				}
			});
			return false;
		});
	});
	$('#div_applyCV').on('show.bs.modal', function (event) {
			var btn = $(event.relatedTarget);
			var jid = btn.data('whatever');
			var modal = $(this);
			modal.find('.modal-body #jid').val(jid);
		});
</script>