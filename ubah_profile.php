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

	if (!is_uploaded_file($_FILES['foto']['tmp_name'])) {
		
		$sql = "UPDATE users SET nama='$nama',alamat='$alamat',email='$email',telpon='$telpon',perusahaan='$perusahaan',alamat_perusahaan='$alamat_perusahaan',emas='$emas',perak='$perak' WHERE id_user='$id_user'";
		$res = mysqli_query($koneksi, $sql);

		echo ($res) ? json_encode(array('status_code' => 200, 'message' => 'Data Berhasil diubah..')) : json_encode(array('status_code' => 202, 'message' => 'Data gagal diubah'));

	} else {
		
		$sql = "SELECT * FROM users WHERE id_user='$id_user'";
		$res = mysqli_query($koneksi, $sql);

			while ($row = mysqli_fetch_array($res)) {

					if (file_exists("img/".$row['foto'])) {
						unlink("img/".$row['foto']);
					}
					
				
			}
		$foto = htmlspecialchars($_POST['foto']);
		$foto = str_replace('data:image/png;base64,', '', $foto);
		$foto = str_replace(' ', '+', $foto);

		$data = base64_decode($foto);
		$file = uniqid() . '.png';

		file_put_contents('img/'.$file, $data);

		$sql = "UPDATE users SET nama='$nama',alamat='$alamat',email='$email',telpon='$telpon',perusahaan='$perusahaan',alamat_perusahaan='$alamat_perusahaan',foto='$file',emas='$emas',perak='$perak' WHERE id_user='$id_user'";

		$res = mysqli_query($koneksi, $sql);

		echo ($res) ? json_encode(array('status_code' => 300, 'message' => 'Data Berhasil diubah..')) : json_encode(array('status_code' => 303, 'message' => 'Data gagal diubah'));	 

	}
	
}
