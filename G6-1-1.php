<?php session_start()?>
<?php require 'old/header2.php';?>

<?php
    $sql=$pdo->prepare('select * from product where product_id=?');
    $sql->execute([$_GET['product_id']]);

    foreach($sql as $row){
        $_SESSION['product_name']=$row['product_name'];
        $_SESSION['image_path_1']=$row['image_path_1'];
    }

    // $_REQUEST['product_name']=$product_name;
?>


<div class="main-container" style="margin:0 5%;">
    <div class="row">
        <div class="col-sm-12" style="margin:1vw 0;">
            <label class="font-size15" style="font-weight:bold;">この商品をレビュー</label>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
        <!-- 商品アイコン -->
            <div style="width:100%; height:100%;">
                <img src="<?php echo $_SESSION['image_path_1'];?>" style="width:100%; border:1px solid black;">
            </div>
        </div>
        <div class="col-sm-10">
        <label><?php echo $_SESSION['product_name'];?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <hr>
        </div>
    </div>

<form action="G6-1-2.php" method="post" style="margin:0 10%;">
    <div style="border:1px solid black;">
    <div style="margin:2% 2%">
        <div class="row">
            <div class="col-sm-12">
                <label class="font-size15">総合評価</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="margin:1vw 1.5vw;">
            	<span class="star-rating">
                  <input id="radio-star" type="radio" name="rating" value="1" onclick="sample()"><i></i>
                  <input id="radio-star" type="radio" name="rating" value="2" onclick="sample()"><i></i>
                  <input id="radio-star" type="radio" name="rating" value="3" onclick="sample()"><i></i>
                  <input id="radio-star" type="radio" name="rating" value="4" onclick="sample()"><i></i>
                  <input id="radio-star" type="radio" name="rating" value="5" onclick="sample()"><i></i>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="reviewtitle">レビュータイトル</label>
                    <input type="text" id="reviewtitle" name="reviewtitle"  max="20" required="required" class="form-control" placeholder="最も伝えたいポイントは何ですか？">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="reviewcontent">ここにレビューを記入してください</label>
                    <textarea id="reviewcontent" name="reviewcontent" cols="45" rows="8" required="required" max="256"  class="form-control" placeholder="気に入った事/気に入らなかった事は何ですか？&#13;この製品をどのように使いましたか？"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 clearfix">
                <button type="submit" class="btn btn-warning float-right">確認画面へ</button>
                <input type="hidden" name="product_id" value="<?php echo $_GET['product_id'];?>"></input>
            </div>
        </div>
    </div>
	</div>
</form>
</div>

<style>
label{
    margin:0;
    padding:0;
}
.font-size15{
    font-size:1.5vw;
}
.stars:active{
    position: relative;
    top: 0.2vw;
}
</style>



<?php require 'old/fotter2.php';?>