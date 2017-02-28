<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Transaksi/updateTransaksi">
        <div class="panel panel-default">
          <div class="panel-heading">Edit Transaksi Produk Koperasi</div>
          <div class="panel-body">
            <div>
              <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="transaksidetail_id"></input>
            </div>
            <div class="row row-table">
              <div class="col-md-3 form-group">                   
                <label>Kategori : </label> 
                  <div class="input-group">                   
                    <select name="kat" class="form-control" id="kategori" required>
                      <option>- Select Kategori -</option>
                        <?php foreach($kategori['data'] as $row){ ?>               
                          <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                        <?php } ?>
                    </select>   
                  </div>             
              </div>
              <div class="col-md-3 form-group">
                  <label>Produk : </label>   
                    <div class="input-group">                    
                      <select name="prod" class="form-control" id="produk" required>
                          <option value=''>- Select Produk -</option>
                      </select> 
                    </div>              
              </div>
              <div class="col-md-2 form-group">
                <label>Kuantitas</label>
                  <div class="input-group">
                    <input type="text" id="kuantitas" name="kuantitas" class="form-control" style="height: 34px;" value="<?php echo $kuantitas?>" required>
                  </div>
              </div>
              <div class="col-md-2 form-group">
                <div class="input-group">
                  <button style="margin-top: 25px" class="btn btn-default"><a href="<?php echo base_url(); ?>Transaksi/daftarTransaksi">Batal</a></button>&nbsp&nbsp
                  <button style="margin-top: 25px" href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div><!--/.row--> 
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#kategori").change(function (){
      var url = "<?php echo site_url('Transaksi/produkKategori');?>/"+$(this).val();
      $('#produk').load(url);             
      return false;
    })    
  });  
</script>