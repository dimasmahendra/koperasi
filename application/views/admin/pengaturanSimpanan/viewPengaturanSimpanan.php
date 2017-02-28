<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.formatCurrency-1.4.0.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/i18n/jquery.formatCurrency.all.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>

<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm2.js') ?>" rel="stylesheet"></script>

<style type="text/css">
  .close {
    color: #fff; 
    opacity: 1;
  }

  .modal-body .form-group .input-group-addon {
    background-color: #eee;
  }
</style>
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
  </br> 

   <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #203864;">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title" style="color:white;">Ubah Pengaturan Simpanan Pokok</h4>
        </div>

        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>PengaturanSimpanan/ubahPengaturanSimpanan">
          <div class="modal-body edit-content">          
            
            <input type="hidden" class="form-control" id="setingdasar_id" name="setingdasar_id">

            <div class="form-group">
              <label class="control-label col-sm-5" for="nama">Biaya Simpanan Pokok : </label>
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" id="sipok" name="sipok">
                </div>                       
              </div>

            </div> 
            
            <div class="modal-footer">
              <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ubah</button>
            </div> 
          </div>                               
        </form>
      </div>    
    </div>
  </div>

  <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #203864;">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title" style="color:white;">Ubah Pengaturan Simpanan Wajib</h4>
        </div>

        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>PengaturanSimpanan/ubahPengaturanSimpananWajib">
          <div class="modal-body edit-content">          
            
            <input type="hidden" class="form-control" id="setingdasar_id2" name="setingdasar_id2">

            <div class="form-group">
              <label class="control-label col-sm-5" for="nama">Biaya Simpanan Wajib : </label>
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" id="siwab" name="siwab">
                </div>                       
              </div>

            </div> 
            
            <div class="modal-footer">
              <button href="#" id="tombolSimpan2" type="submit" class="btn btn-primary">Ubah</button>
            </div> 
          </div>                               
        </form>
      </div>    
    </div>
  </div>


  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Pengaturan Simpanan
        </div>
      </div>
    </div>
  </div><!--/.row--> 

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-footer">
          <div class="panel-body">

            <div class="row">
              <div class="col-md-12 form-group">
                <label>Biaya Simpanan Pokok : </label>
                
                <?php if(count($result['data']) == 0) { echo "0";}
                else {
                  echo "Rp ".number_format ($result['data']['simpananpokok'], 2, ',', '.');} 
                  ?>
                <div class="pull-right">
                  <a class="ubahBiaya" href ="#" data-toggle="modal" data-target="#myModal6" data-idsetingdasar="<?php if(count($result['data']) == 0) { echo "0";} else { echo $result['data']['id'];} ?>" data-sipok="<?php if(count($result['data']) == 0) { echo "0";} else { echo $result['data']['simpananpokok'];;} ?>"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Ubah</button></a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group">
                <label>Biaya Simpanan Wajib : </label>
                
                <?php if(count($result['data']) == 0) { echo "0";}
                else {
                  echo "Rp ".number_format ($result['data']['simpananwajib'], 2, ',', '.');} 
                  ?>
                <div class="pull-right">
                  <a class="ubahBiaya2" href ="#" data-toggle="modal" data-target="#myModal7" data-idsetingdasar2="<?php if(count($result['data']) == 0) { echo "0";} else { echo $result['data']['id'];} ?>" data-siwab="<?php if(count($result['data']) == 0) { echo "0";} else { echo $result['data']['simpananwajib'];;} ?>"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Ubah</button></a>
                </div>
              </div>
            </div>

          </div>
        </div> 
      </div>
    </div>
  </div>

</div>

<script>
    $(document).on("click", ".ubahBiaya", function () {

      var id = $(this).data('idsetingdasar'); 
      var sipok = $(this).data('sipok'); 
      
       if(id)
      {           
          $('#setingdasar_id').val(id); 
          $('#sipok').val(sipok);   
       }        
       else
       {
          alert('Pengaturan ID tidak di temukan');
       }
    });    
</script>

<script>
    $(document).on("click", ".ubahBiaya2", function () {

      var id2 = $(this).data('idsetingdasar2'); 
      var siwab = $(this).data('siwab'); 
      
       if(id2)
      {           
          $('#setingdasar_id2').val(id2); 
          $('#siwab').val(siwab);   
       }        
       else
       {
          alert('Pengaturan ID tidak di temukan');
       }
    });    
</script>