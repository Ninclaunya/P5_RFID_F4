<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Data Siswa</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <div class="container-fluid">
        <h3>Data Siswa</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: midnightblue; color: white;">
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
            <tr>
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

        <a href="tambah.php"><button class="btn btn-primaru" style="background-color: midnightblue; color: white">Tambah Data Siswa</button></a>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>
