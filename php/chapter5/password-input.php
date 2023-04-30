<?php require '../header.php'; ?>
<p>パスワードを入力してください。</p>
<p>（8文字以上で、英小文字、英大文字、数字を各1文字以上含むこと）</p>
<form action="password-output.php" method="post">
<input type="password" name="password">
<input type="submit" value="確定">
</form>
<?php require '../footer.php'; ?>
