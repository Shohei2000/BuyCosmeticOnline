<?php require 'old/header3.php';?>

<div class="top-bar" style="width:auto; height:3vw;">
	<div class="row w-100 h-100 no-gutters">

		<div class="col-sm-3 no-gutters">
			<div class="box">
				<a class="box-a" href="">出品リスト</a>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="box">
				<a class="box-a">受注リスト</a>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="box">
				<a class="box-a bg-primary">新規出品</a>
			</div>
		</div>

		<div class="col-sm-3">
			<a class="box-a"></a>
		</div>

	</div>
</div>

<div class="main-container">
	<div class="row">
		<div class="col-sm-12" style="margin:2vw 0;">
			<p class="font-size25" style="font-weight:bold;">出品完了</p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12" style="text-align:center;">
			<p class="font-size2">出品が完了しました</p>
			<p class="font-size15">出品内容に問題がないか出品リストからご確認ください</p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 button_container">
			<div class="w-100 h-50" style="display:flex; justify-content:center; align-items:center;">
				<a href="A3-1-1.php" class="button font-size1">続けて出品する</a>
			</div>
			<div class="w-100 h-50" style="display:flex; justify-content:center; align-items:center;">
				<a href="A2-1-1.php" class="button font-size1">出品リストへ戻る</a>
			</div>
		</div>
	</div>

</div>

<style>
/* top-bar CSS開始 */
.col-sm-4{
    height:100%;
    width:100%;
    background-color:red;
}
.box{
    height:100%;
    width:100%;
    display:flex;
    text-align:center;
    background-color:gray;
    border:1px solid white;
}
.box-a{
    width:100%;
    height:100%;
    font-size:1.5vw;
    line-height:3vw;
    color:white;
}
.box:active{
    position: relative;
    top: 0.2vw;
}
.box-a:link, .box-a:visited, .box-a:hover, .box-a:active {
  color: white;
}
/* top-bar CSS終了 */
/* ------------------------------------------------------ */
/* main-container CSS開始 */
p{
    margin:0;
    padding:0;
}
.main-container{
    margin:2vw 10%;
}
.font-size15{
    font-size:1.5vw;
}
.font-size2{
    font-size:2vw;
}
.font-size25{
    font-size:2.5vw;
}
/* main-container CSS終了 */
/* button_container CSS開始 */
.button_container{
        height:8vw;
        margin:4vw 0;
        background-color:silver;
}
/* button CSS開始 */
.button{
    width:35%;
    height:3vw;
    margin:0.2vw 0;
    line-height:3vw;
}
/* button CSS終了 */
/* button_container CSS終了 */
</style>

<?php require 'old/fotter2.php';?>