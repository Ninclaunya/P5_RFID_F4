<!DOCTYPE html>
<html>
<head>
    <?php include "koneksi.php"; ?>
    <title>LOGIN</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap');
        body {
            background: rgba(82, 192, 152, 1);
            background-image: url(design/left_yellow.gif), url(design/right_yellow.gif);
            background-size: contain;
            background-position: left, right;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        *{
            font-family: "Pixelify Sans", serif;
            box-sizing: padding-box;
        }

        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 500px;
            text-align: center;
            border: 3px solid black;
            padding: 20px;
            background-color: white;
            border-radius: 20px;
            background-image: url(design/frog.gif);
            background-repeat: no-repeat;
            background-position: left bottom;
            background-size: 80px;
        }
        
        h2{
            font-size: 200%;
            margin-top: 0;
            margin-bottom: 20px;
        }

        input{
            display: block;
            text-align: center;
            font-size: 100%;
            width: 80%;
            height: 40px;
            border: 2px solid rgb(209, 211, 212);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: rgb(209, 211, 212);
        }

        label{
            font-size: 125%;
        }

        button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0; 
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease; 
            font-weight: bold;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        button:hover {
            background-color: #45a049; 
        }

        button:active {
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3); 
            transform: translateY(1px); 
        }

        .error{
            padding-bottom: 5px;
        }

    </style>
</head>
<body>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="uname"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <button type="submit">Login</button>
    </form>

</body>
</html>