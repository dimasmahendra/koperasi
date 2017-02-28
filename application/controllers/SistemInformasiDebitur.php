<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SistemInformasiDebitur extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
        $this->load->model(array('GetAnggotaKoperasi_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
    }
	
	public function index() 
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getanggotabermasalah';
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
        $data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/sistemInformasiDebitur/viewDaftarSistemInformasiDebitur.php',$data);
        $this->load->view('footer_admin.php');

	}

    public function tambahDataSIDebitur()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertanggotabermasalah';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'           => $session_data['session_key'],
            'anggotakoperasi_id'    => $this->input->post('namaid')
        );
        
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

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('SistemInformasiDebitur/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('SistemInformasiDebitur/index','refresh');             
        } 
    }

    public function hapusDataSIDebitur()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'hapusanggotabermasalah';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(
            'session_key'         => $session_data['session_key'],
            'anggotakoperasi_id'  => $id
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
            $this->session->set_flashdata('message', 'Anggota Berhasil Dihapus');
            redirect('SistemInformasiDebitur/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Anggota gagal Terhapus');
            redirect('SistemInformasiDebitur/index','refresh');             
        } 
    }

}
	
