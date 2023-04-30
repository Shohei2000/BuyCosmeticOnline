<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">

</head>

<body>

      <a href="" class="modal" onclick="show_modal();">クリック１</a>

      <!-- 以下がモーダルで呼ばれる -->
      <div class="modalBox" id="motal1">
        <div class="modalInner">
          商品を追加しました。
        </div>
      </div>


</body>

<style>

#modalWrap {
	display: none;
	background: none;
	width: 100%;
	height: 100%;
	position: fixed;
	top: 10%;
	left: 10%;
	z-index: 100;
	overflow: hidden;
}

.modalBox {
	position: fixed;
	width: 85%;
	max-width: 420px;
	height: 0;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
	overflow: hidden;
	opacity: 1;
	display: none;
	border-radius: 3px;
	z-index: 1000;
}

.modalInner {
	padding: 10px;
	text-align: center;
	box-sizing: border-box;
	background: rgba(0, 0, 0, 0.7);
	color: #fff;
}

</style>

<script>
$('.modal').on('click', function show_modal() {
	//.modalについたhrefと同じidを持つ要素を探す
	var modalId = $(this).attr('href');
	var modalThis = $('body').find(modalId);
	//bodyの最下にwrapを作る
	$('body').append('<div id="modalWrap" />');
	var wrap = $('#modalWrap'); wrap.fadeIn('200');
	modalThis.fadeIn('200');
	//モーダルの高さを取ってくる
	function mdlHeight() {
		var wh = $(window).innerHeight();
		var attH = modalThis.find('.modalInner').innerHeight();
		modalThis.css({ height: attH });
	}
	mdlHeight();
	$(window).on('resize', function () {
		mdlHeight();
	});
	function clickAction() {
		modalThis.fadeOut('200');
		wrap.fadeOut('200', function () {
			wrap.remove();
		});
	}
	//wrapクリックされたら
	wrap.on('click', function () {
		clickAction(); return false;
	});
	//2秒後に消える
	setTimeout(clickAction, 1000); return false;
};
</script>

