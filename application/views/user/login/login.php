<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= base_url('asset_admin/favicon.png') ?>" type="image/gif" sizes="16x16">
<title>Login Smart Cooperative</title>

<link href="<?= base_url('asset_login/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_login/css/main.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/AdminLTE.min.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>

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
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content"> 
        <div class="box box-widget widget-user-2">                
            <div class="widget-user-header" style="background-color: #203864;">    
            <h3><p style="color:white; text-align: center;">Pilih Jenis Akun Daftar Smart Cooperative</p></h3>
            </div>
            <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <a href="<?php echo base_url(); ?>Registrasi/index" class="btn btn-primary btn-lg" id="tossp">SSP</a>
                <a href="<?php echo base_url(); ?>Registrasi/registrasiNonSSP" class="btn btn-primary btn-lg" id="tononssp">Non-SSP</a>
            </ul>
            </div>
        </div>
    </div>    
  </div>
</div>
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
                    <div class="panel-title text-center"><?=$this->lang->line('title')?></div>
                </div>     

                <div class="panel-body" >

                    <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>user/login">
                       
                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input id="user" type="text" class="form-control" name="username" placeholder="<?=$this->lang->line('username')?>" required> 
                        </div>
                        </div>
                        </br>

                        <div class="col-md-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="<?=$this->lang->line('password')?>" required>
                        </div>
                        </div>
                        </br>

                        <div class="form-group">                
                            <div class="col-sm-12 controls">
                                <button type="submit" href="#" class="btn btn-primary pull-right">
                                <i class="glyphicon glyphicon-log-in"></i> Log in</button>                            
                                <a href="<?php echo base_url(); ?>user/forget_pass">Lupa Password</a>
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
                <div class="panel-footer">
                        <div class="text-center">
                        <a href="#" rel="stylesheet" data-toggle="modal" data-target="#myModal"><button class="btn btn-default">Buat Akun Baru</button></a></div>
                </div>
            </div>

            <!-- <div align="center">                    
                <?php $lang=$this->session->userdata('lang'); if ($lang=='en') { ?>

                    <a href="<?=base_url()?>locale/code/id"><img class="flagicon <?=$this->session->userdata('lang')=='id'?'glow':''?>" src="<?php echo base_url(); ?>asset_admin/images/flag/id.jpg"  style="width: auto; height:28px;"></a>
                    &nbsp;
                    <a href="<?=base_url()?>locale/code/fr"><img class="flagicon <?=$this->session->userdata('lang')=='fr'?'glow':''?>" src="<?php echo base_url(); ?>asset_admin/images/flag/fr.jpg"  style="width: auto; height:28px;"></a>


                <?php } else if($lang=='fr') { ?>

                    <a href="<?=base_url()?>locale/code/id"><img class="flagicon <?=$this->session->userdata('lang')=='id'?'glow':''?>" src="<?php echo base_url(); ?>asset_admin/images/flag/id.jpg"  style="width: auto; height:28px;"></a>
                    &nbsp;
                    <a href="<?=base_url()?>locale/code/en"><img class="flagicon <?=$this->session->userdata('lang')=='en'?'glow':''?>" src="<?php echo base_url(); ?>asset_admin/images/flag/en.jpg"  style="width: auto; height:28px;"></a>


                <?php } else { ?>

                    <a href="<?=base_url()?>locale/code/en"><img class="flagicon <?=$this->session->userdata('lang')=='en'?'glow':''?>" src="<?php echo base_url(); ?>asset_admin/images/flag/en.jpg"  style="width: auto; height:28px;"></a>
                    &nbsp;
                    <a href="<?=base_url()?>locale/code/fr"><img class="flagicon <?=$this->session->userdata('lang')=='fr'?'glow':''?>" src="<?php echo base_url(); ?>asset_admin/images/flag/fr.jpg"  style="width: auto; height:28px;"></a>

               <?php } ?>
            </div></br> -->
        </div>
        </div>
        </div>
    </div>
</div>

</body>
</html>