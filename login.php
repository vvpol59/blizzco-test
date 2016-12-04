<?php
/**
 * Страница авторизации
 * Created by PhpStorm.
 * User: vvpol
 * Date: 02.12.2016
 * Time: 9:16
 */
require 'common.php';
?>
<!DOCTYPE html>
<html  ng-app="testApp">
<head lang="en">
    <meta charset="UTF-8">
    <title>test blizzco login</title>
    <script src="angular-1.2.30.js"></script>
    <script src="test.js"></script>
    <style>
a {
    display: block;
    font-family: tahoma, verdana;
            font-size: 15px;
            padding: 20px 0 2px 100px;
        }
    </style>
</head>
<body ng-controller="testController">
<h3>Авторизация через VK</h3>
<a href="/">Home</a>
<a ng-click="login()">Авторизоваться</a>

<a href="https://oauth.vk.com/authorize?client_id=5760260&scope=offline&redirect_uri=https://isbs.metasystems.ru/manager/test/vk/verify.php&response_type=code">Авторизация-2</a>
</body>
</html>
