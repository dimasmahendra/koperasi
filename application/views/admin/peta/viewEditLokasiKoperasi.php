<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<link href="<?= base_url('asset_admin/css/peta.css') ?>" rel="stylesheet">

<style type="text/css">
.has-feedback .form-control-feedback {
    top: 25px;
    right: 0;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 25px;
    right: 22px;
}
</style>

</head>
<body>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
	<div class="row">
		<div class="col-md-12 form-group"">
			<div id="map"></div>	
		</div> <!--end -f span-->
	</div>
	
	<form method="POST" id="form1" name="form" enctype="multipart/form-data"  class="form-horizontal" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>Peta/ubahPeta">

		<div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">Ubah Profil Koperasi</div>
            <div class="panel-body" style="margin-left: 20px">
            
					<div class="row"> 
	                <div class="col-md-4 form-group">
	                  <label>Nama Koperasi</label>
	                  <input type="text" id="nama" name="nama" class="form-control" value= "<?php echo $nama; ?>" required>
	                </div>
	              	</div>

	              	<div class="row"> 
	                <div class="col-md-3 form-group">
	                  <label>Email</label>
	                  <div class="input-group">
	                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	                  <input type="email" id="email" name="email" class="form-control" value= "<?php echo $email; ?>" required>
	                  </div>
	                </div>
	              	</div>

	              	<div class="row"> 
	                <div class="col-md-3 form-group">
	                  <label>Telepon</label>
	                  <div class="input-group">
	                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
	                  <input type="text" id="telepon" name="telepon" class="form-control" value= "<?php echo $telepon; ?>" required>
	                  </div>
	                </div>
	              	</div>

	              	<div class="row"> 
	                <div class="col-md-6 form-group">
	                  <label>Alamat</label>
	                  <input type="text" id="alamat" name="alamat" class="form-control" value= "<?php echo $alamat; ?>" required>
	                </div>
	              	</div>

	              	<div class="row row-table">
		                  <div class="col-md-3 form-group">                   
		                      <label>Provinsi</label>                    
		                      <select name="prov" class="form-control" id="provinsi">
		                          <option value="<?php echo $provinsi_id; ?>"><?php echo $provinsi_nama; ?></option>
		                          <?php foreach($hasil['data'] as $row){ ?>               
		                              <option value="<?php echo $row['id'];?>"><?php echo $row['nama'] ?></option>
		                          <?php } ?>
		                      </select>                
		                  </div>
		                  <div class="col-md-3 col-table">
		                      <label>Kabupaten/Kota</label>                       
		                      <select name="kab" class="form-control" id="kabupatenkota">
		                          <option value="<?php echo $kabupatenkota_id; ?>"><?php echo $kabupatenkota_nama; ?></option>
		                      </select>               
		                  </div>
		                  <div class="col-md-3 form-group">                   
		                        <label>Kecamatan</label>                     
		                        <select name="kec" class="form-control" id="kecamatan">
		                            <option value="<?php echo $kecamatan_id; ?>"><?php echo $kecamatan_nama; ?></option>
		                        </select>
		                  </div>
		                  <div class="col-md-3 col-table">
		                      <label>Kelurahan</label>
		                      <select name="lurah" class="form-control" id="kelurahan">
		                          <option value="<?php echo $kelurahan_id; ?>"><?php echo $kelurahan_nama; ?></option>
		                      </select>           
		                  </div>             
		              </div></br>              

	              	<div class="row"> 
	                <div class="col-md-2 form-group">
	                  <label>Nomor Registrasi</label>
	                  <div class="input-group">
	                  <input type="text" id="nomorregistrasi" name="nomorregistrasi" class="form-control" value= "<?php echo $nomorregistrasi; ?>" required>
	                  </div>
	                </div>
	              	</div>

	              	<div class="row"> 
					    <div class="col-md-2 form-group">
					        <label>Username SSP</label>
					        <div class="input-group">
					        <input type="text" id="usernamessp" name="usernamessp" class="form-control" value= "<?php echo $usernamessp; ?>">
					        </div>
					    </div>
					</div>									
							
					<input type="hidden" name='lat' id='lat' class="form-control" value= "<?php echo $latitude; ?>">					
					<input type="hidden" name='lng' id='lng' class="form-control" value= "<?php echo $longitude; ?>">									

					<div class="pull-right">                  
			            <a class="btn btn-default" href="<?php echo base_url(); ?>Peta/daftarPeta">Batal</a>
			            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>		            
		        	</div>

				</div>
		   </div>
		</div>
	</form>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
	function updateMarkerPosition(latLng) {
		document.getElementById('lat').value = [latLng.lat()];
		document.getElementById('lng').value = [latLng.lng()];
	} 

	var centerMap = new google.maps.LatLng(<?php if($latitude == 0) {echo "-2.6374692";} else { echo $latitude;}?>,<?php if($longitude == 0) {echo "120.9879226";} else { echo $longitude;}?>);
	
    var myOptions = {
      center: centerMap,
      zoom: 5,         
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

	
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

	var marker1 = new google.maps.Marker({
	position : new google.maps.LatLng(<?php if($latitude == 0) {echo "-2.6374692";} else { echo $latitude;}?>,<?php if($longitude == 0) {echo "120.9879226";} else { echo $longitude;}?>),
	title : 'lokasi',
	map : map,
	draggable : true
	});
	
	//updateMarkerPosition(latLng);

	google.maps.event.addListener(marker1, 'drag', function() {
		updateMarkerPosition(marker1.getPosition());
	});

	$(document).ready(function(){
	    $("#provinsi").change(function (){
	      var url = "<?php echo site_url('Peta/kabupatenkota');?>/"+$(this).val();
	      $('#kabupatenkota').load(url);
	      $('#kecamatan').html('<option value="">--Pilih Kecamatan--</option>');
	      $('#kelurahan').html('<option value="">--Pilih Kelurahan--</option>');          
	      return false;
	    })
	    $("#kabupatenkota").change(function (){
	      var url = "<?php echo site_url('Peta/kecamatan');?>/"+$(this).val();
	      $('#kecamatan').load(url);
	      return false;
	    })
	    $("#kecamatan").change(function (){
	      var url = "<?php echo site_url('Peta/kelurahan');?>/"+$(this).val();
	      $('#kelurahan').load(url);
	      return false;
	    })
	  });
</script>
<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/formValidation.js') ?>" rel="stylesheet"></script>
<script>
$(document).ready(function() {
    $('#form1')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                telepon: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Masukkan Nomor Telepon!'
                        },
                        regexp: {
                            regexp: /^[0-9]{0,12}$/,
                            message: "Silahkan Masukkan Angka! (Maksimal 12 Angka)"
                        }
                    }
                },
                email: {
                    verbose: false,
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Masukkan Alamat Email!'
                        },
                        emailAddress: {
                            message: 'Masukkan Alamat Email Yang Valid!'
                        },
                        stringLength: {
                            max: 512,
                            message: 'Email Tidak Lebih dari 512 Karakter!'
                        },
                        remote: {
                            type: 'GET',
                            url: 'https://api.mailgun.net/v2/address/validate?callback=?',
                            crossDomain: true,
                            name: 'address',
                            data: {
                                // Registry a Mailgun account and get a free API key
                                // at https://mailgun.com/signup
                                api_key: 'pubkey-83a6-sl6j2m3daneyobi87b3-ksx3q29'
                            },
                            dataType: 'jsonp',
                            validKey: 'is_valid',
                            message: 'Email Tidak Valid!'
                        }
                    }
                }
            }
        })
        .on('success.validator.fv', function(e, data) {
            if (data.field === 'email' && data.validator === 'remote') {
                var response = data.result;  // response is the result returned by MailGun API
                if (response.did_you_mean) {
                    // Update the message
                    data.element                    // The field element
                        .data('fv.messages')        // The message container                                                
                        .show();
                }
            }
        })
        .on('err.validator.fv', function(e, data) {
            if (data.field === 'email' && data.validator === 'remote') {
                var response = data.result;
                // We need to reset the error message
                data.element                // The field element
                    .data('fv.messages')    // The message container
                    .find('[data-fv-validator="remote"][data-fv-for="email"]')
                    .html(response.did_you_mean
                                ? 'Mungkin Yang Dimaksud Anda Adalah ' + response.did_you_mean + '?'
                                : 'Email Tidak Valid!')
                    .show();
            }
        });
});
</script>
</body>
</html>




