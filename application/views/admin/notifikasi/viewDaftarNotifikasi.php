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
@media (max-width: 978px) {
    body {
    margin-top:27px;
    }
}
</style>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Notifikasi</div>
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
                        <th>Judul Pesan</th>                       
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
                              <td><?php echo $row['judul']; ?></td>                              
                              <td><?php if ($row['status'] == 'Belum Dibaca')
                                                {
                                                  echo "<font color='red'>".$row['status']."</font>";
                                                }
                                                else if ($row['status'] == 'Sudah Dibaca')
                                                {
                                                  echo "<font color='green'>".$row['status']."</font>";
                                                }
                                              ?>                                    
                              </td>                                                                            
                              <td>                               
                                <a class="btn btn-primary btn-xs" href ="<?= base_url('Notifikasi/statusPesan') ?>/<?php echo $row['id']?>">
                                Lihat</a>
                                &nbsp;
                                <a class="btn btn-danger btn-xs" href ="<?= base_url('Notifikasi/hapusPesan') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Notifikasi Koperasi ini?');">
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