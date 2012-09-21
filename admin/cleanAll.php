<?php
    require_once '../api/func.php';
    if (!isLoginNow())
    {
        goToPgae("./index.php");
    }
    require_once '../api/OperatorVotingDB.php';
    $ovdb=new OperatorVotingDB();
    $ovdb->clearTables();
    goToPgae("./admin.php?page=cleanAll&msg=清空成功");
?>