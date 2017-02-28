<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= base_url('asset_admin/favicon.png') ?>" type="image/gif" sizes="16x16">
<title>SSP Smart Cooperative</title>

<link href="<?= base_url('asset_login/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_login/css/main.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>" rel="stylesheet"></script>

</head>
<body>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content"> 
        <div class="box box-widget widget-user-2">                
            <div class="widget-user-header" style="background-color: #203864;">    
            <h3><p style="color:white; text-align: center;">Pilih Jenis Akun Daftar Smart Cooperative</p></h3>
            </div>
            <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Registrasi/insertregisterNonSSP">
                    <input type="hidden" id="getnamaKoperasi" name="getnamaKoperasi">
                    <div class="modal-footer">
                       <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </ul>
            </div>
        </div>
    </div>    
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">         
        <div id="loginbox" class="mainbox col-md-12">        
        <div class="row">                
            <div>
              <br/>
              <br/>
              <br/>
              <center>           
                <img src="<?= base_url('asset_login/logossp.png') ?>" img="img-responsive" alt="koperasimodern" width="300">
              </center>
            </div>
            <br/>
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title text-center">Registrasi Smart Cooperative</div>
                    </div>     
                    <div class="panel-body" >              
                        <input id="is_ssp" type="hidden" name="is_ssp" value="<?php echo $is_ssp;?>">                         
                        <div class="col-md-12 form-group">
                            <div class="col-md-5">
                              <label>Nama Koperasi</label>
                              <input id="namaKoperasi" type="text" class="form-control" name="namaKoperasi" placeholder="Nama Koperasi" required>
                            </div>
                            <div class="col-md-2">
                              <label>Jumlah Anggota</label>
                              <input id="nAnggota" type="number" class="form-control" name="nAnggota" placeholder="Jumlah Anggota" required>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-3">
                                <label>No Telepon</label>
                                <input id="telepon" type="text" class="form-control" name="telepon" placeholder="No. Telepon" required>
                            </div> 
                            <div class="col-md-4">
                                <label>Email</label>
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email" required> 
                            </div>                     
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-3">                   
                              <label>Provinsi</label>                    
                              <select name="prov" class="form-control" id="provinsi">
                                  <option value="">- Pilih Provinsi -</option>
                                  <?php foreach($hasil['data'] as $row){ ?>               
                                      <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                                  <?php } ?>
                              </select>                
                            </div>
                              <div class="col-md-3">
                                  <label>Kabupaten/Kota</label>                       
                                  <select name="kab" class="form-control" id="kabupatenkota">
                                      <option value="">- Pilih Kabupaten / Kota -</option>
                                  </select>               
                              </div>
                              <div class="col-md-3">                   
                                    <label>Kecamatan</label>                     
                                    <select name="kec" class="form-control" id="kecamatan">
                                        <option value="">- Pilih Kecamatan -</option>
                                    </select>
                              </div>
                              <div class="col-md-3">
                                  <label>Kelurahan</label>
                                  <select name="lurah" class="form-control" id="kelurahan">
                                      <option value="">- Pilih Kelurahan -</option>
                                  </select>           
                              </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-3">      
                                <label>Jenis Koperasi</label>                   
                                <select class="form-control" id="jkop" name="jkop" required>
                                    <option value="">- Pilih Jenis Koperasi -</option>
                                    <option value="1">Produsen</option>
                                    <option value="2">Pemasaran</option>
                                    <option value="3">Konsumen</option>
                                    <option value="4">Jasa</option>
                                    <option value="5">Simpan Pinjam</option>
                                </select>
                            </div>
                            <div class="col-md-3">      
                                <label>Bentuk Koperasi</label>                   
                                <select class="form-control" id="btkkop" name="btkkop" required>
                                    <option value="">- Pilih Bentuk Koperasi -</option>
                                    <option value="1">Primer Nasional</option>
                                    <option value="2">Primer Provinsi</option>
                                    <option value="3">Primer Kab/Kota</option>
                                    <option value="4">Sekunder Nasional</option>
                                    <option value="5">Sekunder Provinsi</option>
                                    <option value="6">Sekunder Kab/Kota</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Skala Koperasi</label>   
                                <select class="form-control" id="skalakoperasi" name="skalakoperasi" required>
                                    <option value="">- Pilih Skala Koperasi -</option>
                                    <option value="1">Micro</option>
                                    <option value="2">Small</option>
                                    <option value="3">Medium</option>
                                    <option value="4">Large</option>
                                    <option value="5">XXL</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-3">      
                                <label>Sektor Usaha Koperasi</label>                   
                                <select name="sekUsaha" class="form-control" id="sekUsaha" required>
                                    <option value="">- Pilih Sektor Usaha -</option>                 
                                    <?php foreach($sektorusaha['data'] as $row){ ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['sektor'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Kelompok Koperasi</label>   
                                <select name="kelKop" class="form-control" id="kelKop" required>
                                    <option value="">- Pilih Kelompok Koperasi -</option>
                                    <?php foreach($kelompokkoperasi['data'] as $row){ ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['kelompok'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title text-left">Buat Akun Login</div>
                    </div>     
                    <div class="panel-body" >
                        <div class="panel-body" >
                            <div class="col-md-12 form-group">
                                <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                                </div>
                            </div>
                            </br>
                            <div class="col-md-12 form-group">
                                <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-eye-close"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                </div>
                            </div>
                            </br>
                            <div class="col-md-12 form-group">
                                <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-eye-close"></i>
                                    </span>
                                    <input id="re-password" type="password" class="form-control" name="re-password" placeholder="Ulangi Password" required>
                                </div>
                                </div>
                            </div>
                            </br>              
                            <?php if($this->session->flashdata('message')){?> 
                                <div class="alert alert-success">  
                            <?php echo $this->session->flashdata('message')?> 
                                </div><?php } ?>

                            <?php if($this->session->flashdata('pesan')){?> 
                                <div class="alert alert-warning">  
                            <?php echo $this->session->flashdata('pesan')?> 
                                </div><?php } ?> 

                            <?php if($this->session->flashdata('error')){?> 
                                <div class="alert alert-danger">  
                            <?php echo $this->session->flashdata('error')?> 
                                </div><?php } ?>
                        </div>            
                    </div>
                </div>
                <div class="form-group">                
                    <div class="col-sm-12 controls">
                        <a href="#" rel="stylesheet" data-toggle="modal" data-target="#myModal" class="edit"><button type="submit" class="btn btn-primary pull-right">
                        <i class="glyphicon glyphicon-log-in"></i> Daftar Sekarang</button></a>
                    </div>
                </div>
        </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#provinsi").change(function (){
          var url = "<?php echo site_url('Registrasi/kabupatenkota');?>/"+$(this).val();
          $('#kabupatenkota').load(url);
          $('#kecamatan').html('<option value="">--Pilih Kecamatan--</option>');
          $('#kelurahan').html('<option value="">--Pilih Kelurahan--</option>');          
          return false;
        })
        $("#kabupatenkota").change(function (){
          var url = "<?php echo site_url('Registrasi/kecamatan');?>/"+$(this).val();
          $('#kecamatan').load(url);
          return false;
        })
        $("#kecamatan").change(function (){
          var url = "<?php echo site_url('Registrasi/kelurahan');?>/"+$(this).val();
          $('#kelurahan').load(url);
          return false;
        })
      });

    $('.edit').click(function(){
      var namaKoperasi   = $('#namaKoperasi').val();
      var nAnggota       = $('#nAnggota').val();
      var telepon        = $('#telepon').val();
      var email          = $('#email').val();
      var kelurahan      = $('#kelurahan').val();
      var jkop           = $('#jkop').val();
      var btkkop         = $('#btkkop').val();
      var skalakoperasi  = $('#skalakoperasi').val();
      var sekUsaha       = $('#sekUsaha').val();
      var kelKop         = $('#kelKop').val();
      var username       = $('#username').val();
      var password       = $('#password').val();
      //alert(id);
      if (namaKoperasi) {
        $('[name="getnamaKoperasi"]').val(namaKoperasi);
       
      }
      else{
        alert('Data tidak ditemukan !!!');
      }
    });
</script>