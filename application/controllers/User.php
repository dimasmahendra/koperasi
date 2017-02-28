<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	public function index() 
    {
        session_destroy();
        $this->load->helper('form');       
    	$this->load->view('user/login/login');
    	$this->load->view('footer_login.php');        	
	}

    public function login() 
    {
        $url = URL_API.'loginadmin';
        $ch = curl_init($url);
   
        $jsonData = array(
            'username'   => $this->input->post('username'),
            'password'   => $this->input->post('password'),
            'ip_address' => $this->input->ip_address()           
        );
        //print_r($jsonData);die(); 
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil     = json_decode($result, true);            
        //print_r($hasil);die();
        $this->session->set_userdata('logged_in',$hasil);       

        if (($hasil['status'] == '1') && ($hasil['statuslogin'] == '1') && ($hasil['message'] == 'adminkoperasi ditemukan'))
        {
            redirect('Dashboard/index','refresh');    
        }        
        else if (($hasil['status'] == '0') && ($hasil['message'] == 'erorr..email or password salah')) 
        {   
            $this->session->set_flashdata('error', 'User atau Password anda salah');            
            redirect('User','refresh');            
        }
        else
        {   
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan saat anda login');            
            redirect('User','refresh');            
        }           
    } 

    public function forget_pass() 
    {
        $this->load->view('user/forget_pass/forget_pass');
        $this->load->view('footer_login.php');
    } 

    public function reset()
    {
        $url = URL_APIS.'forgotpassword';
        $ch = curl_init($url);
   
        $jsonData = array(                
            'email'    => $this->input->post('email')                 
        );         

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil    = json_decode($result, true); 

        //print_r($hasil);die();

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Silahkan Cek email anda untuk mengganti password');
            redirect('user/finished','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Password Gagal di reset');
            redirect('user/forget_pass','refresh');
        }  
    }

    public function finished() 
    {
        $this->load->view('user/reset_pass/finished');
        $this->load->view('footer_login.php');
    }

    public function change_password() {

        $this->load->view('user/reset_pass/reset_pass');
        $this->load->view('footer_login.php');
    }

    public function send_change_password() {

        $url = URL_APIS.'resetpassword';
        $ch = curl_init($url);

        $jsonData = array(
            'password' => $this->input->post('password'),
            'token'    => $this->input->post('token'),
            'email'    => $this->input->post('email') 
        );

        //print_r($jsonData);die();
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil    = json_decode($result, true); 

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Password berhasil di reset, Silahkan masuk dengan menggunakan akun anda yang baru');
            redirect('User','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Password Gagal di reset, Silahkan Ulangi reset password lagi');
            redirect('User','refresh'); 
        }  
    }

	public function logoutKoperasi() 
    {
        $session_data = $this->session->userdata('logged_in');
        $url = URL_API.'logout';
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
        $hasil  = json_decode($result, true);    

        redirect('User/index','refresh');     
    }
		
}
	
