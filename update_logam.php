<?php  

 require_once './koneksi/koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $id_logam = $_POST['id_logam'];
  $jenis = $_POST['jenis'];
  $berat = $_POST['berat'];
  $tahun_produksi = $_POST['tahun_produksi'];
  $harga_beli = $_POST['harga_beli'];
  $harga_jual = $_POST['harga_jual'];
  $status = $_POST['status'];

  $query = "UPDATE logam_mulia SET jenis='$jenis',berat='$berat',tahun_produksi='$tahun_produksi',harga_jual='$harga_jual', status='$status' WHERE id_logam='$id_logam'";

  $excQuery = mysqli_query($koneksi, $query); 
  
  if ($excQuery) {
  	echo json_encode(array('status_code' =>200, 'message' => 'Berhasil mengubah data'));
  } else {
  	echo json_encode(array('status_code' =>202, 'message' => 'Data gagal diubah'));
  }

 }else{
   echo json_encode(array('status_code' =>404, 'message' => 'Request tidak valid'));
 }

?>