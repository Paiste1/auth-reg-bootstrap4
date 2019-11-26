<?php
session_start();
require_once 'connect.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="container">

    <form action="" class="form-signin" method="post">
        <h2>Авторизация</h2>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$_POST['username']?>" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block">Вход</button>
        <a href="index.php" class="btn btn-lg btn-primary btn-block">Регистрация</a>
    </form>

</div>

<?php

if(isset($_POST['username']) and $_POST['password']) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);

    if($count == 1){
        $_SESSION['username'] = $username;
    } else {
        echo '<div class="name two">Неверный логин или пароль!</div>';
    }
}

echo '<div class="form-signin">';

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo '<div class="name"> Hello, ' . $username . '!</div>';
    echo '<a href="logout.php" class="btn btn-lg btn-primary btn-block"> Выход </a>';
}
echo '</div>';

?>

</body>
</html>