<?php
/**
 *
 * Created by PhpStorm.
 * User: vvpol
 * Date: 02.12.2016
 * Time: 9:01
 */
function err_proc($code, $msg, $file, $line)
{
    $response = array(
        'errorMessage' => 'Error(err_proc) ' . $msg . ' [' . $code . '] on ' . $file . ' in line ' . $line,
        'stack' => debug_backtrace(false));
      print_r($response);
    exit;
}

error_reporting( E_ALL );
ini_set( 'display_errors', 'On' );
ini_set( 'display_startup_errors', 1);
set_error_handler("err_proc");
date_default_timezone_set("Europe/Moscow");
