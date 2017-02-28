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

<style>
  .close {
    color: #fff; 
    opacity: 1;
}
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">    
<div class="modal fade" id="modalPembelian" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pembelian Koperasi</h4>
      </div>
      <div class="modal-body">
        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>Pembelian/index">
            <div class="row"> 
              <div class="col-sm-6 form-group">                   
                  <label>Tanggal Pembelian</label>                   
                  <input type="text" id="datetimepicker2" class="form-control" style="min-height:34px" name="tanggal">                
              </div>
            </div>       
          </div>
          <div class="modal-footer">
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ya</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </form>
    </div>    
  </div>
</div>

</br><!--/.row-->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Daftar Pembelian Koperasi&nbsp;&nbsp;
        <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalPembelian" href ="#">Tambah Pembelian</a>
      </div>
      <div class="panel-body">

      <?php if($this->session->flashdata('message')){?> 
            <div class="alert bg-success" role="alert">
              <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
              <?php echo $this->session->flashdata('message')?> 
            </div><?php } ?>

        <?php if($this->session->flashdata('error')){?> 
              <div class="alert bg-danger" role="alert">
                <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                <?php echo $this->session->flashdata('error')?> 
              </div><?php } ?>

          <?php if($this->session->flashdata('warning')){?> 
            <div class="alert bg-warning" role="alert">
              <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
              <?php echo $this->session->flashdata('warning')?> 
            </div><?php } ?>

      <!-- <table class="table table-bordered"> -->
      <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>                    
                <th>Tahun Operasi</th>
                <th>Tanggal Pembelian</th>
                <th>Total Harga Beli</th>
                <th>Metode</th>                                                               
                <th>Edit</th>                  
              </tr>
            </thead>
            <tbody>
                <?php
                  $no = 1;            
                  foreach ($result['data'] as $row)
                  { ?>
                        <tr>
                        <td><?php echo $no;$no++; ?></td>
                        <td><?php echo $row['tahunoperasi']['tanggalmulai'];?>&nbsp;/&nbsp;<?php echo $row['tahunoperasi']['tanggalselesai'];?></td>
                        <td><?php echo substr($row['tanggal'], 0, 10);?></td>
                        <td><?php echo "Rp ".number_format ($row['totalhargabeli'], 2, ',', '.'); ?></td>
                        <td><?php echo $row['metode']; ?></td>                                              
                        <td>                               
                           <a class="btn-sm btn-primary" href ="<?= base_url('Pembelian/daftarDetilPembelian') ?>/<?php echo $row['id']?>">
                               Detail</a>
                          &nbsp;
                          <a class="btn-sm btn-danger" href ="<?= base_url('Pembelian/deletePembelian') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Pembelian Koperasi ini?');">
                          Hapus</a> 
                        </td>
                      </tr>
                <?php } ?>            
            </tbody>              
      </table>      

      </div>
    </div>
  </div>
</div><!--/.row-->  
</div>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>
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
$('#datetimepicker2').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });
</script>