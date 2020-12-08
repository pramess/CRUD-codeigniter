<div class="card">
                      <div class="card-header">
                        <strong>Tambah Peminjaman </strong>
                      </div>
                      <div class="card-body card-block">
<form action="<?php echo
base_url().'admin/tambah_peminjaman_act' ?>"
method="post">
<div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Anggota</label></div>
    <div class="col-12 col-md-5">
<select name="anggota" class="form-control">
<option value="">-Pilih Anggota-</option>
<?php foreach ($anggota as $a) { ?>
<option value="<?php echo
$a->id_anggota; ?>"><?php echo
$a->nama_anggota; ?></option>
<?php } ?>
</select>
<?php echo form_error('anggota'); ?>
</div> </div>
<div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Buku</label></div>
    <div class="col-12 col-md-5">
<select name="buku" class="form-control">
<option value="">-Pilih Buku-</option>
<?php foreach ($buku as $b) { ?>
<option value="<?php echo
$b->id_buku; ?>"><?php echo
$b->judul_buku; ?></option>
<?php } ?>
</select>
<?php echo form_error('buku'); ?>
</div></div>
<div class="row form-group">
    <div class="col col-md-2"><label class=" form-control-label">Tanggal Pinjam</label></div>
    <div class="col-12 col-md-5"><input type="date" name="tgl_pinjam"
class="form-control">
<?php echo form_error('tgl_pinjam'); ?>
</div></div>
<div class="row form-group">
    <div class="col col-md-2"><label class=" form-control-label">Tanggal Kembal</label></div>
    <div class="col-12 col-md-5"><input type="date" name="tgl_kembali"
class="form-control">
<?php echo form_error('tgl_kembali'); ?>
</div></div>
<div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Denda</label></div>
    <div class="col-12 col-md-5"><input type="text" name="denda"
class="form-control">
<?php echo form_error('denda'); ?>
</div></div>
<div class="form-group">
<input type="submit" value="Simpan" class="btn
btn-primary btn-sm">
<button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
</div>

</form>