<link href="<?= base_url('asset_admin/css/font-awesome.min.css') ?>" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/peta.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/lokasiKoperasi.css') ?>" rel="stylesheet">

<style type="text/css">
	table td {
	}
</style>

<style type="text/css">
  .display .headerrs td, th {
    border: 2px solid #dfe0e0;
    background-color: #203864;
    color: white;
    padding: 5px 15px;   
    text-align: center; 
  }
  .display td {
    border: 2px solid #dfe0e0;    
    padding: 5px 15px;
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

<form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>CetakLaporanFormPengajuanSertifikatNIK/pdf"> 

  <div class="col-md-12">
    <div class="panel panel-default">            
      <div class="panel-body">
      
        <div class="col-md-12">                  
          <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary btn-md">
          <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak</button>       
        </div>

      </div>
    </div>
  </div>
</form>

<div class="col-md-12">
	<div class="panel panel-default">
	<div class="panel-body tabs">
		<ul class="nav nav-pills">
			<li class="active"><a href="#pilltab1-tab" data-toggle="tab">Data Koperasi</a></li>
			<li><a href="#pilltab2-tab" data-toggle="tab" id="tab">Identitas Koperasi</a></li>
			<li><a id="tab3" href="#pilltab3-tab" data-toggle="tab">Data Lainnya</a></li>
			<li><a href="#pilltab4-tab" data-toggle="tab">Susunan Kepengurusan</a></li>
			<li><a href="#pilltab5-tab" data-toggle="tab">Indikator Kelembagaan</a></li>
			<li><a href="#pilltab6-tab" data-toggle="tab">Indikator Usaha</a></li>
		</ul>

	    <div class="tab-content">
	    	<h4 class="d_active tab_drawer_heading" rel="pilltab1-tab"><a class="aauto" href="#h4pilltab1-tab" data-toggle="tab">Data Koperasi <i class="fa"></i></a></h4>
	        	<div class="tab-pane active" id="pilltab1-tab">
	            	<div class="col-xs-12">	
	            		<form name="formDataKoperasi" id="formDataKoperasi" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Peta/insertDataKoperasi">  		
					 	   	<div class="panel-body">
					    		<div class="row">
									<div class="col-md-12 form-group"">
										<div id="map"></div>	
										<input type="hidden" name='lat' id='lat' value= "<?php echo $myKoperasi['latitude']; ?>">	
										<input type="hidden" name='lng' id='lng' value= "<?php echo $myKoperasi['longitude']; ?>">
									</div> <!--end -f span-->
								</div>
						   		<div class="row"> 
						   			<div class="col-md-12 form-group">
								        <div class="col-md-6">
								          <label>Nama Koperasi</label>
								          <input type="text" id="nama" name="nama" class="form-control" value= "<?php echo $myKoperasi['nama']; ?>">
								        </div>
								    </div>
						      	</div>
						      	<div class="row"> 
						      		<div class="col-md-12 form-group">
										<div class="col-md-4">
								          <label>Email </label>
								          <input type="email" id="email" name="email" class="form-control" value= "<?php echo $myKoperasi['email']; ?>">
								        </div>
								        <div class="col-md-2">
								          <label> Telepon</label>
								          <input type="text" id="telepon" name="telepon" class="form-control" value= "<?php echo $myKoperasi['telepon']; ?>">
								        </div>
								        <div class="col-md-2">
								          <label>Fax</label>
								          <input type="text" id="fax" name="fax" class="form-control" value= "<?php echo $myKoperasi['fax']; ?>">
								        </div>
									</div>							        
						      	</div>     

						      	<div class="row">
							      	<div class="col-md-12 form-group">
								        <div class="col-md-7">
								          <label>Alamat</label>
								          <input type="text" id="alamat" name="alamat" class="form-control" value= "<?php echo $myKoperasi['alamat']; ?>">
								        </div>
								        <div class="col-md-2">
								          <label>Kode Pos</label>
								          <input type="text" id="kodepos" name="kodepos" class="form-control" value= "<?php echo $myKoperasi['kodepos']; ?>">
								        </div>
								    </div>
						      	</div>

						      	<div class="row">
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-3">                   
						                  <label>Provinsi</label>                    
						                  <select name="prov" class="form-control" id="provinsi">
						                      <option value="<?php echo $myKoperasi['provinsi_id']; ?>"><?php echo $myKoperasi['provinsi_nama']; ?></option>
						                      <?php foreach($hasil['data'] as $row){ ?>               
						                          <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
						                      <?php } ?>
						                  </select>                
						              	</div>
						              <div class="col-md-3">
						                  <label>Kabupaten/Kota</label>                       
						                  <select name="kab" class="form-control" id="kabupatenkota">
						                      <option value="<?php echo $myKoperasi['kabupatenkota_id']; ?>"><?php echo $myKoperasi['kabupatenkota_nama']; ?></option>
						                  </select>               
						              </div>
						              <div class="col-md-3">                   
						                    <label>Kecamatan</label>                     
						                    <select name="kec" class="form-control" id="kecamatan">
						                        <option value="<?php echo $myKoperasi['kecamatan_id']; ?>"><?php echo $myKoperasi['kecamatan_nama']; ?></option>
						                    </select>
						              </div>
						              <div class="col-md-3">
						                  <label>Kelurahan</label>
						                  <select name="lurah" class="form-control" id="kelurahan">
						                      <option value="<?php echo $myKoperasi['kelurahan_id']; ?>"><?php echo $myKoperasi['kelurahan_nama']; ?></option>
						                  </select>           
						              </div>
						      		</div>						                           
						          </div>

						      	<div class="row"> 
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-4">
								          <label>Website</label>
								          <input type="text" id="website" name="website" class="form-control" value= "<?php echo $myKoperasi['website']; ?>">
								        </div>
						      		</div>							        
						      	</div>

						      	<div class="row"> 
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-2">
								          <label>Nomor Induk</label>
								          <input type="text" id="nomorregistrasi" name="nomorregistrasi" class="form-control" value= "<?php echo $myKoperasi['nomorinduk']; ?>">
								        </div>
								        <div class="col-md-2">
								          <label>Username SSP</label>
								          <input type="text" id="usernamessp" name="usernamessp" class="form-control" value= "<?php echo $myKoperasi['usernamessp']; ?>">
								        </div>
						      		</div>							        
						      	</div>

						      	<div class="box-footer">                    
				                  <div class="pull-right">			                  	
				                    <button type="submit" id="submit" class="btn btn-success buttonSmall">Submit</button>
				                  </div>
				                </div>
							</div>	
						</form>			
					</div>
	        	</div>

	    	<h4 class="tab_drawer_heading" rel="pilltab2-tab"><a class="aauto" href="#h4pilltab2-tab" data-toggle="tab">Identitas Koperasi <i class="fa"></i></a></h4>
	        	<div class="tab-pane" id="pilltab2-tab">
	        		<div class="col-xs-12">	 
	        			<form name="formIdentitasKoperasi" id="formIdentitasKoperasi" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Peta/insertIdentitasKoperasi">       			
					 	   	<div class="panel-body">				 	   		
						      	<div class="row">
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-6">
								        	<label>Nomor / Tanggal Badan Hukum (BH)</label>
								          	<div class="input-group">  
								          		<div class="input-group-addon">Nomor</div>
								          		<input type="text" id="noBH" name="noBH" class="form-control" value="<?php echo $myKoperasi['nomorbh']; ?>">
								        	</div>
								        </div>
								        <div class="col-md-6">
								          	<label>&nbsp;&nbsp;</label>
								          	<div class="input-group">  
								          		<div class="input-group-addon">Tanggal</div>
								          		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								          		<input type="text" id="tglBH" name="tglBH" class="form-control" value="<?php echo $myKoperasi['tanggalbh']; ?>">
								        	</div>
								        </div>
						      		</div>							        
						      	</div>
						      	<div class="row">
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-6">
								          	<label>Lembaran Berita Negara RI (BH)</label>
								          	<div class="input-group">  
								          	<span class="input-group-addon">Nomor</span>
								          	<input type="text" id="nolbrBeritaBH" name="nolbrBeritaBH" class="form-control" value="<?php echo $myKoperasi['nolembaran']; ?>">
								        	</div>
								        </div>
								        <div class="col-md-6">
								          	<label>&nbsp;&nbsp;</label>
								          	<div class="input-group">  
								          	<div class="input-group-addon">Tanggal</div>
								          	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								          	<input type="text" id="tgllbrBeritaBH" name="tgllbrBeritaBH" class="form-control" value="<?php echo $myKoperasi['tgllembaran']; ?>">
								        	</div>
								        </div>
						      		</div>							        
						      	</div>						      	
						      	<div class="row">
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-4">
								        	<label>Pengesahan Badan Hukum Koperasi (oleh)</label>
								          	<select class="form-control" id="pengesahanBH" name="pengesahanBH">
								          		<option value="" <?php if($myKoperasi['pemberibadanhukum_id']==5){echo "selected";}?>>-Pilih Pengesahan Badan Hukum Koperasi-</option>
								          		<option value="1" <?php if($myKoperasi['pemberibadanhukum_id']==1){echo "selected";}?>>Deputi Bidang Kelembagaan KUKM atas Nama Menteri</option>
								          		<option value="2" <?php if($myKoperasi['pemberibadanhukum_id']==2){echo "selected";}?>>Gubernur atas Nama Menteri</option>
								          		<option value="3" <?php if($myKoperasi['pemberibadanhukum_id']==3){echo "selected";}?>>Bupati/Walikota atas Nama Menteri</option>
								          		<option value="0" <?php if($myKoperasi['pemberibadanhukum_id']==0){echo "selected";}?>>Tidak tahu</option>
								          	</select>
							        	</div>
						      		</div>							        
						      	</div>
						      	<div class="row"> 
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-4">
								          <label>Tempat Kedudukan Koperasi</label>
								          <input type="text" id="t4KedudukanKop" name="t4KedudukanKop" class="form-control" value="<?php echo $myKoperasi['t4KedudukanKop']; ?>">
								        </div>
						      		</div>							        
						      	</div>
						      	<div class="row"> 
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-4">
								          <label>Notaris / Camat Pembuat Akta Koperasi</label>
								          <input type="text" id="notAktaKop" name="notAktaKop" class="form-control" value="<?php echo $myKoperasi['notaris']; ?>">							         
								        </div>								       
						      		</div>							        
						      	</div>
						      	<div class="row">
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-6">
								          	<label>Nomor / Tanggal PAD</label>
								          	<div class="input-group">  
								          	<div class="input-group-addon">Nomor</div>
								          	<input type="text" id="noPAD" name="noPAD" class="form-control" value="<?php echo $myKoperasi['nomorpad']; ?>">
								        	</div>
								        </div>
								        <div class="col-md-6">
								          	<label>&nbsp;&nbsp;</label>
								          	<div class="input-group">  
								          	<div class="input-group-addon">Tanggal</div>
								          	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								          	<input type="text" id="tglPAD" name="tglPAD" class="form-control" value="<?php echo $myKoperasi['tanggalpad']; ?>">
								        	</div>
								        </div>
						      		</div>							        
						      	</div>
						      	<div class="row">
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-6">
								          	<label>Lembaran Berita Negara RI (PAD)</label>
								          	<div class="input-group">  
								          	<span class="input-group-addon">Nomor</span>
								          	<input type="text" id="nolbrBeritaPAD" name="nolbrBeritaPAD" class="form-control" value="<?php echo $myKoperasi['nomorlembaran']; ?>">
								        	</div>
								        </div>
								        <div class="col-md-6">
								          	<label>&nbsp;&nbsp;</label>
								          	<div class="input-group">  
								          	<div class="input-group-addon">Tanggal</div>
								          	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								          	<input type="text" id="tgllbrBeritaPAD" name="tgllbrBeritaPAD" class="form-control" value="<?php echo $myKoperasi['tanggallembaran']; ?>">
								        	</div>
								        </div>
						      		</div>							        
						      	</div>
						      	<div class="row"> 
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-3">
								          <label>Notaris / Camat Pembuat PAD</label>
								          <input type="text" id="notPAD" name="notPAD" class="form-control" value="<?php echo $myKoperasi['notarispad']; ?>">
								        </div>								        
						      		</div>							        
						      	</div>
						      	<div class="row">
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-4">
								      		<label>Jangka Waktu Pendirian</label>
								      		<div class="input-group">
								      		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								      		<input type="text" id="jgkawktPendirian" name="jgkawktPendirian" class="form-control" value="<?php echo $myKoperasi['jangkawaktu']; ?>">
									    	</div>
									    </div>
						      		</div>							      	
							    </div>
						      	<div class="row">
						      		<div class="col-md-12 form-group">
						      			<div class="col-md-4">
								          <label>NPWP (15 digit)</label>
								          <input type="text" minlength="1" maxlength="15" id="npwp" name="npwp" class="form-control" value="<?php echo $myKoperasi['npwp']; ?>">
								        </div>
						      		</div> 							        
						      	</div>
						      	<div class="box-footer">                    
				                  <div class="pull-right">	
				                    <button type="submit" id="submit2" class="btn btn-success buttonSmall">Submit</button>
				                  </div>
				                </div>
							</div>	
						</form>					
					</div>
	        	</div>

	        <h4 class="tab_drawer_heading" rel="pilltab3-tab"><a class="aauto" href="#h4pilltab3-tab" data-toggle="tab">Data Lainnya <i class="fa"></i></a></h4>
	        	<div class="tab-pane" id="pilltab3-tab">
	        		<div class="col-xs-12">		
	        			<form name="formDataLainnya" id="formDataLainnya" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Peta/insertDataLainnya">	
					 	   	<div class="panel-body">
						      	<div class="row">
							        <div class="col-md-6 form-group">
							        	<label>Bentuk Koperasi</label>
							          	<select class="form-control" id="btkkop" name="btkkop" required>
							          		<option value="">-Pilih Bentuk Koperasi-</option>
							          		<option value="1" <?php if($myKoperasi['bentukkoperasi_id']==1){echo "selected";}?>>Primer Nasional</option>
							          		<option value="2" <?php if($myKoperasi['bentukkoperasi_id']==2){echo "selected";}?>>Primer Provinsi</option>
							          		<option value="3" <?php if($myKoperasi['bentukkoperasi_id']==3){echo "selected";}?>>Primer Kab/Kota</option>
							          		<option value="4" <?php if($myKoperasi['bentukkoperasi_id']==4){echo "selected";}?>>Sekunder Nasional</option>
							          		<option value="5" <?php if($myKoperasi['bentukkoperasi_id']==5){echo "selected";}?>>Sekunder Provinsi</option>
							          		<option value="6" <?php if($myKoperasi['bentukkoperasi_id']==6){echo "selected";}?>>Sekunder Kab/Kota</option>
							          	</select>
							        </div>
						      	</div>
						      	<div class="row">
							        <div class="col-md-6 form-group">
							        	<label>Jenis Koperasi</label>
							          	<select class="form-control" id="jkop" name="jkop" required>
							          		<option value="">-Pilih Jenis Koperasi-</option>
							          		<option value="1" <?php if($myKoperasi['tipekoperasi_id']==1){echo "selected";}?>>Produsen</option>
							          		<option value="2" <?php if($myKoperasi['tipekoperasi_id']==2){echo "selected";}?>>Pemasaran</option>
							          		<option value="3" <?php if($myKoperasi['tipekoperasi_id']==3){echo "selected";}?>>Konsumen</option>
							          		<option value="4" <?php if($myKoperasi['tipekoperasi_id']==4){echo "selected";}?>>Jasa</option>
							          		<option value="5" <?php if($myKoperasi['tipekoperasi_id']==5){echo "selected";}?>>Simpan Pinjam</option>
							          	</select>
							        </div>
						      	</div>
						      	<div class="row">
						      		<div class="col-md-4 form-group">
							          <label>Unit Simpan Pinjam</label>
							        	<div class="radio-inline">
										  <label>
										    <input type="radio" name="usp" id="uspYa" value="Ya" <?php if($myKoperasi['tipekoperasi_id'] >= 6){echo "checked";}?>>
										    Ya
										  </label>
										</div>
										<div class="radio-inline">
									  		<label>
									    	<input type="radio" name="usp" id="uspTdk" value="Tidak" <?php if($myKoperasi['tipekoperasi_id'] <= 6){echo "checked";}?>>
									    	Tidak
									  		</label>
										</div>
							        </div>
						      	</div>
						      	<div class="row"> 
							        <div class="col-md-4 form-group">
							        	<label>Kelompok Koperasi</label>
							          	<select name="kelKop" class="form-control" id="kelKop" required>
							          		<option value="">- Pilih Kelompok Koperasi -</option>
			                              	<?php foreach($kelompokkoperasi['data'] as $row){ ?>
			                              	<option value="<?php echo $row['id'];?>"  
			                              	<?php if($row['id'] == $myKoperasi['kelompokkoperasi_id']) { echo "selected"; } ;?> ><?php echo $row['kelompok'] ?></option>
			                              	<?php } ?>
			                          	</select> 							          				         
							        </div>
						      	</div>
						      	<div class="row"> 
							        <div class="col-md-4 form-group">
							          	<label>Sektor Usaha</label>							          
							          	<select name="sekUsaha" class="form-control" id="sekUsaha" required>     
							          		<option value="">- Pilih Sektor Usaha -</option>                 
			                              	<?php foreach($sektorusaha['data'] as $row){ ?>
			                              	<option value="<?php echo $row['id'];?>"  
			                              	<?php if($row['id'] == $myKoperasi['sektorusaha_id']) { echo "selected"; } ;?> ><?php echo $row['sektor'] ?></option>
			                              	<?php } ?>
			                          	</select> 
							        </div>
						      	</div>
						      	<div class="row">
						      		<div class="col-md-4 form-group">
							          <label>Koperasi Binaan</label>
							        	<div class="radio -inline">
							        		<label class="radio-inline">
								        		<input type="radio" id="kopBinaanNasional" name="kopBinaan" value="Kabupaten/Kota" <?php if($myKoperasi['binaan'] == 'Nasional'){echo "checked";}?>> Nasional
								        	</label>
								        	<label class="radio-inline">
								        		<input type="radio" id="kopBinaanProv" name="kopBinaan" value="Provinsi" <?php if($myKoperasi['binaan'] == 'Provinsi'){echo "checked";}?>> Provinsi
								        	</label>
								        	<label class="radio-inline">
								        		<input type="radio" id="kopBinaanKabKot" name="kopBinaan" value="Kabupaten/Kota" <?php if($myKoperasi['binaan'] == 'Kabupaten/Kota'){echo "checked";}?>> Kabupaten / Kota
								        	</label>							        	
							        	</div>
							        </div>
						      	</div>
						      	<div class="box-footer">                    
				                  <div class="pull-right">				                  	
				                    <button type="submit" id="submit3" class="btn btn-success buttonSmall">Submit</button>
				                  </div>
				                </div> 														        
							</div>	
						</form>			
					</div>
	        	</div>

	        <h4 class="tab_drawer_heading" rel="pilltab4-tab"><a class="aauto" href="#h4pilltab4-tab" data-toggle="tab">Susunan Kepengurusan <i class="fa"></i></a></h4>
	        	<div class="tab-pane" id="pilltab4-tab">
					<div class="col-md-12">			
				 	   	<div class="panel-body">
					 	   	<div id="susunanPengurus">
					 	   		<h2 class="visible-lg-block">KETUA KOPERASI</h2><h4 class="hidden-lg" style="margin-left: 0px">KETUA KOPERASI</h4>
						 	   		<div class="table-responsive">
							 	   		<table id="tabelKetuaKop" style="overflow-x:scroll;display:block;" class="display" cellspacing="0" width="100%">
							                <thead class="headerrs">
							                  <tr>
							                    <th rowspan="2">Tahun</th>
							                    <th colspan="3" class="text-center">Ketua 1</th>
							                    <th colspan="3" class="text-center">Ketua 2</th>
							                    <th colspan="3" class="text-center">Ketua 3</th>
							                  </tr>
							                  <tr>
									            <th>Nama</th>  
									            <th>Telepon</th>
									            <th>Pendidikan</th>
									            <th>Nama</th>  
									            <th>Telepon</th>
									            <th>Pendidikan</th>
									            <th>Nama</th>  
									            <th>Telepon</th>
									            <th>Pendidikan</th>
									          </tr>
							                </thead>
							                <tbody>
							                	<tr>
			                          				<td><?php echo substr($myPengurusKoperasi['ketua1_tahun1']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun1']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun1']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun1']['pendidikan']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['ketua1_tahun2']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun2']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun2']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun2']['pendidikan']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['ketua1_tahun3']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua1_tahun3']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua2_tahun3']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketua3_tahun3']['pendidikan']?></td>
							                    </tr>
							                </tbody>
								        </table>						        							    
							        </div>
						        <h2 class="visible-lg-block">SEKRETARIS</h2><h4 class="hidden-lg" style="margin-left: 0px">SEKRETARIS</h4>
							        <div class="table-responsive">
							 	   		<table id="tabelSekret" style="overflow-x:scroll;display:block;" class="display" cellspacing="0" width="100%">
							                <thead class="headerrs">
							                  <tr>
							                    <th rowspan="2">Tahun</th>
							                    <th colspan="3" class="text-center">Sekretaris 1</th> 
							                    <th colspan="3" class="text-center">Sekretaris 2</th> 				                                     
							                    <th colspan="3" class="text-center">Sekretaris 3</th> 				                                     
							                  </tr>
							                  <tr>        
									            <th>Nama</th>  
									            <th>Telepon</th>
									            <th>Pendidikan</th>
									            <th>Nama</th>  
									            <th>Telepon</th>
									            <th>Pendidikan</th>
									            <th>Nama</th>  
									            <th>Telepon</th>
									            <th>Pendidikan</th>
									          </tr>							          
							                </thead>
							                <tbody>
							                <tbody>
							                	<tr>
			                          				<td><?php echo substr($myPengurusKoperasi['sekretaris1_tahun1']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun1']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun1']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun1']['pendidikan']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['sekretaris1_tahun2']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun2']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun2']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun2']['pendidikan']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['sekretaris1_tahun3']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris1_tahun3']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris2_tahun3']['pendidikan']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['sekretaris3_tahun3']['pendidikan']?></td>
							                    </tr>
							                </tbody>
								        </table>
							        </div>
						        <h2 class="visible-lg-block">BENDAHARA</h2><h4 class="hidden-lg" style="margin-left: 0px">BENDAHARA</h4>
							        <div class="table-responsive">
							 	   		<table id="tabelBndahra" class="display" cellspacing="0" width="100%">
							                <thead class="headerrs">
							                  <tr>
							                    <th rowspan="2">Tahun</th>
							                    <th colspan="2" class="text-center">Bendahara 1</th> 
							                    <th colspan="2" class="text-center">Bendahara 2</th> 				                                     
							                    <th colspan="2" class="text-center">Bendahara 3</th> 				                                     
							                  </tr>
							                  <tr>        
									            <th>Nama</th>  
									            <th>Telepon</th>						            
									            <th>Nama</th>  
									            <th>Telepon</th>						            
									            <th>Nama</th>  
									            <th>Telepon</th>						            
									          </tr>							          
							                </thead>
							                <tbody>
							                	<tr>
			                          				<td><?php echo substr($myPengurusKoperasi['bendahara1_tahun1']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara1_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara1_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara2_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara2_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara3_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara3_tahun1']['telepon']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['bendahara1_tahun2']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara1_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara1_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara2_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara2_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara3_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara3_tahun2']['telepon']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['bendahara1_tahun3']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara1_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara1_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara2_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara2_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara3_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['bendahara3_tahun3']['telepon']?></td>
							                    </tr>
							                </tbody>
								        </table>
							        </div>
						        <h2 class="visible-lg-block">PENGAWAS</h2><h4 class="hidden-lg" style="margin-left: 0px">PENGAWAS</h4>
							        <div class="table-responsive">
							 	   		<table id="tabelPgwas" class="display" cellspacing="0" width="100%">
							                <thead class="headerrs">
							                  <tr>
							                    <th rowspan="2">Tahun</th>
							                    <th colspan="2" class="text-center">Ketua Pengawas</th>
							                    <th colspan="2" class="text-center">Anggota 1</th>
							                    <th colspan="2" class="text-center">Anggota 2</th>
							                  </tr>
							                  <tr>        
									            <th>Nama</th>  
									            <th>Telepon</th>
									            <th>Nama</th>  
									            <th>Telepon</th>
									            <th>Nama</th>  
									            <th>Telepon</th>
									          </tr>							          
							                </thead>
							                 <tbody>
							                	<tr>
			                          				<td><?php echo substr($myPengurusKoperasi['ketuapengawas_tahun1']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketuapengawas_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketuapengawas_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota1_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota1_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota2_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota2_tahun1']['telepon']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['ketuapengawas_tahun2']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketuapengawas_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketuapengawas_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota1_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota1_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota2_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota2_tahun2']['telepon']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['ketuapengawas_tahun3']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketuapengawas_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['ketuapengawas_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota1_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota1_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota2_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['anggota2_tahun3']['telepon']?></td>
							                    </tr>
							                </tbody>           
								        </table>
							        </div>
						        <h2 class="visible-lg-block">MANAGER</h2><h4 class="hidden-lg" style="margin-left: 0px">MANAGER</h4>
							        <div class="table-responsive">
							 	   		<table id="tabelMnager" class="display" cellspacing="0" width="100%">
							                <thead class="headerrs">
							                  <tr>
							                    <th rowspan="2">Tahun</th>
							                    <th colspan="2" class="text-center">Manager 1</th> 
							                    <th colspan="2" class="text-center">Manager 2</th> 				                                     
							                    <th colspan="2" class="text-center">Manager 3</th> 				                                     
							                  </tr>
							                  <tr>        
									            <th>Nama</th>  
									            <th>Telepon</th>						            
									            <th>Nama</th>  
									            <th>Telepon</th>						            
									            <th>Nama</th>  
									            <th>Telepon</th>						            
									          </tr>							          
							                </thead>
							                <tbody>
							                	<tr>
			                          				<td><?php echo substr($myPengurusKoperasi['manajer1_tahun1']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer1_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer1_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer2_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer2_tahun1']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer3_tahun1']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer3_tahun1']['telepon']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['manajer1_tahun2']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer1_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer1_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer2_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer2_tahun2']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer3_tahun2']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer3_tahun2']['telepon']?></td>
							                    </tr>
							                    <tr>
			                          				<td><?php echo substr($myPengurusKoperasi['manajer1_tahun3']['jabatan'],0,4)?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer1_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer1_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer2_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer2_tahun3']['telepon']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer3_tahun3']['nama']?></td>
			                          				<td><?php echo $myPengurusKoperasi['manajer3_tahun3']['telepon']?></td>
							                    </tr>
							                </tbody>
								        </table>
							        </div>
						    </div>
						</div>
					</div>
	        	</div>

	        <h4 class="tab_drawer_heading" rel="pilltab5-tab"><a class="aauto" href="#h4pilltab5-tab" data-toggle="tab">Indikator Kelembagaan <i class="fa"></i></a></h4>
	        	<div class="tab-pane" id="pilltab5-tab">
						<div class="col-xs-12">
					 	   	<div class="panel-body">
					 	   	<div class="table-responsive">
					 	   		<table id="tabelIndikatorKelembagaan" class="display" cellspacing="0" width="50%">
					                <thead class="headerrs">
					                  <tr>
					                    <th rowspan="2">Tahun</th>
					                    <th colspan="3" class="text-center">Anggota(orang)</th>
					                    <th colspan="3" class="text-center">Karyawan(orang)</th>
					                    <th colspan="3" class="text-center">Manajer(orang)</th>
					                    <th rowspan="2" class="text-center">Tanggal RAT</th>
					                  </tr>
					                  <tr>
							            <th>Pria</th>
							            <th>Wanita</th>
							            <th>Jumlah</th>
							            <th>Pria</th>
							            <th>Wanita</th>
							            <th>Jumlah</th>
							            <th>Pria</th>
							            <th>Wanita</th>
							            <th>Jumlah</th>
							          </tr>
					                </thead>
					                <tbody>
					                	<tr>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['tahun']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalAnggotaPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalAnggotaWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalAnggotaPria']+$myKoperasi['indikatorkelembagaan_tahun1']['totalAnggotaWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalKaryawanPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalKaryawanWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalKaryawanPria']+$myKoperasi['indikatorkelembagaan_tahun1']['totalKaryawanWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalManajerPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalManajerWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['totalManajerPria']+$myKoperasi['indikatorkelembagaan_tahun1']['totalManajerWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun1']['tanggalRat']?></td>
					                    </tr>
					                    <tr>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['tahun']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalAnggotaPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalAnggotaWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalAnggotaPria']+$myKoperasi['indikatorkelembagaan_tahun2']['totalAnggotaWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalKaryawanPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalKaryawanWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalKaryawanPria']+$myKoperasi['indikatorkelembagaan_tahun2']['totalKaryawanWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalManajerPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalManajerWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['totalManajerPria']+$myKoperasi['indikatorkelembagaan_tahun2']['totalManajerWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun2']['tanggalRat']?></td>
					                    </tr>
					                    <tr>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['tahun']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalAnggotaPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalAnggotaWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalAnggotaPria']+$myKoperasi['indikatorkelembagaan_tahun3']['totalAnggotaWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalKaryawanPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalKaryawanWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalKaryawanPria']+$myKoperasi['indikatorkelembagaan_tahun3']['totalKaryawanWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalManajerPria']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalManajerWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['totalManajerPria']+$myKoperasi['indikatorkelembagaan_tahun3']['totalManajerWanita']?></td>
	                          				<td><?php echo $myKoperasi['indikatorkelembagaan_tahun3']['tanggalRat']?></td>
					                    </tr>
					                </tbody>
						        </table>
						        </div>										        
							</div>				
						</div>
	        	</div>

	        <h4 class="tab_drawer_heading" rel="pilltab6-tab"><a class="aauto" href="#h4pilltab6-tab" data-toggle="tab">Indikator Usaha <i class="fa"></i></a></h4>
	        	<div class="tab-pane" id="pilltab6-tab">
						<div class="col-xs-12">			
					 	   	<div class="panel-body">
					 	   	<div class="table-responsive">
					 	   		<table id="tabelIndikatorUsaha" class="display" cellspacing="0" width="100%">
					                <thead class="headerrs">				                 
					                  <tr>        
							            <th>Tahun</th>  
							            <th>Modal Sendiri</th>
							            <th>Modal Luar</th>
							            <th>Asset</th>  
							            <th>Volume Usaha</th>
							            <th>Selisih Hasil Usaha</th>					            
							          </tr>							          
					                </thead>
					                <tbody>
					                	<tr>
	                          				<td><?php echo $myKoperasi['indikatorusaha_tahun1']['tahun']?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['modalsendiri']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['modalluar']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['asset']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['volumeusaha']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun1']['selisihhasilusaha']); ?></td>
					                    </tr>  
					                    <tr>
	                          				<td><?php echo $myKoperasi['indikatorusaha_tahun2']['tahun']?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['modalsendiri']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['modalluar']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['asset']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['volumeusaha']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun2']['selisihhasilusaha']); ?></td>
					                    </tr>
					                    <tr>
	                          				<td><?php echo $myKoperasi['indikatorusaha_tahun3']['tahun']?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['modalsendiri']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['modalluar']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['asset']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['volumeusaha']); ?></td>
	                          				<td><?php echo "Rp ".format_rupiah($myKoperasi['indikatorusaha_tahun3']['selisihhasilusaha']); ?></td>
					                    </tr>
					                </tbody>              
						        </table>
						        </div>											        
							</div>				
						</div>
	    		</div>
		</div><!--/.panel body-->
	</div><!--/.panel-->
</div><!-- /.col-->
</div>

<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3hVyNqjEiL3bJG99BifCDD5tfKq6txl8" type="text/javascript"></script> -->
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<script type="text/javascript">
	function initialize() {
      var my_position = new google.maps.LatLng(<?php if($myKoperasi['latitude'] == 0) {echo "-2.6374692";} else { echo $myKoperasi['latitude'];}?>,<?php if($myKoperasi['longitude'] == 0) {echo "120.9879226";} else { echo $myKoperasi['longitude'];}?>);
      var map = new google.maps.Map(document.getElementById('map'), {
        center: my_position,
        zoom: 10
      });
      var marker = new google.maps.Marker({
        position: my_position,
        map: map,
        draggable : true
      });
      // double click event
      google.maps.event.addListener(map, 'dblclick', function(e) {
        var positionDoubleclick = e.latLng;
        marker.setPosition(positionDoubleclick);
        updateMarkerPosition(marker.getPosition());
        // if you don't do this, the map will zoom in
        map.setOptions({disableDoubleClickZoom: true });              
      });

      google.maps.event.addListener(marker, 'drag', function() {
        updateMarkerPosition(marker.getPosition());
      });               
    } 

    function updateMarkerPosition(latLng) {
      document.getElementById('lat').value = [latLng.lat()];
      document.getElementById('lng').value = [latLng.lng()];
    }   

    google.maps.event.addDomListener(window, 'load', initialize);	
</script>

<script type="text/javascript">
   $('#tglBH').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });

   $('#tgllbrBeritaBH').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });

   $('#tglPAD').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });

   $('#tgllbrBeritaPAD').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });

   $('#jgkawktPendirian').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });
</script>
<script type="text/javascript">
	 // tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp

	/* if in drawer mode */
$(document).ready(function() {


	$(".tab_drawer_heading").click(function() {
      
      $(".tab-pane").hide();
      var d_activeTab = $(this).attr("rel"); 
      $("#"+d_activeTab).fadeIn();
	  
	  $(".tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");
	  
	  $("ul.nav li").removeClass("active");
	  $("ul.nav li[rel^='"+d_activeTab+"']").addClass("active");
    });
});
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>