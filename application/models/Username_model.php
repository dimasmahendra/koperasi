<?php
class Username_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function modelAkses()
    {
       
        $session_data   = $this->session->userdata('logged_in');   
        $url = URL_API.'getakseskoperasi';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $result     = json_decode($result, true);       
        return $result;
    }

    public function modelAnggota()
    {
        $session_data   = $this->session->userdata('logged_in'); 
        $url = URL_API.'getidnamaanggota';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $result     = json_decode($result, true);
        return $result;
    }
    public function modelSHU()
    {
       
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'gettipekomponenshu';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $result     = json_decode($result, true);                      
        return $result;
    }
    public function modelTahunOperasi()
    {
      
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'gettahunoperasi';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $result     = json_decode($result, true);                      
        return $result;
    }
    public function modelTahunOperasiAktif()
    {
      
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'gettahunoperasiaktif';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $result     = json_decode($result, true);                      
        return $result;
    }
    public function modelSupplier()
    {
      
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'getsuplier';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $result     = json_decode($result, true);                      
        return $result;
    }
    public function modelProduk()
    {
      
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'getproduk';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $result     = json_decode($result, true);                      
        return $result;
    }

    public function modelNotif()
    {
      
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'getnewpesankementerian';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil   = json_decode($result, true);
        $data['jumlah'] = count($hasil['data']);                      
        return $data;
    }

    public function modelKategori()
    {
      
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'getkategori';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data   = json_decode($result, true);                       
        return $data;
    }

    public function modelProdukKategori()
    {
      
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'getprodukbykategori';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data   = json_decode($result, true);                       
        return $data;
    }

    public function modelMinimalSimpan() {

        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_APIS.'getminimalsimpanan';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'],       
        'koperasi_id' => $session_data['data']['koperasi_id'] );       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data   = json_decode($result, true);                       
        return $data;  
    }

    public function modelJangkaWaktu() {

        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_APIS.'getsetingsimka';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key']);       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data   = json_decode($result, true);                       
        return $data;  
    }

    public function modelSimpanBerjangka() {

        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'getsimpananberjangka';
        $ch = curl_init($url);  
        $id = $this->uri->segment(3);    
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'id' => $id
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
        $data  = json_decode($result, true); 
        return $data;  
    }

    public function modelMetode() {

        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_APIS.'getmetode';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key']);       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data   = json_decode($result, true);                       
        return $data; 
    }

    public function modelTipeBunga() {

        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_APIS.'gettipebunga';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key']);       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data   = json_decode($result, true);                       
        return $data; 
    }

    public function modelSetingPeminjaman() {
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_APIS.'getsetingpeminjaman';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key']);       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data   = json_decode($result, true);                       
        return $data; 
    }

    public function modelKomentar() {

        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'getkomentar';
        $ch = curl_init($url);  
        $id = $this->uri->segment(3);    
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'infokoperasi_id' => $id
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
        $data  = json_decode($result, true); 
        return $data;  
    }

    public function modelViewer() {

        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'getnotifinfokoperasi';
        $ch = curl_init($url);  
        $id = $this->uri->segment(3);    
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'infoid' => $id
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
        $data  = json_decode($result, true); 

        //print_r($data);die();
        return $data;  
    }
}

?>