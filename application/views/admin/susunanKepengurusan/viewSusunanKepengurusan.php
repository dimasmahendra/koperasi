<link href="<?= base_url('asset_admin/css/font-awesome.min.css') ?>" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href="<?= base_url('asset_admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/select.dataTables.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/lokasiKoperasi.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/susunanKepengurusan.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/jquery-ui.css') ?>" rel="stylesheet">
<link href="<?= base_url('asset_admin/css/jquery.datetimepicker.css') ?>" rel="stylesheet">

<script src="<?= base_url('asset_admin/js/jquery-2.2.0.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery.dataTables.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.bootstrap.min.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/dataTables.select.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/susunankepengurusan.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/jquery-ui.js') ?>" rel="stylesheet"></script>
<script src="<?= base_url('asset_admin/js/build/jquery.datetimepicker.full.js') ?>" rel="stylesheet"></script>
<style>
.ui-autocomplete {
  max-height: 100px;
  overflow-y: auto;
  z-index:2147483647;
  overflow-x: hidden;
  font-family: inherit;
}
</style>

 <div class="modal fade" id="modalKetua" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pilih Ketua</h4>
      </div>
        <form name="form1" id="formKetua" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/insertKetua">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelketuasatu">Ketua I</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagsketuaSatu" name="tagsketuaSatu">
                <input type="hidden" id="ketuaSatu" name="ketuaSatu" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelketuadua">Ketua II</label>
              <div class="col-md-5"> 
                <input type="text" class="form-control" id="tagsketuaDua" name="tagsketuaDua" value="" disabled>
                <input type="hidden" id="ketuaDua" name="ketuaDua" value="">
              </div>
            </div> 
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="alamat">Ketua III</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagsketuaTiga" name="tagsketuaTiga" value="" disabled>
                <input type="hidden" id="ketuaTiga" name="ketuaTiga" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Submit</button>
          </div> 
        </div>
      </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="modalSekret" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pilih Sekretaris</h4>
      </div>
      <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/insertSekretaris">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelsekretarissatu">Sekretaris I</label>
              <div class="col-md-5"> 
                <input type="text" class="form-control" id="tagssekretarisSatu" name="tagssekretarisSatu">
                <input type="hidden" id="sekretarisSatu" name="sekretarisSatu" value="">
              </div>
            </div> 
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelsekretarisdua">Sekretaris II</label>
              <div class="col-md-5"> 
                <input type="text" class="form-control" id="tagssekretarisDua" name="tagssekretarisDua" value="" disabled>
                <input type="hidden" id="sekretarisDua" name="sekretarisDua" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="alamat">Sekretaris III</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagssekretarisTiga" name="tagssekretarisTiga" value="" disabled>
                <input type="hidden" id="sekretarisTiga" name="sekretarisTiga" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button href="#" id="tombolSimpanSekret" type="submit" class="btn btn-primary">Submit</button>
          </div> 
        </div>                               
      </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="modalBendahara" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pilih Bendahara</h4>
      </div>
      <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/insertBendahara">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelbendaharasatu">Bendahara I</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagsbendaharaSatu" name="tagsbendaharaSatu">
                <input type="hidden" id="bendaharaSatu" name="bendaharaSatu" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelbendaharadua">Bendahara II</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagsbendaharaDua" name="tagsbendaharaDua" value="" disabled>
                <input type="hidden" id="bendaharaDua" name="bendaharaDua" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="alamat">Bendahara III</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagsbendaharaTiga" name="tagsbendaharaTiga" value="" disabled>
                <input type="hidden" id="bendaharaTiga" name="bendaharaTiga" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button href="#" id="tombolSimpanBendahara" type="submit" class="btn btn-primary">Submit</button>
          </div> 
        </div>                               
      </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="modalPengawas" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pilih Pengawas</h4>
      </div>
      <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/insertPengawas">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelketuapengawas">Ketua Pengawas</label>
              <div class="col-md-5"> 
                <input type="text" class="form-control" id="tagsketuaPengawas" name="tagsketuaPengawas">
                <input type="hidden" id="ketuaPengawas" name="ketuaPengawas" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelanggotasatu">Anggota I</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagsanggotaSatu" name="tagsanggotaSatu" value="" disabled>
                <input type="hidden" id="anggotaSatu" name="anggotaSatu" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="alamat">Anggota II</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagsanggotaDua" name="tagsanggotaDua" value="" disabled>
                <input type="hidden" id="anggotaDua" name="anggotaDua" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button href="#" id="tombolSimpanPengawas" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="modalManager" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Pilih Manager</h4>
      </div>
      <form name="form1" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/insertManager">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelmanagersatu">Manager I</label>
              <div class="col-md-5"> 
                <input type="text" class="form-control" id="tagsmanagerSatu" name="tagsmanagerSatu">
                <input type="hidden" id="managerSatu" name="managerSatu" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="labelmanagerdua">Manager II</label>
              <div class="col-md-5"> 
                <input type="text" class="form-control" id="tagsmanagerDua" name="tagsmanagerDua" value="" disabled>
                <input type="hidden" id="managerDua" name="managerDua" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-3" for="alamat">Manager III</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="tagsmanagerTiga" name="tagsmanagerTiga" value="" disabled>
                <input type="hidden" id="managerTiga" name="managerTiga" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button href="#" id="tombolSimpanManager" type="submit" class="btn btn-primary">Submit</button>
          </div> 
        </div>                               
      </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="modalKaryawan" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Isi Info Karyawan Baru</h4>
      </div>

      <form name="formInsertKaryawan" id="formInsertKaryawan" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/insertKaryawan">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Nama Lengkap</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="namaLengkap" name="namaLengkap">
                <input type="hidden" id="idanggota" name="idanggota" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Telepon</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="telepon" name="telepon" >
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Alamat</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="alamat" name="alamat" >
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Pendidikan</label>
              <div class="col-md-5">
                <select name="pendidikan" class="form-control" id="pendidikan" >
                              <option value="">- Select Pendidikan -</option>
                              <option value="Tidak Lulus SD">Tidak Lulus SD</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="box-body">
          <div class="form-group">
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="col-md-5">
                    <div class="radio-inline">
                    <label>
                        <input type="radio" class="il" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" checked >Laki-laki
                    </label>
                    </div>
                    <div class="radio-inline">
                    <label>
                        <input type="radio" class="ip" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" >Perempuan
                    </label>
                    </div>
                    </div>
          </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Jabatan</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="jabatan" name="jabatan" >
              </div>
            </div>
          </div>

          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Mulai Jabatan</label>
              <div class="col-md-5">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" id="tglMulaiJabat" name="tglMulaiJabat" class="form-control">
              </div>
              </div>
            </div>
          </div>

          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Selesai Jabatan</label>
              <div class="col-md-5">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" id="tglSelesaiJabat" name="tglSelesaiJabat" class="form-control">
              </div>
              </div>
            </div>
          </div>

          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Status</label>
              <div class="col-md-5">
                <select class="form-control" id="status" name="status" >
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button href="#" id="tombolSimpan" type="submit" class="btn btn-primary">Submit</button>
          </div> 
        </div>
      </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="modalEditKaryawan" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Edit Data Karyawan</h4>
      </div>

      <form name="formEditKaryawan" id="formEditKaryawan" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/updateKaryawan">
        <div class="modal-body edit-content">
          <input type="hidden" class="form-control" id="id" name="id">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Nama Lengkap</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="enama" name="enama" readonly="">
                <input type="hidden" id="eidanggota" name="eidanggota" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Telepon</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="etelepon" name="etelepon">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Alamat</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="ealamat" name="ealamat">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Pendidikan</label>
              <div class="col-md-5">
                <select name="ependidikan" class="form-control" id="ependidikan">
                              <option value="">- Select Pendidikan -</option>
                              <option value="Tidak Lulus SD">Tidak Lulus SD</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="box-body">
          <div class="form-group">
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="col-md-5">
                    <div class="radio-inline">
                    <label>
                        <input type="radio" class="l" name="ejenis_kelamin" id="ejenis_kelamin" value="Laki-laki" checked >Laki-laki
                    </label>
                    </div>
                    <div class="radio-inline">
                    <label>
                        <input type="radio" class="p" name="ejenis_kelamin" id="ejenis_kelamin" value="Perempuan" >Perempuan
                    </label>
                    </div>
                    </div>
          </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Jabatan</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="ejabatan" name="ejabatan">
              </div>
            </div>
          </div>

          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Mulai Jabatan</label>
              <div class="col-md-5">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" id="etglMulaiJabat" name="tglMulaiJabat" class="form-control">
              </div>
              </div>
            </div>
          </div>

          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Selesai Jabatan</label>
              <div class="col-md-5">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" id="etglSelesaiJabat" name="tglSelesaiJabat" class="form-control">
              </div>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Status</label>
              <div class="col-md-5">
                <select class="form-control" id="estatus" name="estatus">
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
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

<div class="modal fade" id="modalDewan" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Isi Data Dewan Pengawas Syariah</h4>
      </div>

      <form name="formInsertDewanPengawas" id="formInsertDewanPengawas" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/insertDewanPengawasSyariah">
        <div class="modal-body edit-content">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Nama Lengkap</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="namalengkapDewan" name="namalengkapDewan">
                <input type="hidden" id="iddewanPengawas" name="iddewanPengawas" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Telepon</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="teleponDewan" name="teleponDewan" >
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Alamat</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="alamatDewan" name="alamatDewan" >
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Pendidikan</label>
              <div class="col-md-5">
                <select name="pendidikanDewan" class="form-control" id="pendidikanDewan" >
                              <option value="">- Select Pendidikan -</option>
                              <option value="Tidak Lulus SD">Tidak Lulus SD</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="box-body">
          <div class="form-group">
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="col-md-5">
                    <div class="radio-inline">
                    <label>
                        <input type="radio" class="ilDewan" name="jenisKelamin" id="jenisKelamin" value="Laki-laki" checked >Laki-laki
                    </label>
                    </div>
                    <div class="radio-inline">
                    <label>
                        <input type="radio" class="ipDewan" name="jenisKelamin" id="jenisKelamin" value="Perempuan" >Perempuan
                    </label>
                    </div>
                    </div>
          </div>
          </div>


          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Mulai Jabatan</label>
              <div class="col-md-5">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" id="tglMulaiJabatDewan" name="tglMulaiJabat" class="form-control">
              </div>
              </div>
            </div>
          </div>

          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Selesai Jabatan</label>
              <div class="col-md-5">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" id="tglSelesaiJabatDewan" name="tglSelesaiJabat" class="form-control">
              </div>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Status</label>
              <div class="col-md-5">
                <select class="form-control" id="statusDewan" name="statusDewan" >
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button href="#" id="tombolSimpanDewanPengawas" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>    
  </div>
</div>

<div class="modal fade" id="modalEditDewanPengawas" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #203864;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title" style="color:white;">Edit Data Dewan Pengawas Syariah</h4>
      </div>

      <form name="formEditDewanPengawas" id="formEditDewanPengawas" class="form-horizontal" enctype="multipart/form-data" method="POST" style="margin-top: 0px; margin-bottom: 0px; margin-left:15px" action="<?php echo base_url(); ?>SusunanKepengurusan/updateDewanPengawasSyariah">
        <div class="modal-body edit-content">
          <input type="hidden" class="form-control" id="idDewan" name="idDewan">
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Nama Lengkap</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="enamalengkapDewan" name="enamalengkapDewan" readonly="">
                <input type="hidden" id="eiddewanPengawas" name="eiddewanPengawas" value="">
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Telepon</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="eteleponDewan" name="eteleponDewan" >
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Alamat</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="ealamatDewan" name="ealamatDewan" >
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Pendidikan</label>
              <div class="col-md-5">
                <select name="ependidikanDewan" class="form-control" id="ependidikanDewan" >
                              <option value="">- Select Pendidikan -</option>
                              <option value="Tidak Lulus SD">Tidak Lulus SD</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="D4">D4</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="box-body">
          <div class="form-group">
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="col-md-5">
                    <div class="radio-inline">
                    <label>
                        <input type="radio" class="lDewan" name="ejenisKelamin" id="ejenisKelamin" value="Laki-laki" checked >Laki-laki
                    </label>
                    </div>
                    <div class="radio-inline">
                    <label>
                        <input type="radio" class="pDewan" name="ejenisKelamin" id="ejenisKelamin" value="Perempuan" >Perempuan
                    </label>
                    </div>
                    </div>
          </div>
          </div>


          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Mulai Jabatan</label>
              <div class="col-md-5">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" id="etglMulaiJabatDewan" name="tglMulaiJabat" class="form-control">
              </div>
              </div>
            </div>
          </div>

          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Selesai Jabatan</label>
              <div class="col-md-5">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="text" id="etglSelesaiJabatDewan" name="tglSelesaiJabat" class="form-control">
              </div>
              </div>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
              <label class="control-label col-sm-4" >Status</label>
              <div class="col-md-5">
                <select class="form-control" id="estatusDewan" name="estatusDewan" >
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button href="#" id="etombolSimpanDewanPengawas" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>    
  </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
</br>

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

<div class="col-md-12">
  <div class="panel panel-default">
  <div class="panel-body tabs">
    <ul class="nav nav-pills">
      <li id="ketua" class="active"><a href="#pilltab1-tab" data-toggle="tab">Ketua</a></li>
      <li id="sekre"><a href="#pilltab2-tab" data-toggle="tab" id="tab">Sekretaris</a></li>
      <li id="benda"><a id="tab3" href="#pilltab3-tab" data-toggle="tab">Bendahara</a></li>
      <li id="pengaw"><a href="#pilltab4-tab" data-toggle="tab">Pengawas</a></li>
      <li id="manag"><a href="#pilltab5-tab" data-toggle="tab">Manager</a></li>
      <li id="karya"><a href="#pilltab6-tab" data-toggle="tab">Karyawan</a></li>
      <li id="dewan"><a href="#pilltab7-tab" data-toggle="tab">Dewan Pengawas Syariah</a></li>
    </ul>

      <div class="tab-content">
        <h4 class="d_active tab_drawer_heading" rel="pilltab1-tab"><a class="aauto" href="#h4pilltab1-tab" data-toggle="tab">Ketua<i class="fa"></i></a></h4>
          <div class="tab-pane active" id="pilltab1-tab">
            <div class="col-lg-12">
              <div class="panel-body">                 
                <div class="panel-heading">History Ketua&nbsp;&nbsp;
                    <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalKetua" href ="#">Pilih Ketua</a>
                </div></br>             
                <!-- <table class="table table-bordered"> -->
                <table id="tabelKetua" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>  
                      <th>Telepon</th>
                      <th>Pendidikan</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>Mulai Jabatan</th>
                      <th>Selesai Jabatan</th>
                      <th>Aksi</th>                         
                    </tr>
                  </thead>                      
                  <tbody>
                    <?php
                    if($result['status'] == 0) {
                      echo "";
                    }
                    else
                    {
                      $no = 1;            
                      foreach ($result['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['telepon']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['pendidikan']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['jeniskelamin']; ?></td>
                                <td><?php echo $row['jabatan']; ?></td>
                                <td><?php echo $row['tahunoperasi']['tanggalmulai']; ?></td>
                                <td><?php echo $row['tahunoperasi']['tanggalselesai']; ?></td>
                                <td>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('SusunanKepengurusan/hapusHistory') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus histori ini?');">
                                 Hapus</a>
                                </td>
                            </tr>
                    <?php } }?>
                  </tbody>              
                </table>                   
              </div>      
            </div>
          </div>     

        <h4 class="tab_drawer_heading" rel="pilltab2-tab"><a class="aauto" href="#h4pilltab2-tab" data-toggle="tab">Sekretaris<i class="fa"></i></a></h4>
          <div class="tab-pane" id="pilltab2-tab">
            <div class="col-xs-12">
              <div class="panel-body">                 
                <div class="panel-heading">History Sekretaris&nbsp;&nbsp;
                    <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalSekret" href ="#">Pilih Sekretaris</a>
                </div></br>             
                <!-- <table class="table table-bordered"> -->
                <table id="tabelSekretaris" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>  
                      <th>Telepon</th>
                      <th>Pendidikan</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>Mulai Jabatan</th>
                      <th>Selesai Jabatan</th>
                      <th>Aksi</th>                         
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($pengurussekretaris['status'] == 0) {
                      echo "";
                    }
                    else
                    {
                      $no = 1;            
                      foreach ($pengurussekretaris['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['telepon']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['pendidikan']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['jeniskelamin']; ?></td>
                                <td><?php echo $row['jabatan']; ?></td>
                                <td><?php echo $row['tahunoperasi']['tanggalmulai']; ?></td>
                                <td><?php echo $row['tahunoperasi']['tanggalselesai']; ?></td>
                                <td>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('#') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus histori ini?');">
                                 Hapus</a> 
                                </td>
                            </tr>
                    <?php } }?>
                  </tbody>
                </table>                   
              </div>        
            </div>
          </div>

        <h4 class="tab_drawer_heading" rel="pilltab3-tab"><a class="aauto" href="#h4pilltab3-tab" data-toggle="tab">Bendahara <i class="fa"></i></a></h4>
          <div class="tab-pane" id="pilltab3-tab">
            <div class="col-xs-12">
              <div class="panel-body">                 
                <div class="panel-heading">History Bendahara&nbsp;&nbsp;
                    <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalBendahara" href ="#">Pilih Bendahara</a>
                </div></br>             
                <!-- <table class="table table-bordered"> -->
                <table id="tabelBendahara" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>  
                      <th>Telepon</th>
                      <th>Pendidikan</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>Mulai Jabatan</th>
                      <th>Selesai Jabatan</th>
                      <th>Aksi</th>                         
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($pengurusbendahara['status'] == 0) {
                      echo "";
                    }
                    else
                    {
                      $no = 1;            
                      foreach ($pengurusbendahara['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['telepon']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['pendidikan']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['jeniskelamin']; ?></td>
                                <td><?php echo $row['jabatan']; ?></td>
                                <td><?php echo $row['tahunoperasi']['tanggalmulai']; ?></td>
                                <td><?php echo $row['tahunoperasi']['tanggalselesai']; ?></td>
                                <td>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('SusunanKepengurusan/hapusHistory') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus histori ini?');">
                                 Hapus</a>
                                </td>
                            </tr>
                    <?php } }?>
                  </tbody>
                </table>                   
              </div>        
            </div>             
          </div>

        <h4 class="tab_drawer_heading" rel="pilltab4-tab"><a class="aauto" href="#h4pilltab4-tab" data-toggle="tab">Pengawas <i class="fa"></i></a></h4>
          <div class="tab-pane" id="pilltab4-tab">
            <div class="col-xs-12">
              <div class="panel-body">                
                <div class="panel-heading">History Pengawas&nbsp;&nbsp;
                    <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalPengawas" href ="#">Pilih Pengawas</a>
                </div></br>             
                <!-- <table class="table table-bordered"> -->
                <table id="tabelPengawas" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>  
                      <th>Telepon</th>
                      <th>Pendidikan</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>Mulai Jabatan</th>
                      <th>Selesai Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($penguruspengawas['status'] == 0) {
                      echo "";
                    }
                    else
                    {
                      $no = 1;            
                      foreach ($penguruspengawas['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['telepon']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['pendidikan']; ?></td>
                                <td><?php echo $row['anggotakoperasi']['jeniskelamin']; ?></td>
                                <td><?php echo $row['jabatan']; ?></td>
                                <td><?php echo $row['tahunoperasi']['tanggalmulai']; ?></td>
                                <td><?php echo $row['tahunoperasi']['tanggalselesai']; ?></td>
                                <td>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('SusunanKepengurusan/hapusHistory') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus histori ini?');">
                                 Hapus</a>
                                </td>
                            </tr>
                    <?php } }?>
                  </tbody>
                </table>                   
              </div>        
            </div>
          </div>

        <h4 class="tab_drawer_heading" rel="pilltab5-tab"><a class="aauto" href="#h4pilltab5-tab" data-toggle="tab">Manager<i class="fa"></i></a></h4>
          <div class="tab-pane" id="pilltab5-tab">
            <div class="col-xs-12">
              <div class="panel-body">                
              <div class="panel-heading">History Manager&nbsp;&nbsp;
                  <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalManager" href ="#">Pilih Manager</a>
              </div></br>             
              <!-- <table class="table table-bordered"> -->
              <table id="tabelManager" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>  
                    <th>Telepon</th>
                    <th>Pendidikan</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Mulai Jabatan</th>
                    <th>Selesai Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($pengurusmanager['status'] == 0) {
                    echo "";
                  }
                  else
                  {
                    $no = 1;            
                    foreach ($pengurusmanager['data'] as $row)
                    { ?>
                          <tr>
                              <td><?php echo $no;$no++; ?></td>
                              <td><?php echo $row['anggotakoperasi']['nama']; ?></td>
                              <td><?php echo $row['anggotakoperasi']['telepon']; ?></td>
                              <td><?php echo $row['anggotakoperasi']['pendidikan']; ?></td>
                              <td><?php echo $row['anggotakoperasi']['jeniskelamin']; ?></td>
                              <td><?php echo $row['jabatan']; ?></td>
                              <td><?php echo $row['tahunoperasi']['tanggalmulai']; ?></td>
                              <td><?php echo $row['tahunoperasi']['tanggalselesai']; ?></td>
                              <td>
                               &nbsp;
                               <a class="btn-sm btn-danger" href ="<?= base_url('SusunanKepengurusan/hapusHistory') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus histori ini?');">
                               Hapus</a>
                              </td>
                          </tr>
                  <?php } }?>
                </tbody>
              </table>                   
            </div>        
            </div>
          </div>          

        <h4 class="tab_drawer_heading" rel="pilltab6-tab"><a class="aauto" href="#h4pilltab6-tab" data-toggle="tab">Karyawan <i class="fa"></i></a></h4>
          <div class="tab-pane" id="pilltab6-tab">
            <div class="col-xs-12">
              <div class="panel-body">                
                <div class="panel-heading">History Karyawan&nbsp;&nbsp;
                    <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalKaryawan" href ="#">Tambah Karyawan</a>
                </div></br>             
                <!-- <table class="table table-bordered"> -->
                <table id="tabelKaryawan" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>  
                      <th>Telepon</th>
                      <th>Pendidikan</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>Mulai Jabatan</th>
                      <th>Selesai Jabatan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($penguruskaryawan['status'] == 0) {
                      echo "";
                    }
                    else
                    {
                      $no = 1;            
                      foreach ($penguruskaryawan['data'] as $row)
                      { ?>
                            <tr>
                                <td><?php echo $no;$no++; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['telepon']; ?></td>
                                <td><?php echo $row['pendidikan']; ?></td>
                                <td><?php echo $row['jeniskelamin']; ?></td>
                                <td><?php echo $row['jabatan']; ?></td>
                                <td><?php echo $row['mulaijabatan']; ?></td>
                                <td><?php echo $row['akhirjabatan']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                <a href ="#" class="edit" data-toggle="modal" data-target="#modalEditKaryawan" data-indikator="<?php echo $row['id']; ?>" data-enama="<?php echo $row['nama']; ?>" data-telepon="<?php echo $row['telepon']; ?>" data-alamat="<?php echo $row['alamat']; ?>" data-pendidikan="<?php echo $row['pendidikan']; ?>" data-jeniskelamin="<?php echo $row['jeniskelamin']; ?>" data-jabatan="<?php echo $row['jabatan']; ?>" data-mulaijabatan="<?php echo $row['mulaijabatan']; ?>" data-akhirjabatan="<?php echo $row['akhirjabatan']; ?>" data-status="<?php echo $row['status']; ?>" ><button class="btn-xs btn-success">Edit</button></a>
                                 &nbsp;
                                 <a class="btn-sm btn-danger" href ="<?= base_url('SusunanKepengurusan/hapusKaryawan') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data karyawan ini?');">
                                 Hapus</a>
                                </td>
                            </tr>
                    <?php } }?>
                  </tbody>
                </table>                   
              </div>        
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="pilltab7-tab"><a class="aauto" href="#h4pilltab7-tab" data-toggle="tab">Dewan Pengawas Syariah<i class="fa"></i></a></h4>
          <div class="tab-pane" id="pilltab7-tab">
            <div class="col-xs-12">
              <div class="panel-body">                
              <div class="panel-heading">History Dewan Pengawas Syariah&nbsp;&nbsp;
                  <a class="btn-sm btn-primary" rel="stylesheet" data-toggle="modal" data-target="#modalDewan" href ="#">Pilih Dewan Pengawas Syariah</a>
              </div></br>             
              <!-- <table class="table table-bordered"> -->
              <table id="tabelDewanPengawasSyariah" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>  
                    <th>Telepon</th>
                    <th>Pendidikan</th>
                    <th>Jenis Kelamin</th>
                    <th>Mulai Jabatan</th>
                    <th>Selesai Jabatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($pengurusDewanPengawasSyariah['status'] == 0) {
                    echo "";
                  }
                  else
                  {
                    $no = 1;            
                    foreach ($pengurusDewanPengawasSyariah['data'] as $row)
                    { ?>
                          <tr>
                              <td><?php echo $no;$no++; ?></td>
                              <td><?php echo $row['nama']; ?></td>
                              <td><?php echo $row['telepon']; ?></td>
                              <td><?php echo $row['pendidikan']; ?></td>
                              <td><?php echo $row['jeniskelamin']; ?></td>
                              <td><?php echo $row['mulaijabatan']; ?></td>
                              <td><?php echo $row['akhirjabatan']; ?></td>
                              <td><?php echo $row['status']; ?></td>
                              <td><a href ="#" class="editDewan" data-toggle="modal" data-target="#modalEditDewanPengawas" data-indikator="<?php echo $row['id']; ?>" data-enama="<?php echo $row['nama']; ?>" data-telepon="<?php echo $row['telepon']; ?>" data-alamat="<?php echo $row['alamat']; ?>" data-pendidikan="<?php echo $row['pendidikan']; ?>" data-jeniskelamin="<?php echo $row['jeniskelamin']; ?>" data-mulaijabatan="<?php echo $row['mulaijabatan']; ?>" data-akhirjabatan="<?php echo $row['akhirjabatan']; ?>" data-status="<?php echo $row['status']; ?>" ><button class="btn-xs btn-success">Edit</button></a>
                                &nbsp;
                                <a class="btn-sm btn-danger" href ="<?= base_url('SusunanKepengurusan/hapusDewanPengawasSyariah') ?>/<?php echo $row['id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data dewan pengawas syariah ini?');">
                               Hapus</a>
                              </td>
                          </tr>
                  <?php } }?>
                </tbody>
              </table>                   
            </div>        
            </div>
          </div>


      </div><!--/.panel body-->
  </div><!--/.panel-->
</div><!-- /.col-->
</div>

<script type="text/javascript">  
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $ta) { ?>
        {label: "<?=$ta['nama']?>", id:  "<?=$ta['id']?>"},
    <?php } ?>];
    console.log(availableTags);
    $( "#tagsketuaSatu" ).autocomplete({
      source: availableTags,
      select: function (event, ui) { 
        $("#tagsketuaSatu").val(ui.item.label); // display the selected text
        $("#ketuaSatu").val(ui.item.id); // save selected id to hidden input
        $("#tagsketuaDua").prop('disabled', false);
        $("#tagsketuaDua").val('');   
        $("#ketuaDua").val('');        
        $("#ketuaTiga").val('');
        $("#tagsketuaTiga").prop('disabled', true);
        $("#tagsketuaTiga").val('');  
        return false;
      }
    });

    $('#tagsketuaSatu').on('autocompleteselect', function (event, ui) {
      $("#ketuaDua").val(ui.item.id);  
      var id = $("#ketuaDua").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeKetuaSatu');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags1 = data;
            //console.log(availableTags1);
            $( "#tagsketuaDua" ).autocomplete({
              source: availableTags1,
              select: function (event, ui) {  
                $("#tagsketuaDua").val(ui.item.label); 
                $("#ketuaDua").val(ui.item.id);
                $("#tagsketuaTiga").prop('disabled', false);
                $("#tagsketuaTiga").val('');  
                $("#ketuaTiga").val(''); 
              }
            }); 
          }
        });      
    });

    $('#tagsketuaDua').on('autocompleteselect', function (event, ui) {
      $("#ketuaTiga").val(ui.item.id);  
      var id = $("#ketuaTiga").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeKetuaDua');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags2 = data;
            console.log(availableTags2);
            $( "#tagsketuaTiga" ).autocomplete({
              source: availableTags2,
              select: function (event, ui) {
                $("#tagsketuaTiga").val(ui.item.label); 
                $("#ketuaTiga").val(ui.item.id); 
              }
            }); 
          }
        });
    });    
  });
</script>


<!-- JS autocomplete sekretaris -->
<script type="text/javascript">  
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $ta) { ?>
        {label: "<?=$ta['nama']?>", id:  "<?=$ta['id']?>"},
    <?php } ?>];
    $( "#tagssekretarisSatu" ).autocomplete({
      source: availableTags,
      select: function (event, ui) { 
        $("#tagssekretarisSatu").val(ui.item.label); // display the selected text
        $("#sekretarisSatu").val(ui.item.id); // save selected id to hidden input
        $("#tagssekretarisDua").prop('disabled', false);
        $("#tagssekretarisDua").val('');
        $("#sekretarisDua").val('');
        $("#sekretarisTiga").val('');
        $("#tagssekretarisTiga").prop('disabled', true);
        $("#tagssekretarisTiga").val('');

        return false;
      }
    });

    $('#tagssekretarisSatu').on('autocompleteselect', function (event, ui) {
      $("#sekretarisDua").val(ui.item.id);  
      var id = $("#sekretarisDua").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeSekretarisSatu');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags1 = data;
            //console.log(availableTags1);
            $( "#tagssekretarisDua" ).autocomplete({
              source: availableTags1,
              select: function (event, ui) {  
                $("#tagssekretarisDua").val(ui.item.label); 
                $("#sekretarisDua").val(ui.item.id);
                $("#tagssekretarisTiga").prop('disabled', false);
                $("#tagssekretarisTiga").val('');
                $("#sekretarisTiga").val(''); 
              }
            }); 
          }
        });      
    }); 

    $('#tagssekretarisDua').on('autocompleteselect', function (event, ui) {
      $("#sekretarisTiga").val(ui.item.id);  
      var id = $("#sekretarisTiga").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeSekretarisDua');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags2 = data;
            //console.log(availableTags2);
            $( "#tagssekretarisTiga" ).autocomplete({
              source: availableTags2,
              select: function (event, ui) {
                $("#tagssekretarisTiga").val(ui.item.label); 
                $("#sekretarisTiga").val(ui.item.id); 
              }
            }); 
          }
        });
    });    
  });
</script>

<!-- JS autocomplete bendahara -->
<script type="text/javascript">  
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $ta) { ?>
        {label: "<?=$ta['nama']?>", id:  "<?=$ta['id']?>"},
    <?php } ?>];
    $( "#tagsbendaharaSatu" ).autocomplete({
      source: availableTags,
      select: function (event, ui) { 
        $("#tagsbendaharaSatu").val(ui.item.label); // display the selected text
        $("#bendaharaSatu").val(ui.item.id); // save selected id to hidden input
        $("#tagsbendaharaDua").prop('disabled', false);
        $("#tagsbendaharaDua").val('');        
        $("#bendaharaDua").val(''); 
        $("#bendaharaTiga").val('');
        $("#tagsbendaharaTiga").prop('disabled', true);
        $("#tagsbendaharaTiga").val('');
        return false;
      }
    });

    $('#tagsbendaharaSatu').on('autocompleteselect', function (event, ui) {
      $("#bendaharaDua").val(ui.item.id);  
      var id = $("#bendaharaDua").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeBendaharaSatu');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags1 = data;
            //console.log(availableTags1);
            $( "#tagsbendaharaDua" ).autocomplete({
              source: availableTags1,
              select: function (event, ui) {  
                $("#tagsbendaharaDua").val(ui.item.label); 
                $("#bendaharaDua").val(ui.item.id);
                $("#tagsbendaharaTiga").prop('disabled', false);
                $("#tagsbendaharaTiga").val('');
                $("#bendaharaTiga").val(''); 
              }
            }); 
          }
        });      
    }); 

    $('#tagsbendaharaDua').on('autocompleteselect', function (event, ui) {
      $("#bendaharaTiga").val(ui.item.id);  
      var id = $("#bendaharaTiga").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeBendaharaDua');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags2 = data;
            //console.log(availableTags2);
            $( "#tagsbendaharaTiga" ).autocomplete({
              source: availableTags2,
              select: function (event, ui) {
                $("#tagsbendaharaTiga").val(ui.item.label); 
                $("#bendaharaTiga").val(ui.item.id); 
              }
            }); 
          }
        });
    });    
  });
</script>

<!-- JS autocomplete pengawas -->
<script type="text/javascript">  
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $ta) { ?>
        {label: "<?=$ta['nama']?>", id:  "<?=$ta['id']?>"},
    <?php } ?>];
    $( "#tagsketuaPengawas" ).autocomplete({
      source: availableTags,
      select: function (event, ui) { 
        $("#tagsketuaPengawas").val(ui.item.label); // display the selected text
        $("#ketuaPengawas").val(ui.item.id); // save selected id to hidden input
        $("#tagsanggotaSatu").prop('disabled', false);
        $("#tagsanggotaSatu").val('');        
        $("#anggotaSatu").val('');
        $("#anggotaDua").val('');
        $("#tagsanggotaDua").prop('disabled', true);
        $("#tagsanggotaDua").val('');
        return false;
      }
    });

    $('#tagsketuaPengawas').on('autocompleteselect', function (event, ui) {
      $("#anggotaSatu").val(ui.item.id);  
      var id = $("#anggotaSatu").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeKetuaPengawas');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags1 = data;
            //console.log(availableTags1);
            $( "#tagsanggotaSatu" ).autocomplete({
              source: availableTags1,
              select: function (event, ui) {  
                $("#tagsanggotaSatu").val(ui.item.label); 
                $("#anggotaSatu").val(ui.item.id);
                $("#tagsanggotaDua").prop('disabled', false);
                $("#tagsanggotaDua").val('');
                $("#anggotaDua").val(''); 
              }
            }); 
          }
        });      
    }); 

    $('#tagsanggotaSatu').on('autocompleteselect', function (event, ui) {
      $("#anggotaDua").val(ui.item.id);  
      var id = $("#anggotaDua").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeAnggotaSatu');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags2 = data;
            //console.log(availableTags2);
            $( "#tagsanggotaDua" ).autocomplete({
              source: availableTags2,
              select: function (event, ui) {
                $("#tagsanggotaDua").val(ui.item.label); 
                $("#anggotaDua").val(ui.item.id); 
              }
            }); 
          }
        });
    });    
  });
</script>

<!-- JS autocomplete manager -->
<script type="text/javascript">  
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $ta) { ?>
        {label: "<?=$ta['nama']?>", id:  "<?=$ta['id']?>"},
    <?php } ?>];
    $( "#tagsmanagerSatu" ).autocomplete({
      source: availableTags,
      select: function (event, ui) { 
        $("#tagsmanagerSatu").val(ui.item.label); // display the selected text
        $("#managerSatu").val(ui.item.id); // save selected id to hidden input
        $("#tagsmanagerDua").prop('disabled', false);
        $("#tagsmanagerDua").val('');        
        $("#managerDua").val('');
        $("#managerTiga").val('');
        $("#tagsmanagerTiga").prop('disabled', true);
        $("#tagsmanagerTiga").val('');
        return false;
      }
    });

    $('#tagsmanagerSatu').on('autocompleteselect', function (event, ui) {
      $("#managerDua").val(ui.item.id);  
      var id = $("#managerDua").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeManagerSatu');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags1 = data;
            //console.log(availableTags1);
            $( "#tagsmanagerDua" ).autocomplete({
              source: availableTags1,
              select: function (event, ui) {  
                $("#tagsmanagerDua").val(ui.item.label); 
                $("#managerDua").val(ui.item.id);
                $("#tagsmanagerTiga").prop('disabled', false);
                $("#tagsmanagerTiga").val('');
                $("#managerTiga").val(''); 
              }
            }); 
          }
        });      
    }); 

    $('#tagsmanagerDua').on('autocompleteselect', function (event, ui) {
      $("#managerTiga").val(ui.item.id);  
      var id = $("#managerTiga").val(); 
        $.ajax({
          type: 'post',
          url:'<?php echo site_url('SusunanKepengurusan/removeManagerDua');?>/'+id,
          dataType: "json",
          data: 
          {
            id:id,
          },
          success: function (data)
          { 
            var availableTags2 = data;
            //console.log(availableTags2);
            $( "#tagsmanagerTiga" ).autocomplete({
              source: availableTags2,
              select: function (event, ui) {
                $("#tagsmanagerTiga").val(ui.item.label); 
                $("#managerTiga").val(ui.item.id); 
              }
            }); 
          }
        });
    });    
  });
</script>

<!-- JS autocomplete karyawan -->
<script type="text/javascript">  
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $tag) { ?>
        {label: "<?=$tag['nama']?>", id:  "<?=$tag['id']?>", telepon:  "<?=$tag['telepon']?>", alamat:  "<?=$tag['alamat']?>", pendidikan:  "<?=$tag['pendidikan']?>", jeniskelamin:  "<?=$tag['jeniskelamin']?>"},
    <?php } ?>];
    $( "#namaLengkap" ).autocomplete({
      source: availableTags,
      select: function (event, ui) { 
        $("#namaLengkap").val(ui.item.label); // display the selected text
        $("#idanggota").val(ui.item.id); // save selected id to hidden input
        $("#telepon").val(ui.item.telepon);
        $("#alamat").val(ui.item.alamat);
        $("#pendidikan").val(ui.item.pendidikan);

        if (ui.item.jeniskelamin=="Perempuan") {
          $('.ip').prop( "checked", true);
          $('.il').prop( "checked", false);
        }else{
          $('.ip').prop( "checked", false);
          $('.il').prop( "checked", true);
        }


        // $("#jabatan").prop('disabled', false);
        // $("#status").prop('disabled', false);
        return false;
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $( "#namaLengkap").keyup(function(){
    $("#telepon").val("");
    $("#alamat").val("");
});
  });
</script>

<!-- JS autocomplete dewan pengawas syariah -->
<script type="text/javascript">  
  $(document).ready(function(){
    var availableTags = [<?php foreach ($anggota['data'] as $tag) { ?>
        {label: "<?=$tag['nama']?>", id:  "<?=$tag['id']?>", telepon:  "<?=$tag['telepon']?>", alamat:  "<?=$tag['alamat']?>", pendidikan:  "<?=$tag['pendidikan']?>", jeniskelamin:  "<?=$tag['jeniskelamin']?>"},
    <?php } ?>];
    console.log(availableTags);
    $( "#namalengkapDewan" ).autocomplete({
      source: availableTags,
      select: function (event, ui) {
        $("#namalengkapDewan").val(ui.item.label); // display the selected text
        $("#iddewanPengawas").val(ui.item.id); // save selected id to hidden input
        $("#teleponDewan").val(ui.item.telepon);
        $("#alamatDewan").val(ui.item.alamat);
        $("#pendidikanDewan").val(ui.item.pendidikan);

        if (ui.item.jeniskelamin=="Perempuan") {
          $('.ipDewan').prop( "checked", true);
          $('.ilDewan').prop( "checked", false);
        }else{
          $('.ipDewan').prop( "checked", false);
          $('.ilDewan').prop( "checked", true);
        }
        return false;
      }
    });
  });
</script>

<script>

$('.edit').click(function(){

  var id            = $(this).data('indikator');
  var nama          = $(this).data('enama');
  var telepon       = $(this).data('telepon');
  var alamat        = $(this).data('alamat');
  var pendidikan    = $(this).data('pendidikan');
  var jeniskelamin  = $(this).data('jeniskelamin');
  var jabatan       = $(this).data('jabatan');
  var mulaijabatan  = $(this).data('mulaijabatan');
  var akhirjabatan  = $(this).data('akhirjabatan');
  var status        = $(this).data('status');

  if (id) {
    $('[name="eidanggota"]').val(id);
    $('[name="enama"]').val(nama);
    $('[name="etelepon"]').val(telepon);
    $('[name="ealamat"]').val(alamat);
    $('[name="ependidikan"]').val(pendidikan);
    //$('[name="ejeniskelamin"]').val(jeniskelamin);
    if (jeniskelamin=="Perempuan") {
      $('.p').prop( "checked", true);
      $('.l').prop( "checked", false);
    }else{
      $('.p').prop( "checked", false);
      $('.l').prop( "checked", true);
    }
    $('[name="ejabatan"]').val(jabatan);
    $('#etglMulaiJabat').val(mulaijabatan);
    $('#etglSelesaiJabat').val(akhirjabatan);
    $('[name="estatus"]').val(status);
  }
  else{
    alert('Data tidak ditemukan !!!');
  }
});

</script>

<script>

$('.editDewan').click(function(){

  var id            = $(this).data('indikator');
  var nama          = $(this).data('enama');
  var telepon       = $(this).data('telepon');
  var alamat        = $(this).data('alamat');
  var pendidikan    = $(this).data('pendidikan');
  var jeniskelamin  = $(this).data('jeniskelamin');
  var mulaijabatan  = $(this).data('mulaijabatan');
  var akhirjabatan  = $(this).data('akhirjabatan');
  var status        = $(this).data('status');

  if (id) {
    $('[name="eiddewanPengawas"]').val(id);
    $('[name="enamalengkapDewan"]').val(nama);
    $('[name="eteleponDewan"]').val(telepon);
    $('[name="ealamatDewan"]').val(alamat);
    $('[name="ependidikanDewan"]').val(pendidikan);
    //$('[name="ejeniskelamin"]').val(jeniskelamin);
    if (jeniskelamin=="Perempuan") {
      $('.pDewan').prop( "checked", true);
      $('.lDewan').prop( "checked", false);
    }else{
      $('.pDewan').prop( "checked", false);
      $('.lDewan').prop( "checked", true);
    }
    $('#etglMulaiJabatDewan').val(mulaijabatan);
    $('#etglSelesaiJabatDewan').val(akhirjabatan);
    $('[name="estatusDewan"]').val(status);
  }
  else{
    alert('Data tidak ditemukan !!!');
  }
});

</script>
<script type="text/javascript">
   $('[name="tglMulaiJabat"]').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });

   $('[name="tglSelesaiJabat"]').datetimepicker({   
    timepicker:false,
    format:'Y-m-d',
    formatDate:'yy-mm-dd', 
    minDate:0       
  });
</script>