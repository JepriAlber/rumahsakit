<?php 
	require_once "../_config/config.php";
	require "../_assets/libs/vendor/autoload.php";
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	if (isset($_POST['add'])) {
		$uuid = Uuid::uuid4()->toString();
		$id_pasien = trim(mysqli_escape_string($con,$_POST['pasien']));
		$keluhan = trim(mysqli_escape_string($con,$_POST['keluhan']));
		$id_dokter = trim(mysqli_escape_string($con,$_POST['dokter']));
		$diagnosa = trim(mysqli_escape_string($con,$_POST['diagnosa']));
		$id_poli = trim(mysqli_escape_string($con,$_POST['poli']));
		$tgl = trim(mysqli_escape_string($con,$_POST['tgl']));

			$sql_medis = mysqli_query($con,"INSERT INTO tb_rekammedis (id_rm,id_passien,keluhan,id_dokter,diagnosa,id_poli,tgl_periksa) VALUES ('$uuid','$id_pasien','$keluhan','$id_dokter','$diagnosa','$id_poli','$tgl')") or die (mysqli_error($con));

		$obat = $_POST['obat'];

			foreach ($obat as $bat) {
				$sql_rm_obat = mysqli_query($con,"INSERT INTO tb_rm_obat (id_rm,id_obat) VALUES ('$uuid','$bat')") or die (mysqli_error($con));
			}	

		if ($sql_medis == true & $sql_rm_obat == true) {
			echo "<script>alert('Data berhasil disimpan'); window.location='data.php';</script>";
		}
	}
?>