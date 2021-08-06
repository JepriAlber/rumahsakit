<?php include_once "../_header.php"; ?>
	<div class="box">
		<h1>Pasien</h1>
		<h4>
			<small>Edit Data Pasien</small>
			<div class="pull-right">
				<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">kembali</i></a>
			</div>
		</h4>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<?php
					$id = @$_GET['id'];
						$sql_pasien = mysqli_query($con,"SELECT * FROM tb_pasien WHERE id_pasien='$id'") or die (mysqli_error($con));
						$data = mysqli_fetch_array($sql_pasien); 
				?>
				<form action="proses.php" method="POST">
					<div class="form-group">
						<label for="no_identitas">Nomor Identitas:</label>
						<input type="hidden" name="id" value="<?=$data['id_pasien'];?>">
						<input type="number" name="no_identitas" class="form-control" id="no_identitas" autofocus required value="<?=$data['nomor_identitas'];?>">
					</div>
					<div class="form-group">
						<label for="nama">Nama Pasien:</label>
						<input type="text" name="nama" class="form-control" id="nama" required value="<?=$data['nama_pasien']?>">
					</div>
					<div class="form-group">
						<label for="jk">Jenis Kelamin:</label>
						<div>
							<label class="radio-inline">
								<input type="radio" name="jk" id="jk" required value="P"<?=$data['jenis_kelamin'] == "L" ? "checked" : null ?>>Laki-laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="jk" value="L" required <?=$data['jenis_kelamin'] == "P" ? "checked" : null?>>Perempuan
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat:</label>
						<textarea id="alamat" class="form-control" name="alamat"><?=$data['alamat']?></textarea>
					</div>
					<div class="form-group">
						<label for="no_telp">Nomor Telepon:</label>
						<input type="number" class="form-control" name="no_telp" value="<?=$data['no_telp']?>">
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="edit" value="Simpan" class="btn btn-success">
					</div>
				</form>
			</div>	
		</div>
	</div>
<?php include_once "../_footer.php"; ?>