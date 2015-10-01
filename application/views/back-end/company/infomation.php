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
		<div class="clearfix">
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<section class="box ">				
                <header class="panel_header">
                    <h2 class="title pull-left">List Of Company</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">    
					<div class="row">
                    	<table class="table">
	                        <thead>
	                            <tr>
	                            	<th>#</th>
	                                <th>Name</th>
	                                <th>Address</th>
	                                <th>Primary Phone</th>
	                                <th>Fax</th>
	                                <th>Longitude</th>
	                                <th>Latitude</th>
	                                <th style="width: 40px;"></th>
	                                <th style="width: 40px;"></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php
	                        		if (isset($company)) {
	                        			foreach ($company as $com) { ?>
	                            <tr>
	                            	<td><?php echo $com['com_id']; ?></td>
	                                <td><?php echo $com['com_name']; ?></td>
	                                <td><?php echo $com['com_address']; ?></td>
	                                <td><?php echo $com['com_phone']; ?></td>
	                                <td><?php echo $com['com_fax']; ?></td>
	                                <td><?php echo $com['com_longi']; ?></td>
	                                <td><?php echo $com['com_lati']; ?></td>
	                                <td>
	                                    <button id="btn_upcom" class="btn btn-default btn-sm" type="button" value="<?php echo $com['com_id']; ?>" ><i class="fa fa-refresh"></i>&nbsp;&nbsp;Update</button>
	                                </td>
	                                <td>
	                                    <button id="btn_deletecom" class="btn btn-danger btn-sm" type="button" value="<?php echo $com['com_id']; ?>" ><i class="fa fa-times"></i>&nbsp;&nbsp;Delete</button>
	                                </td>
	                            </tr>
	                            <?php 
	                            		}
	                            	}
	                            ?>
	                        </tbody>
	                    </table>
                    </div>
                </div>
			</section>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Company Infomation</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <?php
                  //flash messages
                    $mess = $this->session->flashdata('com_mess');
                    if (!empty($mess)) 
                    {
                        if ($mess==3) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> New Company Infomation Has Been Add!.';
                          echo '</div>'; 
                        }
                        else if ($mess==4){
                            echo '<div class="alert alert-warning">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Warning!</strong> Errors in the process of adding data!Try again.';
                          echo '</div>'; 
                        }
                        else if ($mess==1) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> Company Infomation Has Been Editted!.';
                          echo '</div>'; 
                        }
                        else {
                            echo '<div class="alert alert-warning">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Warning!</strong> Errors in the process of Editing data!Try again.';
                          echo '</div>'; 
                        }
                    }

                ?>
                <?php $attribute = array('id'=>'infomation'); ?>
                <?php echo form_open_multipart('admin/company/infomation/add-company',$attribute); ?>
                <div class="content-body">
                	<div class="form-group">
                        <label class="form-label" for="id_com_name">Company Name</label>
                        <div class="controls">
                            <input class="form-control" id="id_com_name" name="com_name"  type="text">
                            <?php echo form_error('com_name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_com_address">Company Address</label>
                        <div class="controls">
                            <input class="form-control" id="id_com_address" name="com_address"  type="text">
                            <?php echo form_error('com_address'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_com_phone">Company Phone</label>
                        <div class="controls">
                            <input  class="form-control" id="id_com_phone" name="com_phone" type="text" data-mask="phone">
                            <?php echo form_error('com_phone'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_com_fax">Company Fax</label>
                        <div class="controls">
                            <input  class="form-control" id="id_com_fax" name="com_fax" type="text">
                            <?php echo form_error('com_fax'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_com_longi">Longitude</label>
                        <span class="desc">"Click the button to get your position."</span>
                        <div class="controls">
                            <input type="hidden" name="hd_long" id="hd_long">
                            <input disabled="disabled" class="form-control" id="id_com_longi" value="<?php echo $this->input->post('com_longi'); ?>" name="com_longi" type="text" >
                            <?php echo form_error('hd_long'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_com_lati">Latitude</label>
                        <span class="desc">"Click the button to get your position."</span>
                        <div class="controls">
                            <input type="hidden" name="hd_lat" id="hd_lat">
                            <input disabled="disabled" class="form-control" id="id_com_lati" value="<?php echo $this->input->post('com_lati'); ?>" name="com_lati" type="text" >
                            <?php echo form_error('hd_lat'); ?>
                        </div>
                    </div>
                    <a id="btn_getposition" onclick="getLocation()" class="btn btn-purple">Get your position</a>
                    <button type="submit" id="btn_savecom" class="btn btn-success">Save</button>
					<button type="submit" value="" id="btn_updatecom" class="btn btn-orange">Update</button>
                    <button type="button" id="btn_cancom" onclick="resetforminfo()" class="btn btn-default">Clear All</button>
		
                <?php echo form_close(); ?>                
		</div>
            </section>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="com_info">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Map View of The First company infomation</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">        
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<div id="googleMap" style="width:500px;height:560px;"></div>
                        </div>
                    </div>
                </div>
            </section>    
        </div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<section class="box ">				
                <header class="panel_header">
                        <h2 class="title pull-left">Add Social Network</h2>
                        <div class="actions panel_actions pull-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                        </div>
	            </header>
	            <div class="content-body">    
                    <?php 
                        $mess_so = $this->session->flashdata('social_mess');
                        $trungsn = $this->session->flashdata('trungsn');
                        if (!empty($mess_so)) {
                            if ($mess_so) {
                                echo '<div class="alert alert-success">';
                                echo '<a class="close" data-dismiss="alert">×</a>';
                                echo '<strong>Well done!</strong> The Social Network Been Added!.';
                              echo '</div>'; 
                            }
                            else {
                                echo '<div class="alert alert-warning">';
                                echo '<a class="close" data-dismiss="alert">×</a>';
                                echo '<strong>Warning!</strong> Errors in the process of adding data!Try again.';
                              echo '</div>'; 
                            }
                        }
                        if (!empty($trungsn)) {
                            if ($trungsn==3) {
                                echo '<div class="alert alert-warning">';
                                echo '<a class="close" data-dismiss="alert">×</a>';
                                echo '<strong>Warning!</strong> Sicial Network Already Exists!';
                              echo '</div>'; 
                            }
                        }
                    ?>
					<?php $attribute = array('id'=>'social'); ?>
                        	<?php echo form_open_multipart('admin/company/infomation/add-social',$attribute); ?>
                	<div class="form-group">
                        <label class="form-label" for="field-1">Social Name</label>
                        <div class="controls">
                        <input type="hidden" name="hd_snid" id="hd_snid">
                            <input disabled="disabled" class="form-control" id="social_name" name="social_name" type="text">
                            <?php echo form_error('social_name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Social Name</label>
                        <div class="controls">
                            <select id="social_select" name="social_select" class="form-control input-sm mg-bt-10px" onchange="addnamesocial()">
	                            <option value="fa-facebook-square" <?php echo  set_select('social_name', 'facebok'); ?> >Facebook</option>
	                            <option value="fa-google" <?php echo  set_select('social_name','google' ); ?> >Google</option>
	                            <option value="fa-instagram" <?php echo  set_select('social_name','instagram' ); ?> >Instagram</option>
	                            <option value="fa-twitch" <?php echo  set_select('social_name','twitch' ); ?> >Twitch</option>
	                            <option value="fa-vimeo" <?php echo  set_select('social_name','vimeo' ); ?> >Vimeo</option>
	                            <option value="fa-youtube-play " <?php echo  set_select('social_name','Youtube'); ?> >Youtube</option>
	                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Link</label>
                        <div class="controls">
                            <input class="form-control" id="social_link" name="social_link" type="text">
                            <?php echo form_error('social_link'); ?>
                        </div>
                    </div>
                    <button type="submit" id="btn_savesocial" class="btn btn-success">Save</button>
                    <button type="button" id="btn_cansocial" onclick="resetformsocial()" class="btn btn-default">Clear All</button>
                <?php echo form_close(); ?>
                </div>
                
			</section>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<section class="box ">				
                <header class="panel_header">
                        <h2 class="title pull-left">List Of Social Network</h2>
                        <div class="actions panel_actions pull-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                        </div>
	            </header>
	            <div class="content-body">    
					<div class="row">
	                    <table class="table">
	                        <thead>
	                            <tr>
	                            	<th >#</th>
	                                <th >Name</th>
	                                <th >Link</th>
	                                <th ></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php
	                        		if (isset($social)) {
	                        			foreach ($social as $so) { ?>
	                            <tr>
	                            	<td><?php echo $so['sn_id']; ?></td>
	                            	<td><?php echo $so['sn_name']; ?></td>
	                                <td><?php echo $so['sn_link']; ?></td>
	                                <td>
	                                    <button id="btn_deletesocial" class="btn btn-danger btn-sm" type="button" value="<?php echo $so['sn_id'] ?>" ><i class="fa fa-times"></i>&nbsp;&nbsp;Delete</button>
	                                </td>
	                            </tr>
	                            <?php 
	                            		}
	                            	}
	                            ?>
	                        </tbody>
	                    </table>
	            	</div>
	            </div>
			</section>
		</div>
	</section>
</section>
<!-- END CONTENT -->
<script>
	var com = <?php echo json_encode($company); ?>;
	var longi = com[0]['com_longi'];
	var lati = com[0]['com_lati'];
	var base_url = '<?php echo base_url(); ?>';
</script>
