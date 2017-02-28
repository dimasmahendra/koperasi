<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    </br><!--/.row-->

    <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>SimpananPokok/insertSimpananPokok">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Tambah Simpanan Pokok</div>
              <div class="panel-body" style="margin-left: 20px">

                  <div class="row">                  
                      <div class="col-md-4 form-group">                   
                          <label>Anggota Koperasi</label>
                          <select name="ang" class="form-control" id="anggotakoperasi">
                              <option>- Pilih Nama Anggota -</option>
                              <?php foreach($anggota['data'] as $row){ ?>               
                                  <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                              <?php } ?>
                          </select>                
                      </div>                       
                  </div>
                                 
                  <div class="row"> 
                    <div class="col-md-4 form-group">
                      <label>Jumlah Simpanan Pokok</label>
                      <input type="text" id="biaya" name="jumlah" style="height: 34px;" class="form-control" required> 
                    </div>
                  </div>                                      

                  <div class="pull-right">                    
                    <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulangi</button>
                    <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>            
                  </div>

              </div>
            </div>
        </div>
    </form>    
</div>

<script type="text/javascript">

  $("#anggotakoperasi").change(function (){
      var url = "<?php echo site_url('Simpanan/cekSimpanan');?>/"+$(this).val();
      $('#jenis_simpanan').load(url);
      return false;
    });
</script>