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
  only screen and (max-width: 768px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelAdminKoperasi table, #tabelAdminKoperasi thead, #tabelAdminKoperasi tbody, #tabelAdminKoperasi th, #tabelAdminKoperasi td, #tabelAdminKoperasi tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelAdminKoperasi thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelAdminKoperasi tr { border: 3px solid #ccc; }

      #tabelAdminKoperasi td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
      }

      #tabelAdminKoperasi td:before {
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
      #tabelAdminKoperasi td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelAdminKoperasi td:nth-of-type(2):before { content: "Username"; text-align: left;}
      #tabelAdminKoperasi td:nth-of-type(3):before { content: "Nama"; text-align: left;}
      #tabelAdminKoperasi td:nth-of-type(4):before { content: "Email"; text-align: left;}
      #tabelAdminKoperasi td:nth-of-type(5):before { content: "Telepon"; text-align: left;}
      #tabelAdminKoperasi td:nth-of-type(6):before { content: "Akses Admin"; text-align: left;}
      #tabelAdminKoperasi td:nth-of-type(7):before { content: "Foto"; text-align: left;}
      #tabelAdminKoperasi td:nth-of-type(8):before { content: "Status"; text-align: left;}
      #tabelAdminKoperasi td:nth-child(1) { text-align: right;}
      #tabelAdminKoperasi td:nth-child(2) { text-align: right;}
      #tabelAdminKoperasi td:nth-child(3) { text-align: right;}
      #tabelAdminKoperasi td:nth-child(4) { text-align: right;}
      #tabelAdminKoperasi td:nth-child(5) { text-align: right;}
      #tabelAdminKoperasi td:nth-child(6) { text-align: right;}
      #tabelAdminKoperasi td:nth-child(7) { text-align: right;}
      #tabelAdminKoperasi td:nth-child(8) { text-align: right;}
    }  
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
          <div class="panel-heading">Daftar Admin Koperasi&nbsp;&nbsp;
              <a class="btn-sm btn-primary" href ="<?= base_url('Admin/index') ?>">Tambah Admin</a>
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
          <table id="tabelAdminKoperasi" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>  
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>                    
                    <th>Akses Admin</th>
                    <th>Foto</th>               
                    <th>Status</th>                  
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['telepon']; ?></td>
                                <td><?php echo $row['akseskoperasi']['akses']; ?></td>  
                                <td><b>
                                <?php if($row['foto']==''|$row['foto']=='no_image.png'){ ?>
                                <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-circle" width="50" height="50">

                                <?php } else { ?>

                                <div class="row">
                                <img src ="<?php echo URL_IMG ?>/images/adminkoperasi/thumb_<?php echo $row['foto']; ?>" rel="stylesheet" class="img-circle" width="50" height="50">

                                <?php  } ?>
                                </b></td>                                                              
                                <td>                               
                                 <a class="btn-sm btn-primary" href ="<?= base_url('Admin/ubahAdminKoperasi') ?>/<?php echo $row['id']?>">
                                 Edit</a>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('Admin/hapusAdmin') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Admin ini?');">
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
    var table = $('#tabelAdminKoperasi').DataTable();
 
    $('#tabelAdminKoperasi tbody').on( 'click', 'tr', function () {
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