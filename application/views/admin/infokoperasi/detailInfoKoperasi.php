<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<style>

  .viewer {
    margin-top: 20px;
    margin-bottom: 40px;
  }
  .komentar {
    margin-top: 20px;
    margin-bottom: 40px;
  }
  .paragraph2 {
    margin-top: -10px;  
  }
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">    
    </br><!--/.row-->
    <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>infoKoperasi/updateInfoKoperasi">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Detail Informasi Koperasi</div>
              <div class="panel-body" style="margin-left: 20px">

                <div class="row">
                  <div class="col-md-4">
                    <?php if($foto ==''|$foto =='no_image.png'){ ?>
                    <img src="<?php echo URL_IMG ?>images/no_image.png" alt="..." class="img-responsive img-thumbnail">
                    <?php } else { ?>
                    <img src="<?php echo URL_IMG ?>images/infokoperasi/<?php echo $foto; ?>" alt="..." class="img-responsive img-thumbnail">                  
                    <?php  } ?>
                  </div>
                  <div class="col-md-8">
                    <h4><strong><?php echo $judul; ?></strong></h4>
                    <p>
                      <?php echo substr($isi, 0, 1413); ?>
                    </p>  
                  </div>
                  <div class="col-md-12">
                    <p class="paragraph2">
                      <?php echo substr($isi, 1413); ?>
                    </p> 
                  </div>
                </div>

                <div class="viewer">
                    <p><strong>Dilihat oleh : </strong></p>
                    <?php 
                    if ($viewer['status'] == '1') {
                      foreach ($viewer['data'] as $row) { ?>
                      <span class="label label-default"><?php echo $row['nama']; ?></span>
                    <?php } }?>
                </div>

                <div class="komentar">
                  <p><strong>Komentar : </strong></p>
                  <?php foreach ($komentar['data'] as $row) { ?>
                  
                  <div class="col-md-1">
                    <?php if($row['foto'] ==''|$row['foto'] =='no_image.png'){ ?>
                    <img src="<?php echo URL_IMG ?>images/no_image.png" alt="Responsive image" style="width:100px; height: 50px;" class="img-responsive img-thumbnail">
                    <?php } else { ?>
                    <img src="<?php echo URL_IMG ?>images/anggotakoperasi/<?php echo $row['foto']; ?>" alt="Responsive image" class="img-responsive img-thumbnail">                  
                    <?php  } ?>
                  </div>
                  <div class="col-md-11">
                    <h4><?php echo $row['nama_anggota']; ?></h4>
                    <p><?php echo $row['komentar']; ?></p>
                  </div>
                  <?php  }?>
                </div>
               
                  <a href="<?php echo base_url(); ?>index.php/infoKoperasi/daftarInfoKoperasi "><button type="button" class="btn btn-default pull-right">Kembali</button></a>                  
                </div>
              </div>
            </div>
        </div>
    </form>    
</div>