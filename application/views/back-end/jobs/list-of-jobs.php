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
                    <h2 class="title pull-left">List Jobs</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div>
                </header>
                <div class="content-body">    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php 
		                    $mess = $this->session->flashdata('job_mess');
		                    if (!empty($mess)) {
		                    	if ($mess===1) {
		                    		echo '<div class="alert alert-warning">';
		                            echo '<a class="close" data-dismiss="alert">×</a>';
		                            echo '<strong>Warning!</strong> There are many CV apply for this job!.Cant Delete';
		                          echo '</div>'; 
		                    	}
		                        else if ($mess) {
		                            echo '<div class="alert alert-success">';
		                            echo '<a class="close" data-dismiss="alert">×</a>';
		                            echo '<strong>Well done!</strong> The Job Has Been Deleted!.';
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
                            <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:5% ;">#</th>
                                        <th style="width: 20%;">Position</th>
                                        <th style="width: 40%;">Description</th>
                                        <th style="width: 10%;">Status</th>
                                        <th style="width: 10%;"></th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Position</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                <?php 
                                    if (isset($jobs)) {
                                        foreach ($jobs as $j) {
                                ?>
                                    <tr>
                                        <td><?php echo $j['j_id']; ?></td>
                                        <td><?php echo $j['po_name']; ?></td>
                                        <td><?php echo $j['j_des']; ?></td>
                                        <td>
                                            <?php if ($j['j_stt']==0){
                                                echo "<input type='checkbox' disabled='disabled'>";
                                            }
                                            else {
                                                echo "<input type='checkbox' disabled='disabled' checked>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('admin/jobs/list-of-jobs/update/'.$j['j_id']); ?>" class="btn btn-default btn-sm" type="button" ><i class="fa fa-refresh"></i>&nbsp;&nbsp;Update</a>
                                        </td>
                                        <td>
                                            <button id="btn_deljob" class="btn btn-danger btn-sm" type="button" value="<?php echo $j['j_id']; ?>" ><i class="fa fa-times"></i>&nbsp;&nbsp;Delete</button>
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
	</section>
</section>
<!-- END CONTENT -->
<script>
	var base_url = "<?php echo base_url(); ?>";
</script>
