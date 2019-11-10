<?php session_start(); ?>

<?php

	if(!isset($_SESSION['username'])) {
		//header("Location: signin.php?examlog=1");
		//header("Location: index.php");

?>

<script type="text/javascript">
	document.location.href = "signin.php?examlog=1";
</script>

<?php

	}

?>

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

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<style>

	* {box-sizing: border-box}
	body {font-family: Verdana, sans-serif; margin:0}
	.mySlides {display: none}
	img {vertical-align: middle;}

	/* Slideshow container */
	.slideshow-container {
	  max-width: 1000px;
	  position: relative;

	  margin: 120px auto;
	}

	/* Next & previous buttons */
	.prev, .next {
	  cursor: pointer;
	  position: absolute;
	  top: 50%;
	  width: auto;
	  padding: 16px;
	  margin-top: 80px;/*-22px - was previous and unfit*/
	  color: white;
	  font-weight: bold;
	  font-size: 18px;
	  transition: 0.6s ease;
	  border-radius: 0 3px 3px 0;
	}

	/* Position the "next button" to the right */
	.next {                         
	  right: 0;
	  border-radius: 3px 0 0 3px;
	  color: black;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover, .next:hover {
	  background-color: rgba(0,0,0,0.8);
	}

	/* Caption text */
	.text {
	  color: black;
	  font-size: 15px;
	  /*padding: 8px 12px;*/ /*padding 150px; /*margin: -100px auto;*/

	  width: 445px;
	  height: 185px;
	  left: 454px;
	  top: 51px;
	  right: 899px;
	  bottom: 236px;
	  position: absolute;

	  margin: 10px auto;

	  /*bottom: 180px;       /**/
	  /*width: 100%;*/
	  /*text-align: center;*/
	}

	/* Number text (1/3 etc) */
	.numbertext {
	  color: black;
	  font-size: 12px;
	  padding: 8px 12px;
	  position: absolute;
	  top: 0;
	}

	/* The dots/bullets/indicators */
	.dot {
	  cursor: pointer;
	  height: 15px;
	  width: 15px;
	  margin: 0 2px;
	  background-color: #bbb;
	  border-radius: 50%;
	  display: inline-block;
	  transition: background-color 0.6s ease;
	}

	.active, .dot:hover {
	  background-color: #717171;
	}

	/* Fading animation */
	.fade {
	  -webkit-animation-name: fade;
	  -webkit-animation-duration: 1.5s;
	  animation-name: fade;
	  animation-duration: 1.5s;
	}

	@-webkit-keyframes fade {
	  from {opacity: .4} 
	  to {opacity: 1}
	}

	@keyframes fade {
	  from {opacity: .4} 
	  to {opacity: 1}
	}

	/* On smaller screens, decrease text size */
	@media only screen and (max-width: 300px) {
	  .prev, .next,.text {font-size: 11px}
	}

</style>

	<!-- <link rel="stylesheet" type="text/css" href="search_style.css"> -->

</head>
<body style="/*background-image: url('alphabet_3.jpg');font-family: sans-serif;*/">



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
<!-- p style="background-color: green; font-size: 20px;">GRE WORD BANK</p> -->
    <a href="index.php">&emsp; &emsp; Home &emsp; &emsp;</a>
    <a href="search_editor.php">&emsp; Vocabs Room &emsp;</a>
    <a href="liveSearch.php">&emsp; Live Search &emsp;</a>
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


  <!-- <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a> -->



</div>


	<h3 style="text-align: center; color: green">You Are Given 10 Questions Here</h3>
	<h3 style="text-align: center; color: green">If You Move Once from One Question to the Next One then You Can't Go Back again. So Be Careful to Select Your Answer.</h3>

<script type="text/javascript">
  
  var x = 0;
  var corAr = new Array(15);
  for(i=0; i<15; i++) {
    corAr[i] = 0;
  }

</script>

<?php

/*

$con = new mysqli("localhost","username","password", "test");
  if(!$con){
    echo "Connection fail".$con->connect_error;
}

$result=mysqli_query($con, "SELECT * FROM questions");

//$row = $result->fetch_assoc();
*/

$cnt = 0;
$qno = 1;

$min = 1;
$max = $num;
$numbers = range($min, $max);
shuffle($numbers);

$totalQ = $num;

$ans = 0;

$ar_ans = array();

?>


<div class="slideshow-container">


      <?php while(/*$row = $result->fetch_assoc()*/$qno <= 10) { ?>

          <div class="mySlides fade">
            <div class="numbertext"><?php echo $qno++; ?> / 10</div>
            <img src="backWhite.jpg" style="width:100%">
            <!--<div class="text"> -->

              <!--- <table class="text5" style="vertical-align: middle; margin: -200px auto;">   -->

              <?php

                $q = $numbers[$cnt];
                $cnt++;
                $ar_ans[$qno-1] = array($entry[$q][0], $entry[$q][1], $entry[$q][2], $entry[$q][3], $entry[$q][4]);

                $ps = range(1, $num);
                shuffle($ps);

                $r1 = $ps[0];
                $r2 = $ps[1];
                $r3 = $ps[2];

                /*
                $r1 = mt_rand(1, 300);
                $r2 = mt_rand(1, 300);
                $r3 = mt_rand(1, 300);
                */

                /*
                $q1 = mt_rand(1, 300);
                $r1 = mt_rand(1, 300);
                $r2 = mt_rand(1, 300);
                $r3 = mt_rand(1, 300);
                */

                $qtype = $ps[$totalQ-1];

                if($qtype % 2 == 0) {

                    $op = array();
                    $op[0] = $entry[$q][2];
                    $op[1] = $entry[$r1][2];
                    $op[2] = $entry[$r2][2];
                    $op[3] = $entry[$r3][2];

                    shuffle($op);

                ?>
                    <form action="" method="post">
                      <table class="text5" style="vertical-align: middle; margin: -200px auto;">

                          <tr><td><?php echo "<b>(Q) </b> Select the meaning of <b>" . $entry[$q][0] . "</b>"; ?></td></tr>

                          <tr><td> <input onclick="check(this.name, this.value)" type="radio" name = <?php echo $qno; ?> value = <?php echo $entry[$q][2] . "," . $op[0];  ?> /> <?php echo $op[0] . "<br>"; ?> </td></tr>
                          <tr><td> <input onclick="check(this.name, this.value)" type="radio" name = <?php echo $qno; ?> value = <?php echo $entry[$q][2] . "," . $op[1];  ?> /> <?php echo $op[1] . "<br>"; ?> </td></tr>
                          <tr><td> <input onclick="check(this.name, this.value)" type="radio" name = <?php echo $qno; ?> value = <?php echo $entry[$q][2] . "," . $op[2];  ?> /> <?php echo $op[2] . "<br>"; ?> </td></tr>
                          <tr><td> <input onclick="check(this.name, this.value)" type="radio" name = <?php echo $qno; ?> value = <?php echo $entry[$q][2] . "," . $op[3];  ?> /> <?php echo $op[3] . "<br>"; ?> </td></tr>

                      </table>
                    </form>

             <?php

                      //if(isset($_POST['q1'])) {
                        //if(@$_POST['q1'] == $entry[$q][2]) {          /*this if and else still doesn't work properly*/
                          //$ans++;
                          //echo "$$$";
                        //}

                      //}


                }

                else {

                    $op = array();
                    $op[0] = $entry[$q][0];
                    $op[1] = $entry[$r1][0];
                    $op[2] = $entry[$r2][0];
                    $op[3] = $entry[$r3][0];

                    shuffle($op);
              ?>

                  <form action="" method="post">

                    <table class="text5" style="vertical-align: middle; height: -50%; margin: -200px auto;">

                        <tr><td><?php echo "<b>(Q) </b> ........... means " . "<b>" . $entry[$q][2] . "</b>"; ?></td></tr>

                        <tr><td> <input onclick="check(this.name, this.value)" type="radio" name = <?php echo $qno; ?> value = <?php echo $entry[$q][0] . "###gwb_option_seperator###" .  $op[0];  ?> /> <?php echo $op[0] . "<br>"; ?> </td></tr>
                        <tr><td> <input onclick="check(this.name, this.value)" type="radio" name = <?php echo $qno; ?> value = <?php echo $entry[$q][0] . "###gwb_option_seperator###" .  $op[1];  ?> /> <?php echo $op[1] . "<br>"; ?> </td></tr>
                        <tr><td> <input onclick="check(this.name, this.value)" type="radio" name = <?php echo $qno; ?> value = <?php echo $entry[$q][0] . "###gwb_option_seperator###" .  $op[2];  ?> /> <?php echo $op[2] . "<br>"; ?> </td></tr>
                        <tr><td> <input onclick="check(this.name, this.value)" type="radio" name = <?php echo $qno; ?> value = <?php echo $entry[$q][0] . "###gwb_option_seperator###" .  $op[3];  ?> /> <?php echo $op[3] . "<br>"; ?> </td></tr>
                  
                    </table>

                  </form>

             <?php

                      //if(isset($_POST['q1'])) {
                        //if(@$_POST["q1"] == $entry[$q][0]) {
                          //$ans++;
                          //echo "$$$";
                        //}

                      //}

                }


             ?>

            <!-- </div> -->
          </div>

          <?php


           }           /*end of while loop*/
 
          ?>

          <a class="next" onclick="plusSlides(1)">&#10095;</a>


<br>

<!--
<div id='foot'>
	<p>&copy; GRE Word Bank 2018 </p>
	<p>Developed by <a href="about.php">Team Voyagers</a></p>
</div>
-->

<!---
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
-->

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  x++;
  //document.getElementById('test').innerHTML = "";
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");                                            //

  //if (n > slides.length) {slideIndex = 1; window.location = "solution.php?cor_ans=" + <?php echo $ans; ?> }                   /*I changed this line to prevent from going last to first question*/

  if (n > slides.length) {

    var ckAns = 0;                                 //added for counting total correct ans
    for(l=1; l<=10; l++) {
      if(corAr[l] == 1) {
        ckAns++; 
      }
    }  

    /*slideIndex = 1; */window.location = "res_sol.php?cor_ans=" + ckAns; /*+ "&ansList=" + <?php echo $ar_ans[0]; ?> ;*/              /*I changed this line to prevent from going last to first question*/

  }

  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

function check(nam, val) {

  var ind = parseInt(nam);
  var op2 = val.split("###gwb_option_seperator###");
  if(op2[0] == op2[1]) {
    corAr[ind] = 1;
  }
  else {
    corAr[ind] = 0;
  }

  //document.getElementById('test').innerHTML = op2[0] + "***" + op2[1];
  
}


</script>

</div>

<!---
<div id='foot'>
	<p>&copy; GRE Word Bank 2018 </p>
	<p>Developed by <a href="about.php">Team Voyagers</a></p>
</div>
-->



</body>
</html>