<?php
	require("connect.php");
?>
<!DOCTYPE html>
<html>	
<head>
<title>Results Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
<h1><center>Search Results</center></h1>
</head>

<body>
<div id = "results_area">
<br>Search results for: 
<?php
 echo $_GET["searchbar"];
?>
<br><br><br>
<div id = "results_table">
<?php
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	$usr_input = $_GET["searchbar"];
	$sql = "SELECT title, gg.genre_name, ff.format_name, rr.rating_name 
			FROM(SELECT title, genre_id, format_id, rating_id
				FROM dvds
				WHERE title LIKE '%$usr_input%') AS tt
			INNER JOIN(SELECT id, genre_name
				FROM genres
				GROUP BY id) AS gg
			INNER JOIN(SELECT id, format_name
				FROM formats
				GROUP BY id) AS ff
			INNER JOIN (SELECT id, rating_name
				FROM ratings
				GROUP BY id) AS rr
			ON tt.genre_id = gg.id AND tt.format_id = ff.id AND tt.rating_id = rr.id";




	$result = $conn->query($sql);

	echo "<table style = 'width: 100%; text-align: center'>";
	echo "<tr><td style = 'width: 40%'>Title</td><td style = 'width: 20%''>Genre</td><td style = 'width: 20%''>Format</td><td style = 'width: 20%''>Rating</td></tr>";
	echo "</table>";


	echo "<table>";
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo"<tr><td style = 'width: 40%'>".$row['title']."</td><td style = 'width: 20%'>".$row['genre_name']."</td><td style = 'width: 20%''>".$row['format_name']."</td><td style = 'width: 20%'><a href = 'ratings.php?rname={$row['rating_name']}'>".$row['rating_name'].'</a></td></tr>';
	    }
	} else {
    	echo "<center><h4>Sorry, no results found</h4><center><br>";
    	echo "<center><a href='search.php'>Go Back</a></center>";
	}

	echo "</table>";

?>
</div>

</div>

</body>


</html>