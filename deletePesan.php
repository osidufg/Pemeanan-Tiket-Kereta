<?php
session_start();
// Include config file
require_once "config.php";
// Check if user isn't logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: login.php");
    exit;
}
$pesanID = $confirm = "";  
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $confirm = $_POST["confirmDeleteYes"];
}


$sql = "UPDATE tb_pesan SET status_data = 'mati' WHERE id_pesan = '{$_GET['pesan']}'";  
if (empty($confirm) === false){
    if($result = $mysqli->query($sql)){
        echo "<script>
                alert('Pesanan Berhasil Dihapus');
                window.location.href='home.php';
                </script>";
    } else {
        echo "<script>
                alert('eror ges');
            </script>";
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
        <?php
        if(isset($_GET['pesan'])){
            // echo $_GET['tiket'];
            // echo "AAAAAAAA BISA SL;FJKSL;ADKFJASL;KJ AAAAAAA";
            $pesanID = $_GET['pesan'];
        } else{
            header("location: home.php");
        }
        //get info tiket
        $sql = "SELECT * FROM pesanan_all WHERE $pesanID = id_pesan";
        
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
                  echo "<div class='block4'>";
                  echo "<div class='biodataPesanan'>" . $row["nama_pesan"] . ", " . $row["nik_pesan"] . ", " . $row["jumlah_penumpang"] . " Penumpang, " . "Kode Pesanan: " . $row["kode_pesan"] . "</div>";
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
        <form id="confirmDelete" action="" method="post">
            <label>Yakin Ingin Hapus Pesanan Ini?</label>
        <div class="confirmYes">
            <input name="confirmDeleteYes" type="hidden" value="gg gaming"/>
            <button type="submit" value="Login">Iya. Hapus Pesanan Ini</button>
        </div>
        <div class="confirmNo">
            <a href='home.php'>Tidak. Batalkan</button>
        </div>
        </form>
    </body>

</html>
