<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<!-- <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>" rel="stylesheet"></script> -->
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
  only screen and (max-width: 767px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelBiayaUsaha table, #tabelBiayaUsaha thead, #tabelBiayaUsaha tbody, #tabelBiayaUsaha th, #tabelBiayaUsaha td, #tabelBiayaUsaha tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelBiayaUsaha thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelBiayaUsaha tr { border: 3px solid #ccc; }

      #tabelBiayaUsaha td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;        
      }

      #tabelBiayaUsaha td:before {
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

      #tabelBiayaUsaha td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelBiayaUsaha td:nth-of-type(2):before { content: "Tanggal"; text-align: left;}
      #tabelBiayaUsaha td:nth-of-type(3):before { content: "Jumlah"; text-align: left;}
      #tabelBiayaUsaha td:nth-of-type(4):before { content: "Keterangan"; text-align: left;}
      #tabelBiayaUsaha td:nth-of-type(5):before { content: "Aksi"; text-align: left;}     
      #tabelBiayaUsaha td:nth-child(1) { text-align: right;}
      #tabelBiayaUsaha td:nth-child(2) { text-align: right;}
      #tabelBiayaUsaha td:nth-child(3) { text-align: right;}
      #tabelBiayaUsaha td:nth-child(4) { text-align: right;}
      #tabelBiayaUsaha td:nth-child(5) { text-align: right;}
    }  

    @media (min-width: 768px) {
      body {
        margin-left:50px;
      }
    }

    @media (min-width: 1024px) {
      body {
        margin-left:0px;
      }
    }
  
</style>
<?php error_reporting(E_ERROR | E_PARSE); ?>

<!-- ModalTransaksi -->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Biaya Usaha Koperasi</h4>
      </div>
      <div class="modal-body">
        <p>Tahun Operasi Koperasi ini belum di Aktifkan, Mohon untuk mengkatifkan Tahun Operasi terlebih dahulu, untuk mengakses Biaya Usaha</p>
      </div>    

      <div class="modal-footer">        
        <a class="btn btn-primary" href="<?php echo base_url(); ?>TahunOperasi/daftarTahunOperasi">Ya</a>
        <a class="btn btn-default" href="<?php echo base_url(); ?>Dashboard/index">Tidak</a>
      </div>

    </div>    
  </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br><!--/.row-->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Biaya Usaha&nbsp;&nbsp;
              <a class="btn-sm btn-primary" href ="<?= base_url('BiayaUsaha/index') ?>">Tambah Biaya Usaha</a>
          </div>
          <div class="panel-body">

          <h4><b>Data di bawah ini merupakan data yang tahun operasi nya aktif</b></h4>

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
          <table id="tabelBiayaUsaha" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>  
                    <th>Jumlah</th>
                    <th>Keterangan</th>                           
                    <th>Aksi</th>                  
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                                <td><?php echo $row['jumlah']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>                                
                                <td>                               
                                 <a class="btn-sm btn-primary" href ="<?= base_url('BiayaUsaha/ubahBiayaUsaha') ?>/<?php echo $row['id']?>">
                                 Edit</a>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('BiayaUsaha/hapusBiayaUsaha') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Biaya Usaha ini?');">
                                 Hapus</a> 
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
      $('#myModal1').modal({backdrop: 'static', keyboard: false});

    }
    var table = $('#tabelBiayaUsaha').DataTable();
    
    $('#tabelBiayaUsaha tbody').on( 'click', 'tr', function () {
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