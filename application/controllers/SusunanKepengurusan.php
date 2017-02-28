<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SusunanKepengurusan extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->model(array('Sidebar_model','GetAnggotaKoperasi_model','SusunanKepengurusan_model'));		
	}

	public function index()
	{
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getketuakoperasi';
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
        
        $data['pengurussekretaris'] = $this->SusunanKepengurusan_model->pengurusSekretaris();
        $data['pengurusbendahara'] = $this->SusunanKepengurusan_model->pengurusBendahara();
        $data['penguruspengawas'] = $this->SusunanKepengurusan_model->pengurusPengawas();
        $data['pengurusmanager'] = $this->SusunanKepengurusan_model->pengurusManager();
        $data['penguruskaryawan'] = $this->SusunanKepengurusan_model->pengurusKaryawan();
        $data['pengurusDewanPengawasSyariah'] = $this->SusunanKepengurusan_model->pengurusDewanPengawasSyariah();
		$dataSidebar['notif'] = $this->Sidebar_model->modelNotif(); 
		$data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();
		//print_r($data);die();
		$this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/susunanKepengurusan/viewSusunanKepengurusan.php', $data);
        $this->load->view('footer_admin.php');
	} 

	public function removeKetuaSatu($ketuaSatu)
    {
        //print_r('hahah');die();   
        $this->session->unset_userdata('ketuaTemp');
        $data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();         
        $key = array_search($ketuaSatu, array_column($data['anggota']['data'], 'id'));  
        //print_r($key);die();  
        unset($data['anggota']['data'][$key]);      
        $myarray1 = array_values($data['anggota']['data']);
        $this->session->set_userdata('ketuaTemp' ,$myarray1);   
        //print_r($myarray1);die();   
        $data = array();
        foreach ($myarray1 as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);           
    }

    public function removeKetuaDua($ketuaDua)
    {
        //$this->session->unset_userdata('dataAnggotatemp');
        $ketuaTemp = $this->session->userdata('ketuaTemp');
        $key = array_search($ketuaDua, array_column($ketuaTemp, 'id'));     
        unset($ketuaTemp[$key]);
        //print_r($ketuaTemp);die();
        $data = array();
        foreach ($ketuaTemp as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);        
    }

    public function removeSekretarisSatu($ketuaSatu)
    {
        //print_r('hahah');die();   
        $this->session->unset_userdata('ketuaTemp');
        $data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();         
        $key = array_search($ketuaSatu, array_column($data['anggota']['data'], 'id'));  
        //print_r($key);die();  
        unset($data['anggota']['data'][$key]);      
        $myarray1 = array_values($data['anggota']['data']);
        $this->session->set_userdata('ketuaTemp' ,$myarray1);   
        //print_r($myarray1);die();   
        $data = array();
        foreach ($myarray1 as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);           
    }

    public function removeSekretarisDua($ketuaDua)
    {
        //$this->session->unset_userdata('dataAnggotatemp');
        $ketuaTemp = $this->session->userdata('ketuaTemp');
        $key = array_search($ketuaDua, array_column($ketuaTemp, 'id'));     
        unset($ketuaTemp[$key]);
        //print_r($ketuaTemp);die();
        $data = array();
        foreach ($ketuaTemp as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);        
    }

    public function removeBendaharaSatu($ketuaSatu)
    {
        //print_r('hahah');die();   
        $this->session->unset_userdata('ketuaTemp');
        $data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();         
        $key = array_search($ketuaSatu, array_column($data['anggota']['data'], 'id'));  
        //print_r($key);die();  
        unset($data['anggota']['data'][$key]);      
        $myarray1 = array_values($data['anggota']['data']);
        $this->session->set_userdata('ketuaTemp' ,$myarray1);   
        //print_r($myarray1);die();   
        $data = array();
        foreach ($myarray1 as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);           
    }

    public function removeBendaharaDua($ketuaDua)
    {
        //$this->session->unset_userdata('dataAnggotatemp');
        $ketuaTemp = $this->session->userdata('ketuaTemp');
        $key = array_search($ketuaDua, array_column($ketuaTemp, 'id'));     
        unset($ketuaTemp[$key]);
        //print_r($ketuaTemp);die();
        $data = array();
        foreach ($ketuaTemp as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);        
    }

    public function removeKetuaPengawas($ketuaSatu)
    {
        //print_r('hahah');die();   
        $this->session->unset_userdata('ketuaTemp');
        $data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();         
        $key = array_search($ketuaSatu, array_column($data['anggota']['data'], 'id'));  
        //print_r($key);die();  
        unset($data['anggota']['data'][$key]);      
        $myarray1 = array_values($data['anggota']['data']);
        $this->session->set_userdata('ketuaTemp' ,$myarray1);   
        //print_r($myarray1);die();   
        $data = array();
        foreach ($myarray1 as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);           
    }

    public function removeAnggotaSatu($ketuaDua)
    {
        //$this->session->unset_userdata('dataAnggotatemp');
        $ketuaTemp = $this->session->userdata('ketuaTemp');
        $key = array_search($ketuaDua, array_column($ketuaTemp, 'id'));     
        unset($ketuaTemp[$key]);
        //print_r($ketuaTemp);die();
        $data = array();
        foreach ($ketuaTemp as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);        
    }

    public function removeManagerSatu($ketuaSatu)
    {
        //print_r('hahah');die();   
        $this->session->unset_userdata('ketuaTemp');
        $data['anggota'] = $this->GetAnggotaKoperasi_model->getAnggotaKoperasi();         
        $key = array_search($ketuaSatu, array_column($data['anggota']['data'], 'id'));  
        //print_r($key);die();  
        unset($data['anggota']['data'][$key]);      
        $myarray1 = array_values($data['anggota']['data']);
        $this->session->set_userdata('ketuaTemp' ,$myarray1);   
        //print_r($myarray1);die();   
        $data = array();
        foreach ($myarray1 as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }            
        echo json_encode($data);           
    }

    public function removeManagerDua($ketuaDua)
    {
        //$this->session->unset_userdata('dataAnggotatemp');
        $ketuaTemp = $this->session->userdata('ketuaTemp');
        $key = array_search($ketuaDua, array_column($ketuaTemp, 'id'));
        unset($ketuaTemp[$key]);
        //print_r($ketuaTemp);die();
        $data = array();
        foreach ($ketuaTemp as $row)
        {
            $data[] = array(  
                'label' => $row['nama'],
                'id' => $row['id']
            );
        }
        echo json_encode($data);
    }

    //insert ketua
    public function insertKetua()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertsusunankepengurusan';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key']          
        );
        $jsonData['data'][] = array(
            'jabatan'              => 'ketua 1',
            'anggotakoperasi_id'   => $this->input->post('ketuaSatu')            
        );   
        $jsonData['data'][] = array( 
            'jabatan'              => 'ketua 2',
            'anggotakoperasi_id'   => $this->input->post('ketuaDua')            
        ); 
        $jsonData['data'][] = array(
            'jabatan'              => 'ketua 3',
            'anggotakoperasi_id'   => $this->input->post('ketuaTiga')            
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
        // print_r($result);die();

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Ketua Berhasil di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Ketua Gagal di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
    }

    //insert sekretaris
    public function insertSekretaris()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertsusunankepengurusan';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key']          
        );
        $jsonData['data'][] = array(
            'jabatan'              => 'sekretaris 1',
            'anggotakoperasi_id'   => $this->input->post('sekretarisSatu')            
        );   
        $jsonData['data'][] = array( 
            'jabatan'              => 'sekretaris 2',
            'anggotakoperasi_id'   => $this->input->post('sekretarisDua')            
        ); 
        $jsonData['data'][] = array(
            'jabatan'              => 'sekretaris 3',
            'anggotakoperasi_id'   => $this->input->post('sekretarisTiga')            
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
        // print_r($result);die();

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Sekretaris Berhasil di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Sekretaris Gagal di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
    }

    //insert bendahara
    public function insertBendahara()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertsusunankepengurusan';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key']          
        );
        $jsonData['data'][] = array(
            'jabatan'              => 'bendahara 1',
            'anggotakoperasi_id'   => $this->input->post('bendaharaSatu')            
        );   
        $jsonData['data'][] = array( 
            'jabatan'              => 'bendahara 2',
            'anggotakoperasi_id'   => $this->input->post('bendaharaDua')            
        ); 
        $jsonData['data'][] = array(
            'jabatan'              => 'bendahara 3',
            'anggotakoperasi_id'   => $this->input->post('bendaharaTiga')            
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

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Bendahara Berhasil di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Bendahara Gagal di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
    }

    //insert pengawas
    public function insertPengawas()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertsusunankepengurusan';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key']          
        );
        $jsonData['data'][] = array(
            'jabatan'              => 'ketua pengawas',
            'anggotakoperasi_id'   => $this->input->post('ketuaPengawas')            
        );   
        $jsonData['data'][] = array( 
            'jabatan'              => 'anggota 1',
            'anggotakoperasi_id'   => $this->input->post('anggotaSatu')            
        ); 
        $jsonData['data'][] = array(
            'jabatan'              => 'anggota 2',
            'anggotakoperasi_id'   => $this->input->post('anggotaDua')            
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
        // print_r($result);die();

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Bendahara Berhasil di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Bendahara Gagal di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
    }

    //insert manager
    public function insertManager()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertsusunankepengurusan';
        $ch = curl_init($url);

        $jsonData = array(
            'session_key'   => $session_data['session_key']          
        );
        $jsonData['data'][] = array(
            'jabatan'              => 'manajer 1',
            'anggotakoperasi_id'   => $this->input->post('managerSatu')            
        );   
        $jsonData['data'][] = array( 
            'jabatan'              => 'manajer 2',
            'anggotakoperasi_id'   => $this->input->post('managerDua')            
        ); 
        $jsonData['data'][] = array(
            'jabatan'              => 'manajer 3',
            'anggotakoperasi_id'   => $this->input->post('managerTiga')            
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
        // print_r($result);die();

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Manajer Berhasil di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Manajer Gagal di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
    }

    public function hapusHistory()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'deletesusunankepengurusan';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
        $jsonData = array(
            'session_key'         => $session_data['session_key'],
            'id'  => $id
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
            redirect('SusunanKepengurusan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Tidak Dapat di Hapus');
            redirect('SusunanKepengurusan/index','refresh');
        }
    }

    public function insertKaryawan()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'insertkaryawan';
        $ch = curl_init($url);
        $idanggota= $this->input->post('idanggota');
        if ($idanggota==NULL) {
                $jsonData = array(
                    'session_key'       => $session_data['session_key'],
                    'nama'              => $this->input->post('namaLengkap'),
                    'jeniskelamin'      => $this->input->post('jenis_kelamin'),
                    'alamat'            => $this->input->post('alamat'),
                    'jabatan'           => $this->input->post('jabatan'),
                    'mulaijabatan'      => $this->input->post('tglMulaiJabat'),
                    'akhirjabatan'      => $this->input->post('tglSelesaiJabat'),
                    'pendidikan'        => $this->input->post('pendidikan'),
                    'status'            => $this->input->post('status'),
                    'telepon'           => $this->input->post('telepon')
                );
        }else{
        $jsonData = array(
                    'session_key'       => $session_data['session_key'],
                    'anggotakoperasi_id'=> $idanggota,
                    'nama'              => $this->input->post('namaLengkap'),
                    'jeniskelamin'      => $this->input->post('jenis_kelamin'),
                    'alamat'            => $this->input->post('alamat'),
                    'jabatan'           => $this->input->post('jabatan'),
                    'mulaijabatan'      => $this->input->post('tglMulaiJabat'),
                    'akhirjabatan'      => $this->input->post('tglSelesaiJabat'),
                    'pendidikan'        => $this->input->post('pendidikan'),
                    'status'            => $this->input->post('status'),
                    'telepon'           => $this->input->post('telepon')
                );
        }

        //print_r($jsonData);die();

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
            $this->session->set_flashdata('message', 'Data Karyawan Berhasil di Tambahkan'); 
            redirect('SusunanKepengurusan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Karyawan Gagal di Tambah');
            redirect('SusunanKepengurusan/index','refresh');
        }  
    }

    public function updateKaryawan()
    {        
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'updatekaryawan';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'id'              => $this->input->post('eidanggota'),
            'nama'              => $this->input->post('enama'),
            'jeniskelamin'      => $this->input->post('ejenis_kelamin'),
            'alamat'            => $this->input->post('ealamat'),
            'jabatan'           => $this->input->post('ejabatan'),
            'mulaijabatan'      => $this->input->post('tglMulaiJabat'),
            'akhirjabatan'      => $this->input->post('tglSelesaiJabat'),
            'pendidikan'        => $this->input->post('ependidikan'),
            'status'            => $this->input->post('estatus'),
            'telepon'           => $this->input->post('etelepon')
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
        $hasil     = json_decode($result, true); 
        //print_r($hasil);die();
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Karyawan Berhasil di Ubah');
            redirect('SusunanKepengurusan/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Karyawan Gagal di Ubah');
            redirect('SusunanKepengurusan/index','refresh');             
        }
    }

    public function hapusKaryawan()
    {        
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'deletekaryawan';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'id'                => $id
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
        $hasil     = json_decode($result, true); 
        //print_r($hasil);die();
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Karyawan Berhasil di Hapus');
            redirect('SusunanKepengurusan/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Karyawan Gagal di Hapus');
            redirect('SusunanKepengurusan/index','refresh');             
        }
    }

    //insert dewan pengawas syariah
    public function insertDewanPengawasSyariah()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'insertpengawas';
        $ch = curl_init($url);
        $idanggota= $this->input->post('iddewanPengawas');
        if ($idanggota==NULL) {
                $jsonData = array(
                    'session_key'       => $session_data['session_key'],
                    'nama'              => $this->input->post('namalengkapDewan'),
                    'jeniskelamin'      => $this->input->post('jenisKelamin'),
                    'alamat'            => $this->input->post('alamatDewan'),
                    'pendidikan'        => $this->input->post('pendidikanDewan'),
                    'mulaijabatan'      => $this->input->post('tglMulaiJabat'),
                    'akhirjabatan'      => $this->input->post('tglSelesaiJabat'),
                    'status'            => $this->input->post('statusDewan'),
                    'telepon'           => $this->input->post('teleponDewan')
                );
        }else{
        $jsonData = array(
                    'session_key'       => $session_data['session_key'],
                    'anggotakoperasi_id'=> $idanggota,
                    'nama'              => $this->input->post('namalengkapDewan'),
                    'jeniskelamin'      => $this->input->post('jenisKelamin'),
                    'alamat'            => $this->input->post('alamatDewan'),
                    'pendidikan'        => $this->input->post('pendidikanDewan'),
                    'mulaijabatan'      => $this->input->post('tglMulaiJabat'),
                    'akhirjabatan'      => $this->input->post('tglSelesaiJabat'),
                    'status'            => $this->input->post('statusDewan'),
                    'telepon'           => $this->input->post('teleponDewan')
                );
        }

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
        // print_r($result);die();

        if($data['result']['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Dewan Pengawas Syariah Berhasil di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Dewan Pengawas Syariah Gagal di Tambahkan');
            redirect('SusunanKepengurusan/index','refresh');
        }
    }

    public function updateDewanPengawasSyariah()
    {        
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'updatepengawas';
        $ch = curl_init($url);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'id'                => $this->input->post('eiddewanPengawas'),
            'nama'              => $this->input->post('enamalengkapDewan'),
            'jeniskelamin'      => $this->input->post('ejenisKelamin'),
            'alamat'            => $this->input->post('ealamatDewan'),
            'pendidikan'        => $this->input->post('ependidikanDewan'),
            'mulaijabatan'      => $this->input->post('tglMulaiJabat'),
            'akhirjabatan'      => $this->input->post('tglSelesaiJabat'),
            'status'            => $this->input->post('estatusDewan'),
            'telepon'           => $this->input->post('eteleponDewan')
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
        $hasil     = json_decode($result, true); 
        //print_r($hasil);die();
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Dewan Pengawas Syariah Berhasil di Ubah');
            redirect('SusunanKepengurusan/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Dewan Pengawas Syariah Gagal di Ubah');
            redirect('SusunanKepengurusan/index','refresh');             
        }
    }

    public function hapusDewanPengawasSyariah()
    {        
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_API7.'deletepengawas';
        $ch = curl_init($url);
        $id = $this->uri->segment(3);
   
        $jsonData = array(
            'session_key'       => $session_data['session_key'],
            'id'                => $id
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
        $hasil     = json_decode($result, true); 
        //print_r($hasil);die();
        if($hasil['status'] == '1')
        {
            $this->session->set_flashdata('message', 'Data Dewan Pengawas Syariah Berhasil di Hapus');
            redirect('SusunanKepengurusan/index','refresh'); 
        }
        else
        {
            $this->session->set_flashdata('error', 'Data Dewan Pengawas Syariah Gagal di Hapus');
            redirect('SusunanKepengurusan/index','refresh');             
        }
    }
}
?>