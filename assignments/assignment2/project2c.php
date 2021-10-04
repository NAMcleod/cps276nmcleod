<?php
/*
This script creates a 15x5 table, each cell containing the row# and cell# by default. Editing of the table size
can be done by editing the $rows/$cols variable, editing the default value in the function declaration, or by 
inserting raw integers into the function call.
*/


$rows = 15;  // variables to be passed to function in main.
$cols = 5;  //  """""""""""""""""""""""""""""""""""""""""""

function makeTable($r = 15, $c = 5) //r -> rows, c -> columns.  
{
    echo "<table border=1>";
        for ($i = 1; $i <= $r; $i++)
        {
            echo "<tr>";
            for ($j = 1; $j <= $c; $j++)
            {
                echo "<td>Row $i Cell $j</td>";
            }//end inner loop (for j)

            echo "</tr>";
        }//end outer loop (for i)
        
    echo "</table>";
    return 0;
}//end function makeTable()
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Project 2c: Table</title>
<main>
<?php
    makeTable($rows, $cols);   //function call makes table
?> 
</head>