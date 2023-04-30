<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title></title>

    <script type="text/javascript" src="./old/footerFixed.js"></script><!-- footer用JavaScript -->

    <script type="text/javascript">

    		function check(){//必須項目が空白だった場合に、エラーメッセージ

        		if(form.mail1.value != form.mail2.value && form.password1.value != form.password2.value){
            		alert("確認用メールアドレスと一致しません。\n確認用パスワードと一致しません。");
        		}else if(form.mail1.value != form.mail2.value){
            		alert("確認用メールアドレスと一致しません。");
        		}else if(form.password1.value != form.password2.value){
            		alert("確認用パスワードと一致しません。");
        		}

    			if(form.mail1.value == "" || form.mail2.value == "" || form.password1.value =="" || form.password2.value == "" ||
        	    		form.name_kanji1.value == "" || form.name_kanji2.value == "" || form.name_kana1.value == "" || form.name_kana2.value == "" ||
        	    		form.birth_year.value == "" || form.birth_month.value == "" || form.birth_day.value == "" || form.postcode.value == "" ||
        	    		form.pref_id.value == "" || form.address1.value == "" || form.address2.value == "" || form.phonenumber.value == ""){
    				alert("必須項目を全て入力してください。");
    				return false;
    			}else{
    				return true;
    			}
    		}

//     		function add(){//DBに会員情報を登録
        		<?php
//         		$pdo = new PDO('mysql:host=localhost; dbname=shop; charset=utf8','staff','password');
//         		$sql = $pdo -> prepare('insert into customer values(null,?,?,?,?,?,?,?)');

//         		$sql -> execute([$_POST['name_kanji1'].$_POST['name_kanji2'],$_POST['address1'].$_POST['address2'].$_POST['address3'],$_POST['mail1'],
//         		    $_POST['password1'],$_POST['birth_year'].$_POST['birth_month'].$_POST['birth_day'],$_POST['postcode'],$_POST['phone']]);
//         		?>
//         		return true;
//     		}

    </script>
</head>
<body>

	<div class="header" style="height:50px; background:black">
    	<div style="text-align:center;">
       		<a href="Mainpage.php"><img src="/Kouki2/Sample/image/logo_icon2.PNG" alt="Logo" name="logo" style="height:80px; margin-top:-10px;"></a>
    	</div>
	</div>

<?php
    $pdo = new PDO('mysql:host=localhost; dbname=we will shopping; charset=utf8','root');
?>