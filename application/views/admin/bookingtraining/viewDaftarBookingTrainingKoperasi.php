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

<style type="text/css">
@media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

    body{
      margin-top: 27px;
    }
  
  /* Force table to not be like tables anymore */
  #tabelAnggotaKoperasi table, 
  #tabelAnggotaKoperasi thead, 
  #tabelAnggotaKoperasi tbody, 
  #tabelAnggotaKoperasi th, 
  #tabelAnggotaKoperasi td, 
  #tabelAnggotaKoperasi tr { 
    display: block; 
  }
 
  /* Hide table headers (but not display: none;, for accessibility) */
  #tabelAnggotaKoperasi thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
 
  #tabelAnggotaKoperasi tr { border: 1px solid #ccc; }
 
  #tabelAnggotaKoperasi td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 50%; 
    white-space: normal;
    text-align:left;
  }
 
  #tabelAnggotaKoperasi td:before { 
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%; 
    padding-right: 10px; 
    white-space: nowrap;
    text-align:left;
    font-weight: bold;
  }
 
  /*
  Label the data
  */

  #tabelAnggotaKoperasi td:before { content: attr(data-title); }
    #tabelAnggotaKoperasi td:nth-of-type(1):before { content: "No"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "Judul"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(3):before { content: "Isi"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Tempat"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(5):before { content: "Tanggal Pelaksanaan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(6):before { content: "Durasi"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(7):before { content: "Daftar/Kouta"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(3) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(5) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(6) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(7) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(8) { width: 50%;text-align: right;}

}
</style>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">  
    </br><!--/.row-->
    <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?> 
                </div><?php } ?>

    <?php if($this->session->flashdata('error')){?> 
                <div class="alert bg-cancel" role="alert">
                  <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                  <?php echo $this->session->flashdata('error')?> 
                </div><?php } ?>

      <!-- Tabel Inputan Admin -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">Daftar Booking Pelatihan Koperasi</div>
            <div class="panel-body">                         

            <!-- <table class="table table-bordered"> -->
            <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>  
                      <th>Judul</th>
                      <th>Isi</th>
                      <th>Tempat</th>
                      <th>Tanggal Pelaksanaan</th>
                      <th>Durasi</th>
                      <th>Daftar/Kuota</th>
                      <th style="width:15%">Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                        $no = 1;          
                        foreach ($result['data'] as $row)
                        { ?>                 
                              <tr>
                                  <td><?php echo $no;$no++; ?></td>
                                  <td><?php echo $row['judul']; ?></td>
                                  <td><?php echo $row['isi']; ?></td>
                                  <td><?php echo $row['tempat']; ?></td>
                                  <td><?php echo $row['tanggal']; ?></td>
                                  <td><?php echo $row['durasi']; ?></td>
                                  <td><?php if($row['jmlbuking'] == '')
                                  {
                                      echo "0";
                                  }
                                  else 
                                  {
                                      echo $row['jmlbuking'];
                                  } ?> 
                                  / <?php if($row['kapasitas'] == '')
                                  {
                                      echo "0";
                                  }
                                  else 
                                  {
                                      echo $row['kapasitas'];
                                  } ?> 
                                  </td>        
                                  <td>                               
                                   <a class="btn-sm btn-primary" href ="<?= base_url('bookingTraining/daftarPemesanBookingTraining') ?>/<?php echo $row['trainingkoperasi_id']?>">
                                   Detail Peserta</a>                               
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