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
                <img src="<?= base_url('asset_login/logossp.png') ?>" img="img-responsive" alt="koperasimodern" width="300">
              </center>
            </div>
            <br/>

            <div class="panel panel-default" >
                <div class="panel-heading">
                    <div class="panel-title text-center">Registrasi SSP</div>
                </div>     
                <div class="panel-body" >
                    <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Registrasi/insertregisterSSP">                       
                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input id="user" type="text" class="form-control" name="username" placeholder="Username" required> 
                        </div>
                        </div>
                        </br>

                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                            <input id="eamil" type="text" class="form-control" name="email" placeholder="Email" required> 
                        </div>
                        </div>
                        </br>

                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-bell"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        </div>
                        </br>

                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-earphone"></i>
                            </span>
                            <input id="phonenumber" type="text" class="form-control" name="phonenumber" placeholder="No Telepon" required> 
                        </div>
                        </div>
                        </br>

                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                            <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Merchand" required> 
                        </div>
                        </div>
                        </br>

                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-asterisk"></i>
                            </span>
                            <input id="person" type="text" class="form-control" name="person" placeholder="Person" required> 
                        </div>
                        </div>
                        </br>

                        <div class="form-group">                
                            <div class="col-sm-12 controls">
                                <button type="submit" href="#" class="btn btn-primary pull-right">
                                <i class="glyphicon glyphicon-log-in"></i> Daftar Sekarang</button>
                            </div>
                        </div>

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
                    </form>
                </div>            
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>