<?php
    require_once '../api/func.php';
    if (!isLoginNow())
    {
        goToPgae("./index.php");
    }
    require_once '../api/OperatorVotingDB.php';
    $ovdb=new OperatorVotingDB();
    $ovdb->resetCountValues();
    goToPgae("./admin.php?page=cleanVote&msg=清空成功");
?>