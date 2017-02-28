<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>
<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet"> 

<style type="text/css">
@media (max-width: 978px) {
    body {
    margin-top:40px;
    }
}
</style>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      </br>
      <!-- Tabel inputan user admin -->
      <form name="form" id="form" class="form-horizontal" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url();?>SimpananBerjangka/LakukanSimpanan">    

        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lakukan Simpanan</div>
            <div class="panel-body" style="margin-left: 20px">

                <div class="row">
                  <div class="col-md-4 col-xs-7 form-group">
                    <label>Nomor Rekening</label>
                    <input name="norek" type="text" id="norek" class="form-control" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-xs-12 form-group">
                    <label>Nama</label>
                    <select name="nama" class="form-control" id="myselect2">
                    <option value="">- Pilih Anggota Koperasi -</option>
                    <?php foreach ($anggota['data'] as $row) { ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>   
                    <?php } ?>
                    </select> 
                  </div>
                </div>

                <!-- <div class="row">
                  <div class="col-md-3 col-xs-6 form-group">
                    <label>Nama Penyetor</label>
                    <input name="penyetor" type="text" id="penyetor" class="form-control" required>
                  </div>
                  <div class="row">
                  <div class="col-md-1 col-xs-2" style="margin: 13px 0px 0px 30px;">
                    <div class="checkbox" onclick="checkbox();">
                      <label>
                        <input type="checkbox" value="tes" id="checkbox">
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-4">
                    <p style="padding-top: 30px;">Sama dengan pemilik rekening.</p>
                  </div>
                  </div>
                </div> -->

                <div class="row">
                  <div class="col-md-6 col-xs-12 form-group">
                    <label class="control-label">Nama Penyetor</label>
                    <input name="penyetor" type="text" id="penyetor" class="form-control" required>

                  <span class="col-md-12 col-xs-12" style="margin-left:-30px;">
                    <div class="col-md-1 col-xs-1 checkbox" onclick="checkbox();">
                        <input type="checkbox" id="checkbox" name="checkbox"> 
                    </div>
                    <div class="col-md-10 col-xs-10" style="margin-top: 3px">Sama dengan pemilik rekening.</div>
                  </span>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-xs-7 form-group">
                    <label>Jumlah Simpanan</label>
                    <input name="simpanan" type="text" id="simpanan" class="form-control" placeholder="0" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-xs-12 form-group">
                    <label>Sumber dana</label>
                    <input name="sumberdana" type="text" id="sumberdana" class="form-control" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 col-xs-12 form-group">
                    <label>Jangka Waktu</label>
                    <select class="form-control" name="tenor" id="myselect">
                    <option data-cash="0" value="">- Pilih Jangka Waktu Simpanan -</option>
                    <?php foreach ($jangkaWaktu['data'] as $row) { ?>
                      <option data-cash="<?php echo $row['bunga'] ?>" value="<?php echo $row['tenor'] ?>"><?php echo $row['tenor'] ?> Bulan</option>
                    <?php } ?>
                    </select> 
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-xs-12 form-group">
                    <label>Bunga</label>
                    <input name="persenbunga" type="text" id="persenbunga" class="form-control" placeholder="Bunga Dalam persen" readonly required>
                  </div>
                </div>

                <dir class="panel-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Proses</button> 
                  </div>
                </div>
            </div>
          </div>
        </div>

      </form>
</div>

<!-- Modal Pengaturan Simpanan Berjangka Kosong -->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pengaturan Simpanan Berjangka Kosong</h4>
      </div>
      <div class="modal-body">
        <p>Anda belum melakukan pengaturan Simpanan Berjangka. Silakan atur terlebih dahulu</p>
      </div>    

      <div class="modal-footer">        
        <a class="btn btn-primary" href="<?php echo base_url(); ?>SimpananBerjangka/daftarPengaturanSimpananBerjangka">Ya</a>
        <a class="btn btn-default" href="<?php echo base_url(); ?>Dashboard/index">Tidak</a>
      </div>

    </div>    
  </div>
</div>
<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<!-- <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>" rel="stylesheet"></script> -->
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>

<script>
   $(document).ready(function(){
      $( "#myselect" ).change(function () {
        var str = "";
        $( "select option:selected" ).each(function() {
          str = $( this ).data('cash') + " ";
        });
        $( "#persenbunga" ).val(parseFloat(str).toFixed(2));
      })
      .change();
    });

    if(<?php echo $cekSimpananBerjangka['status']; ?> == 0)
    {
      $('#myModal1').modal({backdrop: 'static', keyboard: false});
    }

    function checkbox() {
        $(document).ready(function(){
          var a = $( "#myselect2 option:selected" ).text();
          $('#checkbox').change(function(){
              if (this.checked) {
                  $('#penyetor').val(a);
              }
              else {
                $('#penyetor').val('');
              }

          }); 
        }); 
      }
</script>