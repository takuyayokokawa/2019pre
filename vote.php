<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <script src="https://use.typekit.net/cdu7bau.js"></script>
    <script>try { Typekit.load({ async: true }); } catch (e) { }</script>
    <title>早稲田祭2019 公式テーマソング-早稲田祭2019 公式サイト</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="design/stylesheets/html5reset.css" type="text/css">
    <link rel="stylesheet" href="design/stylesheets/design.css" type="text/css">
    <link rel="stylesheet" href="design/scripts/meanmenu.css" type="text/css">
    <link rel="stylesheet" href="design/scripts/clingify.css" type="text/css">
    <link rel="stylesheet" href="https://use.typekit.net/cdu7bau.css">
    <meta property="og:title" content="早稲田祭2019 公式サイト">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.wasedasai.net/pre2019/">
    <meta property="og:site_name" content="早稲田祭2019">
    <meta property="og:description" content="早稲田大学の学園祭 早稲田祭2019の公式サイト。">
    <!-- <meta property="fb:app_id" content="appid"> -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@wasedasai">
    <meta name="description" content="早稲田大学の学園祭 早稲田祭2019の公式サイト。">
    <meta name="keywords" content="早稲田,早稲田祭,2019,早稲田大学,早大,早稲田祭2019の公式サイト。
    ,学園祭,大学,waseda,wasedasai">
	<meta name="theme-color" content="#8c82af">
	<script type="text/javascript" src="vote.js"></script>
</head>
<body>
    <section class="childHeader">
        <h1><a href="index.html"><img src="design/images/logo-white.svg" width="500" alt="早稲田祭2019 公式サイト"></a></h1>
    </section>
    <nav class="nav mb31">
        <ul>
            <li>
                <a href="index.html">トップ</a>
            </li>
            
            <li>
                <a href="participants.html">参加団体・参加者の方へ</a>
            </li>
            <li>
                <a href="themesong.html">テーマソングについて</a>
            </li>
            <li>
                <a href="companies.html">企業の方へ</a>
            </li>
            <li>
                    <a href="alumni.html">校友の方へ</a>
                </li>
            <li>
                <a href="contact.html">お問い合わせ</a>
            </li>
        </ul>
	</nav>
	
<form name = "voteForm" action = "vote.php" method = "post">
	<input type = "hidden" name = "vote" value = "test">
</form>
<form name = "voteForm" action = "vote.php" method = "post">
	<input type = "hidden" name = "vote" value = "test">
</form>
<script src = "vote.js">

<!--[if lt IE 9]>
<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
</script>
<![endif]-->
<?php

	// もし何もデータが渡ってなかったら
	if(empty($_POST['vote'])){
		echo "投票データがありません。";
		exit;
	}

	// 投票先取得
	$vote = htmlspecialchars($_POST['vote']);


	// 投票ファイルの名前
	// クッキーの名前も変わるから、もう一度投票できるようになる
	$name = "theme3";

	// ip取得
	// 違うブラウザでも、同じ人と判定するため。
	// 投票自体はできちゃうので、CSVファイルをエクセルとかで開いて集計するときに重複チェック。
	$ipAddress = $_SERVER["REMOTE_ADDR"];

	//日付取得
	//データに入れるための日付
	$voteDate = date('Y-m-d H:i:s');

	//投票フラグを作成
	$voteFlag = true;

	// もしクッキーが残ってるなら
	if(isset($_COOKIE[$name])){

		// 投票できなくする
		$voteFlag = false;

	}

	//書込みデータ用意
	$data = $vote.",".$ipAddress.",".$voteDate."\r\n";

	//ファイルを読み込み／書き込みで開く
	$fp = fopen($name.'.csv','a+');

	// 投票フラグが生きていれば
	if($voteFlag){
		if ($fp){
			if (flock($fp, LOCK_EX)){
				if (fwrite($fp,  $data) === FALSE){
					$result = "投票に失敗しました。再度お試しください。";
				}else{
					$result = $vote."に投票しました。投票ありがとうございます。";
				}
				flock($fp, LOCK_UN);
				//クッキー設定
				setcookie($name,$voteDate,time()+60*60*24*30);
			}else{
			}
		}else{
			$result = "投票に失敗しました。再度お試しください。";
		}
	}else{
		$result = "すでに投票を受け付けております。";
	}

?>

	<div class="content_main">
		<div class="wrapper">
			<h1>公式テーマソング投票</h1>
		</div>
	</div>

	<div class="wrapper1">
		<div class="left">
			<p><?php echo $result ?></p>
		</div>

		<footer class="footer">
	<div class="ftsbtn clearfix">
		<ul>
			<li>
				<a href="https://twitter.com/wasedasai">
					<img src="design/images/social/twitter.png" height="28" width="28">
				</a>
			</li>
			<li>
				<a href="https://www.facebook.com/Wasedasai">
					<img src="design/images/social/facebook.png" height="28" width="28">
				</a>
			</li>
			<li>
				<a href="https://www.youtube.com/WasedasaiOfficial">
					<img src="design/images/social/youtube.png" height="28" width="28">
				</a>
			</li>
		</ul>
	</div>
	<div class="copyright">
		<small>Copyright &copy; 2019 WASEDASAI2019 Staff All Rights Reserved.</small>
	</div>
	<div class="scbtn">
		<ul>
			<li>
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.wasedasai.net/pre2019/" data-via="wasedasai"
					data-hashtags="早稲田祭2019">Tweet</a>
				<script>!function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https'; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = p + '://platform.twitter.com/widgets.js'; fjs.parentNode.insertBefore(js, fjs); } }(document, 'script', 'twitter-wjs');</script>
			</li>
		</ul>
	</div>
	</footer>
	<script type="text/javascript" src="design/scripts/jquery-1.11.1.min.js"></script>
	<script src="design/scripts/jquery.meanmenu.js"></script>
	<script>
	$(document).ready(function() {
		$('nav').meanmenu({
			meanMenuClose: "×", // クローズボタン
			meanMenuCloseSize: "18px", // クローズボタンのフォントサイズ
			meanMenuOpen: "<span /><span /><span />", // 通常ボタン
			meanRevealPosition: "right", // 表示位置
			meanScreenWidth: "1023", // 表示させるウィンドウサイズ(ブレイクポイント)
		});
	});
	</script>
	<script>
		$(function(){
			// #で始まるアンカーをクリックした場合に処理
			$('a[href^=#]').click(function() {
			// スクロールの速度
			var speed = 400; // ミリ秒
			// アンカーの値取得
			var href= $(this).attr("href");
			// 移動先を取得
			var target = $(href == "#" || href == "" ? 'html' : href);
			// 移動先を数値で取得
			var position = target.offset().top;
				// スムーススクロール
			$('body,html').animate({scrollTop:position}, speed, 'swing');
			return false;
			});
		});
	</script>
	<script type="text/javascript" src="design/scripts/jquery.clingify.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.nav').clingify();
		});
	</script>
	<script>
		$(document).ready(function() {
			var pagetop = $('.pagetop');
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					pagetop.fadeIn();
				} else {
					pagetop.fadeOut();
				}
			});
			pagetop.click(function () {
				$('body, html').animate({ scrollTop: 0 }, 500);
				return false;
			});
		});
	</script>
	<!-- IEのスムーズスクロールを切る -->
	<script>
		if (navigator.userAgent.match(/MSIE 10/i) || navigator.userAgent.match(/Trident\/7\./) || navigator.userAgent.match(/Edge\/12\./)) {
			$('body').on("mousewheel", function () {
				event.preventDefault();
				var wd = event.wheelDelta;
				var csp = window.pageYOffset;
				window.scrollTo(0, csp - wd);
			});
		}
	</script>
</body>
</html>
