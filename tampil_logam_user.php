<?php
require_once('./koneksi/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='GET') {
  
  $id_user = $_GET['id_user'];

  $sql = "SELECT * FROM logam_mulia a JOIN users b ON a.id_user=b.id_user WHERE a.id_user='$id_user' ORDER BY id_logam DESC";
  
  $res = mysqli_query($koneksi,$sql);
  $count = mysqli_num_rows($res);
  $result_logam_user = array();
  if ($count>0) {
    while($row = mysqli_fetch_array($res)){
      array_push($result_logam_user, array(
        'id_logam'=>$row[0],
        'id_user'=>$row[1],
        'jenis'=>$row[2], 
        'berat'=>$row[3], 
        'tahun_produksi'=>$row[4],
        'harga_beli'=>$row[5],
        'harga_jual'=>$row[6],
        'status'=>$row[7],
        'id_user'=>$row[8],
        'nama'=>$row[9],
        'alamat'=>$row[10],
        'email'=>$row[11],
        'telpon'=>$row[12],
        'perusahaan'=>$row[13],
        'alamat_perusahaan'=>$row[14],
        'password'=>$row[15],
        'foto'=>$row[16])
      );
    }
    echo json_encode(array("status_code"=>200,"result_logam_user"=>$result_logam_user));
    mysqli_close($koneksi);
  } else {
    echo json_encode(array('status_code' =>404, 'message' => 'Upps.. Data Jual Logam masih Kosong'));
  }
}

?>