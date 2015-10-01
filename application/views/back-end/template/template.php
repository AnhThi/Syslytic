<?php $this->load->view('back-end/template/pagehead'); ?>
<?php $this->load->view('back-end/template/header'); ?>
<?php 
	$CI = get_instance();
	$CI->load->model('das_apps_model');
	$data['apps'] = $CI->das_apps_model->getproducts();
?>
<?php
	$this->load->view('back-end/template/leftslidebar',$data); 
?>
<?php $this->load->view($main); ?>
<?php $this->load->view('back-end/template/pageend'); ?>