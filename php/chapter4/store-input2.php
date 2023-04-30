<?php require '../header.php'; ?>
<p>店舗を選択してください。</p>
<form action="store-output.php" method="post">
<select name="code">
<?php
$store=[
	'新宿'=>100, '秋葉原'=>101, '上野'=>102, '横浜'=>200, '川崎'=>201, 
	'札幌'=>300, '仙台'=>400, '名古屋'=>500, '京都'=>600, '博多'=>700
];
foreach ($store as $key=>$value) {
	echo '<option value="', $value, '">', $key, '</option>';
}
?>
</select>
<p><input type="submit" value="確定"></p>
</form>
<?php require '../footer.php'; ?>
