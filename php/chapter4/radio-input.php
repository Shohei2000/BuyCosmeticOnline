<?php require '../header.php'; ?>
お食事を選択してください。
<form action="radio-output.php" method="post">
<p><input type="radio" name="meal" value="和食" checked>和食</p>
<p><input type="radio" name="meal" value="洋食">洋食</p>
<p><input type="radio" name="meal" value="中華">中華</p>
<p><input type="submit" value="確定"></p>
</form>
<?php require '../footer.php'; ?>
