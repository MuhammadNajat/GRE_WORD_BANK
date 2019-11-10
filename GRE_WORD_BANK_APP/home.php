<?php include "class_and_db.php"; ?>

<?php

  $obj = new mysqli("localhost", "username", "password", "test");

  mysqli_query($obj, "SET CHARACTER SET utf8");                              //added for bangla
  mysqli_query($obj, "SET SESSION collation_connection = 'utf8_general_ci'"); //added for bangla

  if(!$obj) {
    echo "Connection Error " . $this->connect_error . __LINE__;
  }
  //$sql = "SELECT * FROM grewords";
  $sql = "SELECT * FROM words";
  $result = $obj->query($sql);

  $entry = array();

  if($result) {

    while($row = $result->fetch_assoc()) {
      /*
        echo "Word: " . $row['word'] . " POS: " . $row['pos'] . " Meaning: " . $row['meaning'] . " Example: " . $row['example'] . "<br>";
      */
      $entry[$row['id']] = array($row['word'], $row['pof'], $row['em'], $row['bm'], $row['ex']);
    }

    $num = count($entry);

    /*
    echo "<hr/>";

    foreach ($entry as $key => $value) {
      echo $key . " : " . $value[0] . " : " . $value[1] . " : " . $value[2] . "<br>";
    }
    */

  }

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="test_nav_css.css">

	<!--  <link rel="stylesheet" type="text/css" href="search_style.css">  ONLY FOR SEARCHIG  -->

	<style type="text/css">

		.oneline:hover {
			background-color: #E2DCE0;
		}

		.oneline {
			padding: 15px;
			margin: 5px;
			width: 300px; /*300*/
			height: 300px; /*300*/
			border: solid 1px #ccc;
			display: inline-block;
		}

		/*.second:hover {
			background-color: #E2DCE0;
		}*/

		.second {
			padding: /*1px 0 1px 0*/0;
			margin: 0;
			width: 250px;
			height: 300px;
			/*border: solid 1px #ccc;*/
			display: inline-block;

			text-align: center

		}

	</style>

</head>
<body style="/*background-image: url('alphabet_3.jpg');*/font-family: sans-serif;">

<!-- 
<div class="bgner"> 
	<p style="font-size: 40px;">GRE WORD BANK</p>
</div>
-->

<!--header-->

<div style="background-color: #D7D8EC; padding: 6px 7px">

		<div style="display: inline;">
			<a href="home.php"><img src="gwb12.png" style="/*display: inline;*/"></a> <!--<p style="/*display: inline;*/font-size: 22px;float: right;">Online Tutor</p> -->
		</div>

		<div style="display: inline; float: right;">
			<br>
			<img src="gwb16.png" >
		</div>

</div>

<!--header/-->

<div class="topnav" id="myTopnav">
<!-- p style="background-color: green; font-size: 20px;">GRE WORD BANK</p> -->
	<a href="home.php">&emsp; &emsp; Home &emsp; &emsp;</a>
    <a href="search_editor.php">&emsp; &emsp; Vocabs Room &emsp; &emsp;</a>
  	<a href="liveSearch.php">&emsp; &emsp; Live Search &emsp; &emsp;</a>
    <a href="exam.php">&emsp; &emsp; Exam Room &emsp; &emsp;</a>
    <a href="about.php">&emsp; &emsp; About Us &emsp; &emsp;</a>
    <a href="#signout">&emsp; &emsp; Sign out &emsp; &emsp;</a>
  <!-- <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a> -->


</div>

<a href="search_editor.php"><div class="oneline"><img src="searchEditorPicSmall.png"></div></a>

<a href="liveSearch.php"><div class="oneline"><img src="searchPic8.png"></div></a>

<a href="exam.php"><div class="oneline"><img src="examPic3.png"></div></a>


<div class="second"><?php
	$inst = mt_rand(1, $num);
?><h2 style="color: #FF3468;">Word of the Moment</h2>
<?php
	echo "<h3 style = 'background-color: yellow; color: blue; '><b>" . strtoupper($entry[$inst][0]) . "</b></h3>"; 
	echo "<p style = 'background-color: #C7FF51; color: green; '><b>" . $entry[$inst][1] . "</b></p>"; 
	echo "<p style = 'background-color: #CBD6E9; color: #2C2255;'><b>" . $entry[$inst][2] . "</b></p>"; 
	echo "<p style = 'background-color: #F0E2CE; color: #FF7405;'><b>" . $entry[$inst][3] . "</b></p>";
	echo "<p style = 'background-color: #FFEAF8; color: #FF0D37;'><b>" . $entry[$inst][4] . "</b></p>"; 
?>
</div>

<!--- 

// previously used this, but ^ this works fine

<div class="oneline">
<a href="#"><img src="searchEditorPicSmall.png"></a>
</div>

<div class="oneline">
<a href="#"><img src="searchPic8.png"></a>
</div>

<div class="oneline">
<a href="#"><img src="examPic3.png"></a>
</div>

<div class="oneline">
<p>kkkk</p>
</div>
-->



<div style="padding-top: 50px; text-align: center;">
	<p>&copy; GRE Word Bank 2018 </p>
	<p>Developed by Team Voyagers</p>
</div>


</body>
</html>