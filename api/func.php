<?php
/**
 * 页面跳转函数
 * 使用js实现
 * @param string $url
 */
function goToPgae($url)
{
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
function jsFunc($fun, $arg=null)
{
    echo "<script language='javascript' type='text/javascript'>";
    echo $fun."('$arg');";
    echo "</script>";
}
function jsFunc3($fun, $arg1=null,$arg2=null,$arg3=null)
{
    echo "<script language='javascript' type='text/javascript'>";
    echo $fun."('$arg1','$arg2','$arg3');";
    echo "</script>";
    //echo $fun."('$arg1','$arg2','$arg3');";
}

function isLoginNow()
{
    if ($_COOKIE["user"]=='')
    {
        return false;
    }
    return true;
}

function getClientIP()
{
    if ($_SERVER["HTTP_X_FORWARDED_FOR"])
    {
        if ($_SERVER["HTTP_CLIENT_IP"])
        {
                $proxy = $_SERVER["HTTP_CLIENT_IP"];
        }
        else
        {
            $proxy = $_SERVER["REMOTE_ADDR"];
        }
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    else
    {
        if ($_SERVER["HTTP_CLIENT_IP"])
        {
                $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        else
        {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
    }
    return $ip;
}

//从123查获取ip
function getIpfrom123cha($ip) {
    $url = 'http://www.123cha.com/ip/?q='.$ip;
        $content = file_get_contents($url);
        $preg = '/(?<=本站主数据:<\/li><li style=\"width:450px;\">)(.*)(?=<\/li>)/isU';
        preg_match_all($preg, $content, $mb);
        $str = strip_tags($mb[0][0]);
        //$str = str_replace(' ', '', $str);
        $address = $str;
        if($address == '') {
            $address = '未明';
        }
    return $address;
}

//从百度获取ip所在地
function getIpfromBaidu($ip) {
    $url = 'http://www.baidu.com/s?wd='.$ip;
    $content = file_get_contents($url);
    $preg = '/(?<=<p class=\"op_ip_detail\">)(.*)(?=<\/p>)/isU';
    preg_match_all($preg, $content, $mb);
    $str = strip_tags($mb[0][1]);
    $str = str_replace(' ', '', $str);
    $address = substr($str, 7);
    if($address == '') {
        $address = '未明';
    }
    return $address;
}
?>
