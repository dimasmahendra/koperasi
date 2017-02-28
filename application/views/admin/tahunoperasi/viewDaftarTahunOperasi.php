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

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 375px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelTahunOperasi table, #tabelTahunOperasi thead, #tabelTahunOperasi tbody, #tabelTahunOperasi th, #tabelTahunOperasi td, #tabelTahunOperasi tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelTahunOperasi thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelTahunOperasi tr { border: 3px solid #ccc; }

      #tabelTahunOperasi td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;        
      }

      #tabelTahunOperasi td:before {
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

      #tabelTahunOperasi td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelTahunOperasi td:nth-of-type(2):before { content: "Tangal Mulai"; text-align: left;}
      #tabelTahunOperasi td:nth-of-type(3):before { content: "Tanggal Selesai"; text-align: left;}
      #tabelTahunOperasi td:nth-of-type(4):before { content: "Status"; text-align: left;}
      #tabelTahunOperasi td:nth-of-type(5):before { content: "Aksi"; text-align: left;}     
      #tabelTahunOperasi td:nth-child(1) { text-align: right;}
      #tabelTahunOperasi td:nth-child(2) { text-align: right;}
      #tabelTahunOperasi td:nth-child(3) { text-align: right;}
      #tabelTahunOperasi td:nth-child(4) { text-align: right;}
      #tabelTahunOperasi td:nth-child(5) { text-align: right;}
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

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
</br>   
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Set Aktif Tahun Operasi Koperasi</div>
        <div class="panel-body">

        <?php if($this->session->flashdata('pesan')){?> 
              <div class="alert bg-success" role="alert">
                <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                <?php echo $this->session->flashdata('pesan')?> 
              </div><?php } ?>

          <?php if($this->session->flashdata('error')){?> 
                <div class="alert bg-danger" role="alert">
                  <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                  <?php echo $this->session->flashdata('error')?> 
                </div><?php } ?>

        <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>TahunOperasi/updateTahunOperasiAktif">

            <div class="col-md-3 form-group">                   
              <label>Tahun Operasi : </label>                    
                <select name="tahunoperasi" class="form-control" id="tahunoperasi_id">
                  <option>- Select Tahun Operasi -</option>
                    <?php foreach($tahun['data'] as $row){ ?>               
                      <option value="<?php echo $row['id'];?>"><?php echo $row['tanggalmulai'] ?>&nbsp;|&nbsp;<?php echo $row['tanggalselesai'] ?></option>
                    <?php } ?>
                </select>                
            </div>

            <div class="col-md-6" style="margin-top: 25px;">                  
                <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Submit</button>                 
            </div>
        </form> 

        </div>
      </div>
    </div>
  </div><!--/.row-->   

    <!-- Tabel Inputan Admin -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Daftar Tahun Operasi Koperasi&nbsp;&nbsp;
            <a class="btn-sm btn-primary" href ="<?= base_url('TahunOperasi/index') ?>">Tambah Tahun Operasi</a>
        </div>
        <div class="panel-body">        

        <!-- <table class="table table-bordered"> -->
        <table id="tabelTahunOperasi" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tangal Mulai</th>  
                  <th>Tanggal Selesai</th>
                  <th>Status</th>
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
                              <td><?php echo $row['tanggalmulai']; ?></td>
                              <td><?php echo $row['tanggalselesai']; ?></td>                         
                              <td><?php if ($row['status'] == 'Aktif')
                                    {
                                      echo "<font color='green'>".$row['status']."</font>";
                                    }
                                    else if ($row['status'] == 'Tidak Aktif')
                                    {
                                      echo "<font color='red'>".$row['status']."</font>";
                                    }
                                  ?>                                    
                              </td>                           
                              <td>                               
                               <a class="btn-sm btn-primary" href ="<?= base_url('TahunOperasi/ubahTahunOperasi') ?>/<?php echo $row['id']?>">
                               Edit</a>
                               &nbsp;
                               <a class="btn-sm btn-danger" href ="<?= base_url('TahunOperasi/hapusTahunOperasi') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Tahun Operasi ini?');">
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
    var table = $('#tabelTahunOperasi').DataTable();
 
    $('#tabelTahunOperasi tbody').on( 'click', 'tr', function () {
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