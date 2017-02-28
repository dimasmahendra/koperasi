<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= base_url('asset_admin/favicon.png') ?>" type="image/gif" sizes="16x16">
<title>Lupa Password Smart Cooperative</title>

<link href="<?= base_url('asset_login/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_login/css/main.css') ?>" rel="stylesheet">
</head>
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
                <img src="<?= base_url(); ?>asset_login/logokoperasi.png" style="display: block; margin-left: auto; margin-right: auto" alt="logokoperasi" width="600" height="200">
              </center>
            </div>
            <br/>
            <div class="panel panel-default" >                
                <div class="panel-body" style="text-align:center">
                  <?php if($this->session->flashdata('message')){?>    
                    <h3><?php echo $this->session->flashdata('message')?></h3>
                  <?php } ?>
                </div>                     
            </div>             
        </div>
		</div>
	</div><!-- .row -->
</div><!-- .container -->