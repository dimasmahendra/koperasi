<?php
class Getmykoperasi_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function myKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getidentitaskoperasi';
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
        $hasil = json_decode($result, true);
        //print_r($hasil['status']);die();
        if($hasil['status'] == 0){
            $data['nama'] = "";
            $data['email'] = "";
            $data['telepon'] = "";
            $data['alamat'] = "";
            $data['t4KedudukanKop'] = "";
            $data['nomorinduk'] = "";
            $data['latitude'] = "";
            $data['longitude'] = "";
            $data['kodepos'] = "";
            $data['fax'] = "";
            $data['website'] = "";
            $data['usernamessp'] = "";     

            $data['kelurahan_nama'] = "";
            $data['kelurahan_id']   = "";
            $data['kecamatan_nama'] = "";
            $data['kecamatan_id']   = "";
            $data['kabupatenkota_nama'] = "";
            $data['kabupatenkota_id']   = "";
            $data['provinsi_nama'] = "";
            $data['provinsi_id']   = "";
            $data['notaris'] = "";
            $data['camat'] = ""; 
            $data['jangkawaktu'] = "";
            $data['npwp'] = ""; 
            $data['indikatorusaha_tahun1'] = array(
                'tahun' => '',
                'modalsendiri' => 0,
                'modalluar' => 0,
                'asset' => 0,
                'volumeusaha' => 0,
                'selisihhasilusaha' => 0
            );
            $data['indikatorusaha_tahun2'] = array(
                'tahun' => '',
                'modalsendiri' => 0,
                'modalluar' => 0,
                'asset' => 0,
                'volumeusaha' => 0,
                'selisihhasilusaha' => 0
            );
            $data['indikatorusaha_tahun3'] = array(
                'tahun' => '',
                'modalsendiri' => 0,
                'modalluar' => 0,
                'asset' => 0,
                'volumeusaha' => 0,
                'selisihhasilusaha' => 0
            );

            $data['indikatorkelembagaan_tahun1'] = array(
                'tahun' => '',
                'totalAnggotaPria' => '',
                'totalAnggotaWanita' => '',
                'totalKaryawanPria' => '',
                'totalKaryawanWanita' => '',
                'totalManajerPria' => '',
                'totalManajerWanita' => '',
                'tanggalRat' => ''
            );
            $data['indikatorkelembagaan_tahun2'] = array(
                'tahun' => '',
                'totalAnggotaPria' => '',
                'totalAnggotaWanita' => '',
                'totalKaryawanPria' => '',
                'totalKaryawanWanita' => '',
                'totalManajerPria' => '',
                'totalManajerWanita' => '',
                'tanggalRat' => ''
            );
            $data['indikatorkelembagaan_tahun3'] = array(
                'tahun' => '',
                'totalAnggotaPria' => '',
                'totalAnggotaWanita' => '',
                'totalKaryawanPria' => '',
                'totalKaryawanWanita' => '',
                'totalManajerPria' => '',
                'totalManajerWanita' => '',
                'tanggalRat' => ''
            );

            $data['tipekoperasi_id'] = "";
            $data['bentukkoperasi_id'] = "";
            $data['binaan'] ="";
            $data['kelompok'] = "";

            $data['bentukkoperasi_id'] = "";
            $data['bentukkoperasi_nama'] = "";
            $data['tipekoperasi_id'] = "";
            $data['tipekoperasi_nama'] = "";
            $data['kelompokkoperasi_id'] = "";
            $data['kelompokkoperasi_nama'] = ""; 
        }
        else{
            $data['nama'] = $hasil['data']['identitaskoperasi'][0]['nama'];
            $data['email'] = $hasil['data']['identitaskoperasi'][0]['email'];
            $data['telepon'] = $hasil['data']['identitaskoperasi'][0]['telepon'];
            $data['alamat'] = $hasil['data']['identitaskoperasi'][0]['alamat'];
            $data['t4KedudukanKop'] = $hasil['data']['identitaskoperasi'][0]['alamat'];
            $data['nomorinduk'] = $hasil['data']['identitaskoperasi'][0]['nomorinduk'];
            $data['latitude'] = $hasil['data']['identitaskoperasi'][0]['latitude'];
            $data['longitude'] = $hasil['data']['identitaskoperasi'][0]['longitude'];
            $data['kodepos'] = $hasil['data']['identitaskoperasi'][0]['kodepos'];
            $data['fax'] = $hasil['data']['identitaskoperasi'][0]['fax'];
            $data['website'] = $hasil['data']['identitaskoperasi'][0]['website'];
            $data['usernamessp'] = $hasil['data']['identitaskoperasi'][0]['usernamessp'];     

            $data['kelurahan_nama'] = $hasil['data']['alamatlengkap'][0]['kelurahan']['nama'];
            $data['kelurahan_id']   = $hasil['data']['alamatlengkap'][0]['kelurahan']['id'];
            $data['kecamatan_nama'] = $hasil['data']['alamatlengkap'][0]['kecamatan']['nama'];
            $data['kecamatan_id']   = $hasil['data']['alamatlengkap'][0]['kecamatan']['id'];
            $data['kabupatenkota_nama'] = $hasil['data']['alamatlengkap'][0]['kabupatenkota']['nama'];
            $data['kabupatenkota_id']   = $hasil['data']['alamatlengkap'][0]['kabupatenkota']['id'];
            $data['provinsi_nama'] = $hasil['data']['alamatlengkap'][0]['provinsi']['nama'];
            $data['provinsi_id']   = $hasil['data']['alamatlengkap'][0]['provinsi']['id'];
            $data['notaris'] = $hasil['data']['identitaskoperasi'][0]['notaris'];
            $data['camat'] = $hasil['data']['identitaskoperasi'][0]['camat']; 
            $data['jangkawaktu'] = $hasil['data']['identitaskoperasi'][0]['jangkawaktu'];
            $data['npwp'] = $hasil['data']['identitaskoperasi'][0]['npwp']; 

            $data['indikatorusaha_tahun1'] = $hasil['data']['indikatorusaha'][0];
            $data['indikatorusaha_tahun2'] = $hasil['data']['indikatorusaha'][1];
            $data['indikatorusaha_tahun3'] = $hasil['data']['indikatorusaha'][2];

            $data['indikatorkelembagaan_tahun1'] = $hasil['data']['indikatorkelembagaan'][0];
            $data['indikatorkelembagaan_tahun2'] = $hasil['data']['indikatorkelembagaan'][1];
            $data['indikatorkelembagaan_tahun3'] = $hasil['data']['indikatorkelembagaan'][2];

            $data['tipekoperasi_id'] = $hasil['data']['identitaskoperasi'][0]['tipekoperasi']['kodetipekoperasi'];
            $data['bentukkoperasi_id'] = $hasil['data']['identitaskoperasi'][0]['bentukkoperasi_id'];
            $data['binaan'] = $hasil['data']['identitaskoperasi'][0]['binaan'];
            $data['kelompok'] = $hasil['data']['identitaskoperasi'][0]['kelompokkoperasi'][0]['kelompok'];

            $data['bentukkoperasi_id'] = $hasil['data']['identitaskoperasi'][0]['bentukkoperasi']['id'];
            $data['bentukkoperasi_nama'] = $hasil['data']['identitaskoperasi'][0]['bentukkoperasi']['bentuk'];
            $data['tipekoperasi_id'] = $hasil['data']['identitaskoperasi'][0]['tipekoperasi']['id'];
            $data['tipekoperasi_nama'] = $hasil['data']['identitaskoperasi'][0]['tipekoperasi']['kodetipekoperasi'];
            $data['kelompokkoperasi_id'] = $hasil['data']['identitaskoperasi'][0]['kelompokkoperasi'][0]['id'];
            $data['kelompokkoperasi_nama'] = $hasil['data']['identitaskoperasi'][0]['kelompokkoperasi'][0]['kelompok']; 
        }        
        
        if (empty($hasil['data']['identitaskoperasi'][0]['anggarandasar'])){
            $data['nomorpad'] = "";
            $data['tanggalpad'] = "";
            $data['nomorlembaran'] = "";
            $data['tanggallembaran'] = "";
            $data['notarispad'] = "";
            $data['camatpad'] = "";
        }  
        else{
            $data['nomorpad'] = $hasil['data']['identitaskoperasi'][0]['anggarandasar'][0]['nomorpad'];
            $data['tanggalpad'] = $hasil['data']['identitaskoperasi'][0]['anggarandasar'][0]['tanggalpad'];        
            $data['nomorlembaran'] = $hasil['data']['identitaskoperasi'][0]['anggarandasar'][0]['nomorlembaran'];
            $data['tanggallembaran'] = $hasil['data']['identitaskoperasi'][0]['anggarandasar'][0]['tanggallembaran'];
            $data['notarispad'] = $hasil['data']['identitaskoperasi'][0]['anggarandasar'][0]['notarispad'];
            $data['camatpad'] = $hasil['data']['identitaskoperasi'][0]['anggarandasar'][0]['camatpad'];
        }    

        if (empty($hasil['data']['identitaskoperasi'][0]['pengesahan'])){
            $data['nomorbh'] = "";
            $data['tanggalbh'] = "";
            $data['nolembaran'] = "";
            $data['tgllembaran'] = "";
            $data['pemberibadanhukum_id'] = 5;
            $data['pemberibadanhukum'] = "";
        }
        else{
            $data['nomorbh'] = $hasil['data']['identitaskoperasi'][0]['pengesahan']['nomorbh'];
            $data['tanggalbh'] = $hasil['data']['identitaskoperasi'][0]['pengesahan']['tanggalbh'];
            $data['nolembaran'] = $hasil['data']['identitaskoperasi'][0]['pengesahan']['nolembaran'];
            $data['tgllembaran'] = $hasil['data']['identitaskoperasi'][0]['pengesahan']['tgllembaran'];            
            $data['pemberibadanhukum_id'] = $hasil['data']['identitaskoperasi'][0]['pengesahan']['pemberibadanhukum']['id'];
            $data['pemberibadanhukum'] = $hasil['data']['identitaskoperasi'][0]['pengesahan']['pemberibadanhukum']['keterangan']; 
        }                

        if (empty($hasil['data']['identitaskoperasi'][0]['sektorusaha'])) {
            $data['sektor'] = "";
            $data['sektorusaha_id'] = "K";
        }
        else{            
            $data['sektor'] = $hasil['data']['identitaskoperasi'][0]['sektorusaha']['sektor'];
            $data['sektorusaha_id'] = $hasil['data']['identitaskoperasi'][0]['sektorusaha']['id'];
        }      
        /* ================================================= Data Lainnya =======================================================*/
               
        /* ================================================= Data Lainnya =======================================================*/

        return $data;
    }

    public function getKelompokKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getkelompokkoperasi';
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
        $hasil = json_decode($result, true);
        /*print_r($hasil);die();*/
        return $hasil;
    }

    public function getSektorUsaha()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getsektorusaha';
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
        $hasil = json_decode($result, true);
        //print_r($hasil);die();
        return $hasil;
    }
    
    public function myPengurusKoperasi()
    {
        $session_data   = $this->session->userdata('logged_in');
        $url = URL_APIZ.'getidentitaskoperasi';
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
        $hasil = json_decode($result, true);

        // print_r($hasil);die();
        if($hasil['status'] == 0){
            $data['ketua1_tahun1'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['ketua2_tahun1'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['ketua3_tahun1'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['ketua1_tahun2'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['ketua2_tahun2'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['ketua3_tahun2'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['ketua1_tahun3'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['ketua2_tahun3'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['ketua3_tahun3'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');

            $data['sekretaris1_tahun1'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['sekretaris2_tahun1'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['sekretaris3_tahun1'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['sekretaris1_tahun2'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['sekretaris2_tahun2'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['sekretaris3_tahun2'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['sekretaris1_tahun3'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['sekretaris2_tahun3'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['sekretaris3_tahun3'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');

            $data['bendahara1_tahun1'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['bendahara2_tahun1'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['bendahara3_tahun1'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['bendahara1_tahun2'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['bendahara2_tahun2'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['bendahara3_tahun2'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['bendahara1_tahun3'] = array('jabatan' => '', 'nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['bendahara2_tahun3'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');
            $data['bendahara3_tahun3'] = array('nama' => '', 'telepon' => '', 'pendidikan' => '');

            $data['anggota1_tahun1'] = array('nama' => '', 'telepon' => '');
            $data['anggota2_tahun1'] = array('nama' => '', 'telepon' => '');
            $data['ketuapengawas_tahun1'] = array('jabatan' => '', 'nama' => '', 'telepon' => '');
            $data['anggota1_tahun2'] = array('nama' => '', 'telepon' => '');
            $data['anggota2_tahun2'] = array('nama' => '', 'telepon' => '');
            $data['ketuapengawas_tahun2'] = array('jabatan' => '', 'nama' => '', 'telepon' => '');
            $data['anggota1_tahun3'] = array('nama' => '', 'telepon' => '');
            $data['anggota2_tahun3'] = array('nama' => '', 'telepon' => '');
            $data['ketuapengawas_tahun3'] = array('jabatan' => '', 'nama' => '', 'telepon' => '');

            $data['manajer1_tahun1'] = array('jabatan' => '', 'nama' => '', 'telepon' => '');
            $data['manajer2_tahun1'] = array('nama' => '', 'telepon' => '');
            $data['manajer3_tahun1'] = array('nama' => '', 'telepon' => '');
            $data['manajer1_tahun2'] = array('jabatan' => '', 'nama' => '', 'telepon' => '');
            $data['manajer2_tahun2'] = array('nama' => '', 'telepon' => '');
            $data['manajer3_tahun2'] = array('nama' => '', 'telepon' => '');
            $data['manajer1_tahun3'] = array('jabatan' => '', 'nama' => '', 'telepon' => '');
            $data['manajer2_tahun3'] = array('nama' => '', 'telepon' => '');
            $data['manajer3_tahun3'] = array('nama' => '', 'telepon' => '');

        }else{
            $data['ketua1_tahun1'] = $hasil['data']['ketuakoperasi'][0];
            $data['ketua2_tahun1'] = $hasil['data']['ketuakoperasi'][1];
            $data['ketua3_tahun1'] = $hasil['data']['ketuakoperasi'][2];
            $data['ketua1_tahun2'] = $hasil['data']['ketuakoperasi'][3];
            $data['ketua2_tahun2'] = $hasil['data']['ketuakoperasi'][4];
            $data['ketua3_tahun2'] = $hasil['data']['ketuakoperasi'][5];
            $data['ketua1_tahun3'] = $hasil['data']['ketuakoperasi'][6];
            $data['ketua2_tahun3'] = $hasil['data']['ketuakoperasi'][7];
            $data['ketua3_tahun3'] = $hasil['data']['ketuakoperasi'][8];


            $data['sekretaris1_tahun1'] = $hasil['data']['sekretariskoperasi'][0];
            $data['sekretaris2_tahun1'] = $hasil['data']['sekretariskoperasi'][1];
            $data['sekretaris3_tahun1'] = $hasil['data']['sekretariskoperasi'][2];
            $data['sekretaris1_tahun2'] = $hasil['data']['sekretariskoperasi'][3];
            $data['sekretaris2_tahun2'] = $hasil['data']['sekretariskoperasi'][4];
            $data['sekretaris3_tahun2'] = $hasil['data']['sekretariskoperasi'][5];
            $data['sekretaris1_tahun3'] = $hasil['data']['sekretariskoperasi'][6];
            $data['sekretaris2_tahun3'] = $hasil['data']['sekretariskoperasi'][7];
            $data['sekretaris3_tahun3'] = $hasil['data']['sekretariskoperasi'][8];

            $data['bendahara1_tahun1'] = $hasil['data']['bendaharakoperasi'][0];
            $data['bendahara2_tahun1'] = $hasil['data']['bendaharakoperasi'][1];
            $data['bendahara3_tahun1'] = $hasil['data']['bendaharakoperasi'][2];
            $data['bendahara1_tahun2'] = $hasil['data']['bendaharakoperasi'][3];
            $data['bendahara2_tahun2'] = $hasil['data']['bendaharakoperasi'][4];
            $data['bendahara3_tahun2'] = $hasil['data']['bendaharakoperasi'][5];
            $data['bendahara1_tahun3'] = $hasil['data']['bendaharakoperasi'][6];
            $data['bendahara2_tahun3'] = $hasil['data']['bendaharakoperasi'][7];
            $data['bendahara3_tahun3'] = $hasil['data']['bendaharakoperasi'][8];

            $data['anggota1_tahun1'] = $hasil['data']['pengawaskoperasi'][0];
            $data['anggota2_tahun1'] = $hasil['data']['pengawaskoperasi'][1];
            $data['ketuapengawas_tahun1'] = $hasil['data']['pengawaskoperasi'][2];
            $data['anggota1_tahun2'] = $hasil['data']['pengawaskoperasi'][3];
            $data['anggota2_tahun2'] = $hasil['data']['pengawaskoperasi'][4];
            $data['ketuapengawas_tahun2'] = $hasil['data']['pengawaskoperasi'][5];
            $data['anggota1_tahun3'] = $hasil['data']['pengawaskoperasi'][6];
            $data['anggota2_tahun3'] = $hasil['data']['pengawaskoperasi'][7];
            $data['ketuapengawas_tahun3'] = $hasil['data']['pengawaskoperasi'][8];

            $data['manajer1_tahun1'] = $hasil['data']['manajerkoperasi'][0];
            $data['manajer2_tahun1'] = $hasil['data']['manajerkoperasi'][1];
            $data['manajer3_tahun1'] = $hasil['data']['manajerkoperasi'][2];
            $data['manajer1_tahun2'] = $hasil['data']['manajerkoperasi'][3];
            $data['manajer2_tahun2'] = $hasil['data']['manajerkoperasi'][4];
            $data['manajer3_tahun2'] = $hasil['data']['manajerkoperasi'][5];
            $data['manajer1_tahun3'] = $hasil['data']['manajerkoperasi'][6];
            $data['manajer2_tahun3'] = $hasil['data']['manajerkoperasi'][7];
            $data['manajer3_tahun3'] = $hasil['data']['manajerkoperasi'][8];
        }
        return $data;
    }
}
?>