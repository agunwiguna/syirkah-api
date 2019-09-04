<?php  

 require_once './koneksi/koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $id_user = $_POST['id_user'];
  $password = $_POST['password'];
  $password_baru = $_POST['password_baru'];
  $ulangi_password_baru = $_POST['ulangi_password_baru'];

  $sql = "SELECT * FROM users WHERE id_user='$id_user' AND password='$password'";
  $res = mysqli_query($koneksi, $sql);
  $count = mysqli_num_rows($res);
  if ($count > 0) {
    if ($password_baru == $ulangi_password_baru) {

      $query = "UPDATE users SET password='$password_baru' WHERE id_user='$id_user'";
      $excQuery = mysqli_query($koneksi, $query); 
      if ($excQuery) {
        echo json_encode(array('status_code' =>200, 'message' => 'Password Berhasil diubah'));
      } else {
        echo json_encode(array('status_code' =>202, 'message' => 'Password gagal diubah'));
      }
    } else {
      echo json_encode(array('status_code' =>250, 'message' => 'Baru dan ulangi password tidak sama'));
    } 
  }else{
    echo json_encode(array('status_code' =>300, 'message' => 'Password saat ini salah'));
  }

 }else{
   echo json_encode(array('status_code' =>404, 'message' => 'Request tidak valid'));
 }

?>