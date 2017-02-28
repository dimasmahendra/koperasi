<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class seminarKoperasi extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file'));


	}
	
	public function index() 
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/seminarkoperasi/viewTambahSeminarKoperasi.php');
        $this->load->view('footer_admin.php');
	}

    public function daftarSeminarKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getseminarkoperasi';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
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
    
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/seminarkoperasi/viewDaftarSeminarKoperasi.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function insertSeminarKoperasi()
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

        $header = array('Content-Type: multipart/form-data','Content-Type: application/json');
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertseminarkoperasi';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'judul'             => $this->input->post('judul'),
            'tanggal'           => $this->input->post('tanggal'),
            'tempat'            => $this->input->post('lokasi'),
            'durasi'            => $this->input->post('durasi'),
            'kapasitas'         => $this->input->post('kuota'),
            'foto'              => $foto,
            'isi'               => $this->input->post('isi')                 
        );    

        /*print_r($jsonData);die();*/

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
        $hasil= json_decode($result, true); 

       /*print_r($hasil);die();*/

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Artikel Berhasil di tambahkan'); 
            redirect('seminarKoperasi/daftarSeminarKoperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Artikel Bermasalah');
            redirect('seminarKoperasi/daftarSeminarKoperasi','refresh');
        }
    }

    public function ubahSeminarKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editseminarkoperasi';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);     
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'seminarkoperasi_id' => $id
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

        $hasil['judul']     = $result['data']['judul'];
        $hasil['tanggal']   = $result['data']['tanggal'];
        $hasil['durasi']    = $result['data']['durasi'];
        $hasil['tempat']    = $result['data']['tempat'];
        $hasil['kapasitas'] = $result['data']['kapasitas'];
        $hasil['isi']       = $result['data']['isi'];
         $hasil['foto']       = $result['data']['foto'];

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/seminarkoperasi/viewEditSeminarKoperasi.php',$hasil);
        $this->load->view('footer_admin.php'); 
    } 
    public function updateSeminar()
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


         $header = array('Content-Type: multipart/form-data','Content-Type: application/json');
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updateseminarkoperasi';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'           => $session_data['session_key'],
            'seminarkoperasi_id'    => $this->input->post('seminarkoperasi_id'),
            'judul'                 => $this->input->post('judul'),
            'tanggal'               => $this->input->post('tanggal'),
            'tempat'                => $this->input->post('lokasi'),
            'durasi'                => $this->input->post('durasi'),
            'kapasitas'             => $this->input->post('kuota'),
            'foto'                  => $foto,
            'isi'                   => $this->input->post('isi')         
        );
        /*print_r($jsonData);die();*/
        
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

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di update');
            redirect('seminarKoperasi/daftarSeminarKoperasi','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('seminarKoperasi/daftarSeminarKoperasi','refresh');              
        } 
    }

    public function hapusSeminar()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deleteseminarkoperasi';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'seminarkoperasi_id'     => $id,
            'session_key'            => $session_data['session_key']            
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

       /*print_r($hasil);die();*/

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data is gone');
            redirect('seminarKoperasi/daftarSeminarKoperasi','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data still here');
            redirect('seminarKoperasi/daftarSeminarKoperasi','refresh');             
        } 
    }

}
	
