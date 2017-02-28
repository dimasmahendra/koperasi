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

<style type="text/css">
  .close {
    color: #fff; 
    opacity: 1;
}
</style>


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
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "Nama Anggota"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Jumlah Simpanan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(5) { width: 50%;text-align: right;}
  }


  </style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 

<div class="modal fade" id="myModal2" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="background-color: #203864;">
      <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
      <h4 class="modal-title" style="color:white;">Buat Suku Bunga</h4>
    </div>

    <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>Tabungan/AmbilTabungan">
      <div class="modal-body edit-content">  
        
        <input name="tabungan_id" type="hidden" id="tabungan_id" class="form-control">
        <div class="row">
          <div class="col-md-6 form-group">
            <label>Penerima Tabungan :</label>
            <input name="penerima" type="text" id="penerima" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 form-group">
            <label>Jumlah Pengambilan Tabungan :</label>
            <input name="jumlah" type="text" id="jumlah" class="form-control">
          </div>
        </div>        
              
        <div class="row">
          <div class="col-md-6 form-group">
            <label>Masukan Tokken :</label>
            <input name="token" type="text" id="token" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 form-group">
            <label>Metode Pengambilan :</label>
            <select name="metode_id" class="form-control" id="metode_id">
                <option value="">- Pilih Metode -</option>
                <option value="1">Cash / Tunai</option>
                <option value="3">SSP</option>
            </select> 
          </div>
        </div>

        <div class="modal-footer">
          <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Proses</button>
        </div> 
      </div>                               
    </form>

  </div>    
</div>
</div> 

    </br>   
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Tabungan</div>
          <div class="panel-body">

          <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?> 
                </div><?php } ?>

            <?php if($this->session->flashdata('warning')){?> 
                <div class="alert bg-warning" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('warning')?> 
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
                    <th style="width: 20%">No. Rekening</th>  
                    <th style="width: 30%">Nama Anggota</th>  
                    <th style="width: 30%; display: none;">ID</th>  
                    <th style="width: 30%">Jumlah Simpanan</th>
                    <th style="width: 15%">Aksi</th>                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>

                      <tr style="background-color: none">
                          <td style="background-color: none"><?php echo $no;$no++; ?></td>
                          <td><?php echo $row['norekening']; ?></td>
                          <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                          <td style="display: none;"><?php echo $row['anggotakoperasi']['idunik']; ?></td>
                          <td><?php echo "Rp ".number_format ($row['saldo'], 2, ',', '.'); ?></td>                                               
                          <td>
                            <a class="btn-sm btn-primary" href ="<?= base_url('Tabungan/daftarLihatMutasi') ?>/<?php echo $row['id']?>/<?php echo $row['anggotakoperasi_id']?>">
                            Lihat&nbsp;Mutasi</a>
                            <br class="hidden-lg"/>
                            <br class="hidden-lg"/>
                            <a href ="#menu" class="edit btn-sm btn-success" data-toggle="modal" data-target="#myModal2" data-idtabungan="<?php echo $row['id']; ?>">Ambil</a>
                            </a> 
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

      var id = $(this).data('idtabungan');      

       if(id)
       {
          $('#tabungan_id').val(id);
       }        
       else
       {
          alert('Tabungan Id tidak di temukan');
       }
    });    
</script>