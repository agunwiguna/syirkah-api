<?php
require_once('./koneksi/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='GET') {
  
  $sql = "SELECT * FROM investasi a JOIN users b ON a.id_user=b.id_user ORDER BY id_investasi DESC LIMIT 3 ";
  $res = mysqli_query($koneksi,$sql);
  $count = mysqli_num_rows($res);
  $result_limit_investasi = array();
  if ($count>0) {
  	while($row = mysqli_fetch_array($res)){
  		array_push($result_limit_investasi, array(
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
  	echo json_encode(array("status_code"=>200,"result_limit_investasi"=>$result_limit_investasi));
  	mysqli_close($koneksi);
  } else {
  	echo json_encode(array('status_code' =>404, 'message' => 'Upps.. data masih kosong'));
  }
}

?>