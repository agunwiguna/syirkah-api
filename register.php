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
	$created_at = date("Y-m-d");
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

		$foto = htmlspecialchars($_POST['foto']);

		$foto = str_replace('data:image/png;base64,', '', $foto);
		$foto = str_replace(' ', '+', $foto);

		$data = base64_decode($foto);
		$file = uniqid() . '.png';

		file_put_contents('img/'.$file, $data);

		$sql = "INSERT INTO users (nama, alamat, email, telpon, perusahaan, alamat_perusahaan, password, foto,created_at) VALUES('$nama', '$alamat', '$email', '$telpon', '$perusahaan', '$alamat_perusahaan', '$password', '$file','$created_at')";
		$res = mysqli_query($koneksi, $sql);

		echo ($res) ? json_encode(array('status_code' => 200, 'message' => 'Registrasi Berhasil..')) : json_encode(array('status_code' => 202, 'message' => 'Data gagal ditambahkan'));
	}
} else {

	$response["error"] = TRUE;
	$response["status_code"] = 500;
	$response["message"] = "Parameter (email atau password) ada yang kurang";
	echo json_encode($response);
}
