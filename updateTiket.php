<?php
session_start();
// Include config file
require_once "config.php";
// Check if user is admin
if($_SESSION["role"] != "admin"){
    header("location: home.php");
}
$namaKereta = $jenisKereta = $berangkatKereta = $berangkatWaktu = $tibaKereta = $tibaWaktu = $hargaKereta = "";
$berangkatWaktuInput = $tibaWaktuInput = "";
$berangkatWaktuUnix = $tibaWaktuUnix = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $namaKereta = $_POST["namaKereta"];
    $jenisKereta = $_POST["jenisKereta"];
    $berangkatKereta = $_POST["berangkatKereta"];
    $tibaKereta = $_POST["tibaKereta"];
    $berangkatWaktuInput = $_POST["berangkatWaktu"];
    $tibaWaktuInput = $_POST["tibaWaktu"];
    $hargaKereta = $_POST["hargaKereta"];
}

//logika jelek untuk mengubah format waktu
//datetime-local jadi timestamp unix
$berangkatWaktuUnix = strtotime($berangkatWaktuInput);
$tibaWaktuUnix = strtotime($tibaWaktuInput);
//timestamp unix jadi readable date
$berangkatWaktu = date("l, d M Y H:i", $berangkatWaktuUnix);
$tibaWaktu = date("l, d M Y H:i", $tibaWaktuUnix);  

$sql = "UPDATE tb_tiket SET 
        nama_kereta = '$namaKereta',
        jenis_kereta = '$jenisKereta',
        berangkat_lokasi = '$berangkatKereta',
        berangkat_waktu = '$berangkatWaktu',
        tiba_lokasi = '$tibaKereta',
        tiba_waktu = '$tibaWaktu',
        harga = '$hargaKereta'
        WHERE id_tiket = '{$_GET['tiket']}'";

if (empty($namaKereta) === false){
    if($result = $mysqli->query($sql)){
        echo "<script>
                alert('Tiket Berhasil Diupdate');
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
         <div id="nav-placeholder">

        </div>

        <script>
        $(function(){
            $("#nav-placeholder").load("navAdmin.html");
        });
        </script>
        <!--end of Navigation bar-->
        <h2>(ADMIN) Edit Tiket</h2>
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
                $nama_kereta = $row["nama_kereta"];
                $jenis_kereta = $row["jenis_kereta"];
                $berangkat_lokasi = $row["berangkat_lokasi"];
                $berangkat_waktu = $row["berangkat_waktu"];
                $tiba_lokasi = $row["tiba_lokasi"];
                $tiba_waktu = $row["tiba_waktu"];
                $harga = $row["harga"];
                // change row berangkat_waktu and tiba_waktu to date format
                $row["berangkat_waktu"] = date("d M Y H:i", strtotime($row["berangkat_waktu"]));
                $row["tiba_waktu"] = date("d M Y H:i", strtotime($row["tiba_waktu"]));
                // change row harga to currency format
                $row["harga"] = number_format($row["harga"], 0, ',', '.');
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
        <form id="tambahTiketForm" action="" method="post">
        <div class="formTambahTiket">
            <!-- <label for="username">username</label> -->
            <input name="namaKereta" class = "namaKereta" type="text" placeholder="Nama Kereta..." value="<?php echo $nama_kereta; ?>" required/>
            <!-- <input name="jenisKereta" class = "namaKereta" type="text" placeholder="Jenis Kereta..." value="<?php echo $jenis_kereta; ?>" required/> -->
            <select name="jenisKereta" id="jenisKereta">
                <option hidden selected value="<?php echo $jenis_kereta; ?>"><?php echo $jenis_kereta; ?></option>
                <option value="Ekonomi">Ekonomi</option>
                <option value="Bisnis">Bisnis</option>
                <option value="Eksekutif">Eksekutif</option>
            </select>
        </div>
        <div class="formTambahTiket">
            <!-- <label for="password" id="passLabel">password</label> -->
            <input name="berangkatKereta" id = "berangkatKereta" type="text" placeholder="Stasiun Berangkat..." value="<?php echo $berangkat_lokasi; ?>" required/>
            <a>>>></a>
            <input name="tibaKereta" id = "tibaKereta" type="text" placeholder="Stasiun Tiba..." value="<?php echo $tiba_lokasi; ?>" required/>
        </div>
        <div class="formTambahTiket">
            <input name="berangkatWaktu" id = "berangkatWaktu" type="datetime-local" placeholder="Waktu Berangkat" value="<?php echo $berangkat_waktu; ?>" required/>
            <a>>>></a>
            <input name="tibaWaktu" id = "tibakatWaktu" type="datetime-local" placeholder="Waktu Tiba" value="<?php echo $tiba_waktu; ?>" required/>
        </div>
        <div class="formTambahTiket">
            <input name="hargaKereta" id="hargaKereta" type="text" placeholder="Harga Tiket" pattern="[0-9]*" value="<?php echo $harga; ?>" required/>
        </div>
        <div class="buttonTambahTiket">
            <button type="submit">Edit Tiket</button>
        </div>
        </form>
    </body>
</html>
