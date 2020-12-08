<div class="constraint">
<div class="page-header">
	<strong><h3 class="card-title">Data Anggota</h3></strong>
</div>
<br>
<a href="<?php echo base_url().'admin/tambah_anggota'; ?>" class="btn btn-info"><span class="fas fa-plus square"></span> Anggota Baru</a>
<br><br>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Gambar</th>
				<th>Nama Anggota</th>
				<th>Gender</th>
				<th>No Telephone</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Password</th>
				<th>Pilihan</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach($anggota as $a){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><img src="<?php echo base_url().'/assets/upload/'.$a->gambar; ?>" width="80" height="80" alt="gambar tidak ada " ></td>
				<td><?php echo $a->nama_anggota ?></td>
				<td><?php echo $a->gender ?></td>
				<td><?php echo $a->no_telp ?></td>
				<td><?php echo $a->alamat ?></td>
				<td><?php echo $a->email ?></td>
				<td><?php echo $a->password ?></td>
				
				<td nowrap="nowrap" style="text-align: center;">
					<a class="btn btn-info btn-xs" href="<?php echo base_url(). 'admin/edit_anggota/' .$a->id_anggota; ?>"><span class="fas fa-edit"></span></a>
					<a class="btn btn-info btn-xs" href="<?php echo base_url(). 'admin/hapus_anggota/' .$a->id_anggota; ?>"><span class="fas fa-eraser"></span></a>
					<a class="btn btn-info btn-xs" href="<?php echo base_url(). 'admin/detail_anggota/' .$a->id_anggota; ?>"><span class="fas fa-info"></span></a>
					
				</td>
			</tr>
<?php } ?>
</tbody>
	</table>
</div>
</div>
<br>
<br>

