<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportTransaksi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
	}

	public function index()
	{   
        redirect('ReportTransaksi/daftarReportTransaksi','refresh');       
	}
	
	public function daftarReportTransaksi()
	{
		$session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getreporttransaksitoday';
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

      	/*echo "<pre>";
        print_r($data['result']);die();*/        
    
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/reportTransaksi/viewReportTransaksi.php',$data);
        $this->load->view('footer_admin.php');
	}

	public function daftarDetilReportTransaksi()
	{
		$session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getreporttransaksidetail';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);    
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'transaksi_id' => $id
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
        $this->load->view('admin/reportTransaksi/viewDetilReportTransaksi.php',$data);
        $this->load->view('footer_admin.php');
	}

    public function daftarPeriodeReport()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getreporttransaksirange';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'tanggalmulai' => $this->input->post('tanggalmulai'),
            'tanggalakhir' => $this->input->post('tanggalakhir')
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
        $data['tanggalmulai'] = $this->input->post('tanggalmulai');
        $data['tanggalakhir'] = $this->input->post('tanggalakhir');           
    
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/reportTransaksi/viewPeriodeReport.php',$data);
        $this->load->view('footer_admin.php');
    }
}
?>