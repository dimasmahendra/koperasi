<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    </br><!--/.row-->
    <div class="row">
      <div class="col-lg-12">
        <form name="form" id="form1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>Transaksi/metodeTransaksi">
          <div class="panel panel-default">
            <div class="panel-heading">Metode Pembayaran Transaksi</div>
            <div class="panel-body">
              <div class="row">
                  <div class="col-md-2 form-group"> 
                    <div class="input-group">          
                      <select class="form-control" id="metode" onChange="check(this);">
                        <option value="Cash">Cash</option>
                        <option value="SSP">SSP</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4 form-group">
                    <div class="input-group">   
                      <input type="text" id="refnumberssp" style="display:none;" name="refnumberssp" class="form-control" style="height: 34px;" placeholder="No. Ref SSP">
                    </div>
                  </div>
              </div>                      
            <div class="pull-right"><button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Pilih</button></div>    
            </div>
          </div>
        </form>
      </div>
    </div>
</div> 

<script>
    function check() {
        var dropdown = document.getElementById("metode");
        var current_value = dropdown.options[dropdown.selectedIndex].value;

        if (current_value == "SSP") {
            document.getElementById("refnumberssp").style.display = "block";
        }
        else {
            document.getElementById("refnumberssp").style.display = "none";
        }
    }
</script>