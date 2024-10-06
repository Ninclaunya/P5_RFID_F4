<?php
    include "koneksi.php";

    $ID = $_GET['ID'];

    $Cari = mysqli_query($konek, "select * from siswa where ID='$ID'");
    $Hasil = mysqli_fetch_array($Cari);

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
    }
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title> Edit Data Siswa</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <div class="container-fluid">
        <h3> Edit Data Siswa </h3>

        <form method="POST">
            <div>
            <class="form-group">
                <label>No. Kartu</label>
                <input type="text" name="No_Kartu" id="No. Kartu" placeholder="No. Kartu Siswa" class="form-control" style="width: 200px" value="<?php echo $Hasil['No_Kartu'];?>">
            </div>
        
            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="NIS" id="NIS" placeholder="NIS Siswa" class="form-control" style="width: 200px" value="<?php echo $Hasil['NIS'];?>">
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="Nama_Lengkap" id="Nama Lengkap" placeholder="Nama Lengkap Siswa" class="form-control" style="width: 200px" value="<?php echo $Hasil['Nama_Lengkap'];?>">
            </div>
            
            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan" style="background-color: midnightblue; color: white">Simpan</button>
        </form>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>