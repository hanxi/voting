
//添加文本框
function addInput(parent,id,pla)
{
    //创建input
    var input = document.createElement("input");
    input.type = "text";
    input.id = id;
    input.placeholder = pla;
    document.getElementById(parent).appendChild(input);
}

function Request(strName)
{
	var strHref = window.document.location.href;
	var intPos = strHref.indexOf("?");
	var strRight = strHref.substr(intPos + 1);

	var arrTmp = strRight.split("&");
	for(var i = 0; i < arrTmp.length; i++)
	{
		var arrTemp = arrTmp[i].split("=");
		if(arrTemp[0].toUpperCase() == strName.toUpperCase()) return arrTemp[1];
	}
	return "";
}

function goToPage(url,arg1,arg2)
{
	var a = document.getElementById(arg1).value;
	var b = document.getElementById(arg2).value;
	url += '?'+arg1+'='+a;
	url += '&'+arg2+'='+b;
	window.location.href=url;
}

function goToPage1(url)
{
	window.location.href=url;
}

function addVote()
{
    right.innerHTML="<h2>添加投票项</h2>";
    right.innerHTML+="<label>投票项标签<label>";
    addInput("right","cLabelName","地区名");
    right.innerHTML+="<br><label>投票项名称<label>";
    addInput("right","cSelectName","学校名");
    right.innerHTML+="<br>";
    var args = '\'./add.php\',\'cSelectName\',\'cLabelName\'';
    var str = '<input type=button value="\u6dfb加" onclick="goToPage('+args+');"/>';
    right.innerHTML+=str;
}
function autoLabel(label,id,focid)
{
    var input = document.getElementById(id);
    input.value = label;
    input = document.getElementById(focid);
    input.focus();
}
function showMsg(msg)
{
    right.innerHTML+="<br>"+msg+"<br>";
}

function alterVote()
{
    right.innerHTML="<h2>修改投票项</h2>";
}


function delVote()
{
    right.innerHTML="<h2>删除投票项</h2>";
}

function cleanVote()
{
    right.innerHTML="<h2>清空投票记录</h2>";
    var args = '\'./cleanVote.php\'';
    var str = '<input type=button value="清空" onclick="goToPage1('+args+');"/>';
    right.innerHTML+=str;
}
function cleanAll()
{
    right.innerHTML="<h2>清空投票项</h2>";
    var args = '\'./cleanAll.php\'';
    var str = '<input type=button value="清空" onclick="goToPage1('+args+');"/>';
    right.innerHTML+=str;
}