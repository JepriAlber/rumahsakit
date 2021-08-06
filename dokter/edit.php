<?php include_once "../_header.php"; ?>
	<div class="box">
		<h1>Dokter</h1>
		<h4>
			<small>Edit Data Dokter</small>
			<div class="pull-right">
				<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
				<a href=""></a>
			</div>
		</h4>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<?php
					$id = @$_GET['id'];
					$sql_dokter = mysqli_query($con,"SELECT * FROM tb_dokter WHERE id_dokter='$id'") or die (mysqli_error($con));
					$data=mysqli_fetch_array($sql_dokter);
				 ?>
				<form method="POST" action="proses.php">
					<div class="form-group">
						<label for="nama">Nama Dokter:</label>
						<input type="hidden" name="id" value="<?=$data['id_dokter'];?>">
						<input type="text" name="nama" id="nama" required class="form-control" autofocus value="<?=$data['nama_dokter'];?>">
					</div>
					<div class="form-group">
						<label for="spesialis">Spesialis :</label>
						<input type="text" name="spesialis" id="spesialis" required class="form-control" autofocus value="<?=$data['spesialis'];?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat :</label>
						<textarea id="alamat" name="alamat" class="form-control" required><?=$data['alamat'];?></textarea>
					</div>
					<div class="form-group">
						<label for="no_telp">No Telepon :</label>
						<input type="number" name="no_telp" id="no_telp" required class="form-control" autofocus value="<?=$data['no_telp'];?>">
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="edit" value="Simpan" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include_once "../_footer.php"; ?>