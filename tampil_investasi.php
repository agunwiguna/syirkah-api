<?php
require_once('./koneksi/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='GET') {
  
  $sql = "SELECT * FROM investasi";
  $res = mysqli_query($koneksi,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array(
    	'id_investasi'=>$row[0], 
    	'nama_investasi'=>$row[1], 
    	'deskripsi'=>$row[2], 
    	'tgl_mulai'=>$row[3],
    	'tgl_selesai'=>$row[4],
    	'kebutuhan_biaya'=>$row[5],
    	'total_biaya'=>$row[6])
	);
  }
  echo json_encode(array("status_code"=>200,"result"=>$result));
  mysqli_close($koneksi);
}

?