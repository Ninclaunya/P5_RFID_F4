<?php
    include "koneksi.php";

    $SQL = mysqli_query($konek, "select * from testrfid");
    $data = mysqli_fetch_array($SQL);
    $No_Kartu = $data['No_Kartu'];
?>

<div class="form-group">
    <label>No. Kartu</label>
    <input type="text" name="No_Kartu" id="No_Kartu" placeholder="Tempelkan kartu RFID Anda" class="form-control" style="width: 200px" 
        value="<?php echo $No_Kartu; ?>">
</div>