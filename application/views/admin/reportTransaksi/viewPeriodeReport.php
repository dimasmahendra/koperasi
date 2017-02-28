<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>
   
<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>

</head>
<body>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" style="font-weight: 500;">Report Transaksi</h1>
      </div>
    </div><!--/.row-->

      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><button class="btn-xs btn-info"><a style="color:white;" href="<?php echo base_url(); ?>ReportTransaksi/daftarReportTransaksi"><svg class="glyph stroked chevron left"><use xlink:href="#stroked-chevron-left"/></svg>Back</a></button>&nbsp;&nbsp;
          Histori Report

          <div style="float: right;">
            <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>CetakLaporanTransaksi/pdfPeriode">

              <input type="hidden" value="<?php echo $tanggalmulai?>" name="tanggal_mulai">
              <input type="hidden" value="<?php echo $tanggalakhir?>" name="tanggal_akhir">

              <div class="col-md-12">
                <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary btn-md">
                <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak</button>
              </div>
            </form>
          </div>

          </div>
          <div class="panel-body">
          
          <!-- <table class="table table-bordered"> -->
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Faktur</th>  
                    <th>Nama Anggota</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>                    
                    <th>Bayar</th>
                    <th>Metode</th>               
                    <th>Status</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['nomorfaktur']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                                <td><?php echo $row['jumlah']; ?></td>
                                <td><?php echo $row['bayar']; ?></td>
                                <td><?php echo $row['metode']; ?></td>
                                <td><?php echo $row['status']; ?></td>                                    
                                <td>                               
                                 <a class="button" href ="<?= base_url('ReportTransaksi/daftarDetilReportTransaksi') ?>/<?php echo $row['id']?>">
                                 View Detail</a>                                 
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

</body>
</html>        