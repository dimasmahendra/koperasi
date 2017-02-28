<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file'));
	}
	
	public function index() 
    {
        redirect('Profile/getprofile','refresh');
	}

    public function getprofile()
    {
        $session_data = $this->session->userdata('logged_in');     
    
        $url = URL_API.'getprofile';
        $ch = curl_init($url);    
        
        $jsonData = array(
            'session_key'   => $session_data['session_key']    
        );
        
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['result']     = json_decode($result, true);
        //print_r($data['result']);die();
       
        $data['username']       = $data['result']['data']['username'];
        $data['nama']           = $data['result']['data']['nama'];
        $data['email']          = $data['result']['data']['email'];
        $data['telepon']        = $data['result']['data']['telepon'];
        $data['status']         = $data['result']['data']['status']; 

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();         
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/user_koperasi/view_profile',$data);
        $this->load->view('footer_admin.php');

    }    

	public function updateprofile()
	{
        $cek = $_FILES['foto']['tmp_name'];    

        if ($cek =="")
        {
            $foto = "";
        }
        else if ($cek != '') 
        {
            $foto = new CurlFile($_FILES['foto']['tmp_name'], $_FILES['foto']['type'], $_FILES['foto']['name']);
        }

        $session_data   = $this->session->userdata('logged_in');
        $header = array('Content-Type: multipart/form-data','Content-Type: application/json');
		$url = URL_API.'updateprofile';
        $ch = curl_init($url);    
        
        $jsonData = array(
        	'session_key'       => $session_data['session_key'],           
            'username'          => $this->input->post('username'),
            'nama'              => $this->input->post('nama'),
            'email'             => $this->input->post('email'),
            'telepon'           => $this->input->post('telepon'),
            'status'            => $this->input->post('status'),            
            'foto'              => $foto
            );   

        //print_r($jsonData);die();  
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);        
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);       
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);   
        $hasil    = json_decode($result, true);   

        //print_r($hasil);die();     

        $this->session->set_userdata('logged_in',$hasil);        
                
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di update');
            redirect('Profile/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('message', 'Data Gagal di update');
            redirect('Profile/index','refresh');             
        }
	}

    public function passwordIndex()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
         
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/user_koperasi/viewGantiPassword');
        $this->load->view('footer_admin.php');
    }
    public function updatePassword()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updateprofile';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'   => $session_data['session_key'],
            'passwordlama'  => $this->input->post('passwordlama'),
            'password'      => $this->input->post('password')              
        );

        //print_r($jsonData);die();
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $hasil    = json_decode($result, true);

        //print_r($hasil);die();       

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Password Berhasil di rubah'); 
            redirect('Dashboard/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Password gagal berubah');
            redirect('Dashboard/index','refresh');
        }  
    }		
}

?>