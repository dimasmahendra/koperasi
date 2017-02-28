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
<!-- alert Style custom -->
<style>
  .alert .close {
    color: #fff; 
    opacity: 1;
  }
</style>
<!-- End alert Style custom -->


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
    /* Force table to not be like tables anymore */
    #tabelAnggotaKoperasi table, #tabelAnggotaKoperasi thead, #tabelAnggotaKoperasi tbody, #tabelAnggotaKoperasi th, #tabelAnggotaKoperasi td, #tabelAnggotaKoperasi tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    #tabelAnggotaKoperasi thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    #tabelAnggotaKoperasi tr { border: 3px solid #ccc; }

    #tabelAnggotaKoperasi td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
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
    }

    /*
    Label the data
    */   
    #tabelAnggotaKoperasi td:nth-of-type(1):before { content: "No"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "Nama"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Tanggal Peminjam"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(5):before { content: "Peminjam Pokok"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(6):before { content: "Tenor"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(7):before { content: "Bunga"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(8):before { content: "Tipe Bunga"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(9):before { content: "Angsuran Belum Dibayar"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(10):before { content: "Jatuh Tempo"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(5) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(6) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(7) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(8) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(9) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(10) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(11) { text-align: right;}
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
          <div class="panel-heading">Daftar Peminjam</div>
          <div class="panel-body">

          <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                </div><?php } ?>

          <?php if($this->session->flashdata('warning')){?> 
                  <div class="alert bg-warning" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
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
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">No</th> 
                <th class="text-center">Nama</th>
                <th class="text-center" style="display: none;">ID</th>
                <th class="text-center">Tanggal Peminjam</th>                
                <th class="text-center">Peminjam Pokok</th>                
                <th class="text-center">Tenor</th>                
                <th class="text-center">Bunga</th>                
                <th class="text-center">Tipe Bunga</th>                
                <th class="text-center">Ansuran Belum Dibayar</th>                
                <th class="text-center">Jatuh Tempo</th>           
                <th >Aksi</th>                  
              </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            if ($result['status'] == '1') {
              
    
            foreach ($result['data'] as $row) { 
              $status = $row['status'];
            ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_anggota_koperasi']?></td>
                <td style="display: none;"><?php echo $row['idunik']; ?></td>
                <td class="text-center"><?php echo $row['tanggal']; ?></td>
                <td class="text-center"><?php echo "Rp ".format_rupiah($row['jumlah']); ?></td>
                <td class="text-center"><?php echo $row['tenor']; ?> Bulan</td>
                <td class="text-center"><?php echo number_format($row['persenbunga'], 2); ?> %</td>
                <td class="text-center"><?php echo $row['nama_bunga']; ?></td>
                <td class="text-center"><?php echo $row['sisatenor']; ?> Bulan</td>
                <td class="text-center"><?php echo $row['jatuhtempo']; ?></td>
                <td class="text-center">
                  <?php if ($status == 'Aktif') { ?>
                    <a href="<?php echo base_url()?>Peminjaman/pembayaranAngsuran/<?php echo $row['id']?>"><button type="button" class="btn btn-primary btn-xs">Bayar</button></a>
                  <?php }
                  else { ?>
                    <a href="<?php echo base_url()?>Peminjaman/pembayaranAngsuran/<?php echo $row['id']?>"><button type="button" class="btn btn-success btn-xs">Lunas</button></a>
                  <?php }?>
                </td>
              </tr>
            <?php } }?>
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