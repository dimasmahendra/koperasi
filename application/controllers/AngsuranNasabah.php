<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AngsuranNasabah extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->model(array('GetAnggotaKoperasi_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
    }
	
	public function index() 
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();   
        $data['pembiayaan'] = $this->GetAnggotaKoperasi_model->getPembiayaanSyariah();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/pembiayaansyariah/nasabah/viewTambahNasabah', $data);
        $this->load->view('footer_admin.php');    
	}

    public function daftarNasabah()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'getpembiayaansyariah';
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
        $this->load->view('admin/pembiayaansyariah/nasabah/viewDaftarNasabah.php', $data);
        $this->load->view('footer_admin.php');       
    }

    public function lihatDetail()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'getpembiayaansyariahby';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'id'          => $id
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

        $data['user']    = json_decode($result, true); 
        $data['tanggal'] = date('Y-m-d');
        //print_r($data['user']);die(); 
        $data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();
        $data['pembiayaan'] = $this->GetAnggotaKoperasi_model->getPembiayaanSyariah();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/pembiayaansyariah/nasabah/viewLihatDetail.php', $data);
        $this->load->view('footer_admin.php');
    }

    public function insertPembiayaanSyariah()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'insertpembiayaansyariah';
        $ch = curl_init($url);
        
        if (empty($this->input->post('namaid'))) {
            $this->session->set_flashdata('error', 'Hanya Anggota Koperasi yang sudah terdaftar yang dapat menggunakan Peminjaman Syariah');
            redirect('AngsuranNasabah/daftarNasabah','refresh');
        }
        $val = $this->input->post('jumlahpinjam');
        $val = substr($val,3);
        //print_r($val);die();
        $num = floatval(str_replace(".","",$val));

        $jsonData = array(
            'session_key'           => $session_data['session_key'],
            'anggotakoperasi_id'    => $this->input->post('namaid'),
            'pembiayaan_id'         => $this->input->post('produk_id'),
            'rekening'              => $this->input->post('rekening'),
            'nobukti'               => $this->input->post('nobukti'),
            'jumlahpinjam'          => $num,
            'bonus'                 => $this->input->post('bonus'),
            'tenor'                 => $this->input->post('tenor'),
            'keteranganlain'        => $this->input->post('keterangan'),
            'key'                   => $this->input->post('persen')
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
        $hasil    = json_decode($result, true);     
        //print_r($hasil);die();
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di tambahkan'); 
            redirect('AngsuranNasabah/daftarNasabah','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah. '.$hasil['message'].'!');
            redirect('AngsuranNasabah/daftarNasabah','refresh');
        }  
    }

    public function updatePembiayaanSyariah()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'updatepembiayaansyariah';
        $ch = curl_init($url);
        $id = $this->input->post('id');
        
        $jsonData = array(
            'session_key'           => $session_data['session_key'],
            'id'                    => $id,
            'anggotakoperasi_id'    => $this->input->post('namaid'),
            'pembiayaan_id'         => $this->input->post('produk_id'),
            'rekening'              => $this->input->post('rekening'),
            'nobukti'               => $this->input->post('nobukti'),
            'jumlahpinjam'          => $this->input->post('jumlahpinjam'),
            'bonus'                 => $this->input->post('bonus'),
            'tenor'                 => $this->input->post('tenor'),
            'keteranganlain'        => $this->input->post('keterangan'),
            'key'                   => $this->input->post('persen')
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
        $hasil    = json_decode($result, true);     
        //print_r($hasil);die();
        if (($hasil['status'] == '0') && ($hasil['message'] == 'Ubah Gagal'))
        {    
            $this->session->set_flashdata('error', 'Data Tidak dapat di rubah karena sudah memiliki angsuran'); 
            redirect('AngsuranNasabah/lihatDetail/'.$id,'refresh');
        }
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Ubah'); 
            redirect('AngsuranNasabah/lihatDetail/'.$id,'refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Ubah');
            redirect('AngsuranNasabah/lihatDetail/'.$id,'refresh');
        }  
    }

    public function insertPembiayaanSyariahDetail()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'insertpembiayaansyariahdetail';
        $ch = curl_init($url);
        $id = $this->input->post('idbayar');
        
        $jsonData = array(
            'session_key'          => $session_data['session_key'],
            'pembiayaansyariah_id' => $id,
            'tanggalbayar'         => $this->input->post('tanggalbayar'),
            'nobukti'              => $this->input->post('nobuktibayar'),
            'metode'               => 'Cash',
            'angsuran'             => $this->input->post('jumlahbayar')
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
        $hasil    = json_decode($result, true);     
        //print_r($hasil);die();
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Proses Pembayaran angsuran berhasil'); 
            redirect('AngsuranNasabah/lihatDetail/'.$id,'refresh');
        }
        else if (($hasil['status'] == '0') && ($hasil['message'] == 'Sisa Tenor Habis')) 
        {    
            $this->session->set_flashdata('error', 'Mohon untuk melunasi angsuran karena sisa tenor sudah habis'); 
            redirect('AngsuranNasabah/lihatDetail/'.$id,'refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Proses Pembayaran Gagal');
            redirect('AngsuranNasabah/lihatDetail/'.$id,'refresh');
        }  
    }

    public function hapusPembiayaan()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API7.'deletepembiayaansyariah';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
      
        $jsonData = array(      
            'id'          => $id,
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
        $hasil    = json_decode($result, true);
        //print_r($hasil);die();
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus'); 
            redirect('AngsuranNasabah/daftarNasabah','refresh');
        }
        else if (($hasil['status'] == '0') && ($hasil['message'] == 'Hapus Gagal'))
        {    
            $this->session->set_flashdata('error', 'Data gagal di hapus karena masih memiliki sisa tenor'); 
            redirect('AngsuranNasabah/daftarNasabah','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('AngsuranNasabah/daftarNasabah','refresh');
        }  
    }
}
?>