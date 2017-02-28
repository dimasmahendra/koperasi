<?php
class Peminjaman_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    

    public function cekPeminjaman()
    {
      
        $session_data = $this->session->userdata('logged_in');
        $url          = URL_APIS.'getsetingpeminjaman';
        $ch           = curl_init($url);      
      
        $jsonData = array('session_key' => $session_data['session_key']);

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);       
        $data = json_decode($result, true);

        return $data;
    }
}

?>