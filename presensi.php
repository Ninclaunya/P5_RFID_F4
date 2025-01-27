<?php
    include "koneksi.php";
    
    if (isset($_POST['btnExport'])) {
        date_default_timezone_set('Asia/Jakarta');
        $Tanggal = date('Y-m-d');
    
        // Fetch data from your database or other source
        $query = "select b.Nama_Lengkap, a.Tanggal, a.Jam_Masuk, a.Jam_Istirahat, a.Jam_Kembali, a.Jam_Pulang 
                  from rekap a join siswa b 
                  where a.No_Kartu = b.No_Kartu and a.Tanggal='$Tanggal' 
                  order by Nama_Lengkap asc";
        $result = mysqli_query($konek, $query);
    
        // Create an array of arrays to store the data
        $results = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    
        // Generate CSV file
        $filename = 'Presensi_12f4_' . $Tanggal . '.csv';
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=$filename");
        $output = fopen("php://output", "w");
    
        // Write header row
        $header = array("Nama Lengkap", "Tanggal", "Jam Masuk", "Jam Istirahat", "Jam Kembali", "Jam Pulang"); 
        fputcsv($output, $header);
    
        // Write data rows
        foreach ($results as $row) {
            // Format Jam_Masuk, Jam_Istirahat, Jam_Kembali, Jam_Pulang 
            $row['Jam_Masuk'] = date('H:i:s', strtotime($row['Jam_Masuk'])); 
            $row['Jam_Istirahat'] = date('H:i:s', strtotime($row['Jam_Istirahat']));
            $row['Jam_Kembali'] = date('H:i:s', strtotime($row['Jam_Kembali']));
            $row['Jam_Pulang'] = date('H:i:s', strtotime($row['Jam_Pulang']));
    
            fputcsv($output, $row); 
        }
    
        fclose($output); 
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
</head>
<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Rekap Presensi</h3>

        <form method="post" action="">
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

                    $SQL = mysqli_query($konek, "select b.Nama_Lengkap, a.Tanggal, a.Jam_Masuk, a.Jam_Istirahat, a.Jam_Kembali, a.Jam_Pulang from rekap a join siswa b where a.No_Kartu = b.No_Kartu and a.Tanggal='$Tanggal' order by Nama_Lengkap asc");

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
            <button class="btn btn-primary" name="btnExport" id="btnExport" style="background-color: midnightblue; color: white">Export</button>
        </form>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>