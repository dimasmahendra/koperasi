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
    </br><!--/.row-->
      <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Supplier/tambahSupplier">    

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Tambah Supplier Koperasi</div>
          <div class="panel-body" style="margin-left: 20px">
    
              <input type="hidden" value="<?php echo $koperasi_id; ?>" name="koperasi_id"></input>            

              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Nama Supplier</label>
                  <input name="nama" type="text" id="nama" class="form-control" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 form-group">
                  <label>Alamat Supplier</label>
                  <input name="alamat" type="text" id="alamat" class="form-control" required>
                </div>   
              </div>

              <div class="row row-table">
                  <div class="col-md-3 form-group">                   
                      <label>Provinsi</label>                    
                      <select name="prov" class="form-control" id="provinsi">
                          <option>- Select Provinsi -</option>
                          <?php foreach($hasil['data'] as $row){ ?>               
                              <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
                          <?php } ?>
                      </select>                
                  </div>
                  <div class="col-md-3 col-table">
                      <label>Kabupaten/Kota</label>                       
                      <select name="kab" class="form-control" id="kabupatenkota">
                          <option value=''>Select Kabupaten</option>
                      </select>               
                  </div>
                  <div class="col-md-3 form-group">                   
                        <label>Kecmatan</label>                     
                        <select name="kec" class="form-control" id="kecamatan">
                            <option>Select Kecamatan</option>
                        </select>
                  </div>
                  <div class="col-md-3 col-table">
                      <label>Kelurahan</label>
                      <select name="lurah" class="form-control" id="kelurahan">
                          <option>Select Kelurahan</option>
                      </select>           
                  </div>             
              </div></br>

              <div class="row">
                <div class="col-md-2 form-group">
                  <label>Telepon Supplier</label>
                  <input type="text" id="telepon" name="telepon" class="form-control" required>
                </div>
              </div>                      

              <div class="row"> 
                <div class="col-md-4 form-group">
                  <label>Email Supplier</label>
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-4 form-group">
                  <label>Penanggung Jawab</label>
                  <input type="text" id="penanggungjawab" name="penanggungjawab" class="form-control" required>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-2 form-group">
                  <label>Kontak Person</label>
                  <input type="text" id="kontakperson" name="kontakperson" class="form-control" required>
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
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#provinsi").change(function (){
      var url = "<?php echo site_url('Supplier/kabupatenkota');?>/"+$(this).val();
      $('#kabupatenkota').load(url);
      $('#kecamatan').html('<option value="">--Pilih Kecamatan--</option>');
      $('#kelurahan').html('<option value="">--Pilih Kelurahan--</option>');          
      return false;
    })
    $("#kabupatenkota").change(function (){
      var url = "<?php echo site_url('Supplier/kecamatan');?>/"+$(this).val();
      $('#kecamatan').load(url);
      return false;
    })
    $("#kecamatan").change(function (){
      var url = "<?php echo site_url('Supplier/kelurahan');?>/"+$(this).val();
      $('#kelurahan').load(url);
      return false;
    })
  });
</script>