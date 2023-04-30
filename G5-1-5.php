<?php require 'old/header2.php';?>
<?php require 'old/array.php';?>

	<div class="main-container">
		<div class="title">
			<p style="font-size:3vw;">完了</p>
		</div>

		<div class="paragraf1">
			<p style="font-size:1.5vw;">
    			送信が完了しました<br>
    			<br>
                お買い上げありがとうございました。
                ご不明な点などがございましたら、お問合わせよりご連絡ください。<br>
                <br>
                ご注文誠にありがとうございました。<br>
                ご入力いただいたメールアドレス宛に<br>
                自動返信メールが送信されますのでご確認ください。<br>
                また、ご不明な点などがございましたら、お問合わせよりご連絡ください。<br>
			</p>
		</div>

		<div class="button_container">
			<input class="button" type="button" value="メインページへ戻る" onclick="location.href='Mainpage.php'" style="width:30%; height:40%; margin-left:1vw;">
    	</div>

	</div>

<style>
.main-container{
    margin:3% 10%;
}
.paragraf1{
    margin:3% 0;
}
.button_container{
        height:8vw;
        margin:1vw 0;
        background-color:silver;
        display:flex;
        justify-content:center;
        align-items:center;
}

/* クラスごと修飾 */
p{
    margin:0;
}
</style>

<?php require 'old/fotter2.php';?>