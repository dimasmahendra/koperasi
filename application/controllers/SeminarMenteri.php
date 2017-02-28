<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeminarMenteri extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->model(array('Username_model','Sidebar_model','updateNotif_model'));    
        $this->load->helper(array('form','file'));
	}
	
	public function index() 
    {
        redirect('SeminarMenteri/daftarSeminarMenteri','refresh');
	}

    public function daftarSeminarMenteri()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getseminarkementerian';
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
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 
                
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/seminarMenteri/viewSeminarMenteri.php',$data);
        $this->load->view('footer_admin.php');  
    }

    public function daftarDetilSeminar()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getseminarkementerianwhere';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);

        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'seminarkementerian_id' => $id
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
        $hasil = json_decode($result, true);

        $data['judul']      = $hasil['data']['judul'];
        $data['isi']        = $hasil['data']['isi'];
        $data['tempat']     = $hasil['data']['tempat'];
        $data['tanggal']    = $hasil['data']['tanggal'];
        $data['durasi']     = $hasil['data']['durasi'];
        $data['kapasitas']  = $hasil['data']['kapasitas'];
        $data['foto']       = $hasil['data']['foto'];

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/seminarMenteri/viewDetailSeminar.php',$data);
        $this->load->view('footer_admin.php');  
    }

    public function daftarPesertaSeminarMenteri()
    {
        $session_data   = $this->session->userdata('logged_in');   
        $url = URL_API.'showpesertaseminarkementerian';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);

        $jsonData = array(           
            'session_key'            => $session_data['session_key'],
            'seminarkementerian_id' => $id
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
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 
        $idNotif = $this->uri->segment(4);
        if(empty($idNotif))
        {
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/seminarMenteri/viewPesertaSeminarMenteri.php',$data);
            $this->load->view('footer_admin.php');
        }
        else
        {
            $data['cekNotif'] = $this->updateNotif_model->cekNotif($idNotif);
            if($data['cekNotif']['status'] == 1)
            {
                
                $this->load->view('main_admin.php',$dataSidebar);
                $this->load->view('admin/seminarMenteri/viewPesertaSeminarMenteri.php',$data);
                $this->load->view('footer_admin.php');
            }
            else
            {
                $this->session->set_flashdata('error', 'Ada kegagalan dalam proses update Notifikasi Training Kementerian');
                redirect('Dashboard/index','refresh');
            }
        }         
    }

    public function updateSeminarMenteri()
    {
        $link =  $this->input->post('url');
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'updatepesertaseminarkementerian';
        $ch = curl_init($url);
 
        $jsonData = array(           
            'session_key'            => $session_data['session_key'],
            'seminarkementerian_id' => $this->input->post('seminarkementerian_id'),
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

        /*print_r($data);die(); */      

        if ($data['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Artikel Berhasil di tambahkan'); 
            redirect('SeminarMenteri/daftarPesertaSeminarMenteri/'.$link,'refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Artikel Bermasalah');
            redirect('SeminarMenteri/daftarPesertaSeminarMenteri/'.$link,'refresh');
        }  
    }

    public function hapusSeminarMenteri()
    {
        $link =  $this->input->post('url');
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletepesertaseminarkementerian';
        $ch = curl_init($url);         
      
        $jsonData = array(      
            'session_key'            => $session_data['session_key'],
            'bookingseminarkementerian_id' => $this->input->post('bookingseminarkementerian_id')             
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
            redirect('SeminarMenteri/daftarPesertaSeminarMenteri/'.$link,'refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data still here');
            redirect('SeminarMenteri/daftarPesertaSeminarMenteri/'.$link,'refresh');             
        } 
    }   

}
	

