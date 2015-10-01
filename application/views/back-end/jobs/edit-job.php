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
                    $mess_edit_job = $this->session->flashdata('job_mess');
                    if (!empty($mess_edit_job)) 
                    {
                        if ($mess_edit_job) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> Job Has Been Updated!.';
                          echo '</div>'; 
                        }
                        else {
                            echo '<div class="alert alert-warning">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Warning!</strong> Errors in the process of updateing data!Try again.';
                          echo '</div>'; 
                        }
                    }

                ?>
                <div class="content-body">    
                    <?php $attribute = array('id'=>'addjob'); ?>
                        <?php $id = $this->uri->segment(5); ?>
                            <?php echo form_open('admin/jobs/list-of-jobs/update/'.$id.'/edit',$attribute); ?>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Position</label>
                        <div class="controls">
                            <input disabled="disabled" type="text" name="po_name" value="<?php echo $job[0]['po_name']; ?>" placeholder="">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Text Description</label>
                        <div class="controls">
                            <textarea name="j_des" id="j_des" placeholder="Enter text ..." style="width: 100%; height: 130px; font-size: 14px; line-height: 23px;padding:15px;"><?php echo $job[0]['j_des']; ?></textarea>
                            <?php echo form_error('j_des'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="j_info">Job's Infomation</label>
                        <div class="controls">
                            <textarea name="j_info" class="ckeditor" id="j_info" style="display: none; visibility: hidden;" rows="10" cols="80"> <?php echo $job[0]['j_info']; ?></textarea>                   
                            <?php echo form_error('j_info'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-1">Being Recruited</label>
                        <?php if ($job[0]['j_stt']==0){
                            echo "<input id='j_stt' name='j_stt' type='checkbox' value='1' >";
                        }
                        else {
                            echo "<input id='j_stt' name='j_stt' type='checkbox' value='1' checked>";
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" id="btn_jobcan" onclick="resetformaddjob()" class="btn btn-default">Clear All</button>
                <?php echo form_close(); ?>
            </section>
        </div>
    </section>
</section>
<!-- END CONTENT -->

