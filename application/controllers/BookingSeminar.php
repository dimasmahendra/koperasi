<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bookingSeminar extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->model(array('Username_model','Sidebar_model','updateNotif_model'));
        $this->load->helper(array('form','file'));
	}
	
	public function index() 
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/bookingseminar/viewDaftarBookingSeminarKoperasi.php');
        $this->load->view('footer_admin.php'); 
	}

    public function daftarBookingSeminar()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getbookingseminarkoperasi';
        $ch = curl_init($url);

        $jsonData = array(           
            'session_key' => $session_data['session_key'] 
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
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/bookingseminar/viewDaftarBookingSeminarKoperasi.php',$data);
        $this->load->view('footer_admin.php');  
    }

    public function daftarPemesanBookingSeminar()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getbookingseminarkoperasiwhere';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);

        $jsonData = array(           
            'session_key'          => $session_data['session_key'],
            'seminarkoperasi_id'   => $id
        );   
        
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['result']   = json_decode($result, true);

        $idNotif = $this->uri->segment(4);     
        if(empty($idNotif))
        {
            $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/bookingseminar/viewListPemesanSeminarKoperasi.php',$data);
            $this->load->view('footer_admin.php'); 
        }
        else
        {
            $data['cekNotif'] = $this->updateNotif_model->cekNotif($idNotif); 
            if($data['cekNotif']['status'] == 1)
            {
                $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  
                $this->load->view('main_admin.php',$dataSidebar);
                $this->load->view('admin/bookingseminar/viewListPemesanSeminarKoperasi.php',$data);
                $this->load->view('footer_admin.php'); 
            }
            else
            {
                $this->session->set_flashdata('error', 'Ada kegagalan dalam proses update Notifikasi');
                redirect('Dashboard/index','refresh');
            }
        }         
    }   
}