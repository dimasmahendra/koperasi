<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<style type="text/css">
  .display .headermutasi td, th {
    border: 2px solid #dfe0e0;
    background-color: #203864;
    color: white;
    padding: 5px 15px;   
    text-align: center; 
  }
  .display .tabelmutasi td, th {
    border: 2px solid #dfe0e0;
    padding: 5px 15px;
  }
  .infoheadermutasi {
    text-align: left;
  }
  ol#myList {
    margin-left: -17px;
    list-style-type:none;
    text-align: left;
}
  .display .tabelPredikat td {
    padding: 10px 0px;
    font-size:17px;
  }
</style>

<style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
body {
    margin-top:27px;
    }
    .panel-heading{
      font-size: 15px;
      font-weight: bold;
    }
    /* Force table to not be like tables anymore */
    #tabelAnggotaKoperasi table, #tabelAnggotaKoperasi thead, #tabelAnggotaKoperasi tbody, #tabelAnggotaKoperasi th, #tabelAnggotaKoperasi td, #tabelAnggotaKoperasi tr{
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    #tabelAnggotaKoperasi thead tr{
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    #tabelAnggotaKoperasi tr{ border: 3px solid #ccc; }

    #tabelAnggotaKoperasi td{
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    #tabelAnggotaKoperasi td:before {
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 6px;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
    }

    /*
    Label the data
    */
    #tabelAnggotaKoperasi td:nth-of-type(1):before { content: "No"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "No. Rekening"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Nama"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(5):before { content: "Jumlah Simpanan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(6):before { content: "Tenor"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(7):before { content: "Bunga"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(8):before { content: "Jumlah Bunga"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(9):before { content: "Total"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(10):before { content: "Tanggal Penyimpanan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(11):before { content: "Tanggal Pengambilan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(5) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(6) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(7) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(8) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(9) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(10) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(11) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(12) { width: 50%;text-align: right;}
  }


  </style>


</head>
<body>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Indikator Kesehatan Koperasi&nbsp;&nbsp;
              <a class="btn-sm btn-primary visible-lg-inline-block" href ="<?= base_url('IndikatorKesehatanKoperasiAPEX/index') ?>">Input Indikator Kesehatan</a>
              <a class="btn-sm btn-primary hidden-lg" href ="<?= base_url('IndikatorKesehatanKoperasiAPEX/index') ?>"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Input Indikator Kesehatan</a>
          </div>
          <div class="panel-body">

          <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                </div><?php } ?>

             <?php if($this->session->flashdata('warning')){?> 
                <div class="alert bg-warning" role="warning">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('warning')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                </div><?php } ?>

              <?php if($this->session->flashdata('error')){?> 
                    <div class="alert bg-danger" role="alert">
                      <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                      <?php echo $this->session->flashdata('error')?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                    </div><?php } ?>

          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                <thead class="headermutasi">
                  <tr>
                    <th>No</th>
                    <th>Aspek yang dinilai</th>
                    <th>Komponen</th>
                    <th colspan="2">Bobot Penilaian</th>
                  </tr>
                </thead>
                <tbody class="tabelmutasi">
                <tr>
                  <td>1</td>
                  <td colspan="2">Permodalan</td>
                  <td></td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['permodalan']['permodalanTotalAset']+$data['permodalan']['permodalanBerisiko']+$data['permodalan']['permodalanModalSendiri']?></li>
                    </ol>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <ol type="a">
                      <li>Rasio Modal Sendiri terhadap Total Aset</li>
                      <li>Rasio Modal Sendiri terhadap Pinjaman diberikan yang berisiko</li>
                      <li>Rasio Kecukupan Modal Sendiri</li>
                    </ol>
                  </td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['permodalan']['permodalanTotalAset'];?></li>
                      <li><?php echo $data['permodalan']['permodalanBerisiko'];?></li>
                      <li><?php echo $data['permodalan']['permodalanModalSendiri'];?></li>
                    </ol>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td colspan="2">Kualitas Aktiva Produktif</td>
                  <td></td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['aktifa']['aktifaVolume']+$data['aktifa']['aktifaPinjaman']+$data['aktifa']['aktifaCadangan']+$data['aktifa']['aktifaBerisiko']?></li>
                    </ol>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <ol type="a">
                      <li>Rasio Volume Pinjaman pada anggota terhadap volume pinjaman diberikan</li>
                      <li>Rasio Risiko Pinjaman Bermasalah Terhadap Pinjaman yang diberikan</li>
                      <li>Rasio Cadangan Risiko Terhadap Pinjaman Bermasalah</li>
                      <li>Rasio Pinjaman yang berisiko terhadap pinjaman yang diberikan</li>
                    </ol>
                  </td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['aktifa']['aktifaVolume'];?></li>
                      <li><?php echo $data['aktifa']['aktifaPinjaman'];?></li>
                      <li><?php echo $data['aktifa']['aktifaCadangan'];?></li>
                      <li><?php echo $data['aktifa']['aktifaBerisiko'];?></li>
                    </ol>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td colspan="2">Manajemen</td>
                  <td></td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['aspekpertanyaan']['manajemenumum']+$data['aspekpertanyaan']['kelembagaan']+$data['aspekpertanyaan']['permodalan']+$data['aspekpertanyaan']['aktiva']+$data['aspekpertanyaan']['likuiditas']?></li>
                    </ol>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <ol type="a">
                      <li>Manajemen Umum</li>
                      <li>Kelembagaan</li>
                      <li>Manajemen Permodalan</li>
                      <li>Manajemen Aktiva</li>
                      <li>Manajemen Likuiditas</li>
                    </ol>
                  </td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['aspekpertanyaan']['manajemenumum'];?></li>
                      <li><?php echo $data['aspekpertanyaan']['kelembagaan'];?></li>
                      <li><?php echo $data['aspekpertanyaan']['permodalan'];?></li>
                      <li><?php echo $data['aspekpertanyaan']['aktiva'];?></li>
                      <li><?php echo $data['aspekpertanyaan']['likuiditas'];?></li>
                    </ol>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td colspan="2">Efisiensi</td>
                  <td></td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['efisiensi']['efisiensiBruto']+$data['efisiensi']['efisiensiSHU']+$data['efisiensi']['efisiensiPelayanan']?></li>
                    </ol>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <ol type="a">
                      <li>Rasio beban operasi anggota terhadap partisipasi bruto</li>
                      <li>Rasio beban usaha terhadap SHU Kotor</li>
                      <li>Rasio efisiensi pelayanan</li>
                    </ol>
                  </td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['efisiensi']['efisiensiBruto'];?></li>
                      <li><?php echo $data['efisiensi']['efisiensiSHU'];?></li>
                      <li><?php echo $data['efisiensi']['efisiensiPelayanan'];?></li>
                    </ol>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td colspan="2">Likuiditas</td>
                  <td></td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['likuiditas']['likuiditasKas']+$data['likuiditas']['likuiditasPinjaman']?></li>
                    </ol>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <ol type="a">
                      <li>Rasio Kas</li>
                      <li>Rasio Pinjamn yang diberikan terhadap dana yang diterima</li>
                    </ol>
                  </td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['likuiditas']['likuiditasKas'];?></li>
                      <li><?php echo $data['likuiditas']['likuiditasPinjaman'];?></li>
                    </ol>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td colspan="2">Kemandirian dan Pertumbuhan</td>
                  <td></td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['KemandirianPertumbuhan']['KemandirianPertumbuhanAset']+$data['KemandirianPertumbuhan']['KemandirianPertumbuhanModalSendiri']+$data['KemandirianPertumbuhan']['KemandirianPertumbuhanOperasional']?></li>
                    </ol>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <ol type="a">
                      <li>Rentabilitas aset</li>
                      <li>Rentabilitas Modal Sendiri</li>
                      <li>Kemandirian Operasional Pelayanan</li>
                    </ol>
                  </td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['KemandirianPertumbuhan']['KemandirianPertumbuhanAset'];?></li>
                      <li><?php echo $data['KemandirianPertumbuhan']['KemandirianPertumbuhanModalSendiri'];?></li>
                      <li><?php echo $data['KemandirianPertumbuhan']['KemandirianPertumbuhanOperasional'];?></li>
                    </ol>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td colspan="2">Jatidiri Koperasi</td>
                  <td></td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['JatidiriKoperasi']['JatidiriKoperasiBrutto']+$data['JatidiriKoperasi']['JatidiriKoperasiPEA']?></li>
                    </ol>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <ol type="a">
                      <li>Rasio partisipasi bruto</li>
                      <li>Rasio promosi ekonomi anggota (PEA)</li>
                    </ol>
                  </td>
                  <td>
                    <ol id="myList">
                      <li><?php echo $data['JatidiriKoperasi']['JatidiriKoperasiBrutto'];?></li>
                      <li><?php echo $data['JatidiriKoperasi']['JatidiriKoperasiPEA'];?></li>
                    </ol>
                  </td>
                  <td></td>
                </tr>
                </tbody>
          </table>

          <table id="tabelAnggotaKoperasi" border="0" class="display" cellspacing="0" width="100%" style="margin-top: 25px;">
                <tbody class="tabelPredikat">

                  <tr>
                    <td width="10%"><b>Skor</b></td>
                    <td><b>:</b></td>
                    <td><b><?php echo $data['predikat']['skor'];?></b></td>
                  </tr>
                  <tr>
                    <td width="10%"><b>Predikat</td>
                    <td><b>:</b></td>
                    <td><b><?php echo $data['predikat']['predikat'];?></b></td>
                  </tr>
                  <tr>
                    <td width="10%"><b>Tanggal</td>
                    <td><b>:</b></td>
                    <td><b><?php echo $data['predikat']['tanggal'];?></b></td>
                  </tr>
                  
                </tbody>
          </table>
          
          </div>
        </div>
      </div>
    </div><!--/.row--> 


</div>