<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Admin</title>

<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/bootstrapvalidator.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/validatorForm2.js') ?>" rel="stylesheet"></script>
<!-- modal Style custom -->
<style>
  .modal-header {
    background: #203864;
  }
  .modal-title {
    color: #fff;
  }
  .alert .close, .modal-header .close {
    color: #fff; 
    opacity: 1;
  }
  .modal-body .form-group .input-group-addon {
    background-color: #eee;
  }
</style>
<!-- End modal Style custom -->

<style type="text/css">
.has-feedback .form-control-feedback {
    top: 0px;
    right: 77px;
}
.form-horizontal .has-feedback .form-control-feedback {
    top: 0px;
    right: 0px;
}
</style>

<style>

  /*
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
body {
    margin-top:27px;
    }
    /* Force table to not be like tables anymore */
    #tabelPengaturanSimpananBerjangka table, #tabelPengaturanSimpananBerjangka thead, #tabelPengaturanSimpananBerjangka tbody, #tabelPengaturanSimpananBerjangka th, #tabelPengaturanSimpananBerjangka td, #tabelPengaturanSimpananBerjangka tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    #tabelPengaturanSimpananBerjangka thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    #tabelPengaturanSimpananBerjangka tr { border: 3px solid #ccc; }

    #tabelPengaturanSimpananBerjangka td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    #tabelPengaturanSimpananBerjangka td:before {
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
    #tabelPengaturanSimpananBerjangka td:nth-of-type(1):before { content: "No"; text-align: left;}
    #tabelPengaturanSimpananBerjangka td:nth-of-type(2):before { content: "Tipe Bunga"; text-align: left;}
    #tabelPengaturanSimpananBerjangka td:nth-of-type(3):before { content: "Bunga"; text-align: left;}
    #tabelPengaturanSimpananBerjangka td:nth-of-type(4):before { content: "Denda Keterlambatan /Bulan"; text-align: left;}
    #tabelPengaturanSimpananBerjangka td:nth-child(1) { text-align: right;}
    #tabelPengaturanSimpananBerjangka td:nth-child(2) { text-align: right;}
    #tabelPengaturanSimpananBerjangka td:nth-child(3) { text-align: right;}
    #tabelPengaturanSimpananBerjangka td:nth-child(4) { text-align: right;}
    #tabelPengaturanSimpananBerjangka td:nth-child(5) { text-align: right;}

  .panel-heading{
    font-weight: bold;
    font-size:15.5px;
  }

  }

  </style>

</head>
<body>
    
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
      <!-- Tabel Inputan Admin -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Pengaturan Peminjaman&nbsp;&nbsp;
          <button type="button" style="float: right;" class="btn btn-primary btn-md visible-lg-block" data-toggle="modal" data-target="#tambahTipeBunga"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg>Tambah Tipe Bunga</button>
          <button type="button" style="float: right;" class="btn btn-primary btn-xs hidden-lg" data-toggle="modal" data-target="#tambahTipeBunga"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg>Tipe Bunga</button>
          </div>
          <div class="panel-body">

          <?php if($this->session->flashdata('message')){?> 
                <div class="alert bg-success" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('message')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button> 
                </div><?php } ?>
          <?php if($this->session->flashdata('warning')){?> 
                <div class="alert bg-warning" role="alert">
                  <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                  <?php echo $this->session->flashdata('warning')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button> 
                </div><?php } ?>

            <?php if($this->session->flashdata('error')){?> 
                  <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                    <?php echo $this->session->flashdata('error')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>  
                  </div><?php } ?>

          <!-- <table class="table table-bordered"> -->
          <table id="tabelPengaturanSimpananBerjangka" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center" style="width: 5%;">No</th> 
                <th class="text-center">Tipe Bunga</th>                    
                <th class="text-center">Bunga</th>
                <th class="text-center">Denda Keterlambatan /Bulan</th>
                <th class="text-center">Aksi</th>                  
              </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            if ($result['status'] == '1') {
      
            foreach ($result['data'] as $row) { ?>
            <tr>
              <td class="text-center"><?php echo $no++; ?></td>
              <td class="text-center"><?php echo $row['nama']; ?></td>
              <td class="text-center"><?php echo number_format($row['persenbunga'], 2); ?> %</td>
              <td class="text-center"><?php echo "Rp ".format_rupiah($row['denda']); ?></td>
              <td class="text-center" >
                  <a href="javascript:;" class="ubahTipe" data-id="<?php echo $row['id']; ?>" data-tipebunga_id="<?php echo $row['tipebunga_id']; ?>" data-bunga="<?php echo $row['persenbunga']; ?>" data-denda="<?php echo $row['denda']; ?>"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ubahTipeBunga" id="ubahTipe" data-id="<?php echo $row['id']; ?>" data-tipebunga_id="<?php echo $row['tipebunga_id']; ?>" data-bunga="<?php echo $row['persenbunga']; ?>" data-denda="<?php echo $row['denda']; ?>">Ubah</button></a>
                  <a href="<?php echo base_url();?>Peminjaman/hapusPengaturanPeminjaman/<?php echo $row['id']?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Pastikan tidak ada peminjaman yang menggunakan tipe bungan ini.');">Hapus</button></a>
                </td>
            </tr>
            <?php } } ?>
            </tbody>              
          </table>      
          </div>
        </div>
      </div>
    </div><!--/.row--> 

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-footer">
            <div class="panel-body">

              <div class="row">
                <div class="col-md-12 form-group">
                  <label>Minimal Biaya Peminjaman : </label>
                  
                  <?php if($minimalPinjam['status'] == 0) { echo "Rp 0,00";}
                  else {
                    echo "Rp ".number_format ($minimalPinjam['data']['minimalpinjam'] , 2, ',', '.');} 
                    ?>
                  <div class="pull-right">                  
                    <a href ="#" data-toggle="modal" data-target="#myModal6"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Ubah</button></a>
                  </div>
                </div>
              </div>            

            </div>
          </div> 
        </div>
      </div>
    </div>

    <!-- Modal Minimal Simpanan Peminjaman -->
    <div class="modal fade" id="myModal6" role="dialog">
      <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color: #203864;">
            <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
            <h4 class="modal-title" style="color:white;">Minimal Biaya Peminjaman</h4>
          </div>
          <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" 
          action=" <?php if($minimalPinjam['status'] == 0){ echo "insertMinimalPeminjaman";} else{ echo "updateMinimalPeminjaman";}?> ">
              <div class="modal-body edit-content">  
                <div class="form-group">
                  <label class="control-label col-sm-5" for="nama">Minimal Peminjaman : </label>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <input type="text" class="form-control" id="minimalpinjam" name="minimalpinjam">                      
                    </div>                       
                  </div>
                </div> 
                
                <div class="modal-footer">
                  <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ubah</button>
                </div> 
              </div>                               
          </form>

        </div>    
      </div>
    </div>
    <!-- tambahTipeBunga Modal -->
    <div class="modal fade" id="tambahTipeBunga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambah Tipe Bunga Baru</h4>
          </div>
          <form method="POST" id="form1" action="<?php echo base_url();?>Peminjaman/tambahPengaturanPeminjaman">
            <div class="modal-body">
              
             <div class="form-group">
                <label for="exampleInputEmail1">Tipe Bunga</label>
                <select class="form-control" name="tipebunga_id" id="combobox1">
                  <option>-Pilih Tipe Bunga-</option>
                  <?php foreach ($tipeBunga['data'] as $row) { ?>
                  <option value="<?php echo $row['id']?>" <?php echo combo_disabled($result['data'], $row['id']);?>><?php echo $row['nama']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                 <label for="bunga">Bunga</label>
                 <div class="input-group">
                    <input type="text" class="form-control" name="persenbunga" id="persenbunga" placeholder="Bunga dalam angka">
                  <div class="input-group-addon">Bulan</div>
                </div> 
              </div>

               <div class="form-group">
                 <label for="denda">Denda Keterlambatan</label>
                 <div class="input-group">
                  <input type="text" class="form-control" name="denda" id="denda" placeholder="Denda keterlambatan dalam angka">
                  <div class="input-group-addon">per Bulan</div>
                </div>  
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- ubahTipeBunga Modal -->
    <div class="modal fade" id="ubahTipeBunga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ubah Tipe Bunga</h4>
          </div>
          <form method="POST" id="form2" action="<?php echo base_url();?>Peminjaman/updatePengaturanPeminjaman">
            <div class="modal-body">

              <div class="form-group">
                <label for="exampleInputEmail1">Tipe Bunga</label>
                <select class="form-control" name="editTipebunga" id="combobox2"> 
                  <option>-Pilih Tipe Bunga-</option>
                  <?php foreach ($tipeBunga['data'] as $row) { ?>
                  <option  <?php echo combo_disabled($result['data'], $row['id']);?> value="<?php echo $row['id']?>"><?php echo $row['nama']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                 <label for="bunga">Bunga</label>
                 <input type="hidden" name="editTipebunga_id" id="editTipebunga_id">
                 <input type="hidden" class="form-control" name="editId">
                 <div class="input-group">
                  <input type="text" class="form-control" name="editPersenbunga" id="persenbunga" placeholder="Bunga">
                  <div class="input-group-addon">Bulan</div>
                </div> 
              </div>

               <div class="form-group">
                <label for="denda">Denda Keterlambatan</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="editDenda" id="denda" placeholder="Denda keterlambatan dalam angka">
                    <div class="input-group-addon">per Bulan</div>
                </div> 
              </div> 
            </div>
         
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
         </form>
        </div>
      </div>
    </div>

</div>

<script type="text/javascript">
var table
  $(document).ready(function() {
    table = $('#tabelPengaturanSimpananBerjangka').DataTable();
 
    $('#tabelPengaturanSimpananBerjangka tbody').on( 'click', 'tr', function () {
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

  $(document).ready(function(){
    $('.ubahTipe').click(function(){

      var id           = $(this).data('id');
      var tipebunga_id = $(this).data('tipebunga_id');
      var bunga        = $(this).data('bunga');
      var denda        = $(this).data('denda');

      if (id) {
        $('[name="editId"]').val(id);
        $('[name="editTipebunga"]').val(tipebunga_id);
        $('[name="editTipebunga_id"]').val(tipebunga_id);
        $('[name="editPersenbunga"]').val(bunga);
        $('[name="editDenda"]').val(denda);
      }
      else {
        alert('data tidak ditemukan !!!');
      }
    });
  });

  $(document).ready(function(){
      $( "#combobox2" ).change(function () {
        var str = "";
        $( "select option:selected" ).each(function() {
          str = $( this ).val() + " ";
        });
        $( "#editTipebunga_id" ).val(str);
      })
      .change();
    });

</script>