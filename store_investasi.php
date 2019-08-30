<?php
 
 require_once './koneksi/koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $id_user = $_POST['id_user'];
  $nama_investasi = $_POST['nama_investasi'];
  $deskripsi = $_POST['deskripsi'];
  $tgl_mulai = $_POST['tgl_mulai'];
  $tgl_selesai = $_POST['tgl_selesai'];
  $kebutuhan_biaya = $_POST['kebutuhan_biaya'];
  $total_biaya = $_POST['total_biaya'];
  $sisa = $_POST['kebutuhan_biaya'];

  $query = "INSERT INTO investasi VALUES ('','.$id_user.','.$nama_investasi.','.$deskripsi.','.$tgl_mulai.','.$tgl_selesai.','.$kebutuhan_biaya.','.$total_biaya.','.$sisa.')";

  $excQuery = mysqli_query($koneksi, $query); 
  
  if ($excQuery) {
  	echo json_encode(array('status_code' =>200, 'message' => 'Berhasil menambahkan data'));
  } else {
  	echo json_encode(array('status_code' =>202, 'message' => 'Data gagal ditambahkan'));
  }

 }else{
   echo json_encode(array('status_code' =>404, 'message' => 'Request tidak valid'));
 }

?>