 <div class="card">
                      <div class="card-header">
                        <strong>Tambah </strong> Anggota
                      </div>
<?= validation_errors('<p style="color:red;">','</p>'); ?>
<?php
if($this->session->flashdata()){
  echo "<div class='alert alert-danger alert-message'>";
  echo $this->session->flashdata('alert');
  echo "</div>";
} ?>
<div class="card-body card-block">
<form action="<?php echo base_url().'admin/tambah_anggota_act' ?>" method="post" enctype="multipart/form-data">


    <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Nama Anggota</label></div>
    <div class="col-12 col-md-10"><input type="text" name="nama_anggota" id="nama_anggota" class="form-control">
      <?php echo form_error('nama_anggota'); ?>
    </div>
  </div>

     
    <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Gender</label></div>
    <div class="col-12 col-md-10">
      <select name="gender" id="gender" class="form-control">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
     
      </select>
    </div>
  </div>

    <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">No Telephone</label></div>
    <div class="col-12 col-md-10"><input type="text" name="no_telp" id="no_telp" class="form-control">
    </div>
  </div>

<div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Alamat</label></div>
    <div class="col-12 col-md-10"><input type="text" name="alamat" id="alamat" class="form-control">
    </div>
  </div>

<div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Email</label></div>
    <div class="col-12 col-md-10"><input type="text" name="email" id="email" class="form-control">
    </div>
  </div>

 <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Password</label></div>
    <div class="col-12 col-md-10"><input type="text" name="password" id="password" class="form-control">
      <?php echo form_error('password'); ?>
    </div>
  </div>
    
      <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Gambar</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="foto" name="foto" class="form-control-file"></div>
                          </div>


    

    <div class="form-group">
      <input type="submit" value="Simpan" class="btn btn-info">
      <button type="reset" class="btn btn-danger">
                          <i class="fa fa-ban"></i> Reset
                        </button>
    </div>
  </div>
</form>
</div>
<br>
<br>