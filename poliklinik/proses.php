<?php  
	require_once "../_config/config.php";
    require "../_assets/libs/vendor/autoload.php";
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	if (isset($_POST['add'])) {
 	    
 	    $total=$_POST['total'];
 	    for($i=1; $i<=$total; $i++){
 	    	$uuid = Uuid::uuid4()->toString();
	    	$nama = trim(mysqli_escape_string($con,$_POST['nama-'.$i]));
	    	$gedung = trim(mysqli_escape_string($con,$_POST['gedung-'.$i]));	
 	    
 	    $sql = mysqli_query($con,"INSERT INTO tb_poliklink (id_poli, nama_poli, gedung) VALUES ('$uuid','$nama','$gedung')") or die (mysqli_error($con));
 	    }

 	    
	    if ($sql){
	    		echo "<script>alert('".$total." data berhasil ditambahkan'); window.location='data.php'</script>";
	    	}else{
	    		echo "<script>alert('Gagal tambah data, coba lagi'); window.location='generation.php'</script>";
	    	}	
	    echo "<script>window.location='data.php'</script>";

    }elseif (isset($_POST['edit'])) {
		   
		   for($i=0; $i < count($_POST['id']); $i++){
		   		$id = $_POST['id'][$i];
		   		$nama = $_POST['nama'][$i];
		   		$gedung = $_POST['gedung'][$i];

		    $sql_ubah = mysqli_query($con,"UPDATE tb_poliklink SET nama_poli='$nama',gedung='$gedung' WHERE id_poli='$id'") or die (mysqli_error($con));
		   }
		   
		   if ($sql_ubah) {
		   	echo "<script>alert('Data berhasil di edit'); window.location='data.php';</script>";
		   }else{
		   	echo "<script>alert('Data gagal di edit'); window.location='data.php';</script>";
		   }
		   echo "window.location='data.php';</script>";
    }
?>