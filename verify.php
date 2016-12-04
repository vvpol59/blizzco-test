<?php
/**
 * Created by PhpStorm.
 * User: vvpol
 * Date: 04.12.2016
 * Time: 12:03
 */
error_reporting( E_ALL );
ini_set( 'display_errors', 'On' );
ini_set( 'display_startup_errors', 1);
//set_error_handler("err_proc");
date_default_timezone_set("Europe/Moscow");

if(!empty($_GET['code'])) {
    $VK_SECRET_CODE = require('key.php');
    $VK_APP_ID = '5760260';
    $secure = 'https://isbs.metasystems.ru/manager/test/vk/verify.php';
    $vk_grand_url = "https://oauth.vk.com/access_token?" .
        "client_id=".$VK_APP_ID.
        "&client_secret=".$VK_SECRET_CODE.
        "&code=".$_GET['code'].
        "&redirect_uri=" . $secure;
//echo '<br>' . $vk_grand_url . '<br>';
    // отправляем запрос на получения access token
    $resp = file_get_contents($vk_grand_url);
    $data = json_decode($resp, true);
    $vk_access_token = $data['access_token'];
    $vk_uid =  $data['user_id'];

   // print_r($data);

// обращаемся к ВК Api, получаем имя, фамилию и ID пользователя вконтакте
// метод users.get
    $res = file_get_contents("https://api.vk.com/method/users.get?uids=".$vk_uid."&access_token=".$vk_access_token."&fields=uid,first_name,last_name,nickname,photo");
    $data2 = json_decode($res, true);
    $user_info = $data2['response'][0];
 echo "<!-- ";
    print_r($data2);
    echo " -->";
?>
<html>
<body>
<?= $user_info['first_name']." ".$user_info['last_name'] ?>
<img src="<?php echo $user_info['photo'] ?>">
</body>
</html>
<?php } ?>