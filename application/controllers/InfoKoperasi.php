<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class infoKoperasi extends MY_Controller {

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
        $this->load->view('admin/infokoperasi/viewInfoKoperasi.php');
        $this->load->view('footer_admin.php');
    }

    public function insertInfoKoperasi()
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
        $url = URL_API.'insertinfokoperasi';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'judul'             => $this->input->post('judul'),
            'isi'               => $this->input->post('isi'),
            'tanggalmulai'      => $this->input->post('tanggalmulai'),
            'tanggalselesai'    => $this->input->post('tanggalselesai'),
            'foto'              => $foto                 
        );    

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

/*        print_r($hasil);die();*/

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Artikel Berhasil di tambahkan'); 
            redirect('infoKoperasi/daftarInfoKoperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Artikel Bermasalah');
            redirect('infoKoperasi/daftarInfoKoperasi','refresh');
        }  

    }

    public function daftarInfoKoperasi()
    {
        $this->load->helper('text');
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getinfokoperasi';
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
    
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/infokoperasi/viewDaftarInfoKoperasi.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function ubahInfoKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editinfokoperasi';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'infokoperasi_id' => $id
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

        $data['judul'] = $result['data']['judul'];
        $data['isi']   = $result['data']['isi'];
        $data['tanggalmulai'] = $result['data']['tanggalmulai'];
        $data['tanggalselesai'] = $result['data']['tanggalselesai'];
        $data['foto']       = $result['data']['foto'];

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/infokoperasi/viewUbahInfoKoperasi.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function detailInfoKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editinfokoperasi';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'infokoperasi_id' => $id
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

        $data['judul'] = $result['data']['judul'];
        $data['isi']   = $result['data']['isi'];
        $data['tanggalmulai'] = $result['data']['tanggalmulai'];
        $data['tanggalselesai'] = $result['data']['tanggalselesai'];
        $data['foto']       = $result['data']['foto'];

        $data['komentar']     = $this->Username_model->modelKomentar();
        $data['viewer']     = $this->Username_model->modelViewer();
        //print_r($data['viewer']); die();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/infokoperasi/detailInfoKoperasi.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updateInfoKoperasi()
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
        $url = URL_API.'updateinfokoperasi';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'       => $session_data['session_key'],
            'infokoperasi_id'   => $this->input->post('infokoperasi_id'),
            'judul'             => $this->input->post('judul'),
            'tanggalmulai'      => $this->input->post('tanggalmulai'),
            'tanggalselesai'    => $this->input->post('tanggalselesai'),
            'foto'                  => $foto,
            'isi'               => $this->input->post('isi')          
        );

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
            redirect('infoKoperasi/daftarInfoKoperasi','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('infoKoperasi/daftarInfoKoperasi','refresh');             
        } 
    }

    public function hapusInfoKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deleteinfokoperasi';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'infokoperasi_id'     => $id,
            'session_key'         => $session_data['session_key'],            
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
            redirect('infoKoperasi/daftarInfoKoperasi','refresh');  
        }
        else
        {
            $this->session->set_flashdata('error', 'Data still here');
            redirect('infoKoperasi/daftarInfoKoperasi','refresh');             
        } 
    }

    

}
	
