<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet"> 
<style type="text/css">
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
  <div class="row">
    <div class="col-lg-12">
      <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>RAT/updateRAT">
          <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">Edit Rapat Anggota Tahunan (RAT)</div>
                <div class="panel-body">
                 
                    <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="rat_id">
                    <input type="hidden" value="<?php echo $koperasi_id; ?>" name="koperasi_id">        

                    <div class="row">
                      <div class="col-md-2 form-group">                  
                        <input type="hidden" value="<?php echo $tahunoperasi_id; ?>" name="tahunoperasi_id">
                      </div>
                    </div> 

                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label>Tempat</label>
                          <div class="input-group">
                            <input name="tempat" type="text" id="tempat" class="form-control" style="height: 34px;" value="<?php echo $tempat; ?>" required>
                          </div>
                      </div>
                    </div></br>

                    <div class="row">
                      <div class="col-md-3 form-group">                   
                        <label>Tanggal</label></br>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input type="text" id="datetimepicker2" style="min-height:34px" name="tanggal" value="<?php echo $tanggal; ?>">
                          </div>
                      </div>
                    </div></br>                                               
                    
                    <div class="row">
                      <div class="col-md-12 form-group">                                 
                        <textarea class="form-control" name="info"><?php echo $info; ?></textarea>
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
  </div>
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