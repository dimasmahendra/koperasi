<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananPokok extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('Url');
		$this->load->model(array('Username_model','Sidebar_model'));  		
	}

	public function index()
	{
		$data['anggota'] = $this->Username_model->modelAnggota();
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpananpokok/viewTambahSimpananPokok.php',$data);
        $this->load->view('footer_admin.php');
	}

	public function daftarSimpananPokok()
	{
		$session_data   = $this->session->userdata('logged_in');  
        $url = URL_APIS.'getsimpananpokok';
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
        $this->load->view('admin/simpananpokok/viewDaftarSimpananPokok.php',$data);
        $this->load->view('footer_admin.php');
	}

	// public function insertSimpananPokok()
 //    {
 //        $session_data   = $this->session->userdata('logged_in');
 //        $url = URL_APIS.'insertsimpananpokok';
 //        $ch = curl_init($url);
   
 //        $jsonData = array(
 //            'session_key'         => $session_data['session_key'], 
 //            'anggotakoperasi_id'  => $this->input->post('ang'),            
 //            'jumlah'              => $this->input->post('jumlah')
 //            );  

 //        $jsonDataEncoded = json_encode($jsonData);
 //        curl_setopt($ch, CURLOPT_POST, 1);
 //        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 //        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 //        $result = curl_exec($ch);
 //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //        curl_close($ch);
 //        $hasil    = json_decode($result, true);  

   
 //        if ($hasil['status'] == '1') 
 //        {    
 //            $this->session->set_flashdata('message', 'Data Berhasil di tambahkan'); 
 //            redirect('SimpananPokok/daftarSimpananPokok','refresh');
 //        }
 //        else
 //        {
 //            $this->session->set_flashdata('error', 'Data gagal di tambah');
 //            redirect('SimpananPokok/daftarSimpananPokok','refresh');
 //        }  
 //    }

 //    public function ubahSimpananPokok()
 //    {
 //        $session_data   = $this->session->userdata('logged_in');
 //        $url = URL_APIS.'editsimpananpokok';
 //        $ch = curl_init($url);
 //        $id = $this->uri->segment(3);      
      
 //        $jsonData = array(           
 //            'session_key' => $session_data['session_key'],
 //            'id' => $id
 //        );
 //        /*print_r($jsonData);die();*/
 //        $jsonDataEncoded = json_encode($jsonData);
 //        curl_setopt($ch, CURLOPT_POST, 1);
 //        curl_setopt($ch, CURLOPT_FAILONERROR, true);
 //        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 //        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
 //        $result = curl_exec($ch);
 //        curl_close($ch);        
 //        $result     = json_decode($result, true);      
        
 //        $data['biaya'] = $result['data']['jumlah'];
 //        $data['anggotakoperasi_id'] = $result['data']['anggotakoperasi_id'];
 //        $data['hasil'] = $this->Username_model->modelAnggota();
                  
 //        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
 //        $this->load->view('main_admin.php',$dataSidebar);
 //        $this->load->view('admin/simpananpokok/viewEditSimpananPokok.php',$data);
 //        $this->load->view('footer_admin.php'); 
 //    }

 //    public function updateSimpananPokok()
 //    {
 //        $session_data   = $this->session->userdata('logged_in');        
 //        $url = URL_APIS.'updatesimpananpokok';
 //        $ch = curl_init($url);
      
 //        $jsonData = array( 
 //            'session_key' => $session_data['session_key'],
 //            'id'         => $this->input->post('id'),
 //            'jumlah' => $this->input->post('jumlah')
 //        );
        
 //        $jsonDataEncoded = json_encode($jsonData);
 //        curl_setopt($ch, CURLOPT_POST, 1);
 //        curl_setopt($ch, CURLOPT_FAILONERROR, true);
 //        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 //        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
 //        $result = curl_exec($ch);
 //        curl_close($ch);        
 //        $hasil    = json_decode($result, true);

 //        if ($hasil['status'] == '1') 
 //        {    
 //            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
 //            redirect('SimpananPokok/daftarSimpananPokok','refresh');
 //        }
 //        else
 //        {
 //            $this->session->set_flashdata('error', 'Data gagal berubah');
 //            redirect('SimpananPokok/daftarSimpananPokok','refresh');
 //        }  
 //    }
 //    public function hapusSimpananPokok()
 //    {
 //        $session_data   = $this->session->userdata('logged_in');        
 //        $url = URL_APIS.'deletesimpananpokok';
 //        $ch = curl_init($url);
 //        $id = $this->uri->segment(3);
      
 //        $jsonData = array(
 //            'session_key'    => $session_data['session_key'],
 //            'id'    => $id
 //        );

 //        /*print_r($jsonData);die();*/       

 //        $jsonDataEncoded = json_encode($jsonData);
 //        curl_setopt($ch, CURLOPT_POST, 1);
 //        curl_setopt($ch, CURLOPT_FAILONERROR, true);
 //        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 //        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
 //        $result = curl_exec($ch);
 //        curl_close($ch);        
 //        $hasil    = json_decode($result, true);

 //        /*print_r($hasil);die();*/

 //        if ($hasil['status'] == '1') 
 //        {    
 //            $this->session->set_flashdata('message', 'Data Berhasil di Hapus'); 
 //            redirect('SimpananPokok/daftarSimpananPokok','refresh');
 //        }
 //        else
 //        {
 //            $this->session->set_flashdata('error', 'Data gagal di Hapus');
 //            redirect('SimpananPokok/daftarSimpananPokok','refresh');
 //        }  
 //    }

}

/* End of file SimpananPokok */
/* Location: ./application/controllers/SimpananPokok */