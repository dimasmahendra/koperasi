<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KesehatanSekunder extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->library('session');    
        $this->load->model(array('Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
    }

    public function index() 
    {
        $session_data = $this->session->userdata('logged_in'); 
        $url = URL_APIZ.'getindikatorkesehatan';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'       => $session_data['session_key']                        
        );     

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['result'] = json_decode($result, true);
        //print_r($data['result']);die();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/kesehatansekunder/viewDaftarKesehatanSekunder.php', $data);
        $this->load->view('footer_admin.php');     
    }

    public function lihatdetil() 
    {
        $session_data = $this->session->userdata('logged_in'); 
        $url = URL_APIZ.'getdetilindikatorusaha';
        $ch = curl_init($url);      
        $id = $this->uri->segment(3);
      
        $jsonData = array(           
            'session_key'       => $session_data['session_key'],
            'koperasi_id'       => $id
        );     

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $result = json_decode($result, true);
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/kesehatansekunder/viewDetilKesehatanKoperasi.php', $result);
        $this->load->view('footer_admin.php');     
    }
    
}?>