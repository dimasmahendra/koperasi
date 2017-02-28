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

<!-- modal Style custom -->
<style>
  .modal-header {
    background: #203864;
  }
  .modal-title {
    color: #fff;
  }
  .alert .close, .modal-header .close {
    color: #fff; 
    opacity: 1;
  }
  #tabelKoperasiSekunder td:nth-child(11) {
    width: 15%;
  }
</style>
<!-- End modal Style custom -->
<style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
body {
    margin-top:27px;
    }
    .panel-heading{
      font-size: 15px;
      font-weight: bold;
    }
    /* Force table to not be like tables anymore */
    #tabelKoperasiSekunder table, #tabelKoperasiSekunder thead, #tabelKoperasiSekunder tbody, #tabelKoperasiSekunder th, #tabelKoperasiSekunder td, #tabelKoperasiSekunder tr{
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    #tabelKoperasiSekunder thead tr{
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    #tabelKoperasiSekunder tr{ border: 3px solid #ccc; }

    #tabelKoperasiSekunder td{
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    #tabelKoperasiSekunder td:before {
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
    #tabelKoperasiSekunder td:nth-of-type(1):before { content: "No"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(2):before { content: "No. Rekening"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(4):before { content: "Nama"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(5):before { content: "Jumlah Simpanan"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(6):before { content: "Tenor"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(7):before { content: "Bunga"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(8):before { content: "Jumlah Bunga"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(9):before { content: "Total"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(10):before { content: "Tanggal Penyimpanan"; text-align: left;}
    #tabelKoperasiSekunder td:nth-of-type(11):before { content: "Tanggal Pengambilan"; text-align: left;}
    #tabelKoperasiSekunder td:nth-child(1) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(2) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(4) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(5) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(6) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(7) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(8) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(9) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(10) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(11) { text-align: right;}
    #tabelKoperasiSekunder td:nth-child(12) { width: 50%;text-align: right;}
  }
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Kesehatan Koperasi</div>
          <div class="panel-body">

          <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                </div><?php } ?>

             <?php if($this->session->flashdata('warning')){?> 
                <div class="alert bg-warning" role="warning">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('warning')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                </div><?php } ?>

              <?php if($this->session->flashdata('error')){?> 
                  <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                    <?php echo $this->session->flashdata('error')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                  </div><?php } ?>

          <!-- <table class="table table-bordered"> -->
          <table id="tabelKoperasiSekunder" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Koperasi</th>  
                    <th>Skor</th>
                    <th>Predikat</th>
                    <th>Status</th>            
                    <th>Detil</th>                  
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>
                        <tr>
                            <td><?php echo $no;$no++; ?></td>
                            <td><?php echo $row['koperasi']['nama']; ?></td>
                            <td><?php echo $row['predikatkesehatanksp']['skor']; ?></td>                           
                            <td><?php echo $row['predikatkesehatanksp']['predikat']; ?></td>                           
                            <td><?php echo $row['predikatkesehatanksp']['status']; ?></td>
                            <td>                               
                            <a class="btn-sm btn-primary" href ="<?= base_url('KesehatanSekunder/lihatdetil') ?>/<?php echo $row['koperasi_id']?>">
                             Lihat Detail</a>
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
    var table = $('#tabelKoperasiSekunder').DataTable();
 
    $('#tabelKoperasiSekunder tbody').on( 'click', 'tr', function () {
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