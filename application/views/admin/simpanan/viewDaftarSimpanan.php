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
    padding-left: 30%; 
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
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "Nama Anggota"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(3):before { content: "Jenis Simpanan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Tanggal Bayar"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(5):before { content: "Jumlah"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(6):before { content: "Status"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(3) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(5) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(6) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(7) { text-align: right;}

    .panel-heading{
      font-weight:bold;
      font-size: 14px;
    }

}
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
    </br><!--/.row-->   
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Simpanan Sukarela&nbsp;&nbsp;
              <a class="btn-sm btn-primary visible-lg-inline-block" href ="<?= base_url('Simpanan/index') ?>">Tambah Simpanan</a>
              <a class="btn-sm btn-primary hidden-lg" href ="<?= base_url('Simpanan/index') ?>"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Simpanan</a>
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

          <!-- <table class="table table-bordered"> -->
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>  
                    <th>Jenis Simpanan</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah</th>
                    <th>Status</th>                          
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
                                <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                                <td><?php echo $row['jenissimpanan']; ?></td>
                                <td><?php echo $row['tanggalbayar']; ?></td>
                                <td><?php echo "Rp ".number_format ($row['jumlah'], 2, ',', '.');?></td>
                                <td><?php echo $row['status']; ?></td>                          
                                <td>                               
                                 <!-- <a class="btn-sm btn-primary" href ="<?= base_url('Simpanan/ubahSimpanan') ?>/<?php echo $row['id']?>">
                                 Edit</a> -->
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('Simpanan/hapusSimpanan') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data simpanan ini?');">
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

</body>
</html>

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

    
            
        