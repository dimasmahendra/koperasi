<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Nasabah Pembiayaan Syariah&nbsp;&nbsp;
              <a class="btn-sm btn-primary" href ="<?= base_url('AngsuranNasabah/index') ?>">Tambah Pembiayaan</a>
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
                <th>No. Bukti</th>
                <th>Nama</th>
                <th>No. Rekening</th>
                <th>Sisa Pinjaman</th>                
                <th>Sisa Tenor</th>               
                <th>Jatuh Tempo</th>
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
                      <td><?php echo $row['nobukti']; ?></td>
                      <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                      <td><?php echo $row['rekening']; ?></td>
                      <td><?php echo "Rp ".number_format ($row['sisa'], 2, ',', '.');?></td>
                      <td><?php echo $row['sisatenor']; ?></td>
                      <td><?php echo $row['jatuhtempo']; ?></td>                                                                         
                      <td>                               
                       <a class="btn-sm btn-primary" href ="<?= base_url('AngsuranNasabah/lihatDetail') ?>/<?php echo $row['id']?>">
                       Lihat Detail</a>
                       &nbsp;
                       <a class="btn-sm btn-danger" href ="<?= base_url('AngsuranNasabah/hapusPembiayaan') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Pemiayaan Syariah ini?');">
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