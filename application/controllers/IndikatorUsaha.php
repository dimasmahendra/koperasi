<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndikatorUsaha extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->model(array('Sidebar_model'));		
	}

	public function index()
	{
		$session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getindikatorusaha';
        $ch = curl_init($url);    
        /*mem POSTkan hasil dari session_data*/   
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

        //print_r($data);die();
		$dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
		
		$this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/indikatorUsaha/viewIndikatorUsaha.php',$data);
        $this->load->view('footer_admin.php');
	}    

	public function tambahIndikatorUsaha()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertindikatorusaha';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'		=> $session_data['session_key'],
			'tahun'				=> $this->input->post('tahun'),
			'modalsendiri'		=> $this->input->post('modalSendiri'),
			'modalluar'			=> $this->input->post('modalLuar'),
			'asset'				=> $this->input->post('assetKop'),
			'volumeusaha'		=> $this->input->post('volUsaha'),
			'selisihhasilusaha'	=> $this->input->post('selishSU')
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
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
            redirect('IndikatorUsaha/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('IndikatorUsaha/index','refresh');             
        } 
    }

    public function updateIndikatorUsaha()
    {        
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'updateindikatorusaha';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'id'                => $this->input->post('id'),
            'modalsendiri'      => $this->input->post('modalSendiri'),
            'modalluar'         => $this->input->post('modalLuar'),
            'asset'             => $this->input->post('assetKop'),
            'volumeusaha'       => $this->input->post('volUsaha'),
            'selisihhasilusaha' => $this->input->post('selishSU'),
            'tahun'             => $this->input->post('tahun')
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
        $hasil     = json_decode($result, true); 
        //print_r($hasil);die();
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Berhasil di Ubah');
            redirect('IndikatorUsaha/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Ubah');
            redirect('IndikatorUsaha/index','refresh');             
        }
    }

    public function hapusIndikatorUsaha()
    {        
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'deleteindikatorusaha';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'id'                => $id
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
        $hasil     = json_decode($result, true); 
        //print_r($hasil);die();
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus');
            redirect('IndikatorUsaha/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Hapus');
            redirect('IndikatorUsaha/index','refresh');             
        }
    }
}
?>