<?php
//print_r($hasil['data']);die();
?>
<link href="<?= base_url('asset_admin/css/font-awesome.min.css') ?>" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/lokasiKoperasi.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/susunanKepengurusan.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/jquery-ui.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/susunankepengurusan.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery-ui.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>
<style>
.ui-autocomplete {
  max-height: 100px;
  overflow-y: auto;
  z-index:2147483647;
  overflow-x: hidden;
  font-family: inherit;
}
</style>

 
<div class="modal fade" id="modalKoperasi" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Tambah Anggota Koperasi</h4>
      </div>

      <form name="formInsertKoperasi" id="formInsertKoperasi" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>AnggotaSekunder/insertKoperasiSekunder">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Pilih Koperasi</label>
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

<div class="col-md-12">
  <div class="panel panel-default">
  <div class="panel-body tabs">
   

            <div class="col-lg-12">
              <div class="panel-body">
                <div class="panel-heading">Daftar Koperasi Sekunder&nbsp;&nbsp;
                    <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalKoperasi" href ="#">Tambah Koperasi</a>
                </div></br>
                <!-- <table class="table table-bordered"> -->
                 <table id="tabelKoperasi" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Koperasi</th>  
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    if($koperasisekunder['status'] == 0) {
                      echo "";
                    }
                    else
                    {
                      $no = 1;            
                      foreach ($koperasisekunder['data'] as $row)
                      {

                          ?>
                        <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['koperasi']['nama']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('AnggotaSekunder/keluarKoperasiSekunder') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin keluar?');">
                                 Keluar</a>
                                </td>
                        </tr>
                      <?php
                      }
                    }
                  ?>
                  </tbody>
                </table>
              </div> <!-- End Panel Body -->
              </div>

      </div><!--/.panel body-->
  </div><!--/.panel-->
</div><!-- /.col-->
</div>


<!-- JS autocomplete Koperasi -->
<script type="text/javascript">
    $(document).ready(function(){
    var availableTags = [<?php foreach ($hasil['data'] as $ta) { ?>
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
<!-- End JS autocomplete Koperasi -->

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#tabelKoperasi').DataTable();
 
    $('#tabelKoperasi tbody').on( 'click', 'tr', function () {
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