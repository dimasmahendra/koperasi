<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaSekunder extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model(array('Sidebar_model'));      
    }

    public function index()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getkoperasisekunder';
        $ch = curl_init($url);    
        
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
        $data['koperasisekunder']     = json_decode($result, true);        

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $url = file_get_contents(URL_API.'getkoperasi');
        $data['hasil'] = json_decode($url,true);
        //print_r($data);die();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/koperasisekunder/viewAnggotaKoperasiSekunder.php', $data);
        $this->load->view('footer_admin.php');
    } 

    //insert ketua
    public function insertKoperasiSekunder()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertkoperasisekunder';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'koperasi_id'    => $this->input->post('namaid'),
            'status'        => 'Aktif'
        );

        $jsonDataEncoded = json_encode($jsonData);
        // print_r($jsonDataEncoded);die();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['result']  = json_decode($result, true);   
        // print_r($result);die();

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Koperasi Berhasil di Tambahkan');
            redirect('AnggotaSekunder/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Koperasi Gagal di Tambahkan');
            redirect('AnggotaSekunder/index','refresh');
        }
    }

    public function keluarKoperasiSekunder()
    {        
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'keluarkoperasisekunder';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
   
        $jsonData = array(
            'session_key'           => $session_data['session_key'],
            'koperasisekunder_id'   => $id
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
            $this->session->set_flashdata('message', 'Berhasil Keluar');
            redirect('AnggotaSekunder/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Gagal Keluar');
            redirect('AnggotaSekunder/index','refresh');             
        }
    }
}
?>