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
      <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Admin/updateAdmin">    

        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">Edit Admin Koperasi</div>
            <div class="panel-body"> 
            
                <div>
                  <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="adminkoperasi_id"></input>
                </div>

                <div class="row">                
                  <div class="input-group">
                  <?php if($foto ==''|$foto =='no_image.png'){ ?>
                  <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-responsive" alt="Cinque Terre">

                  <?php } else { ?>
                
                  <img src ="<?php echo URL_IMG ?>/images/adminkoperasi/<?php echo $foto; ?>" rel="stylesheet" class="img-responsive" alt="Cinque Terre">

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
                  <div class="col-md-12 form-group">
                    <label>Nama Lengkap</label>
                      <div class="input-group">
                        <input name="nama" type="text" id="nama" class="form-control" value= "<?php echo $nama; ?>" required>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <label>Email</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input type="email" id="email" name="email" class="form-control" value= "<?php echo $email; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 form-group">
                    <label> Nomor Telepon</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input name="telepon" type="text" id="telepon" class="form-control" value= "<?php echo $telepon; ?>" required>
                    </div>
                  </div>   
                </div>

                <div class="row">                  
                    <div class="col-md-6 form-group">                   
                        <label>Hak Akses Admin</label>
                        <div class="input-group">
                          <select name="akses" class="form-control" id="akses_id">                          
                              <?php foreach($hasil['data'] as $row){ ?>
                              <option value="<?php echo $row['id'];?>"  
                              <?php if($row['id']==$akseskoperasi_id) { echo "selected"; } ;?> ><?php echo $row['akses'] ?></option>
                              <?php } ?>
                          </select> 
                        </div>               
                    </div>                       
                </div></br>           
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">Ganti Password</div>
              <div class="panel-body"> 
                  <h4><b>Kosongkan Jika Password Tidak di ganti</b></h4>

                  <div class="row"> 
                    <div class="col-md-5 form-group">
                      <label>Username</label>
                      <div class="input-group">
                        <input type="text" id="username" name="username" class="form-control" value= "<?php echo $username; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 form-group">
                      <label> Password</label>
                      <div class="input-group">
                        <input name="passwordlama" type="password" id="passwordlama" class="form-control" >
                      </div>
                    </div>   
                  </div>

                  <div class="row">
                    <div class="col-md-5 form-group">
                      <label> Password Baru</label>
                      <div class="input-group">
                        <input name="password" type="password" id="password" class="form-control">
                      </div>
                    </div>   
                  </div>

                  <div class="row">
                    <div class="col-md-5 form-group">
                      <label> Konfirmasi Password Baru</label>
                        <div class="input-group">
                          <input name="passwordBaru" type="password" id="passwordBaru" class="form-control">
                        </div>
                    </div>   
                  </div>    
              </div>
            </div>
        </div>

        <div class="col-md-6">                  
            <button class="btn btn-default"><a href="<?php echo base_url(); ?>Admin/daftarAdminKoperasi">Batal</a></button>
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button> 
        </div>
      </form>
    </div>
  </div>  
</div>

<script type="text/javascript">
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
                },
                akses: {
                  validators: {
                    notEmpty: {
                      message: 'Silahkan Pilih Hak Akses Admin!'
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
</body>
</html>