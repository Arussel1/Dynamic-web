<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 10px;
            background-color: #fff;
            color: #333;
        }

        th {
            background-color: #f2f2f2;
        }

        caption {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
        // Validate input
        $num1 = isset($_POST['num1']) ? (int)$_POST['num1'] : 0;
        $num2 = isset($_POST['num2']) ? (int)$_POST['num2'] : 0;

        if ($num1 < 3 || $num1 > 12 || $num2 < 3 || $num2 > 12) {
            echo '<p id="error">Please enter numbers between 3 and 12. <a href="index.php">Go back</a></p>';
        } else {
            // Generate multiplication table
            echo '<h2>Multiplication Table</h2>';
            echo '<table>';
            echo '<caption>Table with ' . $num1 . ' rows and ' . $num2 . ' columns</caption>';
            for ($i = 1; $i <= $num1; $i++) {
                echo '<tr>';
                for ($j = 1; $j <= $num2; $j++) {
                    echo '<td>' . $i * $j . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
