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
                    <form action="reg.php" method="post">
                    <div class='welcome'>
                        Регистрация
                    </div>
                    
                    <div class='input-fields'>
                        <input type='text' placeholder='Username' name="username" class='input-line full-width'> </input>
                        <input type='email' placeholder='Email'  name="email"  class='input-line full-width'> </input>
                        <input type='password' placeholder='Password' name="password" class='input-line full-width'> </input>
                    </div>
                    <div class='spacing'>
                        вернуться на 
                        <a class='highlight' href="index.php">
                            Главную
                        </a>
                    </div>
                    <div>
                        <button name="registration" class='ghost-round full-width'>
                            Войти
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
