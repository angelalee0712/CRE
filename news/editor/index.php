<?php 
include('fckeditor.php') ;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>FCKeditor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="robots" content="noindex, nofollow">
	</head>
	<body>
		<h1>FCKeditor</h1>
		<p><a href="?toolbar=Basic">Basic</a> - <a href="?toolbar=Default">Default</a></p>
		<form action="posteddata.php" method="post">
<?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;

$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath	= $sBasePath ;
if ($_GET['toolbar'] == 'Basic') {
	$oFCKeditor->ToolbarSet = 'Basic';
}
$oFCKeditor->Value		= '<h2>FCKeditor 2.6 绮剧畝鐗堢涓夌増 by 4ngel (<a target="_blank" href="http://www.sablog.net/blog">http://www.sablog.net/blog</a>)</h2>
<p>璇ョ増鏈熀浜� FCKeditor 2.6 淇敼锛屾棬鍦ㄦ彁楂樺姞杞介�熷害锛屽垹闄や笉甯哥敤鐨勫姛鑳斤紝杈惧埌绮剧畝鍜屼紭鍖栫殑鐩殑銆�</p>
<p>鏈淇敼鏄熀浜庢簮浠ｇ爜绮剧畝鍜屼紭鍖栧啀閲嶆柊缂栬瘧锛屼繚璇佸姛鑳芥甯哥殑鎯呭喌涓嬶紝纭繚涓嶆畫鐣欎换浣曞瀮鍦俱�佹棤鐢ㄧ殑浠ｇ爜銆傞�氳繃淇敼鍐呭鍙互鐪嬪嚭锛屽嚑涔庨兘鏄负浜嗘彁楂樺姞杞介�熷害鍜屾彁楂樺疄鐢ㄧ▼搴﹁�屽仛鐨勪慨鏀广�係ablog-X鍜孲a绯诲垪绋嬪簭灏嗕竴鐩村欢缁娇鐢ㄦ湰浜烘墍绮剧畝鐨凢CKeditor銆�</p>
<p><span style="color: rgb(255, 255, 255);"><span style="background-color: rgb(255, 0, 0);">FCKeditor 2.6 绮剧畝鐗堢涓夌増淇敼鍐呭濡備笅锛�</span></span></p>
<ol>
    <li>淇ˉ绗竴绗簩鐗堝瓨鍦ㄧ殑鐒︾偣涓㈠けBUG,鍗冲湪IE涓嬮�夋嫨鏂囧瓧鐐瑰叾浠栧湴鏂归�変腑鏂囧瓧鍙樻垚鏈�変腑</li>
    <li>鍒犻櫎鎻掍欢鍔熻兘</li>
    <li>鍒犻櫎琛ㄦ牸鍔熻兘</li>
    <li>绮剧畝寮瑰嚭绐楀彛鐨勫叕鐢ㄩ〉闈㈠嚱鏁�</li>
    <li>杩涗竴姝ヤ紭鍖栦唬鐮�</li>
</ol>
<p><span style="color: rgb(255, 255, 255);"><span style="background-color: rgb(255, 0, 0);">FCKeditor 2.6 绮剧畝鐗堢浜岀増淇敼鍐呭濡備笅锛�</span></span></p>
<ol>
    <li>澧炲姞鎻掑叆浠ｇ爜鍔熻兘</li>
    <li>鍒犻櫎鍘熸潵鐨凪SN琛ㄦ儏骞剁敤QQ2008琛ㄦ儏浠ｆ浛</li>
</ol>
<p><span style="color: rgb(255, 255, 255);"><span style="background-color: rgb(255, 0, 0);">FCKeditor 2.6 绮剧畝鐗堢涓�鐗堜慨鏀瑰唴瀹瑰涓嬶細</span></span></p>
<ol>
    <li>鍒犻櫎妯℃澘銆佹墦鍗般�佷繚瀛樸�佹嫾鍐欐鏌�</li>
    <li>鍒犻櫎椤甸潰灞炴��</li>
    <li>鍒犻櫎鍙抽敭鑿滃崟鍔熻兘</li>
    <li>鍒犻櫎琛ㄥ崟鍔熻兘</li>
    <li>鍒犻櫎鏂囦欢涓婁紶鍜屾祻瑙堟湇鍔″櫒鍔熻兘</li>
    <li>鍒犻櫎鐗规畩瀛楃鍔熻兘</li>
    <li>鍒犻櫎閫夋嫨鏇村棰滆壊鍔熻兘</li>
    <li>鍒犻櫎璇█鏂囦欢浠呬繚鐣欑畝浣撲腑鏂囧苟绮剧畝璇█鍖�</li>
    <li>鍒犻櫎闄ら粯璁ゆ剰澶栫殑涓や釜妯℃澘</li>
    <li>鍒犻櫎宸ュ叿鏍忕殑鎶樺彔鍔熻兘</li>
    <li>鍒犻櫎鏄剧ず鍖哄潡銆佸叏灞忓姛鑳�</li>
    <li>鍒犻櫎涓�浜涗竴鑸笉浼氭洿鏀圭殑閰嶇疆閫夐」鍙婂叾杩炲甫鍔熻兘</li>
    <li>鍒犻櫎N澶氬垽鏂�</li>
    <li>浼樺寲鏄剧ず宸ュ叿鏍忎娇鍦ㄥ悇涓祻瑙堝櫒涓嬭揪鍒拌瑙夌粺涓�</li>
    <li>绮剧畝閾炬帴銆佸浘鐗囥�丗LASH鎻掑叆鍔熻兘锛岀‘淇濇渶绮剧畝鐨勮瑙夊拰鏈�蹇嵎鐨勬搷浣�</li>
    <li>澶氫釜缁嗚妭璋冩暣</li>
</ol>
<p>绗竴鐗堢粰闇�瑕佷竴浜涘父鐢ㄧ殑鍔熻兘锛屼絾鏄張瀵瑰姞杞介�熷害瑕佹眰寰堥珮鐨勬湅鍙嬫垨鑰呯▼搴忓紑鍙戜汉鍛樸�傚洜姝わ紝杩欎釜鐗堟湰骞朵笉绠楁瀬搴︾簿绠�鐗堛�備絾鏄湪閫熷害鍜屼綋绉笂锛屽凡缁忚繙杩滀紭浜庡畼鏂瑰師鐗堛�備互鍚庢湁绌哄皢缁х画鍦ㄦ鐗堟湰鍩虹涓婅繘琛岀簿绠�锛屽苟浣滄洿澶х▼搴︾殑浼樺寲銆�</p>
<p>FCKeditor鐗堟潈褰掑叾寮�鍙戝洟闃熸墍鏈夈��</p>
<p>鏈夊ソ鐨勭簿绠�寤鸿璇疯仈绯绘垜銆傚鏋滄湁BUG锛岄夯鐑﹁鐪嬪畼鏂圭殑婕旂ず锛岀‘淇濇槸绮剧畝閫犳垚鐨勶紝涔熷彲浠ヨ仈绯绘垜銆傝阿璋��</p>
<p><img alt="" src="http://www.sablog.net/blog/attachments/date_200802/78f297f2a935e00d010ff0deedc857c6.png" /></p>
<p>PHP璋冪敤鍔炴硶锛�</p>
<pre><ol class="dp-c"><li class="alt"><span><span>&lt;?php&nbsp;&nbsp;</span></span></li><li><span><span class="keyword">include</span><span>(</span><span class="string">\'fckeditor.php\'</span><span>)&nbsp;;&nbsp;</span></span></li><li class="alt"><span>&nbsp;</span></li><li><span><span class="vars">$sBasePath</span><span>&nbsp;=&nbsp;</span><span class="vars">$_SERVER</span><span>[</span><span class="string">\'PHP_SELF\'</span><span>]&nbsp;;&nbsp;</span></span></li><li class="alt"><span><span class="vars">$sBasePath</span><span>&nbsp;=&nbsp;dirname(</span><span class="vars">$sBasePath</span><span>).</span><span class="string">\'/\'</span><span>;&nbsp;</span></span></li><li><span>&nbsp;</span></li><li class="alt"><span><span class="vars">$oFCKeditor</span><span>&nbsp;=&nbsp;</span><span class="keyword">new</span><span>&nbsp;FCKeditor(</span><span class="string">\'FCKeditor1\'</span><span>)&nbsp;;&nbsp;</span></span></li><li><span><span class="vars">$oFCKeditor</span><span>-&gt;BasePath&nbsp;&nbsp;&nbsp;=&nbsp;</span><span class="vars">$sBasePath</span><span>&nbsp;;&nbsp;</span></span></li><li class="alt"><span><span class="vars">$oFCKeditor</span><span>-&gt;Value&nbsp;&nbsp;=&nbsp;</span><span class="string">\'\'</span><span>;&nbsp;</span></span></li><li><span><span class="vars">$oFCKeditor</span><span>-&gt;Create();&nbsp;</span></span></li><li class="alt"><span>?&gt;&nbsp;</span></li></ol></pre>';
$oFCKeditor->Create() ;
?>
			<br />
			<input type="submit" value="Submit">
		</form>
	</body>
</html>