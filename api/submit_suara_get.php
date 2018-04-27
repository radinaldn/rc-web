<?php
include 'koneksi.php';

if($con)
{
	$id_keldesa = $_GET['id_keldesa'];
	$suara1 = $_GET['suara1'];
	$suara2 = $_GET['suara2'];
	$suara3 = $_GET['suara3'];
	$suara4 = $_GET['suara4'];
// 	$waktu = $_GET['waktu'];
// 	$foto = $_GET['foto'];

	$query = "INSERT INTO tb_suara(id_keldesa, suara1, suara2, suara3, suara4, waktu, foto) values ('$id_keldesa', '$suara1', '$suara2', '$suara3', '$suara4', NOW(), null)";

	$result = mysqli_query($con, $query);

	if($result)
	{
		$status = '1';
	}
	else
	{
	$status = '0';
	}
}
else { $status = 'DATABASE CONNECTION FAILED'; }

echo json_encode(array("success"=>$status));

mysqli_close($con);
?>