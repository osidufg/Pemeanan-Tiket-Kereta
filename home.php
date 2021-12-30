<?php
session_start();
$username = $password = "";
// Include config file
require_once "config.php";
// Check if user isn't logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
  header("location: login.php");
  exit;
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

        <h2>Daftar Pesanan</h2>
        <?php
          $sql = "SELECT * FROM pesanan_all WHERE id_user = '{$_SESSION['id']}' AND status_data='aktif'";
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
                  echo "<form action='pesan.php' class='buttonPesanan'>
                          <a href='deletePesan.php?pesan=$row[id_pesan]' id='idButtonPesanan' value='Pesan Sekarang'>Hapus Pesanan</a>
                        </form>";
                  echo "</div>";
                  echo "<div class='block4'>";
                  echo "<div class='biodataPesanan'>" . $row["nama_pesan"] . ", " . $row["nik_pesan"] . ", " . $row["jumlah_penumpang"] . " Penumpang, " . "Kode Pesanan: " . $row["kode_pesan"] . "</div>";
                  echo "</div>";

                  echo "</div>";
                }
              } else {
                echo "<div class='noresult'>" . "Tidak Ada Hasil." . "</div>";
              }
          }
        ?>
    </body>

</html>
