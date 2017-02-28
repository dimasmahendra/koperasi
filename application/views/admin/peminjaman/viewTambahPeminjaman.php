<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>


<style type="text/css">
@media (max-width: 978px) {
    body {
    margin-top:27px;
    }
}
</style>
</head>
<body>

<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pengaturan Peminjaman Kosong</h4>
      </div>
      <div class="modal-body">
        <p>Anda belum melakukan pengaturan Peminjaman. Silakan atur terlebih dahulu</p>
      </div>    

      <div class="modal-footer">        
        <a class="btn btn-primary" href="<?php echo base_url(); ?>Peminjaman/daftarPengaturanPeminjaman">Ya</a>
        <a class="btn btn-default" href="<?php echo base_url(); ?>Dashboard/index">Tidak</a>
      </div>

    </div>    
  </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
</br>
<!-- Tabel inputan user admin -->
<form name="form" id="form" class="form-horizontal" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url();?>Peminjaman/LakukanPeminjaman">    

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Lakukan Peminjaman</div>
      <div class="panel-body" style="margin-left: 20px">          

          <div class="row">
            <div class="col-md-6 col-xs-12 form-group">
              <label>Nama</label>
              <select name="anggotakoperasi_id" class="form-control" id="">
              <option value="">- Pilih Nama Anggota -</option>
              <?php foreach ($anggota['data'] as $row) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>   
              <?php } ?>
              </select> 
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-12 form-group">
              <label>Jumlah Peminjam</label>
              <input name="jumlah" type="text" id="jumlah" class="form-control" placeholder="0" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 col-xs-12 form-group">
              <label>Jangka Waktu</label>
              <select class="form-control" name="tenor" id="tenor">
               <option value="">- Pilih Jangka Waktu -</option>
               <option value="3">3 Bulan</option>
               <option value="6">6 Bulan</option>
               <option value="12">12 Bulan</option>
               <option value="18">18 Bulan</option>
               <option value="24">24 Bulan</option>
              </select> 
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-12 form-group">
              <label>Tipe Bunga</label>
              <select class="form-control" name="tipebunga_id" id="myselect">
              <option data-cash="0" value="">- Tipe Bunga -</option>
              <?php foreach ($setingPeminjaman['data'] as $row) { ?>
                  <option data-cash="<?php echo $row['persenbunga']?>" data-id="<?php echo $row['id']?>" value="<?php echo $row['tipebunga_id']?>"><?php echo $row['nama']?></option>
              <?php } ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-12 form-group">
              <label>Bunga</label>
              <input name="bunga_id" type="hidden" id="bunga_id" class="form-control" placeholder="Bunga Dalam persen" required>
              <input name="persenbunga" type="text" id="persenbunga" class="form-control" placeholder="Bunga Dalam persen" readonly required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-12 form-group">
              <label>Keperluan</label>
              <input name="keperluan" type="text" id="keperluan" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-12 form-group">
              <label>Token</label>
              <input name="token" type="text" id="token" class="form-control" required>
            </div>
          </div>

          <dir class="panel-footer">
            <div class="pull-right">
              <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin akan memproses transaksi peminjaman ini?');">Proses</button> 
            </div>
          </div>
      </div>
    </div>
  </div>

</form>
</div>
<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<!-- <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>" rel="stylesheet"></script> -->

<script>
  
    $(document).ready(function(){
      $( "#myselect" ).change(function () {
        var str = "";
        $( "select option:selected" ).each(function() {
          str1 = $( this ).data('cash') + " ";
          str2 = $( this ).data('id') + " ";
        });
        $( "#persenbunga" ).val(parseFloat(str1).toFixed(2));
        $( "#bunga_id" ).val(str2);
      })
      .change();
    });

    if(<?php echo count($peminjaman['data']); ?> == 0)
    {
      $('#myModal1').modal({backdrop: 'static', keyboard: false});
    }
    
</script>