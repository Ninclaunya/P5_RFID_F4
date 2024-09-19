<?php
    include "koneksi.php";

    $No_Kartu = $_GET['nokartu'];

    mysqli_query($konek, "delete from testrfid");

    $Simpan = mysqli_query($konek, "insert into testrfid(No_Kartu)values('$No_Kartu')");

    if ($Simpan)
        echo "Berhasil";
    else
        echo "Gagal";

