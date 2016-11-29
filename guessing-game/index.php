<?php

session_start();

$MAX_TRIES = 5;

if (!isset($_SESSION["pc_number"])) {
    $_SESSION["tries"] = $MAX_TRIES;
    $_SESSION["past_tries"] = array();
}
?>
<html>
<head>
    <title>Guessing Game</title>
</head>
<body>
    <style type="text/css">
        .container{
          width: 60%;
            border: 0px dashed red;
            margin-left: auto;
            margin-right: auto;
        }
		
		.left{
			border: 0px solid red;
            width: 70%;
            float: left;
            text-align: center;
            background-color: #eeeeee;
		}
		.right{
			border: 0px solid green;
            width: 28%;
            float: left;
            padding-left: 10px;
            padding-bottom: 13px;
            background-color: #c1c1c1;
		}
    </style>
    <div class="container">
	<div class="left">
        <div class="logo">
            <h1>Guessing Game</h1>
        </div>
        <form action="" method="POST">
			<label>Please guess a number between 0 and 10</label><br><br>
			<label>Enter Guess:</label>
            <input type="text" name="text">
            <input type="submit" name="submit" value="GUESS">
        </form>
    
    <?php
		$WON = false;
		define("INVALID", "Please enter a valid NUMBER!", true);
		define("sorry", "Sorry... Guess again!", true);
		define("congrats", "You won the game!", true);
		
	  // If it was the last try and the input still isn't right, print ending message
    if ($_SESSION["tries"] == 0 && $WON != true) {
        $message = "Too bad, number was ".$_SESSION["pc_number"];
        $color = "red";
    }
	
    $_SESSION["pc_number"] = mt_rand(1,10);
        if( isset($_POST['submit']) ){
            $text = trim($_POST['text']);
			$WON = false;
            if(empty($text) || $text > 10 ) { ?>
                <div class="container">
                    <h2><?php echo INVALID ?></h2>
                </div>
            <?php }else{
                if($text == $_SESSION["pc_number"]){ ?>
                   <div class="container">
                       <h2><?php echo congrats ?></h2>
                   </div>

               <?php }else{ ?>
                   <div class="container">
                       <h2><?php echo Sorry ?></h2>
                   </div>

                <?php }
            }
        }

	 // If it was the last try and the input still isn't right, print ending message
    if ($_SESSION["tries"] == 0 && $WON != true) {
        $message = "Too bad, number was ".$_SESSION["pc_number"];
        $color = "red";
    }
    
	// Verify if user still has tries
                    if ($_SESSION["tries"] == 0 || $WON == true) {
                        $disable_attr = "disabled=\"disabled\"";
                    } else {
                        $disable_attr = "";
                    }
					
		
    ?>
	</div>
<div class="right">
		<h3>You have (max <?php echo $MAX_TRIES ?>) tries</h3>
		<?php

                    $counter = 1;
                    foreach($_SESSION["past_tries"] as $try){
                        echo "<p>Try $counter: $try</p>";
                        $counter++;
                    }

                    if ($_SESSION["tries"] == 0 || $WON == true) {
                        echo "<a href=\"reset.php\">Play again</a>";
                    }

                     ?>
                </div>
                <div style="clear: both;"></div>		                 
	</div>
	
</body>
</html>
