<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
     
<div class="panel-body">
  <BR>
  <H2 style="text-align: center;">Laporan Transaksi</H2>
  <BR>
  
  <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
        <thead class="headermutasi">
          <tr>
            <th>No</th>
            <th>Nomor Faktur</th>
            <th>Nama Anggota</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Metode</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="tabelmutasi">
            <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['nomorfaktur']; ?></td>
                                <td><?php if($row['anggotakoperasi']['nama'] == ''){echo 'No Name';}else{echo $row['anggotakoperasi']['nama'];} ?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                                <td><?php echo "Rp ".number_format ($row['jumlah'], 2, ',', '.'); ?></td>
                                <td><?php echo $row['metode']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                    <?php } ?>            
        </tbody>              
  </table>
</div>
</body>
</html>