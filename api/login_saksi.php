<?php
	/* login.php
     untuk pengecekkan akun login native ke server
    */
	include 'koneksi.php';
	
	if ($con)
	{

	class usr{}
	
	$id_keldesa = $_POST["id_keldesa"];
	$no_hp = $_POST['no_hp'];
	
	if ((empty($id_keldesa)) || (empty($no_hp))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = "SELECT tb_saksi.id_keldesa, tb_saksi.nama, tb_keldesa.nama AS nama_keldesa FROM tb_saksi INNER JOIN tb_keldesa WHERE tb_saksi.id_keldesa = tb_keldesa.id_keldesa AND tb_saksi.id_keldesa='$id_keldesa' AND tb_saksi.no_hp='$no_hp';";
	$result = mysqli_query($con, $query);
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['nama'];
		$response->id_keldesa = $row['id_keldesa'];
		$response->nama = $row['nama'];
		$response->nama_keldesa = $row['nama_keldesa'];
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Username atau no_hp salah";
		die(json_encode($response));
	}

} else {
	echo "DATABASE CONNECTION FAILED";
}
	
	mysql_close();

?>