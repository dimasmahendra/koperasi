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
<script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br>
    <section id="menu">  
      <section>
        <div class="modal fade" id="myModal2" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Transaksi Koperasi</h4>
              </div>
              <div class="modal-body edit-content">
                <div class="id_content">
                  Id : <label id="content-id"></label></br>
                  Nama : <label id="content-nama"></label>
                </div>
                <div class="username_content">                  
                </div>
                <div class="telepon_content">                  
                </div>       
              </div>

              <!-- <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>Transaksi/cancelTransaksi">

                <div class="modal-footer">
                  <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Ya</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
              </form> -->
            </div>    
          </div>
        </div> 
        <div class="modal fade" id="myModalini" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Transaksi Koperasi</h4>
              </div>
              <div class="modal-body edit-content">
                <div class="id_content">
                  Id : <label id="content-id"></label></br>
                  Nama : <label id="content-nama"></label>
                  <input type="" name="">
                </div>
                <div class="username_content">                  
                </div>
                <div class="telepon_content">                  
                </div>       
              </div>
            </div>    
          </div>
        </div> 
      </section> 
    </section>  

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Rekapitulasi Iuran Wajib Anggota Bulan</div>
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
          <table id="tabelAnggotaKoperasi" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>  
                    <th>Tagihan</th>
                    <th>Detail</th>
                    <th>Total</th>  
                    <th>id</th>                    
                    <th>Aksi</th>                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>

                      <tr style="background-color: none">
                          <td style="background-color: none"><?php echo $no;$no++; ?></td>                             
                          <td><?php echo $row['nama']; ?></td>
                          <td><?php echo $row['tagihan']; ?></td>
                          <td><?php echo $row['daftarbulanhuruf']; ?></td>
                          <td><?php echo $row['totaltagihansimpananwajib']; ?></td> 
                          <td><?php echo $row['anggotakoperasi_id']; ?></td>                                                                      
                          <td>                                                       
                            <a href ="#menu" data-toggle="modal" data-target="#myModalini" id="set_menu_content" data-idiuran="<?php echo $row['anggotakoperasi_id']; ?>" data-namaiuran="<?php echo $row['nama']; ?>"><button class="btn btn-success btn-xs">Bayar</button></a>
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
    var table = $('#tabelAnggotaKoperasi').DataTable();
 
    $('#tabelAnggotaKoperasi tbody').on( 'click', 'tr', function () {
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
    $('#myModal2').on('show.bs.modal', function(e) {     

      var $modal = $(this),
        esseyidiuran = e.relatedTarget.dataset.idiuran;
        $modal.find('.modal-body .id_content #content-id').html(esseyidiuran);
        $modal.find('.modal-body .username_content').empty();
        $modal.find('.modal-body .telepon_content').empty();

      var $modal = $(this),
        esseynamaiuran = e.relatedTarget.dataset.namaiuran;
        $modal.find('.modal-body .id_content #content-nama').html(esseynamaiuran);
        $modal.find('.modal-body .username_content').empty();
        $modal.find('.modal-body .telepon_content').empty();

      var locations = [
       <?php
        foreach ($result['data'] as $row) { 
         $username = $row['nama'];
            

          echo "[ '" . $username . "'], \n";                     
         }
         ?>  
      ];

      var bulanIuran = [
       <?php
        foreach ($result['data'] as $row) {         
         $bulan = $row['daftarbulanhuruf'];       

          echo "['" . $bulan . "'], \n";                     
         }
         ?>  
      ];

      var res = bulanIuran.split(',');
      alert(res);

      var i;
    
        for (i = 0; i < locations.length; i++) {
            var nama = locations[i][0];
            var bulan = locations[i][1];
            $('<input type="checkbox" name="radiobtn" onclick="detail(this, \'.detail_content_'+i+'\');" id="checkbox_id">'+nama+'</input></br>').appendTo('.modal-body .username_content');
            $('<div class="detail_content_'+i+'" style="display:block;"><p id="aaa">Telepon : '+bulan+'</p></div>').appendTo('.modal-body .telepon_content');
        }
    });

    function detail(inp, cl) {

      alert($(cl).val());
      /*if (inp.checked) {
     
        $(cl).css('display','block');
      }else{
        $(cl).css('display','none');
      }*/
      // $('').appendTo('.detail_content');
      // alert($(inp).attr('id'));
    };    
</script>