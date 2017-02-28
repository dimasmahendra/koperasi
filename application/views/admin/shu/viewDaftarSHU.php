<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<!-- <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>" rel="stylesheet"></script> -->
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>

<style type="text/css">
@media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

    body{
      margin-top: 27px;
    }
  
  /* Force table to not be like tables anymore */
  #tabelAnggotaKoperasi table, 
  #tabelAnggotaKoperasi thead, 
  #tabelAnggotaKoperasi tbody, 
  #tabelAnggotaKoperasi th, 
  #tabelAnggotaKoperasi td, 
  #tabelAnggotaKoperasi tr { 
    display: block; 
  }
 
  /* Hide table headers (but not display: none;, for accessibility) */
  #tabelAnggotaKoperasi thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
 
  #tabelAnggotaKoperasi tr { border: 1px solid #ccc; }
 
  #tabelAnggotaKoperasi td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 30%; 
    white-space: normal;
    text-align:left;
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
    text-align:left;
    font-weight: bold;
  }
 
  /*
  Label the data
  */
  #tabelAnggotaKoperasi td:before { content: attr(data-title); }
    #tabelAnggotaKoperasi td:nth-of-type(1):before { content: "No"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "Komponen SHU"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(3):before { content: "Presentase"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(3) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}

    .panel-heading{
      font-weight:bold;
      font-size: 14.5px;
    }

}
</style>

</head>
<body>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">    
<?php error_reporting(E_ERROR | E_PARSE); ?>

<!-- ModalTransaksi -->
<div class="modal fade" id="modalShu" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sisa Hasil Usaha (SHU)</h4>
      </div>
      <div class="modal-body">
        <p>Tahun Operasi Koperasi ini belum di Aktifkan, Mohon untuk mengkatifkan Tahun Operasi terlebih dahulu, untuk mengakses Sisa Hasil Usaha (SHU)</p>
      </div>    

      <div class="modal-footer">        
        <a class="btn btn-primary" href="<?php echo base_url(); ?>TahunOperasi/daftarTahunOperasi">Ya</a>
        <a class="btn btn-default" href="<?php echo base_url(); ?>Dashboard/index">Tidak</a>
      </div>

    </div>    
  </div>
</div>

    </br><!--/.row-->

    <?php if($this->session->flashdata('error')){?> 
      <div class="alert bg-danger" role="alert">
        <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
        <?php echo $this->session->flashdata('error')?> 
      </div><?php } ?>

    <form name="form3" id="form3" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>SHU/kalkulasiSHU">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">Kalkulasi SHU</div>
            <div class="panel-body">              

              <div class="col-md-6">                  
                  <button href="#" id="kalkulasijurnal" type="submit" class="btn-lg btn-success" onclick="return confirm('Apakah Anda ingin Kalkulasi SHU periode ini?');">Kalkulasi SHU</button>          
              </div>

            </div>
          </div>
        </div>
      </div>
    </form>

    <form name="form3" id="form3" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>SHU/daftarPeriodeSHU">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">Lihat Histori Kalkulasi SHU : </div>
            <div class="panel-body">              

              <div class="col-md-3 form-group">                   
                <label>Tahun Operasi : </label>                    
                  <select name="tahunoperasi" class="form-control" id="tahunoperasi_id">
                    <option>- Pilih Tahun Operasi -</option>
                      <?php foreach($tahun['data'] as $row){ ?>               
                        <option value="<?php echo $row['id'];?>"><?php echo $row['tanggalmulai'] ?>&nbsp;|&nbsp;<?php echo $row['tanggalselesai'] ?></option>
                      <?php } ?>
                  </select>                
              </div>

              <div class="col-md-2" style="margin-top:25px">                  
                  <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Lihat Histori</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </form>  

      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Sisa Hasil Usaha (SHU) &nbsp;&nbsp;
              <a class="btn-sm btn-primary visible-lg-inline-block" href ="<?= base_url('SHU/index') ?>">Tambah SHU</a>
              <a class="btn-sm btn-primary hidden-lg" href ="<?= base_url('SHU/index') ?>"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> SHU</a>
          </div>
          <div class="panel-body">

          <!-- <table class="table table-bordered"> -->
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>                   
                    <th>Komponen SHU</th>                 
                    <th>Presentase</th>                                           
                    <th>Edit</th>                  
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></b></td>                                
                                <td><?php  if ($row['tipekomponenshu']['tipekomponenshu']=='Lainnya') {

                                  echo "Lainnya (".$row['komponen'].")";
                                } else
                                {
                                  echo $row['tipekomponenshu']['tipekomponenshu'];}
                                ?></td>                               
                                <td><?php echo $row['persentase']; ?></td>                          
                                <td>                               
                                 <a class="btn-sm btn-primary" href ="<?= base_url('SHU/ubahSHU') ?>/<?php echo $row['id']?>">
                                 Edit</a>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('SHU/hapusSHU') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus SHU ini?');">
                                 Delete</a> 
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
    if(<?php echo $result['status'];?> == 0)
    {
      //$("#id").css("display", "none");
      //$('#myModal1').modal('show');
      $('#modalShu').modal({backdrop: 'static', keyboard: false});

    }
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