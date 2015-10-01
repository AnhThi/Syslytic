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
                                    <li>
			                            <a href="<?php echo site_url("admin"); ?>"><i class="fa fa-home"></i><?php echo ucfirst($this->uri->segment(1));?>
							          	</a> </a>
			                        </li>
							        <li class="active">
							          	<strong><?php echo ucfirst($this->uri->segment(2));?></strong>
							        </li>
                                </ol>
                            </div>

                        </div>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-12">
			<section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Products</h2>
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
		                                <th style="width: 50px;">Icon</th>
		                                <th>ID</th>
		                                <th>Name</th>
		                                <th>Price</th>
		                                <th>Version</th>
		                                <th>Date Release</th>
		                                <th style="width: 100px"></th>
		                                <th style="width: 100px"></th>
		                            </tr>
		                        </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 50px;">Icon</th>
		                                <th>ID</th>
		                                <th>Name</th>
		                                <th>Price</th>
		                                <th>Version</th>
		                                <th>Date Release</th>
		                                <th style="width: 100px"></th>
		                                <th style="width: 100px"></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                	<?php 
                        		if (isset($products)) {
                        			foreach ($products as $pro) {


                        	?>
		                            <tr>
		                                <td><img src="<?php echo base_url('upload/images/apps/'); ?>/<?php echo $pro['pro_id']; ?>/<?php echo $pro['pro_icon'] ?>" width="35px" height="35px"  /></td>
		                                <td><?php echo $pro['pro_id'] ?></td>
		                                <td><?php echo $pro['pro_name'] ?></td>
		                                <td><?php echo $pro['pro_price'] ?></td>
		                                <td><?php echo $pro['pro_version'] ?></td>
		                                <td><?php echo $pro['pro_release'] ?></td>
		                                <td>
		                                    <button id="btnupdate" class="btn btn-default btn-sm" type="button" value="<?php echo base_url(); ?>admin/apps/list-of-apps/edit-app/<?php echo $pro['pro_id'] ?>"  ><i class="fa fa-refresh"></i>&nbsp;&nbsp;Update</button>
		                                </td>
		                                <td>
		                                    <button type='button' id="btnxoa" class="btn btn-danger btn-sm" value="<?php echo base_url(); ?>admin/apps/list-of-apps/delete/<?php echo $pro['pro_id'] ?>" ><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</button>
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
