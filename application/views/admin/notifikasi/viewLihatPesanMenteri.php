<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>
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
    </br>
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <?php echo $judul; ?>
          </div>
          <div class="panel-body">
            <h5><b>Isi Pesan :</b><h5>
            <p><?php echo $isi; ?></p>
          </div>
        </div>
 
        <div class="pull-right">  
          <button class="btn btn-primary"><a style="color:white" href="<?php echo base_url(); ?>Notifikasi/daftarNotifikasi">Kembali</a></button>
        </div>
    </div> 

         
      
</div>
</div>

</body>
</html>



            
        