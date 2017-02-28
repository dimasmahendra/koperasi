<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model','Peminjaman_model','PinjamanMinimal_model'));
        $this->load->helper(array('form','file','url','html'));
	}

    public function index() { 

        $data['anggota']          = $this->Username_model->modelAnggota();
        $data['setingPeminjaman'] = $this->Username_model->modelSetingPeminjaman();
        $data['hasil']            = $this->Username_model->modelAkses();
        $data['peminjaman']       = $this->Peminjaman_model->cekPeminjaman();
        $dataSidebar['notif']     = $this->Sidebar_model->modelNotif();  

     
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/peminjaman/viewTambahPeminjaman.php',$data);
        $this->load->view('footer_admin.php');       
    }

    public function lakukanPeminjaman() {

        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'insertpeminjaman';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'        => $session_data['session_key'],
            'anggotakoperasi_id' => $this->input->post('anggotakoperasi_id'),
            'jumlah'             => $this->input->post('jumlah'),
            'tenor'              => $this->input->post('tenor'),
            'tipebunga_id'       => $this->input->post('tipebunga_id'),
            'bunga_id'           => $this->input->post('bunga_id'),
            'keperluan'          => $this->input->post('keperluan'),
            'token'              => $this->input->post('token')
        );
       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil = json_decode($result, true);        
        
        if($hasil['status'] == '1' && $hasil['data']['0']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Peminjaman Berhasil di lakukan');
            redirect('Peminjaman/daftarPeminjaman','refresh'); 
        }
        elseif ($hasil['status'] == '1' && $hasil['data']['0']['status'] == '0') {
            $this->session->set_flashdata('warning', 'Maaf, data yang dimasukkan telah terdaftar');
            redirect('Peminjaman/daftarPeminjaman','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Anggota Koperasi masih memiliki peminjaman');
            redirect('Peminjaman/daftarPeminjaman','refresh');             
        }
    }

	public function daftarPeminjaman() {

        $session_data = $this->session->userdata('logged_in');
        $url = URL_APIS.'getpeminjaman';
        $ch = curl_init($url);      
      
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
        $data['result'] = json_decode($result, true);               
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/peminjaman/viewDaftarPeminjaman.php',$data);
        $this->load->view('footer_admin.php');       
	}	

    public function daftarPengaturanPeminjaman() {

        $session_data = $this->session->userdata('logged_in');
        $url = URL_APIS.'getsetingpeminjaman';
        $ch = curl_init($url);      
      
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
        $data['result'] = json_decode($result, true);

        $data['tipeBunga']      = $this->Username_model->modelTipeBunga();
        $data['hasil']          = $this->Username_model->modelAkses();
        $data['minimalPinjam']  = $this->PinjamanMinimal_model->getMinimalPeminjaman();
        $dataSidebar['notif']   = $this->Sidebar_model->modelNotif();   

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/peminjaman/viewDaftarPengaturanPeminjaman.php',$data);
        $this->load->view('footer_admin.php'); 
    } 

    public function insertMinimalPeminjaman() 
    {
        $session_data = $this->session->userdata('logged_in');
        $url = URL_APIS.'insertminimalpeminjaman';
        $ch = curl_init($url);      
      
        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'koperasi_id'   => $session_data['data']['koperasi_id'],
            'minimalpinjam' => $this->input->post('minimalpinjam')
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

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Minimal peminjaman berhasil di tambahkan');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Minimal peminjaman gagal di tambahkan');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh');             
        } 
    }

    public function updateMinimalPeminjaman() 
    {
        $minimalPinjam = $this->PinjamanMinimal_model->getMinimalPeminjaman();
        $session_data = $this->session->userdata('logged_in');
        $url = URL_APIS.'updateminimalpeminjaman';
        $ch = curl_init($url);      
      
        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'id'   => $minimalPinjam['data']['id'],
            'minimalpinjam' => $this->input->post('minimalpinjam')
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
        
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Minimal peminjaman berhasil di ubah');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Minimal peminjaman gagal di ubah');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh');             
        } 

    }

    public function tambahPengaturanPeminjaman(){

        $session_data = $this->session->userdata('logged_in');
        $url = URL_APIS.'insertsetingpeminjaman';
        $ch = curl_init($url);      
      
        $jsonData = array('session_key'  => $session_data['session_key'],
                          'koperasi_id'  => $session_data['data']['koperasi_id'],
                          'tipebunga_id' => $this->input->post('tipebunga_id'),
                          'persenbunga'  => $this->input->post('persenbunga'),
                          'denda'        => $this->input->post('denda'));

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil = json_decode($result, true); 

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh');             
        } 
    }

    public function getPengaturanPeminjaman() {

        $session_data = $this->session->userdata('logged_in');
        $url = URL_APIS.'editsetingpeminjaman';
        $ch = curl_init($url);  
        $id = $this->uri->segment(3);    
      
        $jsonData = array('session_key' => $session_data['session_key'],
                          'id'          => $id
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
        $result = json_decode($result, true);
        echo json_encode($result);
    }

    public function updatePengaturanPeminjaman() {

        $session_data = $this->session->userdata('logged_in');        
        $url = URL_APIS.'updatesetingpeminjaman';
        $ch = curl_init($url);   
      
        $jsonData = array('session_key'  => $session_data['session_key'],
                          'koperasi_id'  => $session_data['data']['koperasi_id'],
                          'id'           => $this->input->post('editId'),
                          'tipebunga_id' => $this->input->post('editTipebunga_id'),
                          'persenbunga'  => $this->input->post('editPersenbunga'),
                          'denda'        => $this->input->post('editDenda'));
     
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);      
        $hasil= json_decode($result, true);

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di update');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh');             
        } 
    }

    public function hapusPengaturanPeminjaman() {

        $session_data = $this->session->userdata('logged_in');        
        $url = URL_APIS.'deletesetingpeminjaman';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array('session_key'  => $session_data['session_key'],  
                          'id'           => $id);  
      
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
            
        if($hasil['status'] == '1' && $hasil['data']['0']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Tipe Bunga Peminjaman Berhasil di Hapus');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh'); 
        }
        elseif ($hasil['status'] == '1' && $hasil['data']['0']['status'] == '0') {
            $this->session->set_flashdata('warning', 'Maaf, Tipe Bunga sedang di gunakan');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Tipe Bunga Gagal di Hapus');
            redirect('Peminjaman/daftarPengaturanPeminjaman','refresh');             
        }
    }

    public function pembayaranAngsuran() {

        $session_data = $this->session->userdata('logged_in');        
        $url = URL_APIS.'getpeminjamandetail';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array('session_key'  => $session_data['session_key'],  
                          'id'           => $id); 
       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);       
        $data['result'] = json_decode($result, true);
        
        $data['hasil'] = $this->Username_model->modelAkses();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/peminjaman/viewDaftarPembayaranAngsuran.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function lakukanPembayaran(){

       $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'prosespeminjamandetail';
        $ch = curl_init($url); 
          
        foreach ($_POST['data'] as $data) {

            $ch = curl_init ($url); // your URL to send array data
            curl_setopt ($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Your array field
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec ($ch);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_close($ch);
            $hasil = json_decode($result, true);
            }
        
        if($hasil['status'] == '1' && $hasil['data']['0']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Pembayaran angsuran berhasil !!!');
            redirect('Peminjaman/daftarPeminjaman','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Terjadi Kesalahan !!!');
            redirect('Peminjaman/daftarPeminjaman','refresh');             
        }
    }

    public function laporanPeminjaman()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIS.'gettabungandetail';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3); 
        $idanggota = $this->uri->segment(4);  
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'tabungan_id' => $id,
            'anggotakoperasi_id' => $idanggota
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
        $data['result'] = json_decode($result, true);        
                
        //print_r($data['result']);die();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/laporanPeminjaman/viewLaporanPeminjaman.php',$data);
        $this->load->view('footer_admin.php');       
    }



}
