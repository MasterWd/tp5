<?php
/**
 * Created by PhpStorm.
 * User: 12947
 * Date: 2019/1/9
 * Time: 16:42
 */
header("Content-type:text/html;charset=utf-8");
$server = "127.0.0.1";
$db_username = "root";
$db_password = "wangdong.1996";
$db_name = "bigdata_db";

$conn = mysqli_connect($server, $db_username, $db_password);
if (!$conn) {
    die("can't connect" . mysqli_error($conn));
}
mysqli_select_db($conn, $db_name);