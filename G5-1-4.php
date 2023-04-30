<?php session_start();?>
<?php require 'old/header2.php';?>
<?php require 'old/array.php';?>

<?php
    //配送先が同じだったらSESSIONから、違う場合はREQUESTから 新しくSESSIONに格納する。
    if($_REQUEST['which_address']=="1"){
        $_SESSION['ship_address'] = $_REQUEST['distination_pref_name']."".$_REQUEST['distination_address1']."".$_REQUEST['distination_address2']."".$_REQUEST['distination_address3'].'';
    }else{
        $_SESSION['ship_address'] = $pref_ary[$_SESSION['customer']['prefecture_id']]."".$_SESSION['customer']['city']."".$_SESSION['customer']['house_number']."".$_SESSION['customer']['building'];
    }

    $_SESSION['ship_method_id']=$_REQUEST['how_deliver'];
    $_SESSION['ship_day']=$_REQUEST['day_deliver'];
    $_SESSION['ship_time']=$time_deliver_ary[$_REQUEST['time_deliver']];
    $_SESSION['pay_method_id']=$_REQUEST['which_payment'];
    $_SESSION['note']=$_REQUEST['remarks'];
?>

	<div class="main_container container-fulid">

        <!-- 帯バー部分開始 -->
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
			<div class="location col-sm-2">
				<i class="fas fa-truck-moving"></i>
				<label class="location_label">発送支払方法</label>
			</div>
			<div class="location col-sm-2" style="background-color:hotpink;">
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
				<p style="margin:0; color:gray; font-size:1.5vw;">ご注文内容にお間違いがないかご確認ください。</p>
			</div>
		</div>

		<div class="container1">
			<table class="table1" border="1">
    			<tr class="backcolor1">
    				<td style="width:5%; font-weight:bold;">No.</td>
    				<td style="width:20%; font-weight:bold;"></td>
    				<td style="width:35%; font-weight:bold;">商品名</td>
    				<td style="width:10%; font-weight:bold;">単価</td>
    				<td style="width:10%; font-weight:bold;">数量</td>
    				<td style="width:18%; font-weight:bold;">金額</td>
    				<td style="width:2%; font-weight:bold;"></td>
    			</tr>
    			<!-- 商品表示欄開始 -->
    			<?php
    			if(isset($_SESSION['customer'])){
    			    $sql = "select * from cart as Cart
                                        	inner join
                                            	customer as Customer
                                                 on Cart.user_id = Customer.user_id
                                        	inner JOIN
                                            	product as Product
                                              	 on Cart.product_id = Product.product_id
                                           	inner JOIN
                                            	series as Series
                                                 on Product.series_id = Series.series_id
                                            where Cart.user_id = ?;";
    			    $sql = $pdo->prepare($sql);
    			    $sql -> execute([$_SESSION['customer']['user_id']]);
    			    $countnumber = 1;
    			    $totalcost = 0;

    			    foreach($sql as $row){
                        $totalcost+=$row['price']*$row['quantity'];
    			        echo '<tr>';
    			        echo '<td style="width:5%;">'?> <?php echo $countnumber; ?> <?php echo '</td>';
    			        echo '<td style="width:20%;"><img class="item_image" src="'?> <?php echo $row['image_path_1']; ?> <?php echo '" style="height:7vw; border:1px solid gray;"></td>';
    			        echo '<td style="width:35%;">'?> <?php echo $row['product_name']; ?> <?php echo '</td>';
    			        echo '<td style="width:10%;">'?> <?php echo $row['price']; ?> <?php echo '</td>';
    			        echo '<td style="width:10%;">'?> <?php echo $row['quantity']; ?> <?php echo '</td>';
    			        echo '<td style="width:18%;">'?> <?php echo $row['price']*$row['quantity']; ?> <?php echo '</td>';
    			        echo '<td style="width:2%;"></td>';
    			        echo '</tr>';
    			        $countnumber++;
    			    }
    			}
    			?>
    			<!-- 商品表示欄終了 -->
    			<tr class="backcolor1">
    				<td colspan="5" style="width:5%; text-align:right; padding-right:1vw;">商品合計</td>
    				<td style="width:18%; color:hotpink;"><?php echo '¥'.$totalcost; ?></td>
    				<td style="width:2%;"></td>
    			</tr>
    			<tr>
    				<td colspan="5" style="width:5%; text-align:right; padding-right:1vw;">送料</td>
    				<td style="width:18%;">¥360</td>
    				<td style="width:2%;"></td>
    			</tr>
    			<tr class="backcolor1">
    				<td colspan="5" style="width:5%; text-align:right; padding-right:1vw;">総合計金額</td>
    				<td style="width:18%; color:hotpink;"><?php echo '¥'.($totalcost+360); ?></td>
    				<td style="width:2%;"></td>
    			</tr>
			</table>
		</div>

		<div class="container2">
			<table border="1">
				<tr>
					<td class="backcolor2" colspan="2" style="text-align:left; padding-left:1vw;">お支払い情報</td>
    			</tr>
    			<tr>
    				<td class="td1">メールアドレス</td>
    				<td><?php echo $_SESSION['customer']['mail_address'];?></td>
    			</tr>
    			<tr>
    				<td class="td1">お名前</td>
    				<td><?php echo $_SESSION['customer']['name'];?></td>
    			</tr>
    			<tr>
    				<td class="td1">フリガナ</td>
    				<td><?php echo $_SESSION['customer']['furigana'];?></td>
    			</tr>
    			<tr>
					<td class="backcolor2" colspan="2" style="text-align:left; padding-left:1vw;">配送先情報</td>
    			</tr>
    			<tr>
    				<td class="td1">お電話番号</td>
    				<td><?php if($_REQUEST['which_address']=="1"){echo $_REQUEST['distination_phone'];}else echo $_SESSION['customer']['tell'];?></td>
    			</tr>
    			<tr>
    				<td class="td1">ご住所</td>
    				<td><?php echo $_SESSION['ship_address'];?></td>
    			</tr>
    			<tr>
					<td class="backcolor2" colspan="2" style="text-align:left; padding-left:1vw;">その他</td>
    			</tr>
    			<tr>
    				<td class="td1">配送方法</td>
    				<td><?php echo $how_deliver_ary[$_SESSION['ship_method_id']];?></td>
    			</tr>
    			<tr>
    				<td class="td1">配送希望日</td>
    				<td><?php echo $_SESSION['ship_day'];?></td>
    			</tr>
    			<tr>
    				<td class="td1">配達希望時間</td>
    				<td><?php echo $_SESSION['ship_time'];?></td>
    			</tr>
    			<tr>
    				<td class="td1">支払方法</td>
    				<td><?php echo $which_payment_ary[$_SESSION['pay_method_id']];?></td>
    			</tr>
    			<tr>
    				<td class="td1">カード番号</td>
    				<td><?php if($_SESSION['pay_method_id']=="2"){echo '**** **** **** '.substr($_REQUEST['card'], -4);};?></td>
    			</tr>
    			<tr>
    				<td class="td1">備考</td>
    				<td><?php echo $_REQUEST['remarks'];?></td>
    			</tr>
			</table>
		</div>

		<div class="button_container">
			<div class="row w-50">
				<div class="col-sm-6">
					<input class="button" type="button" onclick="history.back();" value="戻る">
				</div>

				<div class="col-sm-6">
					<!-- モータルウィンドウ -->
                    <div class="content">
                    		<input class="button js-modal-open" type="button" value="次へ">
                        </div>

                        <div class="modal js-modal">
                        	<form action="order-insert.php" method="post">
                            	<div class="modal__bg js-modal-close"></div><!-- モーダルウィンドウの外を暗くする -->
                                    <div class="modal__content">
                                        <h2>アンケート</h2>
                                        <hr>
                                        <p style="margin:0;">アンケートのご協力をお願い致します。<br>プレゼントにする個数を選んでください。</p>
                                        <?php
                                        $sql = "select * from cart as Cart
                                        	inner join
                                            	customer as Customer
                                                 on Cart.user_id = Customer.user_id
                                        	inner JOIN
                                            	product as Product
                                              	 on Cart.product_id = Product.product_id
                                           	inner JOIN
                                            	series as Series
                                                 on Product.series_id = Series.series_id
                                            where Cart.user_id = ?;";
                                        $sql = $pdo->prepare($sql);
                                        $sql -> execute([$_SESSION['customer']['user_id']]);
                                        foreach($sql as $row){
                                            $product_id = $row['product_id'];
                                            $product_name = $row['product_name'];
                                            $image_path_1 = $row['image_path_1'];
                                            $quantity = $row['quantity'];

                                            //セレクトボックスでプレゼント? out of ? で追加の方が望ましい(by 山口)
                                            echo '<div class="row" style="margin-top:1vw; height:7vw;">';

                                                echo '<div class="col-sm-2 h-100">';
                                                    echo '<div style="width:100%;">';
    				                                    echo '<img class="item_image" src="'?> <?php echo $image_path_1; ?> <?php echo '" style="height:7vw; border:1px solid gray;">';
                                                    echo '</div>';
    				                            echo '</div>';//col-sm-2 end-tag

                                                echo '<div class="col-sm-5 h-100"  style="display:flex; align-items:center; justify-content:flex-start;">';
                                                    echo '<div>';
                                                        echo '<p style="font-size:1vw; margin:0;">',$product_name,'</p>';
                                                        echo '<select name="present-qty',$product_id,'" style="width:5vw; height:2vw; font-size:1vw;">';
                                                            for($i = 0; $i<=$quantity; $i++){
                                                                echo '<option>',$i,'</option>';
                                                            }
                                                        echo '</select>';
                                                    echo '</div>';
                                                echo '</div>';//col-sm-5 end-tag

                                            echo '</div>';//row end-tag
                                        }

                                        ?>
                            			<br>

                                        <div class="modal-footer" style="text-align:right;">
                                                <button class="button btn btn-primary w-25" type="submit">OK</button>
                                                <button class="button2 btn btn-warning w-25" type="button">Cancel</button>
                            			</div>
    								</div><!--modal__inner-->
                        	</form>
                        </div><!--modal-->
                    <!-- モータルウィンドウ -->
				</div>

			</div>

    	</div>

	</div>


<style>
/* 	メインCSS開始 */
	   .main_container{
	       padding:1vw 0;
	   }
/*  メインCSS終了 */
/* container開始(ページ全体横の余白) */
    .container1,.container2{
        margin:0 10%;
        text-align:center;
    }
/* container終了 */
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
/* ボタンCSS開始 */
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
	   .container2{
	       margin-top:2%;
	   }
	   .backcolor1{
	       background-color:gainsboro;
	   }
	   .backcolor2{
	       background-color:#666666;
	       color:white;
	   }
/* テーブル終了 */

/* モータルウィンドウCSS開始 */
*{
    margin: 0;
    padding: 0;
}
.modal{
    display: none;
    height: 100vh;
    position: fixed;
    top: 0;
    width: 100%;
}
.modal__bg{
    background: rgba(0,0,0,0.8);
    height: 100vh;
    position: absolute;
    width: 100%;
}
.modal__content{
    background: #fff;
    left: 50%;
    padding: 40px;
    position: absolute;
    top: 50%;
    transform: translate(-50%,-50%);
    width: 60%;
}
/* モータルウィンドウCSS終了 */
.radio{
    margin:1vw 0;
}
</style>

<?php require 'old/fotter2.php';?>