<?php 
//print_r($anggota['data']);die();
?>
<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/jquery-ui.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery-ui.js') ?>" rel="stylesheet"></script>

<style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
    .ui-autocomplete {
  max-height: 100px;
  overflow-y: auto;
  z-index:2147483647;
  overflow-x: hidden;
  font-family: inherit;
}
  @media
  only screen and (max-width: 768px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelDaftarNasabah table, #tabelDaftarNasabah thead, #tabelDaftarNasabah tbody, #tabelDaftarNasabah th, #tabelDaftarNasabah td, #tabelDaftarNasabah tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelDaftarNasabah thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelDaftarNasabah tr { border: 3px solid #ccc; }

      #tabelDaftarNasabah td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
      }

      #tabelDaftarNasabah td:before {
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
      #tabelDaftarNasabah td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelDaftarNasabah td:nth-of-type(2):before { content: "Username"; text-align: left;}
      #tabelDaftarNasabah td:nth-of-type(3):before { content: "Nama"; text-align: left;}
      #tabelDaftarNasabah td:nth-of-type(4):before { content: "Email"; text-align: left;}
      #tabelDaftarNasabah td:nth-of-type(5):before { content: "Telepon"; text-align: left;}
      #tabelDaftarNasabah td:nth-of-type(6):before { content: "Akses Admin"; text-align: left;}
      #tabelDaftarNasabah td:nth-of-type(7):before { content: "Foto"; text-align: left;}
      #tabelDaftarNasabah td:nth-of-type(8):before { content: "Status"; text-align: left;}
      #tabelDaftarNasabah td:nth-child(1) { text-align: right;}
      #tabelDaftarNasabah td:nth-child(2) { text-align: right;}
      #tabelDaftarNasabah td:nth-child(3) { text-align: right;}
      #tabelDaftarNasabah td:nth-child(4) { text-align: right;}
      #tabelDaftarNasabah td:nth-child(5) { text-align: right;}
      #tabelDaftarNasabah td:nth-child(6) { text-align: right;}
      #tabelDaftarNasabah td:nth-child(7) { text-align: right;}
      #tabelDaftarNasabah td:nth-child(8) { text-align: right;}
    }  
  }


  </style>

<div class="modal fade" id="modalAnggotaKoperasi" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Data S.I. Debitur</h4>
      </div>

      <form name="formInsertAnggota" id="formInsertAnggota" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SistemInformasiDebitur/tambahDataSIDebitur">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Anggota Koperasi</label>
              <div class="col-md-5">
                  <input type="text" class="form-control" id="namatags" name="namatags" required>
                  <input type="hidden" id="namaid" name="namaid" value="">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Submit</button>
          </div> 
        </div>
      </form>
    </div>    
  </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
                <div class="panel-heading">Daftar Sistem Informasi Debitur&nbsp;&nbsp;
                    <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalAnggotaKoperasi" href ="#">Tambah S.I. Debitur</a>
                </div></br>
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
                    <th>Nama</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Hapus</th>
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
                                <td><?php echo $row['tempatlahir'].', '.$row['tanggallahir']; ?></td>
                                <td><?php echo $row['telepon']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['jeniskelamin']; ?></td>
                                <td><?php echo $row['pendidikan']; ?></td>
                                <td><?php echo $row['pekerjaan']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td>
                                  <?php if($row['foto']==''|$row['foto']=='no_image.png'){ ?>
                                  <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-circle" width="50" height="50">
                                  <?php } else { ?>
                                  <img src ="<?php echo URL_IMG ?>images/anggotakoperasi/thumb_<?php echo $row['foto']; ?>" rel="stylesheet" class="img-circle" width="50" height="50">
                                  <?php  } ?>
                                </td>
                                <td>
                                  <a class="btn-sm btn-danger" href ="<?= base_url('SistemInformasiDebitur/hapusDataSIDebitur') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">Hapus</a>
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
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $ta) { ?>
        {label: "<?=$ta['nama']?>", id:  "<?=$ta['id']?>"},
    <?php } ?>];
    console.log(availableTags);
    $( "#namatags" ).autocomplete({
      source: availableTags,
      select: function (event, ui) { 
        $("#namatags").val(ui.item.label); // display the selected text
        $("#namaid").val(ui.item.id); // save selected id to hidden input
      }
    });
  });
</script>
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

