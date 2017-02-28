<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet"> 

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br><!--/.row-->
    <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Pembelian/tambahPembelian">    

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading"></div>
          <div class="panel-body" style="margin-left: 20px">
             
              <input type="hidden" value="<?php echo $tahun['data']['id']; ?>" name="tahunoperasi_id"></input> 

              <div class="row"> 
                <div class="col-sm-2 form-group">                   
                    <label>Tanggal Pembelian</label>                   
                    <input type="text" id="datetimepicker2" class="form-control" style="min-height:34px" name="tanggal">                
                </div>
              </div>
              <div class="row">              
                <div class="col-md-2 form-group">
                  <label>Metode</label>
                  <select class="form-control" name="metode">
                      <option value="Cash">Cash</option>
                      <option value="SSP">SSP</option>
                  </select>
                </div>
              </div>                                
                      
              <div class="pull-right">                  
                  <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulangi</button> 
                  <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>
              </div>          
          </div>
      </div>
    </div>
  </form>
      
</div>
</div>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>

<script type="text/javascript">
$('#datetimepicker2').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd',        
  });
</script>

            
        