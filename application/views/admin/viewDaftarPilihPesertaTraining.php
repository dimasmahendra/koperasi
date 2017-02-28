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
        <h1 class="page-header" style="font-weight: 500;">Daftar Training</h1>
      </div>
    </div><!--/.row-->

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
            <div class="panel-heading">Training Smart Cooperative&nbsp;&nbsp;
                <a class="btn-sm btn-primary" href ="<?= base_url('infoKoperasi/index') ?>"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"></use></svg>Add New
                </a>
            </div>

            <div class="panel-body">                         

            <!-- <table class="table table-bordered"> -->
            <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>  
                      <th>Judul</th>
                      <th>Isi</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;           
                        foreach ($result['data'] as $row)
                        { ?>                 
                              <tr>
                                  <td><b><?php echo $no;$no++; ?></b></td>
                                  <td><b><?php echo $row['judul']; ?></b></td>
                                  <td><b max(100)><?php echo substr($row['isi'], 0, 300); ?></b></td>
                                  <td><b><?php echo $row['tanggalmulai']; ?></b></td>
                                  <td><b><?php echo $row['tanggalselesai']; ?></b></td>                                  
                                  <td>                               
                                   <a class="button" href ="<?= base_url('infoKoperasi/ubahInfoKoperasi') ?>/<?php echo $row['id']?>">
                                   Edit</a>
                                   &nbsp;
                                   <a class="button" href ="<?= base_url('infoKoperasi/hapusInfoKoperasi') ?>/<?php echo $row['id']?>">
                                   Delete</a> 
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

    
            
        