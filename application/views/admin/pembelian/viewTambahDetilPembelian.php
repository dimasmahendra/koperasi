<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>
<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet"> 

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>
</head>
<body>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<!--=========================================== MODAL INSERT TRANSAKSI ======================================================-->
<div class="modal fade" id="modalinstTran" role="dialog">
  <div class="modal-dialog">  
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pembelian Koperasi</h4>
      </div>
      <div class="modal-body">
        <p><H4>Apakah anda yakin akan meneruskan Pembelian Koperasi ini ??</H4></p>
        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>Pembelian/insertPembelian">            
      
          <div class="modal-footer">
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ya</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </form>
    </div>    
  </div>
</div>
</div>
<!--=========================================== MODAL INSERT TRANSAKSI ======================================================-->

<!--=========================================== MODAL BATAL TRANSAKSI ======================================================-->
<div class="modal fade" id="modalbatalTran" role="dialog">
  <div class="modal-dialog">  
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pembelian Koperasi</h4>
      </div>
      <div class="modal-body">
        <p><H4>Apakah anda yakin akan keluar dari Pembelian Koperasi ini ??</H4></p>
        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>Pembelian/hapusPembelian">            
      
          <div class="modal-footer">
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ya</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </form>
    </div>    
  </div>
</div>
</div>
<!--=========================================== MODAL BATAL TRANSAKSI ======================================================-->
</br> 
<div class="col-md-12">
  <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Pembelian/insertDetilPembelian">

    <div class="panel panel-default">
      <div class="panel-heading">Detil Pembelian Koperasi&nbsp;&nbsp;
        <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
      </div>

      <div class="panel-body">        
        <div class="row">
          <div class="col-md-4">                   
            <label>Kategori : </label>                    
              <select name="kat" class="form-control" id="kategori">
                <option>- Pilih Kategori -</option>
                  <?php foreach($kategori['data'] as $row){ ?>               
                    <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                  <?php } ?>
              </select>                
          </div>

          <div class="col-md-4">
            <label>Produk : </label>                       
              <select name="prod" class="form-control" id="produk">
                  <option value=''>- Pilih Produk -</option>
              </select>               
          </div>     
        </div></br>

        <div class="row">
          <div class="col-md-3">
            <label>Kuantitas : </label>
            <input type="text" id="kuantitas" name="kuantitas" class="form-control" style="height: 34px;" required>
          </div>

          <div class="col-md-3">
            <label>Harga Beli : </label>
            <input type="text" id="hargabeli" name="hargabeli" class="form-control" style="height: 34px;" required>
          </div>          

          <div class="col-md-3">
            <label>Subtotal Harga Beli : </label>
            <input type="text" id="subtotalhargabeli" name="subtotalhargabeli" class="form-control" style="height: 34px;" required>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>                    
            <th>Nama Item</th>
            <th>Harga Beli</th>
            <th>Kuantitas</th>
            <th>Subtotal</th>                 
          </tr>
        </thead>
        <tbody>
            <?php
              if (count($result['data']['pembeliandetailtemp']) == '0')
                {

                }
              else
              {
                $no = 1;            
                foreach ($result['data']['pembeliandetailtemp'] as $row) { 
            ?>
              <tr>
                <td><?php echo $no;$no++; ?></td>
                <td><?php echo $row['produk']['nama'];?></td>
                <td><?php echo "Rp ".number_format ($row['hargabeli'], 2, ',', '.'); ?></td>
                <td><?php echo $row['kuantitas'];?></td>
                <td><?php echo "Rp ".number_format ($row['subtotalhargabeli'], 2, ',', '.'); ?></td>           
              </tr>
            <?php }} ?>            
        </tbody>              
      </table>
      <div class="panel-footer">
        <?php
          if (count($result['data']['pembeliandetailtemp']) == '0')
            {

            }
          else
          {
            $sum = 0;            
            foreach ($result['data']['pembeliandetailtemp'] as $row) { 
        ?>
        <td><?php $sum+= $row['subtotalhargabeli'];?></td>            
        <?php } ?>
        <h1 style="color:red;"><b>Total  </b>Rp <?php echo number_format($sum); } ?></h1>

       <div class="pull-right">
          <a class="btn btn-default" href ="#" data-toggle="modal" data-target="#modalbatalTran">Batal</a>&nbsp;&nbsp;&nbsp;
          <a class="btn btn-primary" href ="#" data-toggle="modal" data-target="#modalinstTran">Bayar</a>              
        </div>
      </div>
    </div>      
  </div>
</div><!--/.row-->  

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#tabelAnggotaKoperasi').DataTable();
 
    $('#tabelAnggotaKoperasi tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#hapus').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );
</script>

<script type="text/javascript">
  $("#kuantitas, #hargabeli").change(function (){
    var kuantitas = $('#kuantitas').val(); 
    var hargabeli = $('#hargabeli').val(); 
    var subtotal = kuantitas*hargabeli;
    $("#subtotalhargabeli").val(subtotal);
  });      
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#kategori").change(function (){
      var url = "<?php echo site_url('Pembelian/produkKategori');?>/"+$(this).val();      
      $('#produk').load(url);
      return false;
    })       
  });  
</script>