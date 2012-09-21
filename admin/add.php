<?php
    require_once '../api/func.php';

    if (!isLoginNow())
    {
        goToPgae("./index.php");
    }

    $name = $_GET["cSelectName"];
    $label = $_GET["cLabelName"];
	//echo $name."<br>".$label;
    require_once '../api/OperatorVotingDB.php';
    $ovdb=new OperatorVotingDB();
    $ovdb->addSelectName($name,$label);
    require './header.htm';
    goToPgae("./admin.php?page=add&auto="."$label"."&id=cLabelName&foc=cSelectName&msg=添加成功");
?>
