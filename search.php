<?php

	require("connect.php");
?>

<!DOCTYPE html>
<html>	
<head>
<title>DVD Search Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
	function validateForm() {
    var x = document.forms["myForm"]["searchbar"].value;
    if (x == null || x == "") {
        alert("No DVD searched");
        return false;
    }
}
</script>

<h1><center>DVD Search Page</center></h1>
</head>


<body>
<div id = "search_area">
<br><br><br>
<form name = "myForm" action = "results.php" onsubmit="return validateForm()" method = "GET">
	<center><input type = "text" name = "searchbar" size = "90"><br></center>
	<center><input type = "submit" value = "Search" name = "submit_button"></center>
</form>

</div>

</body>


</html>

