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
// Если не авторизован - на авторизацию
if (!isset($_SESSION['user'])){
    header('location: login.php');
    exit;
}
$error = false;
try {
    $vk_uid = $_SESSION['user']['user_id'];
    $vk_access_token = $_SESSION['user']['access_token'];
    // Запрос данных пользователя (first_name,last_name,photo)
    $res = file_get_contents("https://api.vk.com/method/users.get?uids=" .
        $_SESSION['user']['user_id'] . "&access_token=" .
        $_SESSION['user']['access_token'] . "&fields=first_name,last_name,photo");
    $data2 = json_decode($res, true);
    $user_info = $data2['response'][0];
} catch (Exception $e){
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>test blizzco secure</title>
</head>
<body>
<h3>Закрытая страница</h3>

<?php
if ($error){
echo $error;
} else {
?>
    <img src="<?php echo $user_info['photo'] ?>"><br>
    First name: <?= $user_info['first_name'] ?><br>
    Last name: <?= $user_info['last_name'] ?><br>
<?php } ?>
</body>
</html>

