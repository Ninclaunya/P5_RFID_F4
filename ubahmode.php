<?php
    include "koneksi.php";

    $mode = mysqli_query($konek, "select * from status");
    $data_mode = mysqli_fetch_array($mode);
    $Mode_Presensi = $data_mode['mode'];

    $Mode_Presensi = $Mode_Presensi+1;
    if($Mode_Presensi>4)
        $Mode_Presensi = 1;

    $Simpan = mysqli_query($konek, "update status set mode='$Mode_Presensi'");

    if($Simpan)
        echo"Berhasil";
    else
        echo "Gagal";
