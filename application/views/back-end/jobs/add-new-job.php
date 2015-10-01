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
                        <h2 class="title pull-left">Job</h2>
                        <div class="actions panel_actions pull-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                        </div>
                </header>
                <?php
                  //flash messages
                    $mess_add_job = $this->session->flashdata('job_mess');
                    if (!empty($mess_add_job)) 
                    {
                        if ($mess_add_job) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> New Job Has Been Add!.';
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
                <div class="content-body">    
                    <?php $attribute = array('id'=>'addjob'); ?>
                            <?php echo form_open_multipart('admin/jobs/add-new-job/new',$attribute); ?>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Position</label>
                        <div class="controls">
                            <select id="po_select" name="po_select" class="form-control input-sm mg-bt-10px" style="width:70%;">
                                <?php 
                                    if (isset($posi)) {
                                        foreach ($posi as $po) {
                                ?>
                                <option value="<?php echo $po['po_id'] ?>" <?php echo  set_select('po_select', $po['po_id']); ?> ><?php echo $po['po_name']; ?></option>
                                <?php
                                        }
                                    } 
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Text Description</label>
                        <div class="controls">
                            <textarea name="j_des" id="j_des" placeholder="Enter text ..." style="width: 100%; height: 130px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>
                            <?php echo form_error('j_des'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="j_info">Job's Infomation</label>
                        <div class="controls">
                            <textarea name="j_info" class="ckeditor" id="j_info" style="display: none; visibility: hidden;" rows="10" cols="80"> </textarea>                   
                            <?php echo form_error('j_info'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Being Recruited</label>
                        <input id="j_stt" name="j_stt" type="checkbox" value="1">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" id="btn_jobcan" onclick="resetformaddjob()" class="btn btn-default">Clear All</button>
                <?php echo form_close(); ?>
            </section>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="addpos">
            <section class="box ">              
                <header class="panel_header">
                        <h2 class="title pull-left">Add Position</h2>
                        <div class="actions panel_actions pull-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                        </div>
                </header>

                <?php
                  //flash messages
                    $mess_po = $this->session->flashdata('po_mess');
                    if (!empty($mess_po)) 
                    {
                        if ($mess_po) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> New Position Has Been Add!.';
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

                <div class="content-body">    
                    <?php $attribute = array('id'=>'addposition'); ?>
                            <?php echo form_open('admin/jobs/add-new-job/add-position/new',$attribute); ?>
                    <div class="form-group">
                        <label class="form-label" for="po_name">Position Name</label>
                        <div class="controls">
                            <input class="form-control" id="po_name" name="po_name" type="text">
                            <?php echo form_error('po_name'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                <?php echo form_close(); ?>
            </section>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="addpos">
            <section class="box ">              
                <header class="panel_header">
                        <h2 class="title pull-left">List Position</h2>
                        <div class="actions panel_actions pull-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                        </div>
                </header>

                <div class="content-body">
                    <div id="mess"></div>    
                    <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:10%;">#</th>
                                    <th style="width:60%">Name</th>
                                    <th style="30%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($posi)) {
                                        foreach ($posi as $po) { ?>
                                <tr>
                                    <td><?php echo $po['po_id']; ?></td>
                                    <td><?php echo $po['po_name']; ?></td>
                                    <td>
                                        <button id="btn_delpo" class="btn btn-danger btn-sm" type="button" value="<?php echo $po['po_id'] ?>" ><i class="fa fa-times"></i>&nbsp;&nbsp;Delete</button>
                                    </td>
                                </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
            </section>
        </div>
    </section>
</section>
<!-- END CONTENT -->
<script >
    var base_url = "<?php echo base_url(); ?>";
</script>
