<?php session_start(); ?>

<?php include "class_and_db.php"; ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="test_nav_css.css">

</head>
<body style="font-family: sans-serif;">

<div style="background-color: #D7D8EC; padding: 6px 7px">

		<div style="display: inline;">
			<a href="index.php"><img src="gwb12.png" style="/*display: inline;*/"></a> <!--<p style="/*display: inline;*/font-size: 22px;float: right;">Online Tutor</p> -->
		</div>

		<div style="display: inline; float: right;">
			<br>
			<img src="gwb16.png" >
		</div>

</div>

<!--header/-->

<div class="topnav" id="myTopnav">
    <a href="index.php">&emsp; &emsp; Home &emsp; &emsp;</a>
    <a href="search_editor.php">&emsp; Vocabs Room &emsp;</a>
    <a href="liveSearch.php">&emsp; &emsp; Live Search &emsp; &emsp;</a>
    <a href="exam.php">&emsp; &emsp; Exam Room &emsp; &emsp;</a>
    <a href="about.php">&emsp; &emsp; About Us &emsp; &emsp;</a>

  <?php
      if(isset($_SESSION["username"])) {
  ?>

    		<a href="profile.php">&emsp; &emsp; <?php echo $_SESSION["username"]; ?> &emsp; &emsp;</a>
    		<a href="signout.php">&emsp; &emsp; Sign out &emsp; &emsp;</a>

    <?php
    	}
    	else {
    ?>
    		<a href="signin.php">&emsp; &emsp; Sign in &emsp; &emsp;</a>
    		<a href="signup.php">&emsp; &emsp; Sign up &emsp; &emsp;</a>
    <?php
    	}
    ?>


</div>

<div style="text-align: center;">
	
	<p> <b>Master Najat</b> is the Captain of the Voyagers Here</p>

	<p>Muhammad Sadrul Muttaquin Hoque Najat (24)  developed the search editor of this website, exam system and the interface. He loves programming and other creative things.</p>

	<img src="MyPic.jpg" height='320' width='450'>


</div>


<div id='foot'>
	<p>&copy; GRE Word Bank 2018 </p>
	<p>Developed by <a href="about.php">Team Voyagers</a></p>
</div>


</body>
</html>
