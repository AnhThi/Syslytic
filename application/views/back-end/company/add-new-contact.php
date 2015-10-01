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
            <section class="box ">              
                <header class="panel_header">
                    <h2 class="title pull-left">Add New Contact</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">    
                    <div class="row">
                    <?php
                      //flash messages
                        $mess = $this->session->flashdata('cont_mess');
                        if (!empty($mess)) 
                        {
                            if ($mess) {
                                echo '<div class="alert alert-success">';
                                echo '<a class="close" data-dismiss="alert">×</a>';
                                echo '<strong>Well done!</strong> New Contact Has Been Add!.';
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
                    <?php $attribute = array('id'=>'addcont'); ?>
                    <?php echo form_open_multipart('admin/company/add-new-contact/new',$attribute); ?>
                        <strong>Name</strong>
                        <input type="text" id="cont_name" name="cont_name" value="<?php echo $this->input->post('cont_name'); ?>" class="form-control input-sm mg-bt-10px" placeholder="Contact Name" />
                        <?php echo form_error('cont_name'); ?>
                        <strong>Email</strong>
                        <input type="text" id="cont_email" name="cont_email" value="<?php echo $this->input->post('cont_email'); ?>" class="form-control input-sm mg-bt-10px" placeholder="Contact email"/>
                        <?php echo form_error('cont_email'); ?>
                        <strong>Phone</strong>
                        <input type="text" id="cont_phone" name="cont_phone" value="<?php echo $this->input->post('cont_phone'); ?>" class="form-control input-sm mg-bt-10px" data-mask="phone" placeholder="Contact Phone"/>
                        <?php echo form_error('cont_phone'); ?>
                        <strong>Page Use</strong>
                        <select id="cont_pageuse" name="cont_pageuse" class="form-control input-sm mg-bt-10px" >
                            <option value="aboutus" <?php echo  set_select('cont_pageuse', 'aboutus'); ?> >Page About Us</option>
                            <option value="support" <?php echo  set_select('cont_pageuse','support' ); ?> >Page Support</option>
                        </select>
                        <br>
                        <button type="submit" id="btn_savecont" class="btn btn-orange center-block">Save</button>
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
<!-- END CONTENT -->

