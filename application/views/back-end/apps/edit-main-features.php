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
        <div id="appostoapp" class="content-body"> 
            <?php
            //flash messages
              
                if (!empty($this->session->flashdata('mf_mess'))) 
                {
                    if ($this->session->flashdata('mf_mess')=='1') {
                        echo '<div class="alert alert-success">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Well done!</strong> Main Features Has Been Deleted!.';
                        echo '</div>'; 
                    }
                    else if ($this->session->flashdata('mf_mess')=='3') {
                        echo '<div class="alert alert-success">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Well done!</strong> Main Features Has Been Edited!.';
                        echo '</div>'; 
                    } 
                    else if ($this->session->flashdata('mf_mess')=='2'){
                        echo '<div class="alert alert-warning">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Warning!</strong> Errors in the process of Editing data!Try again.';
                        echo '</div>'; 
                    }
                    else
                    {
                        echo '<div class="alert alert-warning">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Warning!</strong> Errors in the process of Deleting data!Try again.';
                        echo '</div>'; 
                    }
                }

            ?>
            <h4 id="nametablemf" >Add Main Features To App</h4>
            <div class="panel-group primary" id="accordion-2" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne-2">
                                <i class='fa fa-check'></i> Main Features
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne-2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <?php 
                            if (isset($mf)) {
                                foreach ($mf as $m) {
                        ?>
                        <?php $attribute = array('id'=>'addmf'); ?>
                        <?php echo form_open_multipart('admin/apps/main-features/edit-mf/'.$m['mf_id'],$attribute); ?>
                        <div class="panel-body">
                            <label class="form-label"  for="field-12">App Need To Add</label>
                            <div class="input-group primary">
                                <span class="input-group-addon">                
                                    <span class="arrow"></span>
                                    <i class="fa fa-apple"></i>
                                </span>
                                <input disabled="disabled" value="<?php echo $m['pro_id'] ?>" type="text" id="mf_title"  name="mf_title" class="form-control" >
                            </div>
                            <br>
                            <label class="form-label" for="field-12">MF Title</label>
                            <div class="input-group primary">
                                <span class="input-group-addon">                
                                    <span class="arrow"></span>
                                    <i class="fa fa-lastfm"></i>
                                </span>
                                <input type="text" id="mf_title" value="<?php echo $m['mf_title'] ?>"  name="mf_title" class="form-control" placeholder="MF Title">
                                
                            </div>
                            <br>
                            <?php echo form_error('mf_title'); ?>
                            <br>
                            <label class="form-label" for="field-12">MF Description</label>
                            <div class="input-group primary">
                                <span class="input-group-addon">                
                                    <span class="arrow"></span>
                                    <i class="fa fa-link"></i>
                                </span>
                                <textarea name="mf_des" id="mf_des" placeholder="Enter text ..." style="width: 100%; height: 130px; font-size: 14px; line-height: 23px;padding:15px;"><?php echo $m['mf_des'] ?></textarea>
                            </div>
                            <br>
                                <?php echo form_error('mf_des'); ?>
                            <br>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class="form-label" for="field-12">Image</label>
                                    <div class="input-group primary">
                                        <span class="input-group-addon">                
                                            <span class="arrow"></span>
                                            <i class="fa fa-image "></i>
                                        </span>
                                        <input type="file" id="id_mf_ico" name="mf_ico">
                                        
                                    </div>
                                    <br>
                                    <?php echo form_error('mf_ico'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <div id="viewiconmf">
                                            
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="<?php echo base_url(); ?>admin/apps/main-features" type="button"  class="btn btn-default">Cancel</a>
                        </div>
                        <?php echo form_close(); 
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- END CONTENT -->