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
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
                //flash messages
                $mess_edit_le = $this->session->flashdata('editle_mess');
                $mess_del_le = $this->session->flashdata('delle_mess');
                if (!empty($mess_edit_le)) 
                {
                    if ($mess_edit_le) {
                        echo '<div class="alert alert-success">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Well done!</strong> Legal content Has Been Update!.';
                      echo '</div>'; 
                    }
                    else {
                        echo '<div class="alert alert-warning">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Warning!</strong> Errors in the process of adding data!Try again.';
                      echo '</div>'; 
                    }
                }
                else if (!empty($mess_del_le)) 
                {
                    if ($mess_del_le) {
                        echo '<div class="alert alert-success">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Well done!</strong> Legal content Has Been Delete!.';
                      echo '</div>'; 
                    }
                    else {
                        echo '<div class="alert alert-warning">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Warning!</strong> Errors in the process of deleting data!Try again.';
                      echo '</div>'; 
                    }
                }

            ?>
			<section class="box ">				
                <header class="panel_header">
                    <h2 class="title pull-left">List of Contacts</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">   
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">#</th>
                                        <th style="width: 50%;">Title</th>
                                        <th style="width: 10%;"></th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                <?php 
                                    if (isset($legal)) {
                                        foreach ($legal as $le) { ?>
                                    <tr>
                                        <td><?php echo $le['lec_id']; ?></td>
                                        <td><?php echo $le['lec_title']; ?></td>
                                        <td>
                                            <button id="btn_editlegal" class="btn btn-orange btn-sm" type="button" value="<?php echo $le['lec_id']; ?>" ><i class="fa fa-refresh"></i>&nbsp;&nbsp;Update</button>
                                        </td>
                                        <td>
                                            <button id="btn_dellegal" class="btn btn-danger btn-sm" type="button" value="<?php echo $le['lec_id']; ?>" ><i class="fa fa-times"></i>&nbsp;&nbsp;Delete</button>
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
                </div>
			</section>
		</div>
        <div class="clearfix"></div>
        <div id="editlegal" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section class="box ">              
                <header class="panel_header">
                    <h2 class="title pull-left">Edit Legal </h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">
                    <?php $attribute = array('id'=>'editle'); ?>
                    <?php echo form_open('admin/legal/list-of-legal/update',$attribute); ?>
                    <div class="form-group">
                        <label class="form-label" for="le_title">Legal Title</label>
                        <div class="controls">
                            <input type="text" disabled="disabled" id="le_title" name="le_title" value="<?php echo $this->input->post('le_title'); ?>" class="form-control input-sm mg-bt-10px" placeholder="Legal Title" />
                            <?php echo form_error('le_title'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Legal content</label>
                        <div class="controls">
                            <textarea class="ckeditor" name="le_content" id="le_content" placeholder="Enter text ..." style="width: 100%; height: 130px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>
                            <?php echo form_error('le_content'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" id="btn_caneditle" onclick="closeeditlegal()" class="btn btn-default">Clear All</button>
                    <?php echo form_close(); ?>
                </div>
            </section>
        </div>
	</section>
</section>
<!-- END CONTENT -->

<script>
    var legal = <?php echo json_encode($legal) ?>;
    var base_url = '<?php echo base_url(); ?>';
</script>