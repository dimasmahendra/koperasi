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

<!-- modal Style custom -->
<style>
  .modal-header {
    background: #203864;
  }
  .modal-title {
    color: #fff;
  }
  .alert .close, .modal-header .close {
    color: #fff; 
    opacity: 1;
  }
  .modal-body .form-group .input-group-addon {
    background-color: #eee;
  }
</style>
<!-- End modal Style custom -->

<style type="text/css">
@media (max-width: 978px) {
    body {
    margin-top:40px;
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
          <div class="panel-heading">
          <div class="hidden-xs">Pengaturan Simpanan Berjangka <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tenorBaru">Tambah Tenor Baru</button></div>
          <div class="visible-xs-block" style="font-size: 13px; font-weight: bold">Pengaturan Simpanan Berjangka <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tenorBaru" style="font-size: 10px">Tambah Tenor Baru</button></div>

          </div>
          <div class="panel-body">

          <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                </div><?php } ?>
          <?php if($this->session->flashdata('warning')){?> 
                <div class="alert bg-warning" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('warning')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                </div><?php } ?>

            <?php if($this->session->flashdata('error')){?> 
                  <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                    <?php echo $this->session->flashdata('error')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                  </div><?php } ?>

          <!-- <table class="table table-bordered"> -->
          <table id="tabelPengaturanSimpananBerjangka" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">No</th> 
                <th class="text-center">Tenor</th>                    
                <th class="text-center">Bunga Per Tahun</th>                                                                     
                <th>Aksi</th>                  
              </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            if ($result['status'] == '1') {
              
            foreach ($result['data'] as $row) { 
              $tenor = $row['tenor'];
              ?>
              <tr>
                <td class="text-center" style="width: 5%;"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $tenor; ?> Bulan</td>
                <td class="text-center"><?php echo number_format($row['bunga'], 2); ?> %</td>
                <td class="text-center" style="width: 15%;">
                  
                  <a href="javascript:;" class="edit_tenor" data-id_tenor="<?php echo $row['id']; ?>" data-tenor="<?php echo $row['tenor']; ?>" data-bunga="<?php echo number_format($row['bunga'], 2); ?>">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ubahTenor">Ubah</button>
                  </a>
                  <a href="<?php echo base_url()?>SimpananBerjangka/hapusPengaturanSimpananBerjangka/<?php echo $row['id']; ?>" type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin akan menghapus jangka waktu(Tenor) ini ?');">Hapus</a>
                </td>
              </tr>              
            <?php } }?>
            </tbody>              
          </table>      
          </div>
        </div>
      </div>
    </div><!--/.row--> 

    <div class="panel panel-default">
      <div class="panel-body">
      <div class="row">
            <div class="col-md-2">
              <p><strong> Minimal Simpanan</strong></p>
            </div>  
            <div class="col-md-9">
              <p>: Rp <?php foreach($minimalSimpan['data'] as $row) { echo format_rupiah($row['jumlah']); ?></p>
            </div>  
            <div class="col-md-1">
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahMinimalSimpanan" id="edit_min" data-id_min="<?php echo $row['id']; ?>" data-min="<?php echo $row['jumlah']; ?>"><span class="glyphicon glyphicon-pencil"></span> Ubah</button>
            </div> 
            <?php } ?> 
          </div>
          <div class="row" style="margin-top: 10px;">
            <div class="col-md-2">
              <p><strong>Biaya Administrasi</strong></p>
            </div>  
            <div class="col-md-9">
              <p>: Rp <?php foreach($minimalSimpan['data'] as $row) { echo format_rupiah($row['administrasi']); ?></p>
            </div>  
            <div class="col-md-1">
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahBiayaAdministrasi" id="edit_adm" data-id_adm="<?php echo $row['id']; ?>" data-adm="<?php echo $row['administrasi']; ?>"><span class="glyphicon glyphicon-pencil"></span> Ubah</button>
            </div>
            <?php } ?>  
          </div>
      </div>
    </div>

    <!-- tenorBaru Modal -->
    <div class="modal fade" id="tenorBaru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambah Tenor</h4>
          </div>
          <form method="POST" action="<?php echo base_url();?>SimpananBerjangka/tambahPengaturanSimpananBerjangka" name="form" id="form1">
            <div class="modal-body">
              <div class="panel-body">          

                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label>Masukkan Tenor</label>
                      <div class="input-group">
                        <input name="tenor" type="text" id="tenor" class="form-control" required>
                        <div class="input-group-addon">Bulan</div>
                      </div>  
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label>Bunga</label>
                      <div class="input-group">
                        <input name="bunga" type="text" id="bunga" class="form-control" placeholder="Bunga dalam angka" required>
                        <div class="input-group-addon">(%) per Tahun</div>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End tenorBaru Modal -->
    <!-- ubahTenor Modal -->
    <div class="modal fade" id="ubahTenor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ubah Tenor</h4>
          </div>
          <form method="POST" action="<?php echo base_url();?>SimpananBerjangka/updatePengaturanSimpananBerjangka" name="form" id="form2">
          <!-- <form action="#" id="formUbah"> -->
          <div class="modal-body">

            <div class="row">
              <div class="col-md-12 form-group">
                <input name="id" type="hidden" id="editId" class="form-control" required>
              </div>
            </div>  
            <div class="row">
              <div class="col-md-12 form-group">
                <label>Masukkan Tenor</label>
                <div class="input-group">
                  <input name="tenor" type="text" id="editTenor" class="form-control" placeholder="Tenor dalam angka" required>
                  <div class="input-group-addon">Bulan</div>
                </div> 
              </div>
            </div>
                  
            <div class="row">
              <div class="col-md-12 form-group">
                <label>Bunga</label>
                <div class="input-group">
                  <input name="bunga" type="text" id="editBunga" class="form-control" placeholder="Bunga dalam angka" required>
                  <div class="input-group-addon">(%) per Tahun</div>
                </div>
              </div>
            </div>         
          </div>
          <div class="modal-footer">
            <button type="submit" id="btnUbah" class="btn btn-primary">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End ubahTenor Modal -->
    <!-- ubahMinimalSimpanan Modal -->
    <div class="modal fade" id="ubahMinimalSimpanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ubah Minimal Simpanan</h4>
          </div>
          <form method="POST" action="<?php echo base_url();?>SimpananBerjangka/updateMinimalSimpananBerjangka" name="form" id="form">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-10 form-group">
                
                <input name="id" type="hidden" id="editIdMinimal" class="form-control"  required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 form-group">
                <label>Minimal Simpanan</label>
                <input name="jumlah" type="text" id="editJumlah" class="form-control" placeholder="Minimal Simpanan" required>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End ubahMinimalSimpanan Modal -->
    <!-- Administrasi Modal -->
    <div class="modal fade" id="ubahBiayaAdministrasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ubah Biaya Administrasi</h4>
          </div>
          <form method="POST" action="<?php echo base_url();?>SimpananBerjangka/updateBiayaAdminstrasi" name="form" id="form">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-10 form-group">                
                <input name="id" type="hidden" id="editIdAdministrasi" class="form-control"  required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 form-group">
                <label>Biaya Administrasi</label>
                <input name="administrasi" type="text" id="editAdministrasi" class="form-control" placeholder="Minimal Simpanan" required>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>

</div>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm2.js') ?>" rel="stylesheet"></script>
<script type="text/javascript">
var table;
  $(document).ready(function() {
    table = $('#tabelPengaturanSimpananBerjangka').DataTable();
 
    $('#tabelPengaturanSimpananBerjangka tbody').on( 'click', 'tr', function () {
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


$(document).ready(function(){
  $('.edit_tenor').click(function(){

    var id_tenor = $(this).data('id_tenor');
    var tenor    = $(this).data('tenor');
    var bunga    = $(this).data('bunga');

    if (id_tenor) {
      $('[name="id"]').val(id_tenor);
      $('[name="tenor"]').val(tenor);
      $('[name="bunga"]').val(bunga);
    }
    else{
      alert('Data tidak ditemukan !!!');
    }
  });
});

$(document).ready(function(){
  $('#edit_min').click(function(){

    var id_min = $(this).data('id_min');
    var min    = $(this).data('min');

    if (id_min) {
      $('[name="id"]').val(id_min);
      $('[name="jumlah"]').val(min);
    }
    else{
      alert('Data tidak ditemukan !!!');
    }
  });
});

$(document).ready(function(){
  $('#edit_adm').click(function(){

    var id_adm = $(this).data('id_adm');
    var adm    = $(this).data('adm');

    if (id_adm) {
      $('[name="id"]').val(id_adm);
      $('[name="administrasi"]').val(adm);
    }
    else{
      alert('Data tidak ditemukan !!!');
    }
  });
});

/*======================================*/
  
</script>