<?php
include "koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $NIS = $_POST['NIS'];
    $No_Kartu = $_POST['No_Kartu'];
    $Nama_Lengkap = $_POST['Nama_Lengkap'];
    $Kelas = $_POST['Kelas'];

    if (empty($NIS) || empty($No_Kartu) || empty($Nama_Lengkap)) {
        echo "<script>
            alert('Please fill in all required fields.');
            location.replace('datasiswa.php');
        </script>";
    } else {
        $Simpan = mysqli_query($konek, "INSERT INTO siswa(NIS, No_Kartu, Nama_Lengkap, Kelas) VALUES('$NIS', '$No_Kartu', '$Nama_Lengkap','$Kelas')");

        if ($Simpan) {
            echo "<script>
                alert('Tersimpan');
                location.replace('datasiswa.php');
            </script>";
        } else {
            echo "<script>
                alert('Gagal Tersimpan');
                location.replace('datasiswa.php');
            </script>";
        }
    }

    mysqli_query($konek, "DELETE FROM testrfid");
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Siswa</title>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#No_Kartu").load("nokartu.php");
        }, 0);
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap');
        html, body {
            margin: 0;
            padding: 0;
            background-color: rgba(82, 192, 152, 1);
            min-height: 100vh; /* Ensure body is full viewport height */
            display: flex;
            flex-direction: column;
        }

        .upbanyak {
            font-family: "Pixelify Sans", serif;
            flex-grow: 1; /* Allow upbanyak to expand to fill available space */
            width: 100%;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            background-color: rgba(82, 192, 152, 1);
            background-image: url(design/laptop_putih.png);
            background-size: 950px;
            background-repeat: no-repeat;
            background-position: center;
        }

        .isi {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 500px; /* Or a percentage for responsiveness */
            text-align: center;
            padding: 20px;
        }

        .isi h3{
            font-style: bold;
            font-size: 200%;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .isi input{
            display: block;
            text-align: center;
            align-content: center;
            font-size: 100%;
            width: 100%;
            height: 40px;
            border: 2px solid rgb(209, 211, 212);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: rgb(209, 211, 212);
        }

        .isi label{
            padding-top: 10px;
            font-size: 125%;
        }

        .isi button {
            background-color: rgb(249, 228, 39);
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0; 
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease; 
            font-weight: bold;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

    </style>

</head>
<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid upbanyak">
        <div class="csv-upload isi">
            <h3>Tambah Data Massal</h3>
            <form action="upload_csv.php" method="post" enctype="multipart/form-data">
                <label for="csvFile">Pilih File CSV:</label>
                <input type="file" id="csvFile" name="csvFile" accept=".csv">
                <button type="submit" name="upload">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>