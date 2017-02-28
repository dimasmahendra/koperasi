<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>
<style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 767px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelTransaksi table, #tabelTransaksi thead, #tabelTransaksi tbody, #tabelTransaksi th, #tabelTransaksi td, #tabelTransaksi tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelTransaksi thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelTransaksi tr { border: 3px solid #ccc; }

      #tabelTransaksi td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;        
      }

      #tabelTransaksi td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
      }
      /*
      Label the data
      */  
      #tabelTransaksi td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelTransaksi td:nth-of-type(2):before { content: "Nama Produk"; text-align: left;}
      #tabelTransaksi td:nth-of-type(3):before { content: "Kuantitas"; text-align: left;}
      #tabelTransaksi td:nth-of-type(4):before { content: "Harga"; text-align: left;}
      #tabelTransaksi td:nth-of-type(5):before { content: "Subtotal"; text-align: left;}     
      #tabelTransaksi td:nth-of-type(6):before { content: "Edit"; text-align: left;}  
      #tabelTransaksi td:nth-child(1) { text-align: right;}
      #tabelTransaksi td:nth-child(2) { text-align: right;}
      #tabelTransaksi td:nth-child(3) { text-align: right;}
      #tabelTransaksi td:nth-child(4) { text-align: right;}
      #tabelTransaksi td:nth-child(5) { text-align: right;}
      #tabelTransaksi td:nth-child(6) { text-align: right;}
    }  

    @media (min-width: 768px) {
      body {
        margin-left:50px;
      }
    }

    @media (min-width: 1024px) {
      body {
        margin-left:0px;
      }
    }
  
</style>
<!-- ModalTransaksi -->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaksi Koperasi</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda ingin keluar dari transaksi ?</p>
      </div>

      <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>Transaksi/cancelTransaksi">

      <div class="modal-footer">
        <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ya</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
      </form>
    </div>    
  </div>
</div>  

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">    
  </br><!--/.row-->
    <?php if($this->session->flashdata('pesan')){?> 
      <div class="alert bg-success" role="alert">
        <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
        <?php echo $this->session->flashdata('pesan')?> 
      </div><?php } ?>                
    <?php if($this->session->flashdata('gagal')){?> 
      <div class="alert bg-danger" role="alert">
        <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
        <?php echo $this->session->flashdata('gagal')?> 
      </div><?php } ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Pilih Produk Koperasi</div>
          <div class="panel-body">          

          <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Transaksi/insertTransaksiTemp">

              <?php if($this->session->flashdata('stokhabis')){?> 
                  <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                    <?php echo $this->session->flashdata('stokhabis')?> 
                  </div><?php } ?>

              <div class="row row-table">
                <div class="col-md-2 form-group">                   
                  <label>Kategori : </label>    
                    <div class="input-group">                
                      <select name="kat" class="form-control" id="kategori">
                        <option>- Pilih Kategori -</option>
                          <?php foreach($kategori['data'] as $row){ ?>               
                            <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                          <?php } ?>
                      </select> 
                    </div>               
                </div>

                <div class="col-md-3 form-group">
                    <label>Produk : </label>     
                      <div class="input-group">                     
                        <select name="prod" class="form-control" id="produk">
                            <option value=''>- Pilih Produk -</option>
                        </select>   
                      </div>            
                </div>

                <div class="col-md-2 form-group">
                  <label>Kuantitas</label>
                  <div class="input-group">   
                    <input type="text" id="kuantitas" name="kuantitas" class="form-control" style="height: 34px;">
                  </div>
                </div>

                <div class="col-md-2 form-group">
                    <label>Satuan : </label>   
                    <div class="input-group">                       
                      <div id="satuan" name="sat" value=""></div>
                    </div>
                </div>

                <div class="col-md-2 form-group">
                    <label>Harga Jual : </label>  
                    <div class="input-group">                        
                      <div id="harga" name="har" value=""></div>
                    </div>
                </div>

                <div class="col-md-2 form-group">
                  <div class="input-group"> 
                  <button style="margin-top:25px" href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Tambah</button>    
                  </div>      
                </div>                
            </div>

          </form> 

          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Transaksi</div>
          <div class="panel-body">
          <!-- <table class="table table-bordered"> -->
          <?php if(empty($hasil['data'])) { echo "<h2>Transksi Belum Ada</h2>"; $hidden = "hidden";}?>
          <?php if(!is_null($hasil['data'])) { $hidden = "";?>
          <table id="tabelTransaksi" class="table table-condensed" width="100%" align="center" <?php echo $hidden; ?>>
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>  
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Edit</th>                                 
              </tr>
            </thead>
            <tbody>
                <?php
                  $no = 1;            
                  foreach ($hasil['data'] as $row)
                  { ?>
                        <tr>
                            <td><?php echo $no;$no++; ?></td>
                            <td><?php echo $row['produk']['nama']; ?></td>                              
                            <td><?php echo $row['kuantitas']; ?></td>
                            <td><?php echo $row['hargajual']; ?></td>
                            <td><?php echo $row['subtotalhargajual']; ?></td>
                            <td>                               
                             <a class="btn-sm btn-primary" href ="<?= base_url('Transaksi/ubahTransaksi') ?>/<?php echo $row['id']?>">
                             Edit</a>
                             &nbsp;
                             <a class="btn-sm btn-danger" href ="<?= base_url('Transaksi/hapusTransaksi') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Item ini?');">
                             Delete</a> 
                            </td>                           
                        </tr>
                <?php } ?>            
            </tbody>              
          </table>
          <div>
              <?php
                  $sum = 0;                               
                  foreach ($hasil['data'] as $row)
                  { ?>
                    <?php $sum += $row['subtotalhargajual']; ?>                       
              <?php } ?>
              <h3><b>Total Harga : <div style=" display: inline-block;"><?php echo "Rp ".number_format ($sum, 2, ',', '.'); ?></div></b></h3>
          </div></br>
          <?php } ?>

          <div class="pull-right">
            <a class="btn btn-default" href ="#" data-toggle="modal" data-target="#myModal1">Batal</a>&nbsp;&nbsp;&nbsp;
            <a class="btn btn-primary" href ="<?= base_url('Transaksi/bayarTransaksi') ?>/<?php echo $row['id']?>">Bayar</a>              
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

    $("#produk").change(function (){
      var url = "<?php echo site_url('Transaksi/satuanKategori');?>/"+$(this).val();
      var url2 = "<?php echo site_url('Transaksi/hargajualKategori');?>/"+$(this).val();
      $('#satuan').load(url);
      $('#harga').load(url2);
      return false;
    })    
  });  
</script>