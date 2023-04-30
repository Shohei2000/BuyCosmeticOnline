<!-- 変更 -->
<?php session_start()?>
<?php require 'old/header2.php'; ?>
<?php require 'old/array.php';?>

	<?php
        $mail=$_SESSION['customer']['mail_address'];
        //パスワードを「＊」に置き換え
        $password=str_repeat("*",mb_strlen($_SESSION['customer']['pass']));
        $gender=$gender_ary[$_SESSION['customer']['gd_class']];
        $name=$_SESSION['customer']['name'];
        $birth=date('Y年m月d日',strtotime($_SESSION['customer']['birthday']));
        $postcode=$_SESSION['customer']['zip_code'];
        //ビル名が入力されているかどうかで出力を変える
        if (isset($_SESSION['customer']['building'])) {
            $address=$pref_ary[$_SESSION['customer']['prefecture_id']].','.$_SESSION['customer']['city'].','.$_SESSION['customer']['house_number'].','.$_SESSION['customer']['building'];
        }else{
            $address=$pref_ary[$_SESSION['customer']['prefecture_id']].','.$_SESSION['customer']['city'].','.$_SESSION['customer']['house_number'];
        }
        $phone=$_SESSION['customer']['tell'];
	?>

	<div class="container mt-5 ">
		<div class="row">
			<!-- 画面左側のメニュー欄 -->
			<div class="col-2 bg-secondary p-0 justify-content:flex-start; align-items:center;" style="height:380.286px;">
				<a href="G4-1.php" class="text-white bg-dark p-3 mb-1" style="text-align: center;">閲覧履歴画面</a>
				<a href="G4-2.php" class="text-white bg-dark p-3 mb-1" style="text-align: center;">注文履歴画面</a>
				<a href="G4-4-1.php" class="text-white bg-dark p-3 mb-1" style="text-align: center;">カード情報</a>
			</div>
			<!-- 画面右側の会員情報表示画面 -->
			<div class="col-10  pl-5">
				<h2>会員情報</h2>
				<table>
					<tr>
						<th>メールアドレス</th>
						<td><?php echo escape($mail);?></td>
					</tr>
					<tr>
						<th>パスワード</th>
						<td><?php echo escape($password);?></td>
					</tr>
					<tr>
						<th>性別</th>
						<td><?php echo $gender?></td>
					</tr>
					<tr>
						<th>お名前</th>
						<td><?php echo escape($name);?></td>
					</tr>
					<tr>
						<th>生年月日</th>
						<td><?php echo $birth?></td>
					</tr>
					<tr>
						<th>郵便番号</th>
						<td><?php echo escape($postcode);?></td>
					</tr>
					<tr>
						<th>住所</th>
						<td><?php echo escape($address);?></td>
					</tr>
					<tr>
						<th>電話番号</th>
						<td><?php echo escape($phone);?></td>
					</tr>
				</table>
				<div class="text-center">
					<button onclick="location.href='G2-1-2.php'" type="button" class="button w-25">編集</button>
				</div>
			</div>
		</div>
	</div>
<?php require 'old/fotter2.php';?>


<style>
th{
    padding-bottom:10px;
    padding-right:10px;
}
td{
    padding-bottom:10px;
}
a{
    display: block;
}
a:hover {
  text-decoration: none;
}

</style>