<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.formatCurrency-1.4.0.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/i18n/jquery.formatCurrency.all.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>

<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm2.js') ?>" rel="stylesheet"></script>

<style type="text/css">
  .close {
    color: #fff; 
    opacity: 1;
  }

  .modal-body .form-group .input-group-addon {
    background-color: #eee;
  }
</style>
<style type="text/css">
.has-feedback .form-control-feedback {
    top: 25px;
    right: 0;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 0px;
    right: 0px;
}
.inputGroupContainer .form-control-feedback {
    top: 0px !important;
    right: 77px !important;
}
</style>
<style type="text/css">
@media (max-width: 978px) {
    body {
    margin-top:27px;
    }
    .buttonSmall{
    font-size: 12px;
    border-radius: 3px;
  }
}
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">   
  </br>
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #203864;">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title" style="color:white;">Buat Suku Bunga</h4>
        </div>

        <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>PengaturanTabungan/simpanSukuBungaBaru">
          <div class="modal-body edit-content">          
                  
            <div class="form-group">
              <label class="control-label col-sm-2" for="nama">Saldo : </label>
              <div class="col-md-4">                  
                <div class="input-group">
                  <div class="input-group-addon">Min</div>
                  <input type="text" class="form-control" id="saldomin" name="saldomin" placeholder="Minimal">                 
                </div>         
              </div>
              <div class="col-md-4">   
                <div class="input-group">    
                  <span class="input-group-addon">Maks</span>       
                  <input type="text" class="form-control" id="saldomaks" name="saldomaks" placeholder="Maksimal">
                </div>       
              </div>
            </div>

            <div class="form-group inputGroupContainer">
              <label class="control-label col-sm-2" for="nama">Bunga : </label>
              <div class="col-md-6">
                <div class="input-group">
                  <input type="text" class="form-control" id="bunga" name="bunga" placeholder="Bunga dalam Persentase"> 
                  <span class="input-group-addon">%/Tahun</span>
                </div>       
              </div>            
            </div>   

            <div class="modal-footer">
              <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Tambah</button>
            </div> 
          </div>                               
        </form>

      </div>    
    </div>
  </div> 

  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #203864;">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title" style="color:white;">Ubah Suku Bunga</h4>
        </div>

        <form name="form1" id="form2" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>PengaturanTabungan/ubahSukuBungaBaru">
          <div class="modal-body edit-content">          
            
            <input type="hidden" class="form-control" id="tabungan_id" name="tabungan_id">   
            <div class="form-group">
              <label class="control-label col-sm-2" for="nama">Saldo : </label>
              <div class="col-md-4">                  
                <div class="input-group">
                  <div class="input-group-addon">Min</div>
                  <input type="text" class="form-control" id="editsaldomin" name="editsaldomin">                 
                </div>         
              </div>
              <div class="col-md-4">   
                <div class="input-group">    
                  <span class="input-group-addon">Maks</span>       
                  <input type="text" class="form-control" id="editsaldomaks" name="editsaldomaks">
                </div>       
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="nama">Bunga : </label>
              <div class="col-md-6">
                <div class="input-group">
                  <input type="text" class="form-control" id="editbunga" name="editbunga"> 
                  <span class="input-group-addon">%/Tahun</span>
                </div>       
              </div>            
            </div> 

            <div class="modal-footer">
              <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ubah</button>
            </div> 
          </div>                               
        </form>

      </div>    
    </div>
  </div> 

  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #203864;">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title" style="color:white;">Hapus Suku Bunga</h4>
        </div>

        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>PengaturanTabungan/hapusSukuBungaBaru">
          <div class="modal-body edit-content">          
            
            <input type="hidden" class="form-control" id="edittabungan_id" name="edittabungan_id"> 
            <h4>Pastikan tidak ada simpanan yang menggunakan suku bunga ini. Jika ada simpanan yang menggunakan suku bunga ini, maka proses penghapusan tidak dapat dilakukan. Apakah anda yakin akan menghapus suku bunga ini ?</h4>              

            <div class="modal-footer">
              <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Hapus</button>
            </div> 
          </div>                               
        </form>

      </div>    
    </div>
  </div>

  <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #203864;">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title" style="color:white;">Ubah Biaya administrasi</h4>
        </div>

        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>PengaturanTabungan/ubahBiayaAdm">
          <div class="modal-body edit-content">          
            
            <input type="hidden" class="form-control" id="setingdasar_id" name="setingdasar_id">

            <div class="form-group">
              <label class="control-label col-sm-5" for="nama">Biaya Administrasi Per Bulan : </label>
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" id="administrasi" name="administrasi">
                  <span class="input-group-addon">/ Bulan</span>
                </div>                       
              </div>

            </div> 
            
            <div class="modal-footer">
              <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ubah</button>
            </div> 
          </div>                               
        </form>

      </div>    
    </div>
  </div>

  <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #203864;">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title" style="color:white;">Tanggal Perhitungan Bunga Tiap Bulan</h4>
        </div>

        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>PengaturanTabungan/ubahTanggalBunga">
          <div class="modal-body edit-content">          
            
            <input type="hidden" class="form-control" id="idsetingdasar1" name="idsetingdasar1">

            <div class="form-group">
              <label class="control-label col-sm-6" for="nama">Tanggal Perhitungan Bunga Tiap Bulan : </label>
              <div class="col-sm-4">
                <div class="input-group">
                  <!-- <input type="text" class="form-control" id="periode" name="periode"> -->
                  <select name="periode_id" class="form-control" id="periode_id">
                      <option value="1">1</option>  
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>                                          
                  </select>              
                </div>                       
              </div>

            </div> 
            
            <div class="modal-footer">
              <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ubah</button>
            </div> 
          </div>                               
        </form>

      </div>    
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Pengaturan Tabungan
          <div class="pull-right">
            <a href ="#" data-toggle="modal" data-target="#myModal3">
              <button class="btn btn-primary btn-md visible-lg-block"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Buat Suku Bunga
              </button>
              <button class="btn btn-primary btn-xs hidden-lg"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Suku Bunga
              </button>
            </a>
          </div>
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
        <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th style="width: 40%">Saldo</th>  
                  <th style="width: 40%">Bunga Per Tahun</th>                              
                  <th style="width: 18%">Aksi</th>                    
                </tr>
              </thead>
              <tbody>
                  <?php
                    $no = 1;            
                    foreach ($result['data'] as $row)
                    { ?>
                    <tr>
                        <td><?php echo $no;$no++; ?></td>                             
                        <td><?php echo "Rp ".number_format ($row['minsaldo'], 2, ',', '.'); ?> - <?php echo "Rp ".number_format ($row['maxsaldo'], 2, ',', '.'); ?></td>
                        <td><?php echo number_format($row['bunga'],2)." %"; ?></td>                        
                        <td>                                                       
                          <a class="edit" href ="#" data-toggle="modal" data-target="#myModal4" data-idseting="<?php echo $row['id']; ?>" data-minsaldo="<?php echo $row['minsaldo']; ?>" data-maxsaldo="<?php echo $row['maxsaldo']; ?>" data-bunga="<?php echo $row['bunga']; ?>"><button class="btn btn-primary btn-xs">Ubah</button></a>
                          &nbsp;
                          <a class="hapus" href ="#" data-toggle="modal" data-target="#myModal5" data-idhapusseting="<?php echo $row['id']; ?>"><button class="btn btn-danger btn-xs">Hapus</button></a> 
                        </td>
                    </tr>
                  <?php } ?>            
              </tbody>              
        </table>      

        </div>
      </div>
    </div>
  </div><!--/.row--> 

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-footer">
          <div class="panel-body">

            <div class="row">
              <div class="col-md-12 form-group">
                <label class="visible-xs-inline" style="font-size: 12.5px">Biaya Administrasi Per Bulan : </label>
                <label class="hidden-xs">Biaya Administrasi Per Bulan : </label>
                
                <?php if(count($result['data2']) == 0) { echo "0";}
                else {
                  echo "Rp ".number_format ($result['data2'][0]['administrasi'], 2, ',', '.');} 
                  ?>
                <div class="pull-right">
                  <a class="ubahBiaya" href ="#" data-toggle="modal" data-target="#myModal6" data-idsetingdasar="<?php if(count($result['data2']) == 0) { echo "0";} else { echo $result['data2'][0]['id'];} ?>" data-administrasi="<?php if(count($result['data2']) == 0) { echo "0";} else { echo $result['data2'][0]['administrasi'];;} ?>"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Ubah</button></a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group">
                <label class="visible-xs-inline" style="font-size: 12.5px">Tanggal Perhitungan Bunga Tiap Bulan : </label>
                <label class="hidden-xs">Tanggal Perhitungan Bunga Tiap Bulan : </label>
                <?php if(count($result['data2']) == 0) { echo "0";}
                else {
                 echo $result['data2'][0]['periode'];} 
                  ?>
                <div class="pull-right"> 
                  <a class="ubahBiaya" href ="#" data-toggle="modal" data-target="#myModal7" data-idsetingdasar="<?php if(count($result['data2']) == 0) { echo "0";} else { echo $result['data2'][0]['id'];} ?>" data-administrasi="<?php if(count($result['data2']) == 0) { echo "0";} else { echo $result['data2'][0]['periode'];;} ?>"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Ubah</button></a>
                </div>
              </div>
            </div>

          </div>
        </div> 
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
</script>

<script>
    $(document).on("click", ".edit", function () {

      var id = $(this).data('idseting');      
      var maxsaldo = $(this).data('maxsaldo');  
      var minsaldo = $(this).data('minsaldo');  
      var bunga = $(this).data('bunga');     

       if(id)
        { 
          $('#tabungan_id').val(id);         
          $('#editsaldomin').val(minsaldo);
          $('#editsaldomaks').val(maxsaldo);
          $('#editbunga').val(bunga);
       }        
       else
       {
          alert('Pengaturan ID tidak di temukan');
       }
    });    
</script>

<script>
    $(document).on("click", ".hapus", function () {

      var id = $(this).data('idhapusseting'); 
      
       if(id)
      {           
          $('#edittabungan_id').val(id);   
       }        
       else
       {
          alert('Pengaturan ID tidak di temukan');
       }
    });    
</script>

<script>
    $(document).on("click", ".ubahBiaya", function () {

      var id = $(this).data('idsetingdasar'); 
      var administrasi = $(this).data('administrasi'); 
      
       if(id)
      {           
          $('#setingdasar_id').val(id); 
          $('#administrasi').val(administrasi);   
       }        
       else
       {
          alert('Pengaturan ID tidak di temukan');
       }
    });    
</script>

<script>
    $(document).on("click", ".ubahTanggal", function () {

      var id = $(this).data('idsetingdasar1'); 
      var periodeTanggal = $(this).data('periode1'); 
      
       if(id)
      {           
          $('#idsetingdasar1').val(id);          
          $('#periode_id').val(periodeTanggal);   
       }        
       else
       {
          alert('Pengaturan ID tidak di temukan');
       }
    });    
</script>