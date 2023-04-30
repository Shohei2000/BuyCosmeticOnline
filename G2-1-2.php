<!-- 変更 -->
<?php session_start()?>

<?php

//エラー処理
$error_message = "";
if(isset($_POST['next'])){
    if($_POST['pass'] == ""){
        $error_message = "※パスワードを入力してください。";
    }elseif($_POST['pass'] != $_SESSION['customer']['pass']){
        $error_message = "※パスワードが間違っています。";
    }else{
        $success_url="G2-1-3.php";
        header("Location: {$success_url}");
    }

}
?>
<?php require 'old/header2.php'; ?>

	<div class="container mt-5 ">
		<div class="row">
			<!-- 画面左側のメニュー欄 -->
			<div class="col-2 bg-secondary p-0 justify-content:flex-start; align-items:center;" style="height:380.286px;">
				<a href="G4-1.php" class="text-white bg-dark p-3 mb-1" style="text-align: center;">閲覧履歴画面</a>
				<a href="G4-2.php" class="text-white bg-dark p-3 mb-1" style="text-align: center;">注文履歴画面</a>
				<a href="" class="text-white bg-dark p-3 mb-1" style="text-align: center;">カード情報</a>
			</div>
			<!-- 画面右側のパスワード入力画面 -->
			<div class="col-10 px-5">
				<h2>会員情報</h2>
				<div class="text-center mt-5">
					<h6>パスワードを入力してください</h6>
					<?php echo '<p class="bg-danger text-white">'.$error_message.'</p>'; //エラーの場合表示 ?>
					<form action="G2-1-2.php" method="post">
						<input type="password" size="30" name="pass"><br>
						<input type="submit" class="button mt-2 w-25" name="next" value="次へ">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php require 'old/fotter2.php';?>

<style>
a{
    display: block;
}
a:hover {
  text-decoration: none;
}

</style>