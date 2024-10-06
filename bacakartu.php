<?php
    include "koneksi.php";

    $SQL = mysqli_query($konek, "select * from status");
    $data = mysqli_fetch_array($SQL);
    $Mode_Presensi = $data['mode'];
    
    $Waktu_Masuk = strtotime('05:00:00');
    $Waktu_Istirahat = strtotime('09:30:00');
    $Waktu_Kembali = strtotime('10:10:00');
    $Waktu_Pulang = strtotime('12:00:00');
    $Waktu_Sekarang = time();
    
    $mode ="";

    if ($Waktu_Sekarang >= $Waktu_Masuk && $Mode_Presensi = 4){
        $update_sql = "update status set mode=1";
        mysqli_query($konek, $update_sql);
    }
    else if ($Waktu_Sekarang  >= $Waktu_Istirahat && $Mode_Presensi = 1){
        $update_sql = "update status set mode=2";
        mysqli_query($konek, $update_sql);
    }
    else if ($Waktu_Sekarang  >= $Waktu_Kembali && $Mode_Presensi = 2){
        $update_sql = "update status set mode=3";
        mysqli_query($konek, $update_sql);
    }
    else if ($Waktu_Sekarang  >= $Waktu_Pulang && $Mode_Presensi = 3){
        $update_sql = "update status set mode=4";
        mysqli_query($konek, $update_sql);
    }

    if($Mode_Presensi==1)
        $mode ="Masuk";
    else if($Mode_Presensi==2)
        $mode ="Istirahat";
    else if($Mode_Presensi==3)
        $mode ="Kembali";
    else if($Mode_Presensi==4)
        $mode ="Pulang";

    $Baca_Kartu = mysqli_query($konek, "select * from testrfid");
    $Data_Kartu = mysqli_fetch_array($Baca_Kartu);
    $No_Kartu = $Data_Kartu['No_Kartu'];

?>

<div class="container-fluid" style="text-align: center;">
    <?php if($No_Kartu=="") { ?>    

    <h3>Absen : <?php echo $mode; ?></h3>
    <h3>Silahkan Tempel Kartu RFID Anda</h3>
    <img src="images/rfid.png" style="width: 200px"> <br>
    <img src="images/animasi2.gif">

    <?php } 
    else {
        $Cari_Siswa = mysqli_query($konek, "select * from siswa where No_Kartu='$No_Kartu'");
        $Jumlah_Data = mysqli_num_rows($Cari_Siswa);
       
        if($Jumlah_Data==0)
            echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
        else{
            $Data_Siswa = mysqli_fetch_array($Cari_Siswa);
            $Nama_Lengkap = $Data_Siswa['Nama_Lengkap'];

            date_default_timezone_set('Asia/Jakarta');
            $Tanggal = date('Y-m-d');
            $Jam = date('H:i:s');

            $Cari_Presensi = mysqli_query($konek, "select * from rekap where No_Kartu='$No_Kartu' and Tanggal='$Tanggal'");

            $Jumlah_Presensi = mysqli_num_rows($Cari_Presensi);
            if ($Jumlah_Presensi == 0){
                echo "<h1>Selamat Datang <br> $Nama_Lengkap</h1>";
                mysqli_query($konek, "insert into rekap(No_Kartu, Tanggal, Jam_Masuk) values('$No_Kartu','$Tanggal','$Jam') on duplicate key update Jam_Masuk='$Jam'");
            }
            else {
                if ($Mode_Presensi == 2){
                    echo "<h1>Selamat Istirahat <br> $Nama_Lengkap</h1>";
                    mysqli_query($konek, "update rekap set Jam_Istirahat='$Jam' where No_Kartu='$No_Kartu' and Tanggal='$Tanggal'");
                }
                else if ($Mode_Presensi == 3){
                    echo "<h1>Selamat Datang Kembal <br> $Nama_Lengkap</h1>";
                    mysqli_query($konek, "update rekap set Jam_Kembali='$Jam' where No_Kartu='$No_Kartu' and Tanggal='$Tanggal'");
                }
                else if ($Mode_Presensi == 4){
                    echo "<h1>Selamat Jalan <br> $Nama_Lengkap</h1>";
                    mysqli_query($konek, "update rekap set Jam_Pulang='$Jam' where No_Kartu='$No_Kartu' and Tanggal='$Tanggal'");
                }
            }
        }
        
        mysqli_query($konek, "delete from testrfid");
    } ?>
</div>