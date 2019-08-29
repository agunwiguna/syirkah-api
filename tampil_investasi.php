<?php
require_once('./koneksi/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='GET') {
  
  $id_user = $_GET['id_user'];
  
  $sql = "SELECT * FROM investasi WHERE id_user='$id_user'";
  $res = mysqli_query($koneksi,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array(
      'id_investasi'=>$row[0],
      'id_user'=>$row[1],
      'nama_investasi'=>$row[2], 
      'deskripsi'=>$row[3], 
      'tgl_mulai'=>$row[4],
      'tgl_selesai'=>$row[5],
      'kebutuhan_biaya'=>$row[6],
      'total_biaya'=>$row[7])
  );
  }
  echo json_encode(array("status_code"=>200,"result"=>$result));
  mysqli_close($koneksi);
}

?>