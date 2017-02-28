<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= base_url('asset_admin/favicon.png') ?>" type="image/gif" sizes="16x16">
<title>Ganti Password Smart Cooperative</title>

<link href="<?= base_url('asset_login/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_login/css/main.css') ?>" rel="stylesheet">

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
                    <div class="panel-title text-center">Ganti Password</div>
                </div>     

                <div class="panel-body" >
                <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>user/send_change_password">
                   <input id="token" type="hidden" name="token" value="<?php echo $this->uri->segment(4); ?>">   
                   <input id="email" type="hidden" name="email" value="<?php echo str_replace( '%40', '@', $this->uri->segment(3)); ?>">   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Pasword Baru">             
                    </div></br>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="passwordBaru" type="password" class="form-control" name="passwordBaru" placeholder="Tulis Ulang Password Baru">
                    </div></br>                                                              

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-new-window"></i> Ganti Password</button>                          
                        </div>
                    </div>
                </form> 
                </div>
            </div>
        </div>
        </div>
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

</body>
</html>