<?php  

require_once('./koneksi/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='GET') {
  
  $sql = "SELECT * FROM users WHERE status='1' AND level='user'";
  $res = mysqli_query($koneksi,$sql);
  $count = mysqli_num_rows($res);
  $result_member = array();
  if ($count>0) {
  	while($row = mysqli_fetch_array($res)){
  		array_push($result_member, array(
  			'id_user'=>$row[0],
  			'nama'=>$row[1],
  			'alamat'=>$row[2], 
  			'email'=>$row[3], 
  			'telpon'=>$row[4],
  			'perusahaan'=>$row[5],
  			'alamat_perusahaan'=>$row[6],
  			'password'=>$row[7],
  			'foto'=>$row[8],
  			'emas'=>$row[9],
        'perak'=>$row[10])
  	);
  	}
  	echo json_encode(array("status_code"=>200,"result_member"=>$result_member));
  	mysqli_close($koneksi);
  } else {
  	echo json_encode(array('status_code' =>404, 'message' => 'Upps.. data masih kosong'));
  }
}

?>