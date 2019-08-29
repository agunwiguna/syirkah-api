<?php 

 require_once './koneksi/koneksi.php';
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 	$id_investasi = $_POST['id_investasi'];

 	$query = "DELETE FROM investasi WHERE id_investasi ='$id_investasi'";
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