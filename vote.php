<meta http-equiv="Refresh" content="3; url=index.php"> 
<?php
$selectName = $_POST["witchSelect"];
/**
 * 处理投票提交的信息
 */

require_once ('./api/func.php');
require_once ('./api/OperatorVotingDB.php');
require ("./header.htm");
$ovdb = new OperatorVotingDB();
$ip = getClientIP();
$loc = getIpfrom123cha($ip);
$ovdb->vote($ip, $loc, $selectName);
//echo "投票成功！";
echo "<br>3秒后自动返回...";
//goToPgae('./index.php');
?>
