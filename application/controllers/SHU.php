<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SHU extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('Url');
		$this->load->model(array('Username_model','Sidebar_model'));	
	}

	public function index()
	{
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();  
        
        $data['hasil'] = $this->Username_model->modelSHU();
        $data['operasi'] = $this->Username_model->modelTahunOperasiAktif();    
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/shu/viewTambahSHU.php',$data);
        $this->load->view('footer_admin.php');       
	}    

    public function daftarSHU()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getkomponenshu';
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
        
        $data['tahun'] = $this->Username_model->modelTahunOperasi(); 
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/shu/viewDaftarSHU.php',$data);
        $this->load->view('footer_admin.php');
    }

    public function kalkulasiSHU()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'kalkulasishu';
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
        $hasil    = json_decode($result, true);
        //print_r($hasil);die();
        if ($hasil['status'] == '1') 
        {    
            redirect('SHU/daftarKalkulasiSHU','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Kalkulasi SHU Gagal. '.$hasil['message']);
            redirect('SHU/daftarKalkulasiSHU','refresh');
        }  
    }

    public function daftarKalkulasiSHU()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getshuaktif';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key']
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
        $data['hasil']   = json_decode($result, true);  

        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/kalkulasishu/viewDaftarKalkulasiSHU.php',$data);
        $this->load->view('footer_admin.php');
    } 

    public function resetSHUIndex()
    {
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/kalkulasishu/viewResetSHU.php','refresh');
        $this->load->view('footer_admin.php');
    }

    public function resetSHU()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'resetshu';
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
        $hasil     = json_decode($result, true);      
        
        if ($hasil['status'] == '1') 
        {    
            $this->session->set_flashdata('message', 'Data SHU Berhasil di Reset');
            redirect('SHU/resetSHUIndex','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Kalkulasi SHU Gagal Di Reset');
            redirect('SHU/resetSHUIndex','refresh');            
        }
    }

    public function daftarPeriodeSHU()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getshuwhere';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],            
            'tahunoperasi_id' => $this->input->post('tahunoperasi')
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
        $data['hasil'] = json_decode($result, true);

        //print_r(count($data['hasil']['data']));die();

        if(count($data['hasil']['data']) == '0')
        {
            $this->session->set_flashdata('error', 'Tahun Operasi yang di pilih belum di kalkulasi');
            redirect('SHU/daftarSHU','refresh');
        }
        else
        {
            $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
            $this->load->view('main_admin.php',$dataSidebar);
            $this->load->view('admin/kalkulasishu/viewDaftarPeriodeSHU.php',$data);
            $this->load->view('footer_admin.php');
        }       
    }

    public function tambahSHU()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'insertkomponenshu';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'          => $session_data['session_key'],
            'tahunoperasi_id'      => $this->input->post('tahunoperasi_id'),
            'tipekomponenshu_id'   => $this->input->post('tipekomponenshu_id'),
            'komponen'             => $this->input->post('komponen'),
            'persentase'           => $this->input->post('persentase')         
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
            redirect('SHU/daftarSHU','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', $hasil['message']);
            redirect('SHU/daftarSHU','refresh');
        }  
    }
    public function ubahSHU ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editkomponenshu';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'komponenshu_id' => $id
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

        $data['tahunoperasi_id'] = $result['data']['tahunoperasi_id'];
        $data['tipekomponenshu_id'] = $result['data']['tipekomponenshu_id'];
        $data['komponen'] = $result['data']['komponen'];
        $data['persentase'] = $result['data']['persentase'];

        $data['hasil'] = $this->Username_model->modelSHU();
        $data['operasi'] = $this->Username_model->modelTahunOperasiAktif();  
          
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/shu/viewEditSHU.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updateSHU()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updatekomponenshu';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'          => $session_data['session_key'],
            'komponenshu_id'       => $this->input->post('komponenshu_id'),
            'tahunoperasi_id'      => $this->input->post('tahunoperasi_id'),
            'tipekomponenshu_id'   => $this->input->post('tipekomponenshu_id'),
            'komponen'             => $this->input->post('komponen'),
            'persentase'           => $this->input->post('persentase')              
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
            redirect('SHU/daftarSHU','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', $hasil['message']);
            redirect('SHU/daftarSHU','refresh');
        }  
    }

    public function hapusSHU()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletekomponenshu';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(      
            'session_key' => $session_data['session_key'],
            'komponenshu_id' => $id         
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
            redirect('SHU/daftarSHU','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('SHU/daftarSHU','refresh');
        }  
    }   
}
?>