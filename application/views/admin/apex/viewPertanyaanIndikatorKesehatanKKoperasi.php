<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<link href="<?= base_url('asset_admin/css/custom.min.css') ?>" rel="stylesheet">

<style type="text/css">
#manajemenumum table tbody tr{
  padding:10px 
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

          <!-- Smart Wizard -->
                    <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Manajemen Umum</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>&nbsp; &nbsp; &nbsp; Kelembagaan &nbsp; &nbsp; &nbsp;</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>&nbsp; &nbsp; &nbsp; &nbsp; Permodalan &nbsp; &nbsp; &nbsp; &nbsp;</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Aktiva &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-5">
                            <span class="step_no">5</span>
                            <span class="step_descr">
                                              Step 5<br />
                                              <small>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Likuiditas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <form id="tbl_pertanyaanIKesKop" class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>IndikatorKesehatanKoperasiAPEX/insertPertanyaanIndikatorKesehatan">
                      <div id="step-1">
                        <table border="1" width="100%">
                          <thead>
                            <tr>
                              <th class="text-center">No.</th>
                              <th class="text-center">Pertanyaan</th>
                              <th class="text-center" width="15%">Pilih</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">1.</td>
                              <td>Apakah KSP/USP Koperasi memiliki visi, misi dan tujuan yang jelas (dibuktikan dengan dokumen tertulis)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn1" id="radiobtn1" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn1" id="radiobtn1" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">2.</td>
                              <td>Apakah KSP/USP Koperasi telah memiliki rencana kerja jangka panjang minimal untuk 3 tahun ke depan dan dijadikan sebagai acuan KSP/USP Koperasi dalam menjalankan usahanya (dibuktikan dengan dokumen tertulis)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn2" id="radiobtn2" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn2" id="radiobtn2" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">3.</td>
                              <td>Apakah KSP/USP Koperasi memiliki rencana kerja tahunan yang digunakan sebagai dasar acuan kegiatan usaha selama 1 tahun (dibuktikan dengan dokumen tertulis)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn3" id="radiobtn3" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn3" id="radiobtn3" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">4.</td>
                              <td>Adakah kesesuaian antara rencana kerja jangka pendek dengan rencana jangka panjang (dibuktikan dengan dokumen tertulis)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn4" id="radiobtn4" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn4" id="radiobtn4" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">5.</td>
                              <td>Apakah visi, misi, tujuan dan rencana kerja diketahui dan dipahami oleh pengurus, pengawas, pengelola dan seluruh karyawan (dengan cara pengecekan silang)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn5" id="radiobtn5" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn5" id="radiobtn5" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">6.</td>
                              <td>Pengambilan keputusan yang bersifat operasional dilakukan oleh pengelola secara independen (Konfirmasi kepada pengurus atau pengawas)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn6" id="radiobtn6" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn6" id="radiobtn6" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">7.</td>
                              <td>Pengurus dan atau pengelola KSP/USP Koperasi memiliki komitmen untuk menangani permasalahan yang dihadapi serta melakukan tindakan perbaikan yang diperlukan</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn7" id="radiobtn7" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn7" id="radiobtn7" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">8.</td>
                              <td>KSP/USP Koperasi memiliki tata tertib kerja SDM yang meliputi disiplin kerja serta didukung sarana kerja yang memadai dalam melaksanakan pekerjaan (dibuktikan dengan dokumen tertulis dan pengecekan fisik sarana kerja)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn8" id="radiobtn8" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn8" id="radiobtn8" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">9.</td>
                              <td>Pengurus KSP/USP Koperasi yang mengangkat pengelola, tidak mencampuri kegiatan operasional sehari-hari yang cenderung menguntungkan kepentingan sendiri, keluarga atau kelompoknya sehingga dapat merugikan KSP/USP Koperasi (dilakukan konfirmasi kepada pengelola dan atau pengawas)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn9" id="radiobtn9" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn9" id="radiobtn9" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">10.</td>
                              <td>Angota KSP/USP Koperasi sebagai pemilik mempunyai kemampuan untuk meningkatkan permodalan KSP/USP Koperasi sesuai dengan ketentuan yang berlaku (pengecekan silang dilakukan terhadap partisipasi modal anggota)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn10" id="radiobtn10" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn10" id="radiobtn10" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">11.</td>
                              <td>Pengurus, Pengawas, Pengelola KSP/USP Koperasi di dalam melaksanakan kegiatan operasional tidak melakukan hal-hal yang cenderung menguntungkan diri sendiri, keluarga dan kelompoknya, atau berpotensi merugikan KSP/USP Koperasi (konfirmasi dengan mitra kerja)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn11" id="radiobtn11" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn11" id="radiobtn11" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">12.</td>
                              <td>Pengurus melaksanakan fungsi pengawasan terhadap pelaksanaan tugas pengelola sesuai dengan tugas dan wewenangnya secara efektif (pengecekan silang kepada pengelola dan atau pengawas)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn12" id="radiobtn12" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn12" id="radiobtn12" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                      <div id="step-2">
                        <table border="1" width="100%">
                          <thead>
                            <tr>
                              <th class="text-center">No.</th>
                              <th class="text-center">Pertanyaan</th>
                              <th class="text-center" width="15%">Pilih</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">13.</td>
                              <td>Bagan organisasi yang ada telah mencerminkan seluruh kegiatan KSP/USP Koperasi dan tidak terdapat jabatan kosong atau perangkapan jabatan. (dibuktikan dengan dokumen tertulis mengenai struktur organisasi dan <i>job description</i>)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn13" id="radiobtn13" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn13" id="radiobtn13" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">14.</td>
                              <td>KSP/USP Koperasi memiliki rincian tugas yang jelas untuk masing-masing karyawannya (yang dibuktikan dengan adanya dokumen tertulias tentang <i>job specification</i>)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn14" id="radiobtn14" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn14" id="radiobtn14" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">15.</td>
                              <td>Di dalam struktur kelembagaan KSP/USP Koperasi terdapat struktur yang melakukan fungsi sebagai dewan pengawas (yang dibuktikan dengan dokumen tertulis tentang struktur organisasi)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn15" id="radiobtn15" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn15" id="radiobtn15" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">16.</td>
                              <td>KSP/USP Koperasi terbukti mempunyai Standar Operasional dan Manajemen (SOM) dan Standar Operasional Prosedur (SOP) (dibuktikan dengan dokumen tertulis tentang SOM dan SOP KSP/USP Koperasi)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn16" id="radiobtn16" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn16" id="radiobtn16" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">17.</td>
                              <td>KSP/USP Koperasi telah menjalankan kegiatannya sesuai SOM dan SOP KSP/USP Koperasi (pengecekan silang antara pelaksanaan kegiatan dengan SOM dan SOP-nya)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn17" id="radiobtn17" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn17" id="radiobtn17" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">18.</td>
                              <td>KSP/USP Koperasi mempunyai sistem pengamanan yang baik terhadap semua dokumen penting (dibuktikan dengan adanya sistem pengamanan dokumen penting berikut sarana penyimpanannya)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn18" id="radiobtn18" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn18" id="radiobtn18" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                      <div id="step-3">
                        <table border="1" width="100%">
                          <thead>
                            <tr>
                              <th class="text-center">No.</th>
                              <th class="text-center">Pertanyaan</th>
                              <th class="text-center" width="15%">Pilih</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">19.</td>
                              <td>Tingkat pertumbuhan modal sendiri sama atau lebih besar dari tingkat pertumbuhan aset (dihitung berdasarkan data yang ada di Neraca)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn19" id="radiobtn19" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn19" id="radiobtn19" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">20.</td>
                              <td>Tingkat pertumbuhan modal sendiri yang berasal dari anggota sekurang kurangnya sebesar 10% dibandingkan tahun sebelumnya (dihitung berdasarakan data yang ada di Neraca)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn20" id="radiobtn20" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn20" id="radiobtn20" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">21.</td>
                              <td>Penyisihan cadangan dari SHU sama atau lebih besar dari seperempat SHU tahun berjalan</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn21" id="radiobtn21" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn21" id="radiobtn21" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">22.</td>
                              <td>Simpanan dan simpanan berjangka koperasi meningkat minimal 10% dari tahun sebelumnya</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn22" id="radiobtn22" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn22" id="radiobtn22" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">23.</td>
                              <td>Investasi harta tetap dari inventaris serta pendanaan ekspansi perkantoran dibiayai dengan modal sendiri (pengecekan silang dengan laporan sumber dan penggunaan dana)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn23" id="radiobtn23" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn23" id="radiobtn23" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div id="step-4">
                        <table border="1" width="100%">
                          <thead>
                            <tr>
                              <th class="text-center">No.</th>
                              <th class="text-center">Pertanyaan</th>
                              <th class="text-center" width="15%">Pilih</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">24.</td>
                              <td>Pinjaman dengan kolektibilitas lancar minimal sebesar 90% dari pinjaman yang diberikan (dibuktikan dengan laporan pengembalian pinjaman)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn24" id="radiobtn24" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn24" id="radiobtn24" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">25.</td>
                              <td>Setiap pinjaman yang diberikan didukung dengan agunan yang nilainya sama atau lebih besar dari pinjaman yang diberikan kecuali pinjaman bagi anggota sampai dengan 1 juta rupiah (dibuktikan dengan laporan pinjaman dan daftar agunannya)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn25" id="radiobtn25" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn25" id="radiobtn25" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">26.</td>
                              <td>Dana cadangan penghapusan pinjaman sama atau lebih besar dari jumlah pinjaman macet tahunan (dibuktikan dengan laporan kolektibilitas pinjaman dan cadangan penghapusan pinjaman)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn26" id="radiobtn26" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn26" id="radiobtn26" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">27.</td>
                              <td>Pinjaman macet tahun lalu dapat ditagih sekurang kurangnya sepertiganya (dibuktikan dengan laporan penagihan pinjaman macet tahunan)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn27" id="radiobtn27" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn27" id="radiobtn27" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">28.</td>
                              <td>KSP/USP Koperasi menerapkan prosedur pinjaman dilaksanakan dengan efektif (pengecekan silang antara pelaksanaan prosedur pinjaman dengan SOP-nya termasuk BMPP)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn28" id="radiobtn28" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn28" id="radiobtn28" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">29.</td>
                              <td>KSP/USP Koperasi menerapkan prosedur pinjaman dan dilaksanakan dengan efektif (pengecekan silang antara pelaksanaan prosedur pinjaman dengan SOP-nya termasuk BMPP)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn29" id="radiobtn29" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn29" id="radiobtn29" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">30.</td>
                              <td>Dalam memberikan pinjaman KSP/USP Koperasi mengambil keputusan berdasarkan prinsip kehati-hatian (dibuktikan dengan hasil analisis kelayakan pinjaman)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn30" id="radiobtn30" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn30" id="radiobtn30" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">31.</td>
                              <td>Keputusan pemberian pinjaman dan atau penempatan dana dilakukan melalui komite (dibuktikan dengan risalah rapat komite)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn31" id="radiobtn31" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn31" id="radiobtn31" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">32.</td>
                              <td>Setelah pinjaman diberikan KSP/USP Koperasi melakukan pemantauan terhadap penggunaan pinjaman serta kemampuan dan kepatuhan anggota atau peminjam dalam memenuhi kewajibannya (dibuktikan dengan laporan monitoring)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn32" id="radiobtn32" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn32" id="radiobtn32" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">33.</td>
                              <td>KSP/USP Koperasi melakukan peninjauan, penilaian dan pengikatan terhadap agunannya (dibuktikan dengan dokumen pengikatan dan atau penyerahan agunan)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn33" id="radiobtn33" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn33" id="radiobtn33" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div id="step-5">
                        <table border="1" width="100%">
                          <thead>
                            <tr>
                              <th class="text-center">No.</th>
                              <th class="text-center">Pertanyaan</th>
                              <th class="text-center" width="15%">Pilih</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">34.</td>
                              <td>Memiliki kebijakan tertulis mengenai pengendalian likuiditas (dibuktikan dengan dokumen tertulis mengenai perencanaan usaha)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn34" id="radiobtn34" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn34" id="radiobtn34" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">35.</td>
                              <td>Memiliki fasilitas pinjaman yang akan diterima dari lembaga lain untuk menjaga likuiditasnya (dibuktikan dengan dokumen tertulis mengenai kerjasama pendanaan dari lembaga keuangan lainnya)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn35" id="radiobtn35" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn35" id="radiobtn35" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">36.</td>
                              <td>Memiliki pedoman administrasi yang efektif untuk memantau kewajiban yang jatuh tempo (dibuktikan dengan adanya dokumen tertulis mengenai skedul penghimpunan simpanan dan pemberian pinjaman)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn36" id="radiobtn36" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn36" id="radiobtn36" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">37.</td>
                              <td>Memiliki kebijakan penghimpunan simpanan dan pemberian pinjaman sesuai dengan kondisi keuangan KSP/USP Koperasi (dibuktikan dengan kebijakan tertulis)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn37" id="radiobtn37" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn37" id="radiobtn37" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">38.</td>
                              <td>Memiliki sistem informasi manajemen yang memadai untuk pemantauan likuiditas (dibuktikan dengan dokumen tertulis berupa sistem pelaporan penghimpunan simpanan dan pemberian pinjaman)</td>
                              <td class="text-center">
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn38" id="radiobtn38" value="Ya" checked >Ya
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="radiobtn38" id="radiobtn38" value="Tidak" >Tidak
                                </label>
                              </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>

                    </div>
                    <!-- End SmartWizard Content -->

          </div>
        </div>
      </div>
    </div><!--/.row--> 


</div>

<script>
submitForms = function(){
    document.getElementById("tbl_pertanyaanIKesKop").submit();
}
</script>

<script src="<?= base_url('asset_admin/js/jquery.smartWizard.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/custom.min.js') ?>" rel="stylesheet"></script>

