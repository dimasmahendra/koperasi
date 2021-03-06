<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script> -->
<style type="text/css">
  .display .headermutasi td, th {
    border: 2px solid #dfe0e0;
    background-color: #203864;
    color: white;
    padding: 5px 15px;   
    text-align: center; 
  }
  .display .tabelmutasi td, th {
    border: 2px solid #dfe0e0;    
    padding: 5px 15px;
  }
  .infoheadermutasi {
    text-align: left;
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
    margin-top:40px;
    }
    /* Force table to not be like tables anymore */
    #tabelAnggotaKoperasi table, #tabelAnggotaKoperasi thead, #tabelAnggotaKoperasi tbody, #tabelAnggotaKoperasi th, #tabelAnggotaKoperasi td, #tabelAnggotaKoperasi tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    #tabelAnggotaKoperasi thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    #tabelAnggotaKoperasi tr { border: 3px solid #ccc; }

    #tabelAnggotaKoperasi td {
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
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "Tanggal"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(3):before { content: "Kode"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Debit"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(5):before { content: "Kredit"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(6):before { content: "Saldo"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(3) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(5) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(6) { text-align: right;}
  }

  </style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  </br> 

<form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>CetakMutasi/pdf"> 

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">            
      <div class="panel-body">             

      <input type="hidden" value="<?php echo $result['data1'][0]['tabungan_id']?>" name="tabungan_id">
      <input type="hidden" value="<?php echo $result['data1'][0]['id']?>" name="anggotakoperasi_id">
      
        <div class="col-md-12">                  
          <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary btn-md">
          <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak</button>       
        </div>

      </div>
    </div>
  </div>
</div>
</form>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><h2 style="text-align: center;">Mutasi</h2></div>
          <div class="panel-body">

          <div class="col-sm-3 col-lg-5 widget-left">
            <div class="infoheadermutasi">
              ID Anggota : <?php echo $result['data1'][0]['idunik']?></br>
              Nama : <?php echo $result['data1'][0]['nama']?> </br>
              Koperasi : <?php echo $result['data1'][0]['koperasi']['nama']?>
            </div>
          </div>

          <!-- <table class="table table-bordered"> -->
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                <thead class="headermutasi">
                  <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Tanggal</th>  
                    <th rowspan="2">Kode</th>  
                    <th colspan="2">Mutasi</th>     
                    <th rowspan="2">Saldo</th>
                  </tr>
                  <tr>        
                    <th>Debit</th>  
                    <th>Kredit</th>    
                  </tr>
                </thead>
                <tbody class="tabelmutasi">
                    <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>
                      <tr>
                          <td><?php echo $no;$no++; ?></td>                             
                          <td><?php echo $row['tanggal']; ?></td>
                          <td><?php echo $row['kode']; ?></td>
                          <td><?php if($row['debit'] == '0'){
                              echo "&nbsp ";                               
                            }
                            else
                            {
                              echo "Rp ".number_format ($row['debit'], 2, ',', '.'); 
                            }
                          ?></td>
                          <td><?php if($row['kredit'] == '0'){
                              echo "&nbsp ";                               
                            }
                            else
                            {
                              echo "Rp ".number_format ($row['kredit'], 2, ',', '.'); 
                            }
                          ?></td>
                          <td><?php echo "Rp ".number_format ($row['saldo'], 2, ',', '.'); ?></td>               
                      </tr>
                    <?php } ?>           
                </tbody>              
          </table> 
          </div>
        </div>
      </div>
    </div><!--/.row-->  
</div>