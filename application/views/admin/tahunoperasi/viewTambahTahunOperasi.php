<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>
<link href="<?= base_url('asset_admin/css/bootstrap-datepicker.css') ?>" rel="stylesheet">
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">  
  <div class="row">
    <div class="col-lg-12">
      <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>TahunOperasi/insertTahunOperasi">
          <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">Tambah Tahun Koperasi</div>
                <div class="panel-body">

                    <div class="row">
                      <div class="col-md-3 form-group">
                          <label>Pilih Tahun : </label>
                          </br>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                          <input type="text" id="datetimepicker2" style="min-height:34px" name="tanggalmulai">
                          </div>
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
</div>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>

<script type="text/javascript">

  $( document ).ready(function(selected){
    var a =  new Date().getFullYear();
    var startDate =  String(a);
    $('#datetimepicker2').datepicker('setStartDate', startDate);
  });   
  $('#datetimepicker2').datepicker({   
    format: " yyyy", // Notice the Extra space at the beginning
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true,     
  });
</script>