<?php
    include "koneksi.php";
    
    $ID = $_GET['ID'];

    $Hapus = mysqli_query($konek, "delete from siswa where ID= '$ID'");

    if($Hapus) {
        echo "
            <script>
                alert('Terhapus');
                location.replace('datasiswa.php');
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Gagal Terhapus');
                location.replace('datasiswa.php');
            </script>
        ";
    }
