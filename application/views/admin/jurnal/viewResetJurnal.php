<style type="text/css">
  @media (max-width: 767px) {
      body {
        margin-top:27px;
      }
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
  <form name="form3" id="form3" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Jurnal/resetJurnal">

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Reset Jurnal</div>
          <div class="panel-body">              

            <div class="col-md-6">                  
                <button href="#" id="kalkulasijurnal" type="submit" class="btn-lg btn-warning" onclick="return confirm('Apakah Anda ingin Reset Jurnal periode ini?');">Reset Jurnal</button>          
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>