<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.formatCurrency-1.4.0.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/i18n/jquery.formatCurrency.all.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>

<style type="text/css">
  .close {
    color: #fff; 
    opacity: 1;
}
</style>

<style type="text/css">
@media
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {

    body{
      margin-top: 27px;
    }
  
  /* Force table to not be like tables anymore */
  #tabelAnggotaKoperasi table, 
  #tabelAnggotaKoperasi thead, 
  #tabelAnggotaKoperasi tbody, 
  #tabelAnggotaKoperasi th, 
  #tabelAnggotaKoperasi td, 
  #tabelAnggotaKoperasi tr { 
    display: block; 
  }
 
  /* Hide table headers (but not display: none;, for accessibility) */
  #tabelAnggotaKoperasi thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
 
  #tabelAnggotaKoperasi tr { border: 1px solid #ccc; }
 
  #tabelAnggotaKoperasi td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 30%; 
    white-space: normal;
    text-align:left;
  }
 
  #tabelAnggotaKoperasi td:before { 
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%; 
    padding-right: 10px; 
    white-space: nowrap;
    text-align:left;
    font-weight: bold;
  }
 
  /*
  Label the data
  */
  #tabelAnggotaKoperasi td:before { content: attr(data-title); }
    #tabelAnggotaKoperasi td:nth-of-type(1):before { content: "No"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(2):before { content: "Nama Anggota"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(3):before { content: "Tagihan"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(4):before { content: "Detail"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-of-type(5):before { content: "Total"; text-align: left;}
    #tabelAnggotaKoperasi td:nth-child(1) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(2) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(3) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(4) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(5) { text-align: right;}
    #tabelAnggotaKoperasi td:nth-child(6) { text-align: right;}

}
</style>
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
              <div class="modal-header" style="background-color: #203864;">
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                <h4 class="modal-title" style="color:white;">Pembayaran Iuran Wajib Anggota</h4>
              </div>

              <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>Iuran/insertBayar">
                <div class="modal-body edit-content">
                  <div class="display_info"></div></br>
                  <h3>Total Iuran : <b id="output"></b></h3>

                  <div class="modal-footer">
                    <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Bayar</button>
                  </div> 
                </div>                               
              </form>

            </div>    
          </div>
        </div> 
        
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Pembayaran Simpanan Wajib Anggota</div>
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
                          <td><?php echo "Rp ".number_format ($row['totaltagihansimpananwajib'], 2, ',', '.');?></td>                                                            
                          <td>                                                       
                            <a href ="#menu" class="edit" data-toggle="modal" data-target="#myModal2" data-iuran="<?php echo $row['anggotakoperasi_idunik']; ?>"><button class="btn btn-success btn-xs">Bayar</button></a>
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
    $(document).on("click", ".edit", function () {

      var id = $(this).data('iuran');      

       if(id)
       {
          $.ajax({
            type: 'post',
            url:'<?php echo base_url(); ?>Iuran/showDetail',
            data: 
            {
              id:id,
            },
            success: function (response)
            {              
              $( '.display_info' ).html(response);
            }
          });
       }
        
       else
       {
        $( '.display_info' ).html("Please Enter Some Words");
       }
    });    
</script>

<script type="text/javascript">
function valueChanged()
{
  var sum = 0;
  $('.coupon_question:checked').each(function() {
      sum += parseInt($(this).attr("rel"));
  });
  
  $("#output").html(sum);
  $("#output").formatCurrency();
}
</script>