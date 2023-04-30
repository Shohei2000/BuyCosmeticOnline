<!-- 変更 -->
<?php session_start()?>
<?php require 'old/header1.php';?>

<?php

//バリデーションエラーメッセージ
$error_msg="形式が正しく<br>ありません。";

?>

	<div class="container1">
		<p style="font-size:2em; text-align:center;">新規登録</p>
		<hr>
		<p style="margin-left:1em;">下記の項目をご入力の上、確認画面へお進みください。</p>
	</div>

	<form action="G1-2-1.php" method="post" name="form">

    	<div class="container2">
    	<?php require 'form.php';?>
    	</div>

    	<div class="container3" style="text-align:center;">
    		<input type="hidden" name="success_url" value="G1-2-2.php">
    		<input type="hidden" name="signup" value=1>
    		<input id="button" class="button" type="submit" value="確認" name="check" style="background-color:#0075c2;"> <!-- function.php内の、if(isset($_POST['check']))によりfunction check()起動 -->
    	</div>
	</form>



                            <!-- デザイン -->
	<style>
/* 	   正規表現を消す */
 	   .hide{
  	       display:none;
  	   }

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


