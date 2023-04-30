<?php session_start()?>
<?php require 'old/header1.php';?>
<?php require 'old/array.php';?>
	<?php

// 	$pref_ary = array('1'=>'北海道','2'=>'青森県','3'=>'岩手県','4'=>'宮城県','5'=>'秋田県','6'=>'山形県','7'=>'福島県','8'=>'茨城県','9'=>'栃木県','10'=>'群馬県','11'=>'埼玉県','12'=>'千葉県','13'=>'東京都','14'=>'神奈川県','15'=>'新潟県','16'=>'富山県','17'=>'石川県','18'=>'福井県','19'=>'山梨県','20'=>'長野県','21'=>'岐阜県','22'=>'静岡県','23'=>'愛知県','24'=>'三重県','25'=>'滋賀県','26'=>'京都府','27'=>'大阪府','28'=>'兵庫県','29'=>'奈良県','30'=>'和歌山県','31'=>'鳥取県','32'=>'島根県','33'=>'岡山県','34'=>'広島県','35'=>'山口県','36'=>'徳島県','37'=>'香川県','38'=>'愛媛県','39'=>'高知県','40'=>'福岡県','41'=>'佐賀県','42'=>'長崎県','43'=>'熊本県','44'=>'大分県','45'=>'宮崎県','46'=>'鹿児島県','47'=>'沖縄県');
// 	$gender_ary = array('0' => '未選択','1' => '男性','2' => '女性'	);

	$_SESSION['mail1']=$_REQUEST['mail1'];
	$_SESSION['mail2']=$_REQUEST['mail2'];
	$_SESSION['password1']=$_REQUEST['password1'];
	$_SESSION['password2']=$_REQUEST['password2'];
	$_SESSION['name_kanji1']=$_REQUEST['name_kanji1'];
	$_SESSION['name_kanji2']=$_REQUEST['name_kanji2'];
	$_SESSION['name_kana1']=$_REQUEST['name_kana1'];
	$_SESSION['name_kana2']=$_REQUEST['name_kana2'];
	//誕生日
	$_SESSION['birth_year']=$_REQUEST['birth_year'];
	if(strlen($_REQUEST['birth_month'])==1){//誕生日月を2文字にする
	    $_SESSION['birth_month']='0'.$_REQUEST['birth_month'];
	}else{
	    $_SESSION['birth_month']=$_REQUEST['birth_month'];
	}

	if(strlen($_REQUEST['birth_day'])==1){//誕生日日を2文字にする
	    $_SESSION['birth_day']='0'.$_REQUEST['birth_day'];
	}else{
	    $_SESSION['birth_day']=$_REQUEST['birth_day'];
	}
	$_SESSION['zip_code']=$_REQUEST['postcode'];
	$_SESSION['pref_id']=$_REQUEST['pref_id'];
	$_SESSION['city']=$_REQUEST['address1'];
	$_SESSION['house_number']=$_REQUEST['address2'];
	$_SESSION['building']=$_REQUEST['address3'];
	$_SESSION['tell']=$_REQUEST['phone'];
	$_SESSION['gd_class']=$_REQUEST['gender'];
	?>

	<div class="container1">
		<p style="font-size:2em; text-align:center;">確認</p>
		<hr>
		<p style="margin-left:1em;">下記の項目をご確認の上、確定画面へお進みください。</p>
	</div>

	<form action="G2-1-5.php" method="post">
    	<div class="container2">
    		<table border="1">
    			<tr>
    				<td class="td1">メールアドレス<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							     echo    $_SESSION['mail1'];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">メールアドレス(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php
    						echo    $_SESSION['mail2'];
    						?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php
    						echo    $_SESSION['password1'];
    						?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php
    						echo    $_SESSION['password2'];
    						?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">お名前<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $_SESSION['name_kanji1'],"　",$_SESSION['name_kanji2'];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">フリガナ<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $_SESSION['name_kana1'],"　",$_SESSION['name_kana2'];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">生年月日<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $_SESSION['birth_year'],"年",$_SESSION['birth_month'],"月",$_SESSION['birth_day'],"日";
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">郵便番号<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $_SESSION['zip_code'];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">都道府県<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $pref_ary[$_SESSION['pref_id']];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">市区郡町村<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $_SESSION['city'];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">番地<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $_SESSION['house_number'];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">ビル名</td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $_SESSION['building'];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">電話番号<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $_SESSION['tell'];
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">性別</td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo    $gender_ary[$_SESSION['gd_class']];
							?>
    					</div>
    				</td>
    			</tr>

    		</table>
    	</div>

    	<div class="container3" style="text-align:center;">
			<input class="button1" type="button" onclick="history.back();" value="戻る" style="background-color:#0068b7;">
    		<input class="button2" type="submit" value="確認" name="admit" style=" background-color:#0075c2;">
    	</div>
	</form>

                            <!-- デザイン -->
	<style>
	   .container1{
	       color:gray;
	       margin: 1em 10% 0 10%;
	   }

	   .container2{
	       text-align:center;
	       margin:0 10%;
	   }

	   .container3{
	       margin:3em 0 3em 0;
	   }

        table{
            width:100%;
        }

        td{
            height:2.5em;
        }

	   .td1{
	       width:30%;
	       text-align:center;
	       background-color:silver;
	   }

	   .td2{
	       width:70%;
	   }

	   	.button1,.button2{
    	   width:20%;
    	   padding: 0.5em 0em;
    	   font-size:1em;
    	   background-color:black;
    	   color:white;
    	   border-radius:0.5em;
    	   border:0;
	   }

	   .table_left{
	       text-align:left;
	       margin-left:1em;
	   }

	   .name{
	       margin:0 0.5em;
	   }

	</style>

<?php require 'old/fotter2.php';?>
