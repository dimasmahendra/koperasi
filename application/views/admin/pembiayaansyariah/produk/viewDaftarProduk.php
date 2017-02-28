<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>

<style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 768px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelProdukPembiayaan table, #tabelProdukPembiayaan thead, #tabelProdukPembiayaan tbody, #tabelProdukPembiayaan th, #tabelProdukPembiayaan td, #tabelProdukPembiayaan tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelProdukPembiayaan thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelProdukPembiayaan tr { border: 3px solid #ccc; }

      #tabelProdukPembiayaan td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
      }

      #tabelProdukPembiayaan td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
      }
      /*
      Label the data
      */
      #tabelProdukPembiayaan td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelProdukPembiayaan td:nth-of-type(2):before { content: "Username"; text-align: left;}
      #tabelProdukPembiayaan td:nth-of-type(3):before { content: "Nama"; text-align: left;}
      #tabelProdukPembiayaan td:nth-of-type(4):before { content: "Email"; text-align: left;}
      #tabelProdukPembiayaan td:nth-of-type(5):before { content: "Telepon"; text-align: left;}
      #tabelProdukPembiayaan td:nth-of-type(6):before { content: "Akses Admin"; text-align: left;}
      #tabelProdukPembiayaan td:nth-of-type(7):before { content: "Foto"; text-align: left;}
      #tabelProdukPembiayaan td:nth-of-type(8):before { content: "Status"; text-align: left;}
      #tabelProdukPembiayaan td:nth-child(1) { text-align: right;}
      #tabelProdukPembiayaan td:nth-child(2) { text-align: right;}
      #tabelProdukPembiayaan td:nth-child(3) { text-align: right;}
      #tabelProdukPembiayaan td:nth-child(4) { text-align: right;}
      #tabelProdukPembiayaan td:nth-child(5) { text-align: right;}
      #tabelProdukPembiayaan td:nth-child(6) { text-align: right;}
      #tabelProdukPembiayaan td:nth-child(7) { text-align: right;}
      #tabelProdukPembiayaan td:nth-child(8) { text-align: right;}
    }  
  }

  </style>
  <script src="<?php echo base_url('asset_admin/tinymce/js/tinymce/tinymce.dev.js') ?>"></script>
<script src="<?php echo base_url('asset_admin/tinymce/js/tinymce/plugins/table/plugin.dev.js') ?>"></script>
<script src="<?php echo base_url('asset_admin/tinymce/js/tinymce/plugins/paste/plugin.dev.js') ?>"></script>
<script src="<?php echo base_url('asset_admin/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js') ?>"></script>
  <div class="modal fade" id="modalEditProdukBiayaSyariah" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Edit Produk Pembiayaan Syariah</h4>
      </div>

      <form name="form1" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>PembiayaanSyariah/updateProdukSyariah">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >Nama Produk</label>
              <div class="col-md-7">
                  <input name="namaprogram" type="text" id="namaprogram" class="form-control" required>
                <input type="hidden" id="id" name="id" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >Akad</label>
              <div class="col-md-7">
                <input type="text" id="akad" name="akad" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" >Deskripsi</label>
              <div class="col-md-7">
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button href="#" id="etombolSimpanDewan" type="submit" class="btn btn-primary">Submit</button>
          </div> 
        </div>
      </form>
    </div>    
  </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Daftar Produk Pembiayaan Syariah&nbsp;&nbsp;
              <a class="btn-sm btn-primary" href ="<?= base_url('PembiayaanSyariah/index') ?>">Tambah Produk</a>
          </div>
          <div class="panel-body">

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

          <!-- <table class="table table-bordered"> -->
          <table id="tabelProdukPembiayaan" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>Nama Program</th>  
                <th>Akad</th>
                <th>Deskripsi</th>                             
                <th width="12%">Aksi</th>                  
              </tr>
            </thead>
            <tbody>
                <?php
                  $no = 1;            
                  foreach ($result['data'] as $row)
                  { ?>
                  <tr>
                      <td><?php echo $no;$no++; ?></td>
                      <td><?php echo $row['namaprogram']; ?></td>
                      <td><?php echo $row['akad']; ?></td>
                      <td max(100)> <?php echo substr($row['deskripsi'], 0, 300); ?> ......</td>
                      <td>                               
                       <!-- <a class="btn-sm btn-primary" href ="<?= base_url('PembiayaanSyariah/ubahProduk') ?>/<?php echo $row['id']?>">
                       Edit</a> -->

                       <a href ="#" class="edit" data-toggle="modal" data-target="#modalEditProdukBiayaSyariah" data-indikator="<?php echo $row['id']; ?>" data-namaprogram="<?php echo $row['namaprogram']; ?>" data-akad="<?php echo $row['akad']; ?>" data-deskripsi="<?php echo $row['deskripsi']; ?>"><button class="btn-xs btn-success">Edit</button></a>
                       &nbsp;
                       <a class="btn-sm btn-danger" href ="<?= base_url('PembiayaanSyariah/hapusProdukSyariah') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus hapus Produk Syariah ini?');">
                       Hapus</a> 
                      </td>
                  </tr>
                <?php } ?>            
            </tbody>              
          </table>      

          </div>
        </div>
      </div>
    </div><!--/.row-->  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#tabelProdukPembiayaan').DataTable();
 
    $('#tabelProdukPembiayaan tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#hapus').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );
</script>

<script>

$('.edit').click(function(){

  var id          = $(this).data('indikator');
  var namaprogram = $(this).data('namaprogram');
  var akad        = $(this).data('akad');
  var deskripsi   = $(this).data('deskripsi');

  if (id) {
    $('#id').val(id);
    $('#namaprogram').val(namaprogram);
    $('#akad').val(akad);
    tinymce.get('deskripsi').setContent(deskripsi);
  }
  else{
    alert('Data tidak ditemukan !!!');
  }
});

</script>

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
  </script>