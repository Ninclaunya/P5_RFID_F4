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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = isset($_POST['uname']) ? trim($_POST['uname']) : '';
    $pass = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($uname) || empty($pass)) {
        header("Location: masuk.php?error=Please fill in all required fields.");
        exit();
    }
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