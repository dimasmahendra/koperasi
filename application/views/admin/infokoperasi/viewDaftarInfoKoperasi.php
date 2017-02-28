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
<style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 424px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelInfoKoperasi table, #tabelInfoKoperasi thead, #tabelInfoKoperasi tbody, #tabelInfoKoperasi th, #tabelInfoKoperasi td, #tabelInfoKoperasi tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelInfoKoperasi thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelInfoKoperasi tr { border: 3px solid #ccc; }

      #tabelInfoKoperasi td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;        
      }

      #tabelInfoKoperasi td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 50%;
        padding-right: 10px;
        white-space: nowrap;
      }
      /*
      Label the data
      */
      #tabelInfoKoperasi td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelInfoKoperasi td:nth-of-type(2):before { content: "Judul"; text-align: left;}
      #tabelInfoKoperasi td:nth-of-type(3):before { content: "Isi"; text-align: left;}
      #tabelInfoKoperasi td:nth-of-type(4):before { content: "Foto"; text-align: left;}
      #tabelInfoKoperasi td:nth-of-type(5):before { content: "Aksi"; text-align: left;}
      #tabelInfoKoperasi td:nth-child(1) { text-align: right;}
      #tabelInfoKoperasi td:nth-child(2) { text-align: right;}
      #tabelInfoKoperasi td:nth-child(3) { text-align: right;}
      #tabelInfoKoperasi td:nth-child(4) { text-align: right;}
      #tabelInfoKoperasi td:nth-child(5) { text-align: right;}
    }  
  }
</style>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">   
  </br> 
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
            <div class="panel-heading">Daftar Info Koperasi&nbsp;&nbsp;
                <a class="btn-sm btn-primary" href ="<?= base_url('infoKoperasi/index') ?>">Tambah Info
                </a>
            </div>
            <div class="panel-body">
            <!-- <table class="table table-bordered"> -->
            <table id="tabelInfoKoperasi" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>  
                  <th>Judul</th>
                  <th width="40%">Isi</th> 
                  <th>Foto</th>               
                  <th width="17%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                    $no = 1;           
                    foreach ($result['data'] as $row)
                    { ?> 
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['judul']; ?></td>
                      <td><?php echo substr($row['isi'], 0, 300); ?> ...</td>
                      <td><b>
                        <?php if($row['foto']==''|$row['foto']=='no_image.png'){ ?>
                        <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" style="width: 50px; height: 50px;" class="img-circle">

                        <?php } else { ?>

                        <div class="row">
                        <img src ="<?php echo URL_IMG ?>/images/infokoperasi/thumb_<?php echo $row['foto']; ?>" rel="stylesheet" class="img-circle" style="margin-left: 10px;">

                        <?php  } ?>
                        </b></td>
                      <td>                               
                        <a class="btn-sm btn-primary" href ="<?= base_url('infoKoperasi/ubahInfoKoperasi') ?>/<?php echo $row['id']?>">Ubah</a>
                           &nbsp;
                        <a class="btn-sm btn-primary" href ="<?= base_url('infoKoperasi/detailInfoKoperasi') ?>/<?php echo $row['id']?>">Lihat</a>
                           &nbsp;
                        <a class="btn-sm btn-danger" href ="<?= base_url('infoKoperasi/hapusInfoKoperasi') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Informasi Koperasi ini?');">Hapus</a> 
                      </td>
                    </tr>                                      
                <?php $no++; } ?>        
              </tbody>              
            </table>
            </div>
          </div>
        </div>
      </div><!--/.row-->  
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#tabelInfoKoperasi').DataTable();
 
    $('#tabelInfoKoperasi tbody').on( 'click', 'tr', function () {
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