<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RAT extends MY_Controller {

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
        $data['koperasi_id'] = $this->Sidebar_model->modelNotif();
        $data['tahunoperasi'] = $this->Username_model->modelTahunOperasiAktif();
        //print_r($data['tahunoperasi']);die()

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/rat/viewTambahRAT.php',$data);
        $this->load->view('footer_admin.php');       
	}

    public function daftarRAT()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getrat';
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
        $this->load->view('admin/rat/viewDaftarRAT.php',$data);
        $this->load->view('footer_admin.php');
    }
	
	public function kehadiranRAT()
	{
		$session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getkehadiranrataktif';
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
        $this->load->view('admin/rat/viewDaftarHadir.php',$data);
        $this->load->view('footer_admin.php');
	}
    
	public function insertRAT()
	{
	    $session_data   = $this->session->userdata('logged_in');

        $url = URL_API.'insertrat';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'     => $session_data['session_key'],
            'koperasi_id'     => $this->input->post('koperasi_id'),
            'tahunoperasi_id' => $this->input->post('tahunoperasi_id'),
            'tempat'          => $this->input->post('tempat'),
            'tanggal'         => $this->input->post('tanggal'),
            'info'            => $this->input->post('info')                     
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
            redirect('RAT/daftarRAT','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah');
            redirect('RAT/daftarRAT','refresh');
        }  
	}

	public function ubahRAT ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editrat';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'rat_id' => $id
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
        
        $data['koperasi_id'] = $result['data']['koperasi_id'];
        $data['tahunoperasi_id']   = $result['data']['tahunoperasi_id'];
        $data['tempat'] = $result['data']['tempat'];
        $data['tanggal'] = $result['data']['tanggal'];
        $data['info'] = $result['data']['info'];
        
        $data['hasil'] = $this->Username_model->modelAkses();

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/rat/viewEditRAT.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updateRAT()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updaterat';
        $ch = curl_init($url);     
      
        $jsonData = array(      
            'rat_id'=> $this->input->post('rat_id'),
            'session_key'       => $session_data['session_key'],
            'koperasi_id'     => $this->input->post('koperasi_id'),
            'tahunoperasi_id' => $this->input->post('tahunoperasi_id'),
            'tempat'          => $this->input->post('tempat'),
            'tanggal'         => $this->input->post('tanggal'),
            'info'            => $this->input->post('info')
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
            $this->session->set_flashdata('message', 'Data Sudah di update');
            redirect('RAT/daftarRAT','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('RAT/daftarRAT','refresh');           
        } 
    }

    public function hapusRAT()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deleterat';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
      
        $jsonData = array(      
            'session_key' => $session_data['session_key'],
            'rat_id' => $id           
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
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('RAT/daftarRAT','refresh');  
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('RAT/daftarRAT','refresh');  
        }  
    }

}

?>