<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
</head>
<tbody>
    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Rekap Presensi</h3>

        <table class="table table-bordered">
            <thead>
                <tr style="background-color: midnightblue; color: white;"> 
                    <th style="width: 10px; text-align: center">No.</th>
                    <th style="text-align: center">Nama</th>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">Jam Masuk</th>
                    <th style="text-align: center">Jam Istirahat</th>
                    <th style="text-align: center">Jam Kembali</th>
                    <th style="text-align: center">Jam Pulang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";

                    date_default_timezone_set('Asia/Jakarta');
                    $Tanggal = date('Y-m-d');

                    $SQL = mysqli_query($konek, "select b.Nama_Lengkap, a.Tanggal, a.Jam_Masuk, a.Jam_Istirahat, a.Jam_Kembali, a.Jam_Pulang from rekap a inner join siswa b where a.No_Kartu = b.No_Kartu and a.Tanggal='$Tanggal'");

                    $no = 0;
                    while($data = mysqli_fetch_array($SQL))
                    {
                        $no ++;
                ?>
                <tr>
                    <td> <?php echo $no;?> </td>
                    <td> <?php echo $data['Nama_Lengkap']; ?> </td>
                    <td> <?php echo $data['Tanggal']; ?> </td>
                    <td> <?php echo $data['Jam_Masuk']; ?> </td>
                    <td> <?php echo $data['Jam_Istirahat']; ?> </td>
                    <td> <?php echo $data['Jam_Kembali']; ?> </td>
                    <td> <?php echo $data['Jam_Pulang']; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>