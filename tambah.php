<?php
require_once './koneksi/koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "INSERT INTO akun (email, password) VALUES ('$email','$password')";
  $excQuery = mysqli_query($koneksi, $query); 
  echo ($excQuery) ? json_encode(array('status_code' =>200, 'message' => 'berhasil menambahkan data '.$nama)) :  json_encode(array('status_code' =>202, 'message' => 'data gagal ditambahkan'));
 }
 else
 {
   echo json_encode(array('status_code' =>404, 'message' => 'request tidak valid'));
 }
?>