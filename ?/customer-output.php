<?php session_start();?>

<?php require '../template/header.php';?>

<?php

    $pdo=new PDO('mysql:host=localhost; dbname=shop; charset=utf8','staff','password');//DBに接続

    if(isset($_SESSION['customer'])){//セッションがある場合(ログインしている)
        $id=$_SESSION['customer']['id'];
        $sql=$pdo->prepare('select * from customer where id!=? and login=?');//本人以外で同じログイン名を使っている人
        $sql->execute([$id,$_REQUEST['login']]);
    }else{                           //セッションがない場合(ログインしていない)
        $sql=$pdo->prepare('select * from customer where login=?');//同じログイン名を使っている人
        $sql->execute([$_REQUEST['login']]);
    }

    if(empty($sql->fetchAll())){//検索結果が空 かつ ログイン名が重複していないか
        if(isset($_SESSION['customer'])){//セッションがある場合(ログインしている)

            $sql=$pdo->prepare(' update customer set name=?, address=?,'.'login=?,password=? where id=?');//更新SQL

            $sql->execute([$_REQUEST['name'],$_REQUEST['address'],
                            $_REQUEST['login'],$_REQUEST['password'],$id]);

            $_SESSION['customer']=['id'=>$id,
                                        'name'=>$_REQUEST['name'],
                                        'address'=>$_REQUEST['address'],
                                        'login'=>$_REQUEST['login'],
                                        'password'=>$_REQUEST['password']];
            echo 'お客様情報を更新しました。';

        }else{                           //セッションがない場合
            $sql=$pdo->prepare('insert into customer values(null,?,?,?,?,null,null,null)');//追加SQL

            $sql->execute([$_REQUEST['name'],$_REQUEST['address'],$_REQUEST['login'],$_REQUEST['password']]);

            echo 'お客様情報を登録しました。';
        }
    }else{//ログイン名に被りがある場合
        echo 'ログイン名がすでに使用されていますので、変更してください。';
    }
?>

<?php require '../template/fotter.php';?>