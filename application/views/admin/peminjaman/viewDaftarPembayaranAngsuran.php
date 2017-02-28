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
  button, .total {
    margin: 5px 0px 0px 0px;
  }
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
</style>
</head>
<body>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Pembayaran Angsuran</div>
          <div class="panel-body">

          <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button> 

                </div><?php } ?>

            <?php if($this->session->flashdata('error')){?> 
                  <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                    <?php echo $this->session->flashdata('error')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                  </div><?php } ?>

          <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-2">
              <p><strong>ID Peminjam</strong></p>
              <p><strong>ID Anggota</strong></p>
              <p><strong>Nama</strong></p>
              <p><strong>Tagihan</strong></p>
            </div>
            <div class="col-sm-5">
              <p>: <?php echo $result['data'][0]['idunik']?></p>
              <p>: <?php echo $result['data'][0]['anggotakoperasi']['idunik']?></p>
              <p>: <?php echo $result['data'][0]['anggotakoperasi']['nama']?></p>
              <p>: </p>
            </div>
            <div class="col-sm-2">
              <p><strong>Koperasi</strong></p>
              <p><strong>Tgl. Peminjaman</strong></p>
              <p><strong>Pokok Peminjaman</strong></p>
            </div>
            <div class="col-sm-3">
              <p>: <?php echo $result['data'][0]['koperasi']['nama']?>  </p>
              <p>: <?php echo $result['data'][0]['tanggal']?></p>
              <p>: <?php echo $result['data'][0]['jumlah']?></p>
            </div>
          </div>
          <form method="POST" action="<?php echo base_url();?>Peminjaman/lakukanPembayaran/">
          <input type="hidden" name="peminjaman_id" value="<?php echo $result['data'][0]['id']?>">
          <!-- <table class="table table-bordered"> -->
          <table id="tabelMutasi" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="width: 11%;">Tagihan ke-</th>                                                  
                <th class="text-center">Pilih</th>
                <th class="text-center">Jatuh Tempo</th>
                <th class="text-center">Angsuran Pokok</th>
                <th class="text-center">Bunga</th>
                <th class="text-center">Denda</th>
                <th class="text-center">Total</th>
                <th class="text-center">Status</th>
                <th class="text-center">Metode</th>
              </tr>
            </thead>
            <tbody>
              <?php 
            $no = 1;
            $i = 0;
            if ($result['status'] == '1') {
              
            foreach ($result['data'][$i++]  ['peminjamandetail'] as $row) { 
              $total = $row['angsuranpokok'] + $row['besarbunga'] + $row['denda'];
            ?>
              <tr>
                <td class="text-center"><?php echo $no;?></td>
                <td class="text-center">
                  <input type="checkbox" name="data[<?php echo $no ?>][detail_id]"     value="<?php echo $row['id'] ?>"               class="checkall"               id="check<?php echo $no ?>" data-cash="<?php echo $total?>" onclick="total();" <?php echo check_disable($row['status'])?>>
                  <input type="checkbox" name="data[<?php echo $no ?>][peminjaman_id]" value="<?php echo $result['data'][0]['id'] ?>" class="check<?php echo $no ?> hidden" id="check<?php echo $no ?>"   >
                  <input type="checkbox" name="data[<?php echo $no ?>][session_key]"   value="<?php echo $result['session_key'] ?>"   class="check<?php echo $no ?> hidden" id="check<?php echo $no ?>"   >
                </td>
                <td class="text-center"><?php echo $row['jatuhtempo']; ?></td>
                <td class="text-right"><?php echo format_rupiah($row['angsuranpokok']); ?></td>
                <td class="text-right"><?php echo format_rupiah($row['besarbunga']); ?></td>
                <td class="text-right"><?php echo format_rupiah($row['denda']); ?></td>
                <td class="text-right"><?php echo format_rupiah($total); ?></td>
                <td class="text-center"><?php echo status($row['status']); ?></td>
                <td class="text-center"><?php echo $row['metode']['nama']; ?></td>
              </tr> 
              <?php $no++; } }?>
            </tbody>          
          </table>
          </div>
        </div>
      </div>
    </div><!--/.row-->

    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3">
            <h4 class="total">Jumlah yang akan dibayar :</h4>
          </div>  
          <div class="col-md-7">
            <h4>Rp <strong id="total">0.00</strong></h4>
          </div>  
          <div class="col-md-2">
            <div class="pull-right">
              <a href="<?php echo base_url();?>Peminjaman/daftarPeminjaman"><button type="button" class="btn btn-default">Batal</button></a>  
              <button type="submit" class="btn btn-primary" id="confirmButton" onclick="return confirm('Anda Yakin akan memproses transaksi ini?');" disabled>Proses</button>
            </div>
          </div> 
        </div>
      </div>
      </form>
    </div>    
    </div>    

<script type="text/javascript">

  $(document).ready(function() {
    var table = $('#tabelMutasi').DataTable();
 
    $('#tabelMutasi tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
 
    $('#hapus').click( function () {
        table.row('.selected').remove().draw( false );
    });
  });

  function total() {
    var $cs = $('.checkall').change(function () {
      var v = 0;
      $cs.filter(':checked').each(function () {
        v += $(this).data('cash');
      })
    var result = v.toFixed(2);
    $('#total').html(addCommas(result));
    });
      $('.checkall:checked').change();
  }

  function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
     while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + '.' + '$2');
     }
     return x1 + x2;
  }
        
  $('#tabelMutasi').on('click','.checkall',function(){
            $('input.'+this.id).prop('checked',this.checked);

  });

  var checkBoxes = $('tbody .checkall');
  checkBoxes.change(function () {
    $('#confirmButton').prop('disabled', checkBoxes.filter(':checked').length < 1);
  });
  $('tbody .checkall').change();
  
 
</script>