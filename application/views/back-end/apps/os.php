<!-- START CONTENT -->
<section id="main-content" class=" ">
	<section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
			<div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Syslytic</h1>                            
                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    
                                </ol>
                            </div>

                        </div>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-12">
			<section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Add OS For This App</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">    
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label" for="field-1">OS List</label>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>OS Id</th>
                                                <th>OS Name</th>
                                                <th>App Name</th>
                                                <th>OS Link</th>
                                                <th>OS Image</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>OS Id</th>
                                                <th>OS Name</th>
                                                <th>App Name</th>
                                                <th>OS Link</th>
                                                <th>OS Image</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                        	<?php 
                                        		if (isset($listos)) {
                                        			foreach ($listos as $os) { ?>
			                                            <tr align="center">
			                                                <td style="width:5%;"><?php echo $os['os_id'] ?></td>
			                                                <td style="width:10%;"><?php echo $os['os_name'] ?></td>
			                                                <td style="width:10%;"><?php echo $os['pro_id'] ?></td>
			                                                <td style="width:30%;"><?php echo $os['os_link'] ?></td>
			                                                <td style="width:15%;">
			                                                	<img src="<?php echo base_url('upload/images/apps/') ?>/<?php echo $os['pro_id']; ?>/<?php echo $os['os_icon']; ?>" alt="<?php echo $os['os_name']; ?>" style="width:200px;height:100px;">
			                                                </td>
			                                                <td ><button id="btn_updateos" class="btn btn-default btn-sm" type="button" value="<?php echo $os['os_id']; ?>"  ><i class="fa fa-refresh"></i>&nbsp;&nbsp;Update</button></td>
			                                                <td ><button type='button' id="btn_deleteos" class="btn btn-danger btn-sm" value="<?php echo base_url(); ?>admin/apps/os/delete/<?php echo $os['os_id']; ?>" ><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</button></td>
			                                            </tr>
                                            <?php 
                                            	    }
                                        		}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>

                </div>

            </section>
            <div id="appostoapp" class="content-body"> 
	            <h4 id="nametableos">Add OS To App</h4>
	            <div class="panel-group primary" id="accordion-2" role="tablist" aria-multiselectable="true">
	                <div class="panel panel-default">
	                    <div class="panel-heading" role="tab" id="headingOne">
	                        <h4 class="panel-title">
	                            <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne-2">
	                                <i class='fa fa-check'></i> OS
	                            </a>
	                        </h4>
	                    </div>
	                    <div id="collapseOne-2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	                    	<?php $attribute = array('id'=>'addostoapp'); ?>
                        	<?php echo form_open_multipart('admin/apps/os/add-os-to-app',$attribute); ?>
	                        <div class="panel-body">
	                        	<label class="form-label" for="field-12">App Need To Add OS</label>
	                            <div class="input-group primary">
                                    <span class="input-group-addon">                
                                        <span class="arrow"></span>
                                        <i class="fa fa-apple"></i>
                                    </span>
                                    <select class="form-control m-bot15" id="os_appadd" name="os_appadd">
                                    	<?php 
                                    		if (isset($listapp)) {
                                    			foreach ($listapp as $app) {?>
								        <option value="<?php echo $app['pro_id'] ?>" <?php echo  set_select('os_appadd', $app['pro_id']); ?> ><?php echo $app['pro_name'] ?></option>
								        <?php
								                }
                                    		} 
								        ?>
									</select>
                                </div>
                                <br>
	                        	<label class="form-label" for="field-12">OS Name</label>
	                            <div class="input-group primary">
                                    <span class="input-group-addon">                
                                        <span class="arrow"></span>
                                        <i class="fa fa-lastfm"></i>
                                    </span>
                                    <input type="text" id="os_name" value="<?php echo $this->input->post('os_name'); ?>" name="os_name" class="form-control" placeholder="OS Name">
                                    
                                </div>
                                <br>
                                <?php echo form_error('os_name'); ?>
                                <br>
                                <label class="form-label" for="field-12">Link</label>
                                <div class="input-group primary">
                                    <span class="input-group-addon">                
                                        <span class="arrow"></span>
                                        <i class="fa fa-link"></i>
                                    </span>
                                    <input type="text" id="os_link" value="<?php echo $this->input->post('os_link'); ?>" name="os_link" class="form-control" placeholder="Link">
                                </div>
                                <br>
                                    <?php echo form_error('os_link'); ?>
                                <br>
                                
                                <div class="row">
									<div class="col-xs-6">
										<label class="form-label" for="field-12">Image</label>
		                                <div class="input-group primary">
		                                    <span class="input-group-addon">                
		                                        <span class="arrow"></span>
		                                        <i class="fa fa-image "></i>
		                                    </span>
		                                    <input type="file" id="id_os_img" name="os_img" class="form-control" >
		                                	
		                                </div>
                                        <?php echo form_error('os_img'); ?>
		                                <br>
									</div>
									<div class="col-xs-6">
										<label class="form-label" for="field-12">View</label>
										<div id="viewos">
                                                
                                		</div>
									</div>
								</div>
								<br>
								<button type="submit" id="btn_savedone" class="btn btn-success">Save</button>
								<button type="submit" value="" id="btn_updatedone" class="btn btn-orange">Update</button>
	                            <button type="button" id="btn_can" onclick="resetformos()" class="btn btn-default">Clear All</button>
	                        </div>
	                        <?php echo form_close(); ?>
	                    </div>
	                </div>
	            </div>
            </div>
		</div>
	</section>
</section>
<!-- END CONTENT -->

<script>
	var listos = <?php echo json_encode($listos) ; ?>;
	var base_url = '<?php echo base_url(); ?>' ;
</script>