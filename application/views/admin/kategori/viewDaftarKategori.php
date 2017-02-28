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
  only screen and (max-width: 767px)  {
  body {
      margin-top:27px;
      }
      /* Force table to not be like tables anymore */
      #tabelKategori table, #tabelKategori thead, #tabelKategori tbody, #tabelKategori th, #tabelKategori td, #tabelKategori tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      #tabelKategori thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      #tabelKategori tr { border: 3px solid #ccc; }

      #tabelKategori td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;        
      }

      #tabelKategori td:before {
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
      #tabelKategori td:nth-of-type(1):before { content: "No"; text-align: left;}
      #tabelKategori td:nth-of-type(2):before { content: "Nama Kategori"; text-align: left;}
      #tabelKategori td:nth-of-type(3):before { content: "Edit"; text-align: left;}    
      #tabelKategori td:nth-child(1) { text-align: right;}
      #tabelKategori td:nth-child(2) { text-align: right;}
      #tabelKategori td:nth-child(3) { text-align: right;}
    }  

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
  </br><!--/.row--> 
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-8">
            <div class="panel panel-default">
              <div class="panel-heading">Daftar Kategori Produk&nbsp;&nbsp;
                  <a class="btn-sm btn-primary" href ="<?= base_url('Kategori/index') ?>">Tambah Kategori</a>
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
              <table id="tabelKategori" class="display" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>                         
                        <th>Edit</th>                  
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          $no = 1;            
                          foreach ($result['data'] as $row)
                          { ?>
                                <tr>
                                    <td><?php echo $no;$no++; ?></td>
                                    <td><?php echo $row['nama']; ?></td>                                                        
                                    <td>                               
                                     <a class="btn-sm btn-primary" href ="<?= base_url('Kategori/editKategori') ?>/<?php echo $row['id']?>">
                                     Edit</a>
                                     &nbsp;
                                     <a class="btn-sm btn-danger" href ="<?= base_url('Kategori/hapusKategori') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Kategori ini?');">
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
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#tabelKategori').DataTable();
 
    $('#tabelKategori tbody').on( 'click', 'tr', function () {
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