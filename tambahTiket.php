<?php
session_start();
// Include config file
require_once "config.php";
if($_SESSION["role"] != "admin"){
    header("location: home.php");
}
$namaKereta = $jenisKereta = $berangkatKereta = $berangkatWaktu = $tibaKereta = $tibaWaktu = $hargaKereta = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $namaKereta = $_POST["namaKereta"];
    $jenisKereta = $_POST["jenisKereta"];
    $berangkatKereta = $_POST["berangkatKereta"];
    $tibaKereta = $_POST["tibaKereta"];
    $berangkatWaktu = $_POST["berangkatWaktu"];
    $tibaWaktu = $_POST["tibaWaktu"];
    $hargaKereta = $_POST["hargaKereta"];
}   
$sql = "INSERT INTO tb_tiket 
        (nama_kereta, jenis_kereta, berangkat_lokasi, berangkat_waktu, tiba_lokasi, tiba_waktu, harga, dibuat, status_data) 
            VALUES
            ('$namaKereta',
            '$jenisKereta',
            '$berangkatKereta',
            '$berangkatWaktu',
            '$tibaKereta',
            '$tibaWaktu',
            '$hargaKereta',
            now(),
            'aktif');";

if (empty($namaKereta) === false){
    if($result = $mysqli->query($sql)){
        echo "<script>
                alert('Tiket Berhasil Dimasukkan Kedalam Database');
            </script>";
    } else {
        echo $mysqli->error;
    }
}

?>

<html>
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>booking kereta</title>
        <link rel="stylesheet" href="style.css" />
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>

    <body>
        <!--Navigation bar-->
        <div id="nav-placeholder">

        </div>

        <script>
        $(function(){
            $("#nav-placeholder").load("navAdmin.html");
        });
        </script>
        <!--end of Navigation bar-->

        <h2>(ADMIN) Tambah Daftar Tiket</h2>
        <?php
        // insert from form to tb_tiket
            // $sql = "SELECT * FROM tb_tiket";
        ?>
        <form id="tambahTiketForm" action="" method="post">
        <div class="formTambahTiket">
            <!-- <label for="username">username</label> -->
            <input name="namaKereta" class = "namaKereta" type="text" placeholder="Nama Kereta..." required/>
            <input name="jenisKereta" class = "namaKereta" type="text" placeholder="Jenis Kereta..." required/>
        </div>
        <div class="formTambahTiket">
            <!-- <label for="password" id="passLabel">password</label> -->
            <input name="berangkatKereta" id = "berangkatKereta" type="text" placeholder="Stasiun Berangkat..." required/>
            <a>>>></a>
            <input name="tibaKereta" id = "tibaKereta" type="text" placeholder="Stasiun Tiba..." required/>
        </div>
        <div class="formTambahTiket">
            <input name="berangkatWaktu" id = "berangkatWaktu" type="text" placeholder="Waktu Berangkat" required/>
            <a>>>></a>
            <input name="tibaWaktu" id = "tibakatWaktu" type="text" placeholder="Waktu Tiba" required/>
        </div>
        <div class="formTambahTiket">
            <input name="hargaKereta" id="hargaKereta" type="text" placeholder="Harga Tiket" required/>
        </div>
        <div class="buttonTambahTiket">
            <button type="submit">Tambah ke Daftar Tiket</button>
        </div>
        </form>
    </body>

</html>
