<?php
include "koneksi.php";

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username']; 
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "header.php"; ?>
        <title>Menu Utama</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap');
            html, body {
                margin: 0;
                padding: 0;
                background-color: rgba(82, 192, 152, 1);
            }

            .main-content {
                padding-top: 10%;
                text-align: center;
                padding-bottom: 10%;
                background-color: rgba(82, 192, 152, 1);
                font-family: "Pixelify Sans", serif;
                text-shadow: 
                    -2px -2px 0 #000,
                    2px -2px 0 #000,
                    -2px 2px 0 #000,
                    2px 2px 0 #000;
                color:white; 
                background-image: url(design/sman33.png);
                background-position: center;
                background-size: cover;
                height: 900px;
                background-repeat: no-repeat;
            }

            .main-content h1{
                font-size: 500%;
            }
            
            .main-content h3{
                padding-top: 30px;
                font-size: 300%;
            }
        </style>
    </head>
    <body>
        <?php include "menu.php"; ?>
        <div class="container-fluid main-content">
            <h1>
                Selamat Datang <?php echo $username; ?>! <br>  
                4ATTENDX <br>
            </h1>
            <h3>
                Version : 1.0.0
            </h3>
        </div>
    </body>
    </html>
    <?php
} else {
    header("Location: masuk.php");
    exit();
}
?>