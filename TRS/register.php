<?php
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "trs";
    $uname=$_POST["uname"];
	$pass=$_POST["pword"];
	$phone=$_POST["ph"];
	$gender=$_POST["gen"];
	$name=$_POST["name"];
	$address=$_POST["address"];
	$age=$_POST["age"];
	$exists=FALSE;
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	$eun = mysqli_query($conn, "SELECT user_name FROM login WHERE user_name = '$uname'");
	$result = mysqli_fetch_array($eun);
	$eun = $result['user_name'];
	if($eun)
	{
		$exists=TRUE;
	}

	if($exists==FALSE)
	{
     $sql = "INSERT INTO login(user_name, pwd) values('$uname','$pass')";
     if($conn->query($sql) === TRUE)
     {}
     else
     {
        echo "Error: ".$sql."<br>".$conn->error;
     }
	 $uid = mysqli_query($conn, "SELECT user_id FROM login WHERE user_name = '$uname'");
	 $result = mysqli_fetch_array($uid);
	 $uid = $result['user_id'];
	 $sql = "INSERT INTO customer values('$uid','$name','$age','$gender','$address','$phone')";
	 $conn->query($sql);
            $conn->close();
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="rphp.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="header">Registration Successful</div>
<div id="body"><?php 
if ($exists==FALSE)
{
	echo "Successfully registered ".$name;
}
else
{
	echo "Username ".$uname." already exists";
}	?></div>
<div id="redir"><a href="HOME.html">Click here</a> to be redirected to login/registration page.</div>
</div>
</body>
</html>

