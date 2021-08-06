<?php  
	require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	if (isset($_POST['add'])) {
 	    $uuid = Uuid::uuid4()->toString();
	    $nama = trim(mysqli_escape_string($con,$_POST['nama']));
	    $spesialis = trim(mysqli_escape_string($con,$_POST['spesialis']));
	    $alamat = trim(mysqli_escape_string($con,$_POST['alamat']));
	    $no_telp = trim(mysqli_escape_string($con,$_POST['no_telp']));

	    	mysqli_query($con,"INSERT INTO tb_dokter (id_dokter,nama_dokter,spesialis,alamat,no_telp) VALUES ('$uuid','$nama','$spesialis','$alamat','$no_telp')") or die (mysqli_error($con));
	    	echo "<script>alert('Data berhasil ditambah');window.location='data.php'</script>";

    }elseif (isset($_POST['edit'])) {
    	
    	$id = $_POST['id'];
	    $nama = trim(mysqli_escape_string($con,$_POST['nama']));
	    $spesialis = trim(mysqli_escape_string($con,$_POST['spesialis']));
	    $alamat = trim(mysqli_escape_string($con,$_POST['alamat']));
	    $no_telp = trim(mysqli_escape_string($con,$_POST['no_telp']));

	    	mysqli_query($con,"UPDATE tb_dokter SET nama_dokter='$nama', spesialis='$spesialis', alamat='$alamat',no_telp='$no_telp' WHERE id_dokter='$id'") or die (mysqli_error($con));
	    	echo "<script>alert('Data berhasil di edit');window.location='data.php'</script>";
    }
?>