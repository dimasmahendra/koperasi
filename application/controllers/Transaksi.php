<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
	}

	public function index()
    {       
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'inserttransaksi';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key' => $session_data['session_key']           
        );    
        /*print_r($jsonData);die();*/

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil    = json_decode($result, true);

        $this->session->set_userdata('idlastinsert',$hasil['data']['idlastinsert']);

        if($hasil['status'] == '1')
        {
            redirect('Transaksi/daftarTransaksi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Transaksi Gagal');
            redirect('Transaksi/daftarTransaksi','refresh');            
        }        
	}    

    public function daftarTransaksi()
    {
        $idlastinsert   = $this->session->userdata('idlastinsert');          
        $session_data = $this->session->userdata('logged_in');

        $url = URL_API.'getmydetailtemp';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key' => $session_data['session_key'],
            'transaksi_id' => $idlastinsert
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
        $data['hasil']    = json_decode($result, true);
        $data['kategori'] = $this->Username_model->modelProdukKategori();

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/transaksi/viewTransaksi.php',$data);
        $this->load->view('footer_admin.php');   
    }

    public function produkKategori($id_kat)
    {
        $session_data = $this->session->userdata('logged_in');
        $idlastinsert = $this->session->userdata('idlastinsert');
        /*print_r($id_kat);die();*/
        $url = URL_API.'getprodukwhere';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key' => $session_data['session_key'],
            'kategori_id' => $id_kat            
        );

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil  = json_decode($result, true);       
       
        $dataProduk = "<option value=''>- Select Produk -</option>";
        foreach ($hasil['data'] as $value) {
                /*echo $value['id'];*/
                $dataProduk .= "<option value='".$value['id']."'>".$value['nama']."</option>";
            }
        echo $dataProduk;           
    }

    public function satuanKategori($id_prod)
    {
        $session_data = $this->session->userdata('logged_in');
        $idlastinsert = $this->session->userdata('idlastinsert');
        // print_r($id_kat);die();
        $url = URL_API.'getprodukdetail';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key' => $session_data['session_key'],
            'produk_id' => $id_prod          
        );

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil  = json_decode($result, true);

        $dataSatuan = $hasil['data']['satuan'];     
        
        echo $dataSatuan;                  
    }

    public function hargajualKategori($id_prod)
    {
        $session_data = $this->session->userdata('logged_in');
        $idlastinsert = $this->session->userdata('idlastinsert');
        // print_r($id_kat);die();
        $url = URL_API.'getprodukdetail';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key' => $session_data['session_key'],
            'produk_id' => $id_prod            
        );

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil  = json_decode($result, true);
       
        $dataHarga = $hasil['data']['hargajual'];
        
        echo $dataHarga;           
    }

    public function insertTransaksiTemp()
    {
        $session_data   = $this->session->userdata('logged_in');
        $idlastinsert   = $this->session->userdata('idlastinsert');

        $url = URL_API.'insertdetailtemp';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'transaksi_id' => $idlastinsert,
            'produk_id'    => $this->input->post('prod'),
            'kuantitas'    => $this->input->post('kuantitas')
        );

        /*print_r($jsonData);die();*/

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $hasil    = json_decode($result, true);
    
        if ($hasil['status'] == '1') 
        {    
            redirect('Transaksi/daftarTransaksi','refresh');
        }
        else
        {
            $this->session->set_flashdata('stokhabis', 'Stok Produk Habis');
            redirect('Transaksi/daftarTransaksi','refresh');
        }
    }

    public function ubahTransaksi()
    {
        $idlastinsert   = $this->session->userdata('idlastinsert');
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editdetailtemp';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],            
            'transaksidetail_id' => $id
        );
        /*print_r($jsonData);die();*/
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $result     = json_decode($result, true);           
        
        $data['kuantitas'] = $result['data']['kuantitas'];
        $data['kategori'] = $this->Username_model->modelProdukKategori();
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/transaksi/viewEditTransaksi.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updateTransaksi()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updatedetailtemp';
        $ch = curl_init($url);     
      
        $jsonData = array(      
            'transaksidetail_id'=> $this->input->post('transaksidetail_id'),
            'session_key' => $session_data['session_key'],            
            'produk_id'    => $this->input->post('prod'),
            'kuantitas'    => $this->input->post('kuantitas')
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
        $hasil    = json_decode($result, true);
        //print_r($hasil['status']);die();
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('pesan', 'Data Sudah di update');
            redirect('Transaksi/daftarTransaksi','refresh');
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data Gagal di update');
            redirect('Transaksi/daftarTransaksi','refresh');             
        } 
    }
    public function hapusTransaksi()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletedetailtemp';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'session_key' => $session_data['session_key'],            
            'transaksidetail_id' => $id                       
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
        $hasil    = json_decode($result, true);

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data is gone');
            redirect('Transaksi/daftarTransaksi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data still here');
            redirect('Transaksi/daftarTransaksi','refresh');            
        } 
    }

    public function bayarTransaksi()
    {
        $idlastinsert   = $this->session->userdata('idlastinsert');
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'checkout';
        $ch = curl_init($url);         
      
        $jsonData = array(      
            'session_key' => $session_data['session_key'],            
            'transaksi_id' => $idlastinsert                       
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
        $hasil    = json_decode($result, true);
             
        if($hasil['status'] == '1')
        {
            redirect('Transaksi/metodeTransIndex','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Transaksi Gagal');
            redirect('Transaksi/daftarTransaksi','refresh');            
        } 
    }

    public function metodeTransIndex()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/transaksi/viewMetodeTransaksi.php');
        $this->load->view('footer_admin.php'); 
    }

    public function metodeTransaksi()
    {
        $idlastinsert   = $this->session->userdata('idlastinsert');
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'pembayaran';
        $ch = curl_init($url);         
      
        $jsonData = array(      
            'session_key'  => $session_data['session_key'],            
            'transaksi_id' => $idlastinsert,
            'refnumberssp' => $this->input->post('refnumberssp')                    
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
        $hasil    = json_decode($result, true);        
             
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Transaksi Berhasil');
            redirect('Dashboard/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Transaksi Gagal');
            redirect('Dashboard/index','refresh');           
        } 
    }

    public function cancelTransaksi()
    {
        $idlastinsert   = $this->session->userdata('idlastinsert');
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'canceltrans';
        $ch = curl_init($url);         
      
        $jsonData = array(      
            'session_key' => $session_data['session_key'],            
            'transaksi_id' => $idlastinsert                      
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
        $hasil    = json_decode($result, true);        
        
        if($hasil['status'] == '1')
        {
            redirect('Dashboard/index','refresh');
        }
        else
        {
            redirect('Dashboard/index','refresh');          
        } 
    }
}
?>