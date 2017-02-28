<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Username_model','Sidebar_model'));   
         $this->load->helper(array('form','file','url'));   
    }

    public function index()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $data['hasil'] = $this->Username_model->modelSupplier();
        $data['kategori'] = $this->Username_model->modelKategori();
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/produk/viewTambahProduk.php',$data);
        $this->load->view('footer_admin.php');       
    }     

    public function tambahProduk()
    {

        $cek = $_FILES['foto']['tmp_name'];    

        if ($cek =="")
        {
            $foto = "";
        }
        else if ($cek != '') 
        {
            $foto = new CurlFile($_FILES['foto']['tmp_name'], $_FILES['foto']['type'], $_FILES['foto']['name']);
        }


        $session_data   = $this->session->userdata('logged_in');
         $header = array('Content-Type: multipart/form-data','Content-Type: application/json');
        $url = URL_API.'insertproduk';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],            
            'suplier_id'  => $this->input->post('suplier'),
            'kategori_id'  => $this->input->post('kategori'),
            'nama'        => $this->input->post('nama'),
            'satuan'      => $this->input->post('satuan'),        
            'hargajual'   => $this->input->post('hargajual'),
            'foto'        => $foto             
        );

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);        
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);       
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil= json_decode($result, true);                  

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('Produk/daftarProduk','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('Produk/daftarProduk','refresh');            
        } 
    }

    public function daftarProduk()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getproduk';
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
        $data['result']     = json_decode($result, true);
        //print_r($data['result']);die();

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/produk/viewDaftarProduk.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function ubahProduk ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editproduk';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'produk_id' => $id
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
        $result     = json_decode($result, true);

        $data['suplier_id'] = $result['data']['suplier_id'];
        $data['nama'] = $result['data']['nama'];
        $data['satuan'] = $result['data']['satuan'];     
        $data['hargajual'] = $result['data']['hargajual'];  
        $data['foto']       = $result['data']['foto'];            
          
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/produk/viewEditProduk.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updateProduk()
    {

        $cek = $_FILES['foto']['tmp_name'];    

        if ($cek =="")
        {
            $foto = "";
        }
        else if ($cek != '') 
        {
            $foto = new CurlFile($_FILES['foto']['tmp_name'], $_FILES['foto']['type'], $_FILES['foto']['name']);
        }

        $session_data   = $this->session->userdata('logged_in'); 
         $header = array('Content-Type: multipart/form-data','Content-Type: application/json');       
        $url = URL_API.'updateproduk';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key' => $session_data['session_key'],
            'produk_id'   => $this->input->post('produk_id'),                 
            'suplier_id'  => $this->input->post('suplier_id'),
            'nama'        => $this->input->post('nama'),
            'satuan'      => $this->input->post('satuan'), 
            'foto'       => $foto,             
            'hargajual'   => $this->input->post('hargajual')
                      
        );
        //die(print_r($jsonData));
        
         curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);        
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);       
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil= json_decode($result, true);           

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('Produk/daftarProduk','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Produk/daftarProduk','refresh');
        }  
    }

    public function hapusProduk()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deleteproduk';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'produk_id' => $id
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus'); 
            redirect('Produk/daftarProduk','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('Produk/daftarProduk','refresh');
        }  
    }
}
?>