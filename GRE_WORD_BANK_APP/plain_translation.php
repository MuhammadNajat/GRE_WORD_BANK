
<?php

echo "<div style='text-align: center; color: green'><h2>Hover over the Words!</h2></div>";

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}


		$text = test_input($_POST['text']);

		$words = array();

		$length = strlen($text);
		for ($i=0, $j=0, $words[0] = ""; $i < $length; $i++) { 

			if(/*$text[$i] == ' ' || $text[$i] == '<br/>'*/  !( ($text[$i]>='A' &&  $text[$i]<='Z') || ($text[$i]>='a' &&  $text[$i]<='z') ) ) {
				//if($j != 0)
				$j = $j + 1;
				$words[$j] = "";
				$words[$j]  = $words[$j].$text[$i];
				//$words[$j].='*';
				$j = $j + 1;
				$words[$j] = "";
			}
			else {
				$words[$j]  = $words[$j].$text[$i];
			}
		}

		$totalWords = count($words);

?>

<div id="ans">

<?php


		for($i=0; $i<$totalWords; $i++) {


			if(preg_match( '/\r\n|\r|\n/', $words[$i] )) {                   //extended to check if the character is a new line

				/*echo '
				';
				$i++;*/
				echo "<br>";
				$i+=2;   // newly added

				continue;

			}

			else if(ctype_space($words[$i])) {                         /* adding for checking*/
				
				if($i+1 < $totalWords && ctype_space($words[$i+1])) {
					echo " ";
					$i++;
				}
				
				else {
					echo " ";
				}

				/*if(($i+1) < $totalWords && ($i+2) < $totalWords && ctype_space($words[$i+1]) && (!ctype_alpha($words[$i+2]) )) {  // lastly added
					$i++;
					echo "dhukse1";
				}*/

				continue;
			}

			$wordLower = strtolower($words[$i]);


			 if(isset($entry[$wordLower])) {
				//echo $words[$i] . " - " . $entry[$words[$i]][0] . " - " . $entry[$words[$i]][1] . "<br>";
				
				//echo "<li>";

											/*<div class="tooltip">Hover over me
							  				<span class="tooltiptext">Tooltip text</span>
											</div>*/

		?>


					<div class='tooltip' style="font-family: Arial, Helvetica, sans-serif;"><?php echo $words[$i];

						if($i+1 < $totalWords && (!preg_match( '/\r\n|\r|\n/', $words[$i+1])) && (!ctype_space($words[$i+1])) && (!ctype_alpha($words[$i+1])) && (!is_numeric($words[$i+1])) ) {
							echo $words[$i+1];
							$i++;//$i+=2;
						}   /**this if prints a punct after word: plea,*/

					?><span class="tooltiptext" ><?php echo "<p style='color: #F92665; font-size:20px'><b>" . strtoupper($entry[$wordLower][0]) . "</b></p>" .  "<p style='color: #002B5F;  font-size:20px'><i>" . $entry[$wordLower][1] . "</i></p>" . "<p style='color: #0078D7;  font-size:20px'>" . $entry[$wordLower][2] . "</p>" . "<p style='color: #FF0000;  font-size:20px'>" . $entry[$wordLower][3] . "</p>". "<p style='color: #9E2420;  font-size:20px'>" . $entry[$wordLower][4] . "</p>";

					?></span></div>




					

		<?php



			}
			else {
		?>
				
				<div class='tooltip' style="font-family: Arial, Helvetica, sans-serif;"><?php /*echo $words[$i];*/

				if(ctype_alpha($words[$i])) {
					echo $words[$i];
					if($i+1 < $totalWords && (!preg_match( '/\r\n|\r|\n/', $words[$i+1])) && (!ctype_space($words[$i+1])) && (!ctype_alpha($words[$i+1])) && (!is_numeric($words[$i+1])) ) {
						echo $words[$i+1];
						$i++;
					}   /**this if prints a punct after word: yes,*/
				}


				else if(/*$i+1 < $totalWords &&*/ (!preg_match( '/\r\n|\r|\n/', $words[$i])) && (!ctype_space($words[$i])) && (!ctype_alpha($words[$i])) ) {
					//$i++;
					while($i < $totalWords && (!preg_match( '/\r\n|\r|\n/', $words[$i])) && (!ctype_space($words[$i])) && (!ctype_alpha($words[$i]))) {
						echo $words[$i];
						$i++;
					}
					$i--;
				}


				?><span class="tooltiptext" style="color: red"><?php echo "NOT IMPORTANT FOR GRE"; ?></span>
				</div>



		<?php

			/*if(($i+1) < $totalWords && ($i+2) < $totalWords && ctype_space($words[$i+1]) && (!ctype_alpha($words[$i+2]) )) {  // lastly added
					$i++;
					echo "dhukse2";
			}*/

			/*if(!ctype_alpha($words[$i])) {    /// lastly added
				$i++;
			}*/



			}

		}

	//}   
