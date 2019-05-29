<?php 
session_start();
	 
	if(isset($_SESSION["uname"]))
	{
	}
	else
		echo "<script type=\"text/javascript\">location.href=\"Login.html\"</script>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Tickets</title>
<link href="Booking.css" rel="stylesheet" type="text/css" />
</head>
<div id="container">
<div id="header"></div>
<form action="BookingRes.php" method="post">
<div id="body">&nbsp;&nbsp;Travel Category:<select name="cat" id="cat"><option value="Airways">Airways</option><option value="Roadways">Roadways</option><option value="Railways">Railways</option></div>
</select>
<br />
<br />
<div id="body">From:<select name="From" id="From"><option value="Bangalore">Bangalore</option><option value="Mysore">Mysore</option><option value="Chennai">Chennai</option><option value="Delhi">Delhi</option></select></div>
<div id="body">To:<select name="To" id="To"><option value="Bangalore">Bangalore</option><option value="Mysore">Mysore</option><option value="Chennai">Chennai</option><option value="Delhi">Delhi</option></select></div>
<br />
<div id="body">Date of Travel: <input type="date" name="fdot" id="Date" /> And <input type="date" name="tdot"/> </div>
<br />
<div id="footer"><input id ="bt1" type="submit" value="Search"></div>
</form>
</div>
<body>
</body>
</html>