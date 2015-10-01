<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Das_apps_ct extends CI_Controller {

	public $icon_name;
	public $bg_name;
	public $bgdes_name;
	public $osimg_name;
	public $mficon_name;

	public function __construct()
	{
		parent::__construct();
	
		$this->load->model('Das_apps_model');
	}

	public function index()
	{
		
		$data['products'] = $this->Das_apps_model->getproducts();
		if($this->session->userdata('logged_in')){
			$data['main'] = 'back-end/apps/list-of-apps';
			$data['header'] = '
				<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/> 
			';
			$data['footer'] = '
				
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
			';
			$this->load->view('back-end/template/template',$data);
        }else{
        	$this->load->view('back-end/login/index');	
        }
	}

	public function deleteapp()
	{
		$proid = $id = $this->uri->segment(5);
		$this->Das_apps_model->deleteosofapp($proid);
		$this->Das_apps_model->delmfofapp($proid);
		$this->Das_apps_model->deleteproduct($proid);
		$upload_dir = base_url('upload/images/apps/').'/'.$proid.'/'; //khi up len host sua lai duong dan nay`.
		delete_files($upload_dir,true);
		rmdir($upload_dir);
		redirect('admin/apps/list-of-apps');
	}

	public function add()
	{
		//validation rules
		$this->form_validation->set_rules('p_id','Product ID','trim|required|callback_check_proid|max_length[50]');
		$this->form_validation->set_rules('p_name','Product Name','trim|required|max_length[300]|callback_check_app_name_exists');
		$this->form_validation->set_rules('p_version','Version','trim|required|max_length[100]');
		$this->form_validation->set_rules('p_price','Price','trim|max_length[15]');
		$this->form_validation->set_rules('p_icon','Icon','callback_check_to_upload_img_app_icon');
		$this->form_validation->set_rules('p_backg','Background','callback_check_to_upload_img_app_bg');
		$this->form_validation->set_rules('p_bgdes','Background Description','callback_check_to_upload_img_app_bgdes');

		if ($this->form_validation->run()) {
			$product = array(
				'pro_id' => $this->input->post('p_id'), 
				'pro_name' => $this->input->post('p_name'),
				'pro_version' => $this->input->post('p_version'),
				'pro_price' => str_replace(",", "", $this->input->post('p_price')),
				'pro_release' => $this->input->post('p_release'),
				'pro_des' => $this->input->post('p_des'),
				'pro_icon' => $this->icon_name,
				'pro_img_bg' => $this->bg_name,
				'pro_img_des' => $this->bgdes_name
			);
			if ($this->Das_apps_model->add($product)) {
				$this->session->set_flashdata('pro_mess', true);
			}
			else
			{
				$this->session->set_flashdata('pro_mess',false);
			}
			redirect('admin/apps/add-new-app');
		}
		else
		{
			$this->loadadd();
		}
	}

	public function check_app_name_exists()
	{
		$name = $this->input->post('p_name');
		$kq = $this->Das_apps_model->check_app_name($name);
		if ($kq) {
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_app_name_exists','App Name Already Exists');
			return false;
		}
	}

	public function check_proid()
	{
		$kq = $this->Das_apps_model->check_proid($this->input->post('p_id'));
		if ($kq) {
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_proid', 'Product ID already exists');
			return false;
		}
	}

	public function loadadd() // func dung de load cai content
	{
		//bien header quan trong
		$data['header'] = '
			<link href="'.base_url().'assets/back-end/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger-theme-future.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/css/components/htmleditor.css" rel="stylesheet" type="text/css" media="screen"/> 
		';
		//bien footer quan trong
		$data['footer'] = '
			<script src="'.base_url().'assets/back-end/plugins/autosize/autosize.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/icheck/icheck.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/autonumeric/autoNumeric.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/datetimepicker/js/datetimepicker.min.js" type="text/javascript"></script> 
			<script src="'.base_url().'assets/back-end/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> 
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger-theme-future.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger-theme-flat.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/js/messenger.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script> 
			<script src="'.base_url().'assets/back-end/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script> 
			<script src="'.base_url().'assets/back-end/js/form-validation.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/js/uikit.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/markdown/markdown.js"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/addon/mode/overlay.js"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/xml/xml.js"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/gfm/gfm.js"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/marked/marked.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/js/components/htmleditor.js" type="text/javascript"></script>
		';
		
		$data['main'] = 'back-end/apps/add-new-app';
		$this->load->view('back-end/template/template',$data);
	}

	public function loadedit()
	{
		$id = $this->uri->segment(5);
		$data['product'] = $this->Das_apps_model->getproductbyid($id);
		$data['header'] = '
			<link href="'.base_url().'assets/back-end/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger-theme-future.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/messenger/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/uikit/css/components/htmleditor.css" rel="stylesheet" type="text/css" media="screen"/> 
		';
		$data['footer'] = '
			<script src="'.base_url().'assets/back-end/plugins/autosize/autosize.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/icheck/icheck.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/autonumeric/autoNumeric.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/datetimepicker/js/datetimepicker.min.js" type="text/javascript"></script> 
			<script src="'.base_url().'assets/back-end/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> 
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger-theme-future.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/messenger/js/messenger-theme-flat.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/js/messenger.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/js/uikit.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/markdown/markdown.js"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/addon/mode/overlay.js"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/xml/xml.js"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/codemirror/mode/gfm/gfm.js"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/vendor/marked/marked.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/uikit/js/components/htmleditor.js" type="text/javascript"></script>
		';
		$data['main'] = 'back-end/apps/edit-app';
		$this->load->view('back-end/template/template',$data);
	}

	public function edit()
	{
		$id = $this->uri->segment(5);
		//validation rules
		$this->form_validation->set_rules('p_name','Product Name','trim|required');
		$this->form_validation->set_rules('p_version','Version','trim|required');
		$p_i = is_uploaded_file($_FILES['p_icon']['tmp_name']);
		$p_b = is_uploaded_file($_FILES['p_backg']['tmp_name']);
		$p_d = is_uploaded_file($_FILES['p_bgdes']['tmp_name']);
		if ($p_i) {
			$this->form_validation->set_rules('p_icon','Icon','callback_check_to_upload_img_app_icon');
		}
		if ($p_b) {
			$this->form_validation->set_rules('p_backg','Background','callback_check_to_upload_img_app_bg');
		}
		if ($p_d) {
			$this->form_validation->set_rules('p_bgdes','Background Description','callback_check_to_upload_img_app_bgdes');
		}
		
		
		if ($this->form_validation->run()) {
			$product = array(
				'pro_name' => $this->input->post('p_name'),
				'pro_version' => $this->input->post('p_version'),
				'pro_price' => str_replace(",", "", $this->input->post('p_price')),
				'pro_release' => $this->input->post('p_release'),
				'pro_des' => $this->input->post('p_des'),
			);
			if (!empty($this->icon_name)) {
				$product['pro_icon'] = $this->icon_name;
			}
			if (!empty($this->bg_name)) {
				$product['pro_img_bg'] = $this->bg_name;
			}
			if (!empty($this->bgdes_name)) {
				$product['pro_img_des'] = $this->bgdes_name;
			}
			if ($this->Das_apps_model->edit($id,$product)) {
				$this->session->set_flashdata('pro_mess_edit', true);
				redirect('admin/apps/list-of-apps/edit-app/'.$id);
			}
			else
			{
				$this->session->set_flashdata('pro_mess_edit',false);
				$this->loadedit();
			}
			
		}
		else
		{
			$this->loadedit();
		}
	}

	public function loados()
	{
		$data['header'] = '
			<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
			<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/> 
		';
		$data['footer'] = '
			<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
			<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
		';
		$data['listapp'] = $this->Das_apps_model->getproducts();
		$data['listos'] = $this->Das_apps_model->getos();
		$data['main'] = 'back-end/apps/os';
		$this->load->view('back-end/template/template',$data);
	}

	//check upload
	function check_to_upload_img_app_icon()
	{
		if(is_uploaded_file($_FILES['p_icon']['tmp_name'])) 
		{  
			$a = $this->input->post('p_id');
			if (empty($a)) {
				$app_id = $this->uri->segment(5);
			}
			else
			{
				$app_id = $a;
			}
			$name = $app_id.'_icon';
			$path = './upload/images/apps/'.$app_id.'/';
			$field_name = 'p_icon';
			if (!is_dir($path)) { // kiem tra xem co thu duong dan nya k
	            mkdir($path,0777,true); // neu k co thi tao.
	        }
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|png';
		    $config['file_name'] = $name;
		    $config['max_size'] = '3000';
		    $config['overwrite'] = TRUE;
		    $config['remove_spaces'] = TRUE;
		    $this->upload->initialize($config);
		    if (!$this->upload->do_upload($field_name)){
	            $this->form_validation->set_message('check_to_upload_img_app_icon',$this->upload->display_errors());
				return false;
	        }
	        else{
	        	$this->icon_name = $this->upload->data('file_name');
	            return true;
	        }
		}
		else
		{
			$this->form_validation->set_message('check_to_upload_img_app_icon','No File Selected!');
			return false;
		}
	}
	function check_to_upload_img_app_bg()
	{
		if(is_uploaded_file($_FILES['p_backg']['tmp_name'])) 
		{
			$a = $this->input->post('p_id');
			if (empty($a)) {
				$app_id = $this->uri->segment(5);
			}
			else
			{
				$app_id = $a;
			}
			$name = $app_id.'_bg';
			$path = './upload/images/apps/'.$app_id.'/';
			$field_name = 'p_backg';
			if (!is_dir($path)) { // kiem tra xem co thu duong dan nya k
	            mkdir($path,0777,true); // neu k co thi tao.
	        }
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|png';
		    $config['file_name'] = $name;
		    $config['max_size'] = '3000';
		    $config['overwrite'] = TRUE;
		    $config['remove_spaces'] = TRUE;
		    $this->upload->initialize($config);
		    if (!$this->upload->do_upload($field_name)){
	            $this->form_validation->set_message('check_to_upload_img_app_bg',$this->upload->display_errors());
				return false;
	        }
	        else{
	        	$this->bg_name = $this->upload->data('file_name');
	            return true;
	        }
	    }
	    else
		{
			$this->form_validation->set_message('check_to_upload_img_app_bg','No File Selected!');
			return false;
		}
	}
	function check_to_upload_img_app_bgdes()
	{
		if(is_uploaded_file($_FILES['p_bgdes']['tmp_name'])) 
		{
			$a = $this->input->post('p_id');
			if (empty($a)) {
				$app_id = $this->uri->segment(5);
			}
			else
			{
				$app_id = $a;
			}
			$name = $app_id.'_bgdes';
			$path = './upload/images/apps/'.$app_id.'/';
			$field_name = 'p_bgdes';
			if (!is_dir($path)) { // kiem tra xem co thu duong dan nya k
	            mkdir($path,0777,true); // neu k co thi tao.
	        }
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|png';
		    $config['file_name'] = $name;
		    $config['max_size'] = '3000';
		    $config['overwrite'] = TRUE;
		    $config['remove_spaces'] = TRUE;
		    $this->upload->initialize($config);
		    if (!$this->upload->do_upload($field_name)){
	            $this->form_validation->set_message('check_to_upload_img_app_bgdes',$this->upload->display_errors());
				return false;
	        }
	        else{
	        	$this->bgdes_name = $this->upload->data('file_name');
	            return true;
	        }
	    }
	    else
		{
			$this->form_validation->set_message('check_to_upload_img_app_bgdes','No File Selected!');
			return false;
		}

	}
	function check_to_upload_img_os()
	{
		if(is_uploaded_file($_FILES['os_img']['tmp_name'])) 
		{  
		   	$app_id = $this->input->post('os_appadd');
		   	$os_name = $this->input->post('os_name');
			$name = $os_name.'_os';
			$path = './upload/images/apps/'.$app_id.'/';
			$field_name = 'os_img';
			if (!is_dir($path)) { // kiem tra xem co thu duong dan nya k
	            mkdir($path,0777,true); // neu k co thi tao.
	        }
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|png';
		    $config['file_name'] = $name;
		    $config['max_size'] = '3000';
		    $config['overwrite'] = TRUE;
		    $config['remove_spaces'] = TRUE;
		    $this->upload->initialize($config);
		    if (!$this->upload->do_upload($field_name)){
	            $this->form_validation->set_message('check_to_upload_img_os',$this->upload->display_errors());
				return false;
	        }
	        else{
	        	$this->osimg_name = $this->upload->data('file_name');
	            return true;
	        }
		}
		else
		{
			$this->form_validation->set_message('check_to_upload_img_os','No File Selected!');
			return false;
		}
	}
	function check_to_upload_img_mf()
	{
		if(is_uploaded_file($_FILES['mf_ico']['tmp_name'])) 
		{  
		   	$app_id = $this->input->post('mf_appadd');
		   	$mf_title = $this->input->post('mf_title');
			$name = $mf_title.'_mf';
			$path = './upload/images/apps/'.$app_id.'/';
			$field_name = 'mf_ico';
			if (!is_dir($path)) { // kiem tra xem co thu duong dan nya k
	            mkdir($path,0777,true); // neu k co thi tao.
	        }
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|png';
		    $config['file_name'] = $name;
		    $config['max_size'] = '3000';
		    $config['overwrite'] = TRUE;
		    $config['remove_spaces'] = TRUE;
		    $this->upload->initialize($config);
		    if (!$this->upload->do_upload($field_name)){
	            $this->form_validation->set_message('check_to_upload_img_mf',$this->upload->display_errors());
				return false;
	        }
	        else{
	        	$this->mficon_name = $this->upload->data('file_name');
	            return true;
	        }
		}
		else
		{
			$this->form_validation->set_message('check_to_upload_img_mf','No File Selected!');
			return false;
		}
	}
	//end check

	public function addostoapp()
	{
		//validation rules
		$this->form_validation->set_rules('os_name','OS Name','trim|required');
		$this->form_validation->set_rules('os_link','Link','trim|required|valid_url');
		$this->form_validation->set_rules('os_img','Image of OS','callback_check_to_upload_img_os');
		if ($this->form_validation->run()) {
			if ($this->input->server('REQUEST_METHOD') === 'POST') {
				$appaddos = $this->input->post('os_appadd');
				$osname = $this->input->post('os_name');
				$oslink = $this->input->post('os_link');
				$osimgname = $this->osimg_name;
				if ($this->Das_apps_model->addos($appaddos,$osname,$oslink,$osimgname)) {
				$this->session->set_flashdata('os_mess', true);
				}
				else
				{
					$this->session->set_flashdata('os_mess',false);
				}
				redirect('admin/apps/os');
			}
		}
		else
		{
			$this->loados();
		}
	}

	public function updateos()
	{
		$osid = $this->uri->segment(5);
		//validation rules
		$this->form_validation->set_rules('os_name','OS Name','trim|required');
		$this->form_validation->set_rules('os_link','Link','trim|required|valid_url');
		if ($_FILES['os_img']['size'] != 0) {
			$this->form_validation->set_rules('os_img','Image of OS','callback_osimg_upload');
		}
		
		if ($this->form_validation->run()) {
			if ($this->input->server('REQUEST_METHOD') === 'POST') {
				$osname = $this->input->post('os_name');
				$oslink = $this->input->post('os_link');
				$osimgname = $this->osimg_name;
				$kq = $this->Das_apps_model->updateos($osid,$osname,$oslink,$osimgname);
				if ($kq) {
				$this->session->set_flashdata('os_mess', true);
				}
				else
				{
					$this->session->set_flashdata('os_mess',false);
				}
				redirect('admin/apps/os');
			}
		}
		else
		{
			$this->loados();
		}
	}

	public function deleteos()
	{
		$osid = $this->uri->segment(5);
		$this->Das_apps_model->deleteos($osid);
		redirect('admin/apps/os');
	}

	public function loadmf()
	{
		if($this->session->userdata('logged_in')){
			$data['header'] = '
				<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/> 
			';
			$data['footer'] = '
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
			';
			$data['listapp'] = $this->Das_apps_model->getproducts();
			$data['listmf'] = $this->Das_apps_model->getmf();
			$data['main'] = 'back-end/apps/main-features';
			$this->load->view('back-end/template/template',$data);
        }else{
        	$this->load->view('back-end/login/index');	
        }
	}

	public function loadeditmf()
	{
		if($this->session->userdata('logged_in')){
			$mfid = $this->uri->segment(5);
			$data['header'] = '
				<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/> 
			';
			$data['footer'] = '
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
			';
			$data['listapp'] = $this->Das_apps_model->getproducts();
			$data['mf'] = $this->Das_apps_model->getmfbyid($mfid);
			$data['main'] = 'back-end/apps/edit-main-features';
			$this->load->view('back-end/template/template',$data);
        }else{
        	$this->load->view('back-end/login/index');	
        }
	}

	public function loadaddmf()
	{
		if($this->session->userdata('logged_in')){
			$mfid = $this->uri->segment(5);
			$data['header'] = '
				<link href="'.base_url().'assets/back-end/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
				<link href="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/> 
			';
			$data['footer'] = '
				<script src="'.base_url().'assets/back-end/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
				<script src="'.base_url().'assets/back-end/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
			';
			$data['listapp'] = $this->Das_apps_model->getproducts();
			$data['mf'] = $this->Das_apps_model->getmfbyid($mfid);
			$data['main'] = 'back-end/apps/add-new-feature-of-app';
			$this->load->view('back-end/template/template',$data);
        }else{
        	$this->load->view('back-end/login/index');	
        }
	}

	public function updatemf()
	{
		if($this->session->userdata('logged_in')){
			$mfid = $this->uri->segment(5);
			//validation rules
			$this->form_validation->set_rules('mf_title','MF Title','trim|required');
			$this->form_validation->set_rules('mf_des','MF Description','trim|required');
			if ($_FILES['mf_ico']['size'] != 0) {
				$this->form_validation->set_rules('mf_ico','MF Icon','trim|callback_check_to_upload_img_mf');
			}
			if ($this->form_validation->run()) {
				if ($this->input->server('REQUEST_METHOD') === 'POST') {
					$mf_title = $this->input->post('mf_title');
					$mf_des = $this->input->post('mf_des');
					$mf_icon = $this->mficon_name;
					$kq = $this->Das_apps_model->updatemf($mfid,$mf_title,$mf_des,$mf_icon);
					if ($kq) {
					$this->session->set_flashdata('mf_mess', '3');
					}
					else
					{
						$this->session->set_flashdata('mf_mess','4');
					}
					redirect('admin/apps/main-features/update/'.$mfid);
				}
			}
			else
			{
				$this->loadeditmf();
			}
			
        }else{
        	$this->load->view('back-end/login/index');	
        }
	}

	public function delmf()
	{
		if($this->session->userdata('logged_in')){
			$mfid = $this->uri->segment(5);
			$kq = $this->Das_apps_model->delmf($mfid);
			if ($kq) {
				$this->session->set_flashdata('mf_mess', '1');
			}
			else
			{
				$this->session->set_flashdata('mf_mess','2');
			}
			redirect('admin/apps/main-features');
			
        }else{
        	$this->load->view('back-end/login/index');	
        }
	}

	public function addmf()
	{
		if($this->session->userdata('logged_in')){
			$this->form_validation->set_rules('mf_title','MF Title','trim|required|callback_if_mftitle_exists|max_length[300]');
			$this->form_validation->set_rules('mf_des','MF Description','trim|required');
			if ($_FILES['mf_ico']['size'] != 0) {
				$this->form_validation->set_rules('mf_ico','MF Icon','trim|callback_check_to_upload_img_mf');
			}
			if ($this->form_validation->run()) {
				$mf = array(
					'mf_title' => $this->input->post('mf_title'),
					'mf_des' =>$this->input->post('mf_des'),
					'mf_icon' => $this->mficon_name,
					'pro_id' => $this->input->post('mf_appadd')
				);
				$kq = $this->Das_apps_model->addmf($mf);
				if ($kq) {
					$this->session->set_flashdata('mf_mess', true);
				}
				else
				{
					$this->session->set_flashdata('mf_mess', false);
				}
				redirect('admin/apps/add-new-feature-of-app');
			}
			else
			{
				$this->loadaddmf();
			}
			
        }else{
        	$this->load->view('back-end/login/index');	
        }
	}

	public function if_mftitle_exists()
	{
		$mftitle = $this->input->post('mf_title');
		$kq = $this->Das_apps_model->if_mftitle_exists($mftitle);
		if ($kq) {
			return true;
		}
		else
		{
			$this->form_validation->set_message('if_mftitle_exists','The MS Title Already Exists.Please Change');
			return false;
		}
	}


}

/* End of file das_apps_ct.php */
/* Location: ./application/controllers/das_apps_ct.php */