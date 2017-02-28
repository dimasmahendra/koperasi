<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>

<style type="text/css">
@media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

    body{
      margin-top: 27px;
    }
}
</style>

</head>
<body>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" style="font-weight: 500;">Training Kementerian</h1>
      </div>
    </div><!--/.row-->

    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <?php echo $judul; ?>
          </div>
          <div class="panel-body">
                
              <?php if($foto==''|$foto=='no_image.png'){ ?>
                <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-thumbnail" width="200" height="200">
                <?php } else { ?>

                <img src ="<?php echo URL_IMG ?>/images/trainingkementerian/thumb_<?php echo $foto; ?>" rel="stylesheet" class="img-thumbnail" width="200" height="200">
                <?php  } ?>

            <h5><b>Lokasi : <?php echo $tempat; ?></b><h5>
            <h5><b>Tanggal : <?php echo $tanggal; ?></b><h5>
            <h5><b>Durasi : <?php echo $durasi; ?></b><h5>
            <h5><b>Kapasitas : <?php echo $kapasitas; ?></b><h5>
                   

            <h5><b>Isi Training :</b><h5>
            <p><?php echo $isi; ?></p>

            <div class="pull-right">  
              <a class="btn btn-primary" style="color:white" href="<?php echo base_url(); ?>TrainingMenteri/daftarTrainingMenteri">Kembali</a>
            </div>
          </div>          
        </div>      
    </div>     
</div>
</div>

</body>
</html>