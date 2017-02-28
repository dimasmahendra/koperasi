<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<script src="<?= base_url('asset_admin/js/tinyMCEValidator.js') ?>"></script>
<script src="<?= base_url('asset_admin/tinymce/js/tinymce/tinymce.dev.js') ?>"></script>

<style type="text/css">

.has-feedback .form-control-feedback {
    top: 25px;
    right: 0;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 25px;
    right: 22px;
}
@media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

    body{
      margin-top: 27px;
    }
  }
</style>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    </br><!--/.row-->

    <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>ProdukSimpanan/insertProdukSimpanan">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Tambah Produk Simpanan</div>
              <div class="panel-body" style="margin-left: 20px">

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Nama Produk</label>
                      <input type="text" id="namaProgram" name="namaProgram" style="height: 34px;" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Akad</label>
                      <input type="text" id="akad" name="akad" style="height: 34px;" class="form-control" required>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12 form-group">
                      <label>Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
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
                            message: 'Deskripsi harus lebih dari 5 karakter dan kurang dari 200 karakter !!!',
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