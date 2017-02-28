<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet"> 
<style type="text/css">
@media (min-width: 768px) {
    body {
      margin-left:50px;
    }
  }

@media (min-width: 1024px) {
    body {
      margin-left:0px;
    }
  }
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>BiayaUsaha/updateBiayaUsaha">
          <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">Edit Biaya Usaha Koperasi</div>
                <div class="panel-body">
                   
                    <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="biayausaha_id">
                  
                    <div class="row">
                      <div class="col-md-4 form-group">                   
                        <label>Tanggal</label></br>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="text" id="datetimepicker2" style="min-height:34px" name="tanggal" value= "<?php echo $tanggal; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row"> 
                      <div class="col-md-4 form-group">
                        <label>Jumlah Biaya</label>
                        <div class="input-group">
                        <input type="number" id="biaya" name="biaya" class="form-control" style="height: 34px;" value= "<?php echo $biaya; ?>">
                        </div>
                      </div>
                    </div>
                     
                    <div class="row"> 
                      <div class="col-md-8 form-group">                      
                        <label for="ket">Keterangan :</label>
                        <div class="input-group">
                        <textarea class="form-control" rows="5" id="keterangan" name="keterangan"><?php echo $keterangan; ?></textarea>
                        </div>
                      </div>
                    </div>              

                    <div class="pull-right">                    
                        <button class="btn btn-default"><a href="<?php echo base_url(); ?>BiayaUsaha/daftarBiayaUsaha">Batal</a></button>
                        <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
              </div>
          </div>
      </form>
    </div>
  </div>    
</div>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>

<script type="text/javascript">
   $('#datetimepicker2').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd',        
  });
</script>

    
            
        