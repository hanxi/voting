<?php
require ("./header.htm");
require_once ('./api/OperatorVotingDB.php');
$ovdb = new OperatorVotingDB();
//获取前20名
$row20 = $ovdb->getVotesSortByCount(20);
$rowAll = $ovdb->getVotesGroupByLabel();
?>
<script language="javascript">
function checkfrom()
{
    return confirm('提交投票结果?');
}
</script>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>CSS | Scrolling Sidebar from CSS-Tricks</title>
	
	<style type="text/css">
        #sidebar { width: 190px; position: fixed; left: 27%; top: 90%; margin: 0 0 0 110px; }

    </style>
    
    <!--[if IE 6]>
	   <style type="text/css">
	       html, body { height: 100%; overflow: auto; }
	       #sidebar { position: absolute; }
	       #page-wrap { margin-top: -5px; }
	       #ie6-wrap { position: relative; height: 100%; overflow: auto; width: 100%; }
	   </style>
    <![endif]-->
    
    <!--[if IE 7]>
	   <style type="text/css">
	       #sidebar { margin-top: -10px;  }
	       #page-wrap { margin-top: -5px; }
	   </style>
    <![endif]-->
</head>

    <body>
        <div id="top2"></div>
        <div id="leftindex">
            <div class="caption">目前最具人气TOP20</div>
            <?php
            foreach ($row20 as $row)
            {
			?>
			<div class="list20"><?=$row["SelectName"]."(".$row["CountVotes"].")"?></div>
			<?php
            }
            ?>
        </div>
        <div id="rightindex">
            <form action="./vote.php" name="form1"  onsubmit="return checkfrom();"  method="post">
                <div class="listAll">
                <?php
                $rowAll->setFetchMode(PDO::FETCH_ASSOC);
                $arr = $rowAll->fetchAll();
				//print_r($arr);
				$labelold = "";
				foreach ($arr as $row)
                {
					if ($labelold != $row["LabelName"])
					{
						//echo "<br><br>";
						echo "<div class=\"caption\">".$row["LabelName"]."</div>";
						$labelold = $row["LabelName"];
                    }
                    echo "<lis><input type=radio id=\"witchSelect\" name=\"witchSelect\" value=\"".$row["SelectName"]."\"/>".$row["SelectName"]."(".$row["CountVotes"].") "."</lis>";
                }
                ?>
                </div>
				<div id="sidebar">		
					<input type="submit"  class="vote-b" onmouseover="this.style.backgroundPosition='left -40px'" onmouseout="this.style.backgroundPosition='left top'" value="提交投票" /><br />
				</div>

            </form>
        </div>

    </body>
<?php
require ("./footer.htm");
?>
