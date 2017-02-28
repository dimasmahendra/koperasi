<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="<?= base_url('asset_admin/favicon.png') ?>" type="image/gif" sizes="16x16">
<title>Admin Smart Cooperative</title>

<link href="<?= base_url('asset_admin/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/styles.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/datepicker3.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/bootstrap-table.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/AdminLTE.min.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/lumino.glyphs.js') ?>" rel="stylesheet"></script>
<script type="text/javascript" src="https://kit.glyphs.co/3cg427.js"></script>
<style>
.badge {
  background: #cc0000;
}
.user-menu .badge {
  position: absolute;
    right: -5px;
    top: -5px;
    z-index: 100;
}
.dropdown-menu a {
  margin-bottom: 5px;
  
}
.dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus {
    color: #5f6468;
    text-decoration: none;
    background-color: #f8f8f8;
    outline: 0;
    
}
.text-muted {
    color: #999;
} 
</style>
</head>
<body>

<!-- ModalTransaksi -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Transaksi Koperasi</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda ingin melakukan transaksi ?</p>
      </div>

      <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>Transaksi/index">

      <div class="modal-footer">
        <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>

      </form>
    </div>    
  </div>
</div>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?= base_url('dashboard/index')?>" rel="stylesheet">
            <img src="<?= base_url('asset_admin/logokoperasi.png') ?>" alt="logotop" height="50" width="200">
        </a>  

        <ul class="user-menu">
          <li class="dropdown pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">                               
              Welcome, <?php echo $notif['username_sidebar']; ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">                 

                <li>
                  <a href="<?= base_url('Notifikasi/daftarNotifikasi') ?>" rel="stylesheet">
                    <svg class="glyph stroked empty message"><use xlink:href="#stroked-empty-message"/></svg>
                    <span id="pesan">Notifikasi</span>
                  </a>
                </li>

                <li>
                  <a href="<?= base_url('Profile/passwordIndex') ?>" rel="stylesheet">
                    <svg class="glyph stroked lock"><use xlink:href="#stroked-lock"></use></svg>
                    Ganti Password</a>
                </li>

                <li>
                  <a href="<?= base_url('Profile/index') ?>" rel="stylesheet">
                  <svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                  </svg> Lihat Profile</a>
                </li>

                <li>
                  <a href="<?= base_url('User/logoutKoperasi') ?>" rel="stylesheet">
                  <svg class="glyph stroked cancel">
                    <use xlink:href="#stroked-cancel"></use>
                  </svg> Logout</a>
                </li>
            </ul>
          </li>
      
          <li class="dropdown pull-right" data-toggle="tooltip" title="Info Kementrian" style="margin-right: 10px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg><span name="notif" class="badge"></span></a>
            <ul class="dropdown-menu" role="menu" style="width: 400px; overflow: scroll;">
            
           <?php if ($notif['hasil']['status'] == 0) { echo "<p align='center'><b>" . "Belum ada Notifikasi" . "</b></p>"; }?>
           <?php if ($notif['hasil']['status'] == 1) 
           { ?> 
              <?php foreach ($notif['hasil']['data'] as $row) { 
                date_default_timezone_set('Asia/Jakarta');
                $judul      = strlen($row['judul']);
                $tgl_skrang = date('Y-m-d H:i:s');?>

                    <?php if($row['jenis'] =='booking training koperasi' || $row['jenis'] =='booking training kementerian' || $row['jenis'] =='booking seminar koperasi' || $row['jenis'] =='booking seminar kementerian') { ?>
                      <li <?php if ($row['keterangan'] =='Belum Dibaca') { ?> class="active" <?php } ?>>

                        <a <?php if($row['jenis'] =='booking training koperasi') { echo "href=" . base_url('bookingTraining/daftarPemesanBookingTraining').'/'. $row['id_pesan'].'/'. $row['id'];} else if($row['jenis'] =='booking training kementerian') { echo "href=" . base_url('TrainingMenteri/daftarPesertaMenteri').'/'. $row['id_pesan'].'/'. $row['id'];} else if($row['jenis'] =='booking seminar koperasi') { echo "href=" . base_url('bookingSeminar/daftarPemesanBookingSeminar').'/'. $row['id_pesan'].'/'. $row['id'];} else if($row['jenis'] =='booking seminar kementerian') { echo "href=" . base_url('SeminarMenteri/daftarPesertaSeminarMenteri').'/'. $row['id_pesan'].'/'. $row['id'];}?> style="padding-left: 0px; padding-right: 0px; height: 50px;  margin-bottom: 0px;">

                          <?php if($row['jenis'] =='booking training koperasi') { ?>
                            <div class="col-sm-2">
                              <img src="<?= base_url('asset_admin/images/notif/2.png') ?>" height="30" width="40">
                            </div>
                          <?php } ?> 
                          <?php if($row['jenis'] =='booking training kementerian') { ?>
                            <div class="col-sm-2">
                              <img src="<?= base_url('asset_admin/images/notif/4.png') ?>" height="30" width="40">
                            </div>
                          <?php } ?>
                          <?php if($row['jenis'] =='booking seminar koperasi') { ?>
                            <div class="col-sm-2">
                              <img src="<?= base_url('asset_admin/images/notif/3.png') ?>" height="30" width="40">
                            </div>
                          <?php } ?>
                          <?php if($row['jenis'] =='booking seminar kementerian') { ?>
                            <div class="col-sm-2">
                              <img src="<?= base_url('asset_admin/images/notif/5.png') ?>" height="30" width="40">
                            </div>
                          <?php } ?>
                          <div class="col-sm-10">                           
                            <?php
                            if ($row['tanggal'] == $tgl_skrang) { ?>
                              <span class="pull-right text-muted"><em>Hari ini</em></span>
                            <?php }else { ?>
                              <span class="pull-right text-muted"><em><?php echo $row['tanggal']; ?></em></span>
                            <?php } ?>

                            <strong><?php echo $row['nama']; ?></strong></br>
                            <?php 
                            if ($judul >= 30) { ?>
                              <p><?php echo substr($row['judul'], 0, 25); ?> ...</p>
                            <?php }else { ?>
                              <p><?php echo $row['judul']; ?></p>
                            <?php } ?>
                          </div>
                          <!-- <div><p><?php echo wordwrap(substr($row['judul'], 0, 80),50,"<br>\n");?> ...</p></div> -->
                        </a>
                      </li>
                  <?php } ?>

                  <?php if($row['jenis'] =='pesan') { ?>
                      <li <?php if ($row['keterangan'] =='Belum Dibaca') { ?> class="active" <?php } ?> >
                        
                        <a href="<?= base_url('Notifikasi/lihatNotifikasi') ?>/<?php echo $row['id_pesan']?>/<?php echo $row['id']?>" style="padding-left: 0px; padding-right: 0px; height: 50px;  margin-bottom: 3px;">
                          <div class="col-md-2">
                            <img src="<?= base_url('asset_admin/images/notif/1.png') ?>" height="30" width="40">
                          </div>
                                                  
                          <div class="col-md-10">                           
                            <?php
                            if ($row['tanggal'] == $tgl_skrang) { ?>
                              <span class="pull-right text-muted"><em>Hari ini</em></span>
                            <?php }else { ?>
                              <span class="pull-right text-muted"><em><?php echo $row['tanggal']; ?></em></span>
                            <?php } ?>
                            </br><strong><?php echo $row['judul']; ?></strong>
                          </div>
                          <!-- <div><p><?php echo wordwrap(substr($row['judul'], 0, 80),50,"<br>\n");?> ...</p></div> -->
                        </a>
                      </li>
                  <?php } ?>

              <?php } ?> 
           <?php }?>
            <!-- =============== Pesan Kementerian ====================== -->
                     
            <!-- =============== Pesan Kementerian ====================== -->

              <li style="background-color: #d6d6d6">
                <a href="<?= base_url('Notifikasi/daftarNotifikasi') ?>">
                  <div class="text-center">
                    <strong >Show All ...</strong>
                  </div>
                  
                </a>
              </li>
            </ul>
          </li>       
        </ul>       
      </div>              
    </div><!-- /.container-fluid -->
  </nav>
    
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar"> 
  <ul class="nav menu">
      <li>
        <div class="user-panel">
            <div class="pull-left image">
                <?php if($notif['foto']==''|$notif['foto']=='no_image.png'){ ?>
                <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-circle" width="50" height="50">
                <?php } else { ?>                
                <img src ="<?php echo URL_IMG ?>images/adminkoperasi/thumb_<?php echo $notif['foto']; ?>" rel="stylesheet" class="img-circle" width="50" height="50">
                <?php  } ?>
            </div>
            <div class="info">
                <h5><b><?php echo $notif['nama_sidebar']; ?></b></h5>                         
            </div>
        </div>
      </li>

      <li class="parent">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-15"><svg class="glyph translucent two-windows"><use xlink:href="#translucent-two-windows"></use></svg>APEX<div class="pull-right"><span class="caret"></span></div></span>

        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' || $this->uri->segment(1) == 'SistemInformasiDebitur' || $this->uri->segment(1) == 'AnggotaSekunder' || $this->uri->segment(1) == 'KesehatanSekunder' || $this->uri->segment(1) == 'SistemDebitur'){echo "in";}?>" id="sub-item-15">
            <li class="parent">
              <a href="#">
                <span data-toggle="collapse" href="#sub-item-16"><svg class="glyph translucent wallet"><use xlink:href="#translucent-wallet"></use></svg>Koperasi Primer</span>
              </a>
              <ul class="children collapse <?php if ($this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' || $this->uri->segment(1) == 'SistemInformasiDebitur'){echo "in";}?>" id="sub-item-16">
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' && $this->uri->segment(2) == 'daftarIndikatorKesehatanKoperasi' || $this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' && $this->uri->segment(2) == 'insertPertanyaanIndikatorKesehatan' || $this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' && $this->uri->segment(2) == 'pertanyaanIndikatorKesehatanKoperasi'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('IndikatorKesehatanKoperasiAPEX/daftarIndikatorKesehatanKoperasi') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' && $this->uri->segment(2) == 'daftarIndikatorKesehatanKoperasi' || $this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' && $this->uri->segment(2) == 'insertPertanyaanIndikatorKesehatan' || $this->uri->segment(1) == 'IndikatorKesehatanKoperasiAPEX' && $this->uri->segment(2) == 'pertanyaanIndikatorKesehatanKoperasi'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Indikator Kesehatan</font> 
                    </a>
                  </li> 
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'SistemInformasiDebitur' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == 'SistemInformasiDebitur' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('SistemInformasiDebitur/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'SistemInformasiDebitur' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == 'SistemInformasiDebitur' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>S.I. Debitur</font> 
                    </a>
                  </li>
              </ul>
            </li>

            <li class="parent">
              <a href="#">
                <span data-toggle="collapse" href="#sub-item-212"><svg class="glyph translucent dollar-bills"><use xlink:href="#translucent-dollar-bills"/></svg>Koperasi Sekunder</span>
              </a>
              <ul class="children collapse <?php if ($this->uri->segment(1) == 'AnggotaSekunder' || $this->uri->segment(1) == 'KesehatanSekunder' || $this->uri->segment(1) == 'SistemDebitur'){echo "in";}?>" id="sub-item-212">
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'AnggotaSekunder' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('AnggotaSekunder/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'AnggotaSekunder' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Daftar Koperasi</font>
                    </a>
                  </li>

                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'KesehatanSekunder' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == 'KesehatanSekunder' && $this->uri->segment(2) == 'lihatdetil'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('KesehatanSekunder/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'KesehatanSekunder' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == 'KesehatanSekunder' && $this->uri->segment(2) == 'lihatdetil'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Kesehatan Anggota</font> 
                    </a>
                  </li>
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'SistemDebitur' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('SistemDebitur/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'SistemDebitur' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>S.I. Debitur</font> 
                    </a>
                  </li>                              
              </ul>
            </li>

        </ul>
      </li>

      <li class="<?php if($notif['kodetipekoperasi'] == '5' && $notif['kelompokkoperasi_id'] == '42'){echo "parent";} else {echo "hidden";}?>">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-6"><svg class="glyph translucent two-windows"><use xlink:href="#translucent-two-windows"></use></svg>Aplikasi BMT<div class="pull-right"><span class="caret"></span></div></span>

        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'PembiayaanSyariah' || $this->uri->segment(1) == 'AngsuranNasabah' || $this->uri->segment(1) == 'ProdukSimpanan' || $this->uri->segment(1) == 'SimpananNasabah'){echo "in";}?>" id="sub-item-6">
            <li class="parent">
              <a href="#">
                <span data-toggle="collapse" href="#sub-item-7"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Pembiayaan Syariah&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></span>
              </a>
              <ul class="children collapse <?php if ($this->uri->segment(1) == 'PembiayaanSyariah' || $this->uri->segment(1) == 'AngsuranNasabah'){echo "in";}?>" id="sub-item-7">
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'PembiayaanSyariah' && $this->uri->segment(2) == 'daftarProduk' || $this->uri->segment(1) == 'PembiayaanSyariah' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('PembiayaanSyariah/daftarProduk') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'PembiayaanSyariah' && $this->uri->segment(2) == 'daftarProduk' || $this->uri->segment(1) == 'PembiayaanSyariah' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Produk</font> 
                    </a>
                  </li> 
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'AngsuranNasabah' && $this->uri->segment(2) == 'daftarNasabah' || $this->uri->segment(1) == 'AngsuranNasabah' && $this->uri->segment(2) == 'lihatDetail' || $this->uri->segment(1) == 'AngsuranNasabah' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('AngsuranNasabah/daftarNasabah') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'AngsuranNasabah' && $this->uri->segment(2) == 'daftarNasabah' || $this->uri->segment(1) == 'AngsuranNasabah' && $this->uri->segment(2) == 'lihatDetail' || $this->uri->segment(1) == 'AngsuranNasabah' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Daftar Nasabah</font> 
                    </a>
                  </li>                                            
              </ul>
            </li> 

            <li class="parent">
              <a href="#">
                <span data-toggle="collapse" href="#sub-item-8"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Simpanan BMT&ensp;&emsp;&ensp;&emsp;<span class="caret"></span></span>
              </a>
              <ul class="children collapse <?php if ($this->uri->segment(1) == 'ProdukSimpanan' || $this->uri->segment(1) == 'SimpananNasabah'){echo "in";}?>" id="sub-item-8">
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'ProdukSimpanan' && $this->uri->segment(2) == 'daftarProdukSimpanan' || $this->uri->segment(1) == 'ProdukSimpanan' && $this->uri->segment(2) == 'index' ){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('ProdukSimpanan/daftarProdukSimpanan') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'ProdukSimpanan' && $this->uri->segment(2) == 'daftarProdukSimpanan' || $this->uri->segment(1) == 'ProdukSimpanan' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Produk Simpanan</font> 
                    </a>
                  </li> 
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'SimpananNasabah' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == 'SimpananNasabah' && $this->uri->segment(2) == 'daftarNasabah' || $this->uri->segment(1) == 'SimpananNasabah' && $this->uri->segment(2) == 'daftarLihatMutasiSimpanan'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('SimpananNasabah/daftarNasabah') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'SimpananNasabah' && $this->uri->segment(2) == 'index' || $this->uri->segment(1) == 'SimpananNasabah' && $this->uri->segment(2) == 'daftarNasabah' || $this->uri->segment(1) == 'SimpananNasabah' && $this->uri->segment(2) == 'daftarLihatMutasiSimpanan'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Daftar Nasabah</font>
                    </a>
                  </li>                             
              </ul>
            </li>                                            
        </ul>
      </li> 

      <li class="<?php if($notif['kodetipekoperasi'] == '5' && $notif['kelompokkoperasi_id'] == '01' || $notif['kodetipekoperasi'] == '15' || $notif['kodetipekoperasi'] == '25'|| $notif['kodetipekoperasi'] == '35'|| $notif['kodetipekoperasi'] == '45'){echo "parent";} else {echo "hidden";}?>">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-12"><svg class="glyph translucent two-windows"><use xlink:href="#translucent-two-windows"></use></svg>Aplikasi Simpan Pinjam<div class="pull-right"><span class="caret"></span></div></span>

        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'SimpananBerjangka' || $this->uri->segment(1) == 'Tabungan' || $this->uri->segment(1) == 'PengaturanTabungan' || $this->uri->segment(1) == 'Peminjaman'){echo "in";}?>" id="sub-item-12">
            <li class="parent">
              <a href="#">
                <span data-toggle="collapse" href="#sub-item-13"><svg class="glyph translucent wallet"><use xlink:href="#translucent-wallet"></use></svg>Simpanan Berjangka</span>
              </a>
              <ul class="children collapse <?php if ($this->uri->segment(1) == 'SimpananBerjangka'){echo "in";}?>" id="sub-item-13">
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'SimpananBerjangka' && $this->uri->segment(2) == 'daftarSimpananBerjangka'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('SimpananBerjangka/daftarSimpananBerjangka') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'SimpananBerjangka' && $this->uri->segment(2) == 'daftarSimpananBerjangka'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Daftar Simpanan</font> 
                    </a>
                  </li> 
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'SimpananBerjangka' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('SimpananBerjangka/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'SimpananBerjangka' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Lakukan Simpanan</font> 
                    </a>
                  </li>
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'SimpananBerjangka' && $this->uri->segment(2) == 'daftarPengaturanSimpananBerjangka'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('SimpananBerjangka/daftarPengaturanSimpananBerjangka') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'SimpananBerjangka' && $this->uri->segment(2) == 'daftarPengaturanSimpananBerjangka'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Pengaturan</font> 
                    </a>
                  </li>                              
              </ul>
            </li> 

            <li class="parent">
              <a href="#">
                <span data-toggle="collapse" href="#sub-item-14"><svg class="glyph translucent dollar-bills"><use xlink:href="#translucent-dollar-bills"/></svg>Tabungan</span>
              </a>
              <ul class="children collapse <?php if ($this->uri->segment(1) == 'Tabungan' || $this->uri->segment(1) == 'PengaturanTabungan'){echo "in";}?>" id="sub-item-14">
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'Tabungan' && $this->uri->segment(2) == 'daftarTabungan'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('Tabungan/daftarTabungan') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'Tabungan' && $this->uri->segment(2) == 'daftarTabungan'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Daftar Tabungan</font> 
                    </a>
                  </li> 
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'Tabungan' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('Tabungan/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'Tabungan' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Lakukan Tabungan</font>
                    </a>
                  </li>
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'HistoryTabungan' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('HistoryTabungan/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'HistoryTabungan' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>History Tabungan</font> 
                    </a>
                  </li>
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'PengaturanTabungan' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('PengaturanTabungan/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'PengaturanTabungan' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Pengaturan</font> 
                    </a>
                  </li>                              
              </ul>
            </li> 

            <li class="parent">
              <a href="#">
                <span data-toggle="collapse" href="#sub-item-9"><svg class="glyph translucent bag"><use xlink:href="#translucent-bag"/></svg>Peminjaman</span>
              </a>
              <ul class="children collapse <?php if ($this->uri->segment(1) == 'Peminjaman'){echo "in";}?>" id="sub-item-9">
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'Peminjaman' && $this->uri->segment(2) == 'daftarPeminjaman' || $this->uri->segment(2) == 'pembayaranAngsuran'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('Peminjaman/daftarPeminjaman') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'Peminjaman' && $this->uri->segment(2) == 'daftarPeminjaman' || $this->uri->segment(2) == 'pembayaranAngsuran'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Daftar Peminjaman</font> 
                    </a>
                  </li> 
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'Peminjaman' && $this->uri->segment(2) == 'index'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('Peminjaman/index') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'Peminjaman' && $this->uri->segment(2) == 'index'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Lakukan Peminjaman</font> 
                    </a>
                  </li>
                  <li>
                    <a class="<?php if ($this->uri->segment(1) == 'Peminjaman' && $this->uri->segment(2) == 'daftarPengaturanPeminjaman'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" style="padding-left: 55px;" href="<?= base_url('Peminjaman/daftarPengaturanPeminjaman') ?>">
                      <font color="<?php if ($this->uri->segment(1) == 'Peminjaman' && $this->uri->segment(2) == 'daftarPengaturanPeminjaman'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg>Pengaturan</font> 
                    </a>
                  </li>                              
              </ul>
            </li>                               
        </ul>
      </li>    

      <li class="<?php if($notif['kodetipekoperasi'] == '3' || $notif['kodetipekoperasi'] == '35'){echo "parent";} else {echo "hidden";}?>">
        <a href="#" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";} ?>">
          <span data-toggle="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";} else {echo "collapse"; }?>" href="#sub-item-5"><svg class="glyph translucent two-windows"><use xlink:href="#translucent-two-windows"></use></svg>Aplikasi Konsumsi</span>
        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(1) == 'Produk' || $this->uri->segment(1) == 'Kategori'  || $this->uri->segment(1) == 'ReportTransaksi'  || $this->uri->segment(1) == 'Pembelian' || $this->uri->segment(1) == 'Supplier'){echo "in";}?>" id="sub-item-5">
            <li>
              <?php if ($this->uri->segment(2) == 'tambahDetilPembelian')
              {?>
                <a href="#" rel="stylesheet" class="disabled">
                  <font color="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Transaksi</font> 
                </a>
              <?php } else
              { ?>
                <a href="#" rel="stylesheet" data-toggle="modal" data-target="#myModal" class="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "active";} ?>">
                  <font color="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Transaksi</font> 
                </a>
              <?php }?>        
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'Produk'){echo "active";} if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>" href="<?= base_url('Produk/daftarProduk') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'Produk'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Produk / Stok</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'Kategori'){echo "active";} if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>" href="<?= base_url('Kategori/daftarKategori') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'Kategori'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Kategori</font>
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'Supplier'){echo "active";} if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>" href="<?= base_url('Supplier/daftarSupplier') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'Supplier'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Supplier</font>
              </a>
            </li>          
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'Pembelian'){echo "active";} if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";}?>" href="<?= base_url('Pembelian/daftarPembelian') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'Pembelian'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Pembelian Koperasi</font>
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'ReportTransaksi'){echo "active";} if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>" href="<?= base_url('ReportTransaksi/daftarReportTransaksi') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'ReportTransaksi'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Laporan Transaksi</font>
              </a>
            </li>                    
        </ul>
      </li>

      <li class="parent" >
        <a href="#" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";} ?>">
          <span data-toggle="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";} else {echo "collapse"; }?>" href="#sub-item-11">
            <svg class="glyph stroked clipboard with paper">
              <use xlink:href="#stroked-clipboard-with-paper"></use>
            </svg>Data Koperasi
            <div class="pull-right">
              <span class="caret"></span>
            </div>
          </span>
        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'Peta' || $this->uri->segment(1) == 'SusunanKepengurusan' || $this->uri->segment(1) == 'IndikatorUsaha'){echo "in";}?>" id="sub-item-11">
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'Peta'){echo "active";}?>" href="<?= base_url('Peta/index') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'Peta'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Indentitas Koperasi</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'SusunanKepengurusan'){echo "active";}?>" href="<?= base_url('SusunanKepengurusan/index') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'SusunanKepengurusan'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Susunan Kepengurusan</font> 
              </a>
            </li>           
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'IndikatorUsaha'){echo "active";}?>" href="<?= base_url('IndikatorUsaha/index') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'IndikatorUsaha'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Indikator Usaha</font>
              </a>
            </li>            
        </ul>
      </li>     

      <li class="<?php echo activate_menu('Admin'); ?>">
          <a href="<?= base_url('Admin/daftarAdminKoperasi') ?>" rel="stylesheet" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
            <svg class="glyph stroked male user ">
            <use xlink:href="#stroked-male-user"></use></svg>Admin Koperasi
          </a>
      </li>

      <li class="<?php echo activate_menu('Anggota'); ?>">
          <a href="<?= base_url('Anggota/viewAnggota') ?>" rel="stylesheet" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
          <svg class="glyph stroked app-window">
            <use xlink:href="#stroked-app-window"></use>
          </svg>Anggota Koperasi</a>
      </li>

      <li class="<?php echo activate_menu('infoKoperasi'); ?>">
          <a href="<?= base_url('infoKoperasi/daftarInfoKoperasi') ?>" rel="stylesheet" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
            <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Informasi Koperasi
          </a>
      </li>

      <li class="parent" >
        <a href="#" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">       
          <span data-toggle="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";} else {echo "collapse"; }?>" href="#sub-item-1"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Pelatihan Koperasi<div class="pull-right"><span class="caret"></span></div></span>
        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'trainingKoperasi' || $this->uri->segment(1) == 'bookingTraining' || $this->uri->segment(1) == 'TrainingMenteri'){echo "in";}?>" id="sub-item-1">
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'trainingKoperasi'){echo "active";}?>" href="<?= base_url('trainingKoperasi/daftarTrainingKoperasi') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'trainingKoperasi'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Pelatihan Koperasi</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'bookingTraining'){echo "active";}?>" href="<?= base_url('bookingTraining/daftarBookingTraining') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'bookingTraining'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Booking Pelatihan</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'TrainingMenteri'){echo "active";}?>" href="<?= base_url('TrainingMenteri/daftarTrainingMenteri') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'TrainingMenteri'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Pelatihan Kementerian</font> 
              </a>
            </li>         
        </ul>
      </li>

      <li class="parent" >
        <a href="#" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
          <span data-toggle="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";} else {echo "collapse"; }?>" href="#sub-item-2"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg>Seminar Koperasi<div class="pull-right"><span class="caret"></span></div></span>
        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'seminarKoperasi' || $this->uri->segment(1) == 'bookingSeminar' || $this->uri->segment(1) == 'SeminarMenteri'){echo "in";}?>" id="sub-item-2">
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'seminarKoperasi'){echo "active";}?>" href="<?= base_url('seminarKoperasi/daftarSeminarKoperasi') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'seminarKoperasi'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Seminar Koperasi</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'bookingSeminar'){echo "active";}?>" href="<?= base_url('bookingSeminar/daftarBookingSeminar') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'bookingSeminar'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Daftar Booking Seminar</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'SeminarMenteri'){echo "active";}?>" href="<?= base_url('SeminarMenteri/daftarSeminarMenteri') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'SeminarMenteri'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Seminar Kementerian</font>
              </a>
            </li>         
        </ul>
      </li>              

      <li class="<?php echo activate_menu('TahunOperasi'); ?>">          
          <a href="<?= base_url('TahunOperasi/daftarTahunOperasi') ?>" rel="stylesheet" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
          <svg class="glyph stroked folder"><use xlink:href="#stroked-folder"></use></svg>Tahun Operasi
          </a>
      </li>

      <li class="<?php echo activate_menu('BiayaUsaha'); ?>" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
          <a href="<?= base_url('BiayaUsaha/daftarBiayaUsaha') ?>" rel="stylesheet">
          <svg class="glyph translucent coins"><use xlink:href="#translucent-coins"></use></svg>
          Biaya Usaha
          </a>
      </li>

      <li class="parent" >
        <a href="#" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">       
          <span data-toggle="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";} else {echo "collapse"; }?>" href="#sub-item-10"><svg class="glyph stroked bag"><use xlink:href="#stroked-table"></use></svg>Simpanan<div class="pull-right"><span class="caret"></span></div></span>
        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'SimpananPokok' || $this->uri->segment(1) == 'Iuran' || $this->uri->segment(1) == 'Simpanan' || $this->uri->segment(1) == 'PengaturanSimpanan'){echo "in";}?>" id="sub-item-10">
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'SimpananPokok'){echo "active";}?>" href="<?= base_url('SimpananPokok/daftarsimpananpokok') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'SimpananPokok'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Simpanan Pokok</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'Iuran'){echo "active";}?>" href="<?= base_url('Iuran/daftarIuran') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'Iuran'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Simpanan Wajib</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'Simpanan'){echo "active";}?>" href="<?= base_url('Simpanan/daftarSimpanan') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'Simpanan'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Simpanan Sukarela</font> 
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'PengaturanSimpanan'){echo "active";}?>" href="<?= base_url('PengaturanSimpanan/index') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'PengaturanSimpanan'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Pengaturan Simpanan</font> 
              </a>
            </li>         
        </ul>
      </li>

      <li class="parent">
        <a href="#" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
          <span data-toggle="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";} else {echo "collapse"; }?>" href="#sub-item-3"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"></use></svg>Jurnal<div class="pull-right"><span class="caret"></span></div></span>
        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'Jurnal'){echo "in";}?>" id="sub-item-3">
            <li>
              <a class="<?php if ($this->uri->segment(2) == 'daftarJurnal' || $this->uri->segment(2) == 'daftarPeriodeJurnal' || $this->uri->segment(2) == 'indexJurnal'){echo "active";}?>" href="<?= base_url('Jurnal/indexJurnal') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(2) == 'daftarJurnal' || $this->uri->segment(2) == 'daftarPeriodeJurnal' || $this->uri->segment(2) == 'indexJurnal'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Kalkulasi Jurnal</font>
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(1) == 'Jurnal' && $this->uri->segment(2) == 'resetJurnalIndex'){echo "active";}?>" href="<?= base_url('Jurnal/resetJurnalIndex') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(1) == 'Jurnal' && $this->uri->segment(2) == 'resetJurnalIndex'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Reset Jurnal</font>
              </a>
            </li>                   
        </ul>
      </li>

      <li class="parent">
        <a href="#" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
          <span data-toggle="<?php if ($this->uri->segment(1) == 'Transaksi'){echo "disabled";} else {echo "collapse"; }?>" href="#sub-item-4"><svg class="glyph stroked external hard drive"><use xlink:href="#stroked-external-hard-drive"></use></svg>Sisa Hasil Usaha (SHU)<div class="pull-right"><span class="caret"></span></div></span>
        </a>
        <ul class="children collapse <?php if ($this->uri->segment(1) == 'SHU'){echo "in";}?>" id="sub-item-4">
            <li>
              <a class="<?php if ($this->uri->segment(2) == 'daftarSHU'  || $this->uri->segment(2) == 'daftarPeriodeSHU' || $this->uri->segment(2) == 'daftarKalkulasiSHU'){echo "active";}?>" href="<?= base_url('SHU/daftarSHU') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(2) == 'daftarSHU'  || $this->uri->segment(2) == 'daftarPeriodeSHU' || $this->uri->segment(2) == 'daftarKalkulasiSHU'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Daftar SHU</font>
              </a>
            </li>
            <li>
              <a class="<?php if ($this->uri->segment(2) == 'resetSHUIndex'){echo "active";}?>" href="<?= base_url('SHU/resetSHUIndex') ?>" rel="stylesheet">
                <font color="<?php if ($this->uri->segment(2) == 'resetSHUIndex'){echo "white";} else { echo "#30a5ff";}?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"></use></svg>Reset SHU</font> 
              </a>
            </li>                   
        </ul>
      </li>

      <!-- <li class="<?php echo activate_menu('Iuran'); ?>" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
          <a href="<?= base_url('Iuran/daftarIuran') ?>" rel="stylesheet">
          <svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>
          Iuran
          </a>
      </li>  --> 

      <li class="<?php echo activate_menu('RAT'); ?>"> 
          <a href="<?= base_url('RAT/daftarRAT') ?>" rel="stylesheet" class="<?php if ($this->uri->segment(1) == 'Transaksi' || $this->uri->segment(2) == 'tambahDetilPembelian'){echo "disabled";}?>">
            <svg class="glyph stroked round coffee mug"><use xlink:href="#stroked-round-coffee-mug"></use></svg>Rapat Anggota Tahunan (RAT)
          </a>
      </li>            
  </ul>
</div><!--/.sidebar-->
    
   <!--/.main-->
  <script src="<?= base_url('asset_admin/js/jquery-1.11.1.min.js') ?>" rel="stylesheet"></script>
  <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>" rel="stylesheet"></script>  
  
  <script type="text/javascript">
  $(document).ready(function(){
    if (<?php echo $notif['jumlah']; ?> > 0) {
      $('[name="notif"]').text(<?php echo $notif['jumlah']; ?>);
              timer = setTimeout(5000);
    }
    else {
       $('[name="notif"]').text('');
      timer = setTimeout(5000);
    }
  });
  </script>

  <script type="text/javascript">
    $('.disabled').click(function(e){
     e.preventDefault();
     alert('Tekan Tombol Batal untuk keluar');
  })
  </script>
