<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>
<style type="text/css">

.logo img {
  height: 100%;
  width: 100%;
}

@media (max-width: 978px) {
    body {
      margin-top:40px;
    }
}

@media (max-width: 767px) {
  .logo img {
    width: 100%;
    height: 400px;
    background-size: 100% 100%;
    object-fit: cover;
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
      </div>
    <?php } ?>

      <?php if($this->session->flashdata('error')){?> 
        <div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
            <?php echo $this->session->flashdata('error')?> 
        </div>
      <?php } ?>

    <div class="logo">          
      <img src="<?= base_url('asset_admin/logodashboard.png') ?>" alt="logotop">
    </div> 
 
  </div>  <!--/.main-->

<script>
  $('.logo img').bind('contextmenu', function(e){
      return false;
  });
</script>

</body>
</html>
