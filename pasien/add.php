<?php include_once "../_header.php"; ?>
	<div class="box">
		<h1>Pasien</h1>
		<h4>
			<small>Tambah Data Pasien</small>
			<div class="pull-right">
				<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
				<a href=""></a>
			</div>
		</h4>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<form method="POST" action="proses.php">
					<div class="form-group">
						<label for="no_identitas">No Identitas:</label>
						<input type="number" name="no_identitas" id="no_identitas" required class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label for="nama">Nama Pasien:</label>
						<input type="text" name="nama" id="nama" required class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label for="nama">Jenis Kelamin:</label>
						<div>
							<label class="radio-inline">
								<input type="radio" name="jk" id="jk" value="L" required>Laki-Laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="jk" value="P" required>Perempuan
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat :</label>
						<textarea id="alamat" name="alamat" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label for="no_telp">No Telepon :</label>
						<input type="number" name="no_telp" id="no_telp" required class="form-control" autofocus>
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="add" value="Simpan" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include_once "../_footer.php"; ?>