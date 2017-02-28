<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('Url');
		$this->load->model(array('Username_model','Sidebar_model'));		
	}

	public function indexJurnal()
	{
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $data['tahun'] = $this->Username_model->modelTahunOperasi();      
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/jurnal/viewJurnal.php',$data);
        $this->load->view('footer_admin.php');       
	}    

    public function kalkulasiJurnal()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'kalkulasijurnal';
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
        $hasil     = json_decode($result, true);              
    
        if ($hasil['status'] == '1') 
        {    
            redirect('Jurnal/daftarJurnal','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Kalkulasi Jurnal Pernah Di Tambahkan Cek Di Histori Jurnal');
            redirect('Jurnal/indexJurnal','refresh');
        }
    }

    public function resetJurnalIndex()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/jurnal/viewResetJurnal.php','refresh');
        $this->load->view('footer_admin.php');
    }

    public function resetJurnal()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'resetjurnal';
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
        $hasil     = json_decode($result, true);
        
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Reset');
            redirect('Jurnal/resetJurnalIndex','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Kalkulasi Jurnal Gagal Di Tambahkan');
            redirect('Jurnal/resetJurnalIndex','refresh');            
        }
    }

    public function daftarJurnal()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getjurnalaktif';
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
        $data['hasil']   = json_decode($result, true);
    
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/jurnal/viewDaftarJurnal.php',$data);
        $this->load->view('footer_admin.php');
    } 

    public function daftarPeriodeJurnal()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getjurnalwhere';
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
        $data['hasil'] = json_decode($result, true);

        if($data['hasil']['message'] == 'data tidak ditemukan')
        {
            $this->session->set_flashdata('error', 'Data Tahun Operasi Periode yang dipilih belum di kalkulasi, coba periode tahun operasi lainnya');
            redirect('Jurnal/indexJurnal','refresh');
        }
        else
        {
            $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/jurnal/viewDaftarPeriodeJurnal.php',$data);
            $this->load->view('footer_admin.php');
        }
    }     
}
?>