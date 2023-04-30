<!-- 変更 -->
<?php session_start();?>
<?php require 'old/header2.php';?>
<!-- 		ユーザIDとパスワードを入力した時の、エラー処理PHP 開始 -->
<?php


                	$sql=$pdo->prepare('select * from customer where mail_address=? and pass=?');

                	if(isset($_REQUEST['cart_mail']) && isset($_REQUEST['cart_password'])){
//                 	    if(isset($_SESSION['customer'])){//すでにログインしていた場合は、一度ログアウトさせる。
//                 	    }

                	    $sql->execute([$_REQUEST['cart_mail'],$_REQUEST['cart_password']]);
                        echo '<div style="text-align:center; color:red;">';
                	    foreach($sql as $row){
                	        $_SESSION['customer']=[
                	            'user_id'=>$row['user_id'],
                	            'pass'=>$row['pass'],
                	            'mail_address'=>$row['mail_address'],
                	            'name'=>$row['name'],
                	            'furigana'=>$row['furigana'],
                	            'gd_class'=>$row['gd_class'],
                	            'birthday'=>$row['birthday'],
                	            'zip_code'=>$row['zip_code'],
                	            'prefecture_id'=>$row['prefecture_id'],
                	            'city'=>$row['city'],
                	            'house_number'=>$row['house_number'],
                	            'building'=>$row['building'],
                	            'tell'=>$row['tell']
                	        ];
                	    }//foreach終了タグ();

                	    if($_REQUEST['cart_mail']=="" || $_REQUEST['cart_password']==""){
                	        echo   '<label style="margin:0;">メールアドレス又はパスワードを入力してください。</label>';
                	    }else if(isset($_SESSION['customer'])){// ------------------------------------------------------------------------- ログイン成功時
                	        if(isset($_SESSION['cart'])){//-------------------------------------------------------------------------------- セッションのカート情報をDBに格納
                	            $sql = $pdo -> prepare('insert into cart values(?,?,?)');//追加SQL
                	            foreach ($_SESSION['cart'] as $product_id=>$cart){
                	                $sql -> execute([$_SESSION['customer']['user_id'],$product_id,$cart['quantity']]);
                	            }
                	        }
                	        echo '<script> location.href="G5-1-3.php" </script>';//ログイン成功時は、次の画面遷移(PHPのheader()が、使えないためJavaScript使用)

                	    }else{
                	        echo '<label style="margin:0;">メールアドレス又はパスワードが間違っています。</label>';
                	    }
                	    echo '</div>';
                	}else{

                	}
?>
<!-- 		ユーザIDとパスワードを入力した時の、エラー処理PHP 終了 -->
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
			<div class="location col-sm-2" style="background-color:hotpink;">
				<i class="fas fa-user-check"></i>
				<label class="location_label">お客様情報</label>
			</div>
			<div class="location col-sm-2">
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
				<p style="margin:0; color:gray; font-size:1.5vw;">お客様情報をご入力ください。すでに会員登録がお済みの方はログインして次にお進みください。</p>
			</div>
		</div>




    	<div class="container1">
			<form action="G5-1-2.php" method="post">
				<div class="div_left">
					<label class="label1">会員の方はこちら▼</label>
				</div>
				<table class="table1" border="1">
        			<tr>
        				<td class="td1">ユーザーID</td>
        				<td class="td2">
        					<div class="table_left">
        						<input type="text" size="50" name="cart_mail">
        					</div>
        				</td>
        			</tr>
        			<tr>
        				<td class="td1">パスワード</td>
        				<td class="td2">
        					<div class="table_left">
        						<input type="password" size="50" name="cart_password">
        					</div>
        				</td>
        			</tr>
				</table>

    			<div class="button_container">
					<input class="button" type="submit" value="次へ" style="width:20%; height:50%;">
    			</div>

			</form>
    	</div><!-- container1終了 -->

    	<div class="container2">
			<form action="G5-1-2.php" method="post">
    			<div class="div_left">
					<label class="label1">会員でない方はこちら▼</label>
				</div>
				<?php require 'form.php';?>
    			<div class="button_container">
    				<input type="hidden" name="success_url" value="G1-2-2.php">
    				<input type="hidden" name="signup" value=1>
    				<input class="button" type="button" onclick="history.back();" value="戻る" style="width:10%; height:50%; ">
					<input class="button" type="submit" value="会員登録しながら次へ" name="check" style="width:20%; height:50%; margin-left:1vw;"><!-- function.php内の、if(isset($_POST['check']))によりfunction check()起動 -->
    			</div>

    		</form>
    	</div><!-- container2終了 -->


	</div><!-- main_container終了 -->


<!-- CSS開始 -->
	<style>
	/* 	   正規表現を消す */
 	   .hide{
  	       display:none;
  	   }

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


/* container開始 */
    .container1,.container2{
        margin:0 10%;
        text-align:center;
    }
    .label1{
        font-size:1.5vw;
        margin:0;
    }
    .div_left{
        text-align:left;
    }
    .button_container{
        height:5vw;
        margin:1vw 0;
        background-color:silver;
        display:flex;
        justify-content:center;
        align-items:center;
    }


/* container終了 */


/* ボタンCSS開始 */
/* button */
    .button {
      width: 100%;

    }
/* ボタンCSS終了 */
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
/* テーブル終了 */
	</style>
<!-- CSS終了 -->

<?php require 'old/fotter2.php';?>