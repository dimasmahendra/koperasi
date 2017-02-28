<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunOperasi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('Url');
		$this->load->model(array('Username_model','Sidebar_model','Yeartodate_model'));	
	}

	public function index()
	{
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/tahunoperasi/viewTambahTahunOperasi.php');
        $this->load->view('footer_admin.php');       
	}

	public function daftarTahunOperasi()
	{
		$session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'gettahunoperasi';
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

        $data['tahun'] = $this->Username_model->modelTahunOperasi();

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/tahunoperasi/viewDaftarTahunOperasi.php',$data);
        $this->load->view('footer_admin.php');
	}

    public function updateTahunOperasiAktif()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'updatestatustahunoperasi';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'tahunoperasi_id' => $this->input->post('tahunoperasi')
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
            $this->session->set_flashdata('pesan', 'Tahun Operasi Berhasil Di Rubah'); 
            redirect('TahunOperasi/daftarTahunOperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Tahun Operasi Gagal Di Rubah');
            redirect('TahunOperasi/daftarTahunOperasi','refresh');
        }        
    }
    
	public function insertTahunOperasi()
	{
	    $session_data = $this->session->userdata('logged_in');
        $tanggalmulai = $this->Yeartodate_model->firstYeartodate($this->input->post('tanggalmulai'));
        $tanggalselesai = $this->Yeartodate_model->endYeartodate($this->input->post('tanggalmulai'));

        $url = URL_API.'inserttahunoperasi';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'		=> $session_data['session_key'],            
            'tanggalmulai'   	=> $tanggalmulai,
            'tanggalselesai' 	=> $tanggalselesai,
            'status'      		=> 'Tidak Aktif'                  
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
            $this->session->set_flashdata('pesan', 'Data Berhasil di tambahkan'); 
            redirect('TahunOperasi/daftarTahunOperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah');
            redirect('TahunOperasi/daftarTahunOperasi','refresh');
        }  
	}

	public function ubahTahunOperasi ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'edittahunoperasi';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'tahunoperasi_id' => $id
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
        
        $data['tanggalmulai'] = $result['data']['tanggalmulai'];
        $data['tanggalselesai'] = $result['data']['tanggalselesai'];

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/tahunoperasi/viewEditTahunOperasi.php',$data);
        $this->load->view('footer_admin.php'); 
    }
    public function updateTahunOperasi()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updatetahunoperasi';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'       => $session_data['session_key'],
            'tahunoperasi_id' 	=> $this->input->post('tahunoperasi_id'),
            'tanggalmulai'   	=> $this->input->post('tanggalmulai'),
            'tanggalselesai' 	=> $this->input->post('tanggalselesai'),
            'status' 			=> $this->input->post('status')
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('TahunOperasi/daftarTahunOperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('TahunOperasi/daftarTahunOperasi','refresh');
        }  
    }
    public function hapusTahunOperasi()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletetahunoperasi';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'tahunoperasi_id' => $id,
            'session_key'         => $session_data['session_key']            
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('TahunOperasi/daftarTahunOperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('TahunOperasi/daftarTahunOperasi','refresh');
        }  
    }

}

?>