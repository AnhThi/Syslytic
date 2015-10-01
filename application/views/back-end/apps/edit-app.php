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
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Edit apps</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">
                <?php
                  //flash messages
                    $mess_app_edit = $this->session->flashdata('pro_mess_edit');
                    if (!empty($mess_app_edit)) 
                    {
                        if ($mess_app_edit !== false) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> Product Has Been Update!.';
                          echo '</div>'; 
                        }
                        else {
                            echo '<div class="alert alert-warning">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Warning!</strong> Errors in the process of adding data!Try again.';
                          echo '</div>'; 
                        }
                    }

                ?>
                <?php echo form_open_multipart('admin/apps/list-of-apps/edit-app/'.$this->uri->segment(5).'/update'); ?>
                <?php 
                                if (isset($product)) {
                                    foreach ($product as $p) {
                            ?>
                    <!-- START -->
                    <div class="form-group">
                        <label class="form-label" for="field-1">Product ID</label>
                        <div class="controls">
                            <input type="text" class="form-control" name="p_id" id="id" value="<?php echo $p['pro_id'] ?>" placeholder="Product ID" disabled="disabled">
                            <?php echo form_error('p_id'); ?>
                            
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-xs-6">
                            <label class="form-label" for="field-1">Product Name</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="p_name" id="name" value="<?php echo $p['pro_name'] ?>" placeholder="Product Name">
                                <?php echo form_error('p_name'); ?>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <label class="form-label" for="field-12">Product Price</label>
                            <span class="desc">e.g. "2.342.242,00 VNĐ"</span>
                            <div class="input-group">
                                <input class="form-control" name="p_price" id="price" type="text" data-mask="fdecimal" value="<?php echo $p['pro_price'] ?>" placeholder="Product Price" >
                                <span class="input-group-addon">VNĐ</span>
                                <?php echo form_error('p_price'); ?>
                            </div>

                        </div>
                    </div>
                    <br>                                    
                    <div class='row'>
                        <div class="col-xs-6">
                            <label class="form-label" for="field-1">Vesion</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="p_version" id="version" value="<?php echo $p['pro_version'] ?>" placeholder="Version">
                                <?php echo form_error('p_version'); ?>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <label class="form-label" for="field-1">Product Release</label>
                            <div class="controls">
                                <input class="form-control datepicker" name="p_release" id="release" value="<?php echo $p['pro_release'] ?>" data-format="yyyy-mm-dd" value="<?php echo date('Y-m-d') ?>"  type="text"data-mask="y-m-d">
                                <?php echo form_error('p_release'); ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class='row'>
                        <div class="col-xs-6">
                            <label class="form-label" for="field-1">Product Icon</label>
                            <div class="controls">
                                <input type="file" name="p_icon" id="icon">
                                <?php echo form_error('p_icon'); ?>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <label class="form-label" for="field-12">Product Background</label>
                            <span class="desc">e.g. </span>
                            <div class="input-group">
                                <input type="file" name="p_backg" id="backg" >
                                <?php echo form_error('p_backg'); ?>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class='row'>
                        <div class="col-xs-6">
                            <label class="form-label" for="field-1">Product Background Description</label>
                            <div class="controls">
                                <input type="file" name="p_bgdes" id="bgdes" >
                                <?php echo form_error('p_bgdes'); ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label class="form-label" for="field-1">Text Description</label>
                    <textarea class="ckeditor" name="p_des" id="p_des" value="" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;"><?php echo $p['pro_des'] ?></textarea>
                    <br>
                    <br>
                    <!-- END -->
                    <div class="form-group">
                        <div class="pull-right ">
                        	
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="<?php echo base_url(); ?>admin/apps/list-of-apps/edit-app/<?php echo $this->uri->segment(3) ?>" type="button" id="btn_can" class="btn btn-warning">Roll Back</a>
                            <a href="<?php echo base_url(); ?>admin/apps/list-of-apps" type="button" id="btn_can" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                <?php  
                        }
                    }
                ?>
                <?php echo form_close(); ?>
                </div>
            </section>

        </div>

	</section>
</section>
<!-- END CONTENT -->

