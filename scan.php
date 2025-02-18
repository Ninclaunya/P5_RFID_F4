<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Scan Kartu</title>
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function(){
                $("#Cek_Kartu").load('bacakartu.php')}, 1000);
        });
    </script>
    <style>
        html, body{
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: rgba(82, 192, 152, 1);
        }
        .scan{
            background-color: rgba(82, 192, 152, 1);
        }
    </style>
</head>
<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid scan">
        <div id="Cek_Kartu"></div>
    </div>

</body>
</html>