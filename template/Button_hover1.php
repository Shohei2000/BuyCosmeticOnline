<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

	<div id="wrap">
		<div class="btn_wrap">
            <a href="#none" class="light">BUTTON</a>
		</div>
	</div>

<style>
html,
body {
  height: 100%;
/*   background: #f0002e; */
}

#wrap {
  height: 100%;
}

.btn_wrap {
  height: 100%;
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  justify-content: center;
}

a {
  display: block;
  margin: 0 10px;
  padding: 15px 0;
  width: 130px;
  font-weight: bold;
  color: #FFF;
  text-align: center;
  text-decoration: none;
  position: relative;
  transition: .2s ease-in-out;
}

a:active {
  background: rgba(255, 255, 255, .5);
}

/* ==============================================
* Light Effect
==============================================*/

.light {
  color:black;
  border: 1px solid red;
  overflow: hidden;
}

.light:before {
  content: "";
  width: 200%;
  height: 200%;
  background: rgba(0, 0, 0);
  transform: rotate(-45deg);
  position: absolute;
  top: -10%;
  left: -180%;
  transition: .3s ease-in-out;
}

.light:hover:before {
  left: 60%;
}


</style>

</body>
</html>