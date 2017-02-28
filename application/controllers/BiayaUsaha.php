<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiayaUsaha extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('Url');
		$this->load->model(array('Username_model','Sidebar_model'));
	}

	public function index()
	{      

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/biayausaha/viewTambahBiayaUsaha.php');
        $this->load->view('footer_admin.php');       
	}
	
	public function daftarBiayaUsaha()
	{
		$dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getbiayausaha';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key']
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
        $data['result']     = json_decode($result, true);     
        
        if ($data['result']['status'] == '0') 
        {    
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/biayausaha/viewDaftarBiayaUsaha.php',$data);
            $this->load->view('footer_admin.php');
        }
        else
        {
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/biayausaha/viewDaftarBiayaUsaha.php',$data);
            $this->load->view('footer_admin.php');
        }         
	}

    public function insertBiayaUsaha()
    {        
        $session_data   = $this->session->userdata('logged_in');    
        $tahun = $this->Username_model->modelTahunOperasiAktif();   
        $url = URL_API.'insertbiayausaha';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'tanggal'       => $this->input->post('tanggal'),
            'jumlah'        => $this->input->post('biaya'),
            'tahunoperasi_id'  => $tahun['data']['id'],
            'keterangan'    => $this->input->post('keterangan')             
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
        $hasil    = json_decode($result, true);

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di tambahkan'); 
            redirect('BiayaUsaha/daftarBiayaUsaha','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah');
            redirect('BiayaUsaha/daftarBiayaUsaha','refresh');
        }  
    }

    public function ubahBiayaUsaha ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editbiayausaha';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'biayausaha_id' => $id
        );
        /*print_r($jsonData);die();*/
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
        /*print_r($result);die();*/
        
        $data['tanggal'] = $result['data']['tanggal'];
        $data['biaya'] = $result['data']['jumlah'];        
        $data['keterangan'] = $result['data']['keterangan'];       

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/biayausaha/viewEditBiayaUsaha.php',$data);
        $this->load->view('footer_admin.php'); 
    }
    public function updateBiayaUsaha()
    {
        $session_data   = $this->session->userdata('logged_in');
        $tahun = $this->Username_model->modelTahunOperasiAktif();      
        $url = URL_API.'updatebiayausaha';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'       => $session_data['session_key'],
            'biayausaha_id'  => $this->input->post('biayausaha_id'),
            'tanggal'       => $this->input->post('tanggal'),
            'jumlah'        => $this->input->post('biaya'),
            'tahunoperasi_id'  => $tahun['data']['id'],
            'keterangan'    => $this->input->post('keterangan')                
        );

        /*print_r($jsonData);die();*/
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Ubah'); 
            redirect('BiayaUsaha/daftarBiayaUsaha','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('BiayaUsaha/daftarBiayaUsaha','refresh');
        }  
    }

    public function hapusBiayaUsaha()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletebiayausaha';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'biayausaha_id'    => $id,
            'session_key'         => $session_data['session_key']            
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus'); 
            redirect('BiayaUsaha/daftarBiayaUsaha','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('BiayaUsaha/daftarBiayaUsaha','refresh');
        }  
    }
}
?>