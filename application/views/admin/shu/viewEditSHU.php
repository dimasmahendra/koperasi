<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>

<style type="text/css">
@media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

    body{
      margin-top: 27px;
    }
  }
</style>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">    
    </br><!--/.row-->
    <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>SHU/updateSHU">    

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Edit Persentase SHU</div>
          <div class="panel-body" style="margin-left: 20px">     
            <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="komponenshu_id"></input>        
            <input type="hidden" value="<?php echo $tahunoperasi_id; ?>" name="tahunoperasi_id"></input>
            <input type="hidden" value="<?php echo $tipekomponenshu_id; ?>" name="tipekomponenshu_id"></input>

            <div class="row">
                  <div class="col-md-4 col-xs-12 form-group">                   
                      <label>Komponen</label>
                      <div class="input-group">                  
                      <input name="komponen" type="text" id="komponen" class="form-control" value="<?php echo $komponen;?>" required>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-2 col-xs-12 form-group">                   
                      <label>Presentase</label>
                      <div class="input-group">                  
                      <input name="persentase" type="text" id="persentase" class="form-control" value="<?php echo $persentase;?>" required>
                      <span class="input-group-addon">%</span>
                      </div>
                  </div>
              </div>

            <div class="pull-right">                       
                <button class="btn btn-default"><a href="<?php echo base_url(); ?>SHU/daftarSHU">Batal</a></button>
                <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>     
            </div>          
          </div>
      </div>
    </div>
  </form>
      
</div>
</div>