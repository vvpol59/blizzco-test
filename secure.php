<?php
/**
 * Тестовая закрытая страница
 * Created by PhpStorm.
 * User: vvpol
 * Date: 02.12.2016
 * Time: 8:58
 */
include 'common.php';
session_start();
// Если не авторизован - возвращаем 401
if (!isset($_SESSION['user'])){
  //  header('HTTP/1.0 401 Unauthorized');
  //  exit;
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>test blizzco secure</title>
    <style>
a {
    display: block;
    font-family: tahoma, verdana;
            font-size: 15px;
            padding: 20px 0 2px 100px;
        }
    </style>
</head>
<body>
<h3>Закрытая страница</h3>

<a href="/">Home</a>

<a href="login.php">login</a>

<?php print_r($_SERVER) ?>
</body>
</html>

