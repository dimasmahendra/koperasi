<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakLaporanFormPengajuanSertifikatNIK extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');    
        $this->load->model(array('Username_model','Sidebar_model','Getmykoperasi_model' ));
        $this->load->helper(array('form','file','url','html'));
	}   
    
    function getPageCount() {
        return count($this->pages);
    }

    public function pdf()
    {

        $cssUrl = base_url('asset_admin/css/cetaklaporansertifikatNIK.css');
        $this->load->library('m_pdf');

        $data['myPengurusKoperasi'] = $this->Getmykoperasi_model->myPengurusKoperasi();
        $data['myKoperasi'] = $this->Getmykoperasi_model->myKoperasi(); 
        
        $a = substr($data['myKoperasi']['npwp'],0,2);
        $b = substr($data['myKoperasi']['npwp'],2,3);
        $c = substr($data['myKoperasi']['npwp'],5,3);
        $d = substr($data['myKoperasi']['npwp'],8,1);
        $e = substr($data['myKoperasi']['npwp'],9,3);
        $f = substr($data['myKoperasi']['npwp'],12,3);
        
        $data['npwp'] = array(
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'e' => $e,
            'f' => $f   
        );          
        //Memotong kata kabupaten atau kota
        $kabkota = strtoupper($data['myKoperasi']['kabupatenkota_nama']);
        if (substr($kabkota,0,10)=="KABUPATEN ") {
            $data['kabkota']= substr($kabkota,10);
        }
        else if(substr($kabkota,0,5)=="KOTA "){
            $data['kabkota']= substr($kabkota,5);
        }

        //hari tanggal nama bulan dan tahun
        $tanggal=date("m");
        $bulan = array(1=>'Januari', 2=>'Februari', 3=>'Maret',
            4=>'April', 5=>'Mei', 6=>'Juni',
            7=>'Juli', 8=>'Agustus', 9=>'September',
            10=>'Oktober', 11=>'November', 12=>'Desember');
        $hari = Array ("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
        //setlocale(LC_ALL, 'IND');
        //$monthNum= 3;
        // $dateObj   = DateTime::createFromFormat('!m', $monthNum));
        // $monthName = $dateObj->format('F'); // March
        $data['today']= date('d').' '.$bulan[date("n")].' '.date('Y');

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

        if($tanggal <= 3)
        {
            $data['tgldoc']=date('Y')." Triwulan 1";
        }
        else if ($tanggal <= 6 && $tanggal > 3) {
            $data['tgldoc']=date('Y')." Triwulan 2";
        }
        else if ($tanggal <= 9 && $tanggal > 6) {
            $data['tgldoc']=date('Y')." Triwulan 3";
        }
        else {
            $data['tgldoc']=date('Y')." Triwulan 4";
        }

        $html=$this->load->view('viewCetakFormPengajuanSertifikatNIK.php',$data, true); //load the pdf_output.php by passing our data and get all        
        $pdfFilePath ="mypdfName-".time()."-download.pdf";

        $pdf = $this->m_pdf->load();
        $stylesheet = file_get_contents($cssUrl);
        
        $pdf->AddPage('L');
        $pdf->WriteHTML($stylesheet,1);
        $pdf->WriteHTML($html,2);
        $pdf->Output($pdfFilePath, "D");
    }       
}?>