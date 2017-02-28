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
      <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Anggota/tambahAnggota">    
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Tambah Anggota Koperasi</div>
              <div class="panel-body">

                <?php if($this->session->flashdata('error')){?> 
                  <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                    <?php echo $this->session->flashdata('error')?> 
                  </div><?php } ?>

                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Nomor Kartu Identitas</label>
                      <div class="input-group">
                        <input name="noIdentitas" type="text" id="noIdentitas" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Nama Lengkap</label>
                      <div class="input-group">
                        <input name="nama" type="text" id="nama" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group">
                      <label> Tempat / Tanggal Lahir</label>
                      <div class="input-group">
                        <span class="input-group-addon">Tempat</span>
                        <input name="tempatLahir" type="text" id="tempatLahir" class="form-control" required>
                      </div>
                    </div>  
                    <div class="col-md-3 form-group">
                      <label>&nbsp;&nbsp;</label>
                      <div class="input-group">
                        <span class="input-group-addon">Tanggal&nbsp;&nbsp;<i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="tanggalLahir" type="text" id="tanggalLahir" class="form-control" required>
                      </div>
                    </div>   
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group">
                      <label> Nomor Telepon</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="telepon" type="text" id="telepon" class="form-control" required>
                      </div>
                    </div>   
                  </div>

                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Email</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control" required>
                      </div>
                    </div>
                  </div>               

                  <div class="form-group">
                    <label>Jenis Kelamin</label></br>
                    <div class="radio-inline">
                      <label>
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" checked>Laki-laki
                      </label>
                    </div>
                    <div class="radio-inline">
                      <label>
                        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">Perempuan
                      </label>
                    </div>                  
                  </div>

                  <div class="row">
                      <div class="col-md-3 form-group">
                          <label>Pendidikan</label>
                          <div class="input-group">
                            <select name="pendidikan" class="form-control" id="pendidikan">
                              <option value="">- Select Pendidikan -</option>
                              <option value="Tidak Lulus SD">Tidak Lulus SD</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                            </select>
                          </div>
                      </div>
                  </div>

                  <div class="row"> 
                    <div class="col-md-8 form-group">
                      <label>Alamat</label>
                      <div class="input-group">
                        <input type="text" id="alamat" name="alamat" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="row row-table">
                      <div class="col-md-3 form-group">                   
                          <label>Provinsi</label>          
                          <div class="input-group">          
                            <select name="prov" class="form-control" id="provinsi">
                              <option>- Select Provinsi -</option>
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
                                  <option value=''>Select Kabupaten</option>
                              </select>     
                            </div>          
                      </div>
                      <div class="col-md-3 form-group">                   
                            <label>Kecamatan</label>   
                            <div class="input-group">                  
                              <select name="kec" class="form-control" id="kecamatan">
                                  <option>Select Kecamatan</option>
                              </select>
                            </div>
                      </div>
                      <div class="col-md-3 form-group">
                          <label>Kelurahan</label>
                          <div class="input-group">
                            <select name="lurah" class="form-control" id="kelurahan">
                                <option>Select Kelurahan</option>
                            </select>    
                          </div>       
                      </div>             
                  </div>

                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Pekerjaan</label>
                      <div class="input-group">
                        <input name="pekerjaan" type="text" id="pekerjaan" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Sector Usaha</label>
                      <div class="input-group">
                        <input name="sectorUsaha" type="text" id="sectorUsaha" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 form-group">
                      <label> Tanggal Menjadi Calon Anggota</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="tanggalRegistrasi" type="text" id="tanggalRegistrasi" class="form-control" required>
                      </div>
                    </div>  
                    <div class="col-md-3 form-group">
                      <label>Tanggal Menjadi Anggota</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="tanggalDaring" type="text" id="tanggalDaring" class="form-control" required>
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
                <div class="col-md-3 form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <input type="text" id="username" name="username" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-3 form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-3 form-group">
                  <label>Konfirmasi Password</label>
                  <div class="input-group">
                    <input type="password" id="passwordBaru" name="passwordBaru" class="form-control">
                  </div>
                </div>
              </div>

              <div class="pull-right">                  
                <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulangi</button> 
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