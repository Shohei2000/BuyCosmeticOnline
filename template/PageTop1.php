<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">

    <script type="text/javascript">

    jQuery(function() {
    	  var appear = false;
    	  var pagetop = $('#page_top');

    	  $(window).scroll(function () {
    	    if ($(this).scrollTop() > 100) {  //100pxスクロールしたら
    	      if (appear == false) {
    	        appear = true;
    	        pagetop.stop().animate({
    	          'bottom': '50px' //下から50pxの位置に
    	        }, 300); //0.3秒かけて現れる
    	      }
    	    } else {
    	      if (appear) {
    	        appear = false;
    	        pagetop.stop().animate({
    	          'bottom': '-50px' //下から-50pxの位置に
    	        }, 300); //0.3秒かけて隠れる
    	      }
    	    }
    	  });

    	  pagetop.click(function () {
    	    $('body, html').animate({ scrollTop: 0 }, 500); //0.5秒かけてトップへ戻る
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

<div id="page_top"><a href="#"></a></div>

<style>

#page_top{
  width: 50px;
  height: 50px;
  position: fixed;
  right: 0;
  bottom: -50px;
  background: #ef3f98;
  opacity: 0.6;
  border-radius: 50%;
}
#page_top a{
  position: relative;
  display: block;
  width: 50px;
  height: 50px;
  text-decoration: none;
}
#page_top a::before{
  font-family: 'Font Awesome 5 Free';
  font-weight: 900;
  content: '\f102';
  font-size: 25px;
  color: #fff;
  position: absolute;
  width: 25px;
  height: 25px;
  top: -5px;
  bottom: 0;
  right: 0;
  left: 0;
  margin: auto;
  text-align: center;
}

</style>

</body>
</html>