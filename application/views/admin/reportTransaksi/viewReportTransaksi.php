<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet">   
<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Histori Report Transaksi :</div>
          <div class="panel-body">

            <form name="form" id="form" class="form-horizontal" style="margin-left:10px" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>ReportTransaksi/daftarPeriodeReport">
                        
              <div class="row row-table">

              <div class="col-md-2 form-group">                   
                <label>Periode Akhir : </label>                   
                <input type="text" id="datetimepicker2" name="tanggalmulai" required>                
              </div>                          

              <div class="col-md-2 form-group">
                <label>Periode Awal : </label>                       
                <input type="text" id="datetimepicker3" name="tanggalakhir" required>              
              </div>                          
                        
              <div class="col-md-2" style="margin-top:20px">                  
                <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Submit</button>
              </div>                         

              </div>                        
            </form>          

          </div>
        </div>
      </div>
    </div><!--/.row-->  

      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Report Transaksi <a style="float: right; margin-top: 10px" class="btn-sm btn-primary" href ="<?php echo base_url(); ?>CetakLaporanTransaksi/pdf">
          <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak</a>
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
                                <td><?php echo $row['metode']; ?></td>
                                <td><?php echo $row['status']; ?></td>                                    
                                <td>                               
                                 <a class="btn-sm btn-primary" href ="<?= base_url('ReportTransaksi/daftarDetilReportTransaksi') ?>/<?php echo $row['id']?>">
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

  $('#datetimepicker2').datetimepicker({   
        timepicker:false,
        format:'Y-m-d',
        formatDate:'yy-mm-dd',        
      });

      $('#datetimepicker3').datetimepicker({   
        timepicker:false,
        format:'Y-m-d',
        formatDate:'yy-mm-dd',        
      });

</script>