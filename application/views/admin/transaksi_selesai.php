
                   <div class="card">
                      <div class="card-header">
                        <strong>Transaksi Selesai </strong> 
                      </div>
<?php foreach ($peminjaman as $p) { ?>
     <div class="card-body card-block">
    <form action="<?php echo
                        base_url() . 'admin/transaksi_selesai_act' ?>" method="post">

       <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Anggota</label></div>
    <div class="col-12 col-md-5">
            <input type="hidden" name="id" value="<?php echo
                                                        $p->id_pinjam ?>">
            <select class="form-control" name="anggota" disabled>
                <option value="">-Pilih Anggota-</option>
                <?php foreach ($anggota as $k) { ?>
                    <option <?php
                            if ($p->id_anggota == $k->id_anggota) {
                                echo
                                    "selected='selected'";
                            } ?> value="<?php echo
                                        $k->id_anggota; ?>"><?php echo
                        $k->nama_anggota; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
       <div class="row form-group">
    <div class="col col-md-2"><label for="select" class=" form-control-label">Anggota</label></div>
    <div class="col-12 col-md-5">
            <input type="hidden" name="buku" value="<?php
                                                    echo $p->id_buku ?>">
            <select class="form-control" name="buku" disabled>
                <option value="">-Pilih Buku-</option>
                <?php foreach ($buku as $m) { ?>
                    <option <?php
                            if ($p->id_buku == $m->id_buku) {
                                echo
                                    "selected='selected'";
                            } ?> value="<?php echo
                                        $m->id_buku; ?>"><?php echo
                        $m->judul_buku; ?></option>
                <?php } ?>
            </select>
        </div>
        </div>
       <div class="row form-group">
    <div class="col col-md-2"><label class=" form-control-label">Tanggal Pinjam</label></div>
    <div class="col-12 col-md-5"><input class="form-control" type="date" name="tgl_pinjam" value="<?php echo
                                                                                    $p->tgl_pinjam ?>" disabled>
        </div>
    </div>
          <div class="row form-group">
    <div class="col col-md-2"><label class=" form-control-label">Tanggal Kembali</label></div>
    <div class="col-12 col-md-5"><input type="hidden" name="tgl_kembali" value="<?php echo $p->tgl_kembali ?>">
            <input class="form-control" type="date" name="tgl_kembali" value="<?php echo
                                                                                    $p->tgl_kembali ?>" disabled>
        </div>
    </div>
 <div class="row form-group">
    <div class="col col-md-2"><label for="text-input" class=" form-control-label">Judul Buku</label></div>
    <div class="col-12 col-md-5"><input type="hidden" name="denda" value="<?php
                                                        echo $p->denda ?>">
            <input class="form-control" type="text" name="denda" value="<?php echo $p->denda ?>" disabled>
        </div> </div>
        <div class="row form-group">
    <div class="col col-md-2"><label class=" form-control-label">Tanggal Dikembalikan</label></div>
    <div class="col-12 col-md-5"><input class="form-control" type="date" name="tgl_dikembalikan">
            <?php echo form_error('tgl_dikembalikan'); ?>
        </div>
    </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="btn
btn-primary btn-sm">
        </div>
    </form>
<?php } ?>