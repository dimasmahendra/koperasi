
<script src="<?= base_url('asset_admin/js/tinyMCEValidator.js') ?>"></script>
<script src="<?= base_url('asset_admin/tinymce/js/tinymce/tinymce.dev.js') ?>"></script>

<style type="text/css">
  .has-feedback .form-control-feedback {
    top: 25px;
    right: 0;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 24px;
    right: 30px;
}
@media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

    body{
      margin-top: 27px;
    }
  }
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="col-lg-12">
    <!-- Tabel inputan user admin -->
    <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>PembiayaanSyariah/insertProduk">     
      <div class="panel panel-default">
        <div class="panel-heading">Tambah Produk Pembiayaan Syariah</div>
          <div class="panel-body"> 
            <div class="row">
              <div class="col-md-4 form-group">
                <label>Nama Produk</label>
                <div class="input-group">
                  <input name="namaprogram" type="text" id="namaprogram" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 form-group">
                <label>Akad</label>
                <div class="input-group">
                <input type="text" id="akad" name="akad" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group">
                <label>Deskripsi</label>
                  <div class="input-group">
                    <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"></textarea>
                  </div>
              </div>   
            </div>
        
            <div class="pull-right">
              <button class="btn btn-default" name="button" id="tombolReset" value="true" type="reset">Ulangi</button>
              <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>            
            </div>                         
          </div>
      </div>      
    </form>
  </div> 
</div>

<script>
$(document).ready(function() {
    tinymce.init({
        selector: 'textarea',
        setup: function(editor) {
            editor.on('keyup', function(e) {
                // Revalidate the deskripsi field
                $('#form1').formValidation('revalidateField', 'deskripsi');
            });
        }
    });

    $('#form1')
        .formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                namaprogram: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Masukkan Nama Produk !!!'
                        }
                    }
                },
                akad: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Masukkan Akad !!!'
                        }
                    }
                },
                deskripsi: {
                    validators: {
                        callback: {
                            message: 'Deskripsi harus lebih dari 4 karakter dan kurang dari 200 karakter !!!',
                            callback: function(value, validator, $field) {
                                // Get the plain text without HTML
                                var text = tinyMCE.activeEditor.getContent({
                                    format: 'text'
                                });

                                return text.length <= 200 && text.length >= 5;
                            }
                        }
                    }
                }
            }
        });
});
</script>
