<?php 

	$chk = $_POST['checked'];

if (!isset($chk)) {
	echo "<script>alert('Tidak ada data yang dipilih'); window.location='data.php';</script>";
}else{
	include_once ("../_header.php"); ?>
	<div class="box">
		<h1>Poliklink</h1>
		<h4>
			<small>Edit Data Poliknlik</small>
			<div class="pull-right">
				<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
			</div>
		</h4>
	<div class="row">
		<div class="col-lg-8 col-lg-offest-2">
			<form action="proses.php" method="POST">
				<table class="table">
					<tr>
						<th>#</th>
						<th>Nama Poliklinik</th>
						<th>Gedung</th>
					</tr>
				<?php
					$no=1; 
						foreach ($chk as $id) {
							$sql_poli=mysqli_query($con,"SELECT * FROM tb_poliklink WHERE id_poli='$id'")or die(mysqli_error($con));
							while ($data=mysqli_fetch_array($sql_poli)) {?>
								<tr>
									<td><?=$no++?></td>
									<td>
										<input type="hidden" name="id[]" value="<?=$data['id_poli']?>">
										<input type="text" name="nama[]" class="form-control" require value="<?=$data['nama_poli']?>">
									</td>
									<td>
										<input type="text" name="gedung[]" class="form-control" require value="<?=$data['gedung']?>">
									</td>
								</tr>
						<?php
							}
						}
						?>
				</table>
					<div class="form-group pull-right">
						<input type="submit" name="edit" value="Simpan Semua" class="btn btn-success">
					</div>
			</form>
			</div>
		</div>
	</div>
	<?php include_once('../_footer.php'); 
	}
?>