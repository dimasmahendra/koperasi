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
  <div class="row">
    <div class="col-lg-12">
      <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>TahunOperasi/updateTahunOperasi">
          <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">Edit Tahun Operasi</div>
                <div class="panel-body">

                    <div>
                      <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="tahunoperasi_id"></input>
                    </div>            

                    <div class="row">
                      <div class="col-md-3 form-group">                   
                          <label>Tanggal Mulai</label>
                          </br>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                          <input type="text" id="datetimepicker2" style="min-height:34px" name="tanggalmulai" value= "<?php echo $tanggalmulai; ?>">
                          </div>
                      </div>
                    </div>
                    </br> 

                    <div class="row">
                      <div class="col-md-3 form-group">                   
                          <label>Tanggal Selesai</label>  
                          </br>
                          <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                          <input type="text" id="datetimepicker3" style="min-height:34px" name="tanggalselesai" value= "<?php echo $tanggalselesai; ?>">
                          </div>
                      </div>
                    </div></br>                                                

                    <div class="pull-right">                              
                        <button class="btn btn-default"><a href="<?php echo base_url(); ?>TahunOperasi/daftarTahunOperasi">Batal</a></button>
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

   $('#datetimepicker3').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd',        
  });
</script>


    
            
        