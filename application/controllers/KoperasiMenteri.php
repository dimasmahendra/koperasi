<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KoperasiMenteri extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form','file','url','html'));
	}
	
	public function index() 
    {
    	$session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getanggotakoperasi';
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
        $data['result']     = json_decode($result, true);        
        
        $this->load->view('viewAnggota.php',$data);    
	}    

    public function insertKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertkoperasi';
        $ch = curl_init($url);

        $jsonData = array();
        for($i=1;$i<201;$i++)
        {
            $jsonData[] = array(
                'session_key' => $session_data['session_key'],
                'nama'             => 'Koperasi Simpan Pinjam '.$i,
                'tipekoperasi_id'  => 5,
                'skalakoperasi_id' => 2,
                'telepon'          => '080989999',
                'email'            => 'koperasiksp00'.$i.'@ymail.com',
                'alamat'           => 'Jalan Perumnas',
                'kelurahan_id'     => 40527
            );     

            $ch = curl_init ($url); // your URL to send array data
            curl_setopt ($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData[$i]); // Your array field
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec ($ch);            
        }
    }

    public function insertAdminKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertadminkoperasi';
        $ch = curl_init($url);

        $jsonData = array();
        $nokop = 206;//id mulai nya dari koperasi yang di bikin sebelumnya
        $h = 0;
        for($i=1;$i<201;$i++)
        {
            $jsonData[] = array(
                'session_key' => $session_data['session_key'],
                'koperasi_id'       => $nokop++,
                'akseskoperasi_id'  => 1,
                'username'          => 'ksp00'.$i,
                'nama'              => 'Admin Ksp00'.$i,
                'email'             => 'koperasiksp00'.$i.'@ymail.com',            
                'telepon'           => '080989999',
                'password'          => 'ksp00'.$i.'admin' 
            );     

            
            $ch = curl_init ($url); // your URL to send array data
            curl_setopt ($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData[$h++]); // Your array field
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec ($ch);        
        }
        //print_r($jsonData);die();
    } 
}