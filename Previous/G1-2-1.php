<?php session_start()?>
<?php require 'old/header1.php';?>

	<div class="container1">
		<p style="font-size:2em; text-align:center;">新規登録</p>
		<hr>
		<p style="margin-left:1em;">下記の項目をご入力の上、確認画面へお進みください。</p>
	</div>

	<form action="G1-2-2.php" method="post" name="form">
    	<div class="container2">

    	<?php
//     	   unset($_REQUEST['mail1']);
    	?>

    		<table border="1">
    			<tr>
    				<td class="td1">メールアドレス<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="50" name="mail1">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">メールアドレス(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="50" name="mail2">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="password" size="30" name="password1">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">パスワード(確認用)<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="password" size="30" name="password2">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">お名前<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<lable class="name">姓</lable>
    						<input type="text" size="10" name="name_kanji1">
    						<lable class="name">名</lable>
    						<input type="text" size="10" name="name_kanji2">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">フリガナ<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<lable class="name">姓</lable>
    						<input type="text" size="10" name="name_kana1">
    						<lable class="name">名</lable>
    						<input type="text" size="10" name="name_kana2">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">生年月日<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<select name="birth_year">
    							<?php
    					         echo	'<option value="" selected>西暦</option>';
    							 $i=1920;
    							 while($i<=2020){
    						     echo    '<option value="', $i ,'">', $i, '</option>';
    							 $i++;
    							 }
    							?>
    						</select>
    						<a>年</a>
    						<select name="birth_month">
    							<?php
    							 echo	'<option value="" selected></option>';
    							 $i=1;
    							 while($i<=12){
    							    echo    '<option value="', $i,'">', $i,'</option>';
    							    $i++;
    							 }
    							?>
    						</select>
    						<a>月</a>
    						<select name="birth_day">
    							<?php
    							echo	'<option value="" selected></option>';
    							 $i=1;
    							 while($i<=31){
    							    echo    '<option value="', $i,'">', $i,'</option>';
    							    $i++;
    							 }
    							?>
    						</select>
    						<a>日</a>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">郵便番号<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="20" name="postcode1">
    						<lable>-</lable>
    						<input type="text" size="20" name="postcode2">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">都道府県<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<select name="pref_id">
                                <option value="" selected>都道府県</option>
                                <option value="1">北海道</option>
                                <option value="2">青森県</option>
                                <option value="3">岩手県</option>
                                <option value="4">宮城県</option>
                                <option value="5">秋田県</option>
                                <option value="6">山形県</option>
                                <option value="7">福島県</option>
                                <option value="8">茨城県</option>
                                <option value="9">栃木県</option>
                                <option value="10">群馬県</option>
                                <option value="11">埼玉県</option>
                                <option value="12">千葉県</option>
                                <option value="13">東京都</option>
                                <option value="14">神奈川県</option>
                                <option value="15">新潟県</option>
                                <option value="16">富山県</option>
                                <option value="17">石川県</option>
                                <option value="18">福井県</option>
                                <option value="19">山梨県</option>
                                <option value="20">長野県</option>
                                <option value="21">岐阜県</option>
                                <option value="22">静岡県</option>
                                <option value="23">愛知県</option>
                                <option value="24">三重県</option>
                                <option value="25">滋賀県</option>
                                <option value="26">京都府</option>
                                <option value="27">大阪府</option>
                                <option value="28">兵庫県</option>
                                <option value="29">奈良県</option>
                                <option value="30">和歌山県</option>
                                <option value="31">鳥取県</option>
                                <option value="32">島根県</option>
                                <option value="33">岡山県</option>
                                <option value="34">広島県</option>
                                <option value="35">山口県</option>
                                <option value="36">徳島県</option>
                                <option value="37">香川県</option>
                                <option value="38">愛媛県</option>
                                <option value="39">高知県</option>
                                <option value="40">福岡県</option>
                                <option value="41">佐賀県</option>
                                <option value="42">長崎県</option>
                                <option value="43">熊本県</option>
                                <option value="44">大分県</option>
                                <option value="45">宮崎県</option>
                                <option value="46">鹿児島県</option>
                                <option value="47">沖縄県</option>
					</select>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">市区郡町村<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="30" name="address1">
							<a>○○市○○区</a>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">番地<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="30" name="address2">
							<a>○番地○-○</a>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">ビル名</td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="30" name="address3">
							<a>○○ビル</a>
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">電話番号<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
    						<input type="text" size="30" name="phone1">
    						<input type="text" size="30" name="phone2">
    						<input type="text" size="30" name="phone3">
    					</div>
    				</td>
    			</tr>
    			<tr>
    				<td class="td1">性別</td>
    				<td class="td2">
    					<div class="table_left">
    						<a><input type="radio" name="gender" value="0" checked="checked">未選択</a>
        					<a style="margin:0 1em;"><input type="radio" name="gender" value="1">男性</a>
        					<a><input type="radio" name="gender" value="2">女性</a>
    					</div>
    				</td>
    			</tr>
    		</table>
    	</div>

    	<div class="container3" style="text-align:center;">
    		<input class="button" type="submit" value="確認" style="background-color:#0075c2;" onclick="return check();">
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

	   	.button{
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