<?php
include 'connect.php';

function generateRandomString($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
        
        $id_pesanan = ($_POST['id_pesanan'] = generateRandomString());
        $uid_pengiriman = ($_POST['uid_pengiriman'] = "MT220921001");
        $uid_user = $_POST['uid_user'];
        $catatan = $_POST['catatan'];
        $grand_total = $_POST['grand_total'];
        $no_telp = $_POST['no_telp'];
        $status_pesanan = ($_POST['status_pesanan'] = "Menunggu Konfirmasi");
        $uid_pesanan = ($_POST['uid_pesanan'] = $id_pesanan);
        $uid_layanan = ($_POST['uid_layanan'] = "TL220921001");
        $nama = $_POST['nama'];
        $qty = $_POST['qty'];
        $harga_layanan = $_POST['harga_layanan'];
        $sub_total = $_POST['sub_total']; 
        $uid_pesanan2 = ($_POST['uid_pesanan2'] = $id_pesanan);
        $uid_layanan2 = ($_POST['uid_layanan2'] = "TL220921002");
        $nama2 = $_POST['nama2'];
        $qty2 = $_POST['qty2'];
        $harga_layanan2 = $_POST['harga_layanan2'];
        $sub_total2 = $_POST['sub_total2']; 
        

        $insert = "INSERT INTO pesanan (id_pesanan, uid_pengiriman,uid_user, catatan, grand_total, no_telp, tanggal_selesai, status_pesanan) 
        VALUES ('".$id_pesanan."','".$uid_pengiriman."','".$uid_user."','".$catatan."','".$grand_total."','".$no_telp."',DATE_ADD(NOW(), INTERVAL 5 DAY),'".$status_pesanan."')";

        $insert2 = "INSERT INTO detail_pesanan (uid_pesanan, uid_layanan, nama, qty, harga_layanan, sub_total) 
        VALUES ('".$uid_pesanan."','".$uid_layanan."', '".$nama."','".$qty."','".$harga_layanan."','".$sub_total."')";
    
    $insert3= "INSERT INTO detail_pesanan (uid_pesanan, uid_layanan, nama, qty, harga_layanan, sub_total) 
    VALUES ('".$uid_pesanan2."','".$uid_layanan2."', '".$nama2."','".$qty2."','".$harga_layanan2."','".$sub_total2."')";
    $query = mysqli_query($connect, $insert);
    $query2 = mysqli_query($connect, $insert2);
    $query3 = mysqli_query($connect, $insert3);
    if ($query) {
        echo json_encode("Success");
    } 
    
    
?>

