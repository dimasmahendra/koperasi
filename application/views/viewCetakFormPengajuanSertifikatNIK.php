<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="panel-body">
  <h5 id="tgl_now"> <?php echo $tgldoc;  ?> </h5>
  <table class="kepala">
    <thead>
      <tr>
        <td></td>
        <td></td>
        <td width="30%" id="isi"><h2>NIK : <?php echo $myKoperasi['nomorinduk'];?></h2></td>
      </tr>
    </thead>
  </table>
  <h2 id=jdul_form>FORM PENGAJUAN SERTIFIKAT NOMOR INDUK KOPERASI (NIK)</h2>
  <?php
  if (empty($myKoperasi['notaris'])){
            $myKoperasi['notaris'] = "-";
  }
  if (empty($myKoperasi['camat'])){
            $myKoperasi['camat'] = "-";
  }
  if (empty($myKoperasi['notarispad'])){
            $myKoperasi['notarispad'] = "-";
  }
  if (empty($myKoperasi['camatpad'])){
            $myKoperasi['camatpad'] = "-";
  }
  if (empty($myKoperasi['telepon'])){
            $myKoperasi['telepon'] = "-";
  }
  if (empty($myKoperasi['fax'])){
            $myKoperasi['fax'] = "-";
  }
  ?>
  <h4>A. IDENTITAS KOPERASI</h4>
  <table id="table1" class="border_td">
    <tbody>
      <tr>
        <td><b>1. </b></td>
        <td><b>Nama Koperasi (Nama Lengkap)</b></td>
        <td><b>:</b></td>
        <td colspan="4"><?php echo $myKoperasi['nama']; ?></td>
      </tr>
      <tr>
        <td><b>2. </b></td>
        <td><b>Nomor / Tanggal Badan Hukum (BH)</b></td>
        <td><b>:</b></td>
        <td><?php echo $myKoperasi['nomorbh']; ?></td>
        <td class="right"><b>Tanggal BH</b></td>
        <td><b>:</b></td>
        <?php
        $tglbh = substr($myKoperasi['tanggalbh'],8);
        $blnbh = substr($myKoperasi['tanggalbh'],5,-3);
        $thnbh = substr($myKoperasi['tanggalbh'],0,4);
        ?>
        <td><?php echo $tglbh; ?>/<?php echo $blnbh; ?>/<?php echo $thnbh; ?></td>
      </tr>
      <tr>
        <td><b>3. </b></td>
        <td><b>Lembaran Berita Negara RI (BH)</b></td>
        <td><b>:</b></td>
        <td><b>Nomor :</b> <?php echo $myKoperasi['nolembaran']; ?></td>
        <td class="right"><b>Tanggal</b></td>
        <td><b>:</b></td>
        <?php
        $tgll = substr($myKoperasi['tgllembaran'],8);
        $blnl = substr($myKoperasi['tgllembaran'],5,-3);
        $thnl = substr($myKoperasi['tgllembaran'],0,4);
        ?>
        <td><?php echo $tgll; ?>/<?php echo $blnl; ?>/<?php echo $thnl; ?> </td>
      </tr>
      <tr>
        <td><b>4. </b></td>
        <td><b>Pengesahan Badan Hukum Koperasi (oleh)</b></td>
        <td><b>:</b></td>
        <td colspan="4"><?php echo $myKoperasi['pemberibadanhukum']; ?></td>
      </tr>
      <tr>
        <td><b>5. </b></td>
        <td><b>Tempat Kedudukan Koperasi</b></td>
        <td><b>:</b></td>
        <td colspan="4"><?php echo $myKoperasi['t4KedudukanKop']; ?></td>
      </tr>
      <tr>
        <td><b>6. </b></td>
        <td><b>Notaris/Camat Pembuat Akta Koperasi</b></td>
        <td><b>:</b></td>
        <td colspan="4"><?php echo $myKoperasi['notaris']; ?></td>
      </tr>
      <tr>
        <td><b>7. </b></td>
        <td><b>Nomor / Tanggal PAD</b></td>
        <td><b>:</b></td>
        <td><?php echo $myKoperasi['nomorpad']; ?></td>
        <td class="right"><b>Tanggal PAD</b></td>
        <td><b>:</b></td>
        <?php
        $tglpad = substr($myKoperasi['tanggalpad'],8);
        $blnpad = substr($myKoperasi['tanggalpad'],5,-3);
        $thnpad = substr($myKoperasi['tanggalpad'],0,4);
        ?>
        <td><?php echo $tglpad; ?>/<?php echo $blnpad; ?>/<?php echo $thnpad; ?> </td>
      <tr>
        <td><b>8. </b></td>
        <td><b>Lembaran Berita Negara RI (PAD)</b><br><h5>(Perubahan Anggaran Dasar)</h5></td>
        <td><b>:</b></td>
        <td><b>Nomor :</b> <?php echo $myKoperasi['tanggalpad']; ?></td>
        <td class="right"><b>Tanggal</b></td>
        <td><b>:</b></td>
        <?php
        $tgllpad = substr($myKoperasi['tanggallembaran'],8);
        $blnlpad = substr($myKoperasi['tanggallembaran'],5,-3);
        $thnlpad = substr($myKoperasi['tanggallembaran'],0,4);
        ?>
        <td><?php echo $tgllpad; ?>/<?php echo $blnlpad; ?>/<?php echo $thnlpad; ?> </td>
      </tr>
      <tr>
        <td><b>9. </b></td>
        <td><b>Notaris/Camat Pembuat PAD</b></td>
        <td><b>:</b></td>
        <td colspan="4"><?php echo $myKoperasi['notarispad']; ?></td>
      </tr>
      <tr>
        <td><b>10. </b></td>
        <td><b>Jangka Waktu Pendirian</b></td>
        <td><b>:</b></td>
        <?php
        $tgljk = substr($myKoperasi['jangkawaktu'],8);
        $blnjk = substr($myKoperasi['jangkawaktu'],5,-3);
        $thnjk = substr($myKoperasi['jangkawaktu'],0,4);
        ?>
        <td colspan="4"><?php echo $tgljk; ?>/<?php echo $blnjk; ?>/<?php echo $thnjk; ?> </td>
      </tr>
      <tr>
        <td><b>11. </b></td>
        <td><b>NPWP (15 Digit)</b></td>
        <td><b>:</b></td>
        <td colspan="4"><?php echo $npwp['a']; ?>  <?php echo $npwp['b']; ?>  <?php echo $npwp['c']; ?>  <?php echo $npwp['d']; ?>  <?php echo $npwp['e']; ?>  <?php echo $npwp['f']; ?></td>
      </tr>
    </tbody>
  </table>

  <BR>
  <H4>B. ALAMAT LENGKAP</H4>

  <table id="table2" class="border_td">
    <tbody>
      <tr>
        <td><b>12. </b></td>
        <td><b>Alamat / Jalan</b></td>
        <td><b>:</b></td>
        <td class="capitalize"><?php echo $myKoperasi['t4KedudukanKop']; ?></td>
      </tr>
      <tr>
        <td><b>13. </b></td>
        <td><b>Kelurahan / Desa</b></td>
        <td><b>:</b></td>
        <td class="capitalize"><?php echo $myKoperasi['kelurahan_nama']; ?></td>
      </tr>
      <tr>
        <td><b>14. </b></td>
        <td><b>Kecamatan</b></td>
        <td><b>:</b></td>
        <td class="capitalize"><?php echo $myKoperasi['kecamatan_nama']; ?></td>
      </tr>
      <tr>
        <td><b>15. </b></td>
        <td><b>Kabupaten / Kota</b></td>
        <td><b>:</b></td>
        <td class="capitalize"><?php echo $myKoperasi['kabupatenkota_nama']; ?></td>
      </tr>
      <tr>
        <td><b>16. </b></td>
        <td><b>Provinsi / D.I.</b></td>
        <td><b>:</b></td>
        <td class="capitalize"><?php echo $myKoperasi['provinsi_nama']; ?></td>
      </tr>
      <tr>
        <td><b>17. </b></td>
        <td><b>Kodepos</b></td>
        <td><b>:</b></td>
        <td><?php echo $myKoperasi['kodepos']; ?></td>
      </tr>
      <tr>
        <td><b>18. </b></td>
        <td><b>No. Telp / Fax</b></td>
        <td><b>:</b></td>
        <td><?php echo $myKoperasi['telepon'].' / '.$myKoperasi['fax']; ?></td>
      </tr>
      <tr>
        <td><b>19. </b></td>
        <td><b>E-mail</b></td>
        <td><b>:</b></td>
        <td><?php echo $myKoperasi['email']; ?></td>
      </tr>
      <tr>
        <td><b>20. </b></td>
        <td><b>Website</b></td>
        <td><b>:</b></td>
        <td><?php echo $myKoperasi['website']; ?></td>
      </tr>
    </tbody>
  </table>

  <table id="page1" class="display page_bottom" cellspacing="0" width="100%">
                        <tbody>
                                <tr>
                                  <td>Page 1 </td>
                                </tr>
                        </tbody>
</table>

  <h4 id="c">C. DATA LAINNYA <i>(wajib diisi)</i></h4>

  <table id="table3" class="border_td">
    <tbody>
      <tr>
        <td><b>12. </b></td>
        <td><b>Bentuk Koperasi <br><i>(pilih salah satu)</i></b></td>
        <td><b>:</b></td>
        <td><input type="checkbox" <?php if($myKoperasi['bentukkoperasi_id']=="1"){echo 'checked="checked" ><b>1. Primer Nasional</b>';}else{ echo '>1. Primer Nasional';}?></td>
        <td><input type="checkbox" <?php if($myKoperasi['bentukkoperasi_id']=="2"){echo 'checked="checked" ><b>2. Primer Provinsi</b>';} else{ echo '>2. Primer Provinsi';}?></td>
        <td><input type="checkbox" <?php if($myKoperasi['bentukkoperasi_id']=="3"){echo 'checked="checked" ><b>3. Primer Kab/Kota</b>';}else{ echo '>3. Primer Kab/Kota</b>';}?></td>
        <td colspan="2"><input type="checkbox" <?php if($myKoperasi['bentukkoperasi_id']=="4"){echo 'checked="checked" ><b>4. Sekunder Nasional</b>';}else{ echo '>4. Sekunder Nasional';}?></td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td><input type="checkbox" <?php if($myKoperasi['bentukkoperasi_id']=="5"){echo 'checked="checked" ><b>5. Sekunder Provinsi</b>';}else{ echo '>5. Sekunder Provinsi';}?></td>
        <td colspan="4"><input type="checkbox" <?php if($myKoperasi['bentukkoperasi_id']=="6"){echo 'checked="checked" ><b>6. Sekunder Kab/Kota</b>';}else{ echo '>6. Sekunder Kab/Kota';}?></td>
      </tr>
      <tr>
        <td><b>13. </b></td>
        <td><b>Jenis Koperasi <br><i>(pilih salah satu)</i></b></td>
        <td><b>:</b></td>
        <td><input type="checkbox" <?php if($myKoperasi['tipekoperasi_id']=="1"){echo 'checked="checked" ><b>1. Produsen</b>';}else{echo '>1. Produsen';}?></td>
        <td><input type="checkbox" <?php if($myKoperasi['tipekoperasi_id']=="2"){echo 'checked="checked" ><b>2. Pemasaran</b>';}else{echo '>2. Pemasaran';}?></td>
        <td><input type="checkbox" <?php if($myKoperasi['tipekoperasi_id']=="3"){echo 'checked="checked" ><b>3. Konsumen</b>';}else{echo '>3. Konsumen';}?></td>
        <td><input type="checkbox" <?php if($myKoperasi['tipekoperasi_id']=="4"){echo 'checked="checked" ><b>4. Jasa</b>';}else{echo '>4. Jasa';}?></td>
        <td><input type="checkbox" <?php if($myKoperasi['tipekoperasi_id']=="5"){echo 'checked="checked" ><b>5. Simpan Pinjam</b>';}else{echo '>5. Simpan Pinjam';}?></td>
      </tr>
      <tr>
        <td><b>14. </b></td>
        <td><b>Kelompok Koperasi</b></td>
        <td><b>:</b></td>
        <td colspan="5"><?php echo $myKoperasi['kelompok']; ?></td>
      </tr>
      <tr>
        <td><b>15. </b></td>
        <td><b>Sektor Usaha</b></td>
        <td><b>:</b></td>
        <td colspan="5"><?php echo $myKoperasi['sektor']; ?></td>
      </tr>
      <tr>
        <td><b>16. </b></td>
        <td><b>Koperasi Binaan <br><i>(pilih salah satu)</i></b></td>
        <td><b>:</b></td>
        <td><input type="checkbox" <?php if($myKoperasi['binaan']=="Nasional"){echo 'checked="checked" ><b>Nasional</b>';}else{echo ">Nasional";}?></td>
        <td><input type="checkbox" <?php if($myKoperasi['binaan']=="Provinsi"){echo 'checked="checked" ><b>Provinsi</b>';}else{echo ">Provinsi";}?></td>
        <td colspan="3"><input type="checkbox" <?php if($myKoperasi['binaan']=="Kabupaten/Kota"){echo 'checked="checked" ><b>Kabupaten/Kota</b>';}else{echo ">Kabupaten/Kota";}?></td>        
      </tr>
    </tbody>
  </table>

  <br>
  <h3>SUSUNAN KEPENGURUSAN</h3>
  <h4>KETUA KOPERASI</h4>
    <table id="tabelKetKop" class="display" cellspacing="0" width="100%">
      <thead class="headerrs">
        <tr>
          <th rowspan="2" width="5%">Tahun</th>
          <th colspan="3" class="text-center">Ketua 1</th> 
          <th colspan="3" class="text-center">Ketua 2</th>                                             
          <th colspan="3" class="text-center">Ketua 3</th>                                             
        </tr>
        <tr>        
          <th width="20%">Nama</th>  
          <th width="8%">Telepon</th>
          <th>Pendidikan</th>
          <th width="20%">Nama</th>  
          <th width="8%">Telepon</th>
          <th>Pendidikan</th>
          <th width="20%">Nama</th>  
          <th width="8%">Telepon</th>
          <th>Pendidikan</th>
        </tr>                       
      </thead>
      <tbody style="text-align: center">
        <tr>
          <td><?php echo substr($myPengurusKoperasi['ketua1_tahun1']['jabatan'],0,4)?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun1']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun1']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun1']['pendidikan']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun1']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun1']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun1']['pendidikan']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun1']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun1']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun1']['pendidikan']?></td>
        </tr>
        <tr>
          <td><?php echo substr($myPengurusKoperasi['ketua1_tahun2']['jabatan'],0,4)?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun2']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun2']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun2']['pendidikan']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun2']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun2']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun2']['pendidikan']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun2']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun2']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun2']['pendidikan']?></td>
        </tr>
        <tr>
          <td><?php echo substr($myPengurusKoperasi['ketua1_tahun3']['jabatan'],0,4)?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun3']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun3']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua1_tahun3']['pendidikan']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun3']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun3']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua2_tahun3']['pendidikan']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun3']['nama']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun3']['telepon']?></td>
          <td><?php echo $myPengurusKoperasi['ketua3_tahun3']['pendidikan']?></td>
        </tr>
      </tbody>              
    </table> 

<h4>SEKRETARIS</h4>
  <table id="tabelSekret" class="display" cellspacing="0" width="100%">
    <thead class="headerrs">
      <tr>
        <th rowspan="2" width="5%">Tahun</th>
        <th colspan="3" class="text-center">Sekretaris 1</th> 
        <th colspan="3" class="text-center">Sekretaris 2</th>                                             
        <th colspan="3" class="text-center">Sekretaris 3</th>                                             
      </tr>
      <tr>        
        <th width="20%">Nama</th>  
        <th width="8%">Telepon</th>
        <th>Pendidikan</th>
        <th width="20%">Nama</th>  
        <th width="8%">Telepon</th>
        <th>Pendidikan</th>
        <th width="20%">Nama</th>  
        <th width="8%">Telepon</th>
        <th>Pendidikan</th>
      </tr>                       
    </thead>
    <tbody>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['sekretaris1_tahun1']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun1']['pendidikan']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun1']['pendidikan']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun1']['pendidikan']?></td>
    </tr>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['sekretaris1_tahun2']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun2']['pendidikan']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun2']['pendidikan']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun2']['pendidikan']?></td>
    </tr>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['sekretaris1_tahun3']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris1_tahun3']['pendidikan']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris2_tahun3']['pendidikan']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['sekretaris3_tahun3']['pendidikan']?></td>
    </tr>
    </tbody>              
  </table>
  <table id="page2" class="display page_bottom" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td>2</td>
      </tr>
    </tbody>
  </table>
<h4 id="bendahara">BENDAHARA</h4>
<table id="tabelBndahra" class="display" cellspacing="0" width="100%">
  <thead class="headerrs">
    <tr>
      <th rowspan="2" width="5%">Tahun</th>
      <th colspan="2" class="text-center">Bendahara 1</th> 
      <th colspan="2" class="text-center">Bendahara 2</th>                                             
      <th colspan="2" class="text-center">Bendahara 3</th>                                             
    </tr>
    <tr>        
      <th width="25%">Nama</th>  
      <th>Telepon</th>                        
      <th width="25%">Nama</th>  
      <th>Telepon</th>                        
      <th width="25%">Nama</th>  
      <th>Telepon</th>                        
    </tr>                       
  </thead>
  <tbody>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['bendahara1_tahun1']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['bendahara1_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara1_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara2_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara2_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara3_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara3_tahun1']['telepon']?></td>
    </tr>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['bendahara1_tahun2']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['bendahara1_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara1_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara2_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara2_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara3_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara3_tahun2']['telepon']?></td>
    </tr>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['bendahara1_tahun3']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['bendahara1_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara1_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara2_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara2_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara3_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['bendahara3_tahun3']['telepon']?></td>
    </tr>
  </tbody>              
</table> 
<br><h4>PENGAWAS</h4>
<table id="tabelPgwas" class="display" cellspacing="0" width="100%">
  <thead class="headerrs">
    <tr>
      <th rowspan="2" width="5%">Tahun</th>
      <th colspan="2" class="text-center">Ketua Pengawas</th>
      <th colspan="2" class="text-center">Anggota 1</th>
      <th colspan="2" class="text-center">Anggota 2</th>
    </tr>
    <tr>        
      <th width="25%">Nama</th>  
      <th>Telepon</th>                        
      <th width="25%">Nama</th>  
      <th>Telepon</th>                        
      <th width="25%">Nama</th>  
      <th>Telepon</th>
    </tr>                       
  </thead>
  <tbody>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['ketuapengawas_tahun1']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['ketuapengawas_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['ketuapengawas_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['anggota1_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['anggota1_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['anggota2_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['anggota2_tahun1']['telepon']?></td>
    </tr>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['ketuapengawas_tahun2']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['ketuapengawas_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['ketuapengawas_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['anggota1_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['anggota1_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['anggota2_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['anggota2_tahun2']['telepon']?></td>
    </tr>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['ketuapengawas_tahun3']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['ketuapengawas_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['ketuapengawas_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['anggota1_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['anggota1_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['anggota2_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['anggota2_tahun3']['telepon']?></td>
    </tr>
  </tbody>            
</table> 
<br><h4>MANAGER</h4>
<table id="tabelMnager" class="display" cellspacing="0" width="100%">
  <thead class="headerrs">
    <tr>
      <th rowspan="2" width="5%">Tahun</th>
      <th colspan="2" class="text-center">Manager 1</th> 
      <th colspan="2" class="text-center">Manager 2</th>                                             
      <th colspan="2" class="text-center">Manager 3</th>                                             
    </tr>
    <tr>        
      <th width="25%">Nama</th>  
      <th>Telepon</th>                        
      <th width="25%">Nama</th>  
      <th>Telepon</th>                        
      <th width="25%">Nama</th>  
      <th>Telepon</th>                       
    </tr>                       
  </thead>
  <tbody>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['manajer1_tahun1']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['manajer1_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer1_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['manajer2_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer2_tahun1']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['manajer3_tahun1']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer3_tahun1']['telepon']?></td>
    </tr>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['manajer1_tahun2']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['manajer1_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer1_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['manajer2_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer2_tahun2']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['manajer3_tahun2']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer3_tahun2']['telepon']?></td>
    </tr>
    <tr>
      <td><?php echo substr($myPengurusKoperasi['manajer1_tahun3']['jabatan'],0,4)?></td>
      <td><?php echo $myPengurusKoperasi['manajer1_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer1_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['manajer2_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer2_tahun3']['telepon']?></td>
      <td><?php echo $myPengurusKoperasi['manajer3_tahun3']['nama']?></td>
      <td><?php echo $myPengurusKoperasi['manajer3_tahun3']['telepon']?></td>
    </tr>
  </tbody>              
</table>

<table id="page3" class="display page_bottom" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td>3</td>
    </tr>
  </tbody>
</table>

<br>
<h3 id="ik">INDIKATOR KELEMBAGAAN</h3>
  <table id="tabelIndikatorKelembagaan" class="display" cellspacing="0" width="100%">
    <thead class="headerrs">
      <tr>
        <th rowspan="2" width="5%">Tahun</th>
        <th colspan="3" class="text-center">Anggota(orang)</th>
        <th colspan="3" class="text-center">Karyawan(orang)</th>
        <th colspan="3" class="text-center">Manajer(orang)</th>
        <th rowspan="2" class="text-center">Tanggal RAT</th>
      </tr>
      <tr>        
        <th>Pria</th>  
        <th>Wanita</th>
        <th>Jumlah</th>
        <th>Pria</th>  
        <th>Wanita</th>
        <th>Jumlah</th>
        <th>Pria</th>  
        <th>Wanita</th>
        <th>Jumlah</th>                       
      </tr>                       
    </thead>
    <tbody>
      <tr>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['tahun']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalAnggotaPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalAnggotaWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalAnggotaPria']+$myKoperasi['indikatorkelembagaan_tahun1']['totalAnggotaWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalKaryawanPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalKaryawanWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalKaryawanPria']+$myKoperasi['indikatorkelembagaan_tahun1']['totalKaryawanWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalManajerPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalManajerWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalManajerPria']+$myKoperasi['indikatorkelembagaan_tahun1']['totalManajerWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['tanggalRat']?></td>
      </tr>
      <tr>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['tahun']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalAnggotaPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalAnggotaWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalAnggotaPria']+$myKoperasi['indikatorkelembagaan_tahun2']['totalAnggotaWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalKaryawanPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalKaryawanWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalKaryawanPria']+$myKoperasi['indikatorkelembagaan_tahun2']['totalKaryawanWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalManajerPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalManajerWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalManajerPria']+$myKoperasi['indikatorkelembagaan_tahun2']['totalManajerWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['tanggalRat']?></td>
      </tr>
      <tr>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['tahun']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalAnggotaPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalAnggotaWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalAnggotaPria']+$myKoperasi['indikatorkelembagaan_tahun3']['totalAnggotaWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalKaryawanPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalKaryawanWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalKaryawanPria']+$myKoperasi['indikatorkelembagaan_tahun3']['totalKaryawanWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalManajerPria']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalManajerWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalManajerPria']+$myKoperasi['indikatorkelembagaan_tahun3']['totalManajerWanita']?></td>
        <td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['tanggalRat']?></td>
      </tr>
    </tbody>              
  </table>

<br>
<h3>INDIKATOR USAHA</h3>
<table id="tabelIndikatorUsaha" class="display" cellspacing="0" width="100%">
  <thead class="headerrs">                         
    <tr>        
      <th width="5%">Tahun</th>  
      <th>Modal Sendiri</th>
      <th>Modal Luar</th>
      <th>Asset</th>  
      <th>Volume Usaha</th>
      <th>Selisih Hasil Usaha</th>                      
    </tr>                       
  </thead>
  <tbody>
    <tr>
      <td><?php echo $myKoperasi['indikatorusaha_tahun1']['tahun']?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['modalsendiri']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['modalluar']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['asset']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['volumeusaha']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['selisihhasilusaha']); ?></td>
    </tr>  
    <tr>
      <td><?php echo $myKoperasi['indikatorusaha_tahun2']['tahun']?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['modalsendiri']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['modalluar']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['asset']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['volumeusaha']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['selisihhasilusaha']); ?></td>
    </tr>
    <tr>
      <td><?php echo $myKoperasi['indikatorusaha_tahun3']['tahun']?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['modalsendiri']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['modalluar']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['asset']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['volumeusaha']); ?></td>
      <td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['selisihhasilusaha']); ?></td>
    </tr>
  </tbody>              
</table>
<br>
<table id="mengetahui" class="display" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td  colspan="2" class="right capitalize"><?php echo $kabkota; ?>, <?php echo $today;?></td>
    </tr>
    <tr>        
      <td  colspan="2" class="left">Mengetahui,</td>
    </tr>
    <tr>        
      <td colspan="2"></td>
    </tr>
    <tr>        
      <td  class="left capitalize"><?php echo $myPengurusKoperasi['sekretaris1_tahun3']['nama'];?><br>Sekretaris</td>
      <td  class="right capitalize"><?php echo $myPengurusKoperasi['ketua1_tahun3']['nama']?><br>Ketua</td>
    </tr>
  </tbody>
</table>

<table id="page4" class="display page_bottom" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td>4</td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>