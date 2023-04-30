    		<table border="1">
    			<tr>
    				<td class="td1">メールアドレス<span style="color:red;">*</span></td>
    				<td class="td2">
    					<div class="table_left">
        					<figure class="validation">
        						<input type="text" name="mail1" id="mail" class="input" size="50"><label class="hide">完成後削除　/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/　styleタグに隠すためのCSSあります</style></label>
    							<figcaption class="absolute"><label id="error_mail" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
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
        					<figure class="validation">
        						<input type="password" name="password1" id="pass" class="input" size="30" style="display: table-cell;">
        						<figcaption class="absolute"><label id="error_pass" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label style="font-size: 0.5rem; color:red; margin:0px; ">半角英小文字大文字数字をそれぞれ1種類以上含み、<br>8文字以上入力してください。※記号使用不可</label>
    						<label class="hide">完成後削除　/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/</label>
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
        					<figure class="validation">
        						<input type="text" name="postcode1" id="postcode1" class="input" size="6">
        						<figcaption class="absolute"><label id="error_postcode1" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label>-</label>
    						<figure class="validation">
    							<input type="text" name="postcode2" id="postcode2" class="input" size="8">
    							<figcaption class="absolute"><label id="error_postcode2" class="error"><span><?php echo $error_msg?></span></label></figcaption>
							</figure>
							<label>○○○-○○○○</label>
							<label class="hide">完成後削除　/^\d{3}$/　ハイフン　/^\d{4}$/</label>
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
        					<figure class="validation">
        						<input type="text" name="phone1" id="phone1" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone1" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label>-</label>
        					<figure class="validation">
        						<input type="text" name="phone2" id="phone2" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone2" class="error"><span><?php echo $error_msg?></span></label></figcaption>
        					</figure>
        					<label>-</label>
        					<figure class="validation">
        						<input type="text" name="phone3" id="phone3" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone3" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label class="hide">完成後削除　/^\d{2,4}$/　ハイフン　/^\d{2,4}$/　ハイフン　/^\d{4}$/</label>
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

		 <script id="rendered-js">

		 //input textのid別正規表現
        const ptn_ary={
            ['mail']:/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/,
            ['pass']:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/,
            ['postcode1']:/^\d{3}$/,
            ['postcode2']:/^\d{4}$/,
            ['phone1']:/^\d{2,4}$/,
            ['phone2']:/^\d{2,4}$/,
            ['phone3']:/^\d{4}$/
        };

 		//各input textに対応したエラーメッセージのid
        const id_ary={
            ['mail']:'#error_mail',
            ['pass']:'#error_pass',
            ['postcode1']:'#error_postcode1',
            ['postcode2']:'#error_postcode2',
            ['phone1']:'#error_phone1',
            ['phone2']:'#error_phone2',
            ['phone3']:'#error_phone3'
        }

        //すべてのバリデーションがtrueになっているか判別する　1=true,0=false
        let flg ={
            ['mail']:1,
            ['pass']:1,
            ['postcode1']:1,
            ['postcode2']:1,
            ['phone1']:1,
            ['phone2']:1,
            ['phone3']:1
        };

        //エラーメッセージの表示
        function showErrMsg(target) {
            target.fadeIn();
            setTimeout(function () {
            	target.fadeOut();
            }, 3000);
        }

		//class="input"の要素がフォーカスを失ったとき実行
        $(".input").on("blur", function () {
            let id = $(this).attr('id');	//フォーカスを失った要素のidを取得
            let ptn = ptn_ary[id];			//取得したidに対応した正規表現を取得
            let error_id = id_ary[id];      //取得したidに対応したエラーメッセージのidを取得
            let input = $(this).val();      //フォーカスを失った要素のValue値を取得
            //value値と正規表現がマッチするか
            if (!ptn.test(input)) {
                //マッチしない
                showErrMsg($(error_id));
                flg[id] = 0; //false
            }else{
                //マッチする
            	flg[id]=1; //true
        	}
		    //flg要素内がすべて「1」か判定
            if(flg['mail']+flg['pass']+flg['postcode1']+flg['postcode2']+flg['phone1']+flg['phone2']+flg['phone3']==7){
                $("#button").prop('disabled',false); //#buttonを無効化
                document.getElementById("button").style.backgroundColor = "#0075c2"; //#buttonの色を変更
            }else{
                $("#button").prop('disabled',true); //#buttonを有効化
                document.getElementById("button").style.backgroundColor = "gray"; //#buttonの色を変更
            }
        });
	</script>

	<style>
        .validation{
            display:inline-block;
            position:relative;
            width:auto;
            height:auto;
            margin:0px;
        }
        .absolute{
            bottom:0px;
        }

        .error{
            display:none;
            position:absolute;
            top:-170%;
            font-size:12px;
            background-color:rgba(255,0,0,0.7);
            color:#fff;
            padding:5px;
            text-align:center;
        }

        .error::before{
            content:"";
            position:absolute;
            bottom:-10px;
            left:10px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 10px 6px 0 6px;
            border-color: rgba(255,0,0,0.7) transparent transparent transparent;
        }

	</style>