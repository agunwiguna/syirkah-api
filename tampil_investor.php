<?php
require_once('./koneksi/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='GET') {
  
  $sql = "SELECT * FROM investor a JOIN users b ON b.id_user=a.id_user_investor";
  $res = mysqli_query($koneksi,$sql);
  $count = mysqli_num_rows($res);
  $result_investor = array();
  //echo $count;
  if ($count>0) {
  	while($row = mysqli_fetch_array($res)){
  		array_push($result_investor, array(
  			'id_investasi'=>$row[0],
        'id_user_investor'=>$row[1],
        'id_investasi'=>$row[2], 
        'dana'=>$row[3], 
        'id_user'=>$row[4],
        'nama'=>$row[5],
        'alamat'=>$row[6],
        'email'=>$row[7],
        'telpon'=>$row[8],
        'perusahaan'=>$row[9],
        'alamat_perusahaan'=>$row[10],
        'password'=>$row[11],
        'foto'=>$row[12],
        'emas'=>$row[13],
        'perak'=>$row[14],
        'status'=>$row[15])
  	  );
  	}
  	echo json_encode(array("status_code"=>200,"result_investor"=>$result_investor));
  	mysqli_close($koneksi);
  } else {
  	echo json_encode(array('status_code' =>404, 'message' => 'Upps.. data investor masih kosong'));
  }
}

?>