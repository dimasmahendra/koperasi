<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>

<script src="<?= base_url('asset_admin/js/autoNumeric-1.9.41.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/autoNumeric-1.8.0-sample.js') ?>" rel="stylesheet"></script>

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
  <div class="modal fade" id="ambilSimpanan" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pengambilan Simpanan Syariah</h4>
      </div>

      <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SimpananNasabah/ambilSimpananSyariah">
        <div class="modal-body edit-content">
          <input type="hidden" id="id" name="id" value="">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >Penerima</label>
              <div class="col-md-7">
                <input type="text" id="penerima" name="penerima" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >No. Bukti</label>
              <div class="col-md-7">
                <input type="text" id="nobukti" name="nobukti" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >Token</label>
              <div class="col-md-7">
                <input type="text" id="token" name="token" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >Reference Number SSP</label>
              <div class="col-md-7">
                <input type="text" id="refNumberSSP" name="refNumberSSP" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >Jumlah</label>
              <div class="col-md-7">
                <input type="text" id="jumlah" name="jumlah" class="form-control formatRupiah" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >Metode</label>
              <div class="col-md-7">
                  <select name="metode" class="form-control" id="metode" required>
                    <option value="">- Pilih Metode -</option>
                    <option value="Cash">Cash</option>
                    <option value="SSP">SSP</option>
                  </select>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button href="#" id="etombolSimpan" type="submit" class="btn btn-primary">Submit</button>
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
          <div class="panel-heading">Daftar Nasabah Simpanan BMT&nbsp;&nbsp;
              <a class="btn-sm btn-primary" href ="<?= base_url('SimpananNasabah/index') ?>">Tambah Simpanan</a>
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
          <table id="tabelDaftarNasabah" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Anggota</th>
                <th>Produk Simpanan</th>
                <th>No. Rekening</th>
                <th>Saldo</th>
                <th>Tanggal Ambil</th>
                <th style="width: 14%">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  $no = 1;
                  foreach ($result['data'] as $row)
                  { ?>
                  <tr>
                      <td><?php echo $no;$no++; ?></td>
                      <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                      <td><?php echo $row['tabunganproduk']['namaprogram']; ?></td>
                      <td><?php echo $row['rekening']; ?></td>
                      <td><?php echo "Rp ".number_format ($row['saldo'], 2, ',', '.');?></td>
                      <td><?php echo $row['diambilpada']; ?></td>
                      <td>
                      <a class="btn-sm btn-primary" href ="<?= base_url('SimpananNasabah/daftarLihatMutasiSimpanan')?>/<?php echo $row['id']?>">
                       Lihat Mutasi</a>
                       <!-- <a href ="#" class="edit" data-toggle="modal" data-target="#ambilSimpanan" data-indikator="<?php echo $row['id']; ?>"><button class="btn btn-success btn-xs">Ambil</button></a>
                       &nbsp;
                       <a class="btn-sm btn-danger" href ="<?= base_url('SimpananNasabah/hapusNasabah') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus nasabah ini?');">
                       Hapus</a> -->
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
    var table = $('#tabelDaftarNasabah').DataTable();
 
    $('#tabelDaftarNasabah tbody').on( 'click', 'tr', function () {
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

  var id          = $(this).data('indikator');

  if (id) {
    $('#id').val(id);
  }
  else{
    alert('Data tidak ditemukan !!!');
  }
});

</script>