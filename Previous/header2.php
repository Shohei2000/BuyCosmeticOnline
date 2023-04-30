<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title></title>

    <script src="modalwindow1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">

    <script type="text/javascript" src="./old/footerFixed.js"></script><!-- footer用JavaScript -->
    <link rel="stylesheet" href="old/button.css"><!-- button用CSS適用 -->
    <link rel="stylesheet" href="old/star-rating.css"><!-- star-rating用CSS適用 -->


    <script type="text/javascript">

    $(document).ready(function () {
        $("#topBtn").hide();　//ボタンを非表示にする
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 100) { //ページの上から100pxスクロールした時
                $("#topBtn").fadeIn("fast"); //ボタンがフェードインする
            } else {
                $("#topBtn").fadeOut("fast");　//ボタンがフェードアウトする
            }
            scrollHeight = $(document).height(); //ドキュメントの高さ
            scrollPosition = $(window).height() + $(window).scrollTop(); //現在地
            footHeight = $("footer").innerHeight(); //止めたい位置の高さ(今回はfooter)
            if (scrollHeight - scrollPosition <= footHeight) { //ドキュメントの高さと現在地の差がfooterの高さ以下の時
                $("#topBtn").css({
                    "position": "absolute", //pisitionをabsoluteに変更
                });
            } else { //それ以外の場合は
                $("#topBtn").css({
                    "position": "fixed", //固定表示
                });
            }
        });


    //スムーススクロール設定
        $('#topBtn').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);　//スムーススクロールの速度
            return false;
        });
    });


    function show_cards(){//支払方法のradioボタン判定(カード支払い、を押した時)
    	if(cards.style.display=="none"){
    		// noneで非表示
    		cards.style.display ="block";
    	}
    }

    function close_cards(){//支払方法のradioボタン判定(カード支払い、を押した時)
    	if(cards.style.display=="block"){
    		// noneで非表示
    		cards.style.display ="none";
    	}
    }



    function show_hiddenbox(){//発送先のradioボタン判定(別の発送先を指定する、を押した時)
    	if(hiddenbox.style.display=="none"){
    		// noneで非表示
    		hiddenbox.style.display ="table";
    	}
    }

    function close_hiddenbox(){//支払方法のradioボタン判定(お客様情報と同じ、を押した時)
    	if(hiddenbox.style.display=="table"){
    		// noneで非表示
    		hiddenbox.style.display ="none";
    	}
    }

//モータルウィンドウ(プレゼント)
$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        return false;
    });
    $('.button2').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});
//モータルウィンドウ(プレゼント)

//モータルウィンドウ(カート追加)


    </script>

</head>
<body>

	<!-- ナビゲーションバー -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top" style="height:4vw;">
		<!-- サブコンポーネント -->
			<!-- ロゴ -->
       		<a href="Mainpage.php" style="height:2vw;"><img src="/Kouki2/Sample/image/logo_icon2.PNG" alt="Logo" name="logo" style="height:300%; margin-top:-1.8vw;"></a>
			<div class="navbar-collapse collapse" id="navbar-content">
      <!-- ナビゲーションメニュー -->
      <!-- 左側メニュー：ナビゲーションバーの左側 -->
      <ul class="navbar-nav mr-auto" style="margin-left:2vw;">
		<form id="serchbox_container" action="G3-1-5.php" method="get" style="width:30vw; height:auto; display:flex; justify-content:flex-start; align-items:center;">
            <input id="serchbox" id="s" name="s" type="text" placeholder="キーワードを入力" style="width:80%; min-height:100%;"/>
            <input id="serchbutton" type="submit" name="search" value="検索" style="width:20%; min-height:100%; font-size:1vw;">
            <input type="hidden" name="page" value=1>
        </form>
      </ul>

      <!-- 右側メニュー：ナビゲーションバーの右側-->
      <ul class="navbar-nav" style="display: flex; justify-content: center; align-items: center;">
        <li class="nav-item ">
            <a href="G5-1-1.php">
                <i class="logo-right fas fa-shopping-cart"></i>
            </a>
        </li>
        <li class="nav-item">
			<a href="<?php if(isset($_SESSION['customer'])){//ログインしていた場合は、お気に入り画面へ
                        	    echo 'G4-3.php';
                        	}else{//非ログイン時は、ログイン画面へ
                        	    echo 'login_input.php';
                        	}
        	         ?>">
                <i class="logo-right fas fa-star"></i>
          	</a>
        </li>
        <li class="nav-item">
        	<a href="<?php if(isset($_SESSION['customer'])){//ログインしていた場合は、マイページへ
                        	    echo 'G2-1-1.php';
                        	}else{//非ログイン時は、ログイン画面へ
                        	    echo 'login_input.php';
                        	}
        	         ?>">
                <i class="logo-right fas fa-user"></i>
          	</a>
        </li>
        <li class="nav-item">
        	<a href="Logout.php">
                <i class="logo-right fas fa-door-open"></i>
        	</a>
        </li>
      </ul>
      <!-- /ナビゲーションメニュー -->
    </div>
	</nav>

	<main>

    <style>
        .nav-item{
            margin:0 0.5em;
            float:left;
        }
        main{
            margin-bottom:1em;
        }
        .logo-right{
            color:white;
            font-size:2.5vw;
        }
        .logo-right:hover{
            color:gray;
        }
        .logo-right:active{
            position: relative;
            top: 0.2vw;
        }

        nav{
            background-color:gray;
        }
        ul{
            list-style:none;
        }
    </style>

<?php
    $pdo = new PDO('mysql:host=localhost; dbname=we will shopping; charset=utf8','root');
?>
