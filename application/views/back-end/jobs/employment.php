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
        <?php
                  //flash messages
                    $mess_em_remove = $this->session->flashdata('empl_mess');
                    if (!empty($mess_em_remove)) 
                    {
                        if ($mess_em_remove) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> The CV Has Been Remove!.';
                          echo '</div>'; 
                        }
                        else {
                            echo '<div class="alert alert-warning">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Warning!</strong> Errors in the process of Detelting data!Try again.';
                          echo '</div>'; 
                        }
                    }

                ?>
		<div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Basic Data Table</h2>
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
                                        <th>#</th>
                                        <th>Job Position</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Apply Date</th>
                                        <th>CV</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    if (isset($employment)) {
                                        foreach ($employment as $emp) { ?>
                                    <tr>
                                        <td><?php echo $emp['ap_id']; ?></td>
                                        <td><?php echo $emp['po_name']; ?></td>
                                        <td><?php echo $emp['ap_firstname'];?></td>
                                        <td><?php echo $emp['ap_lastname']; ?></td>
                                        <td><?php echo $emp['ap_email']; ?></td>
                                        <td><?php echo $emp['ap_phone']; ?></td>
                                        <td><?php echo $emp['ap_date']; ?></td>
                                        <td><a href="<?php echo base_url(); ?>upload/jobs/cv/<?php echo $emp['job_id'].'/'.$emp['ap_cv']; ?>">Download CV</a></td>
                                        <td>
                                            <button id="btn_deleteemploy" class="btn btn-danger btn-sm" type="button" value="<?php echo $emp['ap_id']; ?>" ><i class="fa fa-times"></i>&nbsp;&nbsp;Delete</button>
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
    var base_url = '<?php echo base_url(); ?>';
</script>