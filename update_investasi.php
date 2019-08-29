<?php  

 require_once './koneksi/koneksi.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $id_investasi = $_POST['id_investasi'];
  $nama_investasi = $_POST['nama_investasi'];
  $deskripsi = $_POST['deskripsi'];
  $tgl_mulai = $_POST['tgl_mulai'];
  $tgl_selesai = $_POST['tgl_selesai'];
  $kebutuhan_biaya = $_POST['kebutuhan_biaya'];
  $total_biaya = $_POST['total_biaya'];

  $query = "UPDATE investasi SET nama_investasi='$nama_investasi',deskripsi='$deskripsi',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',kebutuhan_biaya='$kebutuhan_biaya',total_biaya='$total_biaya' WHERE id_investasi='$id_investasi'";

  $excQuery = mysqli_query($koneksi, $query); 
  
  if ($excQuery) {
  	echo json_encode(array('status_code' =>200, 'message' => 'Berhasil mengubah data'));
  } else {
  	echo json_encode(array('status_code' =>202, 'message' => 'Data gagal diubah'));
  }

 }else{
   echo json_encode(array('status_code' =>404, 'message' => 'Request tidak valid'));
 }

?>