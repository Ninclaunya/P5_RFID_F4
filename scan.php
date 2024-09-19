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
</head>
<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid" style="padding-top: 10%">
        <div id="Cek_Kartu"></div>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>