<?php
include 'connect.php';
$idUser = $_POST['id_user'];
$queryResult = "SELECT pesanan.id_pesanan, pesanan.uid_user, pesanan.tanggal_masuk, pesanan.grand_total,pesanan.status_pesanan FROM pesanan WHERE pesanan.uid_user ='$idUser' AND pesanan.status_pesanan='Selesai'";
$result = mysqli_query($connect, $queryResult);
$list = array();
if($result){
    while($row= $result->fetch_assoc()){
        $list[]= $row;
    }
    echo json_encode($list);
}
?>

