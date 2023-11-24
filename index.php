<?php
function incrementAndGetVisitCount() {
	    $cookieName = 'visit_count';
	        $visitCount = isset($_COOKIE[$cookieName]) ? (int)$_COOKIE[$cookieName] : 0;
	        $visitCount++;
		    setcookie($cookieName, $visitCount, time() + 3600 * 24 * 365);
		    
		    return $visitCount;
}
$visitCount = incrementAndGetVisitCount();
function getImageFileName() {

	    if (isset($_GET['image'])) {
            $image = $_GET['image'];
            return $image;
	    }
}
$imageFileName = getImageFileName();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        #background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        #greeting {
            font-size: 36px;
	}
	form {
	    margin-top: 20px;
	}
	#error {
	    color: red;
	    font-weight: bold;
	}
        #image-container {
            position: fixed;
            top: 20px;
            right: 20px;
        }
        #image-container img {
            max-width: 200px;
            opacity: 0.8;
        }

#counter {
           position: fixed;
           bottom: 20px;
           right: 20px;
           background-color: rgba(0, 0, 0, 0.7);
           color: #fff;
           padding: 10px;
           border-radius: 5px;
	 }


    </style>
</head>
<body>
    <p style="color:blue">Selected Haloween Image is: <?php echo $imageFileName; ?></p>
    <div id="image-container">
        <img src="<?php echo $imageFileName; ?>">
    </div>

    <div id="counter">
        <p>Visits: <?php echo $visitCount; ?></p>
    </div>

    <?php
        $currentHour = date('G');
        if ($currentHour >= 6 && $currentHour < 12) {
            $backgroundImage = 'morning.jpeg';
            $greeting = 'Good morning';
            $fontColor = '#ffcc00';
        } elseif ($currentHour >= 12 && $currentHour < 18) {
            $backgroundImage = 'afternoon.jpg';
            $greeting = 'Good afternoon';
	    $fontColor = '#ffa500';
 	} elseif ($currentHour >= 18 && $currentHour < 20) {
            $backgroundImage = 'evening.jpg';
            $greeting = 'Good evening';
            $fontColor = '#00ccff';
        } else {
            $backgroundImage = 'night.jpeg';
            $greeting = 'Good night';
            $fontColor = '#9900cc';
        }
    ?>

    <div id="background" style="background-image: url('<?php echo $backgroundImage; ?>');"></div>
    <div id="greeting" style="color: <?php echo $fontColor; ?>;"><?php echo $greeting; ?></div><br>
<form action="scirpt.php" method="post">
        <label for="num1">Enter the number of rows (3-12):</label>
        <input type="number" name="num1" id="num1" min="3" max="12" required>

        <label for="num2">Enter the number of columns (3-12):</label>
        <input type="number" name="num2" id="num2" min="3" max="12" required>

        <button type="submit">Generate Table</button>
    </form>
</body>
</html>
