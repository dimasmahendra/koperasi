<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/formValidation.js') ?>" rel="stylesheet"></script>

<style type="text/css">
.has-feedback .form-control-feedback {
    top: 25px;
    right: 0;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 25px;
    right: 22px;
}
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">      
  <div class="row">
    <div class="col-lg-12">
  <!-- Tabel inputan user admin -->
      <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Anggota/updateAnggota">    

        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">Edit Anggota Koperasi</div>
            <div class="panel-body"> 

                <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="anggotakoperasi_id">

                <div class="row">
                  <div class="input-group">
                  <?php if($foto ==''|$foto =='no_image.png'){ ?>
                  <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-responsive" alt="Cinque Terre">
                  <?php } else { ?>                
                  <img src ="<?php echo URL_IMG ?>images/anggotakoperasi/<?php echo $foto; ?>" rel="stylesheet" class="img-responsive" alt="Cinque Terre">
                  <?php  } ?>    
                  </div>
                </div>

                <div class="row">                   
                      <div class="col-md-5 form-group">
                          <label>Foto</label>
                          <div class="input-group">
                            <input name="foto" type="file" id="foto" class="form-control">
                          </div>
                      </div>
                </div>

                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Nomor Kartu Identitas</label>
                      <div class="input-group">
                        <input name="noIdentitas" type="text" id="noIdentitas" class="form-control" value= "<?php echo $noktp; ?>" required>
                      </div>
                    </div>
                  </div>

                <div class="row">
                  <div class="col-md-4 form-group">
                    <label>Nama Lengkap</label>
                    <div class="input-group">
                      <input type="text" id="nama" name="nama" class="form-control" value= "<?php echo $nama; ?>" required>
                    </div>
                  </div>
                </div>

                  <div class="row">
                    <div class="col-md-3 form-group">
                      <label> Tempat / Tanggal Lahir</label>
                      <div class="input-group">
                        <span class="input-group-addon">Tempat</span>
                        <input name="tempatLahir" type="text" id="tempatLahir" value= "<?php echo $tempatlahir; ?>" class="form-control" required>
                      </div>
                    </div>  
                    <div class="col-md-3 form-group">
                      <label>&nbsp;&nbsp;</label>
                      <div class="input-group">
                        <span class="input-group-addon">Tanggal&nbsp;&nbsp;<i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="tanggalLahir" type="text" id="tanggalLahir" value= "<?php echo $tanggallahir; ?>" class="form-control" required>
                      </div>
                    </div>   
                  </div>

                <div class="row">
                  <div class="col-md-3 form-group">
                    <label> Nomor Telepon</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input type="text" id="telepon" name="telepon" class="form-control" value= "<?php echo $telepon; ?>" required>
                    </div>
                  </div>   
                </div>

                <div class="row">
                  <div class="col-md-4 form-group">
                    <label>Email</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control" value= "<?php echo $email; ?>" required>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label></br>
                    <div class="radio-inline">
                      <label>
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" <?php if($jenis_kelamin == 'Laki-laki') {echo "checked";}?>>Laki-laki
                      </label>
                    </div>
                    <div class="radio-inline">
                      <label>
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?php if($jenis_kelamin == 'Perempuan') {echo "checked";}?>>Perempuan
                      </label>
                    </div>                  
                  </div>

                <div class="row">
                      <div class="col-md-3 form-group">
                          <label>Pendidikan</label>
                          <div class="input-group">
                            <select name="pendidikan" class="form-control" id="pendidikan">
                              <option value="" <?php if($pendidikan==""){echo "selected";}?>>- Select Pendidikan -</option>
                              <option value="Tidak Lulus SD" <?php if($pendidikan=="Tidak Lulus SD"){echo "selected";}?>>Tidak Lulus SD</option>
                              <option value="SD" <?php if($pendidikan=="SD"){echo "selected";}?>>SD</option>
                              <option value="SMP" <?php if($pendidikan=="SMP"){echo "selected";}?>>SMP</option>
                              <option value="SMA" <?php if($pendidikan=="SMA"){echo "selected";}?>>SMA</option>
                              <option value="SMK" <?php if($pendidikan=="SMK"){echo "selected";}?>>SMK</option>
                              <option value="D1" <?php if($pendidikan=="D1"){echo "selected";}?>>D1</option>
                              <option value="D2" <?php if($pendidikan=="D2"){echo "selected";}?>>D2</option>
                              <option value="D3" <?php if($pendidikan=="D3"){echo "selected";}?>>D3</option>
                              <option value="D4" <?php if($pendidikan=="D4"){echo "selected";}?>>D4</option>
                              <option value="S1" <?php if($pendidikan=="S1"){echo "selected";}?>>S1</option>
                              <option value="S2" <?php if($pendidikan=="S2"){echo "selected";}?>>S2</option>
                              <option value="S3" <?php if($pendidikan=="S3"){echo "selected";}?>>S3</option>
                            </select>
                          </div>
                      </div>
                </div>

                <div class="row"> 
                  <div class="col-md-8 form-group">
                    <label>Alamat</label>
                    <div class="input-group">
                      <input type="text" id="alamat" name="alamat" class="form-control" value= "<?php echo $alamat; ?>" required>
                    </div>
                  </div>
                </div>

                <input type="hidden" id="status" name="status" class="form-control" value= "<?php echo $status; ?>" required>
                
                <div class="row row-table">
                  <div class="col-md-3 form-group">                   
                    <label>Provinsi</label>  
                    <div class="input-group">                  
                      <select name="prov" class="form-control" id="provinsi">
                          <option value="<?php echo $provinsi_id; ?>"><?php echo $provinsi_nama; ?></option>
                          <?php foreach($hasil['data'] as $row){ ?>               
                              <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                          <?php } ?>
                      </select>
                    </div>                
                  </div>
                  <div class="col-md-3 form-group">
                    <label>Kabupaten/Kota</label>   
                    <div class="input-group">                    
                      <select name="kab" class="form-control" id="kabupatenkota">
                          <option value="<?php echo $kabupatenkota_id; ?>"><?php echo $kabupatenkota_nama; ?></option>
                      </select>  
                    </div>             
                  </div>
                  <div class="col-md-3 form-group">                   
                    <label>Kecamatan</label>  
                      <div class="input-group">                   
                        <select name="kec" class="form-control" id="kecamatan">
                            <option value="<?php echo $kecamatan_id; ?>"><?php echo $kecamatan_nama; ?></option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-3 form-group">
                    <label>Kelurahan</label>
                    <div class="input-group">
                      <select name="lurah" class="form-control" id="kelurahan">
                          <option value="<?php echo $kelurahan_id; ?>"><?php echo $kelurahan_nama; ?></option>
                      </select>           
                    </div>
                  </div>             
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Pekerjaan</label>
                      <div class="input-group">
                        <input name="pekerjaan" type="text" id="pekerjaan" value= "<?php echo $pekerjaan; ?>" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Sector Usaha</label>
                      <div class="input-group">
                        <input name="sectorUsaha" type="text" id="sectorUsaha" value= "<?php echo $sektorusaha; ?>" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group">
                      <label> Tanggal Menjadi Calon Anggota</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="tanggalRegistrasi" type="text" id="tanggalRegistrasi" value= "<?php echo $tanggalregistrasi; ?>" class="form-control" required>
                      </div>
                    </div>  
                    <div class="col-md-3 form-group">
                      <label>Tanggal Menjadi Anggota</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="tanggalDaring" type="text" id="tanggalDaring" value= "<?php echo $tanggaldaring; ?>" class="form-control" required>
                      </div>
                    </div>   
                  </div>

                </br>                                  
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">Konfirmasi Password</div>
            <div class="panel-body">

                <div class="row"> 
                  <div class="col-md-2 form-group">
                    <label>Username</label>
                    <div class="input-group">
                      <input type="text" id="username" name="username" class="form-control" value= "<?php echo $username; ?>" required>
                    </div>
                  </div>
                </div>           

                <div class="row"> 
                  <div class="col-md-2 form-group">
                    <label>Password</label>
                    <div class="input-group">
                      <input type="password" id="password" name="password" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row"> 
                  <div class="col-md-2 form-group">
                    <label>Konfirmasi Password</label>
                    <div class="input-group">                    
                      <input type="password" id="passwordBaru" name="passwordBaru" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="pull-right">                               
                  <a href="<?php echo base_url(); ?>index.php/Anggota/viewAnggota"><button type="button" class="btn btn-default">Batal</button></a>
                  <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
          </div>
        </div>   
      </form>  
    </div>
  </div>    
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#provinsi").change(function (){
      var url = "<?php echo site_url('Anggota/kabupatenkota');?>/"+$(this).val();
      $('#kabupatenkota').load(url);
      $('#kecamatan').html('<option value="">--Pilih Kecamatan--</option>');
      $('#kelurahan').html('<option value="">--Pilih Kelurahan--</option>');          
      return false;
    })
    $("#kabupatenkota").change(function (){
      var url = "<?php echo site_url('Anggota/kecamatan');?>/"+$(this).val();
      $('#kecamatan').load(url);
      return false;
    })
    $("#kecamatan").change(function (){
      var url = "<?php echo site_url('Anggota/kelurahan');?>/"+$(this).val();
      $('#kelurahan').load(url);
      return false;
    })
  });

  window.onload = function () {
    document.getElementById("password").onchange = validatePassword;
    document.getElementById("passwordBaru").onchange = validatePassword;
     }
     function validatePassword(){
      var pass2=document.getElementById("passwordBaru").value;
      var pass1=document.getElementById("password").value;
      if(pass1!=pass2)
       document.getElementById("passwordBaru").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
      else
      document.getElementById("passwordBaru").setCustomValidity('');
     }
</script>
<script>
$(document).ready(function() {
    $('#form1')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                telepon: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Masukkan Nomor Telepon!'
                        },
                        regexp: {
                            regexp: /^[0-9]{0,12}$/,
                            message: "Silahkan Masukkan Angka! (Maksimal 12 Angka)"
                        }
                    }
                },
                email: {
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Masukkan Alamat Email!'
                        },
                        emailAddress: {
                            message: 'Masukkan Alamat Email Yang Valid!'
                        },
                        stringLength: {
                            max: 512,
                            message: 'Email Tidak Lebih dari 512 Karakter!'
                        },
                        remote: {
                            type: 'GET',
                            url: 'https://api.mailgun.net/v2/address/validate?callback=?',
                            crossDomain: true,
                            name: 'address',
                            data: {
                                // Registry a Mailgun account and get a free API key
                                // at https://mailgun.com/signup
                                api_key: 'pubkey-83a6-sl6j2m3daneyobi87b3-ksx3q29'
                            },
                            dataType: 'jsonp',
                            validKey: 'is_valid',
                            message: 'Email Tidak Valid!'
                        }
                    }
                }
            }
        })
        .on('success.validator.fv', function(e, data) {
            if (data.field === 'email' && data.validator === 'remote') {
                var response = data.result;  // response is the result returned by MailGun API
                if (response.did_you_mean) {
                    // Update the message
                    data.element                    // The field element
                        .data('fv.messages')        // The message container                                                
                        .show();
                }
            }
        })
        .on('err.validator.fv', function(e, data) {
            if (data.field === 'email' && data.validator === 'remote') {
                var response = data.result;
                // We need to reset the error message
                data.element                // The field element
                    .data('fv.messages')    // The message container
                    .find('[data-fv-validator="remote"][data-fv-for="email"]')
                    .html(response.did_you_mean
                                ? 'Mungkin Yang Dimaksud Anda Adalah ' + response.did_you_mean + '?'
                                : 'Email Tidak Valid!')
                    .show();
            }
        });
});
</script>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>
<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet">
<script type="text/javascript">
   $('#tanggalLahir').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });

   $('#tanggalRegistrasi').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });

   $('#tanggalDaring').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });
  </script>
</body>
</html>