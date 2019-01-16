<?php
/**
 * Created by PhpStorm.
 * User: 12947
 * Date: 2019/1/9
 * Time: 20:25
 */
header("Content_Type:text/html;charset=utf-8");
if (!isset($_POST["login"])) {
    if (isset($_POST['regist'])) {
        header("refresh:0;url=reg.html");
    } else {
        exit(" Illegal Login!");
    }
}//检测是否有submit操作

include('conn.php');//连接数据库
$name = $_POST['name'];//post获取用户名表单值
$password = $_POST['password'];//post获得用户密码表单值

if ($name && $password) {//如果用户名和密码都不为空
    $sql = "SELECT * FROM user WHERE username='$name' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows) {
        header("refresh:0;url=welcome.html");
        exit;
    } else {

        echo "<script type='text/javascript'>alert('用户名或密码错误！')</script>";
        echo "
            <script>
                setTimeout(function() {
                  window.location.href='login.html';
                },1000)
            </script>
        ";//如果错误，使用js 1秒后跳转到登录页面重新登录！
    }
} else {//如果用户名或密码有空
    echo "输入不能为空！";
    echo "
        <script>
            setTimeout(function() {
              window.location.href='login.html';
            },1000);
        </script>
    ";
}

mysqli_close($conn);