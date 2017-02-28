<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananBerjangka extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model','SimpananBerjangka_model'));
        $this->load->helper(array('form','file','url','html'));
	}

    public function index() {

        $data['anggota']      = $this->Username_model->modelAnggota();
        $data['jangkaWaktu']  = $this->Username_model->modelJangkaWaktu();
        $data['cekSimpananBerjangka']  = $this->SimpananBerjangka_model->cekSimpananBerjangka();
    
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpananBerjangka/viewTambahSimpananBerjangka.php',$data);
        $this->load->view('footer_admin.php');       
    }

    public function getSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');
        $url          = URL_APIS.'editsimpananberjangka';
        $ch           = curl_init($url);  
        $id           = $this->uri->segment(3);    
      
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
        $data['session_key']        = $result['session_key'];
        $data['id']                 = $result['data']['id'];       
        $data['koperasi_id']        = $result['data']['koperasi_id'];       
        $data['anggotakoperasi_id'] = $result['data']['anggotakoperasi_id'];       
        $data['metode']             = $result['data']['metode_id'];
        $data['bunga']              = $result['data']['persenbunga'];
        $data['tenor']              = $result['data']['setingsimka']['tenor'];
        
        echo json_encode($data);
    }

	public function daftarSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');
        $url          = URL_APIS.'getsimpananberjangka';
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
        $data['result']       = json_decode($result, true);

        $data['jangkaWaktu']  = $this->Username_model->modelJangkaWaktu();

        $data['metode']       = $this->Username_model->modelMetode();
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpananBerjangka/viewDaftarSimpananBerjangka.php',$data);
        $this->load->view('footer_admin.php');
              
	}

    public function LakukanSimpanan() {

        $session_data = $this->session->userdata('logged_in');
       
        $url = URL_APIS.'insertsimpananberjangka';
        $ch = curl_init($url);
   
        $jsonData = array('session_key'        => $session_data['session_key'],
                          'koperasi_id'        => $session_data['data']['koperasi_id'],
                          'norekening'         => $this->input->post('norek'),
                          'anggotakoperasi_id' => $this->input->post('nama'),
                          'penyetor'           => $this->input->post('penyetor'),
                          'simpanan'           => $this->input->post('simpanan'),
                          'sumberdana'         => $this->input->post('sumberdana'),
                          'tenor'              => $this->input->post('tenor'),
                          'bunga'              => $this->input->post('persenbunga'));        
        //print_r($jsonData);die();
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil  = json_decode($result, true);

        //print_r($hasil);die();        
        
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('SimpananBerjangka/daftarSimpananBerjangka','refresh'); 
        }
        elseif (($hasil['status'] == '0') && ($hasil['message'] == 'Jumlah simpanan kurang')) 
        {
            $this->session->set_flashdata('warning', 'Jumlah simpanan kurang');
            redirect('SimpananBerjangka/daftarSimpananBerjangka','refresh'); 
        }
        elseif (($hasil['status'] == '0') && ($hasil['message'] == 'Rekening sudah digunakan')) 
        {
            $this->session->set_flashdata('warning', 'Rekening sudah digunakan');
            redirect('SimpananBerjangka/daftarSimpananBerjangka','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Gagal Lakukan Simpanan');
            redirect('SimpananBerjangka/daftarSimpananBerjangka','refresh');             
        } 

    }	

    public function tambahPengaturanSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');
        $url          = URL_APIS.'insertsetingsimka';
        $ch           = curl_init($url);
   
        $jsonData = array('session_key' => $session_data['session_key'],
                          'koperasi_id' => $session_data['data']['koperasi_id'],
                          'tenor'       => $this->input->post('tenor'),
                          'bunga'       => $this->input->post('bunga'));   
       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil  = json_decode($result, true);        
        
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh');             
        } 
    }

    public function updatePengaturanSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');        
        $url          = URL_APIS.'updatesetingsimka';
        $ch           = curl_init($url);   
      
        $jsonData = array('session_key' => $session_data['session_key'],
                          'id'          => $this->input->post('id'),
                          'bunga'       => $this->input->post('bunga'),
                          'tenor'       => $this->input->post('tenor'));

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);      
        $hasil  = json_decode($result, true);

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di update');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh');             
        } 
    }

    public function hapusPengaturanSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');        
        $url          = URL_APIS.'deletesetingsimka';
        $ch           = curl_init($url);
        $id           = $this->uri->segment(3);  
      
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
        $hasil  = json_decode($result, true);

        if($hasil['status'] == '1' && $hasil['data']['0']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Pengaturan Simpanan Berjangka Berhasil di hapus');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh'); 
        }
        elseif ($hasil['status'] == '1' && $hasil['data']['0']['status'] == '0') {
            $this->session->set_flashdata('warning', 'Pengaturan Simpanan Berjangka tidak dapat di hapus karena, pengaturan di gunakan oleh anggota koperasi');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Pengaturan Simpanan Berjangka Gagal di hapus');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh');             
        }
    }

    public function daftarPengaturanSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');
        $url          = URL_APIS.'getsetingsimka';
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
        $data['result']        = json_decode($result, true);

        $dataSidebar['notif']  = $this->Sidebar_model->modelNotif();
        $data['minimalSimpan'] = $this->Username_model->modelMinimalSimpan();
        $data['simpanan']      = $this->Username_model->modelSimpanBerjangka();
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpananBerjangka/viewDaftarPengaturanSimpananBerjangka.php',$data);
        $this->load->view('footer_admin.php');  
    }

    public function getPengaturanSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');
        $url          = URL_APIS.'editsetingsimka';
        $ch           = curl_init($url);  
        $id           = $this->uri->segment(3);    
      
        $jsonData = array('session_key' => $session_data['session_key'],
                          'id' => $id);

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
       
        $data['id']    = $result['data']['id'];
        $data['bunga'] = $result['data']['bunga'];
        $data['tenor'] = $result['data']['tenor'];
        echo json_encode($data);
    }

    public function getMinimalSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');
        $url          = URL_APIS.'editminimalsimpanan';
        $ch           = curl_init($url);  
        $id           = $this->uri->segment(3);    
      
        $jsonData = array('session_key' => $session_data['session_key'],
                          'id'          => $id);

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
      
        $data['id']     = $result['data']['0']['id'];
        $data['jumlah'] = $result['data']['0']['jumlah'];
        echo json_encode($data);
    }

    public function updateMinimalSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');        
        $url          = URL_APIS.'updateminimalsimpanan';
        $ch           = curl_init($url);    
      
        $jsonData = array('session_key' => $session_data['session_key'],
                          'id'          => $this->input->post('id'),
                          'jumlah'      => $this->input->post('jumlah'));

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $hasil  = json_decode($result, true);

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di update');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh');             
        } 
    }

    public function getBiayaAdministrasi() {

        $session_data = $this->session->userdata('logged_in');
        $url          = URL_APIS.'getminimalsimpanan';
        $ch           = curl_init($url);  
        $id           = $this->uri->segment(3);    
      
        $jsonData = array('session_key' => $session_data['session_key'],
                          'id'          => $id);

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
      
        $data['id']           = $result['data']['0']['id'];
        $data['administrasi'] = $result['data']['0']['administrasi'];
        echo json_encode($data);
    }

    public function updateBiayaAdminstrasi() {

        $session_data = $this->session->userdata('logged_in');        
        $url = URL_APIS.'updateminimalsimpanan';
        $ch = curl_init($url);    
      
        $jsonData = array('session_key'  => $session_data['session_key'],
                          'id'           => $this->input->post('id'),
                          'administrasi' => $this->input->post('administrasi'));
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $hasil  = json_decode($result, true);

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di update');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('SimpananBerjangka/daftarPengaturanSimpananBerjangka','refresh');             
        } 
    }

    public function ambilSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');        
        $url          = URL_APIS.'ambilsimka';
        $ch           = curl_init($url);    
      
        $jsonData = array('session_key' => $session_data['session_key'],
                          'simka_id'    => $this->input->post('id'),
                          'penerima'    => $this->input->post('penerima'),
                          'token'       => $this->input->post('token'),
                          'metode_id'   => $this->input->post('metode_id'),
                          'penerima'    => $this->input->post('penerima'));
        
                
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $hasil  = json_decode($result, true);

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Proses Pengambilan berhasil');
            redirect('SimpananBerjangka/daftarSimpananBerjangka','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Proses Pengambilan gagal');
            redirect('SimpananBerjangka/daftarSimpananBerjangka','refresh');             
        } 
    }

    public function perpanjangSimpananBerjangka() {

        $session_data = $this->session->userdata('logged_in');        
        $url = URL_APIS.'perpanjangsimka';
        $ch = curl_init($url);    
      
        $jsonData = array('session_key'        => $session_data['session_key'],
                          'simka_id'           => $this->input->post('id'),
                          'koperasi_id'        => $this->input->post('koperasi_id'),
                          'anggotakoperasi_id' => $this->input->post('anggotakoperasi_id'),
                          'tenor'              => $this->input->post('tenor'),
                          'bunga'              => $this->input->post('bunga'),
                          'token'              => $this->input->post('token'));
       
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $hasil  = json_decode($result, true);

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Proses Perpanjangan berhasil');
            redirect('SimpananBerjangka/daftarSimpananBerjangka','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Proses Perpanjangan berhasil');
            redirect('SimpananBerjangka/daftarSimpananBerjangka','refresh');             
        } 
    }

    public function getMutasiBerjangka() 
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
        $this->load->view('admin/tabungan/viewDaftarLihatMutasi.php',$data);
        $this->load->view('footer_admin.php');
    }
    
}?>