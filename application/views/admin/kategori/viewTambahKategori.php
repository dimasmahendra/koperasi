<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br><!--/.row-->  

      <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Kategori/tambahKategori">    

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Tambah Kategori Produk Koperasi</div>
          <div class="panel-body" style="margin-left: 20px">              

              <div class="row">
                <div class="col-md-5 form-group">
                  <label>Nama Kategori</label>
                  <input name="nama" type="text" id="nama" class="form-control" required>
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