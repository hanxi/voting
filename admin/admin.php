<?php
require_once '../api/func.php';

if (!isLoginNow())
{
    goToPgae("./index.php");
}
require("./header.htm");
?>

    <body>
        <div id="top">
        </div>
        <div id="left">
            <?php
            require ("./left.htm");
            ?>
        </div>
        <div id="right">
            <h2>欢迎进入后台管理中心</h2>
            涵曦制作<br>
            2012-9-19
        </div>
    </body>

<?php
//根据传递的参数跳转菜单
switch ($_GET["page"])
{
    case 'add':
        jsFunc('addVote');
        jsFunc('showMsg',$_GET["msg"]);
        jsFunc3('autoLabel',$_GET["auto"],$_GET["id"],$_GET["foc"]);
        break;
    case 'cleanVote':
        jsFunc('cleanVote');
        jsFunc('showMsg',$_GET["msg"]);
        break;
    case 'cleanAll':
        jsFunc('cleanAll');
        jsFunc('showMsg',$_GET["msg"]);
        break;

    default:
        break;
}
?>

<?php
require ("./footer.htm");
?>