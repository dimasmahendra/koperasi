<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

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
</br><!--/.row-->
<?php if($this->session->flashdata('message')){?> 
          <div class="alert bg-success" role="alert">
            <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
            <?php echo $this->session->flashdata('message')?> 
          </div><?php } ?>

  <?php if($this->session->flashdata('error')){?> 
        <div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
          <?php echo $this->session->flashdata('error')?> 
        </div><?php } ?>

    <!-- Tabel Inputan Transaksi -->
    <form name="form3" id="form3" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>SHU/resetSHU">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">Reset Kalkulasi SHU</div>
            <div class="panel-body">              

              <div class="col-md-6">                  
                  <button href="#" id="kalkulasijurnal" type="submit" class="btn-lg btn-warning" onclick="return confirm('Apakah Anda ingin Reset Kalkulasi SHU periode ini?');">Reset SHU</button>          
              </div>

            </div>
          </div>
        </div>
      </div>
    </form>
</div>