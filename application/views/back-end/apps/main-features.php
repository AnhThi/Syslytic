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
                    <h2 class="title pull-left">Main Features</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                    </div>
                </header>
                <div class="content-body">    
                    <div class="row">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>App Name</th>
                                                <th>MF Title</th>
                                                <th>MF Description</th>
                                                <th>MF Icon</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>App Name</th>
                                                <th>MF Title</th>
                                                <th>MF Description</th>
                                                <th>MF Icon</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                        	<?php 
                                        		if (isset($listmf)) {
                                        			foreach ($listmf as $mf) { ?>
			                                            <tr align="center">
			                                                <td style="width:5%;"><?php echo $mf['mf_id'] ?></td>
			                                                <td style="width:10%;"><?php echo $mf['pro_id'] ?></td>
			                                                <td style="width:10%;"><?php echo $mf['mf_title'] ?></td>
			                                                <td style="width:30%;"><?php echo $mf['mf_des'] ?></td>
			                                                <td style="width:15%;">
			                                                	<img src="<?php echo base_url('upload/images/apps/'); ?>/<?php echo $mf['pro_id']; ?>/<?php echo $mf['mf_icon']; ?>" alt="<?php echo $mf['mf_title']; ?>" style="width:70px;height:70px;">
			                                                </td>
			                                                <td ><a href="<?php echo base_url().'admin/apps/main-features/update/'.$mf['mf_id']; ?>" id="btn_editmf" class="btn btn-default btn-sm" type="button" ><i class="fa fa-refresh"></i>&nbsp;&nbsp;Update</a></td>
			                                                <td ><button type='button' id="btn_delmf" class="btn btn-danger btn-sm" value="<?php echo $mf['mf_id']; ?>" ><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</button></td>
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

                    </div>
                </div>

            </section>
            
		</div>
        
	</section>
</section>
<!-- END CONTENT -->

<script>
	var listmf = <?php echo json_encode($listmf) ; ?>;
	var base_url = '<?php echo base_url(); ?>' ;
</script>