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
  #tabelAnggotaKoperasi td:nth-child(11) {
    width: 15%;
  }
</style>
<!-- End modal Style custom -->
<style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
body {
    margin-top:27px;
    }
    .panel-heading{
      font-size: 15px;
      font-weight: bold;
    }
    /* Force table to not be like tables anymore */
    #tabelAnggotaKoperasi table, #tabelAnggotaKoperasi thead, #tabelAnggotaKoperasi tbody, #tabelAnggotaKoperasi th, #tabelAnggotaKoperasi td, #tabelAnggotaKoperasi tr{
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    #tabelAnggotaKoperasi thead tr{
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    #tabelAnggotaKoperasi tr{ border: 3px solid #ccc; }

    #tabelAnggotaKoperasi td{
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
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
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "No. Rekening"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Nama"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(5):before { content: "Jumlah Simpanan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(6):before { content: "Tenor"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(7):before { content: "Bunga"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(8):before { content: "Jumlah Bunga"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(9):before { content: "Total"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(10):before { content: "Tanggal Penyimpanan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(11):before { content: "Tanggal Pengambilan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(5) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(6) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(7) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(8) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(9) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(10) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(11) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(12) { width: 50%;text-align: right;}
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
          <div class="panel-heading">Daftar Simpanan Berjangka Koperasi</div>
          <div class="panel-body">

          <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                </div><?php } ?>

             <?php if($this->session->flashdata('warning')){?> 
                <div class="alert bg-warning" role="warning">
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
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">No. Rekening</th>
                <th class="text-center">Nama</th>
                <th class="text-center" style="display: none;">ID</th>
                <th class="text-center">Jumlah Simpanan</th>
                <th class="text-center">Tenor</th>                    
                <th class="text-center">Bunga</th>                    
                <th class="text-center">Jumlah Bunga</th>
                <th class="text-center">Total</th>               
                <th class="text-center">Tanggal Penyimpanan</th>                  
                <th class="text-center">Tanggal Pengambilan</th>                  
                <th class="text-center">Aksi</th>                  
              </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            if ($result['status'] != 0) {
              
              foreach ($result['data'] as $row) {
                $total = $row['simpanan'] + $row['besarbunga'];
                $tglAmb  = $row['tgl']['tanggalpengambilan'];
                $tglSkrg = date('Y-m-d');
            ?>
                <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td class="text-center"><?php echo $row['norekening']; ?></td>
                  <td class="text-center"><?php echo $row['nama']; ?></td>
                  <td class="text-center" style="display: none;"><?php echo $row['idunik']; ?></td>   
                  <td class="text-right"><?php echo "Rp ".format_rupiah($row['simpanan']); ?></td>
                  <td class="text-center"><?php echo $row['tenor']; ?> Bulan</td>
                  <td class="text-center"><?php echo number_format($row['persenbunga'], 2); ?> %</td>
                  <td class="text-right"><?php echo "Rp ".format_rupiah($row['besarbunga']); ?></td>
                  <td class="text-center"><?php echo "Rp ".format_rupiah($total); ?></td>
                  <td class="text-center"><?php echo $row['created_at']; ?></td>
                  <td class="text-center"><?php echo $row['tgl']['tanggalpengambilan']; ?></td>
                  <td class="text-center" >
                    <a href="javascript:;" class="ambil" data-id_ambil="<?php echo $row['id']; ?>" data-metode_id="<?php echo $row['metode_id']; ?>"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ambilModal"<?php echo jangkaWaktu($tglSkrg, $tglAmb); ?>>Ambil</button></a>
                    <a href="javascript:;" class="perpanjang" data-id_perpajangan="<?php echo $row['id']; ?>" data-koperasi_id="<?php echo $row['koperasi_id']; ?>" data-anggotakoperasi_id="<?php echo $row['anggotakoperasi_id']; ?>" data-tenor="<?php echo $row['tenor']; ?>" data-bunga="<?php echo $row['persenbunga']; ?>"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#persenbungaModal" <?php echo jangkaWaktu($tglSkrg, $tglAmb); ?> >Perpanjang</button></a>
                  </td>
                </tr> 
            <?php 
              } 
            }
            ?>
            </tbody>              
          </table>      

          </div>
        </div>
      </div>
    </div><!--/.row--> 

    <!-- ambil Modal -->
    <div class="modal fade" id="ambilModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Pengambilan Simpanan</h4>
          </div>
          <form method="POST" action="<?php echo base_url();?>SimpananBerjangka/ambilSimpananBerjangka" name="form" id="form">
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Penerima</label>
                <input name="id" type="hidden" class="form-control" id="id">
                <input name="penerima" type="text" class="form-control" id="penerima" placeholder="Nama penerima">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Token</label>
                <input name="token" type="text" class="form-control" id="token" placeholder="Masukkan token">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Metode Pengambilan</label>
                <select class="form-control" name="metode_id">
                <?php foreach ($metode['data'] as $row) { ?>
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?></option>
                <?php } ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Proses</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Perpanjang Modal -->
    <div class="modal fade" id="persenbungaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Perpanjang Simpanan</h4>
          </div>
          <form method="POST" action="<?php echo base_url();?>SimpananBerjangka/perpanjangSimpananBerjangka" name="form" id="form">
            <div class="modal-body">
              
              <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Token</label>
                <input name="id" type="hidden" class="form-control" id="id">
                <input name="koperasi_id" type="hidden" class="form-control" id="koperasi_id">
                <input name="anggotakoperasi_id" type="hidden" class="form-control" id="anggotakoperasi_id">
                <input name="token" type="text" class="form-control" id="token" placeholder="Masukkan token">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tenor</label>
                <select class="form-control" name="tenor" id="myselect" onclick="test();">
                <?php foreach ($jangkaWaktu['data'] as $row) { ?>
                  <option name="<?php echo $row['bunga'] ?>" value="<?php echo $row['tenor'] ?>"><?php echo $row['tenor'] ?> Bulan</option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Bunga</label>
               <input name="bunga" type="text" id="bunga" class="form-control" placeholder="Bunga Dalam persen" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Proses</button>
            </div>
          </form>
        </div>
      </div>
    </div>

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

$(document).ready(function(){
  $('.perpanjang').click(function(){

    var id_perpajangan     = $(this).data('id_perpajangan');
    var koperasi_id        = $(this).data('koperasi_id');
    var anggotakoperasi_id = $(this).data('anggotakoperasi_id');
    var tenor              = $(this).data('tenor');
    var bunga              = $(this).data('bunga');

    if (id_perpajangan) {
      $('[name="id"]').val(id_perpajangan);
      $('[name="koperasi_id"]').val(koperasi_id);
      $('[name="anggotakoperasi_id"]').val(anggotakoperasi_id);
      $('[name="tenor"]').val(tenor);
      $('[name="bunga"]').val(bunga);
    }
    else{
      alert('Data tidak ditemukan !!!');
    }
  });
});

$(document).ready(function(){
  $('.ambil').click(function(){

    var id_ambil  = $(this).data('id_ambil');
    var metode_id = $(this).data('metode_id');

    if (id_ambil) {
      $('[name="id"]').val(id_ambil);
      $('[name="metode_id"]').val(metode_id);
    }
    else{
      alert('Data tidak ditemukan !!!');
    }
  });
});

function test() {
      $(document).ready(function(){
        var a = $( "#myselect option:selected" ).attr('name');
        $("#myselect" ).click(function(){
          $('#bunga').val(a);
          return false;
        });
      });
    }
</script>