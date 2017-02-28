<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrainingMenteri extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->model(array('Username_model','Sidebar_model','updateNotif_model'));
        $this->load->helper(array('form','file'));
	}
	
	public function index() 
    {
        redirect('TrainingMenteri/daftarPesertaMenteri','refresh');
	}

    public function daftarTrainingMenteri()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'gettrainingkementerian';
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
        $data['result']    = json_decode($result, true);

       /* echo "<pre>";
        print_r($data['result']);die();*/

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/trainingMenteri/viewTrainingMenteri.php',$data);
        $this->load->view('footer_admin.php');  
    }

    public function daftarDetilTraining()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'gettrainingkementerianwhere';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);

        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'trainingkementerian_id' => $id
        );   
        
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil = json_decode($result, true);

        /*echo "<pre>";
        print_r($hasil);die();*/

        $data['judul']      = $hasil['data']['judul'];
        $data['isi']        = $hasil['data']['isi'];
        $data['tempat']     = $hasil['data']['tempat'];
        $data['tanggal']    = $hasil['data']['tanggal'];
        $data['durasi']     = $hasil['data']['durasi'];
        $data['kapasitas']  = $hasil['data']['kapasitas'];
        $data['foto']       = $hasil['data']['foto'];

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/trainingMenteri/viewDetailTraining.php',$data);
        $this->load->view('footer_admin.php');  
    }

    public function daftarPesertaMenteri()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'showpesertatrainingkementerian';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);

        $jsonData = array(           
            'session_key'            => $session_data['session_key'],
            'trainingkementerian_id' => $id
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
            $this->load->view('admin/trainingMenteri/viewPesertaTraining.php',$data);
            $this->load->view('footer_admin.php');
        }
        else
        {
            $data['cekNotif'] = $this->updateNotif_model->cekNotif($idNotif);
            if($data['cekNotif']['status'] == 1)
            {
                $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  
                $this->load->view('main_admin.php',$dataSidebar);
                $this->load->view('admin/trainingMenteri/viewPesertaTraining.php',$data);
                $this->load->view('footer_admin.php'); 
            }
            else
            {
                $this->session->set_flashdata('error', 'Ada kegagalan dalam proses update Notifikasi Training Kementerian');
                redirect('Dashboard/index','refresh');
            }
        }       

          
    }

    public function updateTrainingMenteri()
    {
        $link =  $this->input->post('url');
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'updatepesertatrainingkementerian';
        $ch = curl_init($url);
 
        $jsonData = array(           
            'session_key'            => $session_data['session_key'],
            'trainingkementerian_id' => $this->input->post('trainingkementerian_id'),
            'anggotakoperasi_id'     => $this->input->post('anggotakoperasi_id'),
            'status'                 => $this->input->post('status')
        );  

        /*print_r($jsonData);die();*/

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data   = json_decode($result, true);        

        if ($data['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Pelatihan Koperasi Kementerian Berhasil Di rubah'); 
            redirect('TrainingMenteri/daftarPesertaMenteri/'.$link,'refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Pelatihan Koperasi Kementerian Gagal Di rubah');
            redirect('TrainingMenteri/daftarPesertaMenteri/'.$link,'refresh');
        }  
    }

    public function hapusTrainingMenteri()
    {
        $link =  $this->input->post('url');
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletepesertatrainingkementerian';
        $ch = curl_init($url);         
      
        $jsonData = array(      
            'session_key'            => $session_data['session_key'],
            'bookingtrainingkementerian_id' => $this->input->post('bookingtrainingkementerian_id')             
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
        $hasil    = json_decode($result, true);

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data is gone');
            redirect('TrainingMenteri/daftarPesertaMenteri/'.$link,'refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data still here');
            redirect('TrainingMenteri/daftarPesertaMenteri/'.$link,'refresh');             
        } 
    }   

}