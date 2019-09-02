<?php
 
 require_once './koneksi/koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $id_user = $_POST['id_user'];
  $jenis = $_POST['jenis'];
  $berat = $_POST['berat'];
  $tahun_produksi = $_POST['tahun_produksi'];
  $harga_beli = $_POST['harga_beli'];
  $harga_jual = $_POST['harga_jual'];
  $status = 'Belum Terjual';

  $query = "INSERT INTO logam_mulia (id_user,jenis,berat,tahun_produksi,harga_beli,harga_jual,status) VALUES ('$id_user','$jenis','$berat','$tahun_produksi','$harga_beli','$harga_jual','$status')";

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