<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<script src="<?= base_url('asset_admin/js/autoNumeric-1.9.41.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/autoNumeric-1.8.0-sample.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/tinyMCEValidator.js') ?>"></script>
<script src="<?= base_url('asset_admin/tinymce/js/tinymce/tinymce.dev.js') ?>"></script>

<style type="text/css">
.disabledbutton {
    pointer-events: none;
    opacity: 0.4;
    cursor: auto;
}
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

    <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>IndikatorKesehatanKoperasiAPEX/insertIndikatorKesehatan">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Input Indikator Kesehatan Koperasi</div>
              <div class="panel-body <?php $tanggal=date("m"); if($tanggal <= 3){echo "disabledbutton2";}else if ($tanggal <= 6 && $tanggal > 3){echo "disabledbutton";}else if ($tanggal <= 9 && $tanggal > 6){echo "disabledbutton2";}else{echo "disabledbutton2";} ?>" style="margin-left: 20px">


                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>ATMR</label>
                      <input type="text" class="form-control formatRupiah" name="atmr" id="atmr" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Bank</label>
                      <input type="text" class="form-control formatRupiah" name="bank" id="bank" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Beban Operasi</label>
                      <input type="text" class="form-control formatRupiah" name="bebanoperasi" id="bebanoperasi" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Beban Usaha</label>
                      <input type="text" class="form-control formatRupiah" name="bebanusaha" id="bebanusaha" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Beban per Koperasian</label>
                      <input type="text" class="form-control formatRupiah" name="bebanperkoperasian" id="bebanperkoperasian" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Biaya Karyawan</label>
                      <input type="text" class="form-control formatRupiah" name="biayakaryawan" id="biayakaryawan" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Cadangan Risiko</label>
                      <input type="text" class="form-control formatRupiah" name="cadanganrisiko" id="cadanganrisiko" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Kas</label>
                      <input type="text" class="form-control formatRupiah" name="kas" id="kas" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Modal Sendiri</label>
                      <input type="text" class="form-control formatRupiah" name="modalsendiri" id="modalsendiri" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Modal Sendiri Tertimbang</label>
                      <input type="text" class="form-control formatRupiah" name="modaltertimbang" id="modaltertimbang" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Paritsipasi Bruto</label>
                      <input type="text" class="form-control formatRupiah" name="partisipasibruto" id="partisipasibruto" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Paritsipasi Netto</label>
                      <input type="text" class="form-control formatRupiah" name="partisipasinetto" id="partisipasinetto" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Pendapatan</label>
                      <input type="text" class="form-control formatRupiah" name="pendapatan" id="pendapatan" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>P.E.A</label>
                      <input type="text" class="form-control formatRupiah" name="pea" id="pea" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Pinjaman Bermasalah</label>
                      <input type="text" class="form-control formatRupiah" name="pinjamanbermasalah" id="pinjamanbermasalah" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Pinjaman Beresiko</label>
                      <input type="text" class="form-control formatRupiah" name="pinjamanberisiko" id="pinjamanberisiko" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Pinjaman Yang Diberikan</label>
                      <input type="text" class="form-control formatRupiah" name="pinjamandiberikan" id="pinjamandiberikan" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Pinjaman Yang Berisiko</label>
                      <input type="text" class="form-control formatRupiah" name="pinjamandiberikanberisiko" id="pinjamandiberikanberisiko" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>SHU Bagian Anggota</label>
                      <input type="text" class="form-control formatRupiah" name="shubagiananggota" id="shubagiananggota" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>SHU Kotor</label>
                      <input type="text" class="form-control formatRupiah" name="shukotor" id="shukotor" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>SHU Sebelum Pajak</label>
                      <input type="text" class="form-control formatRupiah" name="shusebelumpajak" id="shusebelumpajak" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Simpanan Pokok</label>
                      <input type="text" class="form-control formatRupiah" name="simpananpokok" id="simpananpokok" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Simpanan Wajib</label>
                      <input type="text" class="form-control formatRupiah" name="simpananwajib" id="simpananwajib" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Total Aset</label>
                      <input type="text" class="form-control formatRupiah" name="totalaset" id="totalaset" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Volume Pinjaman</label>
                      <input type="text" class="form-control formatRupiah" name="volumepinjaman" id="volumepinjaman" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Volume Pinjaman Pada Anggota</label>
                      <input type="text" class="form-control formatRupiah" name="volumepinjamananggota" id="volumepinjamananggota" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Kepatuhan Syariah</label>
                      <input type="text" class="form-control formatRupiah" name="kepatuhansyariah" id="kepatuhansyariah" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Kewajiban Lancar</label>
                      <input type="text" class="form-control formatRupiah" name="kewajibanlancar" id="kewajibanlancar" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Dana Yang Diterima</label>
                      <input type="text" class="form-control formatRupiah" name="danaditerima" id="danaditerima" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                      <label>Total Modal Sendiri</label>
                      <input type="text" class="form-control formatRupiah" name="totalmodalsendiri" id="totalmodalsendiri" data-a-sign="Rp " data-a-dec="," data-a-sep="." required>
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