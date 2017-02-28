<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
	}

	public function index()
	{   
        $data['hasil'] = $this->Username_model->modelAkses();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/iuran/viewDaftarIuran.php',$data);
        $this->load->view('footer_admin.php');       
	}

    public function insertBayar()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'insertiuranwajib';
        $ch = curl_init($url);

        $jsonData = array(           
            'session_key' => $session_data['session_key'],         
            'anggotakoperasi_id' => $this->input->post('anggotakoperasi_id'),
            'periode' => $this->input->post('bulan')
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
        $hasil = json_decode($result, true); 

        //print_r($hasil['status']);die(); 

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Pembayaran Iuran Berhasil'); 
            redirect('Iuran/daftarIuran','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Pembayaran Iuran Gagal');
            redirect('Iuran/daftarIuran','refresh');
        }         
    }

    public function showDetail()
    {               
        if( isset( $_POST['id'] ) )
        {
            $session_data   = $this->session->userdata('logged_in');
            $id = $_POST['id'];

            $url = URL_APIS.'getiuranwajibdetail';
            $ch = curl_init($url);

            $jsonData = array(           
                'session_key' => $session_data['session_key'],
                'id_unik' => $id
            );
            //echo "<pre>";print_r($jsonData);die();
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

            //echo "<pre>";print_r($hasil);die();            
            echo "<input type='hidden' id='anggotakoperasi_id' name='anggotakoperasi_id' value=".$hasil['data'][0]['anggotakoperasi_id'].">";
            echo "<div class='row'>               
                    
                  <label class='control-label col-sm-3' for='nama'>Nama Anggota : </label>
                  <div class='col-sm-3 '>
                    <h4>".$hasil['data'][0]['namaanggotakoperasi']."</h4>
                  </div>
                  </div>";

            echo "<div class='row'>                  
              
                  <label class='control-label col-sm-3' for='nama'>Jumlah Tagihan : </label>
                  <div class='col-sm-3 '>
                    <h4>".$hasil['data'][0]['tagihan']."</h4>
                  </div>
                  </div>";

            echo "<div class='row'>                  
              
                <label class='control-label col-sm-3' for='nama'>Tagihan : </label>
                <div class='col-sm-5 '>";
                foreach ($hasil['data'][0]['dafbul'] as $row) {
                    echo "<input type='checkbox' class='coupon_question' rel=".$hasil['data'][0]['simpananwajibbulanan']." name='bulan[]' onchange='valueChanged()' value=".$row['angka'].">".$row['nama']."</br>";                
                } 
            echo "</div>
                  </div>";
      
        }
        else{
            echo "hahahahhahahaha";die();
        }
        
        //echo json_encode($myLocation);
    }
	
	public function daftarIuran()
	{
		$session_data   = $this->session->userdata('logged_in');        
        $url = URL_APIS.'getiuranwajib';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'koperasi_id' => $session_data['data']['koperasi_id']

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
        $data['result']     = json_decode($result, true);        //print_r($data['result']);die();
       
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/iuran/viewDaftarIuran.php',$data);
        $this->load->view('footer_admin.php');
	}
}?>