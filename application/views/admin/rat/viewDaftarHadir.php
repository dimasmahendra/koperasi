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
      #tabelRAThadir table, #tabelRAThadir thead, #tabelRAThadir tbody, #tabelRAThadir th, #tabelRAThadir td, #tabelRAThadir tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelRAThadir thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelRAThadir tr { border: 3px solid #ccc; }

      #tabelRAThadir td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;        
      }

      #tabelRAThadir td:before {
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

      #tabelRAThadir td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelRAThadir td:nth-of-type(2):before { content: "Tanggal"; text-align: left;}
      #tabelRAThadir td:nth-of-type(3):before { content: "Tempat"; text-align: left;}
      #tabelRAThadir td:nth-of-type(4):before { content: "Nama Anggota"; text-align: left;}
      #tabelRAThadir td:nth-of-type(5):before { content: "Status"; text-align: left;}
      #tabelRAThadir td:nth-child(1) { text-align: right;}
      #tabelRAThadir td:nth-child(2) { text-align: right;}
      #tabelRAThadir td:nth-child(3) { text-align: right;}
      #tabelRAThadir td:nth-child(4) { text-align: right;}
      #tabelRAThadir td:nth-child(5) { text-align: right;}
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
</br>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Daftar Hadir Rapat Anggota Tahunan Koperasi</div>

        <div class="panel-body">
        
        <!-- <table class="table table-bordered"> -->
        <table id="tabelRAThadir" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>                  
                  <th>Tanggal</th>
                  <th>Tempat</th>
                  <th>Nama Anggota</th>
                  <th>Status</th>                                
                </tr>
              </thead>
              <tbody>
                  <?php
                    $no=1;                              
                    foreach ($result['data'] as $row)
                    { ?>                 
                          <tr>                                  
                              <td><?php echo $no;$no++; ?></td>                                 
                              <td><?php echo $row['rat']['tanggal']; ?></td>
                              <td><?php echo $row['rat']['tempat']; ?></td>
                              <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                              <td><?php echo $row['kehadiran']; ?></td>                                          
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
    var table = $('#tabelRAThadir').DataTable();
 
    $('#tabelRAThadir tbody').on( 'click', 'tr', function () {
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