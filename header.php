<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    <title>ITPRO</title>
</head>
<body>
    <div class="tpbg">
        <header>
            <nav class="navbar-blog">
                <a href="index.php" class="logo"><img src="img/logo.png" alt=""></a>
                <div class="menu">
                    <ul class="list">
                        <li><a href="blog.php">БЛОГ</a></li>
                        <li><a href="katalog.php">КАТАЛОГ</a></li>
                        <?php 
                        session_start();
                        require_once('bd.php');
                        if (isset($_SESSION['login_user'] )) {
                            $admin = '<li class ="vhod"><a href="account.php">Аккаунт</a></li>';
                        }else{
                            $admin = '<li class ="vhod"><a href="vhod.php">ВОЙТИ</a></li>';
                        }
                        
                        echo  $admin;

                
                   ?>
                      
                    </ul>
                </div>
            </nav>
        </header>