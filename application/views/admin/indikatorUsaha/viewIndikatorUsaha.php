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
      #tabelIndikatorUsaha table, #tabelIndikatorUsaha thead, #tabelIndikatorUsaha tbody, #tabelIndikatorUsaha th, #tabelIndikatorUsaha td, #tabelIndikatorUsaha tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelIndikatorUsaha thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelIndikatorUsaha tr { border: 3px solid #ccc; }

      #tabelIndikatorUsaha td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
      }

      #tabelIndikatorUsaha td:before {
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
      #tabelIndikatorUsaha td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelIndikatorUsaha td:nth-of-type(2):before { content: "Username"; text-align: left;}
      #tabelIndikatorUsaha td:nth-of-type(3):before { content: "Nama"; text-align: left;}
      #tabelIndikatorUsaha td:nth-of-type(4):before { content: "Email"; text-align: left;}
      #tabelIndikatorUsaha td:nth-of-type(5):before { content: "Telepon"; text-align: left;}
      #tabelIndikatorUsaha td:nth-of-type(6):before { content: "Akses Admin"; text-align: left;}
      #tabelIndikatorUsaha td:nth-of-type(7):before { content: "Foto"; text-align: left;}
      #tabelIndikatorUsaha td:nth-of-type(8):before { content: "Status"; text-align: left;}
      #tabelIndikatorUsaha td:nth-child(1) { text-align: right;}
      #tabelIndikatorUsaha td:nth-child(2) { text-align: right;}
      #tabelIndikatorUsaha td:nth-child(3) { text-align: right;}
      #tabelIndikatorUsaha td:nth-child(4) { text-align: right;}
      #tabelIndikatorUsaha td:nth-child(5) { text-align: right;}
      #tabelIndikatorUsaha td:nth-child(6) { text-align: right;}
      #tabelIndikatorUsaha td:nth-child(7) { text-align: right;}
      #tabelIndikatorUsaha td:nth-child(8) { text-align: right;}
    }  
  }
</style>
 <div class="modal fade" id="modalIU" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Indikator Usaha</h4>
      </div>
      <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>IndikatorUsaha/tambahIndikatorUsaha">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Tahun</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tahun" name="tahun">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Modal Sendiri</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="modalSendiri" name="modalSendiri">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Modal Luar</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="modalLuar" name="modalLuar">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Asset</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="assetKop" name="assetKop">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Volume Usaha</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="volUsaha" name="volUsaha">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Selisih Hasil Usaha</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="selishSU" name="selishSU">
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

<div class="modal fade" id="modalIndikatorUsaha" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Edit Indikator Usaha</h4>
      </div>

      <form name="formIndikatorUsaha" id="formIndikatorUsaha" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>IndikatorUsaha/updateIndikatorUsaha">
        <div class="modal-body edit-content">
          <input type="hidden" class="form-control" id="id" name="id">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Tahun</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tahun" name="tahun">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Modal Sendiri</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="modalSendiri" name="modalSendiri">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Modal Luar</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="modalLuar" name="modalLuar">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Asset</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="assetKop" name="assetKop">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Volume Usaha</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="volUsaha" name="volUsaha">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Selisih Hasil Usaha</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="selishSU" name="selishSU">
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
          <div class="panel-heading">Daftar Indikator Usaha Koperasi&nbsp;&nbsp;
            <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalIU" href ="#">Tambah Indikator Usaha</a>
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
          <table id="tabelIndikatorUsaha" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Tahun</th>
              <th>Modal Sendiri</th>
              <th>Modal Luar</th>
              <th>Asset</th>
              <th>Volume Usaha</th>
              <th>Selisih Hasil Usaha</th>
              <th>Aksi</th>
            </tr>
          </thead>
            <tbody>
              <?php
              if($result['status'] == 0) {
                echo "";
              }
              else
              {
                $no = 1;            
                foreach ($result['data'] as $row)
                { ?>
                  <tr>
                      <td><?php echo $row['tahun']; ?></td>
                      <td><?php echo "Rp ".number_format ($row['modalsendiri'], 2, ',', '.');?></td>
                      <td><?php echo "Rp ".number_format ($row['modalluar'], 2, ',', '.');?></td>
                      <td><?php echo "Rp ".number_format ($row['asset'], 2, ',', '.');?></td>
                      <td><?php echo "Rp ".number_format ($row['volumeusaha'], 2, ',', '.');?></td>
                      <td><?php echo "Rp ".number_format ($row['selisihhasilusaha'], 2, ',', '.');?></td>
                      <td>
                        <a href ="#" class="edit" data-toggle="modal" data-target="#modalIndikatorUsaha" data-indikator="<?php echo $row['id']; ?>" data-tahun="<?php echo $row['tahun']; ?>" data-modalsendiri="<?php echo $row['modalsendiri']; ?>" data-modalluar="<?php echo $row['modalluar']; ?>" data-asset="<?php echo $row['asset']; ?>" data-volumeusaha="<?php echo $row['volumeusaha']; ?>" data-selisihhasilusaha="<?php echo $row['selisihhasilusaha']; ?>"><button class="btn-xs btn-success">Edit</button></a>
                       &nbsp;
                       <a href ="<?= base_url('IndikatorUsaha/hapusIndikatorUsaha') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus histori ini?');"><button class="btn-xs btn-danger">Hapus</button></a> 
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
    var table = $('#tabelIndikatorUsaha').DataTable();
 
    $('#tabelIndikatorUsaha tbody').on( 'click', 'tr', function () {
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

<script>
$('.edit').click(function(){

  var id                 = $(this).data('indikator');
  var tahun              = $(this).data('tahun');
  var modalsendiri       = $(this).data('modalsendiri');
  var modalluar          = $(this).data('modalluar');
  var asset              = $(this).data('asset');
  var volumeusaha        = $(this).data('volumeusaha');
  var selisihhasilusaha  = $(this).data('selisihhasilusaha');

  if (id) {
    $('[name="id"]').val(id);
    $('[name="tahun"]').val(tahun);
    $('[name="modalSendiri"]').val(modalsendiri);
    $('[name="modalLuar"]').val(modalluar);
    $('[name="assetKop"]').val(asset);
    $('[name="volUsaha"]').val(volumeusaha);
    $('[name="selishSU"]').val(selisihhasilusaha);
  }
  else{
    alert('Data tidak ditemukan !!!');
  }
});

</script>