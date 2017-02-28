$(document).ready(function() {
    var table = $('#tabelKetua').DataTable(); 
    $('#tabelKetua tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $( ".nav-pills #ketua" ).click(function() {
      var table = $('#tabelKetua').DataTable(); 
        $('#tabelKetua tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    });

    $( ".nav-pills #sekre" ).click(function() {
      var table = $('#tabelSekretaris').DataTable(); 
        $('#tabelSekretaris tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    });

    $( ".nav-pills #benda" ).click(function() {
      var table = $('#tabelBendahara').DataTable();
 
        $('#tabelBendahara tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    });

    $( ".nav-pills #pengaw" ).click(function() {
      var table = $('#tabelPengawas').DataTable();
 
        $('#tabelPengawas tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    });

    $( ".nav-pills #manag" ).click(function() {
       var table = $('#tabelManager').DataTable();
 
        $('#tabelManager tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    }); 

      $( ".nav-pills #karya" ).click(function() {
       var table = $('#tabelKaryawan').DataTable();

        $('#tabelKaryawan tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    });

    $( ".nav-pills #dewan" ).click(function() {
       var table = $('#tabelDewanPengawasSyariah').DataTable();
 
        $('#tabelDewanPengawasSyariah tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    });   
} );