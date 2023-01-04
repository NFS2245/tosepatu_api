<?php
include 'connect.php';

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$id_user = ($_POST['id_user'] = generateRandomString());
$username = $_POST['username_user'];
$password = md5($_POST['password_user']);
$no_telp_user = $_POST['no_telp_user'];

$checkemail = "SELECT * FROM akun_user WHERE username_user='$username'";
$sendEmail = mysqli_query($connect, $checkemail);
$countEmail = mysqli_num_rows($sendEmail);

if ($countEmail == 1) {
    echo json_encode("username sudah terdaftar");
} else {
    $insert = "INSERT INTO akun_user (id_user, username_user, password_user, no_telp_user) 
VALUES ('$id_user', '$username', '$password', '$no_telp_user')";
    $query = mysqli_query($connect, $insert);
    if ($query) {
        echo json_encode("Success");
    } else {
        echo json_encode("Error");
    }
}
?>
