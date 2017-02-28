<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<!-- <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>" rel="stylesheet"></script> -->

<style type="text/css">
@media (max-width: 978px) {
    body {
    margin-top:27px;
    }
}
</style>
</head>
<body>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

<!-- Modal Pengaturan Simpanan Berjangka Kosong -->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pengaturan Tabungan Kosong</h4>
      </div>
      <div class="modal-body">
        <p>Anda belum melakukan pengaturan Tabungan. Silakan atur terlebih dahulu</p>
      </div>    

      <div class="modal-footer">        
        <a class="btn btn-primary" href="<?php echo base_url(); ?>PengaturanTabungan/index">Ya</a>
        <a class="btn btn-default" href="<?php echo base_url(); ?>Dashboard/index">Tidak</a>
      </div>

    </div>    
  </div>
</div>
</br>
<!-- Tabel inputan user admin -->
<form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Tabungan/LakukanTabunganProses">    

  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading">Lakukan Tabungan</div>
      <div class="panel-body" style="margin-left: 20px"> 

          <input type="hidden" value="<?php echo $koperasi_id ?>" name="koperasi_id">

          <div class="box-body">                  
              <div class="form-group">
                <label class="control-label col-sm-2" for="kredit">Nomor Rekening : </label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="norek" name="norek">
                </div>
              </div>
          </div>

          <div class="box-body">                  
              <div class="form-group">
                <label class="control-label col-sm-2" for="anggotakoperasi">Nama : </label>
                <div class="col-md-4">
                  <select name="anggotakoperasi" class="form-control" id="anggotakoperasi">
                      <option>- Pilih Anggota Koperasi -</option>
                      <?php foreach($hasil['data'] as $row){ ?>               
                          <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                      <?php } ?>
                  </select>
                </div>
              </div>
          </div>

          <div class="box-body">                  
              <div class="form-group">
                <label class="control-label col-sm-2" for="anggotakoperasipenyetor">Nama Penyetor : </label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="penyetor" name="penyetor">       
                </div>
                <div class="col-sm-5">                        
                  <input type="checkbox" id="namackbx" name="namackbx"> Sama Dengan Pemilik Rekening
                </div>                    
              </div>
          </div>

          <div class="box-body">                  
              <div class="form-group">
                <label class="control-label col-sm-2" for="kredit">Jumlah Setoran : </label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="kredit" name="kredit">
                </div>
              </div>
          </div>

          <div class="box-body">                  
              <div class="form-group">
                <label class="control-label col-sm-2" for="sumberdana">Sumber Dana : </label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="sumberdana" name="sumberdana" disabled>
                </div>
              </div>
          </div>   

          <div class="pull-right">                              
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Proses</button>            
        </div>      
      </div>
    </div>
  </div>
</form>
</div>

<script type="text/javascript">
$(document).ready(function(){

  $('#namackbx').click(function(){
   if($("#namackbx").is(':checked')){
      var penyetors = $( "#anggotakoperasi option:selected" ).text();           
      $('#penyetor').val(penyetors);      
    }    
    else{
      $('#penyetor').prop('disabled', false);
      $('#penyetor').val('');
    }    
  });

  $("#anggotakoperasi").change(function (){
    if($("#namackbx").is(':checked')){
      $('#penyetor').val($( "#anggotakoperasi option:selected" ).text());   
    }
    else{
      $('#penyetor').val('');
    }
  });  

  if(<?php echo count($tabungan['data']); ?> == 0)
  {
    $('#myModal1').modal({backdrop: 'static', keyboard: false});
  }
});
</script>

<script type="text/javascript">  
$("#kredit").change(function (){
  var toRupiah = convertToRupiah($("#kredit").val());

  if ($("#kredit").val() >= 50000000)
  {
    $("#kredit").val(toRupiah);
    $('#sumberdana').prop('disabled', false);
  }
  else
  { 
    $("#kredit").val(toRupiah);
    $('#sumberdana').prop('disabled', true);
  }
});

$('.pull-right #tombolSimpan').click(function() {        
    var toAngka = convertToAngka($("#kredit").val());
    $("#kredit").val(toAngka);
});

function convertToRupiah(angka)
{
  var rupiah = '';    
  var angkarev = angka.toString().split('').reverse().join('');
  for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
  return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}

function convertToAngka(rupiah)
{
  return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
}
</script>