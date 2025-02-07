<?php
include "koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $NIS = $_POST['NIS'];
    $No_Kartu = $_POST['No_Kartu'];
    $Nama_Lengkap = $_POST['Nama_Lengkap'];

    if (empty($NIS) || empty($No_Kartu) || empty($Nama_Lengkap)) {
        echo "<script>
            alert('Please fill in all required fields.');
            location.replace('datasiswa.php');
        </script>";
    } else {
        $Simpan = mysqli_query($konek, "INSERT INTO siswa(NIS, No_Kartu, Nama_Lengkap) VALUES('$NIS', '$No_Kartu', '$Nama_Lengkap')");

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
            
        }
        .tambah {
            font-family: "Pixelify Sans", serif;
            height: 600px;
            padding-top: 60px;
            background-color: rgba(82, 192, 152, 1);
            background-image: url(design/laptop_putih.png);
            background-size: 900px;
            background-repeat: no-repeat;
            background-position: center;
            
        }

        .isi{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 500px;
            text-align: center;
            padding: 20px;
        }

        .isi form{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 500px;
            text-align: center;
            border-radius: 20px;
        }
        
        .isi h3{
            font-style: bold;
            font-size: 200%;
            margin-bottom: 20px;
        }

        .isi input{
            display: block;
            text-align: center;
            font-size: 100%;
            width: 80%;
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

        .isi button:hover {
            background-color:rgb(249, 238, 39)9; 
        }

        .isi button:active {
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3); 
            transform: translateY(1px); 
        }

    </style>

</head>
<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid tambah">
        <div class="container-fluid isi">
            <form method="POST">
                <h3> Tambah Data Siswa </h3>
                <label>Nama Lengkap</label>
                <input type="text" name="Nama_Lengkap" id="Nama Lengkap" placeholder="Nama Lengkap Siswa" class="form-control" required style="width: 500px">
                <label>NIS</label>
                <input type="text" name="NIS" id="NIS" placeholder="NIS Siswa" class="form-control" required style="width: 500px">
                <div id="No_Kartu"></div>
                <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
            </form>
        </div>
        
    </div>
</body>
</html>