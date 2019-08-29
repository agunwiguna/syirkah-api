<?php
 
 require_once './koneksi/koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $id_user_investor = $_POST['id_user_investor'];
  $id_investasi = $_POST['id_investasi'];
  $dana = $_POST['dana'];
  $sisa = $_POST['sisa'];

  $query = "INSERT INTO investor (id_user_investor,id_investasi,dana) VALUES ('$id_user_investor','$id_investasi','$dana')";

  $query2 = "UPDATE investasi SET sisa='$sisa' WHERE id_investasi='$id_investasi'";

  $excQuery = mysqli_query($koneksi, $query);
  $excQuery2 = mysqli_query($koneksi, $query2); 
  
  if ($excQuery && $excQuery) {
  	echo json_encode(array('status_code' =>200, 'message' => 'Berhasil menambahkan data'));
  } else {
  	echo json_encode(array('status_code' =>202, 'message' => 'Data gagal ditambahkan'));
  }

 }else{
   echo json_encode(array('status_code' =>404, 'message' => 'Request tidak valid'));
 }

?>