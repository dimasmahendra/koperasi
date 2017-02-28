<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('Url');
		$this->load->model(array('Username_model','Sidebar_model'));  		
	}

	public function index()
	{
        $data['anggota'] = $this->Username_model->modelAnggota();
        
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpanan/viewTambahSimpanan.php',$data);
        $this->load->view('footer_admin.php');       
	}

    public function cekSimpanan($id_ang)
    {
      
        $session_data   = $this->session->userdata('logged_in');         
        $url = URL_API.'cekjenissimpanan';
        $ch = curl_init($url);
        $jsonData = array(
        'session_key' => $session_data['session_key'],
        'anggotakoperasi_id' => $id_ang
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
       
        $dataSimpanan = "<option value=''>- Pilih Simpanan -</option>";
        foreach ($data['hasil']['data'] as $value) {
                /*echo $value['id'];*/
                $dataSimpanan .= "<option value='".$value['nama']."'>".$value['nama']."</option>";
            }
        echo $dataSimpanan;
    }
	
	public function daftarSimpanan()
	{
		$session_data   = $this->session->userdata('logged_in');  
        $url = URL_API.'getsimpanan';
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
    
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpanan/viewDaftarSimpanan.php',$data);
        $this->load->view('footer_admin.php');
	}
    public function insertSimpanan()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertsimpanan';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'         => $session_data['session_key'], 
            'anggotakoperasi_id'  => $this->input->post('ang'),
            'jenissimpanan'      => 'Sukarela',            
            'jumlah'              => $this->input->post('jumlah'),
            'status'              => 'Belum Diambil'
        );  

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_close($ch);
        $hasil    = json_decode($result, true);  

   
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di tambahkan'); 
            redirect('Simpanan/daftarSimpanan','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah');
            redirect('Simpanan/daftarSimpanan','refresh');
        }  
    }
    public function ubahSimpanan ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editsimpanan';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'simpanan_id' => $id
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
        
        $data['biaya'] = $result['data']['jumlah'];
        $data['anggotakoperasi_id'] = $result['data']['anggotakoperasi_id'];
        $data['jenissimpanan'] = $result['data']['jenissimpanan'];
        $data['hasil'] = $this->Username_model->modelAnggota();
                  
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/simpanan/viewEditSimpanan.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updateSimpanan()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updatesimpanan';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'         => $session_data['session_key'],
            'simpanan_id'         => $this->input->post('simpanan_id'),
            'anggotakoperasi_id'  => $this->input->post('ang'),
            'jenissimpanan'      => $this->input->post('jenissimpanan'),            
            'jumlah'              => $this->input->post('jumlah'),
            'status'              => 'Belum Diambil'              
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('Simpanan/daftarSimpanan','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Simpanan/daftarSimpanan','refresh');
        }  
    }

    public function hapusSimpanan()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletesimpanan';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'simpanan_id'    => $id,
            'session_key'         => $session_data['session_key']            
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
            redirect('Simpanan/daftarSimpanan','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('Simpanan/daftarSimpanan','refresh');
        }  
    }

}

?>