<?php require '../old/header2.php';?>

<script>

    $(document).ready(function () {
        $("#topBtn").hide();　//ボタンを非表示にする
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 100) { //ページの上から100pxスクロールした時
                $("#topBtn").fadeIn("fast"); //ボタンがフェードインする
            } else {
                $("#topBtn").fadeOut("fast");　//ボタンがフェードアウトする
            }
            scrollHeight = $(document).height(); //ドキュメントの高さ
            scrollPosition = $(window).height() + $(window).scrollTop(); //現在地
            footHeight = $("footer").innerHeight(); //止めたい位置の高さ(今回はfooter)
            if (scrollHeight - scrollPosition <= footHeight) { //ドキュメントの高さと現在地の差がfooterの高さ以下の時
                $("#topBtn").css({
                    "position": "absolute", //pisitionをabsoluteに変更
                });
            } else { //それ以外の場合は
                $("#topBtn").css({
                    "position": "fixed", //固定表示
                });
            }
        });

    //スムーススクロール設定
        $('#topBtn').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);　//スムーススクロールの速度
            return false;
        });
    });

</script>

</head>
<body>

	<h2>１</h2>
    <h2>２</h2>
    <h2>３</h2>
    <h2>４</h2>
    <h2>５</h2>
    <h2>６</h2>
    <h2>７</h2>
    <h2>８</h2>
    <h2>９</h2>
    <h2>10</h2>
    <h2>11</h2>
    <h2>12</h2>
    <h2>13</h2>
    <h2>14</h2>
    <h2>15</h2>
    <h2>16</h2>
    <h2>17</h2>
    <h2>18</h2>
    <h2>19</h2>
    <h2>20</h2>

    <div id="content" class="top">
        <!-----ここにコンテンツが入る----->
        <a href="#" id="topBtn">TOP</a>
    </div>

    </main>

	<footer class="footer">@Copylight</footer>

    <style>
    h2{
    padding:2em;
    }
        #content{
            position: relative;
        }

        #topBtn {
            /*-----必須-----*/
            position: fixed;
            bottom: 10px;
            right: 10px;

            /*-----装飾-----*/
            width: 64px;
            height: 64px;
            line-height: 64px;
            text-align: center;
            background-color: #333;
            color: #fff;
        }
        	   footer.footer{
	       line-height:3em;
	       height:3em;
	       text-align:center;
	       font-size:0.7em;
	       color:white;
	       background-color:black;
	   }
    </style>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>