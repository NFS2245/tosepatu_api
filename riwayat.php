<?php
include 'connect.php';
$idUser = $_POST['id_user'];
$queryResult = "SELECT pesanan.id_pesanan, metode_pengiriman.nama_pengiriman, pesanan.catatan, pesanan.tanggal_masuk, pesanan.grand_total, pesanan.no_telp, pesanan.alamat FROM pesanan INNER JOIN metode_pengiriman on metode_pengiriman.id_pengiriman = pesanan.uid_pengiriman WHERE pesanan.uid_user ='$idUser' ORDER BY pesanan.tanggal_masuk DESC";
$result = mysqli_query($connect, $queryResult);
$list = array();
if($result){
    while($row= $result->fetch_assoc()){
        $list[]= $row;
    }
    echo json_encode($list);
}
?>

