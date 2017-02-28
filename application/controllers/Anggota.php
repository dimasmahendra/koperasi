<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends MY_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
    }
	
	public function index() 
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $url = file_get_contents(URL_API.'getprovinsi');
        $data['hasil'] = json_decode($url,true);    

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/anggota/viewTambahAnggotaKoperasi.php',$data);
        $this->load->view('footer_admin.php'); 
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
       
        $dataKota = "<option value=''>- Select Kabupaten -</option>";
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
       
        $dataKecamatan = "<option value=''>- Select kecamatan -</option>";
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
       
        $dataKelurahan = "<option value=''>- Select Kelurahan -</option>";
        foreach ($data['hasil']['data'] as $value) {
                /*echo $value['id'];*/
                $dataKelurahan .= "<option value='".$value['id']."'>".$value['nama']."</option>";
            }
        echo $dataKelurahan;           
    }

    public function tambahAnggota()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertanggotakoperasi';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'nama'              => $this->input->post('nama'),
            'telepon'           => $this->input->post('telepon'),
            'email'             => $this->input->post('email'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'username'          => $this->input->post('username'),
            'alamat'            => $this->input->post('alamat'),
            'kelurahan_id'      => $this->input->post('lurah'),
            'pendidikan'        => $this->input->post('pendidikan'),
            'status'            => $this->input->post('status'),
            'password'          => $this->input->post('password'),
            'tempatlahir'       => $this->input->post('tempatLahir'),
            'tanggallahir'      => $this->input->post('tanggalLahir'),
            'noktp'             => $this->input->post('noIdentitas'),
            'pekerjaan'         => $this->input->post('pekerjaan'),
            'sektorusaha'       => $this->input->post('sectorUsaha'),
            'tanggalregistrasi' => $this->input->post('tanggalRegistrasi'),
            'tanggaldaring'     => $this->input->post('tanggalDaring')
        );
        
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil     = json_decode($result, true); 

        //print_r($hasil);die();

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('Anggota/viewAnggota','refresh'); 
        }
        else if (($hasil['status'] == '0') && ($hasil['message'] == 'Username sudah ada'))
        {
            $this->session->set_flashdata('error', 'Username sudah terpakai, coba lagi dengan mengganti usernamenya');
            redirect('Anggota/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('Anggota/viewAnggota','refresh');             
        } 
    }

    public function viewAnggota()
    {      
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getanggotakoperasi';
        $ch = curl_init($url);    
        
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
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/anggota/viewAnggotaKoperasi.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function getAnggota()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getanggotakoperasidetail';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);        
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'anggotakoperasi_id' => $id
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

        $data['foto']               = $result['data']['foto'];
        $data['noktp']              = $result['data']['noktp'];
        $data['nama']               = $result['data']['nama'];
        $data['tempatlahir']        = $result['data']['tempatlahir'];
        $data['tanggallahir']       = $result['data']['tanggallahir'];
        $data['telepon']            = $result['data']['telepon'];
        $data['email']              = $result['data']['email'];
        $data['jenis_kelamin']      = $result['data']['jeniskelamin'];
        $data['alamat']             = $result['data']['alamat'];
        $data['pendidikan']         = $result['data']['pendidikan'];
        $data['pekerjaan']          = $result['data']['pekerjaan'];
        $data['sektorusaha']        = $result['data']['sektorusaha'];
        $data['tanggalregistrasi']  = $result['data']['tanggalregistrasi'];
        $data['tanggaldaring']      = $result['data']['tanggaldaring'];
        $data['status']             = $result['data']['status'];
        $data['username']           = $result['data']['username'];

        $data['kelurahan_nama'] = $result['data']['kelurahan']['nama'];
        $data['kelurahan_id']   = $result['data']['kelurahan']['id'];
        $data['kecamatan_nama'] = $result['data']['kelurahan']['kecamatan']['nama'];
        $data['kecamatan_id']   = $result['data']['kelurahan']['kecamatan']['id'];
        $data['kabupatenkota_nama'] = $result['data']['kelurahan']['kecamatan']['kabupatenkota']['nama'];
        $data['kabupatenkota_id']   = $result['data']['kelurahan']['kecamatan']['kabupatenkota']['id'];
        $data['provinsi_nama'] = $result['data']['kelurahan']['kecamatan']['kabupatenkota']['provinsi']['nama'];
        $data['provinsi_id']   = $result['data']['kelurahan']['kecamatan']['kabupatenkota']['provinsi']['id'];

        $url = file_get_contents(URL_API.'getprovinsi');
        $data['hasil'] = json_decode($url,true);  
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/anggota/viewEditAnggotaKoperasi.php',$data);
        $this->load->view('footer_admin.php');     
    }

    public function updateAnggota()
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
        $url = URL_API.'updateanggotakoperasi';
        $ch = curl_init($url);     
      
        $jsonData = array(      
            'anggotakoperasi_id'=> $this->input->post('anggotakoperasi_id'),
            'session_key'       => $session_data['session_key'],
            'foto'              => $foto,
            'nama'              => $this->input->post('nama'),
            'telepon'           => $this->input->post('telepon'),
            'email'             => $this->input->post('email'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'username'          => $this->input->post('username'),
            'alamat'            => $this->input->post('alamat'),
            'kelurahan_id'      => $this->input->post('lurah'),
            'pendidikan'        => $this->input->post('pendidikan'),
            'status'            => $this->input->post('status'),            
            'password'          => $this->input->post('password'),
            'tempatlahir'       => $this->input->post('tempatLahir'),
            'tanggallahir'      => $this->input->post('tanggalLahir'),
            'noktp'             => $this->input->post('noIdentitas'),
            'pekerjaan'         => $this->input->post('pekerjaan'),
            'sektorusaha'       => $this->input->post('sectorUsaha'),
            'tanggalregistrasi' => $this->input->post('tanggalRegistrasi'),
            'tanggaldaring'     => $this->input->post('tanggalDaring')
        );
        //print_r($jsonData);die();
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
        $hasil    = json_decode($result, true);


        //print_r($hasil);die();

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di update');
            redirect('anggota/viewAnggota','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di update');
            redirect('anggota/viewAnggota','refresh');             
        } 
    }   

    public function hapusAnggota()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deleteanggotakoperasi';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'anggotakoperasi_id'  => $id,
            'session_key'         => $session_data['session_key'],            
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
            redirect('anggota/viewAnggota','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data still here');
            redirect('anggota/viewAnggota','refresh');             
        } 
    }

}
	
