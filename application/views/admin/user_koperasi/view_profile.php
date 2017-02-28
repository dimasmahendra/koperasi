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
@media (max-width: 978px) {
    body {
    margin-top:40px;
    }
}
</style>

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
    </br>  
       
    <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>profile/updateprofile">    

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Hallo, <?php echo $nama; ?></div>
            <div class="panel-body" style="margin-left: 30px"> 

                <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?> 
                </div><?php } ?>                

                <div class="row">                

                <?php if($result['data']['foto']==''|$result['data']['foto']=='no_image.png'){ ?>
                <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="col-md-2 img-responsive" alt="Cinque Terre" width="200" height="200">

                <?php } else { ?>

                <div class="row">
                <img src ="<?php echo URL_IMG ?>images/adminkoperasi/<?php echo $result['data']['foto']; ?>" rel="stylesheet" class="col-md-2 img-responsive" alt="Cinque Terre" width="200" height="200">

                <?php  } ?>
            
                </div></br>

                <div class="row">                   
                    <div class="col-md-4 col-xs-12 form-group">
                        <label>Foto</label>
                        <input name="foto" type="file" id="foto" class="form-control">
                    </div>
                </div>

                <div class="row">                   
                    <div class="col-md-4 col-xs-12 form-group">
                        <label>Username</label>
                        <?php echo form_error('username'); ?>
                        <input name="username" type="text" id="username" class="form-control" size="50" value= "<?php echo $username; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">

                        <div class="input-group">
                        <label>Nama Lengkap</label>
                        <input name="nama" type="text" id="nama" class="form-control" size="50" value= "<?php echo $nama; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                        <label>Email</label>
                        <input name="email" type="email" id="email" class="form-control" size="50" value= "<?php echo $email; ?>"  required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 col-xs-6 form-group">
                        <label>Telepon</label>
                        <input name="telepon" type="text" id="telepon" class="form-control" size="50" value= "<?php echo $telepon; ?>" required>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-2 col-xs-6 input-group">
                      <label>Status</label>                      
                        <select class="form-control" name="status" value="<?php echo $status; ?>" disabled>
                          <option value="registered">Registered</option>
                          <option value="block">Blocked</option>
                        </select>
                  </div>
                </div>

                <!-- Garis hr Muncul Pada Device Phone -->
                <div class="row visible-xs-block">
                    <div class="col-xs-12 input-group">
                     <hr style="margin-left:-30px; opacity: 0.2;" >
                  </div>
                </div>                                              

                <div class="pull-right" style="margin-right: 20px;">

                    <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulang</button>
                    <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>
                </div>
           </div> 
        </div>
      </div>

    </form>

    </div>
</div>

<script type="text/javascript">
  function bukaReadOnly(){
    document.getElementById('username').readOnly=true;
    document.getElementById('nama').readOnly=true;    
    document.getElementById('email').readOnly=true;
    document.getElementById('telepon').readOnly=true;
    document.getElementById('status').readOnly=true;
    document.getElementById('tombolEdit').style.display = '';    
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


            
        