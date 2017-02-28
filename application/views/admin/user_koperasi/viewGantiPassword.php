<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>
<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>

<script src="<?= base_url('asset_admin/js/formValidation.js') ?>" rel="stylesheet"></script>

<style type="text/css">
.has-feedback .form-control-feedback {
    top: 25px;
    right: 0;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 25px;
    right: 20px;
}

@media (max-width: 978px) {
    body {
    margin-top:40px;
    }
}
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
</br>
<!-- Tabel inputan user admin -->
<form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Profile/updatePassword" autocomplete="off">    

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Ganti Password</div>
      <div class="panel-body" style="margin-left: 20px">

        <?php if($this->session->flashdata('error')){?> 
          <div class="alert bg-danger" role="alert">
            <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
            <?php echo $this->session->flashdata('error')?> 
          </div><?php } ?>

          <div class="row">
                  <div class="col-md-5 col-xs-12 form-group">
                    <label> Password Lama</label>
                    <input name="passwordlama" type="password" id="passwordlama" class="form-control" >
                  </div>   
                </div>

                <div class="row">
                  <div class="col-md-5 col-xs-12 form-group">
                    <label> Password Baru</label>
                    <input name="password" type="password" id="password" class="form-control" disabled required>
                  </div>   
                </div>

                <div class="row">
                  <div class="col-md-5 col-xs-12 form-group">
                    <label> Confirm Password Baru</label>
                    <input name="passwordBaru" type="password" id="passwordBaru" class="form-control" disabled required>
                  </div>   
                </div>

                <div class="pull-right">                          
                  <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset"><a style="color:black;" href="<?php echo base_url(); ?>Dashboard/index">Cancel</a></button>    
                  <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary" disabled>Simpan</button>
                </div>
      </div>
    </div>
  </div>

  
</form>
</div>

<script>
$(document).ready(function(){
    $("#passwordlama").keyup(function(){
        document.getElementById("password").disabled = false;
        document.getElementById("passwordBaru").disabled = false;
    });
});
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
                password: {
                  validators: {
                    different: {
                      field: 'passwordlama',
                      message: 'Password baru tidak boleh sama dengan password lama'
                    }
                  }
                },
                passwordBaru: {
                  validators: {
                    identical: {
                      field: 'password',
                      message: 'Password baru dan confirm password baru harus sama'
                    },
                    different: {
                      field: 'passwordlama',
                      message: 'Confirm Password baru tidak boleh sama dengan password lama'
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