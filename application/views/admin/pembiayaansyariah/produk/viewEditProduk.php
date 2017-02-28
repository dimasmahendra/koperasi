<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/formValidation.js') ?>" rel="stylesheet"></script>

<style type="text/css">
.has-feedback .form-control-feedback {
    top: 25px;
    right: 0;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 25px;
    right: 22px;
}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="col-lg-12">
    <!-- Tabel inputan user admin -->
    <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>PembiayaanSyariah/updateProdukSyariah">     
      <div class="panel panel-default">
        <div class="panel-heading">Tambah Produk Pembiayaan Syariah</div>
          <div class="panel-body"> 
            <input name="id" type="hidden" id="id" class="form-control" value= "<?php echo $id; ?>">
            <div class="row">
              <div class="col-md-4 form-group">
                <label>Nama Produk / Jasa</label>
                <div class="input-group">
                  <input name="namaprogram" type="text" id="namaprogram" class="form-control" value= "<?php echo $namaprogram; ?>" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 form-group">
                <label>Akad</label>
                <div class="input-group">
                  <select name="akad" class="form-control" id="akad">
                    <option value="">- Pilih Akad -</option>
                    <option value="mudharabah" <?php if($akad == 'mudharabah') { echo "selected";}?>>Mudharabah</option>
                    <option value="musyarakah" <?php if($akad == 'musyarakah') { echo "selected";}?>>Musyarakah</option>
                    <option value="ijarah" <?php if($akad == 'ijarah') { echo "selected";}?>>Ijarah</option>
                    <option value="ijarahmuntahiyahbittamlik" <?php if($akad == 'ijarahmuntahiyahbittamlik') { echo "selected";}?>>Ijarah Muntahiyah Bittamlik</option>
                    <option value="murabahah" <?php if($akad == 'murabahah') { echo "selected";}?>>Murabahah</option>
                    <option value="salam" <?php if($akad == 'salam') { echo "selected";}?>>Salam</option>
                    <option value="istishna" <?php if($akad == 'istishna') { echo "selected";}?>>Istishna</option>
                    <option value="pinjam" <?php if($akad == 'pinjam') { echo "selected";}?>>Pinjam Meminjam</option>                    
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group">
                <label>Deskripsi</label>
                  <div class="input-group">
                    <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"><?php echo $deskripsi; ?></textarea>
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