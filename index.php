<?php
session_start();


if(isset($_SESSION['status']) && $_SESSION['status']=="login"){
    header("location:dashboard/index.php?message=selamat datang");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
</head>
<body>
    
        <div>
            <div>
                <form action="login.php" method="POST">
                    <?php
                    
                    if(isset($_GET['message'])){
                        echo $_GET['message'];
                    }
                    
                    ?>
                    <input name="user_id" type="text">
                    <input name="password" type="password">
                    <button type="submit" name="login">MASUK</button>
                </form>
            </div>
        </div>

</body>
</html>