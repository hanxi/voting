<?php
/**
 * 操作数据库
 * 封装PDO，使其方便自己的操作
 */
class OperatorDB
{
    //连接数据库的基本信息
    private $dbms='mysql';       //数据库类型,对于开发者来说，使用不同的数据库，只要改这个.
    private $host='localhost';       //数据库主机名
    private $dbName='jianhua1_vote';     //使用的数据库
    private $user='jianhua1_vote';       //数据库连接用户名
    private $passwd='!8U3xB,RKTch';     //对应的密码
    private $pdo=null;

    public function  __construct()
    {
		//dl("php_pdo.dll");
		//dl("php_pdo_mysql.dll");
        $this->dsn="$this->dbms:host=$this->host;dbname=$this->dbName";
        try
        {
            $this->conn=new PDO($this->dsn,$this->user,$this->passwd);//初始化一个PDO对象，就是创建了数据库连接对象$db
        }
        catch(PDOException $e)
        {
            die("<br/>数据库连接失败(creater PDO Error！): ".$e->getMessage()."<br/>");
        }
    }
    public function __destruct()
    {
        $this->pdo = null;
    }

    public function exec($sql)
    {
        try
        {
            $this->conn->query("set names 'utf8'");
            return $this->conn->exec($sql);
        }
        catch(PDOException $e)
        {
            die("<br/>exec()失败(exec()Failed！): ".$e->getMessage()."<br/>");
        }
    }
    public function query($sql)
    {
        try
        {
            $this->conn->query("set names 'utf8'");
            return $this->conn->query($sql);
        }
        catch(PDOException $e)
        {
            die("<br/>query()失败(exec()Failed！): ".$e->getMessage()."<br/>");
        }
    }
}
?>
