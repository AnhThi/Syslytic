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
                        $mess_edit_cont = $this->session->flashdata('editcont_mess');
                        if (!empty($mess_edit_cont)) 
                        {
                            if ($mess_edit_cont) {
                                echo '<div class="alert alert-success">';
                                echo '<a class="close" data-dismiss="alert">×</a>';
                                echo '<strong>Well done!</strong> Contact Infomation Has Been Update!.';
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
			<section class="box ">				
                <header class="panel_header">
                    <h2 class="title pull-left">List of Contacts</h2>
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Page Use</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if (isset($contact)) {
                                foreach ($contact as $cont) { ?>
                            <tr>
                                <td><?php echo $cont['con_id']; ?></td>
                                <td><?php echo $cont['con_name']; ?></td>
                                <td><?php echo $cont['con_email']; ?></td>
                                <td><?php echo $cont['con_phone']; ?></td>
                                <td><?php echo $cont['con_position']; ?></td>
                                <td>
                                    <button id="btn_editcont" class="btn btn-orange btn-sm" type="button" value="<?php echo $cont['con_id']; ?>" ><i class="fa fa-refresh"></i>&nbsp;&nbsp;Edit</button>
                                </td>
                                <td>
                                    <button id="btn_deletecont" class="btn btn-danger btn-sm" type="button" value="<?php echo $cont['con_id']; ?>" ><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</button>
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
        <div class="clearfix"></div>
        <div id="editcontact" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section class="box ">              
                <header class="panel_header">
                    <h2 class="title pull-left">Edit Contact</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">
                    <?php $attribute = array('id'=>'editcont'); ?>
                    <?php echo form_open('admin/company/list-of-contacts/update',$attribute); ?>
                    <div class="form-group">
                        <label class="form-label" for="id_com_name">Company Name</label>
                        <div class="controls">
                            <input type="text" id="cont_name" name="cont_name" class="form-control input-sm mg-bt-10px" placeholder="Contact Name" />
                            <?php echo form_error('cont_name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_com_name">Company Name</label>
                        <div class="controls">
                            <input type="text" id="cont_email" name="cont_email" class="form-control input-sm mg-bt-10px" placeholder="Contact email"/>
                            <?php echo form_error('cont_email'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_com_name">Company Name</label>
                        <div class="controls">
                            <input type="text" id="cont_phone" name="cont_phone" class="form-control input-sm mg-bt-10px" data-mask="phone" placeholder="Contact Phone"/>
                            <?php echo form_error('cont_phone'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_com_name">Company Name</label>
                        <div class="controls">
                            <select id="cont_pageuse" name="cont_pageuse" class="form-control input-sm mg-bt-10px" >
                                <option value="aboutus" <?php echo  set_select('cont_pageuse', 'aboutus'); ?> >Page About Us</option>
                                <option value="support" <?php echo  set_select('cont_pageuse','support' ); ?> >Page Support</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" id="btn_savecont" class="btn btn-success ">Update</button>
                    <a type="submit" id="btn_cancont" onclick="resetformcont()" class="btn btn-default ">Cancel</a>
                </div>
            </section>
        </div>
	</section>
</section>
<!-- END CONTENT -->

<script>
    var listcon = <?php echo json_encode($contact) ?>;
    var base_url = '<?php echo base_url(); ?>';
</script>