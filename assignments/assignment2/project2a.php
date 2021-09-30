<?php
    $output = "<ul>";

    for($i = 1; $i < 5; $i++) //outer loop::print 1, 2, 3, 4.
    {
        $output .= "<li>$i<ul>";

        for($j = 1; $j <= 5; $j++) //inner loop::prints 1, 2, 3, 4, 5 - each iteration, indented four spaces
        {
            $output .= "<li>$j</li>";
        }//end for(j)

        $output .= "</ul>";
    }//end for (i)

    $output .= "</ul>";

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Project 2a: Nested List</title>
</head>

<body>
    <?php echo $output; ?>
</body>