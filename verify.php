<?php
/**
 * Скрипт авторизации для тестового задания
 * User: vvpol
 * Date: 04.12.2016
 * Time: 12:03
 */
include 'common.php';

// Отрабатывает только если в запросе есть code
try {
    if(!empty($_GET['code'])) {
        $VK_SECRET_CODE = require('key.php');  // Секретный ключ
        $VK_APP_ID = '5760260';
        $secure = 'https://isbs.metasystems.ru/manager/test/vk/verify.php';
        $vk_grand_url = "https://oauth.vk.com/access_token?" .
            "client_id=" . $VK_APP_ID .
            "&client_secret=" . $VK_SECRET_CODE .
        "&code=" . $_GET['code'] .  //
            "&redirect_uri=" . $secure;
        // отправляем запрос на получения access token
        $resp = file_get_contents($vk_grand_url);
        $data = json_decode($resp, true);
        print_r($data);
        session_start();
        $_SESSION['user'] = $data;
    header('location: secure.php');
    } else {
        throw new Exception('Не передан параметр code');
    }

} catch (Exception $e){
?>
<!DOCTYPE html>
<html>
<head lang="en" ng-app="jobpadApp">
    <meta charset="UTF-8">
    <title>test blizzco Ошибка</title>
</head>
<body>
В процессе авторизации произошла ошибка:<br>
<?php echo $e->getMessage() ?>
</body>
</html>
<?php
}
?>
