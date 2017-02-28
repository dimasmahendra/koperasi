<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trainingKoperasi extends MY_Controller {

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
        $this->load->view('admin/trainingkoperasi/viewTambahTrainingKoperasi.php');
        $this->load->view('footer_admin.php');
	}

    public function insertTrainingKoperasi()
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
        $url = URL_API.'inserttrainingkoperasi';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'judul'             => $this->input->post('judulTraining'),
            'tanggal'               => $this->input->post('tanggalTraining'),
            'tempat'            => $this->input->post('lokasiTraining'),
            'durasi'            => $this->input->post('durasiTraining'),
            'kapasitas'             => $this->input->post('kuotaTraining'),
            'foto'                  => $foto,
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
            redirect('trainingKoperasi/daftarTrainingKoperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Artikel Bermasalah');
            redirect('trainingKoperasi/daftarTrainingKoperasi','refresh');
        }  
    }   

    public function daftarTrainingKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'gettrainingkoperasi';
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
        $this->load->view('admin/trainingkoperasi/viewDaftarTrainingKoperasi.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function ubahTrainingKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'edittrainingkoperasi';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'trainingkoperasi_id' => $id
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
        $this->load->view('admin/trainingkoperasi/viewEditTrainingKoperasi.php',$hasil);
        $this->load->view('footer_admin.php'); 
    }

    public function updateTraining()
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
        $url = URL_API.'updatetrainingkoperasi';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'       => $session_data['session_key'],
            'trainingkoperasi_id' => $this->input->post('trainingkoperasi_id'),
            'judul'            => $this->input->post('judulTraining'),
            'tanggal'          => $this->input->post('tanggalTraining'),
            'tempat'           => $this->input->post('lokasiTraining'),
            'durasi'           => $this->input->post('durasiTraining'),
            'kapasitas'        => $this->input->post('kuotaTraining'),
            'foto'                  => $foto,
            'isi'              => $this->input->post('isi')         
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
            redirect('trainingKoperasi/daftarTrainingKoperasi','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('infoKoperasi/daftarInfoKoperasi','refresh');             
        } 
    }

    public function hapusTraining()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletetrainingkoperasi';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'trainingkoperasi_id'     => $id,
            'session_key'             => $session_data['session_key'],            
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
            redirect('trainingKoperasi/daftarTrainingKoperasi','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data still here');
            redirect('trainingKoperasi/daftarTrainingKoperasi','refresh');             
        } 
    }

}
	
