var xmlHttp;
var addNew;
function GetXmlHttpObject(handler)
{ 
	var objXmlHttp=null	
	if (navigator.userAgent.indexOf("MSIE")>=0)
	{ 
		var strName="Msxml2.XMLHTTP"
		if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
		{
			strName="Microsoft.XMLHTTP"
		} 
		try
		{   
			objXmlHttp=new ActiveXObject(strName)
			objXmlHttp.onreadystatechange=handler 
			return objXmlHttp
		} 
		catch(e)
		{ 
			alert("Error. Scripting for ActiveX might be disabled") 
			return 
		} 
	}
	else
	{
		objXmlHttp=new XMLHttpRequest()
		objXmlHttp.onload=handler
		objXmlHttp.onerror=handler 
		return objXmlHttp
	}
}
/* 显示留言 */
function showre(aid,no)
{   document.getElementById("list").innerHTML = "";
	var url = "http://"+window.location.host+root+"/index.php?m=Pl&a=index&aid="+aid+"&page="+no;
	//alert(url);
	xmlHttp=GetXmlHttpObject(showlist)
	xmlHttp.open("GET", url , true)
	xmlHttp.send(null)
}
function showlist()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {   
	    document.getElementById("list").innerHTML = ""
		xmlAuthor = xmlHttp.responseXML.getElementsByTagName("Author")
		xmlContent = xmlHttp.responseXML.getElementsByTagName("Content")
		xmlNoI = xmlHttp.responseXML.getElementsByTagName("NoI")
		xmlIP = xmlHttp.responseXML.getElementsByTagName("IP")
		xmlreContent = xmlHttp.responseXML.getElementsByTagName("reContent")
		//输出评论
		for (i=0;i<xmlContent.length;i++) {  
		    var Content = xmlContent[i].firstChild.data;
            var div = document.createElement("DIV");   
            div.id = i; 
			if (Content == "没有评论") {
			    //alert("1111");
			    div.innerHTML = "<div style='padding:5px;color:#ff0000'>暂时还没有评论</div>"
			}
			else {
			    var Author = xmlAuthor[i].firstChild.data;
			    var PostTime = xmlAuthor[i].getAttribute('PostTime');
			    var ID = xmlNoI[i].firstChild.data;
			    var IP = xmlIP[i].firstChild.data;
				var reContent = xmlreContent[i].firstChild.data;
			    div.innerHTML = "<div class='plun' style='clear:both;'><div class='ptitle'><div class='pnoi'><b><font color='blue'>"+ID+"</font></b> 楼:</div><div class='pname'>"+Author+"</div><div class='pIP'>来自：<a href='http://www.ip138.com/ips8.asp?ip="+IP+"&action=2' target='_blank'>"+IP+"</a></div><div class='pltime'>发表于 "+PostTime+"</div></div><div class='pings'>"+Content+"</div><div class='repings'>"+reContent+"</div></div>"
			}
            document.getElementById("list").appendChild(div);
		}
		 //输出分页信息
		P_Nums = xmlHttp.responseXML.getElementsByTagName("data")[0].getAttribute('P_Nums');
		var A_Nums = xmlHttp.responseXML.getElementsByTagName("data")[0].getAttribute('A_Nums');
		var aaa="[本文共<font color='#cc0000'>"+A_Nums*1+"</font>条评论 | 每页显示<font color='#cc0000'>6</font>条评论]";
		document.getElementById("pinglunym").innerHTML = aaa;
		if (P_Nums>1) {
	    	var page = xmlHttp.responseXML.getElementsByTagName("data")[0].getAttribute('page');
	    	var ID = xmlHttp.responseXML.getElementsByTagName("data")[0].getAttribute('ID');
			var D_Nums = xmlHttp.responseXML.getElementsByTagName("data")[0].getAttribute('D_Nums');
		    var l1 = "<a class='total'>&nbsp;"+D_Nums+"&nbsp;</a><a class='pages'><span>"+page+"/"+P_Nums+"</span></a>"
			l1 = (page>1)?l1+"<a href='javascript:showre("+ID+",1)' class='redirect' title='第一页'><<&nbsp;</a>":l1;
			var l2 = "";
			for (var i =1;i<=P_Nums;i++) {
			     l2 += (i == page)?"<a class='curpage'>"+i+"</a>":"<a href='javascript:showre("+ID+","+i+")' class='num'>"+i+"</a>"
			}
			l2 = (page == P_Nums)?l2:l2+"<a href='javascript:showre("+ID+","+P_Nums+")' class='redirect' title='最后页'>>>&nbsp;</a>"
			document.getElementById("MultiPage").innerHTML = l1+l2;
		}
	}
	
}
/* 发送留言 */
function AddNew() {
    document.getElementById("sendGuest").disabled = true;
    var Author = escape(document.getElementById("Author").value);
    var Content = escape(document.getElementById("plContent").value);
	var precontent = document.getElementById("plContent").value;
	var aid = document.getElementById("aid").value;
    if (Author == "" || Content == "") {
	    alert("请填写完整！");
		document.getElementById("sendGuest").disabled = false;
		return false;
	}
    addNew = GetXmlHttpObject(sendGuest);
    var GuestInfo = "author="+Author+"&aid="+aid+"&content="+Content;
    addNew.open("POST","http://"+window.location.host+root+"/index.php?m=Pl&a=update",false); 
    addNew.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
    addNew.send(GuestInfo); 
} 
function sendGuest() {
    if (addNew.readyState==4 || addNew.readyState=="complete") {
       alert(addNew.responseText);
	   document.getElementById("sendGuest").disabled = false;
	   //document.getElementById("Author").value = "";
	   document.getElementById("plContent").value = "";
	   showre(document.getElementById("aid").value,1);
	} 
}
function reSet() {
     document.getElementById("Author").value = "";
	 document.getElementById("plContent").value = "";
}