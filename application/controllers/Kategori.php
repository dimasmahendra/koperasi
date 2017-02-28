<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('Url');
        $this->load->model(array('Username_model','Sidebar_model'));    
    }

    public function index()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/kategori/viewTambahKategori.php');
        $this->load->view('footer_admin.php');       
    }    

    public function daftarKategori()
    {
        $session_data = $this->session->userdata('logged_in');        

        $url = URL_API.'getkategori';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'       => $session_data['session_key']                        
        );     

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $data['result'] = json_decode($result, true);

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();     

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/kategori/viewDaftarKategori.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function tambahKategori()
    {        
        $session_data = $this->session->userdata('logged_in');     

        $url = URL_API.'insertkategori';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'nama'        => $this->input->post('nama')
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

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('Kategori/daftarKategori','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('Kategori/daftarKategori','refresh');            
        } 
    }

    public function editKategori()
    {
        $session_data = $this->session->userdata('logged_in');       

        $url = URL_API.'editkategori';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);

        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'kategori_id' => $id
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

        $hasil['nama'] = $hasil['data']['nama'];

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();     

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/kategori/viewEditKategori.php',$hasil);
        $this->load->view('footer_admin.php');
    }

    public function updateKategori()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updatekategori';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'  => $session_data['session_key'],
            'kategori_id'  => $this->input->post('kategori_id'),           
            'nama'         => $this->input->post('nama')                       
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('Kategori/daftarKategori','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Kategori/daftarKategori','refresh');
        }  
    }

    public function hapusKategori()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletekategori';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'kategori_id' => $id
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Hapus'); 
            redirect('Kategori/daftarKategori','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('Kategori/daftarKategori','refresh');
        }  
    }
}
?>