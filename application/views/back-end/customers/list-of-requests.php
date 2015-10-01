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
                    $mess_re_del = $this->session->flashdata('re_mess');
                    if (!empty($mess_re_del)) 
                    {
                        if ($mess_re_del) {
                            echo '<div class="alert alert-success">';
                            echo '<a class="close" data-dismiss="alert">×</a>';
                            echo '<strong>Well done!</strong> The Request Has Been Remove!.';
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Product Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tfoot>
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
                                </tfoot>

                                <tbody>
                                <?php 
                                    if (isset($request)) {
                                        foreach ($request as $re) { ?>
                                    <tr>
                                        <td><?php echo $re['r_id']; ?></td>
                                        <td><?php echo $re['r_fname']; ?></td>
                                        <td><?php echo $re['r_lname']; ?></td>
                                        <td><?php echo $re['pro_name']; ?></td>
                                        <td><?php echo $re['r_email']; ?></td>
                                        <td><?php echo $re['r_phone']; ?></td>
                                        <td><?php echo $re['r_address']; ?></td>
                                        <td><?php echo $re['r_date']; ?></td>
                                        <td>
                                            <button id="btn_delrequest" class="btn btn-danger btn-sm" type="button" value="<?php echo $re['r_id']; ?>" ><i class="fa fa-times"></i>&nbsp;&nbsp;Delete</button>
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