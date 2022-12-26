<?php
session_start();
$username = $password = "";
// Include config file
require_once "config.php";
$search=(isset($_POST['search'])) ? htmlentities($_POST['search']) : '';
// Check if user is admin
if($_SESSION["role"] != "admin"){
  header("location: home.php");
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

        <h2>(ADMIN) Konfirmasi Bayar Tiket</h2>
        <form action="" method="post" class="searchTiket">
            <input type="text" name="search" class="formInput"placeholder="Kode Pesan" value="<?php echo $search?>">
            <input type="submit" value="Cari" id="formButton">
        </form>
        <?php
         if(isset($_POST["search"])){
           $search = $_POST["search"];
         };
        // <?php
          $sql = "SELECT * FROM pesanan_all WHERE 
          status_data='aktif'
          AND '$search' IN (kode_pesan)
          ORDER BY id_pesan DESC
          ";
          if($result = $mysqli->query($sql)){
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  // change row berangkat_waktu and tiba_waktu to date format
                  $row["berangkat_waktu"] = date("d M Y H:i", strtotime($row["berangkat_waktu"]));
                  $row["tiba_waktu"] = date("d M Y H:i", strtotime($row["tiba_waktu"]));
                  // change row harga to currency format
                  $totalHarga = $row["harga"] * $row["jumlah_penumpang"];
                  $totalHarga = number_format($totalHarga, 0, ',', '.');
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
                  echo "<div class='hargaPesanan'>" . "Rp " . $totalHarga . "</div>";
                  if ($row['status_bayar'] == "Sudah Bayar") {
                    echo "<form class='buttonPesananBelum'>
                    <a href='belumBayar.php?pesan=$row[id_pesan]' id='idButtonPesanan' value='Pesan Sekarang'>Tandai Belum Bayar</a>
                    </form>";
                  } else {
                    echo "<form class='buttonPesananSudah'>
                    <a href='sudahBayar.php?pesan=$row[id_pesan]' id='idButtonPesanan' value='Pesan Sekarang'>Tandai Sudah Bayar</a>
                    </form>";
                  }
                  // echo "<form class='buttonPesananSudah'>
                  // <a href='sudahBayar.php?tiket=$row[id_tiket]' id='idButtonPesanan' value='Pesan Sekarang'>Tandai Sudah Bayar</a>
                  // </form>";
                  echo "</div>";
                  
                  echo "<div class='block4'>";
                  // echo "<div class='biodataPesanan'>" . $row["nama_pesan"] . ", " . $row["nik_pesan"] . ", " . $row["duduk_pesan"] . ", " . "Kode Pesanan: " . $row["kode_pesan"] . "</div>";
                  echo "<div class='biodataPesanan'>" . $row["nama_pesan"] . " (" . $row["nik_pesan"] . ") | " . $row["jenis_kereta"] . " - " . $row["gerbong_pesan"] . " ; " . $row["duduk_pesan"] . " | Kode Pesan: " . $row["kode_pesan"] . "</div>";
                  echo "</div>";
                  // status bayar color
                  if ($row['status_bayar'] == "Sudah Bayar") {
                    echo "<div class='block5' style='color: #FAE69E;'>";
                    echo $row['status_bayar'];
                    echo "</div>";
                  } else {
                    echo "<div class='block5' style='color: #f66161;'>";
                    echo $row['status_bayar'];
                    echo "</div>";
                  }
                  // echo "<div class='block5'>";
                  // echo $row['status_bayar'];
                  // echo "</div>";
                  echo "</div>";
                }
              } else {
                echo "<div class='noresult'>" . "Tidak Ada Hasil." . "</div>";
              }
            // }
          }
        ?>
    </body>

</html>
