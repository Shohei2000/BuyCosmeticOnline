<?php session_start()?>
<?php require 'old/header2.php'; ?>
<?php require 'old/array.php';?>

	<?php
// 	$pref_ary = array('1'=>'北海道','2'=>'青森県','3'=>'岩手県','4'=>'宮城県','5'=>'秋田県','6'=>'山形県','7'=>'福島県','8'=>'茨城県','9'=>'栃木県','10'=>'群馬県','11'=>'埼玉県','12'=>'千葉県','13'=>'東京都','14'=>'神奈川県','15'=>'新潟県','16'=>'富山県','17'=>'石川県','18'=>'福井県','19'=>'山梨県','20'=>'長野県','21'=>'岐阜県','22'=>'静岡県','23'=>'愛知県','24'=>'三重県','25'=>'滋賀県','26'=>'京都府','27'=>'大阪府','28'=>'兵庫県','29'=>'奈良県','30'=>'和歌山県','31'=>'鳥取県','32'=>'島根県','33'=>'岡山県','34'=>'広島県','35'=>'山口県','36'=>'徳島県','37'=>'香川県','38'=>'愛媛県','39'=>'高知県','40'=>'福岡県','41'=>'佐賀県','42'=>'長崎県','43'=>'熊本県','44'=>'大分県','45'=>'宮崎県','46'=>'鹿児島県','47'=>'沖縄県');
// 	$gender_ary = array('0' => '未選択','1' => '男性','2' => '女性');

        $mail=$_SESSION['customer']['mail_address'];
        $password=$_SESSION['customer']['pass'];
        $gender=$gender_ary[$_SESSION['customer']['gd_class']];
        $name=$_SESSION['customer']['name'];
        $birth=date('Y年m月d日',strtotime($_SESSION['customer']['birthday']));
        $postcode=$_SESSION['customer']['zip_code'];
        //ビル名が入力されているかどうかで出力を変える
        if (isset($_SESSION['customer']['building'])) {
            $address=$pref_ary[$_SESSION['customer']['prefecture_id']].','.$_SESSION['customer']['city'].','.$_SESSION['customer']['house_number'].',<br>'.$_SESSION['customer']['building'];
        }else{
            $address=$pref_ary[$_SESSION['customer']['prefecture_id']].','.$_SESSION['customer']['city'].','.$_SESSION['customer']['house_number'];
        }
        $phone=$_SESSION['customer']['tell'];
	?>

	<div class="container mt-5 ">
		<div class="row">
			<!-- 画面左側のメニュー欄 -->
			<div class="col-2 bg-secondary p-0 justify-content:flex-start; align-items:center;" style="min-height:356.953px;">
				<a href="G4-1.php" class="text-white bg-dark p-3 mb-1" style="text-align: center;">閲覧履歴画面</a>
				<a href="G4-2.php" class="text-white bg-dark p-3 mb-1" style="text-align: center;">注文履歴画面</a>
				<a href="" class="text-white bg-dark p-3 mb-1" style="text-align: center;">カード情報</a>
			</div>
			<!-- 画面右側の会員情報表示画面 -->
			<div class="col-10  pl-5">
				<h2>会員情報</h2>
				<table>
					<tr>
						<th>メールアドレス</th>
						<td><?php echo $mail?></td>
					</tr>
					<tr>
						<th>パスワード</th>
						<td><?php echo $password?></td>
					</tr>
					<tr>
						<th>性別</th>
						<td><?php echo $gender?></td>
					</tr>
					<tr>
						<th>お名前</th>
						<td><?php echo $name?></td>
					</tr>
					<tr>
						<th>生年月日</th>
						<td><?php echo $birth?></td>
					</tr>
					<tr>
						<th>郵便番号</th>
						<td><?php echo $postcode?></td>
					</tr>
					<tr>
						<th>住所</th>
						<td><?php echo $address?></td>
					</tr>
					<tr>
						<th>電話番号</th>
						<td><?php echo $phone?></td>
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