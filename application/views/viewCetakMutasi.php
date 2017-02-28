<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
     
<div class="panel-body">
  <BR>
  <H2 style="text-align: center;">Mutasi</H2>
  <div class="col-sm-3 col-lg-5 widget-left">
    <div class="infoheadermutasi">
      ID Anggota : <?php echo $result['data1'][0]['idunik']?><BR>
      Nama : <?php echo $result['data1'][0]['nama']?> <BR>
      Koperasi : <?php echo $result['data1'][0]['koperasi']['nama']?>
    </div>
  </div>
  <BR>
  
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
                      echo " ";                               
                    }
                    else
                    {
                      echo "Rp.".number_format ($row['debit'], 2, ',', '.'); 
                    }
                  ?></td>
                  <td><?php if($row['kredit'] == '0'){
                      echo " ";                               
                    }
                    else
                    {
                      echo "Rp.".number_format ($row['kredit'], 2, ',', '.'); 
                    }
                  ?></td>
                  <td><?php echo "Rp.".number_format ($row['saldo'], 2, ',', '.'); ?></td>               
              </tr>
            <?php } ?>            
        </tbody>              
  </table>
</div>
</body>
</html>