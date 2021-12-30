<?php
session_start();
// Include config file
require_once "config.php";
$search=(isset($_POST['search'])) ? htmlentities($_POST['search']) : '';
// Check if user isn't logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
  header("location: login.php");
  exit;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
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

        <h2>Cari Tiket</h2>
        <!-- ini rencananya mau di isi sama pencarian tiket yang ada -->
        <!-- cari berdasarkan jadwal hari sama rute. abis itu diarahin ke pesan.php ato gimana lah yang penting dapet -->
        <form action="" method="post" class="searchTiket">
            <input type="text" name="search" class="formInput"placeholder="Gambir, Tangerang, Serpong" value="<?php echo $search?>">
            <input type="submit" value="Cari" id="formButton">
        </form>
        <?php
         if(isset($_POST["search"])){
           $search = $_POST["search"];
         };

        //   $sql = "SELECT * 
        //             FROM tb_tiket 
        //                 WHERE '$search' IN (nama_kereta, jenis_kereta, berangkat_lokasi, tiba_lokasi)";

        //   $sql = "SELECT *
        //             FROM tb_tiket
        //                 WHERE nama_kereta LIKE '%$search%'
        //                 OR jenis_kereta LIKE '%$search%'
        //                 OR berangkat_lokasi LIKE '%$search%'
        //                 OR tiba_lokasi LIKE '%$search%'";
        
        $sql = "SELECT *
        FROM tb_tiket
            WHERE (berangkat_lokasi LIKE '%$search%' AND status_data = 'aktif') 
            OR (tiba_lokasi LIKE '%$search%' AND status_data = 'aktif')";
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
                      <a href='pesan.php?tiket=$row[id_tiket]' id='idButtonPesanan' value='Pesan Sekarang'>Pesan Sekarang</a>
                    </form>";
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
    </body>

</html>
