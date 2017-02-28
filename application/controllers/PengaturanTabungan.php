<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanTabungan extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
	}

    public function index()
    {   
        $session_data   = $this->session->userdata('logged_in');
        
        $url = URL_APIS.'getsetingtabungan';
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
        //print_r($data['result']);die();
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/pengaturanTabungan/viewDaftarPengaturan.php',$data);
        $this->load->view('footer_admin.php'); 
    } 

    public function simpanSukuBungaBaru()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'insertsukubunga';
        $ch = curl_init($url);      
        
        $koperasi_id = $session_data['data']['koperasi_id'];
        
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'koperasi_id'    => $koperasi_id,
            'minsaldo'    => $this->input->post('saldomin'),
            'maxsaldo'    => $this->input->post('saldomaks'),
            'bunga'    => $this->input->post('bunga')
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
        $hasil     = json_decode($result, true);
        
        //print_r($data['result']);die();
        
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Pengaturan Tabungan Berhasil di tambahkan'); 
            redirect('PengaturanTabungan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Pengaturan Tabungan gagal di tambahkan');
            redirect('PengaturanTabungan/index','refresh');
        }   
    }  

    public function ubahSukuBungaBaru()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'updatesukubunga';
        $ch = curl_init($url);  
                
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'id'    => $this->input->post('tabungan_id'),
            'minsaldo'    => $this->input->post('editsaldomin'),
            'maxsaldo'    => $this->input->post('editsaldomaks'),
            'bunga'    => $this->input->post('editbunga')
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
        $hasil     = json_decode($result, true);
        
        //print_r($hasil);die();
        
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Pengaturan Tabungan Berhasil di tambahkan'); 
            redirect('PengaturanTabungan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Pengaturan Tabungan gagal di tambahkan');
            redirect('PengaturanTabungan/index','refresh');
        }   
    } 

    public function hapusSukuBungaBaru()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'deletesukubunga';
        $ch = curl_init($url);  
        
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'id'    => $this->input->post('edittabungan_id')
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
        $hasil     = json_decode($result, true);        
        
        if ($hasil['data'][0]['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Pengaturan Tabungan Berhasil di Hapus'); 
            redirect('PengaturanTabungan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Pengaturan Tabungan gagal di Hapus');
            redirect('PengaturanTabungan/index','refresh');
        }   
    } 

    public function ubahBiayaAdm()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'updateadministrasitabungan';
        $ch = curl_init($url);  
        
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'administrasi'    => $this->input->post('administrasi'),
            'id'    => $this->input->post('setingdasar_id')
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
        $hasil     = json_decode($result, true);        
        
        //print_r($hasil);die();
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Biaya administrasi Per Bulan berhasil di rubah'); 
            redirect('PengaturanTabungan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Biaya administrasi Per Bulan Gagal di rubah');
            redirect('PengaturanTabungan/index','refresh');
        }   
    } 

    public function ubahTanggalBunga()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'updateperhitunganbungatiapbulan';
        $ch = curl_init($url);  
                
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'periode'    => $this->input->post('periode_id'),
            'id'    => $this->input->post('idsetingdasar1')
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
        $hasil     = json_decode($result, true);        
        
        //print_r($hasil);die();
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Tanggal Perhitungan Bunga Tiap Bulan berhasil di rubah'); 
            redirect('PengaturanTabungan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Tanggal Perhitungan Bunga Tiap Bulan Gagal di rubah');
            redirect('PengaturanTabungan/index','refresh');
        }   
    }   
      
}?>