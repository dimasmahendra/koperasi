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
  only screen and (max-width: 1440px)  {
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
      #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "No KTP"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(3):before { content: "Nama"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Tempat/Tanggal Lahir"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(5):before { content: "Telepon"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(6):before { content: "Email"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(7):before { content: "Jenis Kelamin"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(8):before { content: "Pendidikan"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(9):before { content: "Pekerjaan"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(10):before { content: "Sektor Usaha"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(11):before { content: "Alamat"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(12):before { content: "Kelurahan"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(13):before { content: "Username"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(14):before { content: "Foto"; text-align: left;}
      #tabelAnggotaKoperasi td:nth-of-type(15):before { content: "Edit"; text-align: left;}

      #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(3) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(5) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(6) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(7) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(8) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(9) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(10) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(11) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(12) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(13) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(14) { text-align: right;}
      #tabelAnggotaKoperasi td:nth-child(15) { text-align: right;}
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
          <div class="panel-heading">Daftar Anggota Koperasi&nbsp;&nbsp;
              <a class="btn-sm btn-primary" href ="<?= base_url('Anggota/index') ?>">Tambah Anggota</a>
          </div>
          <div class="panel-body">

          <!-- <table class="table table-bordered"> -->
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No KTP</th>
                    <th>Nama</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Sektor Usaha</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Username</th>
                    <th>Foto</th>
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
                                <td><?php echo $row['noktp']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['tempatlahir'].', '.$row['tanggallahir']; ?></td>
                                <td><?php echo $row['telepon']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['jeniskelamin']; ?></td>
                                <td><?php echo $row['pendidikan']; ?></td>
                                <td><?php echo $row['pekerjaan']; ?></td>
                                <td><?php echo $row['sektorusaha']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td><?php echo $row['kelurahan']['nama']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td>
                                  <?php if($row['foto']==''|$row['foto']=='no_image.png'){ ?>
                                  <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-circle" width="50" height="50">
                                  <?php } else { ?>
                                  <img src ="<?php echo URL_IMG ?>images/anggotakoperasi/thumb_<?php echo $row['foto']; ?>" rel="stylesheet" class="img-circle" width="50" height="50">
                                  <?php  } ?>
                                </td>
                                <td>                               
                                 <a class="btn-sm btn-primary" href ="<?= base_url('Anggota/getAnggota') ?>/<?php echo $row['id']?>">
                                 Edit</a>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('Anggota/hapusAnggota') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">
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