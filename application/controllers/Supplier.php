<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('Url');
		$this->load->model(array('Username_model','Sidebar_model'));		
	}

	public function index()
	{
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();
        $session_data   = $this->session->userdata('logged_in');
        $data['koperasi_id'] = $session_data['data']['koperasi_id']; 

        $url = file_get_contents(URL_API.'getprovinsi');
        $data['hasil'] = json_decode($url,true);  
        
        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/supplier/viewTambahSupplier.php',$data);
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

    public function tambahSupplier()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'insertsuplier';
        $ch = curl_init($url);      
      
        $jsonData = array(           
            'session_key'       => $session_data['session_key'],
            'koperasi_id'       => $this->input->post('koperasi_id'),
            'nama'              => $this->input->post('nama'),
            'alamat'            => $this->input->post('alamat'),
            'kelurahan_id'      => $this->input->post('lurah'),
            'telepon'           => $this->input->post('telepon'),
            'email'             => $this->input->post('email'),
            'penanggungjawab'   => $this->input->post('penanggungjawab'),
            'kontakperson'      => $this->input->post('kontakperson')
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

        /*print_r($hasil);die();*/

        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sudah di Tambahkan');
            redirect('Supplier/daftarSupplier','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            redirect('Supplier/daftarSupplier','refresh');            
        } 
    }

    public function daftarSupplier()
    {
      
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'getsuplier';
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
        $this->load->view('admin/supplier/viewDaftarSupplier.php',$data);
        $this->load->view('footer_admin.php');      
          
    }

    public function ubahSupplier ()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API.'editsuplier';
        $ch = curl_init($url);    
        $id = $this->uri->segment(3);      
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'suplier_id' => $id
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
        
        $data['koperasi_id']     = $result['data']['koperasi_id'];
        $data['nama']            = $result['data']['nama'];
        $data['alamat']          = $result['data']['alamat'];
        $data['kelurahan_id']    = $result['data']['kelurahan_id'];
        $data['telepon']         = $result['data']['telepon'];
        $data['email']           = $result['data']['email'];
        $data['penanggungjawab'] = $result['data']['penanggungjawab'];
        $data['kontakperson']    = $result['data']['kontakperson'];

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
        $this->load->view('admin/supplier/viewEditSupplier.php',$data);
        $this->load->view('footer_admin.php'); 
    }

    public function updateSupplier()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'updatesuplier';
        $ch = curl_init($url);     
      
        $jsonData = array( 
            'session_key'       => $session_data['session_key'],
            'suplier_id'        => $this->input->post('suplier_id'),
            'koperasi_id'       => $this->input->post('koperasi_id'),
            'nama'              => $this->input->post('nama'),
            'alamat'            => $this->input->post('alamat'),
            'kelurahan_id'      => $this->input->post('lurah'),
            'telepon'           => $this->input->post('telepon'),
            'email'             => $this->input->post('email'),
            'penanggungjawab'   => $this->input->post('penanggungjawab'),
            'kontakperson'      => $this->input->post('kontakperson')             
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
            redirect('Supplier/daftarSupplier','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal berubah');
            redirect('Supplier/daftarSupplier','refresh');
        }  
    }

    public function hapusSupplier()
    {
        $session_data   = $this->session->userdata('logged_in');        
        $url = URL_API.'deletesuplier';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);  
      
        $jsonData = array(           
            'session_key' => $session_data['session_key'],
            'suplier_id' => $id
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
            redirect('Supplier/daftarSupplier','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Hapus');
            redirect('Supplier/daftarSupplier','refresh');
        }  
    }
}
?>