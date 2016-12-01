<?php session_start(); 
    if (!isset($_SESSION["email"])) {
        header("Location:signin.php");
        die();
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Math Game</title>
    <meta charset="utf-8" />
</head>
<body>
	<h1>Math Game</h1>

	$num1 = rand(0, 20);
	$num2 = rand(0, 20);
	$operators = array('+', '-');
	$randOps = $operators[rand(0, 1)];
	
	<?php 
	if (isset($_POST["num1"])) {
		$_SESSION["num1"] = $_POST["num1"];
	}
	if (isset($_POST["num2"])) {
		$_SESSION["num2"] = $_POST["num2"];
	}
	if (isset($_POST["randOps"])) {
		$_SESSION["randOps"] = $_POST["randOps"];
	}   
	if (isset($_POST["response"])) {
		$_SESSION["currentResp"] = $_POST["response"];
	} 
	if (!isset($_SESSION["attempts"])) {
		$_SESSION["attempts"] = 0;
		$_SESSION["correct"] = 0;
	}

        
        if ($randOps == $operators[1]) {
            $_SESSION["currentCor"] = $num1 - $num2;
        } else {
            $_SESSION["currentCor"] = $num1 + $num2;
        }
        ?>
        
        <form action="index.php" method="post">
            <label><?php echo $num1 ."". $randOps ."". $num2?;?></label>
            <input type="number" required="true" name="response" placeholder="Enter Answer" />
            <button type="submit">Submit Answer</button>
            <input type="button" value="Sign Out" onclick="signin.php" /></form> 
        </form>
        <?php 
        if (isset($_SESSION["currentResp"])) {
            $_SESSION["prev_ans"] = $_SESSION["currentResp"];
            $wrong = "<p class='text-center'>WRONG! <br> Response is: " . $_SESSION["prev_correct"] ."</p>";
            $_SESSION["attempts"] = $_SESSION["attempts"] + 1;
            $right = "<p class='text-center'>RIGHT!</p>";
            
            if (isset($_SESSION["prev_ans"])) {  
            }
            if ($_SESSION["prev_ans"] == $_SESSION["prev_correct"]) {
                $_SESSION["correct"] = $_SESSION["correct"] + 1;
                echo $right;
            } else {
                echo $wrong;
            }
        }
        $_SESSION["prev_correct"] = $_SESSION["currentCor"];
        ?>
        <p style="text-align:center;">Results: <?php echo $_SESSION["correct"]; ?> / <?php echo $_SESSION["attempts"]; ?></p>
		
</body>
</html>