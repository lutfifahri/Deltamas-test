<?php
session_start();
include 'koneksi.php';

$Username = mysqli_real_escape_string($koneksi, $_POST['Username']);
$Password = mysqli_real_escape_string($koneksi, md5($_POST['Password']));
// query 
// $query  = "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'";
// $result     = mysqli_query($koneksi, $query);
// $num_row     = mysqli_num_rows($result);
// $row         = mysqli_fetch_array($result);

$f4hri = mysqli_query($koneksi, "SELECT * FROM users WHERE Username = '$Username' AND Password='$Password'");

// if ($num_row >= 1) {

//     echo "success";
//     $tampilkan = mysqli_fetch_assoc($result);
//     $_SESSION['Username']       = $tampilkan['Username'];
// } else {
//     echo "error";
// }
$test     = mysqli_num_rows($f4hri);
if ($test > 0) {
    $tampilkan = mysqli_fetch_assoc($f4hri);
    echo "success";
    $_SESSION['SES_ADM'] = $tampilkan['Username'];
    $_SESSION['SES_Level'] = $tampilkan['Level'];
} else {
    echo "error";
}
