<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukSimpanan extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->library('session');
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
	}

    public function index() {
        $data['anggota'] = $this->Username_model->modelAnggota();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();


        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/produksimpanan/viewTambahProdukSimpanan.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function daftarProdukSimpanan() {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'gettabunganproduk';
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

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        //print_r($data);die();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/produksimpanan/viewProdukSimpanan.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function insertProdukSimpanan() {

        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'inserttabunganproduk';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'namaprogram'   => $this->input->post('namaProgram'),
            'akad'          => $this->input->post('akad'),
            'deskripsi'     => $this->input->post('deskripsi')
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
        $data['result']  = json_decode($result, true);

        //print_r($data);die();

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Produk Simpanan Berhasil di Tambahkan');
            redirect('ProdukSimpanan/daftarProdukSimpanan','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Produk Simpanan Gagal di Tambahkan');
            redirect('ProdukSimpanan/daftarProdukSimpanan','refresh');
        }

    }

    public function updateProdukSimpanan() {

        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'updatetabunganproduk';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key'],
            'id'            => $this->input->post('id'),
            'namaprogram'   => $this->input->post('namaProgram'),
            'akad'          => $this->input->post('akad'),
            'deskripsi'     => $this->input->post('deskripsi')
        );


        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['result']  = json_decode($result, true);

        //print_r($data);die();

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Produk Simpanan Berhasil di Ubah');
            redirect('ProdukSimpanan/daftarProdukSimpanan','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Produk Simpanan Gagal di Ubah');
            redirect('ProdukSimpanan/daftarProdukSimpanan','refresh');
        }

    }

    public function hapusProdukSimpanan()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'deletetabunganproduk';
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
            redirect('ProdukSimpanan/daftarProdukSimpanan','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Tidak Dapat di Hapus');
            redirect('ProdukSimpanan/daftarProdukSimpanan','refresh');
        }
    }

    
    
}?>