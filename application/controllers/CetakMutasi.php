<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakMutasi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
	}   
 
    public function pdf()
    {

        $cssUrl = base_url('asset_admin/css/cetakmutasistyle.css');
        $this->load->library('m_pdf');

        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'gettabungandetail';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3); 
        $idanggota = $this->uri->segment(4);  
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'tabungan_id' => $this->input->post('tabungan_id'),
            'anggotakoperasi_id' => $this->input->post('anggotakoperasi_id')
        );
        //print_r($jsonData);die();
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $data['result'] = json_decode($result, true);

        $html=$this->load->view('viewCetakMutasi.php',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
        $pdfFilePath ="mypdfName-".time()."-download.pdf";

        $pdf = $this->m_pdf->load();
        $stylesheet = file_get_contents($cssUrl);
  
        $pdf->WriteHTML($stylesheet,1);
        $pdf->WriteHTML($html,2);

        $pdf->Output($pdfFilePath, "D");
    }      
}?>