<?php

/**
 * 控制管理员登陆
 */

require_once '../api/OperatorDB.php';

class Login
{
    private $name;
    private $passwd;

    public function __construct($n, $p)
    {
        $this->name = $n;
        $this->passwd = $p;
    }

    public function isRightUser()
    {
        $isFind = false;
        $odb = new OperatorDB();
        $sql = "SELECT * FROM user WHERE name='$this->name' AND passwd=MD5('$this->passwd');";
        $stm = $odb->query($sql);
        if(count($stm->fetchAll()) == 1)
        {
            $isFind = true;
        }
        return $isFind;
    }
}

?>
