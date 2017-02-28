<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Username_model','Sidebar_model','SusunanKepengurusan_model','Getmykoperasi_model'));              
    }

    public function index()
    {
        $data['myKoperasi'] = $this->Getmykoperasi_model->myKoperasi();           
        $data['ketuaPengurus'] = $this->SusunanKepengurusan_model->pengurusKetua();   
        $data['kelompokkoperasi'] = $this->Getmykoperasi_model->getKelompokKoperasi();   
        $data['sektorusaha'] = $this->Getmykoperasi_model->getSektorUsaha();   
        $data['myPengurusKoperasi'] = $this->Getmykoperasi_model->myPengurusKoperasi();     
        $dataSidebar['notif'] = $this->Sidebar_model->modelNotif();

        $bulan = array(1=>'Januari', 2=>'Februari', 3=>'Maret',
            4=>'April', 5=>'Mei', 6=>'Juni',
            7=>'Juli', 8=>'Agustus', 9=>'September',
            10=>'Oktober', 11=>'November', 12=>'Desember');

        if ($data['myKoperasi']['indikatorkelembagaan_tahun1'] == 0) {
            $RAT1="";
            $RAT2="";
            $RAT3="";
        }       
        else{
            $RAT1=$data['myKoperasi']['indikatorkelembagaan_tahun1']['tanggalRat'];
            $RAT2=$data['myKoperasi']['indikatorkelembagaan_tahun2']['tanggalRat'];
            $RAT3=$data['myKoperasi']['indikatorkelembagaan_tahun3']['tanggalRat'];
            if ($RAT1==0) {
                $data['myKoperasi']['indikatorkelembagaan_tahun1']['tanggalRat']=0;
            }else{
                $dateRAT=date_create($RAT1);
                $data['myKoperasi']['indikatorkelembagaan_tahun1']['tanggalRat']= date_format($dateRAT,"d").' '.$bulan[(int)date_format($dateRAT,"m")].' '.date_format($dateRAT,"Y");
            }

            if ($RAT2==0) {
                $data['myKoperasi']['indikatorkelembagaan_tahun2']['tanggalRat']=0;
            }else{
                $dateRAT2=date_create($RAT2);
                $data['myKoperasi']['indikatorkelembagaan_tahun2']['tanggalRat']= date_format($dateRAT2,"d").' '.$bulan[(int)date_format($dateRAT2,"m")].' '.date_format($dateRAT2,"Y");
            }

            if ($RAT3==0) {
                $data['myKoperasi']['indikatorkelembagaan_tahun3']['tanggalRat']=0;
            }else{
                $dateRAT3=date_create($RAT3);
                $data['myKoperasi']['indikatorkelembagaan_tahun3']['tanggalRat']= date_format($dateRAT3,"d").' '.$bulan[(int)date_format($dateRAT3,"m")].' '.date_format($dateRAT3,"Y");
            }
        } 

        //print_r($data);die();

        $this->load->view('main_admin.php',$dataSidebar);
        $this->load->view('admin/peta/viewLokasiKoperasi.php',$data);
        $this->load->view('footer_admin.php');
    } 

    public function insertIdentitasKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in'); 
        $url = URL_APIZ.'insertidentitaskoperasi';
        $ch = curl_init($url); 

        $jsonData = array(
            'session_key'   => $session_data['session_key']          
        );
        $jsonData['data']['koperasi'] = array( 
            'alamat'   => $this->input->post('t4KedudukanKop'),           
            'notaris'   => $this->input->post('notAktaKop'),          
            'npwp'   => $this->input->post('npwp'),
            'jangkawaktu'   => $this->input->post('jgkawktPendirian')     
        );   
        $jsonData['data']['pengesahan'] = array( 
            'nomorbh'   => $this->input->post('noBH'),         
            'tanggalbh'   => $this->input->post('tglBH'),         
            'nolembaran'   => $this->input->post('nolbrBeritaBH'),        
            'tgllembaran'   => $this->input->post('tgllbrBeritaBH'),        
            'pemberibadanhukum_id'   => $this->input->post('pengesahanBH')              
        ); 
        $jsonData['data']['anggarandasar'] = array( 
            'nomorpad'   => $this->input->post('noPAD'),         
            'tanggalpad'   => $this->input->post('tglPAD'),         
            'nomorlembaran'   => $this->input->post('nolbrBeritaPAD'),         
            'tanggallembaran'   => $this->input->post('tgllbrBeritaPAD'),        
            'notarispad'   => $this->input->post('notPAD')       
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
        $hasil = json_decode($result, true); 
        //print_r($hasil);die();       
       
        if ($hasil['status'] == 1) 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Rubah'); 
            redirect('Peta/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Rubah');
            redirect('Peta/index','refresh');
        }              
    }

    public function insertDataKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in'); 
        $url = URL_APIZ.'insertidentitaskoperasi';
        $ch = curl_init($url); 

        $jsonData = array(
            'session_key'   => $session_data['session_key']          
        );
        $jsonData['data']['koperasi'] = array( 
            'latitude'     => $this->input->post('lat'),           
            'longitude'    => $this->input->post('lng'),          
            'nama'         => $this->input->post('nama'),
            'email'        => $this->input->post('email'),
            'telepon'      => $this->input->post('telepon'),     
            'alamat'       => $this->input->post('alamat'),     
            'kelurahan_id' => $this->input->post('lurah'),     
            'kodepos'      => $this->input->post('kodepos'),     
            'fax'          => $this->input->post('fax'),     
            'website'      => $this->input->post('website'),     
            'nomorinduk'   => $this->input->post('nomorregistrasi'),     
            'usernamessp'  => $this->input->post('usernamessp')   
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
        $hasil = json_decode($result, true); 
        //print_r($hasil);die();       
       
        if ($hasil['status'] == 1) 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Rubah'); 
            redirect('Peta/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Rubah');
            redirect('Peta/index','refresh');
        }              
    }

    public function insertDataLainnya()
    {
        if ($_POST['usp'] == 'Ya') {
            $tipekoperasi = $_POST['jkop']."5";
        }
        else{
            $tipekoperasi = $_POST['jkop'];
        }
        $session_data   = $this->session->userdata('logged_in'); 
        $url = URL_APIZ.'insertidentitaskoperasi';
        $ch = curl_init($url); 

        $jsonData = array(
            'session_key'   => $session_data['session_key']          
        );
        $jsonData['data']['koperasi'] = array( 
            'bentukkoperasi_id'     => $this->input->post('btkkop'),           
            'tipekoperasi_id'       => $tipekoperasi,          
            'kelompokkoperasi_id'   => $this->input->post('kelKop'),
            'sektorusaha_id'        => $this->input->post('sekUsaha'),          
            'binaan'                => $this->input->post('kopBinaan')        
        );          
        
        $jsonDataEncoded = json_encode($jsonData);  
        //print_r($jsonDataEncoded);die();      
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);     
        $result = curl_exec($ch);
        curl_close($ch);        
        $hasil = json_decode($result, true); 
        //print_r($hasil);die();       
       
        if ($hasil['status'] == 1) 
        {    
            $this->session->set_flashdata('message', 'Data Berhasil di Rubah'); 
            redirect('Peta/index','refresh');
        }
        else
        {
            $this->session->set_flashdata('error', 'Data gagal di Rubah');
            redirect('Peta/index','refresh');
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
}
?>