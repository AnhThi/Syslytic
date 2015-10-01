<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Author : Ly Tuan Dung
 * Time : 30/6/2015
 * Process : payment controller 
 */
class PushNotification_Controller extends CI_Controller {    
    protected $stoID=-1;
    public function __construct() {
        parent::__construct();
//        if(!$this->session->userdata('is_logged_in')||$this->session->userdata('store_id')!=-1){
//            redirect("");
//        }        
//        $this->load->model('Payment_model');
//        $this->stoID=$this->session->userdata('store_id');
        $this->load->model("Commonclasses_model");
    }
    public function index()
    {           
        $data["body"] = "Demo/Push2";
        $this->load->view("template/layout",$data);
    }
    public function pushtest() {
        $data["body"] = "Demo/pushtest";
        $this->load->view("template/layout",$data);
    }
    public function pushAndroid()
    {       
        if (!defined('API_ACCESS_KEY')) define('API_ACCESS_KEY', 'AIzaSyA_zdy4N_dnSOlwDlMj56WJZBXDr63rogI');
        //define( 'API_ACCESS_KEY', 'AIzaSyA_zdy4N_dnSOlwDlMj56WJZBXDr63rogI' );
        $regID=$this->input->post('regID');
        //dOIhgT8c6_Y:APA91bGyIvDO9AIUZ0lv91OEczOK7ng-7j5WMByf-4kuU5rs9EuAoVkGELM7kj6zwjDXhw9i1gRzzeGo4VC8wtuj0XrDVpLPwSmsybwyre3Vb9wY9iAF8mMNZvl_pobHemJxbLMHI0M7
        $registrationIds = array( $regID );
        // prep the bundle
        $msg = array
        (
                'message' 	=> 'Hello!! Are you okay?',
                'title'		=> 'SYSLYTIC',
                'subtitle'	=> 'This is a subtitle. subtitle',
                'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
                'vibrate'	=> 1,
                'sound'		=> 1,
                'largeIcon'	=> 'large_icon',
                'smallIcon'	=> 'small_icon',
                'pushCode'      =>  100
        );
        $fields = array
        (
                'registration_ids' 	=> $registrationIds,
                'data'			=> $msg
        );

        $headers = array
        (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        $data['result']= $result;
        $data['message']=$msg;
        $data["body"] = "Demo/pushAndroid";
        $this->load->view("template/layout",$data);
    }
    public function pushCrossServer() {
        $token=$this->input->post('deviceToken');
        $pushcode=$this->input->post('pushCode');
        $message=$this->input->post('message');
       // $alert=array(
         //       'status'=>"OK",
          //      'result'=>array('pushCode'=> $pushcode,'message'=>$message),
           //     'error'=>''
            //);            
           
        //$this->Commonclasses_model->pushIOS($token,$alert);
	$alert=array(
                'status'=>"OK",
                'result'=>array('pushCode'=>(int)$pushcode,'message'=>$message),
                'error'=>''
            );
            $this->Commonclasses_model->pushIOS($token,$alert);
       
    }
}
