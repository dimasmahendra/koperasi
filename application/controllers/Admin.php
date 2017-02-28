<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model'));
        $this->load->helper(array('form','file','url','html'));
	}

	public function index()
	{   
        $data['hasil'] = $this->Username_model->modelAkses();
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/adminkoperasi/viewTambahAdminKoperasi.php',$data);
        $this->load->view('footer_admin.php');       
	}
	
	public function daftarAdminKoperasi()
	{
		$session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getadminkoperasi';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
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
        /*print_r($data['result']);die();*/
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/adminkoperasi/viewDaftarAdminKoperasi.php',$data);
        $this->load->view('footer_admin.php');
	}
    
	public function insertAdmin()
	{
	    $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertadminkoperasi';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'username'          => $this->input->post('username'),
            'nama'              => $this->input->post('nama'),
            'email'             => $this->input->post('email'),
            'jabatan'           => $this->input->post('jabatan'),
            'telepon'           => $this->input->post('telepon'),
            'akseskoperasi_id'  => $this->input->post('akses'),
            'password'          => $this->input->post('password')                
        );    
		/*print_r($jsonData);die();*/

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
            redirect('Admin/daftarAdminKoperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di tambah');
            redirect('Admin/daftarAdminKoperasi','refresh');
        }  
	}

	public function ubahAdminKoperasi ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editadminkoperasi';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'adminkoperasi_id' => $id
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
        
        $data['username'] = $result['data']['username'];
        $data['nama']   = $result['data']['nama'];
        $data['email'] = $result['data']['email'];
        $data['telepon'] = $result['data']['telepon'];
        $data['foto'] = $result['data']['foto'];
        $data['akseskoperasi_id'] = $result['data']['akseskoperasi_id'];

        $data['hasil'] = $this->Username_model->modelAkses();

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();   
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/adminkoperasi/viewEditAdminKoperasi.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updateAdmin()
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
        $url = URL_API.'updateadminkoperasi';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'       => $session_data['session_key'],
            'adminkoperasi_id'  => $this->input->post('adminkoperasi_id'),
            'username'          => $this->input->post('username'),
            'nama'      		=> $this->input->post('nama'),
            'email'    			=> $this->input->post('email'),
            'telepon'           => $this->input->post('telepon'),
            'akseskoperasi_id'  => $this->input->post('akses'),
            'foto'              => $foto,
            'passwordlama'      => $this->input->post('passwordlama'),
            'password'          => $this->input->post('password')                
        );

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



        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('Admin/daftarAdminKoperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Admin/daftarAdminKoperasi','refresh');
        }  
    }
    public function hapusAdmin()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deleteadminkoperasi';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
      
        $jsonData = array(      
            'adminkoperasi_id'    => $id,
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

        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di rubah'); 
            redirect('Admin/daftarAdminKoperasi','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Admin/daftarAdminKoperasi','refresh');
        }  
    }

}

?>