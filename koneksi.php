<?php
    $konek = mysqli_connect("localhost", "root", "", "presensirfid");

    if(!$konek){
        echo "Connection Failed";
    }
