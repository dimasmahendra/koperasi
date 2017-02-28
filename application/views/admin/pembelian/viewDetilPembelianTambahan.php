<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet"> 

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
</br>
      <!-- Tabel inputan user admin -->
 

<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">Detil Pembelian Koperasi</div>
    <div class="panel-body" style="margin-left: 20px">    

    <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Pembelian/insertDetilPembelian">         

      <div class="row">
        <div class="col-md-4">                   
          <label>Produk</label>
          <select name="produk_id" class="form-control" id="produk_id">
              <option>- Select Produk -</option>
              <?php foreach($hasil['data'] as $row){ ?>               
                  <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
              <?php } ?>
          </select>                
        </div> 

        <div class="col-md-2">
          <label>Kuantitas</label>
          <input type="text" id="kuantitas" name="kuantitas" class="form-control" style="height: 34px;" required>
        </div>
      </div></br> 

      <div class="row">
        <div class="col-md-2">
          <label>Harga Beli</label>
          <input type="text" id="hargabeli" name="hargabeli" class="form-control" style="height: 34px;" required>
        </div>          

        <div class="col-md-2">
          <label>Subtotal Harga Beli</label>
          <input type="text" id="subtotalhargabeli" name="subtotalhargabeli" class="form-control" style="height: 34px;" required>
        </div>
      </div></br>                           

      <div class="panel-footer"></div>
      <div class="pull-right">                              
        <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulangi</button>
        <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>
      </div> 
    </form>  
            
    </div>
  </div>
</div>


<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>

<script type="text/javascript">
$('#datetimepicker2').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd',        
  });
</script>