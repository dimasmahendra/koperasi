<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananNasabah extends MY_Controller {

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
        $data['simpananbmt'] = $this->GetAnggotaKoperasi_model->getProdukSimpananBMT();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpananBMT/viewTambahNasabah', $data);
        $this->load->view('footer_admin.php');    
	}

    public function daftarNasabah()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'gettabungansyariah';
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
        $this->load->view('admin/simpananBMT/viewDaftarNasabah.php', $data);
        $this->load->view('footer_admin.php');       
    }

    public function ambilSimpananSyariah()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'ambiltabungansyariah';
        $ch = curl_init($url);

        $val = $this->input->post('jumlah');
        $val = substr($val,3);
        //print_r($val);die();
        $num = floatval(str_replace(".","",$val));

        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'tabungan_id'   => $this->input->post('id'),
            'penerima'      => $this->input->post('penerima'),
            'nobukti'       => $this->input->post('nobukti'),
            'token'         => $this->input->post('token'),
            'refnumberssp'  => $this->input->post('refNumberSSP'),
            'jumlah'        => $num,
            'metode'        => $this->input->post('metode')
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
            $this->session->set_flashdata('message', 'Data Berhasil');
            redirect('SimpananNasabah/daftarNasabah','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal');
            redirect('SimpananNasabah/daftarNasabah','refresh');
        }
    }

    public function insertSimpananBMT()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'inserttabungansyariah';
        $ch = curl_init($url);

        $val = $this->input->post('setoran');
        $val = substr($val,3);
        //print_r($val);die();
        $num = floatval(str_replace(".","",$val));

        $jsonData = array(
            'session_key'           => $session_data['session_key'],
            'anggotakoperasi_id'    => $this->input->post('namaid'),
            'tabunganproduk_id'     => $this->input->post('produk_id'),
            'rekening'              => $this->input->post('rekening'),
            'setoran'               => $num,
            'bonus'                 => $this->input->post('bonus'),
            'diambilpada'           => $this->input->post('tglambil'),
            'nobukti'               => $this->input->post('nobukti'),
            'sumberdana'            => $this->input->post('sumberdana'),
            'refnumberssp'          => $this->input->post('refnumberssp'),
            'penyetor'              => $this->input->post('penyetor'),
            'key'                   => $this->input->post('persen'),
            'metode'                => $this->input->post('metode')
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
            redirect('SimpananNasabah/daftarNasabah','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah. '.$hasil['message'].'!');
            redirect('SimpananNasabah/daftarNasabah','refresh');
        }
    }

    public function hapusNasabah()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'deletetabungansyariah';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'id'            => $id
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
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus');
            redirect('SimpananNasabah/daftarNasabah','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Tidak Dapat di Hapus');
            redirect('SimpananNasabah/daftarNasabah','refresh');
        }
    }

    public function daftarLihatMutasiSimpanan()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'getmutasi';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);

        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'tab_id'        => $id
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
        $data['id']=$id;
        
        //print_r($data['result']);die();
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpananBMT/viewMutasiSimpananSyariah.php', $data);
        $this->load->view('footer_admin.php');       
    }

    public function setorSimpananBMT()
    {   
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'inserttabungansyariah';
        $ch = curl_init($url);
        $id = $this->input->post('tab_id');

        $val = $this->input->post('setoran');
        $val = substr($val,3);
        //print_r($val);die();
        $num = floatval(str_replace(".","",$val));

        $jsonData = array(
            'session_key'           => $session_data['session_key'],
            'tabunganproduk_id'     => $this->input->post('tabunganproduk_id'),
            'anggotakoperasi_id'    => $this->input->post('anggotakoperasi_id'),
            'rekening'              => $this->input->post('rekening'),
            'setoran'               => $num,
            'bonus'                 => $this->input->post('bonus'),
            'diambilpada'           => $this->input->post('tglambil'),
            'nobukti'               => $this->input->post('nobukti'),
            'sumberdana'            => $this->input->post('sumberdana'),
            'refnumberssp'          => $this->input->post('refNumberSSP'),
            'penyetor'              => $this->input->post('penyetor'),
            'key'                   => $this->input->post('persen'),
            'metode'                => $this->input->post('metode')
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
        $hasil     = json_decode($result, true);

        if ($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Berhasil di tambahkan');
            redirect('SimpananNasabah/daftarLihatMutasiSimpanan/'.$id,'refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah. '.$hasil['message'].'!');
            redirect('SimpananNasabah/daftarLihatMutasiSimpanan/'.$id,'refresh');
        }       
    }
}
?>