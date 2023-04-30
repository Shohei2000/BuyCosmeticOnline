<?php session_start()?>
<?php require 'old/admin-header1.php';?>


	<div class="login-form" style="text-align:center; padding-top:20px; padding-bottom:20px; margin:20px 37%; background:white; border-radius:10px; border:solid; border-color:gray; border-width:1px">
		<p style="font-size:2vw; color:gray; margin:1em 0em;">管理者用ログイン</p>

	<?php
    	unset($_SESSION['customer']);

    	$sql=$pdo->prepare('select * from customer where mail_address=? and pass=?');

    	if(isset($_REQUEST['mail']) && isset($_REQUEST['password'])){

    	    $sql->execute([$_REQUEST['mail'],$_REQUEST['password']]);

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
    	    }

    	    if($_REQUEST['mail']=="" || $_REQUEST['password']==""){
    	        echo   '<label style="font-size:0.7em; color:red;">管理者ID又はパスワードを入力してください。</label>';
    	    }else if(isset($_SESSION['customer'])){// ------------------------------------------------------------------------- ログイン成功時
    	        if(isset($_SESSION['cart'])){
    	            $sql = $pdo -> prepare('insert into cart values(?,?,?)');//追加SQL
    	            foreach ($_SESSION['cart'] as $product_id=>$cart){
    	                $sql -> execute([$_SESSION['customer']['user_id'],$product_id,$cart['quantity']]);
    	            }
    	        }
    	        header('Location: ./A2-1-1.php');

    	    }else{
    	        echo '<label style="font-size:0.7em; color:red;">管理者ID又はパスワードが間違っています。</label>';
    	    }

    	}
	?>

		<form action="A1-1.php" method="post">

			<div class="box" style="padding:0.5em 0em;">
				<div class="box1">
    				<div class="text">管理者ID</div>
        			<input type="text" name="mail" style="width:100%; height:1.5em;"><br>
				</div>
			</div>

			<div class="box" style="padding:0.5em 0em;">
				<div class="box1">
        			<div class="text">パスワード</div>
            		<input type="password" name="password" style="width:100%; height:1.5em;"><br>
				</div>
    		</div>

    		<input class="button" type="submit" value="ログイン" style="margin:2vw; background-color:#0075c2;">

		</form>
	</div><!-- class=login-form -->

	<style>
	.button{
	   width:80%;
	   padding: 0.5em 0em;
	   font-size:1em;
	   background-color:black;
	   color:white;
	   border-radius:0.5em;
	   border:0;
	}

	.box1{
	   width:70%;
	   margin:0 auto;
	}

	.text{
	   color:gray;
	   margin:0;
	   font-size:100%;
	   text-align:left;
	}
	</style>

<?php require 'old/fotter1.php';?>