<?php
	error_reporting(0);
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "trs";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	$uname=$_POST["uname"];
	$pw=$_POST["pword"];
	$uid = mysqli_query($conn, "SELECT * FROM login WHERE user_name = '$uname'");
	$result = mysqli_fetch_array($uid);
	session_start();
	if(isset($_session['uname']))
	{
		echo "<script type=\"text/javascript\">location.href=\"FrontPage.php\"</script>";
	}
	else
	{
		if($result['user_name'] == $uname && $result['pwd'] == $pw )
			{
				$_SESSION["uname"] = $uname;
				header('Refresh:3;url=FrontPage.php');	
			}
		else
		{
			echo "<script type=\"text/javascript\">alert(\"Incorrect credentials\");location.href=\"Login.html\"</script>";
		}
	}
    $conn->close();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>TRS</title>
<link href="lphp.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="header"></div>
<div id="body">Welcome back <?php echo $uname." you have successfully logged in."; ?><br/>You will be redirected...</div>
<div id="footer"></div>
</div>
</body>
</html>

