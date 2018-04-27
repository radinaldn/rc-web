<?php
include 'koneksi.php';

if($con)
{
	$id_keldesa = $_POST['id_keldesa'];
	$suara1 = $_POST['suara1'];
	$suara2 = $_POST['suara2'];
	$suara3 = $_POST['suara3'];
	$suara4 = $_POST['suara4'];
	$waktu = $_POST['waktu'];
	$foto = $_POST['foto'];

	$query = "INSERT INTO tb_suara(id_keldesa, suara1, suara2, suara3, suara4, waktu, foto) values ('$id_keldesa', '$suara1', '$suara2', '$suara3', '$suara4', '$waktu', '$foto')";

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