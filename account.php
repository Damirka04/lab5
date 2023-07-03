<?php
 session_start();
 require_once('bd.php');
 if (isset($_SESSION['login_user'] )) {

    $user_session = $_SESSION['login_user'];
    $querys = "SELECT * FROM user WHERE email = '$user_session'";
    $resultss = mysqli_query($conn, $querys);
    $rowss = mysqli_fetch_array($resultss);
    $name = $rowss['username'];
    $email = $rowss['email'];

    

    echo 'Добро пожаловать: '.$name. ' - <a href="exit.php">выйти</a>';
require_once "bd.php";
$department = 'Отдел Разработки';
$query = "SELECT * FROM employees WHERE department = '$department';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
echo " <h2>1. Получить список всех сотрудников определенного отдела.</h2>";
echo $row['employee_name']." ". $row['position']." ". $row['department']." ". $row['hire_date']." ". $row['salary']; 

$project_id = '2';
$query2 = "SELECT employees.* FROM employees
JOIN orders ON employees.employee_id = orders.employee_id
WHERE orders.project_id = '$project_id';";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_array($result2);
echo " <h2>2. Получить список сотрудников, работающих на определенном проекте.</h2>";
echo $row2['employee_name']." ". $row2['position']." ". $row2['department']." ". $row2['hire_date']." ". $row2['salary']; 

$query3 = "SELECT clients.*, projects.project_name FROM clients
JOIN orders ON clients.client_id = orders.client_id
JOIN projects ON orders.project_id = projects.project_id;";
$result3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_array($result3);
echo " <h2>3. Получить список всех клиентов с указанием заказанных проектов.</h2>";
echo $row3['client_name']." ". $row3['contact_name']." ". $row3['contact_email']." ". $row3['contact_phone']." ". $row3['project_name']; 

$query4 = "SELECT clients.client_name, COUNT(orders.project_id) as projects_count FROM clients
JOIN orders ON clients.client_id = orders.client_id
GROUP BY clients.client_id;";
$result4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_array($result4);
echo " <h2>4. Получить список общего количества проектов, связанных с каждым клиентом.</h2>";
echo $row4['client_name']." - ". $row4['projects_count']; 


$query5 = "SELECT * FROM employees ORDER BY salary DESC;";
$result5 = mysqli_query($conn, $query5);
echo " <h2>5. Получить список сотрудников, отсортированных по зарплате в порядке убывания.</h2>";
while($row5 = mysqli_fetch_array($result5)){
echo $row5['employee_id']." ".$row5['employee_name']." ". $row5['position']." ". $row5['department']." ". $row5['hire_date']." ". $row5['salary']."<br>"; 
}

$start_year = '2022-01-01';
$end_year = '2022-01-01';
$query6 = "SELECT * FROM projects WHERE end_date BETWEEN '$start_year' AND '$end_year';";
$result6 = mysqli_query($conn, $query6);
echo " <h2>6. Получить список проектов, завершенных в определенном году.</h2>";
while($row6 = mysqli_fetch_array($result6)){
    echo $row6['project_id']." ".$row6['project_name']." ". $row6['start_date']." ". $row6['end_date']." ". $row6['description']."<br>"; 
    }
    

$employee_count = '1';
$query7 = "SELECT projects.*, COUNT(orders.employee_id) as employees_count FROM projects
JOIN orders ON projects.project_id = orders.project_id
GROUP BY projects.project_id
HAVING COUNT(orders.employee_id) = '$employee_count';";
$result7 = mysqli_query($conn, $query7);
echo " <h2>7. Получить список проектов, в которых задействовано определенное количество сотрудников.</h2>";
while($row7 = mysqli_fetch_array($result7)){
    echo $row7['project_id']." ".$row7['project_name']." ". $row7['start_date']." ". $row7['end_date'] ." ". $row7['description'] ." ". $row7['employees_count']."<br>"; 
    }

$query8 = "SELECT * FROM projects WHERE end_date > NOW();";
$result8 = mysqli_query($conn, $query8);
echo " <h2>8. Получить список проектов, которые еще не завершены.</h2>";
$row8 = mysqli_fetch_array($result8);
    $nums = $result8->num_rows;
    if($nums == 0){
        echo 'На данный момент все проекты заверщены';
    }else{
      
        echo $row8['project_id']." ".$row8['project_name']." ". $row8['start_date']." ". $row8['end_date'] ." ". $row8['description']."<br>"; 
    }

$query9 = "SELECT employees.*, COUNT(orders.project_id) as projects_count FROM employees
JOIN orders ON employees.employee_id = orders.employee_id
GROUP BY employees.employee_id
ORDER BY projects_count DESC;";
$result9 = mysqli_query($conn, $query9);
echo " <h2>9. Получить список сотрудников, работающих на наибольшем количестве проектов.</h2>";
while($row9 = mysqli_fetch_array($result9)){
echo $row9['employee_id']." ".$row9['employee_name']."<br>"; 
}

$years = '2';
$query10 = "SELECT * FROM employees WHERE DATEDIFF(NOW(), hire_date) > '$years';";
$result10 = mysqli_query($conn, $query10);
echo " <h2>10. Получить список сотрудников, у которых продолжительность работы в компании превышает определенное количество лет.</h2>";
while($row10 = mysqli_fetch_array($result10)){
echo $row10['employee_id']." ".$row10['employee_name']." - ". $row10['position']."<br>"; 
}
}else{
    header("location: exit.php");
}
?>

<section class="admins">

    <div class="blocksss">
        <div>
            <div class="naz_tabl"><h2>Пользователи</h2></div>
            <div>
                <table>
                    <tr class="naim_atribytov">
                        <th>№</th>
                       
                        <th>Имя</th>
                        <th>Отчество</th>
                       
                        <th>Почта</th>
                      
                    </tr>

                    <?php 
                        $query = "SELECT * FROM user";
                        $result = mysqli_query($conn, $query);
                        $suppliers = mysqli_query($conn, "SELECT * FROM user" );
                        for($data = []; $row = mysqli_fetch_assoc($result); $data [] = $row);
                        
                        foreach($data as $supplier) {
                            echo "<tr class='read_tabl'>";
                            echo "<td>" .  $supplier['id_user'] . "</td>";
                            echo "<td>" .  $supplier['username'] . "</td>";
                            echo "<td>" .  $supplier['email'] . "</td>";
                            echo "<td><a href='?red_id={$supplier['id_user']}'>Изменить</a></td>";
                            echo "<td><a href='?del_id={$supplier['id_user']}'>Удалить</a></td>";
                            echo'</tr>';
                        }
                        ?>
                </table>
            </div>
            <div class='flexs'> 
            <?php

if (!empty($_POST['submit'])){
    if ((!empty($_POST['username'])) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['admin'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $admin=$_POST['admin'];
        mysqli_query($conn, "INSERT INTO `user` (`id_user`, `username`, `email`,`password`, `admin`) VALUES (NULL, '$username', '$email', '$password', ' $admin')");
        header("Refresh:0");
    }else {
        echo "заполните все поля";
    }
}
?>
    <div class="dobaxit_danne">
        <h2>Добавить данные</h2>
        <form action="#" method="post">
            <p>Имя</p>
            <input class="form_for-text" type="text" name="username">
            <p>Почта</p>
            <input class="form_for-text" type="email"  name="email"> <br> 
            <p>Пароль</p>
            <input class="form_for-text" type="password"  name="password"> <br> 
            <p>Admin</p>
            <input class="form_for-text" type="text"  name="admin"> <br> 
            <input class="save_main-submit" type="submit" name="submit" value="Добавить">
        </form>
    </div>
            <?php
            if(!empty($_GET['red_id'])){
                $query = "SELECT * FROM user where id_user={$_GET['red_id']}";
                $result = mysqli_query($conn, $query);
                $suppliers = mysqli_query($conn, "SELECT * FROM user" );
                for($data = []; $row = mysqli_fetch_assoc($result); $data [] = $row);
                echo "<form method='POST'>";
                    foreach($data as $supplier) {
                        echo"
                        <div class='dobaxit_danne'> 
                            <h2>Изменить данные</h2>
                            <p>Имя</p>
                            <input class='form_for-text' type='text' required name='username' value='{$supplier['username']}'/>
                            <p>Почта</p>
                            <input class='form_for-text' type='text' required name='email' value='{$supplier['email']}'/>
                            <p>Пароль</p>
                            <input class='form_for-text' type='text' required name='password' value='{$supplier['password']}'/>
                            <p>Admin</p>
                            <input class='form_for-text' type='text' required name='admin' value='{$supplier['admin']}'/>
                         <br>";
                    }
                echo '<br><input class="save_main-submit" type="submit" name="update" value="Изменить">';
                echo'</form> </div>';
                
                if (!empty($_POST['update'])){
                    $username=$_POST['username'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $admin=$_POST['admin'];
                    mysqli_query($conn, "UPDATE `user` SET `username` = '$username', `email` = '$email', `password` =  '$password', `admin` = '$admin' where id_user = {$_GET['red_id']}");
                    header("Refresh:0");
                }
            }
            ?>
            <?php
                if (!empty($_GET['del_id'])){
                $supplier = mysqli_query($conn, "DELETE FROM user WHERE id_user = {$_GET['del_id']}");        
                }   
            ?>
            </div>
        </div>
    </div>
</section>
