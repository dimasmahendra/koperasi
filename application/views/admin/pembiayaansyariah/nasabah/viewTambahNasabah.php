<link href="<?= base_url('asset_admin/css/jquery-ui.css') ?>" rel="stylesheet">
<script src="<?= base_url('asset_admin/js/autoNumeric-1.9.41.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/autoNumeric-1.8.0-sample.js') ?>" rel="stylesheet"></script>

<style type="text/css">
.has-feedback .form-control-feedback {
    top: 25px;
    right: 0;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 25px;
    right: 22px;
}
.ui-autocomplete {
  max-height: 100px;
  overflow-y: auto;
  z-index:2147483647;
  overflow-x: hidden;
  font-family: inherit;
}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="col-lg-12">
    <!-- Tabel inputan user admin -->
    <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>AngsuranNasabah/insertPembiayaanSyariah">     
      <div class="panel panel-default">
        <div class="panel-heading">Tambah Pembiayaan Syariah</div>
          <div class="panel-body"> 
            <div class="row">
              <div class="col-md-4 form-group">
                <label>Nama Anggota : </label>
                <div class="input-group">
                  <input type="text" class="form-control" id="namatags" name="namatags">
                  <input type="hidden" id="namaid" name="namaid" value="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 form-group">
                <label>Produk Syariah : </label>
                <div class="input-group">
                  <select name="produk_id" class="form-control" id="produk_id" required>
                    <option value="">- Produk Syariah -</option>
                    <?php foreach($pembiayaan['data'] as $row){ ?>               
                        <option value="<?php echo $row['id'];?>"><?php echo $row['namaprogram'] ?></option>
                    <?php } ?>
                  </select> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 form-group">
                <label>No Rekening : </label>
                <div class="input-group">
                  <input type="text" class="form-control" id="rekening" name="rekening" required>
                </div>
              </div>
              <div class="col-md-4 form-group">
                <label>No Bukti : </label>
                <div class="input-group">
                  <input type="text" class="form-control" id="nobukti" name="nobukti" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 form-group">
                <label>Jumlah Pinjam : </label>
                <div class="input-group">
                  <input type="text" class="form-control formatRupiah" name="jumlahpinjam" id="jumlahpinjam" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                </div>
              </div>
              <div class="col-md-4 form-group">
                <label>Tenor : </label>
                <div class="input-group">
                  <input type="text" class="form-control" id="tenor" name="tenor" required>
                  <span class="input-group-addon">/ Bulan</span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 form-group">
                <label>Bonus : </label>
                <div class="input-group">
                  <input type="text" class="form-control" id="bonus" name="bonus" required>
                </div>
              </div>
              <div class="radio-inline" style="margin-top: 25px;">
                <div class="input-group">
                  <label>
                    <input type="hidden" name="persen" value="tidak"/>
                    <input type="checkbox" id="persen" name="persen" value="ya"/>&nbsp;Persen
                  </label>
                </div>
              </div>               
            </div>        

            <div class="row">
              <div class="col-md-12 form-group">
                <label>Keterangan Lain : </label>
                  <div class="input-group">
                    <textarea class="form-control" rows="5" id="keterangan" name="keterangan"></textarea>
                  </div>
              </div>   
            </div>            
        
            <div class="pull-right">                  
              <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulangi</button>
              <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>            
            </div>                         
          </div>
      </div>      
    </form>
  </div> 
</div>
<script src="<?= base_url('asset_admin/js/jquery-ui.js') ?>" rel="stylesheet"></script>
<script type="text/javascript">  
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $ta) { ?>
        {label: "<?=$ta['nama']?>", id:  "<?=$ta['id']?>"},
    <?php } ?>];
    console.log(availableTags);
    $( "#namatags" ).autocomplete({
      source: availableTags,
      select: function (event, ui) { 
        $("#namatags").val(ui.item.label); // display the selected text
        $("#namaid").val(ui.item.id); // save selected id to hidden input
      }
    });
  });
</script>