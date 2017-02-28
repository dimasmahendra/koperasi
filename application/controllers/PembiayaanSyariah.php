<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembiayaanSyariah extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
	}

	public function index()
	{   
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/pembiayaansyariah/produk/viewTambahProduk.php');
        $this->load->view('footer_admin.php');       
	}

    public function daftarProduk()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'getpembiayaan';
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
        //print_r($data['result']);die();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/pembiayaansyariah/produk/viewDaftarProduk.php', $data);
        $this->load->view('footer_admin.php');       
    }

    public function insertProduk()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'insertpembiayaan';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'namaprogram'   => $this->input->post('namaprogram'),
            'akad'          => $this->input->post('akad'),
            'deskripsi'     => $this->input->post('deskripsi')
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
        $hasil    = json_decode($result, true);     
        //print_r($hasil);die();
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di tambahkan'); 
            redirect('PembiayaanSyariah/daftarProduk','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah');
            redirect('PembiayaanSyariah/daftarProduk','refresh');
        }  
    }

    public function ubahProduk()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'getpembiayaanby';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'id' => $id
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
        //print_r($result);die(); 
        $data['id'] = $result['data'][0]['id'];
        $data['namaprogram'] = $result['data'][0]['namaprogram'];
        $data['akad']   = $result['data'][0]['akad'];
        $data['deskripsi'] = $result['data'][0]['deskripsi'];

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/pembiayaansyariah/produk/viewEditProduk.php', $data);
        $this->load->view('footer_admin.php');  
    }

    public function updateProdukSyariah()
    {
        $session_data   = $this->session->userdata('logged_in');   
        $url = URL_API7.'updatepembiayaan';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'namaprogram'   => $this->input->post('namaprogram'),
            'id'            => $this->input->post('id'),
            'akad'          => $this->input->post('akad'),
            'deskripsi'     => $this->input->post('deskripsi')
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
        //print_r($hasil);die();

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Ubah'); 
            redirect('PembiayaanSyariah/daftarProduk','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('PembiayaanSyariah/daftarProduk','refresh');
        }  
    }

    public function hapusProdukSyariah()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API7.'deletepembiayaan';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'id'            => $id,
            'session_key'   => $session_data['session_key']            
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
        //print_r($hasil);die();

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus'); 
            redirect('PembiayaanSyariah/daftarProduk','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('PembiayaanSyariah/daftarProduk','refresh');
        }  
    }    
}
?>