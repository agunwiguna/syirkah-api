<?php 

 require_once './koneksi/koneksi.php';
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 	$id_logam = $_POST['id_logam'];

 	$query = "DELETE FROM logam_mulia WHERE id_logam ='$id_logam'";
 	$execQuery = mysqli_query($koneksi, $query); 
 	
 	if ($execQuery) {
  	echo json_encode(array('status_code' =>200, 'message' => 'Berhasil menghapus data'));
  } else {
  	echo json_encode(array('status_code' =>202, 'message' => 'Data gagal dihapus'));
  }

 }
 else
 {
 	 echo json_encode(array('status_code' =>404, 'message' => 'Request tidak valid'));
 }
 ?>