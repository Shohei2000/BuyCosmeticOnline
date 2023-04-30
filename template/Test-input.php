<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>


	<form action="Test.php" method="post">
		<input type="text" name="number">
		<input type="submit">

	</form>

	<div id="page-top" class="page-top">
	<p><a id="move-page-top" class="move-page-top">▲</a></p>

	<style>
	.page-top
{
	margin: 0 ;
	padding: 0 ;
}

.page-top p
{
	margin: 0 ;
	padding: 0 ;

	position: fixed ;
	right: 16px ;
	bottom: 16px ;
}

.move-page-top
{
	display: block ;
	background: #D36015 ;
	width: 50px ;
	height: 50px ;

	color: #fff ;
	line-height: 50px ;
	text-decoration: none ;
	text-align: center ;

	-webkit-transition:all 0.3s ;
	-moz-transition:all 0.3s ;
	transition:all 0.3s ;
}

.move-page-top:hover
{
	opacity: 0.85 ;
}

	</style>
</div>
</body>
</html>