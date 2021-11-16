<?php


require_once "classes/listFilesProc.php";
$listFilesProcClass = new listFilesProc();
$output = $listFilesProcClass->getFiles();


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <title>List Files</title>
</head>
<body>
<h1>List Files</h1>
<a href="project7.php"> Add Files </a>

<?php echo $output; ?>
</body>
</html>