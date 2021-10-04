<?php

//$rows = 15; //number of cells height
//$cols = 5;  //number of cells across

function makeTable($rows = 15, $cols = 5)  
{
    echo "<table border=1>";
        for ($i = 1; $i <= $rows; $i++)
        {
            echo "<tr>";
            for ($j = 1; $j <= $cols; $j++)
            {
                echo "<td>Row $i Cell $j</td>";
            }//end inner loop (for j)   
            echo "</tr>";
        }//end outer loop (for i)
    echo "</table>";
    return 0;
}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Project 2c</title>
<main>
<?php
    makeTable(); //function call creates table
?> 
</head>