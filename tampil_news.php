<?php
require_once('./koneksi/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='GET') {

  $sql = "SELECT * FROM news ORDER BY id DESC";
  
  $res = mysqli_query($koneksi,$sql);
  $count = mysqli_num_rows($res);
  $result_news = array();
  if ($count>0) {
    while($row = mysqli_fetch_array($res)){
      array_push($result_news, array(
        'id'=>$row[0],
        'title'=>$row[1],
        'description'=>$row[2],
        'banner'=>$row[3],
        'created_at'=>$row[4])
      );
    }
    echo json_encode(array("status_code"=>200,"result_news"=>$result_news));
    mysqli_close($koneksi);
  } else {
    echo json_encode(array('status_code' =>404, 'message' => 'Upps.. Data Jual Logam masih kosong'));
  }
}

?>