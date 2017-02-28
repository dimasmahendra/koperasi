<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndikatorKesehatanKoperasiAPEX extends MY_Controller {

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
        $this->load->view('admin/apex/viewInputIndikatorKesehatanKoperasi.php',$data);
        $this->load->view('footer_admin.php');       
    }

	public function daftarIndikatorKesehatanKoperasi() {

        $session_data = $this->session->userdata('logged_in');
        $url   = URL_APIZ.'getscoreindikatorkesehatan';
        $ch    = curl_init($url);

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
        $result = json_decode($result, true);
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/apex/viewIndikatorKesehatanKoperasi.php',$result);
        $this->load->view('footer_admin.php');
    }

    public function pertanyaanIndikatorKesehatanKoperasi() {

        $data['anggota']      = $this->Username_model->modelAnggota();
        $data['jangkaWaktu']  = $this->Username_model->modelJangkaWaktu();
        $data['cekSimpananBerjangka']  = $this->SimpananBerjangka_model->cekSimpananBerjangka();
    
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/apex/viewPertanyaanIndikatorKesehatanKKoperasi.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function insertIndikatorKesehatan() {

        $session_data = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertindikatorkesehatan';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'               => $session_data['session_key'],
            'atmr'                      => floatval(str_replace(".","",substr($this->input->post('atmr'),3))),
            'bank'                      => floatval(str_replace(".","",substr($this->input->post('bank'),3))),
            'bebanoperasi'              => floatval(str_replace(".","",substr($this->input->post('bebanoperasi'),3))),
            'bebanusaha'                => floatval(str_replace(".","",substr($this->input->post('bebanusaha'),3))),
            'bebanperkoperasian'        => floatval(str_replace(".","",substr($this->input->post('bebanperkoperasian'),3))),
            'biayakaryawan'             => floatval(str_replace(".","",substr($this->input->post('biayakaryawan'),3))),
            'cadanganrisiko'            => floatval(str_replace(".","",substr($this->input->post('cadanganrisiko'),3))),
            'kas'                       => floatval(str_replace(".","",substr($this->input->post('kas'),3))),
            'modalsendiri'              => floatval(str_replace(".","",substr($this->input->post('modalsendiri'),3))),
            'modaltertimbang'           => floatval(str_replace(".","",substr($this->input->post('modaltertimbang'),3))),
            'partisipasibruto'          => floatval(str_replace(".","",substr($this->input->post('partisipasibruto'),3))),
            'partisipasinetto'          => floatval(str_replace(".","",substr($this->input->post('partisipasinetto'),3))),
            'pendapatan'                => floatval(str_replace(".","",substr($this->input->post('pendapatan'),3))),
            'pea'                       => floatval(str_replace(".","",substr($this->input->post('pea'),3))),
            'pinjamanbermasalah'        => floatval(str_replace(".","",substr($this->input->post('pinjamanbermasalah'),3))),
            'pinjamanberisiko'          => floatval(str_replace(".","",substr($this->input->post('pinjamanberisiko'),3))),
            'pinjamandiberikan'         => floatval(str_replace(".","",substr($this->input->post('pinjamandiberikan'),3))),
            'pinjamandiberikanberisiko' => floatval(str_replace(".","",substr($this->input->post('pinjamandiberikanberisiko'),3))),
            'shubagiananggota'          => floatval(str_replace(".","",substr($this->input->post('shubagiananggota'),3))),
            'shukotor'                  => floatval(str_replace(".","",substr($this->input->post('shukotor'),3))),
            'shusebelumpajak'           => floatval(str_replace(".","",substr($this->input->post('shusebelumpajak'),3))),
            'simpananpokok'             => floatval(str_replace(".","",substr($this->input->post('simpananpokok'),3))),
            'simpananwajib'             => floatval(str_replace(".","",substr($this->input->post('simpananwajib'),3))),
            'totalaset'                 => floatval(str_replace(".","",substr($this->input->post('totalaset'),3))),
            'volumepinjaman'            => floatval(str_replace(".","",substr($this->input->post('volumepinjaman'),3))),
            'volumepinjamananggota'     => floatval(str_replace(".","",substr($this->input->post('volumepinjamananggota'),3))),
            'kepatuhansyariah'          => floatval(str_replace(".","",substr($this->input->post('kepatuhansyariah'),3))),
            'kewajibanlancar'           => floatval(str_replace(".","",substr($this->input->post('kewajibanlancar'),3))),
            'danaditerima'              => floatval(str_replace(".","",substr($this->input->post('danaditerima'),3))),
            'totalmodalsendiri'         => floatval(str_replace(".","",substr($this->input->post('totalmodalsendiri'),3)))
        );      
        //print_r($jsonData);die();
        $jsonDataEncoded = json_encode($jsonData);
        //print_r($jsonDataEncoded);die();
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
            $this->session->set_flashdata('message', 'Data Berhasil Diinput');
            redirect('IndikatorKesehatanKoperasiAPEX/pertanyaanIndikatorKesehatanKoperasi','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Gagal Lakukan Inputan');
            redirect('IndikatorKesehatanKoperasiAPEX/index','refresh');
        }
    }

    public function insertPertanyaanIndikatorKesehatan() {

        $session_data = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertaspekpertanyaan';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'   => $session_data['session_key']
        );
        $jsonData['data']['manajemenumum'] = array(
            'aspekmanajemen_id' => '1',
            'tanggalbuat'       => date('Y-m-d'),
            'nilai1'            => $this->input->post('radiobtn1'),
            'nilai2'            => $this->input->post('radiobtn2'),
            'nilai3'            => $this->input->post('radiobtn3'),
            'nilai4'            => $this->input->post('radiobtn4'),
            'nilai5'            => $this->input->post('radiobtn5'),
            'nilai6'            => $this->input->post('radiobtn6'),
            'nilai7'            => $this->input->post('radiobtn7'),
            'nilai8'            => $this->input->post('radiobtn8'),
            'nilai9'            => $this->input->post('radiobtn9'),
            'nilai10'           => $this->input->post('radiobtn10'),
            'nilai11'           => $this->input->post('radiobtn11'),
            'nilai12'           => $this->input->post('radiobtn12')
        );
        $jsonData['data']['kelembagaan'] = array( 
            'aspekmanajemen_id' => '2',
            'tanggalbuat'       => date('Y-m-d'),
            'nilai1'            => $this->input->post('radiobtn13'),
            'nilai2'            => $this->input->post('radiobtn14'),
            'nilai3'            => $this->input->post('radiobtn15'),
            'nilai4'            => $this->input->post('radiobtn16'),
            'nilai5'            => $this->input->post('radiobtn17'),
            'nilai6'            => $this->input->post('radiobtn18')
        );
        $jsonData['data']['permodalan'] = array( 
            'aspekmanajemen_id' => '3',
            'tanggalbuat'       => date('Y-m-d'),
            'nilai1'            => $this->input->post('radiobtn19'),
            'nilai2'            => $this->input->post('radiobtn20'),
            'nilai3'            => $this->input->post('radiobtn21'),
            'nilai4'            => $this->input->post('radiobtn22'),
            'nilai5'            => $this->input->post('radiobtn23')
        );
        $jsonData['data']['aktiva'] = array( 
            'aspekmanajemen_id' => '4',
            'tanggalbuat'       => date('Y-m-d'),
            'nilai1'            => $this->input->post('radiobtn24'),
            'nilai2'            => $this->input->post('radiobtn25'),
            'nilai3'            => $this->input->post('radiobtn26'),
            'nilai4'            => $this->input->post('radiobtn27'),
            'nilai5'            => $this->input->post('radiobtn28'),
            'nilai6'            => $this->input->post('radiobtn29'),
            'nilai7'            => $this->input->post('radiobtn30'),
            'nilai8'            => $this->input->post('radiobtn31'),
            'nilai9'            => $this->input->post('radiobtn32'),
            'nilai10'           => $this->input->post('radiobtn33')
        );
        $jsonData['data']['likuiditas'] = array( 
            'aspekmanajemen_id' => '5',
            'tanggalbuat'       => date('Y-m-d'),
            'nilai1'            => $this->input->post('radiobtn34'),
            'nilai2'            => $this->input->post('radiobtn35'),
            'nilai3'            => $this->input->post('radiobtn36'),
            'nilai4'            => $this->input->post('radiobtn37'),
            'nilai5'            => $this->input->post('radiobtn38')
        );

        //print_r($jsonData);die();
        
        $jsonDataEncoded = json_encode($jsonData);

        //print_r($jsonDataEncoded);die();

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
            $url   = URL_APIZ.'getscoreindikatorkesehatan';
            $ch    = curl_init($url);

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
            $result = json_decode($result, true);

            if($result['status'] == '1')
            {
                $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

                $this->load->view('main_admin.php',$dataSidebar);
                $this->load->view('admin/apex/viewIndikatorKesehatanKoperasi.php',$result);
                $this->load->view('footer_admin.php');
            }
            else
            {
                $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
                redirect('IndikatorKesehatanKoperasiAPEX/daftarIndikatorKesehatanKoperasi','refresh');             
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Gagal Lakukan Inputan Data');
            redirect('IndikatorKesehatanKoperasiAPEX/pertanyaanIndikatorKesehatanKoperasi','refresh');             
        } 

    }
}?>