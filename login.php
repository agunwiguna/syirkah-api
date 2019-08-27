<?php  

require_once('./koneksi/koneksi.php');

$response = array("error" => FALSE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$res = mysqli_query($koneksi, $sql);
	$count = mysqli_num_rows($res);
	if ($count > 0) {
		while ($row = mysqli_fetch_array($res)) {

			if ($row['status']=='1') {

				$response["error"] = FALSE;
				$response["status_code"] = 200;
				$response['user']['nama'] = $row['nama'];
				$response['user']['alamat'] = $row['alamat'];
				$response['user']['email'] = $row['email'];
				$response['user']['telpon'] = $row['telpon'];
				$response['user']['perusahaan'] = $row['perusahaan'];
				$response['user']['alamat_perusahaan'] = $row['alamat_perusahaan'];
				$response['user']['password'] = $row['password'];
				$response['user']['foto'] = $row['foto'];
				$response['user']['emas'] = $row['emas'];
				$response["message"] = "Login Berhasil";
				echo json_encode($response);

			} else {

				$response["error"] = TRUE;
				$response["status_code"] = 400;
				$response["message"] = "Akun belum di aktivasi oleh Admin";
				echo json_encode($response);
			}
		}
	} else {
		$response["error"] = TRUE;
		$response["status_code"] = 404;
        $response["message"] = "Login gagal. Password/Email salah";
        echo json_encode($response);
	}

} else {

	$response["error"] = TRUE;
	$response["status_code"] = 500;
    $response["message"] = "Parameter (email atau password) ada yang kurang";
    echo json_encode($response);
}


?>