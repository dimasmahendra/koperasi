<?php
class SusunanKepengurusan_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    

    public function pengurusKetua()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getketuakoperasi';
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
        $hasil = json_decode($result, true);
        return $hasil;       
    }

    public function pengurusSekretaris()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getsekretariskoperasi';
        $ch = curl_init($url);    
        /*mem POSTkan hasil dari session_data*/   
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
        $hasilSekret = json_decode($result, true);
        return $hasilSekret;
    }

    public function pengurusBendahara()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getbendaharakoperasi';
        $ch = curl_init($url);    
        /*mem POSTkan hasil dari session_data*/   
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
        $hasilBendahara = json_decode($result, true);
        return $hasilBendahara;
    }

    public function pengurusPengawas()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getpengawaskoperasi';
        $ch = curl_init($url);    
        /*mem POSTkan hasil dari session_data*/   
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
        $hasilPengawas = json_decode($result, true);
        return $hasilPengawas;
    }

    public function pengurusManager()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getmanajerkoperasi';
        $ch = curl_init($url);    
        /*mem POSTkan hasil dari session_data*/   
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
        $hasilManager = json_decode($result, true);
        return $hasilManager;
    }

    public function pengurusKaryawan()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getkaryawan';
        $ch = curl_init($url);    
        /*mem POSTkan hasil dari session_data*/   
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
        $hasilKaryawan = json_decode($result, true);
        return $hasilKaryawan;
    }

    public function pengurusDewanPengawasSyariah()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'getdewanpengawas';
        $ch = curl_init($url);
        /*mem POSTkan hasil dari session_data*/
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
        $hasilDewanPengawasSyariah = json_decode($result, true);

        return $hasilDewanPengawasSyariah;
    }

}
?>