<?php

require_once('./koneksi/koneksi.php');

$upload_path = 'img/'; //this is our upload folder

$response = array("error" => FALSE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//id_user (AutoIncreament)
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$telpon = $_POST['telpon'];
	$perusahaan = $_POST['perusahaan'];
	$alamat_perusahaan = $_POST['alamat_perusahaan'];
	$password = $_POST['password'];
	//$foto = $_POST['foto'];
	//$status = $_POST['status'];

	$sql = "SELECT * FROM users WHERE email='$email'";
	$res = mysqli_query($koneksi, $sql);
	$count = mysqli_num_rows($res);
	if ($count > 0) {
		$response["error"] = TRUE;
		$response["message"] = "e-mail sudah terdaftar " . $email;
		echo json_encode($response);
	} else {
		$foto=htmlspecialchars($_FILES['foto']['name']);
		$file_path = $upload_path . $foto; //file path to upload in the server
		move_uploaded_file($_FILES["foto"]["tmp_name"], $file_path);

		$sql = "INSERT INTO users (nama, alamat, email, telpon, perusahaan, alamat_perusahaan, password, foto) VALUES('$nama', '$alamat', '$email', '$telpon', '$perusahaan', '$alamat_perusahaan', '$password', '$foto')";
		$res = mysqli_query($koneksi, $sql);

		echo ($res) ? json_encode(array('status_code' => 200, 'message' => 'berhasil menambahkan data ' . $nama)) : json_encode(array('status_code' => 202, 'message' => 'data gagal ditambahkan'));
	}
} else {

	$response["error"] = TRUE;
	$response["status_code"] = 500;
	$response["message"] = "Parameter (email atau password) ada yang kurang";
	echo json_encode($response);
}
