<?php  
	require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	if (isset($_POST['add'])) {
 	    $uuid = Uuid::uuid4()->toString();
 	    $no_identitas = trim(mysqli_escape_string($con,$_POST['no_identitas']));
	    $nama = trim(mysqli_escape_string($con,$_POST['nama']));
	    $jk = trim(mysqli_escape_string($con,$_POST['jk']));
	    $alamat = trim(mysqli_escape_string($con,$_POST['alamat']));
	    $no_telp = trim(mysqli_escape_string($con,$_POST['no_telp']));


	    //cek validasi apakah data sudah pernah di input atau tidak
	    $sql_cek = mysqli_query($con,"SELECT * FROM tb_pasien WHERE nomor_identitas = '$no_identitas'") or die (mysqli_error($con));
	    if (mysqli_num_rows($sql_cek) > 0 ) {
	    	echo "<script>alert('Nomor identitas sudah pernah di input'); window.location='data.php';</script>";
	    }else{
	    	mysqli_query($con,"INSERT INTO tb_pasien (id_pasien,nomor_identitas,nama_pasien,jenis_kelamin,alamat,no_telp) VALUES ('$uuid','$no_identitas','$nama','$jk','$alamat','$no_telp')") or die (mysqli_error($con));
	    	echo "<script>alert('Data berhasil ditambah');window.location='data.php'</script>";
	    }
    }elseif (isset($_POST['edit'])) {
    	
    	$id = $_POST['id'];
    	$no_identitas = trim(mysqli_escape_string($con,$_POST['no_identitas']));
	    $nama = trim(mysqli_escape_string($con,$_POST['nama']));
	    $jk = trim(mysqli_escape_string($con,$_POST['jk']));
	    $alamat = trim(mysqli_escape_string($con,$_POST['alamat']));
	    $no_telp = trim(mysqli_escape_string($con,$_POST['no_telp']));


	    //cek validasi apakah data sudah pernah di input atau tidak
	    $sql_cek = mysqli_query($con,"SELECT * FROM tb_pasien 
	    							WHERE nomor_identitas = '$no_identitas' 
	    							AND id_pasien !='$id'") or die (mysqli_error($con));
	    if (mysqli_num_rows($sql_cek) > 0 ) {
	    	echo "<script>alert('Nomor identitas sudah pernah di input'); window.location='edit.php?id=$id';</script>";
	    }else{
	    	mysqli_query($con,"UPDATE tb_pasien 
	    					SET nomor_identitas ='$no_identitas', nama_pasien ='$nama', jenis_kelamin ='$jk', 
	    					alamat ='$alamat', no_telp ='$no_telp' 
	    					WHERE id_pasien ='$id'") or die (mysqli_error($con));
	    	echo "<script>alert('Data berhasil diedit');window.location='data.php'</script>";
	    }
    }else if (isset($_POST['import'])) {
    	$file =$_FILES['file']['name'];
    	$extensi = explode(".",$file);
    	$file_name = "file-".round(microtime(true)).".".end($extensi);
    	$sumber = $_FILES['file']['tmp_name'];
    	$target_dir = "../_file/";
    	$target_file = $target_dir.$file_name;
    	$upload = move_uploaded_file($sumber, $target_file);
    	
    	$obj = PHPExcel_IOFactory::load($target_file);
    	$all_data = $obj->getActiveSheet()->toArray(null,true,true,true);

    		$sql_import = "INSERT INTO tb_pasien (id_pasien,nomor_identitas,nama_pasien,jenis_kelamin,alamat,no_telp) VALUES";
    		for($i=3; $i<=count($all_data);$i++){
    			$uuid = Uuid::uuid4()->toString();
    			$no_identitas = $all_data[$i]['A'];
    			$nama = $all_data[$i]['B'];
    			$jk = $all_data[$i]['C'];
    			$alamat = $all_data[$i]['D'];
    			$no_telp = $all_data[$i]['E'];
    			$sql_import .="('$uuid','$no_identitas','$nama','$jk','$alamat','$no_telp'),";
    		}
    		$sql_import = substr($sql_import,0,-1);
    		// cek
    		// echo $sql_import;
    		mysqli_query($con,$sql_import)or die(mysqli_error($con));
		// hapus File lansung ketika di upload    	
    	unlink($target_file);
    		echo "<script>alert('Upload Sukses'); window.location='data.php';</script>";	
    }
?>