<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet">  
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
</br>
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
  <form name="form3" id="form3" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Jurnal/kalkulasiJurnal">

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Kalkulasi Jurnal</div>
          <div class="panel-body">              

            <div class="col-md-6">                  
                <button href="#" id="kalkulasijurnal" type="submit" class="btn-lg btn-success" onclick="return confirm('Apakah Anda ingin Kalkulasi Jurnal periode ini?');">Kalkulasi Jurnal</button>          
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>

  <form name="form3" id="form3" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Jurnal/daftarPeriodeJurnal">

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Lihat Histori Jurnal : </div>
          <div class="panel-body">              

            <div class="col-md-3 form-group">                   
              <label>Tahun Operasi : </label>                    
                <select name="tahunoperasi" class="form-control" id="tahunoperasi_id">
                  <option>- Pilih Tahun Operasi -</option>
                    <?php foreach($tahun['data'] as $row){ ?>               
                      <option value="<?php echo $row['id'];?>"><?php echo $row['tanggalmulai'] ?>&nbsp;|&nbsp;<?php echo $row['tanggalselesai'] ?></option>
                    <?php } ?>
                </select>                
            </div>

            <div class="col-md-2" style="margin-top:25px">                  
                <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Lihat Histori</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>

<script type="text/javascript">
  $('#datetimepicker2').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd',        
  });

  $('#datetimepicker3').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd',        
  });
</script>