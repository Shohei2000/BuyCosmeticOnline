    <?php
$name = $_FILES['userfile']['name'];
$len = strlen($name);

// バリデーション
if (mb_check_encoding($name, 'UTF-8') === FALSE) {
    trigger_error('Invalid encoding', E_USER_ERROR);
}
for($i = 0, $dot = 0, $slash = 0; $i< $len; $i++) {
    $v = ord($name[$i]);
    if ($v < 0x20) { //スペース未満
        trigger_error('Invalid input - '.$v, E_USER_ERROR);
    } else if ($v == 0x2e) { //ドット
        $dot++;
        if ($dot > 1) trigger_error('Invalid input - multiple dots', E_USER_ERROR);
    } else if ($v == 0x2f || $v == 0x5c) { //スラッシュ
        trigger_error('Invalid input - '.$v, E_USER_ERROR);
    }
}


// ファイルを保存
if (move_uploaded_file($_FILES['userfile']['tmp_name'], '/path/to/upload-dir/'.$name) === FALSE) {
    trigger_error('Failed to move uploaded file. Possible attack.', E_USER_ERROR);
}
?>