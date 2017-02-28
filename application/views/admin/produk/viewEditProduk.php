<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<style type="text/css">

@media (min-width: 424px) {
    body {
      margin-top: 50px;
    }
  }

@media (min-width: 768px) {
    body {
      margin-left: 50px;
      margin-top: 0px;
    }
  }

@media (min-width: 1024px) {
    body {
      margin-left: 0px;
    }
  }
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">      
  <div class="row">
    <div class="col-lg-12">
      <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Produk/updateProduk">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">Edit Produk Koperasi</div>
              <div class="panel-body">

                  <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="produk_id">       
                  <input type="hidden" value="<?php echo $suplier_id; ?>" name="suplier_id">              

                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label>Nama Produk</label>
                        <div class="input-group">
                          <input type="text" id="nama" name="nama" class="form-control" style="height: 34px;" value="<?php echo $nama;?>" required>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-2 form-group">
                      <label>Satuan Produk</label>
                        <div class="input-group">
                          <input type="text" id="satuan" name="satuan" class="form-control" style="height: 34px;" value="<?php echo $satuan;?>" required>
                        </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-2 form-group">
                      <label>Harga Jual</label>
                        <div class="input-group">
                          <input type="text" id="hargajual" name="hargajual" class="form-control" style="height: 34px;" value="<?php echo $hargajual;?>" 
                          required>
                        </div>
                    </div>
                  </div>                 

                  <div class="row">
                    <div class="input-group">
                    <?php if($foto ==''|$foto =='no_image.png'){ ?>
                    <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-responsive" alt="Cinque Terre">
                    <?php } else { ?>                
                    <img src ="<?php echo URL_IMG ?>images/produk/<?php echo $foto; ?>" rel="stylesheet" class="img-responsive" alt="Cinque Terre">
                    <?php  } ?>    
                    </div>         
                  </div>            

                  <div class="row">                   
                    <div class="col-md-4 form-group">
                      <label>Foto</label>
                        <div class="input-group">
                          <input name="foto" type="file" id="foto" class="form-control">
                        </div>
                    </div>
                  </div>        

                  <div class="pull-right">
                    <div class="input-group">                              
                      <button class="btn btn-default"><a href="<?php echo base_url(); ?>Produk/daftarProduk">Batal</a></button>&nbsp
                      <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>   
                    </div>
                  </div>

              </div>
          </div>
        </div>
      </form>
    </div>      
  </div>
</div>