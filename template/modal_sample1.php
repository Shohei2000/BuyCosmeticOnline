<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">


<script type="text/javascript">
$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        return false;
    });
    $('.button2').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});
</script>

</head>
<body>
    <div class="content">
        <a class="js-modal-open" href="">クリックでモーダルを表示</a>
    </div>

    <div class="modal js-modal">
    	<form action="modal_sample1_output.php" method="post">
        	<div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <h2>アンケート</h2>
                <hr>
    			<input type="radio" name="present" value="0">プレゼントです。
    			<br>
    			<input type="radio" name="present" value="1">プレゼントではない。
                <div class="modal-footer" style="text-align:right;">
                        <button class="button1 btn btn-primary" type="submit">OK</button>
                        <button class="button2 btn btn-warning" type="button">Cancel</button>
    			</div>
            </div><!--modal__inner-->
    	</form>
    </div><!--modal-->

    <style>
*{
    margin: 0;
    padding: 0;
}
.content{
    margin: 0 auto;
    padding: 2vw;
}
.modal{
    display: none;
    height: 100vh;
    position: fixed;
    top: 0;
    width: 100%;
}
.modal__bg{
    background: rgba(0,0,0,0.8);
    height: 100vh;
    position: absolute;
    width: 100%;
}
.modal__content{
    background: #fff;
    left: 50%;
    padding: 40px;
    position: absolute;
    top: 50%;
    transform: translate(-50%,-50%);
    width: 60%;
}


    </style>
</body>
</html>