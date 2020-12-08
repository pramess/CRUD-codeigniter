<div class="constraint">
<div class="page-header">
	<strong><h3 class="card-title">Data Peminjaman</h3></strong>
</div>
<br>
<a href="<?php echo
				base_url() . 'admin/tambah_peminjaman'; ?>" class="btn
btn-info"><span class="fas fa-plus square"></span> Transaksi Baru</a>
<br><br>
<div class="table-responsive">
	<table class="table table-bordered table-striped
table-hover" id="table-datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Anggota</th>
				<th>Buku</th>
				<th>Tgl. Pinjam</th>
				<th>Tgl. Kembali</th>
				<th>Denda/Hari</th>
				<th>Tgl. Dikembalikan</th>
				<th>Total Denda</th>
				<th>Status Buku</th>
				<th>Status Pinjam</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($peminjaman as $p) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $p->id_anggota ?></td>
					<td><?php echo $p->id_pinjam ?></td>
					<td><?php echo
							date('d/m/Y', strtotime($p->tgl_pinjam)); ?></td>
					<td><?php echo
							date('d/m/Y', strtotime($p->tgl_kembali)); ?></td>
					<td>
						<?php echo $p->denda ?>
					</td>
					<td>
						<?php
						if ($p->tgl_pengembalian == "0000-00-00") {
							echo "-";
						} else {
							echo
								date('d/m/Y', strtotime($p->tgl_pengembalian));
						} ?>
					</td>
					<td><?php echo "Rp. " .
							number_format($p->total_denda) . " ,-"; ?></td>
					<td>
						<?php
						if ($p->status_buku == "1") {
							echo "Selesai";
						} else {
							echo "-";
						} ?>
					</td>
					<td>
						<?php
						if ($p->status_peminjaman == "Selesai") {
							echo "-";
						} else {
						?>
						<center>
							<a class=" btn-sm btn-info" href="<?php echo
																		base_url() . 'admin/transaksi_selesai/' . $p->id_pinjam; ?>"><span class="fas fa-check"></span> Transaksi
									Selesai</a></center><br>
							
							<center><a class=" btn-sm btn-info" href="<?php echo
																		base_url() . 'admin/transaksi_hapus/' . $p->id_pinjam; ?>"><span class="fas fa-times"></span> Batalkan
									Transaksi </a></center>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>