<!-- 変更 -->
<?php session_start()?>
<?php require 'old/header1.php';?>
<?php require 'old/array.php';?>

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
							echo escape(    $_SESSION['mail1']);
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">メールアドレス(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php
    						echo escape(    $_SESSION['mail2']);
    						?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php
    						echo escape(    $_SESSION['password1']);
    						?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<?php
    						echo escape(    $_SESSION['password2']);
    						?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">お名前<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo escape(    $_SESSION['name_kanji1'])," ", escape($_SESSION['name_kanji2']);
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">フリガナ<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo escape(    $_SESSION['name_kana1'])," ",escape($_SESSION['name_kana2']);
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
							echo escape(    $_SESSION['zip_code']);
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
							echo escape(    $_SESSION['city']);
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">番地<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo escape(    $_SESSION['house_number']);
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">ビル名</td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo escape(    $_SESSION['building']);
							?>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">電話番号<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
							<?php
							echo escape(    $_SESSION['tell']);
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
