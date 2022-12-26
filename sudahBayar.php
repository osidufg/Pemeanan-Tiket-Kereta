<?php
// Include config file
require_once "config.php";
// Check if user isn't logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: login.php");
    exit;
}
$sql = "UPDATE tb_pesan SET status_bayar = 'Sudah Bayar' WHERE id_pesan = '{$_GET['pesan']}'";  
    if($result = $mysqli->query($sql)){
        echo "<script>
                alert('Pesanan Berhasil Ditandai Sudah Bayar');
                window.location.href='konfirmBayar.php';
                </script>";
    } else {
        echo "<script>
                alert('eror ges');
            </script>";
    }
?>