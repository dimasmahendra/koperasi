<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
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
    </br><!--/.row-->
      <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Produk/tambahProduk">    

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Tambah Produk Koperasi</div>
          <div class="panel-body" style="margin-left: 20px">             

              <div class="row">
                <div class="col-md-3 col-xs-12 form-group">                   
                      <label>Supplier</label>
                      <select name="suplier" class="form-control" id="suplier_id" style="height: 34px;">
                          <option>- Select Suplier -</option>                                        
                          <?php foreach($hasil['data'] as $row){ ?>               
                              <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                          <?php } ?>   
                      </select>                
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 col-xs-12 form-group">                   
                      <label>Kategori</label>
                      <select name="kategori" class="form-control" id="kategori_id" style="height: 34px;">
                          <option>- Select Kategory -</option>                                        
                          <?php foreach($kategori['data'] as $row){ ?>               
                              <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                          <?php } ?>   
                      </select>                
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 col-xs-12 form-group">
                  <label>Nama Produk</label>
                  <input type="text" id="nama" name="nama" class="form-control" style="height: 34px;" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2 col-xs-12 form-group">
                  <label>Satuan Produk</label>
                  <input type="text" id="satuan" name="satuan" class="form-control" style="height: 34px;" required>
                </div>
              </div>             

              <div class="row">
                <div class="col-md-2 col-xs-12 form-group">
                  <label>Harga Jual</label>
                  <input type="text" id="hargajual" name="hargajual" class="form-control" style="height: 34px;" required>
                </div>
              </div> 


              <div class="row">
                <div class="col-md-3 col-xs-12 form-group">
                  <label>Gambar Produk</label>
                  <input type="file" id="foto"  name="foto" class="form-control">
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