<?php session_start();?>
<?php require 'old/header1.php';?>

	   <?php

	      if(isset($_REQUEST['admit'])){//確認ボタンが投下されたら、DBに会員情報を追加する。

	       $sql = $pdo -> prepare('insert into customer values(null,?,?,?,?,?,?,?,?,?,?,?,?)');

	       $sql -> execute([$_SESSION['password1'],$_SESSION['mail1'],$_SESSION['name_kanji1']." ".$_SESSION['name_kanji2'],
	           $_SESSION['name_kana1']." ".$_SESSION['name_kana2'],$_SESSION['gd_class'],
	           $_SESSION['birth_year'].$_SESSION['birth_month'].$_SESSION['birth_day'],
	           $_SESSION['zip_code'],$_SESSION['pref_id'],$_SESSION['city'],$_SESSION['house_number'],$_SESSION['building'],$_SESSION['tell']]);

// 	          $sql -> execute([$_SESSION['name_kanji1'].$_SESSION['name_kanji2'],$_SESSION['address1'].$_SESSION['address2'].$_SESSION['address3'],$_SESSION['mail1'],
// 	                 $_SESSION['password1'],$_SESSION['birth_year'].$_SESSION['birth_month'].$_SESSION['birth_day'],$_SESSION['postcode'],$_SESSION['phone']]);

    	   }

       ?>

	<div class="container1">
		<p style="font-size:2em; text-align:center;">登録完了</p>
		<hr>
		<p style="margin-left:1em;">登録完了しました。</p>
		<input class="button1" type="button" onclick="location.href='login_input.php'" value="ログインページへ" style="background-color:#0068b7;">
	</div>


	<!-- 会員登録完了後、登録時に利用したセッションの全削除 -->
	<?php unset($_SESSION['customer'])?>

	<style>
        .container1{
    	       color:gray;
    	       margin: 1em 10% 0 10%;
    	       text-align:center;
    	   }

	   	.button1{
    	   width:20%;
    	   margin-bottom:3em;
    	   padding: 0.5em 0em;
    	   font-size:1em;
    	   background-color:black;
    	   color:white;
    	   border-radius:0.5em;
    	   border:0;
	   }

	</style>

<?php require 'old/fotter2.php';?>