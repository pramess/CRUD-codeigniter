
                   <div class="card">
                      <div class="card-header">
                        <strong>Edit </strong> Buku
                      </div>
                        
<?php foreach ($buku as $b){ ?>
  <div class="card-body card-block">
<form action="<?php echo base_url().'admin/update_buku' ?>" method="post" enctype="multipart/form-data">
  <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Kategori</label></div>
    <div class="col-12 col-md-10">
    <select name="id_kategori" class="form-control">
      <option value="<?php echo $b->id_kategori; ?>"><?php echo $b->nama_kategori; ?></option>
      <?php foreach ($kategori as $k) { ?>
        <option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
      <?php } ?>
    </select>
    <?php echo form_error('id_kategori'); ?>
  </div>
</div>

 <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Judul Buku</label></div>
    <div class="col-12 col-md-10"><input type="hidden" name="id" value="<?php echo $b->id_buku; ?>">
    <input type="text" name="judul_buku" class="form-control" value="<?php echo $b->judul_buku; ?>"></div>
    <?php echo form_error('judul_buku'); ?>
  </div>

  <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Pengarang</label></div>
    <div class="col-12 col-md-10"><input type="text" name="pengarang" class="form-control" value="<?php echo $b->pengarang; ?>">
    <?php echo form_error('pengarang'); ?>
  </div>
</div>

  <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Penerbit</label></div>
    <div class="col-12 col-md-10"><input type="text" name="penerbit" class="form-control" value="<?php echo $b->penerbit; ?>">
    <?php echo form_error('penerbit'); ?>
  </div>
</div>

  <div class="row form-group">
    <div class="col col-md-2"><label class=" form-control-label">Tahun Terbit</label></div>
    <div class="col-12 col-md-5"><input type="date" name="thn_terbit" class="form-control" value="<?php echo $b->thn_terbit; ?>">
    <?php echo form_error('thn_terbit'); ?>
  </div>
</div>
  <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">ISBN</label></div>
    <div class="col-12 col-md-5"><input type="text" name="isbn" class="form-control" value="<?php echo $b->isbn; ?>">
    <?php echo form_error('isbn'); ?>
  </div>
</div>

   <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Jumlah Buku</label></div>
    <div class="col-12 col-md-5"><input type="text" name="jumlah_buku" class="form-control" value="<?php echo $b->jumlah_buku; ?>">
    <?php echo form_error('jumlah_buku'); ?>
  </div>
</div>

 <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Lokasi</label></div>
    <div class="col-12 col-md-5"><input type="text" name="lokasi" class="form-control" value="<?php echo $b->lokasi; ?>">
    <?php echo form_error('lokasi'); ?>
  </div>
</div>

  <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Status Buku</label></div>
    <div class="col-12 col-md-5">
    <select name="status" class="form-control">
      <option <?php if($b->status_buku == "1"){echo "selected='selected'";} echo $b->status_buku; ?> value="1">Tersedia</option>
      <option <?php if($b->status_buku == "0"){echo "selected='selected'";} echo $b->status_buku; ?> value="0">Sedang dipinjam</option>
    </select>
    <?php echo form_error('status'); ?>
  </div>
</div>

  <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Gambar</label></div>
                             <div class="col-12 col-md-9">
    <?php
    if(isset($b->gambar)){
      echo '<input type="hidden" name="old_pict" value="'.$b->gambar.'">';
      echo '<img src="'.base_url().'assets/upload/'.$b->gambar.'" width="30%">';
      }
      ?>
      <input name="foto" type="file" class="form-control-file">
  </div>

 <div class="form-group">
    <input type="submit" value="Update" class="btn btn-default">
    <input type="button" value="Kembali" class="btn btn-info" onclick="window.history.go(-1)">
  </div>
  </form>
</div>
  <?php } ?>

