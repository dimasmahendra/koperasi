<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
		public function __construct() 
		{
			parent::__construct();

			if(empty($_SESSION['logged_in']))
			{
				$this->session->set_flashdata('error', 'Silahkan Login Dahulu');
				redirect('User','refresh');
			}

			$statusAPI = $this->cek_session();
			if($statusAPI['status'] == '0'){
				$this->session->set_flashdata('error', 'Waktu Login Sudah Habis, Silahkan Login Dahulu');
				redirect('User','refresh');
			}			
		}

		public function cek_session()
		{
			$session_data   = $this->session->userdata('logged_in');
	        $url = URL_API.'getadminkoperasi';
	        $ch = curl_init($url);      
	      
	        $jsonData = array(           
	            'session_key' => $session_data['session_key']
	        );

	        $jsonDataEncoded = json_encode($jsonData);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_FAILONERROR, true);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
	        $result = curl_exec($ch);
	        curl_close($ch);        
	        return json_decode($result, true);
		}
}
?>