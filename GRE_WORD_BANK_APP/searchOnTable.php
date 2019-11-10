<html>
	<head>
	<script type="text/JavaScript">
	function myFunction() {
		  var input, filter, table, tr, td, i,ta,tb,tc;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

 
		  for (i = 0; i < tr.length; i++) {
			ta = tr[i].getElementsByTagName("td")[0];
			tb = tr[i].getElementsByTagName("td")[1];
			tc = tr[i].getElementsByTagName("td")[2];
			if (ta) {
				if (ta.innerHTML.toUpperCase().indexOf(filter) > -1||tc.innerHTML.toUpperCase().indexOf(filter) > -1||tb.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
				} 
				else {
				tr[i].style.display = "none";
				}
			}
		}
  
	}
	</script>
	<style>
			input[type="text"]{
			width: 300px;
			}
		table{
			margin-top: 0px;
			margin-left: 20px;
			padding:10px 5px 2px 5px;
		}
		th{
			text-align: center;
			background: black;
			color: white;
			height:30px;
			width: 200px;
		}
		td
		{
			text-align: center;
			background: skyblue;
			color: black;
			height:10px;
			width: 100px;
			}
	</style>
	</head>

	<body style="font-family: Arial, Helvetica, sans-serif;">
	<p><center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for words/meaning/PoS.."></center></p> 

	<table id="myTable">
	<tr>
	<th>Serial</th>
	<th>Word</th>
	<th>Parts of Speech</th>
	<th>English Meaning</th>
	<th>Bangla Meaning</th>
	<th>Example</th>
	</tr>
	<?php
	$con= new mysqli("localhost","username","password", "test"); // mysql_connect("localhost","username","password");
	mysqli_query($con, "SET CHARACTER SET utf8");                              //added for bangla
	mysqli_query($con, "SET SESSION collation_connection = 'utf8_general_ci'"); //added for bangla

	if(!$con)
	{
		die('Could not connect'.mysql_error());
	}
	//mysql_select_db("test",$con);
	$result = $con->query("SELECT * FROM words"); //mysql_query("SELECT * FROM words");
	
	while($row=$result->fetch_assoc() )
	{
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['word']."</td>";
		echo "<td>".$row['pof']."</td>";
		echo "<td>".$row['em']."</td>";
		echo "<td>".$row['bm']."</td>";
		echo "<td>".$row['ex']."</td>";
		echo "</tr>";
	}
	//mysql_close($con);
	?>
	
	</table>
	</body>
</html>