<?php
/**
 * Created by PhpStorm.
 * User: 12947
 * Date: 2019/1/9
 * Time: 17:00
 */
header("Content_Type:text/html;charset=utf-8");

if (!isset($_POST['submit'])) {
    exit("错误执行");
}//判断是否有submit操作

$name = $_POST['name'];//post获取表单里的name
$password = $_POST['password'];//post获取表单里的password

include('conn.php');//链接数据库
if ($name && $password) {//如果账号和密码不为空
    $sql = "SELECT * FROM user WHERE username='$name'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows) {
        echo "<script>
                    alert('用户名已存在！请重新输入');      
              </script>";
        echo "
            <script>
                setTimeout(function() {
                  window.location.href='login.html';
                },1000)
            </script>
        ";//使用js 1秒后跳转到登录页面重新登录！
        exit;
    }


    $q = "INSERT INTO USER (id,username,password) VALUES(null ,'$name','$password')";//向数据库插入表单传来的值的sql
    $result = mysqli_query($conn, $q);

    if (!$result) {
        die('Error:' . mysqli_error($conn));//如果sql执行失败输出错误
    } else {
        echo "注册成功,2s后自动跳转登录页面...";//成功输出注册成功
        echo "
        <script>
            setTimeout(function() {
              window.location.href='login.html';
            },2000);
        </script>";
    }
}else{
    echo "<script></script>";
    echo "
        <script>
            setTimeout(function() {
              window.location.href='reg.html';
            },1000);
        </script>
    ";
}
mysqli_close($conn);