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
    </br>
    <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Anggota Koperasi&nbsp;&nbsp;
              <a class="btn-sm btn-primary" href ="<?= base_url('Anggota/index') ?>">Tambah Anggota</a>
          </div>
          <div class="panel-body">

           <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Anggota/tambahAnggota">    
          <!-- <table class="table table-bordered"> -->
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>  
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>              
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
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['telepon']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['jeniskelamin']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td><?php echo $row['kelurahan']['nama']; ?></td>
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
          </form>     

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