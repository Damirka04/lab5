<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>ITPRO</title>
</head>
<body>
        <div class='container'>
            <div class='window'>
                <div class='overlay'>
                </div>
                <div class='content'>
                    <form action="login.php" method="post">
                    <div class='welcome'>
                        Авторизация
                    </div>
                    
                    <div class='input-fields'>
                        <input type='email' placeholder='Email' name="email" class='input-line full-width'> </input>
                        <input type='password' placeholder='Password' name="password" class='input-line full-width'> </input>
                    </div>
                    <div class='spacing'>
                        вернуться на 
                        <a class='highlight' href="index.php">
                            Главную
                        </a>
                    </div>
                    <div>
                        <button name="login" class='ghost-round full-width'>
                            Войти
                        </button>
                    </div>
                    </form>
                    <div class='spacing'>
                        <a class='highlight' href="register.php">
                            Зарегистрироваться
                        </a>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
