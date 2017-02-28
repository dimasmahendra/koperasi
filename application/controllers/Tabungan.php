<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model','Tabungan_model'));
        $this->load->helper(array('form','file','url','html'));
	}

    public function index()
    {   
        $session_data   = $this->session->userdata('logged_in');        
        $data['koperasi_id'] = $session_data['data']['koperasi_id'];
        $data['hasil'] = $this->Username_model->modelAnggota();
        $data['tabungan'] = $this->Tabungan_model->cekTabungan();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/tabungan/viewTambahTabungan.php',$data);
        $this->load->view('footer_admin.php');   
    }

	public function daftarTabungan()
	{   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'gettabungan';
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

        //print_r($data['result']);die();
                        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/tabungan/viewDaftarTabungan.php',$data);
        $this->load->view('footer_admin.php');       
	}

    public function AmbilTabungan()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'ambiltabungan';
        $ch = curl_init($url);
        
        //print_r($idTabungan);die();

        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'tabungan_id' => $this->input->post('tabungan_id'),
            'metode_id' => $this->input->post('metode_id'),
            'token' => $this->input->post('token'),
            'penerima' => $this->input->post('penerima'),
            'jumlah' => $this->input->post('jumlah')            
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
        $hasil = json_decode($result, true);

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Tabungan Berhasil di Ambil'); 
            redirect('Tabungan/daftarTabungan','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Tabungan gagal di Ambil');
            redirect('Tabungan/daftarTabungan','refresh');
        }       
    }

    public function daftarLihatMutasi()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'gettabungandetail';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3); 
        $idanggota = $this->uri->segment(4);  
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'tabungan_id' => $id,
            'anggotakoperasi_id' => $idanggota
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
        $data['result'] = json_decode($result, true);        
                
        //print_r($data['result']);die();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/tabungan/viewDaftarLihatMutasi.php',$data);
        $this->load->view('footer_admin.php');       
    }	

    public function LakukanTabunganProses()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'inserttabungan';
        $ch = curl_init($url); 

        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'norekening'         => $this->input->post('norek'),
            'koperasi_id' => $this->input->post('koperasi_id'),
            'anggotakoperasi_id' => $this->input->post('anggotakoperasi'),
            'metode' => 1,
            'setoran' => $this->input->post('kredit'),
            'sumberdana' => $this->input->post('sumberdana'),
            'penyetor' => $this->input->post('penyetor')
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
        $hasil = json_decode($result, true);

        //print_r($hasil);die();

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Tabungan Berhasil di tambahkan'); 
            redirect('Tabungan/daftarTabungan','refresh');
        }
        else if (($hasil['status'] == '0') && ($hasil['message'] == 'Seting tabungan not found'))
        {
            $this->session->set_flashdata('warning', 'Jumlah Simpanan yang anda inputkan tidak masuk dalam pengaturan tabungan'); 
            redirect('Tabungan/daftarTabungan','refresh');
        }
        else if (($hasil['status'] == '0') && ($hasil['message'] == 'Setoran kurang'))
        {
            $this->session->set_flashdata('warning', 'Jumlah Simpanan yang anda inputkan kurang dari yang sudah ditentukan'); 
            redirect('Tabungan/daftarTabungan','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Tabungan gagal di tambah');
            redirect('Tabungan/daftarTabungan','refresh');
        }  
    }
}?>