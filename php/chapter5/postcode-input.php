<?php require '../header.php'; ?>
<p>7桁の郵便番号をハイフンなしで入力してください。</p>
<form action="postcode-output.php" method="post">
<input type="text" name="postcode">
<input type="submit" value="確定">
</form>
<?php require '../footer.php'; ?>
