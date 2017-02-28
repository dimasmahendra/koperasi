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
  only screen and (max-width: 767px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelPeriodeJurnal table, #tabelPeriodeJurnal thead, #tabelPeriodeJurnal tbody, #tabelPeriodeJurnal th, #tabelPeriodeJurnal td, #tabelPeriodeJurnal tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelPeriodeJurnal thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelPeriodeJurnal tr { border: 3px solid #ccc; }

      #tabelPeriodeJurnal td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;        
      }

      #tabelPeriodeJurnal td:before {
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
      #tabelPeriodeJurnal td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelPeriodeJurnal td:nth-of-type(2):before { content: "Tahun Operasi"; text-align: left;}
      #tabelPeriodeJurnal td:nth-of-type(3):before { content: "Penjualan"; text-align: left;}
      #tabelPeriodeJurnal td:nth-of-type(4):before { content: "HPP"; text-align: left;}
      #tabelPeriodeJurnal td:nth-of-type(5):before { content: "Laba Kotor"; text-align: left;}     
      #tabelPeriodeJurnal td:nth-of-type(6):before { content: "Biaya Usaha"; text-align: left;}     
      #tabelPeriodeJurnal td:nth-of-type(7):before { content: "Laba Bersih"; text-align: left;}     
      #tabelPeriodeJurnal td:nth-of-type(8):before { content: "Total Simpanan"; text-align: left;}     
      #tabelPeriodeJurnal td:nth-child(1) { text-align: right;}
      #tabelPeriodeJurnal td:nth-child(2) { text-align: right;}
      #tabelPeriodeJurnal td:nth-child(3) { text-align: right;}
      #tabelPeriodeJurnal td:nth-child(4) { text-align: right;}
      #tabelPeriodeJurnal td:nth-child(5) { text-align: right;}
      #tabelPeriodeJurnal td:nth-child(6) { text-align: right;}
      #tabelPeriodeJurnal td:nth-child(7) { text-align: right;}
      #tabelPeriodeJurnal td:nth-child(8) { text-align: right;}
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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">   
  </br><!--/.row-->  
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
        <a class="btn-sm btn-primary" style="color:white;" href="<?php echo base_url(); ?>Jurnal/indexJurnal">
          <svg class="glyph stroked chevron left"><use xlink:href="#stroked-chevron-left"/></svg>Kembali</a>&nbsp;&nbsp;Daftar Jurnal Tahun Operasi
          <?php echo $hasil['data']['tahunoperasi']['tanggalmulai'];?> | <?php echo $hasil['data']['tahunoperasi']['tanggalselesai'];?></div>
        <div class="panel-body">
          <table id="tabelPeriodeJurnal" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>                         
                <th>Tahun Operasi</th>
                <th>Penjualan</th>
                <th>HPP</th>
                <th>Laba Kotor</th>
                <th>Biaya Usaha</th>
                <th>Laba Bersih</th>
                <th>Total Simpanan</th>                 
              </tr>
            </thead>
            <tbody>
            <?php if(count($hasil['data']) == 0) 
            { 
                echo "";
            } 
            else 
            { ?> 
                <tr>
                  <td><?php echo "1";?></td>
                  <td><?php echo $hasil['data']['tahunoperasi']['tanggalmulai'];?> | <?php echo $hasil['data']['tahunoperasi']['tanggalselesai'];?></td>                                    
                  <td><?php echo $hasil['data']['penjualan'];?></td>
                  <td><?php echo "Rp ".number_format ($hasil['data']['hpp'], 2, ',', '.'); ?></td>
                  <td><?php echo "Rp ".number_format ($hasil['data']['labakotor'], 2, ',', '.'); ?></td>
                  <td><?php echo "Rp ".number_format ($hasil['data']['biayausaha'], 2, ',', '.'); ?></td>
                  <td><?php echo "Rp ".number_format ($hasil['data']['lababersih'], 2, ',', '.'); ?></td>
                  <td><?php echo "Rp ".number_format ($hasil['data']['totalsimpanan'], 2, ',', '.'); ?></td>
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
    var table = $('#tabelPeriodeJurnal').DataTable();
 
    $('#tabelPeriodeJurnal tbody').on( 'click', 'tr', function () {
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