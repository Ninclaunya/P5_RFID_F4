<?php
session_start();
include "koneksi.php";

if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
} 

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if(empty($uname)){
    header("Location: masuk.php?error=Username is required");
    exit();
}
if(empty($pass)){
    header("Location: masuk.php?error=Password is required");
    exit();
}

$SQL = "select * from users where username='$uname' and password='$pass'";

$result = mysqli_query($konek,$SQL);

if(mysqli_num_rows($result)=== 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['username'] === $uname && $row['password'] === $pass){ 
        echo "Logged In!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: index.php");
        exit();
    }
    else{
        header("Location: masuk.php?error=Incorrect Username or Password");
        exit();
    }
}
else{
    header("Location: masuk.php");
    exit();
}