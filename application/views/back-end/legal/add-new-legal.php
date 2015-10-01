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
                <?php
                  //flash messages
                    $mess_add_le = $this->session->flashdata('addle_mess');
                    if (!empty($mess_add_le)) 
                    {
                        if ($mess_add_le) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> New Legal Has Been Add!.';
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
                    <?php $attribute = array('id'=>'addlegal'); ?>
                    <?php echo form_open('admin/legal/add-new-legal/new',$attribute); ?>
                    <div class="form-group">
                        <label class="form-label" for="le_title">Legal Title</label>
                        <div class="controls">
                            <input type="text" id="le_title" name="le_title" class="form-control input-sm mg-bt-10px" placeholder="Legal Title" />
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
                    <button type="button" id="btn_legalcan" onclick="resetformaddle()" class="btn btn-default">Clear All</button>
                    <?php echo form_close(); ?>
                </div>
            </section>
        </div>
    </section>
</section>
<!-- END CONTENT -->

