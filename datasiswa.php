<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Data Siswa</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap');
        html, body{
            background-color: rgba(82, 192, 152, 1);
        }

        h3{
            text-align: center;
            font-style: bold;
            font-size: 250%;
            padding-bottom: 10px;
        }
    
        .tabel-data{
            background-color: rgba(82, 192, 152, 1);
            font-family: "Pixelify Sans", serif;
        }

        .isi-tabel{
            text-shadow: none;
        }

        table {
            border-collapse: collapse; 
            width: 100%;
        }

        th {
            background-color: rgb(249, 228, 39);
            color: black;
        }

        table thead, tbody, th, td{
            border: 3px solid black;
        }

    </style>
</head>
<body>
    <?php include "menu.php"; ?>
    <div class="container-fluid tabel-data">
        <h3>Data Siswa</h3>
        <table class="table table-bordered isi-tabel">
            <thead>
                <tr style="background-color: rgb(249, 228, 39); color: black;">
                    <th style="width: 10px; text-align: center">No.</th>
                    <th style="width: 200px; text-align: center">NIS</th>
                    <th style="width: 200px; text-align: center">No. Kartu</th>
                    <th style="width: 400px; text-align: center">Nama Lengkap</th>
                    <th style="width: 10px; text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "koneksi.php";

                $sql = mysqli_query($konek, "select * from siswa order by Nama_Lengkap asc");
                $no = 0;
                while($data = mysqli_fetch_array($sql))
                {
                    $no++;
            ?>
            <tr style="background-color: rgba(255,255,255,1); color: black;">
                <td> <?php echo $no; ?> </td>
                <td> <?php echo $data['NIS']; ?> </td>
                <td> <?php echo $data['No_Kartu']; ?> </td>
                <td> <?php echo $data['Nama_Lengkap']; ?> </td>
                <td>
                    <a href="edit.php?ID=<?php echo $data['ID']; ?>">Edit</a> | <a href="hapus.php?ID=<?php echo $data['ID']; ?>"> Hapus </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>

        <a href="tambah.php"><button class="btn btn-primary" style="background-color:  rgb(249, 228, 39); color: black;">Tambah Data Siswa</button></a>
    </div>

</body>
</html>
