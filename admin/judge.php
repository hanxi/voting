<?php
$user = $_POST["user"];
$passwd = $_POST["passwd"];
require_once './Login.php';
$login = new Login($user,$passwd);
if ($login->isRightUser())
{
    if (setcookie("user",$user,0))
    {
        require_once '../api/func.php';
        goToPgae("./admin.php");
    }
}
else
{
    echo "<script language=\"JavaScript\">alert(\"用户名或密码错误\");</script>";
    require_once '../api/func.php';
    goToPgae("./index.php");
}
?>
