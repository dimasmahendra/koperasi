<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->model(array('Username_model','Sidebar_model','UpdateNotif_model'));
        $this->load->helper(array('form','file','url','html'));	
	}

	public function index()
	{       
        redirect('Notifikasi/daftarNotifikasi','refresh');           
	}

    public function daftarNotifikasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getallpesankementerian';
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
        $data['result']     = json_decode($result, true);                
        $hasil = $this->UpdateNotif_model->cekAllNotif();
        //print_r($hasil);die();
        if (($hasil['status'] == 1) && ($hasil['message'] == 'Data berhasil diupdate'))
        {
            $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/notifikasi/viewDaftarNotifikasi.php',$data);
            $this->load->view('footer_admin.php'); 
        }
        else if ((($hasil['status'] == 0) && ($hasil['message'] == 0)))
        {
            $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/notifikasi/viewDaftarNotifikasi.php',$data);
            $this->load->view('footer_admin.php'); 
        }  
        else
        {
            $this->session->set_flashdata('error', 'Ada kegagalan dalam proses update Notifikasi Pesan Kementerian');
            redirect('Dashboard/index','refresh');
        }          
    }

    public function lihatNotifikasi ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getdetailpesankementerian';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key'                 => $session_data['session_key'],
            'pesankementeriankoperasi_id' => $id
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
        $result     = json_decode($result, true);
        $hasil['judul'] = $result['data']['judul'];
        $hasil['isi']   = $result['data']['isi'];
        $hasil['status'] = $result['data']['status']; 

        $idNotif = $this->uri->segment(4);
        if(empty($idNotif))
        {
            $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/notifikasi/viewLihatPesanMenteri.php',$hasil);
            $this->load->view('footer_admin.php'); 
        }       
        else
        {
            $data['cekNotif'] = $this->UpdateNotif_model->cekNotif($idNotif);
            if($data['cekNotif']['status'] == 1)
            {
                $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
                $this->load->view('main_admin.php',$dataSidebar);
                $this->load->view('admin/notifikasi/viewLihatPesanMenteri.php',$hasil);
                $this->load->view('footer_admin.php');
            }
            else
            {
                $this->session->set_flashdata('error', 'Ada kegagalan dalam proses update Notifikasi Pesan Kementerian');
                redirect('Dashboard/index','refresh');
            }
        }  
    }

   public function statusPesan()
    {
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'updatestatuspesan';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);

        $jsonData = array(            
            'session_key'                 => $session_data['session_key'],
            'pesankementeriankoperasi_id' => $id
        ); 

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil   = json_decode($result, true);        

        redirect('Notifikasi/lihatNotifikasi/'.$id,'refresh');        
    }

    public function hapusPesan()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletepesankementerian';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
      
        $jsonData = array(      
            'session_key'         => $session_data['session_key'],
            'pesankementerian_id' => $id            
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
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('Notifikasi/daftarNotifikasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Notifikasi/daftarNotifikasi','refresh');
        }  
    }
}

?>