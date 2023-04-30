<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>


<?php

    $present_ary = array('0' => 'プレゼントです','1' => 'プレゼントではない');

    echo $present_ary[$_REQUEST['present']];

?>




</body>
</html>