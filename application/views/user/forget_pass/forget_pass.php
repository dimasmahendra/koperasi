<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= base_url('asset_admin/favicon.png') ?>" type="image/gif" sizes="16x16">
<title>Lupa Password Smart Cooperative</title>

<link href="<?= base_url('asset_login/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_login/css/main.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/formValidation.js') ?>" rel="stylesheet"></script>


<style type="text/css">
    .has-feedback .form-control-feedback {
    position: absolute;
    top: 3px;
    right: 15px;
    display: block;
    width: 34px;
    height: 34px;
    line-height: 34px;
    text-align: center;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 0;
    right: 15px;
}
</style>
</head>
<body style="background-color:#203864">

<div class="container">
    <div class="row">
        <div class="col-md-12">         
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">        
        <div class="row">                
            <div>
              <br/>
              <br/>
              <br/>
              <center>           
                <img src="<?= base_url('asset_login/logokoperasi.png') ?>" img="img-responsive" alt="koperasimodern" width="300">
              </center>
            </div>
            <br/>

            <div class="panel panel-default" >
                <div class="panel-heading">
                    <div class="panel-title text-center">Lupa Password</div>
                </div>     

                <div class="panel-body" >

                <?php if($this->session->flashdata('error')){?> 
                    <div class="alert alert-danger">  
                <?php echo $this->session->flashdata('error')?> 
                    </div><?php } ?>

                    <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>user/reset">                   
                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        </div>
                        <div class="form-group pull-right">
                            <div class="col-sm-12 controls">
                                <button class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i><a style="color:white" href="<?php echo base_url(); ?>User/index">&nbsp;&nbsp;Login</a></button>
                                <button type="submit" href="#" class="btn btn-primary"><i class="glyphicon glyphicon-new-window"></i>&nbsp;&nbsp;Reset Password</button>
                            </div>
                        </div>
                    </form></br>                 

                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
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
                            message: 'Email Tidak Valid'
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
                                : 'Email Tidak Valid')
                    .show();
            }
        });
});
</script>
</body>
</html>