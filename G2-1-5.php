<!-- 変更 -->
<?php session_start();?>

<?php require 'old/header2.php';?>

	   <?php

	       if(isset($_REQUEST['admit'])){//確認ボタンが投下されたら、DBに会員情報を追加する。
	       $sql = $pdo -> prepare('update customer set
                            pass=?,mail_address=?,name=?,furigana=?,gd_class=?,birthday=?,zip_code=?,prefecture_id=?,city=?,house_number=?,building=?,tell=?
                            where user_id=?');

	       $id = $_SESSION['customer']['user_id'];

	       $sql -> execute([$_SESSION['password1'],$_SESSION['mail1'],$_SESSION['name_kanji1']." ".$_SESSION['name_kanji2'],
	           $_SESSION['name_kana1']." ".$_SESSION['name_kana2'],$_SESSION['gd_class'],
	           $_SESSION['birth_year'].$_SESSION['birth_month'].$_SESSION['birth_day'],
	           $_SESSION['zip_code'],$_SESSION['pref_id'],$_SESSION['city'],$_SESSION['house_number'],$_SESSION['building'],$_SESSION['tell'],$id]);


	           $_SESSION['customer']=[
	               'user_id'=>$_SESSION['customer']['user_id'],
	               'pass'=>$_SESSION['password1'],'mail_address'=>$_SESSION['mail1'],
	               'name'=>$_SESSION['name_kanji1']." ".$_SESSION['name_kanji2'],
	               'furigana'=>$_SESSION['name_kana1']." ".$_SESSION['name_kana2'],
	               'gd_class'=>$_SESSION['gd_class'],
	               'birthday'=>$_SESSION['birth_year'].$_SESSION['birth_month'].$_SESSION['birth_day'],
	               'zip_code'=>$_SESSION['zip_code'],'prefecture_id'=>$_SESSION['pref_id'],
	               'city'=>$_SESSION['city'],'house_number'=>$_SESSION['house_number'],
	               'building'=>$_SESSION['building'],'tell'=>$_SESSION['tell']
                ];

// 	          $sql -> execute([$_SESSION['name_kanji1'].$_SESSION['name_kanji2'],$_SESSION['address1'].$_SESSION['address2'].$_SESSION['address3'],$_SESSION['mail1'],
// 	                 $_SESSION['password1'],$_SESSION['birth_year'].$_SESSION['birth_month'].$_SESSION['birth_day'],$_SESSION['postcode'],$_SESSION['phone']]);


    	   }

       ?>

	<div class="container">
		<div class="row">
			<!-- 画面左側のメニュー欄 -->
			<div class="col-2 bg-secondary p-0 justify-content:flex-start; align-items:center;" style="min-height:356.953px;">
				<a href="" class="text-white bg-dark p-3 mb-1" style="text-align: center;">閲覧履歴画面</a>
				<a href="" class="text-white bg-dark p-3 mb-1" style="text-align: center;">注文履歴画面</a>
				<a href="" class="text-white bg-dark p-3 mb-1" style="text-align: center;">カード情報</a>
			</div>
			<div class="col-10">
				<p style="font-size:2em; text-align:center;">編集完了</p>
				<hr>
				<p style="margin-left:1em;">編集完了しました。</p>
				<input class="button w-25" type="button" onclick="location.href='G2-1-1.php'" value="会員情報へ戻る">
			</div>
		</div>
	</div>


	<style>
        a{
            display: block;
        }
        a:hover {
            text-decoration: none;
        }
        .container{
    	       color:gray;
    	       margin: 48px 10% 0 10%;
    	       text-align:center;
    	   }


	</style>

<?php require 'old/fotter2.php';?>