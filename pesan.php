<?php
session_start();
// Include config file
require_once "config.php";
// Check if user isn't logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: login.php");
    exit;
}

$namaPesan_err = $nikPesan_err = $jumlahPenumpang_err = "";

$pesanID = $namaPesan = $nikPesan = $jumlahPenumpang = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $namaPesan = $_POST["namaPesan"];
    $nikPesan = $_POST["nikPesan"];
    $jumlahPenumpang = $_POST["jumlahPenumpang"];

    // gajadi dipake. mending pake pattern daripada validasi gini
    // if(is_numeric($_POST["namaPesan"]) === false){
    //     $namaPesan = $_POST["namaPesan"];
    // } else {
    //     $namaPesan_err = "Nama pemesan harus berupa huruf.";
    // }
    
    // if(is_numeric($_POST["nikPesan"]) === 1){
    //     $nikPesan = $_POST["nikPesan"];
    // } else {
    //     $nikPesan_err = "NIK harus berupa angka.";
    // }
    
    // if(is_numeric($_POST["jumlahPenumpang"]) === 1){
    //     if($_POST["jumlahPenumpang"] > 0){
    //         $jumlahPenumpang = $_POST["jumlahPenumpang"];
    //     } else{
    //         $jumlahPenumpang_err = "Jumlah penumpang tidak boleh kurang dari nol.";
    //     }
    // } else {
    //     $jumlahPenumpang_err = "Jumlah penumpang tidak boleh kurang dari nol.";
    // }
}   
    $sql = "INSERT INTO tb_pesan 
        (id_user, id_tiket, nama_pesan, nik_pesan, jumlah_penumpang, kode_pesan, dibuat, status_data) 
            VALUES
            ('{$_SESSION['id']}',
            '{$_GET['tiket']}',
            '$namaPesan',
            '$nikPesan',
            '$jumlahPenumpang',
            UUID(),
            now(),
            'aktif');";
    
    if (empty($jumlahPenumpang) === false){
        if($result = $mysqli->query($sql)){
            echo "<script>
                    alert('Tiket Berhasil Dipeasn');
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
            $("#nav-placeholder").load("nav.html");
        });
        </script>
        <!--end of Navigation bar-->

        <h2>Pesan Tiket</h2>
        <!-- ini rencananya jadi daftar tiket -->
        <?php
        if(isset($_GET['tiket'])){
            // echo $_GET['tiket'];
            // echo "AAAAAAAAAAAAAAA";
            $pesanID = $_GET['tiket'];
        } else{
            header("location: search.php");
        }
        //get info tiket
        $sql = "SELECT id_tiket, nama_kereta, jenis_kereta, berangkat_lokasi, berangkat_waktu, tiba_lokasi, tiba_waktu, harga
                FROM tb_tiket
                WHERE $pesanID = id_tiket";
        
        if($result = $mysqli->query($sql)){
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<div class='daftarPesanan'>";
                echo "<div class='block1'>";
                echo "<div class='keretaPesanan'>" . $row["nama_kereta"] . "</div>";
                echo "<div class='jenisKereta'>" . $row["jenis_kereta"] . "</div>";
                echo "</div>";
                echo "<div class='block2'>";
                echo "<div class='jadwalPesanan'>" . $row["berangkat_lokasi"] . " >>> " . $row["tiba_lokasi"]."</div>";
                echo "<div class='waktuPesanan'>" . $row["berangkat_waktu"] . " >>> " . $row["tiba_waktu"] . "</div>";
                echo "</div>";
                echo "<div class='block3'>";
                echo "<div class='hargaPesanan'>" . "Rp " . $row["harga"] . "</div>";
                echo "</div>";
                echo "</div>"; 
              }
            } else {
              echo "<div class='noresult'>" . "Tidak Ada Hasil." . "</div>";
            }
        } else{
            echo $mysqli->error;
        }
      ?>
        <form id="pesanTiketForm" action="" method="post">
        <div class="formPesanTiket">
            <!-- <label for="username">username</label> -->
            <input name="namaPesan" class = "namaPesan" type="text" placeholder="Nama Lengkap" pattern="[a-zA-Z]*" required/>
            <!-- <span class="invalid-feedback"><?php echo $namaPesan_err; ?></span> -->
            <input name="nikPesan" class = "nikPesan" type="text" placeholder="NIK" pattern="[0-9]*" required/>
            <!-- <span class="invalid-feedback"><?php echo $nikPesan_err; ?></span> -->
        </div>
        <div class="formPesanTiket">
            <input name="jumlahPenumpang" id="jumlahPenumpang" type="number" min="0" placeholder="Jumlah Penumpang" required/>
            <!-- <span class="invalid-feedback"><?php echo $jumlahPenumpang_err; ?></span> -->
        </div>
        <div class="buttonPesanTiket">
            <button type="submit" value="Login">Pesan Tiket</button>
        </div>
        </form>
    </body>

</html>
