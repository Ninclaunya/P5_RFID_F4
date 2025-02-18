<?php
include "koneksi.php";

if(isset($_POST['upload'])) {
    $filename = $_FILES['csvFile']['tmp_name'];
    $ext = pathinfo($_FILES['csvFile']['name'], PATHINFO_EXTENSION);

    if($ext == 'csv'){
        $handle = fopen($filename, 'r');
        $header = fgetcsv($handle); 

        while (($data = fgetcsv($handle)) !== FALSE) {
            $row_data = array_combine($header, $data); 

            $kelas = isset($row_data['Kelas']) ? $row_data['Kelas'] : null;
            $nama_lengkap = isset($row_data['Nama_Lengkap']) ? $row_data['Nama_Lengkap'] : null;
            $nis = isset($row_data['NIS']) ? $row_data['NIS'] : null;
            $no_kartu = isset($row_data['No_Kartu']) ? $row_data['No_Kartu'] : null;


            // Cek ada minimal 1 lah data pentingnya
            if ($nis !== null) {  
                // Cek klo udh ada datanya
                $check_query = "SELECT * FROM siswa WHERE NIS = '$nis'";
                $check_result = mysqli_query($konek, $check_query);

                if(mysqli_num_rows($check_result) > 0){
                    // Perbaruin yg ada di file
                    $update_query = "UPDATE siswa SET ";
                    $updates = array();
                    if ($kelas !== null) { $updates[] = "Kelas = '$kelas'"; }
                    if ($nama_lengkap !== null) { $updates[] = "Nama_Lengkap = '$nama_lengkap'"; }
                    if ($no_kartu !== null) { $updates[] = "No_Kartu = '$no_kartu'"; }
                    $update_query .= implode(", ", $updates); 
                    $update_query .= " WHERE NIS = '$nis'";
                    mysqli_query($konek, $update_query);

                } else {
                    // Masukin yg ada di file
                    $insert_query = "INSERT INTO siswa (";
                    $values_query = "VALUES (";
                    $fields = array();
                    $values = array();

                    if ($kelas !== null) { $fields[] = "Kelas"; $values[] = "'$kelas'"; }
                    if ($nama_lengkap !== null) { $fields[] = "Nama_Lengkap"; $values[] = "'$nama_lengkap'"; }
                    if ($nis !== null) { $fields[] = "NIS"; $values[] = "'$nis'"; }
                    if ($no_kartu !== null) { $fields[] = "No_Kartu"; $values[] = "'$no_kartu'"; }

                    $insert_query .= implode(", ", $fields) . ") ";
                    $values_query .= implode(", ", $values) . ")";
                    $insert_query .= $values_query;

                    mysqli_query($konek, $insert_query);
                }
            }
        }
        fclose($handle);
        echo "<script>alert('Data berhasil diupload dan diimpor!'); window.location='datasiswa.php';</script>"; 
    } else {
        echo "<script>alert('Tipe file tidak sesuai. Silahkan upload file CSV.'); window.location='upbanyak.php';</script>";
    }
}
?>