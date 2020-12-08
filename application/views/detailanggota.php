<div class="content-wrapper">
	<section class="content">
		<h4>Detail Anggota</h4>
		<table class="table">
			<tr>
				<td><center><img src="<?php echo base_url().'/assets/upload/'.$detail->gambar; ?>" width="150" height="150" alt="gambar tidak ada " ></center></td>
			</tr>
			<tr>
				<td><center><?php echo $detail->nama_anggota?></center></td>
			</tr>
			<tr>
				<td><center><?php echo $detail->gender?></center></td>
			</tr>
			<tr>
				<td><center><?php echo $detail->no_telp?></center></td>
			</tr>
			<tr>
				<td><center><?php echo $detail->alamat?></center></td>
			</tr>
			<tr>
				<td><center><?php echo $detail->email?></center></td>
			</tr>
			<tr>
				<td><center><?php echo $detail->password?></center></td>
			</tr>
		</table>
	</section>
</div>