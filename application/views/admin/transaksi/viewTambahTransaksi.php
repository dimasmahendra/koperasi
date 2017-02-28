<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header" style="font-weight: 500;">Transaksi</h1>       
      </div>
    </div><!--/.row-->

          <!-- Tabel Inputan Transaksi -->
          <form name="form3" id="form3" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Transaksi/tambahTransaksi">

            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Buat Transaksi Baru</div>
                  <div class="panel-body">              

                    <div class="col-md-6">                  
                        <button href="#" id="btnTrans" type="submit" class="btn btn-primary">Transaksi</button>       
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </form>

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
</div>

</body>
</html>


            
        