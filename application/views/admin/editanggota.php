 <div class="card">
                      <div class="card-header">
                        <strong>Edit Anggota </strong>
                      </div>
<?php foreach ($anggota as $a){ ?>
   <div class="card-body card-block">
<form action="<?php echo base_url().'admin/update_anggota' ?>" method="post" enctype="multipart/form-data">

  <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Nama Anggota</label></div>
    <div class="col-12 col-md-10"><input type="hidden" name="id" value="<?php echo $a->id_anggota; ?>">
    <input type="text" name="nama_anggota" class="form-control" value="<?php echo $a->nama_anggota; ?>"></div>
    <?php echo form_error('nama_anggota'); ?>
  </div>

 <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Gender</label></div>
    <div class="col-12 col-md-10"><input type="text" name="gender" class="form-control" value="<?php echo $a->gender; ?>">
    <?php echo form_error('gender'); ?>
  </div></div>

  <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">No Telephone</label></div>
    <div class="col-12 col-md-10"><input type="text" name="no_telp" class="form-control" value="<?php echo $a->no_telp; ?>">
    <?php echo form_error('no_telp'); ?>
  </div>
</div>

   <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Alamat</label></div>
    <div class="col-12 col-md-10"><input type="text" name="alamat" class="form-control" value="<?php echo $a->alamat; ?>">
    <?php echo form_error('alamat'); ?>
  </div>
</div>

  <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Email</label></div>
    <div class="col-12 col-md-10"><input type="text" name="email" class="form-control" value="<?php echo $a->email; ?>">
    <?php echo form_error('email'); ?>
  </div>
</div>

   <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Password</label></div>
    <div class="col-12 col-md-10"><input type="text" name="password" class="form-control" value="<?php echo $a->password; ?>">
    <?php echo form_error('password'); ?>
  </div>
</div>


  <div class="row form-group">
                            <div class="col col-md-2"><label for="file-input" class=" form-control-label">Foto</label></div>
                             <div class="col-12 col-md-10">
    <?php
    if(isset($a->gambar)){
      echo '<input type="hidden" name="old_pict" value="'.$a->gambar.'">';
      echo '<img src="'.base_url().'assets/upload/'.$a->gambar.'" width="30%">';
      }
      ?>
      <input name="foto" type="file" class="form-control">
  </div>
</div>

  <div class="form-group">
    <input type="submit" value="Update" class="btn btn-default">
		<input type="button" value="Kembali" class="btn btn-info" onclick="window.history.go(-1)">
  </div>
  </form>
  <?php } ?>
