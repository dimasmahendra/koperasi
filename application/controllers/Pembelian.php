<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends MY_Controller {

    function __construct()
    {
        parent::__construct();       
        $this->load->model(array('Username_model','Sidebar_model'));    
        $this->load->helper(array('form','file','url','html'));   
    }

    public function index()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $session_data   = $this->session->userdata('logged_in');

        $url = URL_APIS.'insertpembeliantemp';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'       => $session_data['session_key'],            
            'tanggal'           => $this->input->post('tanggal')                  
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
        $hasil = json_decode($result, true);  
        //print_r($hasil);die();
                 
        if($hasil['status'] == '1')
        {
            $this->session->set_userdata('pembelian',$hasil['data']);
            redirect('Pembelian/tambahDetilPembelian','refresh');
        }
        else if (($hasil['status'] == '0') && (($hasil['message'] == 'Tahun operasi kosong'))) 
        {
            $this->session->set_flashdata('warning', 'Tahun Operasi Harus di Aktifkan Dahulu');
            redirect('Pembelian/daftarPembelian','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Pembelian Koperasi Gagal di tambahkan');
            redirect('Pembelian/daftarPembelian','refresh');            
        }       
    }     

    public function tambahDetilPembelian()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $data['kategori'] = $this->Username_model->modelProdukKategori(); 

        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'getpembeliandetailtemp';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key']
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
        $data['result']     = json_decode($result, true);
        
        if($data['result']['status'] == '0')
        {
            $this->session->set_flashdata('error', 'Pembelian Koperasi Gagal di tambahkan');
            redirect('Pembelian/daftarPembelian','refresh'); 
        }
        else
        {
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/pembelian/viewTambahDetilPembelian.php',$data);
            $this->load->view('footer_admin.php');
        }        
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
        
    public function insertDetilPembelian()
    {
        $session_data = $this->session->userdata('logged_in');
        $pembelian = $this->session->userdata('pembelian');
        $id = $pembelian['id'];
        $tanggal = $pembelian['tanggal'];
        //print_r($pembelian);die();
        $url = URL_APIS.'insertpembeliandetailtemp';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'       => $session_data['session_key'],
            'pembelian_id'      => $id,           
            'tanggal'           => $tanggal,
            'produk_id'         => $this->input->post('prod'),
            'hargabeli'         => $this->input->post('hargabeli'),
            'kuantitas'         => $this->input->post('kuantitas'),
            'subtotalhargabeli' => $this->input->post('subtotalhargabeli')             
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
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan'); 
            redirect('Pembelian/tambahDetilPembelian','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('Pembelian/tambahDetilPembelian','refresh');           
        }             
    }

    public function insertPembelian()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $pembelian = $this->session->userdata('pembelian');
        $id = $pembelian['id']; 
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'insertpembelian';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'pembelian_id'      => $id
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

        //print_r($hasil);die();
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan'); 
            redirect('Pembelian/daftarPembelian','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('Pembelian/daftarPembelian','refresh');           
        }       
        
    }

    public function daftarPembelian()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getpembelian';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
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

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/pembelian/viewDaftarPembelian.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function daftarDetilPembelian()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getpembeliandetail';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);   
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'pembelian_id'      => $id
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
        $data['result']     = json_decode($result, true); 

        /*echo"<pre>";print_r($data['result']);die();  */    
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/pembelian/viewDaftarDetilPembelian.php',$data);
        $this->load->view('footer_admin.php');
    }   

    public function updateDetilPembelian()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updatepembeliandetail';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'        => $session_data['session_key'],
            'pembeliandetail_id' => $this->input->post('pembeliandetail_id'),                      
            'tanggal'           => $this->input->post('tanggal'),
            'produk_id'         => $this->input->post('produk_id'),
            'hargabeli'         => $this->input->post('hargabeli'),
            'kuantitas'         => $this->input->post('kuantitas'),
            'subtotalhargabeli' => $this->input->post('subtotalhargabeli')             
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
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('Pembelian/daftarDetilPembelian/'.$hasil['data']['pembelian_id'],'refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Pembelian/daftarDetilPembelian','refresh');
        }  
    }

    public function hapusPembelian()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_APIS.'deletepembeliantemp';
        $ch = curl_init($url);
      
        $jsonData = array(           
            'session_key' => $session_data['session_key']
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
        $hasil    = json_decode($result, true); 

        //print_r($hasil);die();

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Anda berhasil keluar dari Pembelian Koperasi'); 
            redirect('Pembelian/daftarPembelian','refresh');
        }
        else
        {
            redirect('Dashboard/index','refresh');
        }  
    }

    public function deletePembelian()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletepembelian';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'pembelian_id' => $id
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
        $hasil    = json_decode($result, true); 

        //print_r($hasil);die();

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Anda berhasil keluar dari Pembelian Koperasi'); 
            redirect('Pembelian/daftarPembelian','refresh');
        }
        else
        {
            redirect('Dashboard/index','refresh');
        }  
    }
}
?>