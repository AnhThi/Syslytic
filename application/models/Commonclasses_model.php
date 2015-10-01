<?php
/*
 * Author : Ly Tuan Dung
 * Time : 1/07/2015
 * Process : Commonclasses_model  
 */
class Commonclasses_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function checkStoIdAndToken($stoId,$token) 
    {   
        $chk= FALSE;
        $this->db->select('*');
        $this->db->where('stoID',$stoId);
        $this->db->where('stoToken',$token);
        $this->db->from('m_store'); 
        $query = $this->db->get();
        if($query->num_rows()>0){
            $chk=TRUE;
        }
        return $chk;
    }  
    public function writeLog($stoId,$objID,$action,$obj) {
        $data_log=array(
            'logID'=>'LOG'.date('ymdHi').rand(0,date('sB')),
            'stoID'=>$stoId,
            'logDate'=>date('Y-m-d'),
            'logTime'=>date('H:i:s'),
            'logInTime'=>is_null($this->session->userdata('logInTime'))?date('H:i:s'):$this->session->userdata('logInTime'),
            'logAction'=>$action,
            'logCreatePerson'=>$this->session->userdata('store_id')==""?NULL:$this->session->userdata('store_id'),
            'logObject'=>$obj,
            'logObjectName'=>$objID,
            'logNote'=>'',
            'IsDeleted'=>0
        );     
        $chk=$this->db->insert('t_log', $data_log);
        return $chk;
    }    
    public function do_upload($path,$files,$field,$first){
        $config['upload_path']          = $path;
        $config['allowed_types']        = '*';
        //$config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 51200;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);
        
        $dataarr = array();
        foreach ($files['name'] as $key => $image) {            
            $_FILES[$field.'[]']['name']= $files['name'][$key];
            $_FILES[$field.'[]']['type']= $files['type'][$key];
            $_FILES[$field.'[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES[$field.'[]']['error']= $files['error'][$key];
            $_FILES[$field.'[]']['size']= $files['size'][$key];        
            $fname = $first.date('ymdHis').rand(0,date('ymdHis')).'.'.pathinfo($files['name'][$key], PATHINFO_EXTENSION);
            $config['file_name'] = $fname;
            $this->upload->initialize($config);
            try {
                if ($this->upload->do_upload($field.'[]')) {
                    //$this->upload->data();
                    $img=array('imgName'=>$fname);
                    array_push($dataarr, $img); 
                }   
            } catch (Exception $exc) {
                return $exc->getMessage();               
            }            
        }
        return $this->output->set_content_type('application/json')
                    ->set_output(json_encode($dataarr));
    }
     public function importExcel($id,$idParam,$file,$stoId,$createDate,$updateDate,$sheetIndex) {
        $this->load->library('excel'); 
        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);        
        //get only the Cell Collection
        if(!isset($sheetIndex)){
            $sheetIndex=0;
        }
        $sheet=$objPHPExcel->setActiveSheetIndex($sheetIndex);
        $highestRow = $sheet->getHighestDataRow(); 
        $highestColumn = $sheet->getHighestDataColumn(); 
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
//        $this->output
//               ->set_content_type('application/json')
//               ->set_output(json_encode($sheet->getCellByColumnAndRow(1,1)->getValue())); 
        $data_batch=array();
        for ($row = 2; $row <= $highestRow; ++$row) { 
            $data=array(
                $idParam=>$id.date('ymd').rand(0,date('HisB')),                
            );          
            if($stoId!=NULL){
                $data['stoID']=$stoId;
            }
            if($createDate!=NULL){
                $data[strtolower($id).'CreateDate']=$createDate;
            }
            if($updateDate!=NULL){
                $data[strtolower($id).'UpdateDate']=$updateDate;
            }
            for ($col = 0; $col < $highestColumnIndex; ++$col){
                $header=$sheet->getCellByColumnAndRow($col,1)->getValue();
                $cur= $sheet->getCellByColumnAndRow($col, $row)->getValue();                
                $data[$header]=trim($cur);
            }    
//            var_dump($data);
//            exit();
            $curRow=$sheet->getCellByColumnAndRow(0, $row)->getValue();
            if($curRow==NULL||$curRow=="")
                return $data_batch;
            array_push($data_batch,$data);
        }
        return $data_batch;
    }
    public function pushIOS($deviceToken,$message) {

        // Put your private key's passphrase here:
        $passphrase = '1234';

        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'assets/ck_prod_2808.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
       // $fp = stream_socket_client(
          //      'ssl://gateway.sandbox.push.apple.com:2195', $err,
          //      $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
 $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT, $ctx);
 stream_set_blocking ($fp, 0);

        if (!$fp){
            return array(
                'status'=>"ERROR",
                'result'=>array(),
                'error'=>"Failed to connect: $err $errstr" . PHP_EOL
            );
        }
        //echo 'Connected to APNS' . PHP_EOL;
        $body=array();
        // Create the payload body
        $body["aps"] = array(              
            'alert' => $message,
            'sound' => 'default'            
        );
        // Encode the payload as JSON
        $payload = json_encode($body);
	$apple_expiry = time() + (90 * 24 * 60 * 60);
	$apple_identifier="93b86da18ab883dcf955fba474cdfc7ccea497e0";
        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
	//$msg = pack("C", 1) . pack("N", $apple_identifier) . pack("N", $apple_expiry) . pack("n", 32) . pack('H*', str_replace(' ', '', $deviceToken)) . pack("n", strlen($payload)) . $payload;
        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        if (!$result)
            return array(
                'status'=>"ERROR",
                'result'=>array(),
                'error'=>'Message not delivered' . PHP_EOL
            );         
        return $payload;
        // Close the connection to the server
        fclose($fp);
    }
}
