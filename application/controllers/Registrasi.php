<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->model(array('Getmykoperasi_model'));
	}
	
    public function index() 
    {
        $this->load->helper('form');       
        $this->load->view('register/registrasiSSP');   
    }   

    public function registrasiNonSSP() 
    {
        $url = file_get_contents(URL_API.'getprovinsi');
        $data['hasil'] = json_decode($url,true);

        $url1 = file_get_contents(URL_API.'getkelompokkop');
        $data['kelompokkoperasi'] = json_decode($url1,true);

        $url2 = file_get_contents(URL_API.'getsektorusaha');
        $data['sektorusaha'] = json_decode($url2,true);

        if ($_SERVER['HTTP_REFERER'] == 'http://192.168.20.110/ci/Registrasi/insertregisterSSP') {
            $data['is_ssp'] = 1;
        }
        elseif ($_SERVER['HTTP_REFERER'] == 'http://192.168.20.110/ci/User/index' || $_SERVER['HTTP_REFERER'] == 'http://192.168.20.110/ci/User' || $_SERVER['HTTP_REFERER'] == 'http://192.168.20.110/ci/') {
            $data['is_ssp'] = 0;
        }
        $this->load->helper('form');
        $this->load->view('register/registrasiNonSSP',$data);
    }

    public function insertregisterSSP() 
    {
        $url = URL_APISSP.'checkusernamemerchant/';
        $curl = curl_init();

        $jsonData = array(            
            'username' => $this->input->post('username')          
        );
        
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8000",
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => http_build_query($jsonData),
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
          ),
        ));
        $response = curl_exec($curl);
        $hasil = json_decode($response, true);        
        if (($hasil['status'] == '1') && ($hasil['message'] == 'Username tersedia'))
        {
            $url1 = URL_APISSP.'insertmerchant/';
            $ch = curl_init($url1);
            $data_to_post = array(
                'email'         => $this->input->post('email'),
                'phonenumber'   => $this->input->post('phonenumber'),
                'name'          => $this->input->post('nama'),
                'person'        => $this->input->post('person'),
                'username'      => $this->input->post('username'),
                'password'      => $this->input->post('password'),
                'tipe'          => 3,
                'referalid'     => 2
            );
            //print_r($data_to_post);die(); 
            curl_setopt_array($ch, array(
            CURLOPT_PORT => "8000",
            CURLOPT_URL => $url1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($data_to_post),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
                ),
            ));
            $response1 = curl_exec($ch);
            $hasilAkhir = json_decode($response1, true);
            if (($hasilAkhir['status'] == '1') && ($hasilAkhir['message'] == 'Success insert merchant')) 
            {    
                redirect('Registrasi/registrasiNonSSP','refresh');
            }         
            elseif ($hasilAkhir['status'] == '0')
            {
                $this->session->set_flashdata('error', $hasilAkhir['message']);     
                redirect('Registrasi/index','refresh');
            }
            else
            {
                $this->session->set_flashdata('error', 'Mohon untuk menghubungi Admin');     
                redirect('Registrasi/index','refresh');
            }

        }  
        else{
            $this->session->set_flashdata('error', 'Username Tidak dapat di pakai');            
            redirect('Registrasi/index','refresh');
        }
    }

    public function insertregisterNonSSP() 
    {
        $url = URL_API.'registrasikoperasi';
        $ch = curl_init($url);
   
        $jsonData = array(
            'nama'                  => $this->input->post('getnamaKoperasi'),
            'tipekoperasi_id'       => $this->input->post('jkop'),
            'skalakoperasi_id'      => $this->input->post('skalakoperasi'),
            'telepon'               => $this->input->post('telepon'),
            'email'                 => $this->input->post('email'),
            'kelurahan_id'          => $this->input->post('lurah'),
            'bentukkoperasi_id'     => $this->input->post('btkkop'),
            'kelompokkoperasi_id'   => $this->input->post('kelKop'),
            'sektorusaha_id'        => $this->input->post('sekUsaha'),
            'jumlahanggota'         => $this->input->post('nAnggota'),
            'is_ssp'                => $this->input->post('is_ssp'),
            'username'              => $this->input->post('username'),
            'password'              => $this->input->post('password')

        );
        print_r($jsonData);die();
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
            redirect('User/index','refresh');
        }
        else{
            $this->session->set_flashdata('error', 'Registrasi Tidak Berhasil');            
            redirect('Registrasi/registrasiNonSSP','refresh');
        }
    }
    public function kabupatenkota($id_prov)
    {
        $url = URL_API.'getkabupatenkota';
        $ch = curl_init($url);

        $jsonData = array(           
            'provinsi_id' => $id_prov
        );

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['hasil']  = json_decode($result, true);
       
        $dataKota = "<option value=''>- Pilih Kabupaten -</option>";
        foreach ($data['hasil']['data'] as $value) {
                /*echo $value['id'];*/
                $dataKota .= "<option value='".$value['id']."'>".$value['nama']."</option>";
            }
        echo $dataKota;           
    }

    public function kecamatan($id_kab)
    {
        $url = URL_API.'getkecamatan';
        $ch = curl_init($url);

        $jsonData = array(           
            'kabupatenkota_id' => $id_kab
        );

        /*echo "<pre>";
        print_r($jsonData);die();
        echo "</pre>";*/

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['hasil']  = json_decode($result, true);
       
        $dataKecamatan = "<option value=''>- Pilih kecamatan -</option>";
        foreach ($data['hasil']['data'] as $value) {
                /*echo $value['id'];*/
                $dataKecamatan .= "<option value='".$value['id']."'>".$value['nama']."</option>";
            }
        echo $dataKecamatan;           
    }

    public function kelurahan($id_kec)
    {
        $url = URL_API.'getkelurahan';
        $ch = curl_init($url);

        $jsonData = array(           
            'kecamatan_id' => $id_kec
        );

        /*echo "<pre>";
        print_r($jsonData);die();
        echo "</pre>";*/

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['hasil']  = json_decode($result, true);
       
        $dataKelurahan = "<option value=''>- Pilih Kelurahan -</option>";
        foreach ($data['hasil']['data'] as $value) {
                /*echo $value['id'];*/
                $dataKelurahan .= "<option value='".$value['id']."'>".$value['nama']."</option>";
            }
        echo $dataKelurahan;           
    }
}
	
