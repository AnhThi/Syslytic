<!DOCTYPE html>
<html class=" ">
    <head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 2.0
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Syslytic Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        
        <link rel="shortcut icon" href="<?php echo base_url('upload/images/backend/'); ?>/favicon.png" type="image/x-icon" />     <!--Favicon --> 
        <!--
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/back-end/images/apple-touch-icon-57-precomposed.png">	 For iPhone 
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/back-end/images/apple-touch-icon-114-precomposed.png">     For iPhone 4 Retina display 
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/back-end/images/apple-touch-icon-72-precomposed.png">     For iPad 
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/back-end/images/apple-touch-icon-144-precomposed.png">     For iPad Retina display 
        -->



        <!-- CORE CSS FRAMEWORK - START -->
        <link href="<?php echo base_url(); ?><?php echo base_url(); ?>assets/back-end/back-end/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>assets/back-end/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/back-end/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/back-end/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/back-end/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/back-end/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="<?php echo base_url(); ?>assets/back-end/plugins/icheck/skins/square/orange.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="<?php echo base_url(); ?>assets/back-end/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/back-end/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page" style="background-image: url('<?php echo base_url('upload/images/backend'); ?>/login-bg.png');">

        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
                <h1 style="text-align: center; color: #f9f9f9;">Syslytic</h1>
                <?php 
                    if (isset($alert)) {
                        echo "
                            <div class='center-block alert alert-danger' role='alert' style='width: 90%;'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                ".$alert."
                            </div>
                        ";
                    }
                ?>
                <?php 
                    $attributes = array('id' => 'loginform' );
                    echo form_open('admin/checkout',$attributes);
                ?>
                    <p>
                        <label for="email">Username<br />
                            <input type="text" name="email" id="user_email" class="input" placeholder="Email" value="<?php echo $this->input->post('email'); ?>" size="20" /></label>
                        <?php echo form_error('email'); ?>
                    </p>
                    <p>
                        <label for="user_pass">Password<br />
                            <input type="password" name="pass" id="user_pass" class="input" placeholder="PassWord" size="20" /></label>
                            <?php echo form_error('pass'); ?>
                    </p>

                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Log In" />
                    </p>
                <?php echo form_close(); ?>
                <!-- tam dong lai 
                <p id="nav">
                    <a href="#">Forgot password?</a>
                </p>
                 -->
            </div>
        </div>

        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="<?php echo base_url(); ?>assets/back-end/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/back-end/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/back-end/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/back-end/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>assets/back-end/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/back-end/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="<?php echo base_url(); ?>assets/back-end/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="<?php echo base_url(); ?>assets/back-end/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="<?php echo base_url(); ?>assets/back-end/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/back-end/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

    </body>
</html>


