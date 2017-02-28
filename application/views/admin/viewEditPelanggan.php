<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" style="font-weight: 500;">Pelanggan Koperasi</h1>
      </div>
    </div><!--/.row-->   

      <!-- Tabel inputan user admin -->
      <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Pelanggan/updatePelanggan">    

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Edit Pelanggan</div>
          <div class="panel-body" style="margin-left: 20px">              

              <div>
                <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="pelanggan_id"></input>
              </div>

              <div>
                <input type="hidden" value="<?php echo $koperasi_id; ?>" name="koperasi_id"></input>
              </div>

              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Nama Pelanggan</label>
                  <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $nama;?>" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 form-group">
                  <label>Alamat Pelanggan</label>
                  <input name="alamat" type="text" id="alamat" class="form-control" value="<?php echo $alamat;?>" required>
                </div>   
              </div>

              <div class="row row-table">
                  <div class="col-md-2 form-group">                   
                      <label>Provinsi</label>                    
                      <select name="prov" class="form-control" id="provinsi">
                          <option>- Select Provinsi -</option>
                          <?php foreach($hasil['data'] as $row){ ?>               
                              <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                          <?php } ?>
                      </select>                
                  </div>
                  <div class="col-md-2 col-table">
                      <label>Kabupaten/Kota</label>                       
                      <select name="kab" class="form-control" id="kabupatenkota">
                          <option value=''>Select Kabupaten</option>
                      </select>               
                  </div>
                  <div class="col-md-2 form-group">                   
                        <label>Kecamatan</label>                     
                        <select name="kec" class="form-control" id="kecamatan">
                            <option>Select Kecamatan</option>
                        </select>
                  </div>
                  <div class="col-md-2 col-table">
                      <label>Kelurahan</label>
                      <select name="lurah" class="form-control" id="kelurahan">
                          <option>Select Kelurahan</option>
                      </select>           
                  </div>             
              </div></br>

              <div class="row">
                <div class="col-md-2 form-group">
                  <label>Telepon Pelanggan</label>
                  <input type="text" id="telepon" name="telepon" class="form-control" value="<?php echo $telepon;?>" required>
                </div>
              </div>                      

              <div class="row"> 
                <div class="col-md-4 form-group">
                  <label>Email Pelanggan</label>
                  <input type="email" id="email" name="email" class="form-control" value="<?php echo $email;?>" required>
                </div>
              </div>                                        
                      
                <div>                  
                    <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Save</button>          
                    <button class="btn btn-default"><a href="<?php echo base_url(); ?>Pelanggan/daftarPelanggan">Cancel</a></button> 
                </div>          
          </div>
      </div>
    </div>
  </form>
      
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#provinsi").change(function (){
      var url = "<?php echo site_url('Pelanggan/kabupatenkota');?>/"+$(this).val();
      $('#kabupatenkota').load(url);
      $('#kecamatan').html('<option value="">--Pilih Kecamatan--</option>');
      $('#kelurahan').html('<option value="">--Pilih Kelurahan--</option>');          
      return false;
    })
    $("#kabupatenkota").change(function (){
      var url = "<?php echo site_url('Pelanggan/kecamatan');?>/"+$(this).val();
      $('#kecamatan').load(url);
      return false;
    })
    $("#kecamatan").change(function (){
      var url = "<?php echo site_url('Pelanggan/kelurahan');?>/"+$(this).val();
      $('#kelurahan').load(url);
      return false;
    })
  });
</script>

            
        