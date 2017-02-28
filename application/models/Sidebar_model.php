<?php
class Sidebar_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
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
        $data['hasil']   = json_decode($result, true);
        //print_r(count($data['hasil']['data']));die();
        if ($data['hasil']['status'] == 0) {
            $data['jumlah'] = '0';
        }
        else
        {
            $data['jumlah'] = count($data['hasil']['data']);            
        }
        
        //print_r($session_data);die();
        //echo $data['jumlah'];die();       
        $data['foto'] = $session_data['data']['foto'];
        $data['nama_sidebar'] = $session_data['data']['nama'];
        $data['username_sidebar'] = $session_data['data']['username'];
        $data['koperasi_id'] = $session_data['data']['koperasi_id'];
        $data['kodetipekoperasi'] = $session_data['data']['koperasi']['tipekoperasi_id'];
        $data['kelompokkoperasi_id'] = $session_data['data']['koperasi']['kelompokkoperasi_id'];
                          
        return $data;
    }  
}

?>