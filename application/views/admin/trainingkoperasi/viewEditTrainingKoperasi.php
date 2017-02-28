<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet">

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
    </br><!--/.row-->
    <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px" action="<?php echo base_url(); ?>trainingKoperasi/updateTraining">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Edit Pelatihan Koperasi</div>
              <div class="panel-body" style="margin-left: 20px">

                  <div class="row">
                    <div class="col-md-2 form-group">                  
                      <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="trainingkoperasi_id">
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-md-4 col-xs-12 form-group">
                    <label>Judul</label>
                    <div class="input-group">
                      <input name="judulTraining" type="text" id="judulTraining" class="form-control" style="height: 34px;" value= "<?php echo $judul; ?>" required>
                    </div>
                    </div>
                  </div></br> 

                  <div class="row">
                  <div class="col-md-3 form-group">                   
                      <label>Tanggal Training</label>
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      <input type="text" id="datetimepicker2" style="min-height:34px" name="tanggalTraining" value= "<?php echo $tanggal; ?>">
                      </div>
                  </div>
                  </div></br>                 

                  <div class="row row-table">
                      <div class="col-md-2 col-xs-12 col-table form-group" style="margin-right: 10px">
                          <div class="col-content md">
                              <label>Lokasi</label>
                              <div class="input-group">
                              <input name="lokasiTraining" type="text" id="lokasiTraining" class="form-control" style="height: 34px;" value= "<?php echo $tempat; ?>" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-2 col-xs-12 col-table form-group" style="margin-right: 10px">
                          <div class="col-content md">
                              <label>Durasi/Lama</label>
                              <div class="input-group">                      
                              <input name="durasiTraining" type="text" id="durasiTraining" class="form-control" style="height: 34px;" value= "<?php echo $durasi; ?>" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-2 col-xs-12 col-table form-group" style="margin-right: 10px">
                          <div class="col-content md">
                              <label>Jumlah Peserta</label>
                              <div class="input-group">                     
                              <input name="kuotaTraining" type="number" id="kuotaTraining" class="form-control" style="height: 34px;" value= "<?php echo $kapasitas; ?>" required>
                              </div>
                          </div>
                      </div>
                  </div></br>                  
                  
                  <div class="row">
                    <div class="col-md-12 col-xs-12 form-group">                                 
                      <textarea class="form-control" name="isi"><?php echo $isi; ?></textarea>
                    </div>
                  </div>

                <div class="row" style="margin-left:10px;">
                        <div class="col-xs-10">

                        <?php if($foto ==''|$foto =='no_image.png'){ ?>
                        <img src="<?php echo URL_IMG ?>images/no_image.png" rel="stylesheet" class="img-responsive" alt="Cinque Terre" width="150" height="150">

                        <?php } else { ?>
                      
                        <img src ="<?php echo URL_IMG ?>/images/trainingkoperasi/<?php echo $foto; ?>" rel="stylesheet" class="img-responsive" alt="Cinque Terre" width="300" height="300">

                        <?php  } ?>
                    
                      </div>
                      </div></br>              

                      <div class="row">                   
                          <div class="col-md-4 col-xs-12 form-group">
                              <label>Foto</label>
                              <input name="foto" type="file" id="foto" style="height:40px;" class="form-control">
                          </div>
                      </div> 

                  <div class="pull-right">
                      <button class="btn btn-default"><a href="<?php echo base_url(); ?>trainingKoperasi/daftarTrainingKoperasi">Batal</a></button>
                      <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Simpan</button>         
                  </div>

              </div>
            </div>
        </div>
    </form>    
</div>

<script src="<?= base_url('asset_admin/js/jquery.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>
<script src="<?php echo base_url('asset_admin/tinymce/js/tinymce/tinymce.dev.js') ?>"></script>
<script src="<?php echo base_url('asset_admin/tinymce/js/tinymce/plugins/table/plugin.dev.js') ?>"></script>
<script src="<?php echo base_url('asset_admin/tinymce/js/tinymce/plugins/paste/plugin.dev.js') ?>"></script>
<script src="<?php echo base_url('asset_admin/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js') ?>"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>

<script type="text/javascript">
  tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern"
    ],
    external_plugins: {
      //"moxiemanager": "/moxiemanager-php/plugin.js"
    },
    content_css: "<?php echo base_url('asset_admin/tinymce/tests/manual/css/bootstrap-datetimepicker.min.css') ?>",
    add_unload_trigger: false,

    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table",

    image_advtab: true,

    style_formats: [
      {title: 'Bold text', format: 'h1'},
      {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
      {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
      {title: 'Example 1', inline: 'span', classes: 'example1'},
      {title: 'Example 2', inline: 'span', classes: 'example2'},
      {title: 'Table styles'},
      {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],

    template_replace_values : {
      username : "Jack Black"
    },

    template_preview_replace_values : {
      username : "Preview user name"
    },

    link_class_list: [
      {title: 'Example 1', value: 'example1'},
      {title: 'Example 2', value: 'example2'}
    ],

    image_class_list: [
      {title: 'Example 1', value: 'example1'},
      {title: 'Example 2', value: 'example2'}
    ],

    templates: [
      {title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
      {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
    ],

    setup: function(ed) {
      /*ed.on(
        'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
        'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
        'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
        console.log(e.type, e);
      });*/
    },

    spellchecker_callback: function(method, data, success) {
      if (method == "spellcheck") {
        var words = data.match(this.getWordCharPattern());
        var suggestions = {};

        for (var i = 0; i < words.length; i++) {
          suggestions[words[i]] = ["First", "second"];
        }

        success({words: suggestions, dictionary: true});
      }

      if (method == "addToDictionary") {
        success();
      }
    }
  }); 

    $('#datetimepicker2').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd',        
  });
</script>


    
            
        