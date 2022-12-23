<?php
session_start();
// Include config file
require_once "config.php";
// Check if user is admin
if($_SESSION["role"] != "admin"){
    header("location: home.php");
}
$pesanID = $confirm = "";  
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $confirm = $_POST["confirmDeleteYes"];
}


$sql = "UPDATE tb_tiket SET status_data = 'mati' WHERE id_tiket = '{$_GET['tiket']}'";  
if (empty($confirm) === false){
    if($result = $mysqli->query($sql)){
        echo "<script>
                alert('Tiket Berhasil Dihapus');
                window.location.href='editTiket.php';
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
         <div id="nav-placeholder">

        </div>

        <script>
        $(function(){
            $("#nav-placeholder").load("navAdmin.html");
        });
        </script>
        <!--end of Navigation bar-->
        <?php
        if(isset($_GET['tiket'])){
            // echo $_GET['tiket'];
            // echo "AAAAAAAA BISA SL;FJKSL;ADKFJASL;KJ AAAAAAA";
            $pesanID = $_GET['tiket'];
        } else{
            header("location: editTiket.php");
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
        <form id="confirmDelete" action="" method="post">
            <label>Yakin Ingin Hapus Tiket Ini?</label>
        <div class="confirmYes">
            <input name="confirmDeleteYes" type="hidden" value="gg gaming"/>
            <button type="submit" value="Login">Hapus Tiket Ini</button>
        </div>
        <div class="confirmNo">
            <a href='editTiket.php'>Batalkan</button>
        </div>
        </form>

    </body>

</html>
