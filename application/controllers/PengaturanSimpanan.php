<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaturanSimpanan extends MY_Controller{

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
        $url = URL_API.'getmykoperasi';
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
        $this->load->view('admin/pengaturanSimpanan/viewPengaturanSimpanan.php',$data);
        $this->load->view('footer_admin.php');
	}

	public function ubahPengaturanSimpanan()
	{
		$session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'updatemykoperasi';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'     => $session_data['session_key'],            
            'simpananpokok'   => $this->input->post('sipok')
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
        $hasil = json_decode($result, true);
       
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Simpan'); 
            redirect('PengaturanSimpanan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Simpan');
            redirect('PengaturanSimpanan/index','refresh');
        }
	}

    public function ubahPengaturanSimpananWajib()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'updatemykoperasi';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'     => $session_data['session_key'],            
            'simpananwajib'   => $this->input->post('siwab')
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
        $hasil = json_decode($result, true);
       
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Simpan'); 
            redirect('PengaturanSimpanan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Simpan');
            redirect('PengaturanSimpanan/index','refresh');
        }
    }


	
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */