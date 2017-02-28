<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('Url');
        $this->load->model(array('Username_model','Sidebar_model'));      
    }

    public function index()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 

        $url = file_get_contents(URL_API.'getprovinsi');
        $data['hasil'] = json_decode($url,true); 
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/viewTambahPelanggan.php',$data);
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

    public function tambahPelanggan()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertpelanggan';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'       => $session_data['session_key'],
            'koperasi_id'       => 2,
            'nama'              => $this->input->post('nama'),
            'alamat'            => $this->input->post('alamat'),
            'kelurahan_id'      => $this->input->post('lurah'),
            'telepon'           => $this->input->post('telepon'),
            'email'             => $this->input->post('email')           
        );

        /*echo"<pre>";
        print_r($jsonData);die();
        echo"</pre>";*/

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil     = json_decode($result, true); 

        /*print_r($hasil);die();*/

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('Pelanggan/daftarPelanggan','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('Pelanggan/daftarPelanggan','refresh');            
        } 
    }

    public function daftarPelanggan()
    {
      
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getpelanggan';
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

        /*echo "<pre>";
        print_r($data['result']);die();
        echo "</pre>";*/
     
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/viewDaftarPelanggan.php',$data);
        $this->load->view('footer_admin.php');      
          
    }

    public function ubahPelanggan ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editpelanggan';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'pelanggan_id' => $id
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
        $result     = json_decode($result, true);

       /* print_r($result);die(); */     
        
        $data['nama']            = $result['data']['nama'];
        $data['alamat']          = $result['data']['alamat'];        
        $data['telepon']         = $result['data']['telepon'];
        $data['email']           = $result['data']['email'];
        $data['koperasi_id']     = $result['data']['koperasi_id'];
        
        $url = file_get_contents(URL_API.'getprovinsi');
        $data['hasil'] = json_decode($url,true);        
          
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/viewEditPelanggan.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updatePelanggan()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updatepelanggan';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'       => $session_data['session_key'],
            'pelanggan_id'      => $this->input->post('pelanggan_id'),
            'koperasi_id'       => $this->input->post('koperasi_id'),
            'nama'              => $this->input->post('nama'),
            'alamat'            => $this->input->post('alamat'),
            'kelurahan_id'      => $this->input->post('lurah'),
            'telepon'           => $this->input->post('telepon'),
            'email'             => $this->input->post('email')            
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

        /*print_r($hasil);die();*/       

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('Pelanggan/daftarPelanggan','refresh');  
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Pelanggan/daftarPelanggan','refresh');  
        }  
    }

    public function hapusPelanggan()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletepelanggan';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'pelanggan_id' => $id
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
        $hasil    = json_decode($result, true);

        /*print_r($hasil);die();*/

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus'); 
            redirect('Pelanggan/daftarPelanggan','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('Pelanggan/daftarPelanggan','refresh'); 
        }  
    }
}
?>