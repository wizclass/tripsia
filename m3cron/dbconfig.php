<?php
    $host_name = '127.0.0.1';
    $user_name = 'root';
    $user_pwd = 'wizclass.inc@gmail.com';
    // $user_pwd = 'willsoft0780!@';
    $database = 'tripsia';
    return mysqli_connect($host_name,$user_name,$user_pwd,$database);
?>