<link href="<?= base_url('asset_admin/css/jquery-ui.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet"> 
<style type="text/css">
  .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    z-index:2147483647;
    overflow-x: hidden;
    font-family: inherit;
  }
</style>
<div class="modal fade" id="modalEditAngsuran" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Edit Pembiayaan Syariah</h4>
      </div>
      <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>AngsuranNasabah/updatePembiayaanSyariah">   
        <div class="modal-body edit-content">
          <input type="hidden" id="id" name="id">
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Nama Anggota : </label>
              <div class="input-group">
                <input type="text" class="form-control" id="namatags" name="namatags" required>
                <input type="hidden" id="namaid" name="namaid" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Produk Syariah : </label>
              <div class="input-group">
                <select name="produk_id" class="form-control" id="produk_id">
                  <option value="" name="produknama" id="produknama"></option>
                  <?php foreach($pembiayaan['data'] as $row){ ?>               
                      <option value="<?php echo $row['id'];?>"><?php echo $row['namaprogram'] ?></option>
                  <?php } ?>
                </select> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label>No Rekening : </label>
              <div class="input-group">
                <input type="text" class="form-control" id="rekening" name="rekening" required>
              </div>
            </div>
            <div class="col-md-6 form-group">
              <label>No Bukti : </label>
              <div class="input-group">
                <input type="text" class="form-control" id="nobukti" name="nobukti" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Jumlah Pinjam : </label>
              <div class="input-group">
                <input type="text" class="form-control" id="jumlahpinjam" name="jumlahpinjam" required>
              </div>
            </div>
            <div class="col-md-4 form-group">
              <label>Tenor : </label>
              <div class="input-group">
                <input type="text" class="form-control" id="tenor" name="tenor" required>
                <span class="input-group-addon">/ Bulan</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Bonus : </label>
              <div class="input-group">
                <input type="text" class="form-control" id="bonus" name="bonus" required>
              </div>
            </div>
            <div class="radio-inline" style="margin-top: 25px;">
              <div class="input-group">
                <label>
                  <input type="hidden" name="persen" value="tidak"/>
                  <input type="checkbox" id="persen" name="persen" value="ya"/>&nbsp;Persen
                </label>
              </div>
            </div>               
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label>Keterangan Lain : </label>
                <div class="input-group">
                  <textarea class="form-control" rows="5" id="keterangan" name="keterangan"></textarea>
                </div>
            </div>   
          </div>
          <div class="modal-footer">                  
            <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulangi</button>
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>            
          </div> 
        </div>
      </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="modalBayar" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pembayaran Angsuran</h4>
      </div>
      <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>AngsuranNasabah/insertPembiayaanSyariahDetail">   
        <div class="modal-body edit-content">
          <input type="hidden" id="idbayar" name="idbayar">  
          <div class="row">
            <div class="col-md-6 form-group">                   
                <label>Tanggal Bayar : </label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="text" id="datetimepicker2" style="min-height:34px;" name="tanggalbayar" required>
                </div>
            </div>
          </div>        
          <div class="row">
            <div class="col-md-6 form-group">
              <label>No Bukti : </label>
              <div class="input-group">
                <input type="text" class="form-control" id="nobuktibayar" name="nobuktibayar" required>
              </div>
            </div>          
          </div>    
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Jumlah Bayar : </label>
              <div class="input-group">
                <input type="text" class="form-control" id="jumlahbayar" name="jumlahbayar" required>
              </div>
            </div>                     
          </div>         
          <div class="modal-footer">                  
            <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulangi</button>
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Bayar</button>            
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
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <section class="invoice">            
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="page-header">
                    <i class="fa fa-globe"></i> Detail Angsuran Syariah 

                    <a href ="#" class="edit" data-toggle="modal" data-target="#modalEditAngsuran" data-id="<?php echo $user['data'][0]['id']; ?>" data-namaid="<?php echo $user['data'][0]['anggotakoperasi_id']; ?>" data-nama="<?php echo $user['data'][0]['anggotakoperasi']['nama']; ?>" data-produkid="<?php echo $user['data'][0]['pembiayaan']['id']; ?>" data-produknama="<?php echo $user['data'][0]['pembiayaan']['namaprogram']; ?>" data-rekening="<?php echo $user['data'][0]['rekening']; ?>" data-nobukti="<?php echo $user['data'][0]['nobukti']; ?>" data-jumlahpinjam="<?php echo $user['data'][0]['jumlahpinjam']; ?>" data-tenor="<?php echo $user['data'][0]['tenor']; ?>" data-bonus="<?php if($user['data'][0]['bonuspersen'] == 0) { echo $user['data'][0]['bonusfix']; } else { echo $user['data'][0]['bonuspersen']; } ?>" data-persen="<?php if($user['data'][0]['bonuspersen'] == 0) { echo "tidak"; } else { echo "ya"; } ?>" data-keterangan="<?php echo $user['data'][0]['pembiayaan']['deskripsi']; ?>"><button href="#" id="tombolSimpan" type="submit" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></button></a>  

                    <small class="pull-right">Tanggal : <?php echo $tanggal; ?></small>
                  </h2>
                </div>             
              </div>
      
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    <h4><strong><?php echo $user['data'][0]['anggotakoperasi']['nama'];?></strong></h4>
                    <?php echo $user['data'][0]['anggotakoperasi']['telepon'];?><br>
                    <?php echo $user['data'][0]['anggotakoperasi']['email'];?><br>
                    <?php echo $user['data'][0]['anggotakoperasi']['alamat'];?><br>   
                  </address>
                </div>
              
                <div class="col-sm-4 invoice-col pull-right" style="text-align: right;">  
                  <b>Info Pembiayaan</b><br>          
                  No Bukti : <?php echo $user['data'][0]['nobukti']; ?><br>
                  Tanggal  : <?php echo $user['data'][0]['created_at']; ?><br>
                  Jatuh Tempo : <?php echo $user['data'][0]['jatuhtempo']; ?><br>                  
                </div>          
              </div> 

              <div class="row">
                <div class="col-xs-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Nama Program</th>
                      <th>Akad</th>
                      <th>Tenor</th>
                      <th>Sisa Tenor</th>
                      <th>Jumlah Pinjam</th>
                      <th>Sisa Angsuran</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>          
                      <td><?php echo $user['data'][0]['pembiayaan']['namaprogram'];?></td>
                      <td><?php echo $user['data'][0]['pembiayaan']['akad'];?></td>
                      <td><?php echo $user['data'][0]['tenor'];?></td>
                      <td><?php echo $user['data'][0]['sisatenor'];?></td>
                      <td><?php echo "Rp ".number_format ($user['data'][0]['jumlahpinjam'], 2, ',', '.');?></td>    
                      <td><?php echo "Rp ".number_format ($user['data'][0]['sisa'], 2, ',', '.');?></td>                       
                    </tr>                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div></br>

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Payment Methods:</p>
                  <img style="width: 200px; height: 80px" class="img-responsive" src="../../asset_admin/images/logossp.png" alt="SSP">  
                </div>
                <!-- /.col -->
                <div class="col-xs-6">  
                  <div class="table-responsive">
                    <table class="table">                      
                      <tr>
                        <th>Jumlah Tiap Kali Angsuran :</th>
                        <td><?php echo "Rp ".number_format ($user['data'][0]['angsuran'], 2, ',', '.');?></td>
                      </tr>
                      <tr>
                        <th>Sisa Angsuran Bulan Lalu :</th>
                        <td><?php echo "Rp ".number_format ($user['data'][0]['kekurangan'], 2, ',', '.');?></td>
                      </tr>
                      <tr>
                        <th>Sisa Angsuran Bulan Depan :</th>
                        <td><?php echo "Rp ".number_format ($user['data'][0]['bulandepan'], 2, ',', '.');?></td>
                      </tr>
                    </table>
                      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        <b>Deskripsi :</b></br>
                        <?php echo $user['data'][0]['pembiayaan']['deskripsi']?>
                      </p>
                  </div>
                </div>
                <!-- /.col -->
              </div>

              <div class="row no-print">
                <div class="col-xs-12"> 
                  <a href ="#" class="editbayar" data-toggle="modal" data-target="#modalBayar" data-idbayar="<?php echo $user['data'][0]['id']; ?>"><button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Lakukan Pembayaran
                  </button></a>                    
                </div>
              </div>
            </section>   

          </div>
        </div>
      </div>
    </div><!--/.row-->  
</div>
<script src="<?= base_url('asset_admin/js/jquery-ui.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>
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
<script>
$('.edit').click(function(){
  var id           = $(this).data('id');
  var nama         = $(this).data('nama');
  var namaid       = $(this).data('namaid');
  var produknama   = $(this).data('produknama');
  var produkid     = $(this).data('produkid');
  var rekening     = $(this).data('rekening');
  var nobukti      = $(this).data('nobukti');
  var jumlahpinjam = $(this).data('jumlahpinjam');
  var tenor        = $(this).data('tenor');
  var bonus        = $(this).data('bonus');
  var persen        = $(this).data('persen');
  var keterangan   = $(this).data('keterangan');

  if (nama) {
    $('[name="id"]').val(id);
    $('[name="namatags"]').val(nama);
    $('[name="namaid"]').val(namaid);
    $('[name="produknama"]').html(produknama);
    $('[name="produknama"]').val(produkid);
    $('[name="rekening"]').val(rekening);
    $('[name="nobukti"]').val(nobukti);
    $('[name="jumlahpinjam"]').val(jumlahpinjam);
    $('[name="tenor"]').val(tenor);
    $('[name="bonus"]').val(bonus);
    if (persen == 'ya') { 
      $('[name="persen"]').prop('checked', true);
    }    
    $('[name="keterangan"]').val(keterangan);
  }
  else{
    alert('Data tidak ditemukan !!!');
  }
});
</script>
<script>
$('.editbayar').click(function(){
  var idbayar           = $(this).data('idbayar');

  if (id) {
    $('[name="idbayar"]').val(idbayar);      
  }
  else{
    alert('Data tidak ditemukan !!!');
  }

  $('#datetimepicker2').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });
});
</script>