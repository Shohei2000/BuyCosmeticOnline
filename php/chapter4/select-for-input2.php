<?php require '../header.php'; ?>
<p>購入数を選択してください。</p>
<form action="select-for-output.php" method="post">
<select name="count">
<?php
for ($i=0; $i<10; $i++) {
	echo '<option value="', $i, '">', $i, '</option>';
}
?>
</select>
<p><input type="submit" value="確定"></p>
</form>
<?php require '../footer.php'; ?>
