<?php require 'template/header.php';?>
<?php require 'template/menu.php';?>

	<div class="login-form" style="text-align:center; padding-top:40px; padding-bottom:40px; margin:10px 90px; background:#87cefa;">
		<form action="Mainpage.php" method="post">
		ログイン名<input type="text" name="login"><br>
		パスワード<input type="text" name="password"><br>
		<input type="submit" value="ログイン" style="width:150px; color:blue;">
		</form>
	</div>


<?php require 'template/fotter.php';?>