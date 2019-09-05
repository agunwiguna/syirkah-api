<?php

require_once('./koneksi/koneksi.php');

$upload_path = 'img/'; 

$response = array("error" => FALSE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$telpon = $_POST['telpon'];
	$perusahaan = $_POST['perusahaan'];
	$alamat_perusahaan = $_POST['alamat_perusahaan'];
	$emas = $_POST['emas'];
	$perak = $_POST['perak'];
		
	$sql = "UPDATE users SET nama='$nama',alamat='$alamat',email='$email',telpon='$telpon',perusahaan='$perusahaan',alamat_perusahaan='$alamat_perusahaan',emas='$emas',perak='$perak' WHERE id_user='$id_user'";
	$res = mysqli_query($koneksi, $sql);

	echo ($res) ? json_encode(array('status_code' => 200, 'message' => 'Data Berhasil diubah..')) : json_encode(array('status_code' => 202, 'message' => 'Data gagal diubah'));
}
