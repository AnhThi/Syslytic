<?php 
	$CI = get_instance();
	$CI->load->model('Das_slider_model');
	$CI->load->model('Das_social_model');
	$CI->load->model('Das_apps_model');
	$data['products'] = $CI->Das_apps_model->getproducts();
	$data['slider'] = $CI->Das_slider_model->getslider();
	$data['social'] = $CI->Das_social_model->getsocial();
?>
<?php $this->load->view('front-end/template/pagehead'); ?>
<?php $this->load->view('front-end/template/header',$data); ?>
<?php $this->load->view($main); ?>
<?php 	
	if ($main!="front-end/index") {
		$this->load->view('front-end/template/shadow');
	}
?>
<?php $this->load->view('front-end/template/request'); ?>
<?php $this->load->view('front-end/template/footer',$data); ?>

<?php
	$this->load->view('front-end/template/pageend',$data); 
?>