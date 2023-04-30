<!-- 変更 -->
<?php session_start();?>
<?php require 'old/header2.php';?>
<?php
//バリデーションエラーメッセージ
$error_msg="形式が正しく<br>ありません。";
?>

	<div class="main_container container-fulid">

		<div class="row" style="margin:0 10%;">
			<div class="col-sm-12">
				<h4 style="color:gray; margin:0;">Shopping Cart</h4>
			</div>
		</div>
		<div class="location_container row justify-content-center">
			<div class="location col-sm-2">
				<i class="fas fa-shopping-cart"></i>
				<label class="location_label">カート</label>
			</div>
			<div class="location col-sm-2">
				<i class="fas fa-user-check"></i>
				<label class="location_label">お客様情報</label>
			</div>
			<div class="location col-sm-2" style="background-color:hotpink;">
				<i class="fas fa-truck-moving"></i>
				<label class="location_label">発送支払方法</label>
			</div>
			<div class="location col-sm-2">
				<i class="far fa-check-square"></i>
				<label class="location_label">内容確認</label>
			</div>
		</div>
		<div class="row" style="margin:0 10%;">
			<div class="col-sm-12">
				<hr>
			</div>
		</div>
		<div class="row" style="margin:1em 10%;">
			<div class="col-sm-12" style="text-align:center;">
				<p style="margin:0; color:gray; font-size:1.5vw;">配送先を選択してください。次にお支払い方法を選択してください。</p>
			</div>
		</div>

		<form action="G5-1-4.php" method="post">
			<div class="container1">
    			<table class="table1" border="1">
            			<tr>
            				<td class="td1" rowspan="2">発送先</td>
            				<td class="td2">
            					<div class="table_left">
            						<input type="radio" id="close" name="which_address" value="0" onclick="close_hiddenbox()" checked="checked"><label>お客様情報と同じ</label>
            					</div>
            				</td>
            			</tr>
            			<tr>
            				<td class="td2">
            					<div class="table_left">
            						<input type="radio" name="which_address" value="1" onclick="show_hiddenbox()"><label>別の発送先を指定する</label>
            					</div>
            				</td>
            			</tr>
    			</table>


    			<table class="hiddenbox" id="hiddenbox" border="1" style="display:none;"><!-- 通常時は表示しない。発送先蘭の別の発送先を指定するを選択したさいに表示される。 -->
    				<tr>
    					<td class="td1">お名前<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<lable class="name">姓</lable>
        						<input type="text" size="10" name="distination_name_kanji1">
        						<lable class="name">名</lable>
        						<input type="text" size="10" name="distination_name_kanji2">
        					</div>
        				</td>
    				</tr>
    				<tr>
        				<td class="td1">フリガナ<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<lable class="name">姓</lable>
        						<input type="text" size="10" name="distination_name_kana1">
        						<lable class="name">名</lable>
        						<input type="text" size="10" name="distination_name_kana2">
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">郵便番号<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        					<figure class="validation">
        						<input type="text" name="distination_postcode1" id="postcode1" class="input" size="7">
        						<figcaption class="absolute"><label id="error_postcode1" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label>-</label>
    						<figure class="validation">
    							<input type="text" name="distination_postcode2" id="postcode2" class="input" size="8">
    							<figcaption class="absolute"><label id="error_postcode2" class="error"><span><?php echo $error_msg?></span></label></figcaption>
							</figure>
							<label>○○○-○○○○</label>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">都道府県<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<select name="distination_pref_name">
                                    <option value="" selected>都道府県</option>
                                    <option value="北海道">北海道</option>
                                    <option value="青森県">青森県</option>
                                    <option value="岩手県">岩手県</option>
                                    <option value="宮城県">宮城県</option>
                                    <option value="秋田県">秋田県</option>
                                    <option value="山形県">山形県</option>
                                    <option value="福島県">福島県</option>
                                    <option value="茨城県">茨城県</option>
                                    <option value="栃木県">栃木県</option>
                                    <option value="群馬県">群馬県</option>
                                    <option value="埼玉県">埼玉県</option>
                                    <option value="千葉県">千葉県</option>
                                    <option value="東京都">東京都</option>
                                    <option value="神奈川県">神奈川県</option>
                                    <option value="新潟県">新潟県</option>
                                    <option value="富山県">富山県</option>
                                    <option value="石川県">石川県</option>
                                    <option value="福井県">福井県</option>
                                    <option value="山梨県">山梨県</option>
                                    <option value="長野県">長野県</option>
                                    <option value="岐阜県">岐阜県</option>
                                    <option value="静岡県">静岡県</option>
                                    <option value="愛知県">愛知県</option>
                                    <option value="三重県">三重県</option>
                                    <option value="滋賀県">滋賀県</option>
                                    <option value="京都府">京都府</option>
                                    <option value="大阪府">大阪府</option>
                                    <option value="兵庫県">兵庫県</option>
                                    <option value="奈良県">奈良県</option>
                                    <option value="和歌山県">和歌山県</option>
                                    <option value="鳥取県">鳥取県</option>
                                    <option value="島根県">島根県</option>
                                    <option value="岡山県">岡山県</option>
                                    <option value="広島県">広島県</option>
                                    <option value="山口県">山口県</option>
                                    <option value="徳島県">徳島県</option>
                                    <option value="香川県">香川県</option>
                                    <option value="愛媛県">愛媛県</option>
                                    <option value="高知県">高知県</option>
                                    <option value="福岡県">福岡県</option>
                                    <option value="佐賀県">佐賀県</option>
                                    <option value="長崎県">長崎県</option>
                                    <option value="熊本県">熊本県</option>
                                    <option value="大分県">大分県</option>
                                    <option value="宮崎県">宮崎県</option>
                                    <option value="鹿児島県">鹿児島県</option>
                                    <option value="沖縄県">沖縄県</option>
    							</select>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">市区郡町村<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<input type="text" size="30" name="distination_address1">
    							<a>○○市○○区</a>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">番地<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        						<input type="text" size="30" name="distination_address2">
    							<a>○番地○-○</a>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">ビル名</td>
        				<td class="td2">
        					<div class="table_left">
        						<input type="text" size="30" name="distination_address3">
    							<a>○○ビル</a>
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">電話番号<span style="color:red;">*</span></td>
        				<td class="td2">
        					<div class="table_left">
        					<figure class="validation">
        						<input type="text" name="distination_phone1" id="phone1" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone1" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
    						<label>-</label>
        					<figure class="validation">
        						<input type="text" name="distination_phone2" id="phone2" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone2" class="error"><span><?php echo $error_msg?></span></label></figcaption>
        					</figure>
        					<label>-</label>
        					<figure class="validation">
        						<input type="text" name="distination_phone3" id="phone3" class="input" size="10">
        						<figcaption class="absolute"><label id="error_phone3" class="error"><span><?php echo $error_msg?></span></label></figcaption>
    						</figure>
        					</div>
        				</td>
        			</tr>
    			</table>

    			<table class="table2" border="1">
            			<tr>
            				<td class="td1">配送方法</td>
            				<td class="td2">
            					<div class="table_left">
									<select required name="how_deliver">
            							<option value="">--選択--</option>
            							<option value="1">ゆうパック</option>
            							<option value="2">宅急便</option>
    								</select>
            					</div>
            				</td>
            			</tr>
            			<tr>
            				<td class="td1">配送希望日</td>
            				<td class="td2">
            					<div class="table_left">
									<select required name="day_deliver">
            							<?php
            							echo	'<option value="" selected>--選択--</option>';
            							for($i=0; $i<10; $i++){
            							    $date =date("Y-m-d", strtotime("$i day"));

            							    echo    '<option value="',$date ,'">',$date ,'</option>';
            							}
            							?>
    								</select>
            					</div>
            				</td>
            			</tr>
            			<tr>
            				<td class="td1">配送希望時間</td>
            				<td class="td2">
            					<div class="table_left">
									<select required name="time_deliver">
            							<option value="">--選択--</option>
            							<option value="1">9:00〜12:00</option>
            							<option value="2">12:00〜15:00</option>
            							<option value="3">16:00〜18:00</option>
            							<option value="4">19:00〜21:00</option>
    								</select>
            					</div>
            				</td>
            			</tr>
            			<tr style="height:auto;">
            				<td class="td1">支払方法</td>
            				<td class="td2" valign="top">
            					<div class="table_left_top">
            						<p><input id="which_payment" type="radio" name="which_payment" value="1" onclick="close_cards()" checked><label>代金引換</label></p>
            						<p><input id="which_payment" type="radio" name="which_payment" value="2" onclick="show_cards()"><label>カード支払い</label></p>
            						<div id="cards" style="height:auto; margin-left:2vw; display:none;">
										<?php
										$sql=$pdo->prepare('select * from card where user_id = ?');
										$sql -> execute([$_SESSION['customer']['user_id']]);
										foreach($sql as $row){
										    echo '<p><input id="card" type="radio" name="card" value="'?><?php echo $row['card_number']?><?php echo'"><label>'?><?php echo '**** **** **** '.substr($row['card_number'], -4)?><?php echo '</label></p>';
										}
										?>
            						</div>
            					</div>
            				</td>
            			</tr>
    			</table>

    			<table class="table3" border="1">
    				<tr style="height:10vw;">
            				<td class="td1">備考</td>
            				<td class="td2">
            					<div class="table_left">
            						<textarea name="remarks" rows="5" style="width:80%;"></textarea>
            					</div>
            				</td>
            			</tr>
    			</table>
			</div>

			<div class="button_container">
    				<input class="button" type="button" onclick="history.back();" value="戻る" style="width:10%; height:50%; ">
					<input class="button" id="button" type="submit" value="次へ" style="width:20%; height:50%; margin-left:1vw;">
    		</div>

		</form>

	</div><!-- main_container終了 -->

	<script id="rendered-js">

		 //input textのid別正規表現
        const ptn_ary={
            ['postcode1']:/^\d{3}$/,
            ['postcode2']:/^\d{4}$/,
            ['phone1']:/^\d{2,4}$/,
            ['phone2']:/^\d{2,4}$/,
            ['phone3']:/^\d{4}$/
        };

 		//各input textに対応したエラーメッセージのid
        const id_ary={
            ['postcode1']:'#error_postcode1',
            ['postcode2']:'#error_postcode2',
            ['phone1']:'#error_phone1',
            ['phone2']:'#error_phone2',
            ['phone3']:'#error_phone3'
        }

        //すべてのバリデーションがtrueになっているか判別する　1=true,0=false
        let flg ={
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
            if(flg['postcode1']+flg['postcode2']+flg['phone1']+flg['phone2']+flg['phone3']==5){
                $("#button").prop('disabled',false); //#buttonを無効化
                document.getElementById("button").style.backgroundColor = "black"; //#buttonの色を変更
            }else{
                $("#button").prop('disabled',true); //#buttonを有効化
                document.getElementById("button").style.backgroundColor = "gray"; //#buttonの色を変更
            }
        });
        $("#close").on("mouseup",function(){
            $("#button").prop('disabled',false);
            document.getElementById("button").style.backgroundColor = "black"; //#buttonの色を変更
        });
	</script>

<!-- CSS開始 -->
<style>
	.main_container{
	   padding-top:1vw;
	}
/* 	   帯バーCSS開始 */
	   .location_container{
	       margin:0.5vw 0;
	   }
	   .location{
	       height:2.5vw;
	       text-align:center;
	       background-color:gray;
	       border:2px solid lightgray;
	       display: flex;
           justify-content: center;
           align-items: center;
           color:white;
	   }
	   .location_label{
	       font-size:1vw;
            margin:0 0 0 0.3vw;
	   }
	   hr{
	       margin:0;
	   }
	   i{
	       font-size:1.5vw;
	       margin-top:1%;
	   }
/* 	   帯バーCSS終了 */
/* container開始(ページ全体横の余白) */
    .container1,.container2{
        margin:0 10%;
        text-align:center;
    }
/* container終了 */
/* テーブル開始 */
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
	   .table_left{
	       text-align:left;
	       margin-left:1em;
	   }
	   .table_left_top{
	       text-align:left;
	       margin:1em 0 0 1em;
	   }
	   .table2,.table3,.hiddenbox{
	       margin-top:2%;
	   }
/* テーブル終了 */
label{
    margin:0 0 0 0.5vw;
}
/* ボタンコンテイナー開始 */
.button_container{
        height:5vw;
        margin:2vw 10% 0 10%;
        background-color:silver;
        display:flex;
        justify-content:center;
        align-items:center;
    }
/* ボタンコンテイナー終了 */
/* バリデーション開始 */
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
/* バリデーション終了 */
</style>
<!-- CSS終了 -->


<?php require 'old/fotter2.php';?>