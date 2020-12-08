 <div class="card">
                      <div class="card-header">
                        <strong>Tambah Buku</strong> 
                      </div>
                      <?= $this->session->flashdata('message');?>
<?= validation_errors('<p style="color:red;">','</p>'); ?>
<?php
if($this->session->flashdata()){
  echo "<div class='alert alert-danger alert-message'>";
  echo $this->session->flashdata('alert');
  echo "</div>";
} ?>
<div class="card-body card-block">
<form action="<?php echo base_url().'admin/tambah_buku_act' ?>" method="post" enctype="multipart/form-data">

  <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Kategori</label></div>
    <div class="col-12 col-md-10">
    <select name="id_kategori" class="form-control">
      <option value="">--Pilih Kategori--</option>
      <?php foreach ($kategori as $k) { ?>
        <option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
      <?php } ?>
    </select>
    <?php echo form_error('id_kategori'); ?>
    </div>
  </div>
<div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Judul Buku</label></div>
    <div class="col-12 col-md-10">
      <input type="text" name="judul_buku" id="judul_buku" class="form-control">
      <?php echo form_error('judul_buku'); ?>
    </div>
  </div>

   <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Pengarang</label></div>
    <div class="col-12 col-md-10"><input type="text" name="pengarang" id="pengarang" class="form-control">
    </div>
  </div>

<div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Penerbit</label></div>
    <div class="col-12 col-md-10"><input type="text" name="penerbit" id="penerbit" class="form-control">
    </div></div>

 <div class="row form-group">
    <div class="col col-md-2"><label class=" form-control-label">Tahun Terbit</label></div>
    <div class="col-12 col-md-5"><input type="date" name="thn_terbit" id="thn_terbit" class="form-control">
    </div>
  </div>

<div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">ISBN</label></div>
    <div class="col-12 col-md-5"><input type="text" name="isbn" id="isbn" class="form-control">
    </div>
  </div>
    
 <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Jumlah Buku</label></div>
    <div class="col-12 col-md-5"><input type="text" name="jumlah_buku" id="jumlah_buku" class="form-control">
    </div>
  </div>

    <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Lokasi</label></div>
    <div class="col-12 col-md-5">
      <select name="lokasi" id="lokasi" class="form-control">
        <option value="Rak 1">Rak 1</option>
        <option value="Rak 2">Rak 2</option>
        <option value="Rak 3">Rak 3</option>
      </select>
    </div>
  </div>

   <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Status Buku</label></div>
    <div class="col-12 col-md-5"><select name="status_buku" id="status_buku" class="form-control">
        <option value="1">Tersedia</option>
        <option value="0">Sedang dipinjam</option>
      </select>
      <?php echo form_error('status_buku'); ?>
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